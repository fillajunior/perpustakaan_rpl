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
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" id="addbuku"
                            data-url="/perpustakaan" data-bs-toggle="modal" data-bs-target="#BukuModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Buku
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" id="addbuku" data-url="/perpustakaan"
                            data-bs-toggle="modal" data-bs-target="#BukuModal" aria-label="Add Buku">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </a>
                    </div>
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
                            <h3>List Buku</h3>
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
                                        <th class="w-1">No.</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Jumlah Buku</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($book as $itembook)
                                    <tr>
                                        <td><span class="text-muted">{{$i++}}</span></td>
                                        <td>{{$itembook->judul_buku}}</td>
                                        <td>{{$itembook->pengarang}}</td>
                                        <td>{{$itembook->penerbit}}</td>
                                        <td>{{$itembook->jumlah_buku}}</td>
                                        <td width="100px">
                                            <button type="button" class="btn btn-secondary btn-sm" id="editbuku"
                                                data-url="/perpustakaan" data-id="{{Crypt::encrypt($itembook->id)}}"
                                                data-bs-toggle="modal" data-bs-target="#BukuModal">
                                                Edit
                                            </button>
                                            <form action="/book/destroy/{{Crypt::encrypt($itembook->id)}}" method="post"
                                                class="d-inline">
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
                                {{$book->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
