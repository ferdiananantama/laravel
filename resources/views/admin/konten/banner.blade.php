@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
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
                        <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td class="text-center">{{ $banner->order }}</td>
                                    <td class="text-center">
                                        <img src="{{ $banner->image_url }}" width="auto" height="240" />
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning" onclick="setModalData(this)" data-banner="{{ json_encode($banner) }}" data-update-url="{{ route('admin.banners.update', $banner) }}" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <form action="{{ route('admin.banners.destroy', ['banner' => $banner]) }}" method="post">
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
                    {{ $banners->links() }}
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
                <form action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="order" class="form-label">No</label>
                            <input type="number" class="form-control" id="order" name="order" aria-describedby="Id">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload gambar</label>
                            <input type="file" accept="image/jpeg, image/png, image/webp" class="form-control-file" id="image" name="image" aria-describedby="Name">
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
                        <h4 class="modal-title">Edit Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="order" class="form-label">No</label>
                            <input type="number" class="form-control" id="order" name="order" aria-describedby="Id">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload gambar</label>
                            <input type="file" accept="image/jpeg, image/png, image/webp" class="form-control-file" id="image" name="image" aria-describedby="Name">
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
            const banner = JSON.parse(event.dataset.banner)
            const form = document.querySelector('#editModalForm')

            form.action = event.dataset.updateUrl
            form.querySelector('input[name="order"]').value = banner.order
        }
    </script>
@endpush
