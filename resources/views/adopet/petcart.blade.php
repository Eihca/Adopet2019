<?php
session_start();

if(filter_input(INPUT_GET, 'action') == 'delete'){
    foreach ($_SESSION['pet_cart'] as $key=> $pet){
        if ($pet['id'] == filter_input(INPUT_GET, 'id')){
            unset($_SESSION['pet_cart'][$key]);
        }
    }
    // rest session array keys so they match product keys numeric array
    $_SESSION['pet_cart'] = array_values($_SESSION['pet_cart']);
} 
//pre_r($_SESSION);
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>


<?php
$name ='';
$price ='';
$char = '';
$life = '';
$envi = '';
$pic ='';


        $dbh = new PDO('mysql:host=localhost;dbname=petcatalogues', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("SELECT * FROM pets WHERE pet_id=:id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        $id = $result['pet_id'];
        $name = $result['pet_name'];
        $price = $result['pet_price'];
        $char = $result['pet_char'];
        $life = $result['pet_life'];
        $price = $result['pet_price'];
        $envi = $result['pet_envi'];
        $pic = $result['pet_pic'];
        
        $dbh = null;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ranchers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Elsie+Swash+Caps:900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"integrity="sha384DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel = "stylesheet" type = "text/css" href ="adopet.css">
    </head>

    <body id ="cart-body">
        <header>
            <nav>
                <a href="adopethome.php">
                    <div class="changimg"></div>
                </a>
                <ul>
                    <li> <a href="{{ url('adopets') }}"> Home </a> </li>
                    <li> <a href="PetPage.php"> Pets </a> </li>
                    <li> <a href="#"> Cart </a> </li>
                    <li> <a href="#footer"> About </a> </li>
                </ul>
				<a href= "#">
					<img id= "adminopt"src ='adopetpics/aminicon.png'>
				</a>
            </nav>
        </header>

        <main id = "cart-main">
            <section class = "addtocartsection" style = "clear:both">
                <table class = "table" >
                    <tr><th colspan = '6' style = "font-size:30px; padding: 10px 0">Cart Details</th></tr>
                    <tr style = "font-size: 20px">
                        <th width= '15%'>Pet Image</th>
                        <th width= '45%' style = "padding-left:30px; text-align: left">Pet Description</th>
                        <th width = '15%'>Price</th>
                        <th width = '5%'>Quantity</th>
                        <th width = '10%'>Total</th>
                        <th width = '5%'> </th>
                    </tr>
                    <?php 
                    if (!empty($_SESSION['pet_cart'])):
                        $total = 0;
                        foreach ($_SESSION['pet_cart'] as $key => $pet):
                    ?>
                    <tr>
                        <td><img src = 'adopetpics/<?php echo $pet['pic'];?>'></td>
                        <td style = "text-align:left; padding:20px 30px;">
                            <h2 style = "font-family: 'Elsie Swash Caps'"><?php echo $pet['name'];?></h2>
                            <input type ='hidden' name = 'sname' value = '<?php echo $pet['name'];?>'>
                            <p><?php echo $pet['char'];?></p>
                            <p><?php echo $pet['envi'];?></p>
                            <p><?php echo $pet['life'];?></p>
                        </td>
                        <td style ="font-size: 20px; font-weight: bold">&#x20b1; <?php echo number_format($pet['price']);?></td>
                        <td><?php echo $pet['quant'];?></td>
                        <td style ="font-size: 20px; font-weight: bold">&#x20b1; <?php echo number_format($pet['price']*$pet['quant']);?></td>
                        <td style ="text-align:left"><a href = "petcart.php?action=delete&id=<?php echo $pet['id'];?>#cart-main"><div class ="removebtn"></div></a></td>
                    </tr>
                    <?php
                        $total = $total + ($pet['price']*$pet['quant']);
                        endforeach;
                    ?>
                    <tr>
                        <td colspan = '4' style ="text-align:right; font-weight: bold; font-size: 20px"> TOTAL </td>
                        <td align ='right' style ="font-size: 20px; font-weight: bold; text-decoration: underline"> &#x20b1; <?php echo number_format($total); ?></td>
                        <td></td>
                    </tr> 
                    <tr>
                        <td class = "buytr"colspan ='6'>
                            <?php 
                                if(isset($_SESSION['pet_cart'])):
                                    if(count($_SESSION['pet_cart'])>0):
                            ?>
                            <a class = 'buybutton' onclick="tooglefunc()"> <div class ="buybtn"> BUY </div> </a>
                            <?php
                                    endif;
                                endif;
                            ?>
                        </td>
                    <tr>
                    <?php
                    endif;
                    ?>
                </table>
            </section>  
            <form id ='box' method ='post' > 
                <div class ="closediv" ><button onclick ="tooglefunc()" class = 'close'>X</button></div>
                <h1>Order</h1>
                <input type='text' name='name' placeholder='Name' id='name' class= 'inputs'>
                <input type='text' name='email' placeholder='Email Address' id='email' class= 'inputs'>
                <input type='text' name='contact' placeholder='Contact Number' id='contact' class= 'inputs'>
                <input type='submit' name='' value='Submit' onclick ="return validate()">
            </form>
            </section>

            <script>
                    function validate() {
                        var name = document.querySelector("#name");
                        if (name.value.length <= 2) {
                            alert("Name is required and must have at least 2 characters");
                            name.focus();
                            return false;
                        }
                        var email = document.querySelector("#email");
                        if (email.value.length <= 20) {
                            alert("Email Address is required and must have atleast 20 characters");
                            email.focus();
                            return false;
                        }
                        var cont = document.querySelector("#contact");
                        if (cont.value.length <= 10) {
                            alert("Contact Number is required and must have atleast 11 characters");
                            cont.focus();
                            return false;
                        }
                        else{
                            return true;
                            
                        }
                    }

                    function tooglefunc(){
                        var x = document.querySelector("#box");
                        if(x.style.display == "block"){
                            x.style.display = "none";
                        }
                        else{
                            x.style.display ="block";
                        }
                    }
                </script>
        </main>

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
                    <div class = "henb"> <img src = "adopetpics/henberfooter.jpg" alt = "Henberly Chua"> </div>              
                    <div class = "cath"> <img src = "adopetpics/cathfooter.jpg" alt = "Catherine Chua"> </div>              
                    <div class = "yvonne"> <img src = "adopetpics/yvonnefooter.jpg" alt = "Yvonne Lee"></div> 
                </div>
            </div>
            <p class = "lastchild"> &copy; Copyright Adopet.com | All Rights Reserved | 2019 </p>
        </footer>
    </body>
</html>
