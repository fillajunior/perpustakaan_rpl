@extends('layouts.layouts',['layout' => 'auth'])
@section('title',$title)
@section('content')
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{route('register')}}" method="POST">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create new account</h2>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="user@user.com" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nik</label>
                    <input type="text" class="form-control" placeholder="32546547658" name="nik">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="Jln.Kaliurang km 6" name="alamat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomer Hp</label>
                    <input type="text" class="form-control" placeholder="6202356546547" name="nomerhp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off"
                            name="password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Confirmed</label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off"
                            name="password_confirmation">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin" value="1" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="14" r="5" />
                                    <line x1="19" y1="5" x2="13.6" y2="10.4" />
                                    <line x1="19" y1="5" x2="14" y2="5" />
                                    <line x1="19" y1="5" x2="19" y2="10" />
                                </svg>
                                Laki-Laki
                            </span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="jenis_kelamin" value="2" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="9" r="5" />
                                    <line x1="12" y1="14" x2="12" y2="21" />
                                    <line x1="9" y1="18" x2="15" y2="18" />
                                </svg>
                                Perempuan
                            </span>
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="tos" />
                        <span class="form-check-label">Agree the <a href="" tabindex="-1">terms
                                and policy</a>.</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Create new account</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Already have account? <a href="{{route('login')}}" tabindex="-1">Sign in</a>
        </div>
    </div>
</div>
@endsection
