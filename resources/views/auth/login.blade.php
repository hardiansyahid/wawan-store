@extends('layout.auth.baseAuth')
@section('title', 'Login Wawan Store')
@section('content')
    <div class="row justify-content-center w-100 vh-100 flex">
        <div class="col-lg-4 align-self-center">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Wawan Store</h3></div>
                <div class="card-body">
                    <form action="{{url('/auth/doLogin')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" placeholder="Username" />
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" placeholder="Password" />
                            <label for="password">Password</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <a href="{{url('/')}}" class="text-decoration-none" >Kembali ke Landing Page</a>
                </div>
            </div>
        </div>
    </div>
@endsection
