<!DOCTYPE html>
<html>
<head>
    <title>Sending SMS using PHP</title>
</head>
<body>

<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title">Message</h3>
	</div>
	<form method="post">
    <label>Contact number</label>
    <input type="text" name="num">  
    <br><br>
    <label>Enter Message</label>
    <input type="text" name="message">

    <input type="submit" name="submit">

</form>
</div>
</body>
</html>

<?php

if (isset($_POST["submit"])) {

    $username = "johnmark.lastimado3@gmail.com";
    $hash = "4423be521ec9757b4589b2da4bf1de67bbddfb977b36882d1a92d44fbfb7c124";

    // Config variables. Consult http://api.txtlocal.com/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "API Test"; // This is who the message appears to be from.
    $numbers = $_POST["num"]; // A single number or a comma-seperated list of numbers
    $message = $_POST["message"];
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('https://api.txtlocal.com/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);

    if (!$result) {
        ?>
        <script>alert('message not sent!')</script>
    <?php
}
else{
    #print the final result
    echo $result; 
?>
<script>alert('message sent!')</script>
<?php
}
}
?>