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
                                <h3>List Buku</h3>
                            </div>
                            <div class="card-body border-bottom">
                                <div class="d-flex">
                                    <div class="ms-auto text-muted">
                                       <button type="button" class="btn btn-secondary" id="checkoutall"
                                            data-bs-toggle="modal" data-bs-target="#CkeckoutModal">
                                            Checkout All
                                        </button>
                                    </div>
                                </div>
                            </div>
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
                                        @foreach ($checkout as $itemcheckout)
                                        {{-- {{dd($itemcheckout)}} --}}
                                        <tr>
                                            <td><span class="text-muted">{{$i++}}</span></td>
                                            <td>{{$itemcheckout->judul_buku}}</td>
                                            <td>{{$itemcheckout->pengarang}}</td>
                                            <td>{{$itemcheckout->penerbit}}</td>
                                            <td>{{$itemcheckout->nama_katagori}}</td>
                                            <td>{{$itemcheckout->tahun_penerbit}}</td>
                                            @auth('user')
                                            <td width="100px">
                                                <button type="button" class="btn btn-secondary btn-sm" id="checkout"
                                                    data-id="{{Crypt::encrypt($itemcheckout->isbn)}}"
                                                    data-bs-toggle="modal" data-bs-target="#CkeckoutModal">
                                                    Checkout
                                                </button>
                                            </td>
                                            @endauth
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <div class="pagination m-0 ms-auto">
                                    {{$checkout->links()}}
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
            <div class="body-checkout">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="checkout">
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
