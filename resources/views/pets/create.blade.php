@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Pet</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pets.index') }}"> Back</a>
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
   
<form class = "showform" action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class:</strong>
                <select name = "pet_class" class="form-control">
					<option value=""> Choose from the ff: </option>
					<option value="Cat"> Cat </option>
					<option value="Dog"> Dog </option>
					<option value="Hamster"> Hamster </option>
					<option value="bird"> bird</option>
					<option value="Turtle"> Turtle</option>
					<option value="fish"> Fish </option>
				</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="pet_name" class="form-control" placeholder="Name">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" class="form-control" name="pet_price" placeholder="Price">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Characteristics: </strong>
                <textarea class="form-control" style="height:150px" name="pet_char" placeholder="Characteristics"></textarea>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Environment: </strong>
                <textarea class="form-control" style="height:150px" name="pet_envi" placeholder="Environment"></textarea>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Life Span:</strong>
                <input type="text" class="form-control" name="pet_life" placeholder="Life Span">
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Picture Name with file extension:</strong>
                <input type="text" class="form-control" name="pet_pic" placeholder="Picture Name with file extension">
            </div>
        </div>
        <!--<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<input id="photo" type="file" class="form-control" name="photo" accept="image/*">
				</div>
            </div>-->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection