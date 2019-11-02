@extends('layouts.tryadopetlayout')
@section('content')
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
                        <td><img src = 'adopet/adopetpics/<?php echo $pet['pic'];?>'></td>
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


 @endsection