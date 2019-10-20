@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pet Info</h2>
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
  
    <form action="{{ route('pets.update',$pet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
		
         <div class="row">
		 
			 <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Class:</strong>
					<select name = "pet_class" class="form-control" value ="{{ $pet->pet_class }}">
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
                    <input type="text" name="pet_name" value="{{ $pet->pet_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="pet_price" value="{{ $pet->pet_price }}" class="form-control" placeholder="Price">
                </div>
            </div>			
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Characteristics:</strong>
                    <textarea class="form-control" style="height:150px" name="pet_char" placeholder="Characteristics">{{ $pet->pet_char }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Environment:</strong>
                    <input type="text" name="pet_envi" value="{{ $pet->pet_envi }}" class="form-control" placeholder="Environment">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Life Span:</strong>
                    <input type="text" name="pet_life" value="{{ $pet->pet_life }}" class="form-control" placeholder="Life Span">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Picture with file extension:</strong>
					<input type="text" name="pet_pic" value="{{ $pet->pet_pic }}" class="form-control" placeholder="Picture with file extension">
					<!--<input id="photo" type="file" class="form-control" name="photo" accept="image/*">-->
				</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection