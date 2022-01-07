@extends('layouts.layouts',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    @if (Auth::guard('admin')->check())
    <x-slidebar-admin></x-slidebar-admin>
    @else
    <x-slidebar-operator></x-slidebar-operator>
    @endif
    @livewire('katagori-livewire')
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="KatagoriModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-katagori">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Katagori</label>
                            <input type="text" class="form-control" name="katagori"
                                placeholder="Pengetahuan">
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
