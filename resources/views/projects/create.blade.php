@section('content')
@section('title', 'Create Project')
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
                <h3 class="card-title float-right"><a href="{{ route('projects.index') }}" class="btn btn-primary btn-sm">Back</a></h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{ route('projects.store') }}"  enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="Name"> Name</label>
                    <input type="text" required value="{{ old('name') }}"  class="form-control" id="name" name="name" placeholder="Enter  Name">
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="emailAddress">Description</label>
                    <textarea required name="description"  class="form-control">{{Request::old('description')}} </textarea>
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
