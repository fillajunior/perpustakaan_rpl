@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar></x-slidebar>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Daftar Buku
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
                                        <h3>List Buku</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable" id="">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Katagori</th>
                                                <th>Tahun Penerbit</th>
                                                @auth('user')
                                                <th>Action</th>
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach ($book as $itembook)
                                            @php
                                                $category = DB::table('katagoris')->where('kode_katagori',$itembook->jenis_buku)->first();
                                                $checkouts = DB::table('checkouts')->where('isbn',$itembook->isbn)->first();
                                            @endphp
                                            <tr>
                                                <td><span class="text-muted">{{$i++}}</span></td>
                                                <td>{{$itembook->judul_buku}}</td>
                                                <td>{{$itembook->pengarang}}</td>
                                                <td>{{$itembook->penerbit}}</td>
                                                <td>{{$category->nama_katagori}}</td>
                                                <td>{{$itembook->tahun_penerbit}}</td>
                                                @auth('user')
                                                <td width="100px">
                                                    @if ($checkouts != null)
                                                    In Cart
                                                    @else
                                                    <button type="button" class="btn btn-secondary btn-sm" id="pilihbuku" data-id="{{Crypt::encrypt($itembook->id)}}" data-bs-toggle="modal" data-bs-target="#CkeckoutModal">
                                                        Pilih
                                                    </button>
                                                    @endif
                                                </td>
                                                @endauth
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <div class="pagination m-0 ms-auto">
                                    {{$book->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="CkeckoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-pilih">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku"
                                    placeholder="C# Basic" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Kode Barcode</label>
                                <input type="text" class="form-control" name="isbn"
                                    placeholder="64546857" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Pengarang</label>
                                <input type="text" class="form-control" name="pengarang"
                                    placeholder="Andre Steven" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Penerbit</label>
                                <input type="text" class="form-control" name="penerbit"
                                    placeholder="PT.Bongkar sejahtera" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Letak Buku</label>
                                <input type="text" class="form-control" name="letak_buku"
                                    placeholder="1A" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Asal Buku</label>
                                <input type="text" class="form-control" name="asal_buku"
                                    placeholder="Donasi" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Jumlah Buku</label>
                                <input type="text" class="form-control" name="jumlah_buku"
                                    placeholder="80" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Tahun Penerbit</label>
                                <input type="text" class="form-control" name="tahun_penerbit"
                                    placeholder="2021" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Buku</label>
                            <select class="form-select" name="jenis_buku" disabled>
                                <option value="" >-- Pilih --</option>
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
