<div class="page-wrapper">
    <div class="container-fluid">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Pengembalian
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
                        <div class="card-header">
                            <h3>List Pengembalian</h3>
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
                                        <th>ID Pengembalian</th>
                                        <th>Nama</th>
                                        <th>Kode Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>keterlambatan</th>
                                        <th>jumlah_buku</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengembalian as $itempengembalian)
                                    <tr>
                                        <td>{{$itempengembalian->id_pengembalian}}</td>
                                        <td>{{$itempengembalian->nama}}</td>
                                        <td>{{$itempengembalian->kode_buku}}</td>
                                        <td>{{$itempengembalian->tanggal_peminjaman}}</td>
                                        <td>{{$itempengembalian->tanggal_pengembalian}}</td>
                                        <td>{{$itempengembalian->keterlambatan}}</td>
                                        <td>{{$itempengembalian->jumlah_buku}}</td>
                                        <td width="100px">
                                            <button type="button" class="btn btn-secondary btn-sm" id="editpengembalian"
                                                data-url="/perpustakaan"
                                                data-id="{{Crypt::encrypt($itempengembalian->id)}}"
                                                data-bs-toggle="modal" data-bs-target="#PengembalianModal">
                                                Edit
                                            </button>
                                            <form
                                                action="{{route('admin.pengembalian.destroy',Crypt::encrypt($itempengembalian->id))}}"
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
                        <div class="card-footer d-flex align-items-center">
                            <div class="pagination m-0 ms-auto">
                                {{$pengembalian->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
