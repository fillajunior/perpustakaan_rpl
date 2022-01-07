@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar-admin></x-slidebar-admin>
    @livewire('operator-livewire')
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="OperatorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-operator">
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
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Jln.Kaliurang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-flat">
                                    <input type="text" class="form-control" placeholder="Password" id="passwordoperator"
                                        autocomplete="off" name="password">
                                    <span class="input-group-text">
                                        <a class="link-secondary" title="Show password" id="generate">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                <path d="M10 9v6l5 -3z" /></svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
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
