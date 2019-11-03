@extends('layouts.app')

@section('content')
    <div class="row" style = "margin-bottom: 10px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pet</h2>
            </div>
			<div class="pull-right" >
                <a class="btn btn-primary" href="{{ route('pets.index') }}"> Back</a>
            </div>

        </div>
    </div>
   
    <div class="row cardholde" >
	<div class= "containcard">
		<div class="leftshow" >
            <div class="form-group">
				<img class="showphoto" alt="photo" src="/adopet/adopetpics/{{ $pet->pet_pic }}">
             
            </div>
        </div>
		<div class = "rightshow">
			<div class = "rightcontain">
				<div class="col-xs-12 col-sm-12 col-md-12 spced" >
					<div class="form-group" >
						<strong>
						Class:
						<span class = "col">{{ $pet->pet_class }}</span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 spced">
					<div class="form-group">
						
						Name:
						<span class = "col">{{ $pet->pet_name }}</span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 spced">
					<div class="form-group">
						Price:
						<span class = "col">P {{ $pet->pet_price }}</span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 spced">
					<div class="form-group">
						Characteristics:
						<span class = "col">{{ $pet->pet_char }}</span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 spced">
					<div class="form-group">
						Environment:
						<span class = "col">{{ $pet->pet_envi }}</span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 spced">
					<div class="form-group">
						Life Span:
						<span class = "col">{{ $pet->pet_life }}</span>
						</strong>
					</div>
				</div>
			</div>
		</div>
		</div>
    </div>
@endsection