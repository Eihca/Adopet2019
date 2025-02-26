<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
	<h1> Hello, {{$user}}. Secret-number: {{$secret}}</h1>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h1>Laravel</h1>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
				<div class="version-ISV result-text-style-normal text-html ">
<h1 class="passage-display"> <span class="passage-display-bcv">Proverbs 8:33-36</span> <span class="passage-display-version">International Standard Version (ISV)</span></h1><div class="poetry"> <p class="line"><span id="en-ISV-16637" class="text Prov-8-33"><sup class="versenum">33&nbsp;</sup>Listen to instruction and be wise.</span><br><span class="indent-1"><span class="indent-1-breaks">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="text Prov-8-33">Don’t ignore it.</span></span><br><span id="en-ISV-16638" class="text Prov-8-34"><sup class="versenum">34&nbsp;</sup>Blessed is the person who listens to me,</span><br><span class="indent-1"><span class="indent-1-breaks">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="text Prov-8-34">watching daily at my gates,</span></span><br><span class="indent-2"><span class="indent-2-breaks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="text Prov-8-34">waiting at my doorways—</span></span><br><span id="en-ISV-16639" class="text Prov-8-35"><sup class="versenum">35&nbsp;</sup>because those who find me find life</span><br><span class="indent-1"><span class="indent-1-breaks">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="text Prov-8-35">and gain favor from the <span style="font-variant: small-caps" class="small-caps">Lord</span>.</span></span><br><span id="en-ISV-16640" class="text Prov-8-36"><sup class="versenum">36&nbsp;</sup>But whoever sins against me destroys himself;</span><br><span class="indent-1"><span class="indent-1-breaks">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="text Prov-8-36">everyone who hates me loves death.”</span></span></p></div> </div>
            </div>
        </div>
    </body>
</html>
