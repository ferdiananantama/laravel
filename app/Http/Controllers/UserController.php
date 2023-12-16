<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'banners' => Banner::query()->orderBy('order')->latest()->get(),
            'events' => Event::query()
                ->with('tickets')
                ->where('is_recommended', true)
                ->latest()
                ->limit(12)
                ->get(),
        ]);
    }

    public function detail(Event $event)
    {
        return view('home.detail', [
            'event' => $event->load('tickets'),
        ]);
    }

    public function login()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function homelogin()
    {
        return view('dashboard.home');
    }

    public function detailcardlogin()
    {
        return view('dashboard.detailpesananlogin');
    }

    public function detailpesanan(string $payload)
    {
        $data = json_decode(base64_decode($payload), true);
        if (! $data) {
            return back();
        }

        $validator = Validator::make($data, [
            'event_id'              => 'required|numeric|exists:events,id',
            'tickets'               => 'required|array|min:1',
            'tickets.*.id'          => 'required|numeric|exists:tickets,id',
            'tickets.*.quantity'    => 'required|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return back();
        }

        $event = Event::query()->findOrFail($data['event_id']);
        $ticketsQty = collect($data['tickets'])->mapWithKeys(fn (array $ticket) => [
            $ticket['id'] => $ticket['quantity']
        ]);
        $tickets = Ticket::query()
            ->findMany(collect($data['tickets'])->pluck('id'))
            ->map(fn (Ticket $ticket) => (object)[
                'name' => $ticket->name,
                'quantity' => $ticketsQty[$ticket->id],
                'total_price' => $ticket->price * $ticketsQty[$ticket->id],
            ]);
        $subtotal = $tickets->sum('total_price');
        $serviceFee = (int) config('settings.service_fee');
        $grandTotal = $subtotal + $serviceFee;

        return view('dashboard.detailpesanan', [
            'event' => $event,
            'tickets' => $tickets,
            'subtotal' => $subtotal,
            'service_fee' => $serviceFee,
            'grand_total' => $grandTotal,
            'payment_url' => route('order.payment', ['payload' => $payload]),
        ]);
    }

    public function payment(Request $request, string $payload)
    {
        $data = json_decode(base64_decode($payload), true);
        if (! $data) {
            return back();
        }

        $validator = Validator::make($data, [
            'event_id'              => 'required|numeric|exists:events,id',
            'tickets'               => 'required|array|min:1',
            'tickets.*.id'          => 'required|numeric|exists:tickets,id',
            'tickets.*.quantity'    => 'required|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return back();
        }

        DB::transaction(function () use ($request, $data) {
            $ticketsQty = collect($data['tickets'])->mapWithKeys(fn (array $ticket) => [
                $ticket['id'] => $ticket['quantity']
            ]);
            $tickets = Ticket::query()->findMany(collect($data['tickets'])->pluck('id'));
            $subtotal = $tickets->sum(fn (Ticket $ticket) => $ticket->price * $ticketsQty[$ticket->id]);
            $serviceFee = (int) config('settings.service_fee');

            $order = $request->user()->orders()->create([
                'event_id'      => $data['event_id'],
                'unique_code'   => Order::uniqueCode(),
                'subtotal'      => $subtotal,
                'service_fee'   => $serviceFee,
                'grand_total'   => $subtotal + $serviceFee,
                'pay_url'       => 'https://google.com',
                'status'        => 'pending',
                'expired_at'    => now()->addDay(),
            ]);
            $order->tickets()->sync($tickets->mapWithKeys(fn (Ticket $ticket) => [
                $ticket->id => ['price' => $ticket->price, 'quantity' => $ticketsQty[$ticket->id]]
            ]));
            $tickets->each(fn (Ticket $ticket) => $ticket->update([
                'stock' => $ticket->stock - $ticketsQty[$ticket->id]
            ]));
        });

        return view('dashboard.payment');
    }

    public function transaksi(Request $request)
    {
        return view('dashboard.transaksi', [
            'orders' => $request->user()->orders()->with('event')->latest()->get(),
        ]);
    }

    public function tiket(Request $request)
    {
        return view('dashboard.tiket', [
            'orders' => $request->user()->orders()
                ->with('event', 'tickets')
                ->where('status', 'success')
                ->latest()
                ->get()
        ]);
    }

    public function editprofile()
    {
        return view('dashboard.editprofile');
    }

    public function changepwd()
    {
        return view('dashboard.changepassword');
    }
}
