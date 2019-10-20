@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pet</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pets.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class:</strong>
                {{ $pet->pet_class }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $pet->pet_name }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $pet->pet_price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Characteristics:</strong>
                {{ $pet->pet_char }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Environment:</strong>
                {{ $pet->pet_envi }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Environment:</strong>
                {{ $pet->pet_life }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Picture:</strong>
				<img class="photo" alt="photo" src="/adopet/adopetpics/{{ $pet->pet_pic }}">
             
            </div>
        </div>
		
    </div>
@endsection