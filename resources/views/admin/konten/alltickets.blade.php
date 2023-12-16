@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Semua Tiket</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">All tickets</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Produk</a>

                        <div class="card-tools">
                            <form method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" value="{{ request()->query('search') }}" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Event</th>
                            <th class="text-center">Jenis Tiket</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Harga Tiket</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $i => $ticket)
                                <tr>
                                    <td class="text-center">{{ $tickets->firstItem() + $i }}</td>
                                    <td class="text-center">{{ $ticket->event->name }}</td>
                                    <td class="text-center">{{ $ticket->name }}</td>
                                    <td class="text-center">{{ $ticket->stock }}</td>
                                    <td class="text-center">Rp {{ number_format($ticket->price) }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning" onclick="setModalData(this)" data-no="{{ $tickets->firstItem() + $i }}" data-ticket="{{ json_encode($ticket) }}" data-update-url="{{ route('admin.tickets.update', $ticket) }}" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <form action="{{ route('admin.tickets.destroy', ['ticket' => $ticket]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button)>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                    {{ $tickets->links() }}
                </div>
                <!-- /.card -->
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Tambah Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ route('admin.tickets.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Tiket</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Event</label>
                            <select class="form-select col-md-12 form-control" name="event_id" aria-label="Default select example" required>
                                <option disabled>Pilih Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Tiket</label>
                            <select class="form-select col-md-12 form-control" name="name" aria-label="Default select example" required>
                                <option disabled>Pilih Tiket</option>
                                <option value="VIP">VIP</option>
                                <option value="Regular">Regular</option>
                                <option value="Festival 1">Festival 1</option>
                                <option value="Festival 2">Festival 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="exampleInputId" name="stock" aria-describedby="Id" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">Harga Tiket</label>
                            <input type="number" class="form-control" id="exampleInputId" name="price" aria-describedby="Id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="editModalForm" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Tiket</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Event</label>
                            <select class="form-select col-md-12 form-control" name="event_id" aria-label="Default select example" required>
                                <option selected disabled>Pilih Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Tiket</label>
                            <select class="form-select col-md-12 form-control" name="name" aria-label="Default select example" required>
                                <option selected disabled>Pilih Tiket</option>
                                <option value="VIP">VIP</option>
                                <option value="Regular">Regular</option>
                                <option value="Festival 1">Festival 1</option>
                                <option value="Festival 2">Festival 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="exampleInputId" name="stock" aria-describedby="Id" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">Harga Tiket</label>
                            <input type="number" class="form-control" id="exampleInputId" name="price" aria-describedby="Id" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function setModalData(event) {
            const data = JSON.parse(event.dataset.ticket)
            const form = document.querySelector('#editModalForm')
            form.action = event.dataset.updateUrl
            form.querySelector('select[name="event_id"]').value = data.event.id
            form.querySelector('select[name="name"]').value = data.name
            form.querySelector('input[name="stock"]').value = data.stock
            form.querySelector('input[name="price"]').value = data.price
        }
    </script>
@endpush
