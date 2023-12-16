@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
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
                        <h3 class="card-title">Tabel Transaksi</h3>
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
                                <th>No</th>
                                <th>User Id</th>
                                <th>Kode Pemesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $i => $order)
                                <tr>
                                    <td>{{ $orders->firstItem() + $i }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->unique_code }}</td>
                                    <td>{{ $order->created_at->format('d F Y') }}</td>
                                    <td>Rp {{ number_format($order->grand_total) }}</td>
                                    <td>{{ ucwords($order->status) }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" onclick="setModalData(this)" data-order="{{ json_encode($order) }}" data-update-url="{{ route('admin.transactions.update', $order) }}" data-toggle="modal" data-target="#myModal">Edit</button>
                                        <form action="{{ route('admin.transactions.destroy', ['order' => $order]) }}" method="post">
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
                    {{ $orders->links() }}
                </div>
                <!-- /.card -->
                </div>
            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="editModalForm" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Transaction</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="unique_code" class="form-label">Kode Pemesanan</label>
                            <input type="text" class="form-control" id="unique_code" name="unique_code" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select col-md-12 form-control" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                                <option value="failed">Failed</option>
                            </select>
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
            const data = JSON.parse(event.dataset.order)
            const form = document.querySelector('#editModalForm')
            form.action = event.dataset.updateUrl
            form.querySelector('input[name="unique_code"]').value = data.unique_code
            form.querySelector('select[name="status"]').value = data.status
        }
    </script>
@endpush
