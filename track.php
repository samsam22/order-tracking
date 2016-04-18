<?php

// Grab User submitted information
$username = $_POST["username"];
$order_id = $_POST["order_id"];
$zip_code = $_POST["zip_code"];

// Connect to the database
$con = mysql_connect("localhost","user","password");

// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("track_order",$con);

$result = mysql_query("SELECT username, order_id, zip_code, tracking_number FROM orders WHERE order_id = $order_id");

$row = mysql_fetch_array($result);

if($row["order_id"]==$order_id && $row["username"]==$username && $row["zip_code"]==$zip_code)
{
	$tracking_number = $row['tracking_number'];
	echo($tracking_number);
	echo("You are a validated user.");
}
else
{
    echo("Sorry, your credentials are not valid, Please try again.");
}
?>
