<div class="page-wrapper">
    <div class="container-fluid">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Management Operator
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" id="addoperator"
                            data-bs-toggle="modal" data-bs-target="#OperatorModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Operator
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" id="addoperator" data-bs-toggle="modal"
                            data-bs-target="#OperatorModal" aria-label="Add Operator">
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
                            <h3>List Operator</h3>
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($operator as $itemoperator)
                                    <tr>
                                        <td><span class="text-muted">{{$i++}}</span></td>
                                        <td>{{$itemoperator->nik}}</td>
                                        <td>{{$itemoperator->name}}</td>
                                        <td>{{$itemoperator->username}}</td>
                                        <td>{{$itemoperator->jenis_kelamin}}</td>
                                        <td>{{$itemoperator->tanggal_lahir}}</td>
                                        <td>{{$itemoperator->alamat}}</td>
                                        <td width="100px">
                                            <button type="button" class="btn btn-secondary btn-sm" id="editoperator"
                                                data-id="{{Crypt::encrypt($itemoperator->id)}}" data-bs-toggle="modal"
                                                data-bs-target="#OperatorModal">
                                                Edit
                                            </button>
                                            <form
                                                action="{{route('admin.operator.destroy',Crypt::encrypt($itemoperator->id))}}"
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
                                {{$operator->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
