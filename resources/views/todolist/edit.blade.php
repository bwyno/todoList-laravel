@extends('todolist.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todolist.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('todolist.update',$todolist->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <input name="description" value="{{ $todolist->description }}" class="form-control" placeholder="Description" style="height:150px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Target Date:</strong>
                    <input type="date" class="form-control"  name="targetDate" placeholder="Target Date" value="{{ $todolist->targetDate }}">
                </div>
            </div>
            <div class="form-group">
                <label for="completed">Completed:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1" @if($todolist->completed) checked @endif>
                    <label class="form-check-label" for="completed">
                        Yes
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection