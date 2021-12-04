<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetFood</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
</head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "food";   
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if($conn) {
                echo '';
            } else {
                echo 'failed';
            }
            $orderid = 0;
            $sql = 'SELECT COUNT(*) FROM getFood;';
            $retval= mysqli_query($conn, $sql);
            if (!$retval) {
                die("Could not get the data".mysqli_error($conn));
            }
            while ($row = mysqli_fetch_array($retval)){
                 $orderid = $row['COUNT(*)'] + 1;
            }
            $email = $_POST['email'];
            $address = $_POST['address'];
            $vegitem = $_POST['veg'];
            $nvegitm = $_POST['nonveg'];
            $bnd = $_POST['bnd'];
            $totalprice = 0;
            if ($vegitem == "malai kufta"){
                $totalprice += 181 ;
            } elseif ($vegitem == "veg kolhapuri") {
                $totalprice += 194;
            } elseif ($vegitem == "veg kadai") {
                $totalprice += 214;
            } elseif ($vegitem == "rajma masala") {
                $totalprice += 121;
            } elseif ($vegitem == "chole masala") {
                $totalprice += 174;
            } elseif ($vegitem == "aloo kurma") {
                $totalprice += 194;
            } elseif ($vegitem == "matar paneer") {
                $totalprice += 214;
            } elseif ($vegitem == "dal makhani") {
                $totalprice += 161;
            } elseif ($vegitem == "paneer butter masala") {
                $totalprice += 194;
            } elseif ($vegitem == "mixed veg curre") {
                $totalprice += 134;
            } else {
                $totalprice += 0;
            }
            if ($nvegitm == "chicken briyani"){
                $totalprice += 211 ;
            } elseif ($nvegitm == "mutton briyani") {
                $totalprice += 230;
            } elseif ($nvegitm == "fish fry") {
                $totalprice += 261;
            }  else {
                    $totalprice += 0;
            }
            if ($bnd == "pista ice cream"){
                $totalprice += 190 ;
            } elseif ($bnd == "death chocolate") {
                $totalprice += 180;
            } elseif ($bnd == "sizzler brownie") {
                $totalprice += 170;
            } elseif ($bnd == "rajbough ice cream") {
                $totalprice += 190;
            } elseif ($bnd == "sunrise mocktail") {
                $totalprice += 170;
            } elseif ($bnd == "american nuts ice cream") {
                $totalprice += 170;
            } elseif ($bnd == "blue angle ice cream") {
                $totalprice += 190;
            } elseif ($bnd == "oreo thick shake") {
                $totalprice += 170;
            } elseif ($bnd == "salted caramel") {
                $totalprice += 170;
            } elseif ($bnd == "vargin mojito") {
                $totalprice += 190;
            } else {
                $totalprice += 0;
            }
            // echo $price1;
            
            echo "<h3 style='margin:5%; text-align: center;'>Your bill is ".$totalprice."</h3>";
            $sql = "INSERT INTO getFood(orderId, email, address, vegitem, nvegitm, bnd, totalprice) values ($orderid,'$email', '$address', '$vegitem', '$nvegitm', '$bnd', '$totalprice')";
            if (mysqli_query($conn, $sql) == TRUE){
                echo '<h3 class="back">Purchase Successful <a href="../index.html">Go back</a><br>
                    <a class="back" href="orders.html">orders</a></h3>';
            }
            
            mysqli_close($conn);
        ?>
    </body>
</html>

<!--
        CREATE TABLE getFood (
            orderId INT PRIMARY KEY,
            email VARCHAR(50),
            address VARCHAR(255),
            vegitem VARCHAR(50),
            nvegitm VARCHAR(50),
            bnd VARCHAR(50),
            totalprice INT,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
-->