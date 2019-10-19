@extends('layouts.tryadopetlayout')
@section('content')
        <main id = "home-main">
            <section class="main-banner-div">
                <h2> Find your furrendly compawnion today! </h2>
            </section>
            <section class="collage">
                <a href ="adopet/Petpage.php#dogsec">
                    <div class="single">
                        <img alt="Dog" src="adopet/adopetpics/menurealdog.jpg" />
                        <div class="grp_text">
                            <h1>Dog</h1>
                        </div>
                    </div>
                </a>
                <a href ="adopet/Petpage.php#catsec">
                        <div class="single">
                            <img alt = "cat" src="adopet/adopetpics/menurealcat.jpg" />
                            <div class="grp_text">
                                <h1>Cat</h1>
                            </div>
                        </div>
                </a>
                <a href ="adopet/Petpage.php#hamstersec">
                    <div class="single">
                        <img alt = "Hamster" src="adopet/adopetpics/menurealhams.jpg" />
                        <div class="grp_text">
                            <h1>Hamster</h1>
                        </div>
                    </div><br />
                </a>
            </section>
            <section class="collage">
                <a href ="adopet/Petpage.php#birdsec">
                    <div class="single">
                        <img alt ="Bird" src="adopet/adopetpics/menurealbird.jpg" />
                        <div class="grp_text">
                            <h1>Bird</h1>
                        </div>
                    </div>
                </a>
                <a href ="adopet/Petpage.php#turtlesec">
                    <div class="single">
                        <img src="adopet/adopetpics/menurealturt.jpg" />
                        <div class="grp_text">
                            <h1>Turtle</h1>
                        </div>
                    </div>
                </a>
                <a href ="adopet/Petpage.php#fishsec">
                    <div class="single">
                        <img src="adopet/adopetpics/menurealfish.jpg" />
                        <div class="grp_text">
                            <h1>Fish</h1>
                        </div>
                    </div><br />
                </a>
            </section>
            <section class="secondsec">
                <div class="secondstriptext">
                    <h3> See how adorable these pets are? </h3>
                    <h2> Why not adopet!?</h2>
                    <p> Instead of buying a new and expensive pet, why not consider adopting one? Adopet is unlike any other pet shop you'd ever known. Our goal is to help these pets that had always been cherished and well-brought upon meet their lifetime buddies. Trust Adopet and rest assured you'll find the best, friendliest and affectionate companion for life! <p>
                </div>
            </section>
        </main>
 @endsection