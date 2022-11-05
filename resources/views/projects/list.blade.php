
@section('content')
@section('title', 'Project List')
@extends('../layouts.layout')
@section('content')
<section class="content">
<div class="card-body">     
                 <div class="alert alert-block" id="info" style="color: #fff;background-color: #28a745;border-color: #23923d;display: none;">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>User Status Updated Successfully.</strong>
                        </div>  
                @if ($message = Session::get('flash_message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('flash_message_warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                </div>
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title float-right"><a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">Add</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($projects as $project)
                  <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td><a class="btn btn-success" href="{{ route('projects.edit',$project->id)}}">Edit</a> 
                     <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                              onclick="return confirm('are you sure you want to delete this project')">
                          Delete
                      </button>
                  </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
       
      </div><!-- /.container-fluid -->
    </section>
    @endsection
   

   
