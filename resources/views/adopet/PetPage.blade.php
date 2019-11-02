@extends('layouts.tryadopetlayout')
@section('content')
<?php
session_start();

$pet_ids = array();
//session_destroy();


//check if add to cart button has been submitted
if(filter_input(INPUT_POST, 'addtocart')){
    if(isset($_SESSION['pet_cart'])){
        //keep track of how many products
        $count = count($_SESSION['pet_cart']);
        // create sequential array for matching array keys to ids
        $pet_ids = array_column($_SESSION['pet_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $pet_ids)){
            $_SESSION['pet_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'char' => filter_input(INPUT_POST, 'char'),
                'envi' => filter_input(INPUT_POST, 'envi'),
                'life' => filter_input(INPUT_POST, 'life'),
                'quant' => filter_input(INPUT_POST, 'quantity'),
                'pic' => filter_input(INPUT_POST, 'picture')
            );
        }
        else{ // product already exists 
            //find matching key
            for($i=0; $i<count($pet_ids);$i++){
                if($pet_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add existing quantity
                    $_SESSION['pet_cart'][$i]['quant'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }

    }
    else{
        //if shopping cart doesn't exist
        $_SESSION['pet_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'char' => filter_input(INPUT_POST, 'char'),
            'envi' => filter_input(INPUT_POST, 'envi'),
            'life' => filter_input(INPUT_POST, 'life'),
            'quant' => filter_input(INPUT_POST, 'quantity'),
            'pic' => filter_input(INPUT_POST, 'picture')
        );
    }
}

//pre_r($_SESSION);
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
<style>
body h1{
    font-family: 'Luckiest Guy';
    font-size: 50px;
    width:100%;
    text-align: center;
    background: linear-gradient(to right, #F37335, #FDC830); 
}
</style>
<main id = "petpage-main">
	<section id = "catsec">
		<h1> CATS </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($cats as $cat)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $cat->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $cat->id }}').style.display='block';document.getElementById('r-slide-{{ $cat->id }}').style.display='block';document.getElementById('closebtn-{{ $cat->id }}').style.display='block'">{{ $cat->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $cat->id }}" style = "display:none">
							<form method = "POST" id = "right-slide-{{ $cat->id }}" style ="display:none" action ="{{ url('/petpage') }}">
								<input type = "hidden" name = "picture" id = "picture" class = "inputtext" value ="{{ $cat->pet_pic }}">
								<input type = "hidden" name = "id" id = "id" class = "inputtext" value ="{{ $cat->id }}">
								<input type = "hidden" name = "name" id = "name" class = "inputtext" value ="{{ $cat->pet_name }}">                
								<h2><p class = "pformat"> PHP {{ $cat->pet_price }}</p></h2>
								<input type = "hidden" name = "price" id = "price" class = "inputtext" value = "{{ $cat->pet_price }}">
								<p class = "rsformat">{{ $cat->pet_char }}</p>
								<input type = "hidden" name ="char" class = "inputtext" value = "{{ $cat->pet_char }}">
								<p class = "lformat"><strong>{{ $cat->pet_life }}</strong></p>
								<input type = "hidden" name = "envi" id = "envi" class = "inputtext" value ="{{ $cat->pet_envi }}" >
								<input type = "hidden" name = "life" id = "life" class = "inputtext" value ="{{ $cat->pet_life }}" >
								<input type = "hidden" name = "quantity" id = "quantity" placeholder = "1" class = "rsformat" value = "1">
								<input type = "submit" name = "addtocart" value = "ADOPET!" class ="adopetbtn" >
							</form>
						</div>
						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $cat->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $cat->id }}').style.display='none';document.getElementById('r-slide-{{ $cat->id }}').style.display='none';document.getElementById('closebtn-{{ $cat->id }}').style.display='none'"><</button>
						</div>
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	<section id = "catsec">
		<h1> DOGS </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($dogs as $dog)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $dog->id }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $dog->id }}').style.display='block';document.getElementById('r-slide-{{ $dog->id }}').style.display='block';document.getElementById('closebtn-{{ $dog->id }}').style.display='block'">{{ $dog->pet_name }}</button>
							</div>
						</div>

						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $dog->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $dog->id }}').style.display='none';document.getElementById('r-slide-{{ $dog->id }}').style.display='none';document.getElementById('closebtn-{{ $dog->id }}').style.display='none'"><</button>
						</div>
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
</main>

<script type ="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
<script>
	var swiper = new Swiper('.swiper-container', {
		effect: 'coverflow',
		grabCursor: true,
		mousehover: true,
		centeredSlides: true,
		slidesPerView: 'auto',
		coverflowEffect: {
			rotate: 50,
			stretch: 0,
			depth: 100,
			modifier: 1,
			slideShadows : true,
		},
		pagination: {
			el: '.swiper-pagination',
		},
	});
</script>

 @endsection