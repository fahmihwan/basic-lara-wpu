@extends('layout.layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 ">
        <main class="form-registeraion">
            <h1 class="h3 mb-3 fw-normal text-center">Registeration Form</h1>
            <form>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control rounded-top" id="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">All ready registered? <a href="/login">Register Now!</a></small>
        </main>
    </div>
</div>

@endsection