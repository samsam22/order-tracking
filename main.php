<?php
if(isset($_POST['submit'])) 
{

$order_id = $_POST["order_id"];
$zip_code = $_POST["zip_code"];

    $con=mysqli_connect("localhost","user","password","database");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $qz = "SELECT tracking_number FROM orders where order_id='".$order_id."' and zip_code='".$zip_code."'" ; 
    $qz = str_replace("\'","",$qz); 
    $result = mysqli_query($con,$qz);
    while($row = mysqli_fetch_array($result))
      {
      echo $row['tracking_number'];
      }
    mysqli_close($con);    
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Clear Forms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />     
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" />       
    <link rel="stylesheet" href="./less/styles.css" type="text/css" />           
    <style type="text/css">       
        .row {
            padding: 80px 0px;
        }   
        .row + .row {
            margin-top: 10px;
            margin-bottom: 10px;
        }           
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div class="block white">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <h1>Track Your Order</h1>
                    <hr/>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, voluptatibus cumque modi quasi excepturi velit veritatis incidunt nesciunt exercitationem ullam placeat ab quod ad molestiae tenetur id consequuntur fugiat magni.</li>
                        <li>Est, tenetur, architecto, aliquid, animi voluptas quos delectus dolorum id saepe magni a placeat vel neque dignissimos quia magnam optio ipsam qui doloremque soluta. Fugit ipsam repudiandae nihil tempora? Optio.</li>
                        <li>Dolorum, temporibus, quasi, cumque accusamus ratione voluptatem ducimus voluptas mollitia recusandae soluta deserunt deleniti. Distinctio, voluptatem, recusandae, dignissimos est nostrum ut totam maiores vitae suscipit eos repellendus dolor ipsum a.</li>
                    </ul>
                </div>
                <div class="offset1 span5">
                    <div class="clear-form">                        
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">             
                            <div class="form-heading">
                                <h3>Enter Order Information</h3>                               
                            </div>  
                            <div class="form-body">
                                <input type="text" class="input-block-level" name="order_id" placeholder="Order ID">
                                <input type="text" class="input-block-level" name ="zip_code" placeholder="5-digit ZIP Code"> 
                                <div class="g-recaptcha" data-sitekey="6LfSqxwTAAAAABS0ckbbtCEG93UgwR2vdOpUF4dK"></div><br>
                                <button class="btn btn-large btn-blue btn-block" type="submit" name="submit">Track Order</button>                
                            </div>                                 
                            <div class="form-footer">                          
                                <hr/>
                                <p class="center">
                                    <a href="#">Forgot your password?</a>
                                </p>
                            </div>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
