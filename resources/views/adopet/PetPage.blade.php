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
@extends('layouts.adopetlayout')
@section('content')

        <main id = "petpage-main">
        <section id = "catsec">
                <h1> CATS </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "Cat"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='/adopet/adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#catsec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_life']; ?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'ADOPET!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <section id = "dogsec">
                <h1> DOGS </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "Dog"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#dogsec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_life']; ?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'ADOPET!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <section id = "hamstersec">
                <h1> HAMSTERS </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "Hamster"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#hamstersec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_life']; ?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'ADOPET!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <section id = "birdsec">
                <h1> BIRDS </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "bird"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#birdsec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_life']; ?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'ADOPET!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <section id = "turtlesec">
                <h1> TURTLES </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "Turtle"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#turtlesec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_envi'];?></strong></p>
                                                <br>
                                                <p class = 'lformat'><strong><?php echo $row['pet_life']; ?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'Adopet!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <section id = "fishsec">
                <h1> FISHES </h1>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            try {
                                $quant = 1;
                                $dbh = new PDO('mysql:host=localhost;dbname=laravel','root','');
                                
                                foreach($dbh->query('SELECT * from pets WHERE pet_class = "fish"') as $row): ?>
                                    <div class='swiper-slide'>
                                        <div class = 'left-slide'>
                                                <div class = 'slide-img'>
                                                    <img src ='adopetpics/<?php echo $row['pet_pic']; ?>'>
                                                </div>	
                                                <div class = 'slide-name'>
                                                    <button class ='buttons' title ='Click Me' onclick= "document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='block';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='block';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='block'"><?php echo $row['pet_name']?></button>
                                                </div>
                                        </div>
                                        <div class = 'right-slide' id = 'r-slide-<?php echo $row['pet_id']; ?>' style ='dispay:none'>
                                            <form method = 'post' id = 'right-slide-<?php echo $row['pet_id']; ?>' style ='display:none' action ="?action=add&id=<?php echo $row['pet_id']; ?>#fishsec">
                                                <input type = 'hidden' name = 'picture' id = 'picture' class = 'inputtext' value ="<?php echo $row['pet_pic']; ?>">
                                                <input type = 'hidden' name = 'id' id = 'id' class = 'inputtext' value ="<?php echo $row['pet_id']; ?>">
                                                <input type = 'hidden' name = 'name' id = 'name' class = 'inputtext' value ='<?php echo $row['pet_name']; ?>'>                
                                                <h2><p class = 'pformat'> PHP <?php echo $row['pet_price']; ?></p></h2>
                                                <input type = 'hidden' name = 'price' id = 'price' class = 'inputtext' value = '<?php echo $row['pet_price']; ?>'>
                                                <p class = 'rsformat'><?php echo $row['pet_char']; ?></p>
                                                <input type ='hidden' name ='char' class = 'inputtext' value = '<?php echo $row['pet_char']; ?>'>
                                                <p class = 'lformat'><strong><?php echo $row['pet_envi'];?></strong></p>
                                                <input type = 'hidden' name = 'envi' id = 'envi' class = 'inputtext' value ='<?php echo $row['pet_envi']; ?>' >
                                                <input type = 'hidden' name = 'life' id = 'life' class = 'inputtext' value ='<?php echo $row['pet_life']; ?>' >
                                                <input type = 'hidden' name = 'quantity' id ='quantity' placeholder = '1' class = 'rsformat' value = '<?php echo $quant; ?>'>
                                                <input type = 'submit' name ='addtocart' value = 'ADOPET!' class ='adopetbtn' >
                                            </form>
                                        </div>
                                        <div class ='closebtn' title ='Close Me' id = 'closebtn-<?php echo $row['pet_id']; ?>' style = 'display:none'>
                                        <button onclick ="document.getElementById('right-slide-<?php echo $row['pet_id']; ?>').style.display='none';document.getElementById('r-slide-<?php echo $row['pet_id'];?>').style.display='none';document.getElementById('closebtn-<?php echo $row['pet_id'];?>').style.display='none'"><</button>
                                        </div>
                                    </div>
                                <?php
                                    endforeach;
                                
                                $dbh = null;
                            }
                            catch (PDOException $e){
                                print "Error!" . $e->getMessage() . "<br/>";
                                die();
                            }      
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </main>

        <script type ="text/javascript" src="{{ url('/adopet/swiper.min.js') }}"></script>
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