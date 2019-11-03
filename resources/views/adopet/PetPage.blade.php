@extends('layouts.tryadopetlayout')
@section('content')

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
							<div id = "right-slide-{{ $cat->id }}" style ="display:none">
								<h2><p class = "pformat"> PHP {{ $cat->pet_price }}</p></h2>
								<p class = "rsformat">{{ $cat->pet_char }}</p>
								<p class = "lformat"><strong>{{ $cat->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $cat->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
							</div>
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
	<section id = "dogsec">
		<h1> DOGS </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($dogs as $dog)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $dog->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $dog->id }}').style.display='block';document.getElementById('r-slide-{{ $dog->id }}').style.display='block';document.getElementById('closebtn-{{ $dog->id }}').style.display='block'">{{ $dog->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $dog->id }}" style = "display:none">
							<div id = "right-slide-{{ $dog->id }}" style ="display:none">
								<h2><p class = "pformat"> PHP {{ $dog->pet_price }}</p></h2>
								<p class = "rsformat">{{ $dog->pet_char }}</p>
								<p class = "lformat"><strong>{{ $dog->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $dog->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
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
	
	<section id = "hamsec">
		<h1> HAMSTERS </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($hams as $ham)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $ham->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $ham->id }}').style.display='block';document.getElementById('r-slide-{{ $ham->id }}').style.display='block';document.getElementById('closebtn-{{ $ham->id }}').style.display='block'">{{ $ham->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $ham->id }}" style = "display:none">
							<div id = "right-slide-{{ $ham->id }}" style ="display:none">                
								<h2><p class = "pformat"> PHP {{ $ham->pet_price }}</p></h2>
								<p class = "rsformat">{{ $ham->pet_char }}</p>
								<p class = "lformat"><strong>{{ $ham->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $ham->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
							</div>
						</div>
						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $ham->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $ham->id }}').style.display='none';document.getElementById('r-slide-{{ $ham->id }}').style.display='none';document.getElementById('closebtn-{{ $ham->id }}').style.display='none'"><</button>
						</div>
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	
	<section id = "birdsec">
		<h1> BIRDS </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($birds as $bird)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $bird->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $bird->id }}').style.display='block';document.getElementById('r-slide-{{ $bird->id }}').style.display='block';document.getElementById('closebtn-{{ $bird->id }}').style.display='block'">{{ $bird->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $bird->id }}" style = "display:none">
							<div id = "right-slide-{{ $bird->id }}" style ="display:none">
								<h2><p class = "pformat"> PHP {{ $bird->pet_price }}</p></h2>
								<p class = "rsformat">{{ $bird->pet_char }}</p>
								<p class = "lformat"><strong>{{ $bird->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $bird->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
							</div>
						</div>
						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $bird->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $bird->id }}').style.display='none';document.getElementById('r-slide-{{ $bird->id }}').style.display='none';document.getElementById('closebtn-{{ $bird->id }}').style.display='none'"><</button>
						</div>
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	
		<section id = "turtlesec">
		<h1> TURTLES </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($turts as $turt)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $turt->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $turt->id }}').style.display='block';document.getElementById('r-slide-{{ $turt->id }}').style.display='block';document.getElementById('closebtn-{{ $turt->id }}').style.display='block'">{{ $turt->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $turt->id }}" style = "display:none">
							<div id = "right-slide-{{ $turt->id }}" style ="display:none">
								<h2><p class = "pformat"> PHP {{ $turt->pet_price }}</p></h2>
								<p class = "rsformat">{{ $turt->pet_char }}</p>
								<p class = "lformat"><strong>{{ $turt->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $turt->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
							</div>
						</div>
						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $turt->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $turt->id }}').style.display='none';document.getElementById('r-slide-{{ $turt->id }}').style.display='none';document.getElementById('closebtn-{{ $turt->id }}').style.display='none'"><</button>
						</div>
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	
	<section id = "fishsec">
		<h1> FISHES </h1>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($fish as $fishe)
					<div class="swiper-slide">
						<div class = "left-slide">
							<div class = "slide-img">
								<img src = "/images/adopetpics/{{ $fishe->pet_pic }}">
							</div>	
							<div class = "slide-name">
								<button class = "buttons" title ="Click Me" onclick= "document.getElementById('right-slide-{{ $fishe->id }}').style.display='block';document.getElementById('r-slide-{{ $fishe->id }}').style.display='block';document.getElementById('closebtn-{{ $fishe->id }}').style.display='block'">{{ $fishe->pet_name }}</button>
							</div>
						</div>
						<div class = "right-slide" id = "r-slide-{{ $fishe->id }}" style = "display:none">
							<div id = "right-slide-{{ $fishe->id }}" style ="display:none" >
								<h2><p class = "pformat"> PHP {{ $fishe->pet_price }}</p></h2>
								<p class = "rsformat">{{ $fishe->pet_char }}</p>
								<p class = "lformat"><strong>{{ $fishe->pet_life }}</strong></p>
								<a href = "{{ route('add',['id' => $fishe->id]) }}"><button class ="adopetbtn"> ADOPET! </button></a>
							</div>
						</div>
						<div class ='closebtn' title ='Close Me' id = 'closebtn-{{ $fishe->id }}' style = 'display:none'>
							<button onclick ="document.getElementById('right-slide-{{ $fishe->id }}').style.display='none';document.getElementById('r-slide-{{ $fishe->id }}').style.display='none';document.getElementById('closebtn-{{ $fishe->id }}').style.display='none'"><</button>
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