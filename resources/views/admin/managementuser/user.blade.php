@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar-admin></x-slidebar-admin>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Management User
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-fluid">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header mb-3">
                                <div class="d-flex">
                                    <div>
                                        <h3>List User</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable" id="">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Status</th>
                                                <th>Nomer Hp</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach ($user as $itemuser)
                                            <tr>
                                                <td><span class="text-muted">{{$i++}}</span></td>
                                                <td>{{$itemuser->nik}}</td>
                                                <td>{{$itemuser->name}}</td>
                                                <td>{{$itemuser->username}}</td>
                                                <td>{{$itemuser->email}}</td>
                                                <td>{{$itemuser->jenis_kelamin}}</td>
                                                <td>{{$itemuser->status}}</td>
                                                <td>{{$itemuser->nomerhp}}</td>
                                                <td>{{$itemuser->alamat}}</td>
                                                <td width="100px">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        id="edituser"
                                                        data-id="{{Crypt::encrypt($itemuser->id)}}"
                                                        data-bs-toggle="modal" data-bs-target="#UserModal">
                                                        Edit
                                                    </button>
                                                    <form
                                                        action="{{route('admin.user.destroy',Crypt::encrypt($itemuser->id))}}"
                                                        method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <div class="pagination m-0 ms-auto">
                                    {{$user->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</div>
<div class="modal modal-blur fade" id="UserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-user">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Ikhsan">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" placeholder="64546857">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Jln.Kaliurang">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Jln.Kaliurang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Nomer Hp</label>
                                <input type="text" class="form-control" name="nomerhp" placeholder="Jln.Kaliurang">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" name="status" placeholder="Jln.Kaliurang">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin">
                                <option value="">-- Pilih --</option>
                                <option value="1">Laki - Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Create new report
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
