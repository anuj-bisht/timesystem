@section('content')
@section('title', 'Assign Project')
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
                <h3 class="card-title float-right"><a href="{{ route('assign.index') }}" class="btn btn-primary btn-sm">Back</a></h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{ route('assign.store') }}"  enctype="multipart/form-data">
              @csrf 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="Name"> Project</label>
                    <select class="form-control" required name="project_id">
                      <option value="">Please Select</option>
                      @foreach($projects as $project)
                      <option value="{{$project->id}}">{{$project->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="emailAddress">User</label>
                    <select class="form-control" multiple required name="user_id[]">
                      <option value="">Please Select</option>
                      @foreach($users as $user)
                      <option value="{{$user->id}}">{{ $user->first_name.' '.$user->last_name; }}</option>
                      @endforeach
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
