@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar></x-slidebar>
    @livewire('peminjaman-user-livewire')
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
