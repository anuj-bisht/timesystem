@section('content')
@section('title', 'Update User')
@extends('../layouts.layout')
@section('content')
<section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title float-right"><a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Back</a></h3>
              </div>
              <!-- /.card-header -->
              <form method="post" action="{{ route('users.update', $user->id) }}"  enctype="multipart/form-data">
              @method('PATCH')
              @csrf 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" require class="form-control" id="firstName" name="first_name" value= "{{ $user->first_name}}" placeholder="Enter First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" require class="form-control" id="last_Name" placeholder="Enter Last Name" value="{{ $user->last_name }}" name="last_name">
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Email address</label>
                    <input type="email" readonly require class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mobileNumber">Mobile Number</label>
                    <input type="text" class="form-control" require id="mobileNumber" placeholder="Enter Mobile Number" name="mobile_number" value="{{ $user->mobile_number}}">
                  </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="emailAddress">User Type</label>
                    <select required class="form-control" name="role">
                      <option value="">Please Select</option>
                      <option @if($user->role == 1) {{ 'selected' }} @endif value="1">Manager</option>
                      <option @if($user->role == 2) {{ 'selected' }} @endif value="2">User</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="emailAddress">Status</label>
                    <select required class="form-control" name="is_active">
                      <option value="">Please Select</option>
                      <option @if($user->is_active == 0) {{ 'selected' }} @endif value="0">Inactive</option>
                      <option @if($user->is_active == 1) {{ 'selected' }} @endif value="1">Active</option>
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
