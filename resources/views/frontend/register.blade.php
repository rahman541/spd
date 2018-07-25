@extends('frontend.layout')

@section('content')
    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1>Register New User</h1><br/>

        @include('common.alert')
        @include('common.form_error')

        <form method="POST" action="{{ route('user.register.post') }}">
          @csrf
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input name="name" type="name" class="form-control" id="inputName" placeholder="Name" value="{{ old('name') }}">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ old('email') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputIc" class="col-sm-2 col-form-label">IC No</label>
            <div class="col-sm-10">
              <input name="ic" type="text" class="form-control" id="inputIc" placeholder="IC No without dash (-)" value="{{ old('ic') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </div>
        </form>

      </div>
    </section>
@endsection