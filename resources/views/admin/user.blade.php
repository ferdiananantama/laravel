@extends('admin.layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                    <h3 class="card-title">Tabel User</h3>
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
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>User Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $i => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $i }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->birthday->format('d F Y') }}</td>
                                    <td>{{ $user->gender === "male" ? "Laki-Laki" : "Perempuan" }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" onclick="setModalData(this)" data-user-no="{{ $users->firstItem() + $i }}" data-user="{{ json_encode($user) }}" data-update-url="{{ route('admin.users.update', $user) }}" data-toggle="modal" data-target="#myModal">Edit</button>
                                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="post">
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
                    {{ $users->links() }}
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
                <form id="modalForm" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputId" class="form-label">No</label>
                            <input type="number" class="form-control" id="exampleInputId" aria-describedby="Id">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputBirthday" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="exampleInputBirthday" name="birthday" aria-describedby="Birthday">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputGender" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" id="genderRadioMale">
                                <label class="form-check-label" for="genderRadioMale">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" id="genderRadioFemale">
                                <label class="form-check-label" for="genderRadioFemale">Perempuan</label>
                            </div>
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
            const user = JSON.parse(event.dataset.user)

            document.querySelectorAll("[id^='exampleInput']").forEach(el => { el.value = null })
            document.querySelectorAll("[id^='genderRadio']").forEach(el => el.setAttribute('checked', false))

            document.getElementById("modalForm").action = event.dataset.updateUrl
            document.getElementById("exampleInputId").value = event.dataset.userNo
            document.getElementById("exampleInputName").value = user.name
            document.getElementById("exampleInputEmail").value = user.email
            document.getElementById("exampleInputBirthday").value = user.birthday.substring(0, 10)
            document.getElementById("genderRadioMale").checked = user.gender === "male"
            document.getElementById("genderRadioFemale").checked = user.gender === "female"
        }
    </script>
@endpush
