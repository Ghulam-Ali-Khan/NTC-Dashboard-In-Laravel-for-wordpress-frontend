@extends('layouts.body')


@section('title')
    NTC Login
@endsection

@section('body')
    <div class="container" >
<div class="row justify-content-center">
    <div class="col-lg-5  rounded shadow" style="background-color: white">
        <form class="py-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember</label>
            </div>
            <div class="login-btn d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mt-2" style="margin: auto">Login</button>
        </div>
          </form>
    </div>
</div>
    </div>
@endsection



@section('css')
body{
    {{-- background-color:yellow; --}}
    display:flex;
    align-items:center;
    min-height:100vh;

}

@endsection