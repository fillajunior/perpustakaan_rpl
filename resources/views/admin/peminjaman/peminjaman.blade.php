@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    @if (Auth::guard('admin')->check())
    <x-slidebar-admin></x-slidebar-admin>
    @else
    <x-slidebar-operator></x-slidebar-operator>
    @endif
    @livewire('peminjaman-livewire')
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="PeminjamanModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-peminjaman">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Ikhsan">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" placeholder="Rahasia Bisnis">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Kode Buku</label>
                                <input type="text" class="form-control" name="kode_buku">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="isbn" placeholder="65657656">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">No Panggil</label>
                                <input type="text" class="form-control" name="no_panggil" placeholder="No Panggil">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Jenis Peminjaman</label>
                                <input type="text" class="form-control" name="jenis_peminjaman" placeholder="Jenis Peminjaman">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tanggal_pengembalian">
                            </div>
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
