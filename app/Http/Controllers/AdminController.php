<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function user(Request $request)
    {
        return view('admin.user', [
            'users' => User::query()
                ->when($request->query('search'), function (Builder $query, string $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(),
        ]);
    }

    public function userUpdate(Request $request, User $user)
    {
        (new UpdateUserProfileInformation)->update($user, $request->all());

        return back();
    }

    public function userDestroy(Request $request, User $user)
    {
        $user->delete();

        return back();
    }

    public function banner()
    {
        return view('admin.konten.banner', [
            'banners' => Banner::query()->orderBy('order')->paginate(),
        ]);
    }

    public function bannerStore(Request $request)
    {
        $request->validate([
            'order' => 'required|numeric',
            'image' => 'required|image',
        ]);

        Banner::create([
            'order' => $request->order,
            'image_path' => $request->file('image')->store('banners', 'public'),
        ]);

        return back();
    }

    public function bannerUpdate(Request $request, Banner $banner)
    {
        $request->validate([
            'order' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $banner->image_path = $request->file('image')->store('banners', 'public');
        }
        $banner->order = $request->order;
        $banner->save();

        return back();
    }

    public function bannerDestroy(Request $request, Banner $banner)
    {
        Storage::disk('public')->delete($banner->image_path);

        $banner->delete();

        return back();
    }

    public function event(Request $request)
    {
        return view('admin.konten.recticket', [
            'events' => Event::query()
                ->when($request->query('search'), function (Builder $query, string $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(),
        ]);
    }

    public function eventStore(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:250',
            'about'                 => 'required|string',
            'lineup'                => 'required|string',
            'about_ticket'          => 'required|string',
            'ticket_redemption'     => 'required|string',
            'date'                  => 'required|string',
            'time_start'            => 'required|string',
            'time_end'              => 'nullable|string',
            'location'              => 'required|string|max:250',
            'is_recommended'        => 'required|boolean',
            'image'                 => 'required|image',
        ]);

        $data = collect($validated)
            ->except('image')
            ->put('image_path', $request->file('image')->store('events', 'public'));

        Event::create($data->toArray());

        return back();
    }

    public function eventUpdate(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:250',
            'about'                 => 'required|string',
            'lineup'                => 'required|string',
            'about_ticket'          => 'required|string',
            'ticket_redemption'     => 'required|string',
            'date'                  => 'required|string',
            'time_start'            => 'required|string',
            'time_end'              => 'nullable|string',
            'location'              => 'required|string|max:250',
            'is_recommended'        => 'required|boolean',
            'image'                 => 'nullable|image',
        ]);

        $data = collect($validated)->except('image');

        if ($request->hasFile('image')) {
            $data->put('image_path', $request->file('image')->store('events', 'public'));
        }

        $event->update($data->toArray());

        return back();
    }

    public function eventDestroy(Request $request, Event $event)
    {
        Storage::disk('public')->delete($event->image_path);

        $event->delete();

        return back();
    }

    public function ticket(Request $request)
    {
        return view('admin.konten.alltickets', [
            'events' => Event::query()->latest()->get(['id', 'name']),
            'tickets' => Ticket::query()
                ->with('event')
                ->when($request->query('search'), function (Builder $query, string $search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhereRelation('event', 'name', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(),
        ]);
    }

    public function ticketStore(Request $request)
    {
        $validated = $request->validate([
            'event_id'  => 'required|numeric|exists:events,id',
            'name'      => 'required|string|max:250',
            'stock'     => 'required|numeric|min:0',
            'price'     => 'required|numeric|min:0',
        ]);

        Ticket::create($validated);

        return back();
    }

    public function ticketUpdate(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'event_id'  => 'required|numeric|exists:events,id',
            'name'      => 'required|string|max:250',
            'stock'     => 'required|numeric|min:0',
            'price'     => 'required|numeric|min:0',
        ]);

        $ticket->update($validated);

        return back();
    }

    public function ticketDelete(Request $request, Ticket $ticket)
    {
        $ticket->delete();

        return back();
    }

    public function sell(){
        return view('admin.sell');
    }

    public function transaction(Request $request)
    {
        return view('admin.transaction', [
            'orders' => Order::query()
                ->when($request->query('search'), function (Builder $query, string $search) {
                    $query->where('unique_code', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(),
        ]);
    }

    public function transactionUpdate(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:success,pending,failed'
        ]);

        $order->update($validated);

        return back();
    }

    public function transactionDestroy(Request $request, Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->tickets()->detach();
            $order->delete();
        });

        return back();
    }
}
