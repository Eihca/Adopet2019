<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ranchers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Elsie+Swash+Caps:900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"integrity="sha384DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
         
		<link rel = "stylesheet" type = "text/css" href ="{{ asset('css/swiper.min.css') }}">
		<link rel = "stylesheet" type = "text/css" href = "{{ asset('css/adopet.css') }}" />
    </head>
    
    <body>
        <header>
            <nav>
                <a href="{{ url('/') }}">
                    <div class="changimg"></div>
                </a>
                <ul>
                    <li> <a href="{{ url('/') }}"> Home </a> </li>
                    <li> <a href="{{ url('/petpage') }}"> Pets </a> </li>
                    <li> <a href="{{ url('/cart') }}"> Cart </a> </li>
                    <li> <a href="#footer"> About </a> </li>
                </ul>
				<a href= "{{ url('/home') }}">
					<img id= "adminopt"src ='adopet/adopetpics/aminicon.png'>
				</a>
            </nav>
			
			
        </header>
		
		@yield('content')
 
        <footer id = "footer"> 
            <div class = "top"> 
                <div class="middle">
                    <a class="btn" href="https://twitter.com/login" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn" href="https://gmail.com" target="_blank">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a class="btn" href="https://www.instagram.com/accounts/login" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="btn" href="https://www.facebook.com/login.php" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class = "foote">
                <div class = "footeleft"> 
                    <p> <strong> Headquarters: </strong> <br> 1477 Narra St. Tondo, Manila, Philippines </p> 
                    <p> <strong> Contact Number: </strong> <br> (+63) 917 855 9041 </p>
                </div>
                <div class = "footeright"> 
                    <div class = "foundersdescription"> 
			<h3> Gmail Address </h3>
                        <p> <strong> Henberly Chua: </strong> henberlychua92100@gmail.com </p>
                        <p> <strong> Catherine Chua: </strong> ccatherine@gmail.com </p>
                        <p> <strong> Yvonne Zaulda: </strong> yvonnezaulda@gmail.com </p>
                    </div>
                    <div class = "henb"> <img src = "adopet/adopetpics/henberfooter.jpg" alt = "Henberly Chua"> </div>              
                    <div class = "cath"> <img src = "adopet/adopetpics/cathfooter.jpg" alt = "Catherine Chua"> </div>              
                    <div class = "yvonne"> <img src = "adopet/adopetpics/yvonnefooter.jpg" alt = "Yvonne Lee"></div> 
                    </div>
                </div>
                <p class = "lastchild"> &copy; Copyright Adopet.com | All Rights Reserved | 2019 </p>
        </footer>
    </body>
</html>