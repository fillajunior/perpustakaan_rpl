<div class="page-wrapper">
    <div class="container-fluid">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Katagori
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" id="addkatagori"
                            data-url="/perpustakaan" data-bs-toggle="modal" data-bs-target="#KatagoriModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Katagori
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" id="addkatagori" data-url="/perpustakaan"
                            data-bs-toggle="modal" data-bs-target="#KatagoriModal" aria-label="Add Katagori">
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
                            <h3>List Katagori</h3>
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
                                        <th>Kode Katagori</th>
                                        <th>Nama Katagori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($katagori as $itemkatagori)
                                    <tr>
                                        <td><span class="text-muted">{{$i++}}</span></td>
                                        <td>{{$itemkatagori->kode_katagori}}</td>
                                        <td>{{$itemkatagori->nama_katagori}}</td>
                                        <td width="100px">
                                            <button type="button" class="btn btn-secondary btn-sm" id="editkatagori"
                                                data-url="/perpustakaan" data-id="{{Crypt::encrypt($itemkatagori->id)}}"
                                                data-bs-toggle="modal" data-bs-target="#KatagoriModal">
                                                Edit
                                            </button>
                                            <form action="/katagori/destroy/{{Crypt::encrypt($itemkatagori->id)}}"
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
                                {{$katagori->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
