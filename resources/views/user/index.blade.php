@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="display:flex; margin-bottom: 20px"> 
			<a class="btn btn-primary" href="{{ route('login') }}" style="margin-right: 20px"> Back</a>
			<h3>Change Account Picture</h3>
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
   
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" style ="padding:0 70px">
    @csrf
  
        <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<input id="photo" type="file" class="form-control" name="photo" accept="image/*">
				</div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection