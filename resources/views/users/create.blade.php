@section('content')
@section('title', 'Create User')
@extends('../layouts.layout')
@section('content')
<section class="content">
      <div class="container-fluid">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="card">
              <div class="card-header">
                <h3 class="card-title float-right"><a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Back</a></h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{ route('users.store') }}"  enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" required value="{{ old('first_name') }}"  class="form-control" id="firstName" name="first_name" placeholder="Enter First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" required class="form-control"  value="{{ old('last_Name') }}"  id="last_Name" placeholder="Enter Last Name" name="last_name">
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Email address</label>
                    <input type="email" required class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobileNumber">Mobile Number</label>
                    <input type="text" class="form-control" required id="mobileNumber" value="{{ old('mobile_number') }}" placeholder="Enter Mobile Number" name="mobile_number">
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="emailAddress">User Type</label>
                    <select required class="form-control" name="role">
                      <option value="">Please Select</option>
                      <option value="1">Manager</option>
                      <option value="2">User</option>
                    </select>
                  </div>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
       
      </div><!-- /.container-fluid -->
    </section>
    @endsection
