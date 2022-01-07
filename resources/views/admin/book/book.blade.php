@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    @if (Auth::guard('admin')->check())
    <x-slidebar-admin></x-slidebar-admin>
    @else
    <x-slidebar-operator></x-slidebar-operator>
    @endif
    @livewire('buku-livewire')
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="BukuModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-buku">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control @error('judul_buku')is-invalid @enderror" name="judul_buku"
                                    placeholder="C# Basic">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Kode Barcode</label>
                                <input type="text" class="form-control @error('isbn')is-invalid @enderror" name="isbn"
                                    placeholder="64546857">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Pengarang</label>
                                <input type="text" class="form-control @error('pengarang')is-invalid @enderror" name="pengarang"
                                    placeholder="Andre Steven">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Penerbit</label>
                                <input type="text" class="form-control @error('penerbit')is-invalid @enderror" name="penerbit"
                                    placeholder="PT.Bongkar sejahtera">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Letak Buku</label>
                                <input type="text" class="form-control @error('letak_buku')is-invalid @enderror" name="letak_buku"
                                    placeholder="1A">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Asal Buku</label>
                                <input type="text" class="form-control @error('asal_buku')is-invalid @enderror" name="asal_buku"
                                    placeholder="Donasi">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Jumlah Buku</label>
                                <input type="text" class="form-control @error('jumlah_buku')is-invalid @enderror" name="jumlah_buku"
                                    placeholder="80">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Tahun Penerbit</label>
                                <input type="text" class="form-control @error('tahun_penerbit')is-invalid @enderror" name="tahun_penerbit"
                                    placeholder="2021">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Buku</label>
                            <select class="form-select @error('jenis_buku')is-invalid @enderror" name="jenis_buku">
                                <option value="">-- Pilih --</option>
                                @foreach ($katagori as $itemkatagori)
                                <option value="{{$itemkatagori->kode_katagori}}">{{$itemkatagori->nama_katagori}}</option>
                                @endforeach
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
