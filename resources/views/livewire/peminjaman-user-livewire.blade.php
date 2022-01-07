<div class="page-wrapper">
    <div class="container-fluid">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Peminjaman
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
                            <h3>List Peminjaman</h3>
                        </div>
                        <div class="card-body border-bottom">
                            <div class="d-flex">
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control" wire:model="search"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="">
                                <thead>
                                    <tr>
                                        <th>ID Peminjaman</th>
                                        <th>Nama</th>
                                        <th>Kode Buku</th>
                                        <th>No Panggilan</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $itempeminjaman)
                                    <tr>
                                        <td>{{$itempeminjaman->id_peminjaman}}</td>
                                        <td>{{$itempeminjaman->nama}}</td>
                                        <td>{{$itempeminjaman->kode_buku}}</td>
                                        <td>{{$itempeminjaman->no_panggil}}</td>
                                        <td>{{$itempeminjaman->tanggal_peminjaman}}</td>
                                        <td>{{$itempeminjaman->tanggal_pengembalian}}</td>
                                        <td width="100px">
                                            <button type="button" class="btn btn-secondary btn-sm" id="showpeminjaman"
                                                data-id="{{Crypt::encrypt($itempeminjaman->id)}}" data-bs-toggle="modal"
                                                data-bs-target="#PeminjamanModal">
                                                Show
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <div class="pagination m-0 ms-auto">
                                {{$peminjaman->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
