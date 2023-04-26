@extends('todolist.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>TodoList CRUD Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('todolist.create') }}"> Add a new todo</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Description</th>
            <th>Target Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($todolist as $todolist)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $todolist->description }}</td>
            <td>{{ $todolist->targetDate }}</td>
            <td>
                <form action="{{ route('todolist.destroy',$todolist->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('todolist.show',$todolist->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('todolist.edit',$todolist->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
@endsection