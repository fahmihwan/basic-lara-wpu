@extends('layout.layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 ">
        <main class="form-registeraion">
            <h1 class="h3 mb-3 fw-normal text-center">Registeration Form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{old('name')}}">
                    <label for="name">Name</label>
                    @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror rounded-top" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror " id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror rounded-bottom" id="password" placeholder="Password" required>
                    <label for=" password">Password</label>
                    @error('password')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">All ready registered? <a href="/login">Register Now!</a></small>
        </main>
    </div>
</div>

@endsection