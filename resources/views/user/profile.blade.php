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
                <div class="row row-cards">
                    <div class="col-md-4">
                        <div class="card card-link mb-2" href="#">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        @if (Auth::user()->image)
                                        <span class="avatar rounded"
                                            style="background-image: url({{ Storage::url(Auth::user()->image) }})"></span>
                                        @else
                                        <span class="avatar rounded"
                                            style="background-image: url({{ asset('static/avatars/avatar.jpg') }})"></span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">{{ Auth::user()->name }}</div>
                                        <div class="text-muted">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-vertical">
                            <li class="nav-item">
                                <a class="nav-link{{ request()->is('account') ? ' active' : null }}" href="">
                                    Account & Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-important alert-success alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                </div>
                                <div>
                                    {{$message}}
                                </div>
                            </div>
                            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                        <form method="POST" action="" class="card" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label required">Username</label>
                                            <input name="email" id="email" type="email" class="form-control "
                                                placeholder="Email" value="{{Auth::guard('user')->user()->username}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label required">Name</label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Name" value="{{Auth::guard('user')->user()->name}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="numeric" class="form-control" placeholder="Number Phone"
                                                value="{{Auth::guard('user')->user()->nomerhp}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Home Address"
                                                value="{{Auth::guard('user')->user()->alamat}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">NIK</label>
                                            <input type="text" class="form-control" placeholder="46578798746344"
                                                value="{{Auth::guard('user')->user()->nik}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="hill.shany@will.com"
                                                value="{{Auth::guard('user')->user()->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <input type="text" class="form-control" placeholder="Mahasiswa"
                                                value="{{Auth::guard('user')->user()->status}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 card-profile">
                                        <div class="card">

                                            <div class="rounded image-profile"
                                                style="background-image: url({{ asset('static/avatars/avatar.jpg') }});">
                                            </div>
                                        </div>
                                        <input type="file" class="form-control" style="color: black" id="image"
                                            name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary w-100" id="update_profile">Update
                                    Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</div>
@endsection
