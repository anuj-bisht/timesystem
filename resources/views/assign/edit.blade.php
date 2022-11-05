@section('content')
@section('title', 'Update User')
@extends('../layouts.layout')
@section('content')
<section class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title float-right"><a href="{{ route('projects.index') }}" class="btn btn-primary btn-sm">Back</a></h3>
              </div>
              <!-- /.card-header -->
              <form method="post" action="{{ route('projects.update', $project->id) }}"  enctype="multipart/form-data">
              @method('PATCH')
              @csrf 
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" require class="form-control" id="name" name="name" value= "{{ $project->name}}" placeholder="Enter  Name">
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="emailAddress">Description</label>
                    <textarea required name="description" class="form-control">{{ $project->description}}</textarea>
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
