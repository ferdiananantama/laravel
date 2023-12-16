@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Semua Event</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">All events</li>
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
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Line Up</th>
                            <th class="text-center">Recomended</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Lokasi</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $i => $event)
                                <tr>
                                    <td class="text-center">{{ $events->firstItem() + $i }}</td>
                                    <td class="text-center">{{ $event->name }}</td>
                                    <td class="text-truncate" style="max-width: 120px;">{{ $event->about }}</td>
                                    <td class="text-center text-truncate" style="max-width: 120px;">{{ $event->lineup }}</td>
                                    <td class="text-center">{{ $event->is_recommended ? "1" : "0" }}</td>
                                    <td class="text-center">{{ $event->date->format('d F Y') }}</td>
                                    <td class="text-center">{{ $event->location }}</td>
                                    <td class="text-center">
                                        <img src="{{ $event->image_url }}" width="auto" height="128" />
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning" onclick="setModalData(this)" data-event="{{ json_encode($event) }}" data-update-url="{{ route('admin.events.update', $event) }}" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <form action="{{ route('admin.events.destroy', ['event' => $event]) }}" method="post">
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
                    {{ $events->links() }}
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
                <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Event</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="exampleInputName" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="exampleInputName" name="about" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Line Up</label>
                            <input type="text" class="form-control" id="exampleInputName" name="lineup" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Tentang Tiket</label>
                            <input type="text" class="form-control" id="exampleInputName" name="about_ticket" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Petunjuk Penukaran Tiket</label>
                            <input type="text" class="form-control" id="exampleInputName" name="ticket_redemption" aria-describedby="Name" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="is_recommended" name="is_recommended" value="1">
                            <label class="form-check-label" for="is_recommended">Recommended</label>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputBirthday" class="form-label">Tanggal Event</label>
                            <input type="date" class="form-control" id="exampleInputBirthday" name="date" aria-describedby="Birthday" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_start" class="form-label">Waktu Mulai Event</label>
                            <input type="time" class="form-control" id="time_start" name="time_start" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_end" class="form-label">Waktu Berakhir Event</label>
                            <input type="time" class="form-control" id="time_end" name="time_end">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="exampleInputName" name="location" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Upload gambar</label>
                            <input type="file" accept="image/jpeg, image/png, image/webp" class="form-control-file" id="exampleInputName" name="image" aria-describedby="Name" required>
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
            <form id="editModalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Event</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="exampleInputName" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="exampleInputName" name="about" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Line Up</label>
                            <input type="text" class="form-control" id="exampleInputName" name="lineup" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Tentang Tiket</label>
                            <input type="text" class="form-control" id="exampleInputName" name="about_ticket" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Petunjuk Penukaran Tiket</label>
                            <input type="text" class="form-control" id="exampleInputName" name="ticket_redemption" aria-describedby="Name" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="is_recommended" name="is_recommended" value="1">
                            <label class="form-check-label" for="is_recommended">Recommended</label>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputBirthday" class="form-label">Tanggal Event</label>
                            <input type="date" class="form-control" id="exampleInputBirthday" name="date" aria-describedby="Birthday" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_start" class="form-label">Waktu Mulai Event</label>
                            <input type="time" class="form-control" id="time_start" name="time_start" required>
                        </div>
                        <div class="mb-3">
                            <label for="time_end" class="form-label">Waktu Berakhir Event</label>
                            <input type="time" class="form-control" id="time_end" name="time_end">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="exampleInputName" name="location" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Upload gambar</label>
                            <input type="file" accept="image/jpeg, image/png, image/webp" class="form-control-file" id="exampleInputName" name="image" aria-describedby="Name">
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
            const data = JSON.parse(event.dataset.event)
            data.date = data.date.substr(0, 10)
            data.time_start = data.time_start.substr(11, 5)
            data.time_end = data.time_end?.substr(11, 5)

            const form = document.querySelector('#editModalForm')
            form.action = event.dataset.updateUrl
            form.querySelectorAll('input:not([type="checkbox"]):not([type="file"]):not([type="hidden"])').forEach(el => {
                console.log(el.name)
                console.log(data[el.name])
                el.value = data[el.name]
            })
            form.querySelector('input[type="checkbox"]').checked = data.is_recommended
        }
    </script>
@endpush
