<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css" />
    <style>
        h1{
            text-align: center;
            color: #03e9f4;
            margin-top: 40px;
        }
    </style>

</head>
<body>
    <h1>Hebrew Date Converter</h1>
<div class="login-box">
<form action = "<?php $_PHP_SELF ?>" method = "GET">
<div class="user-box">
    <input  type="text"   name="date" placeholder="dd-mm-yyy" required />
    </div>
    <button name="button" id="Convert" class="button">Convert</button><br><br>

</form>
</div>
</body>
</html>
<?php
 if((isset($_GET["date"]))) {
     $date = $_GET["date"];
     $new_date = explode("-",$date); //split a string with a separator (Specifies where to break the string) and returns an array of strings.
     $year = $new_date[2];
     $month = $new_date[1];
     $day = $new_date[0];
     $url = "https://www.hebcal.com/converter?cfg=json&gy=$year&gm=$month&gd=$day&g2h=1";
    $curl = curl_init(); // create a new cURL resource
    curl_setopt($curl, CURLOPT_URL, $url); // set URL and other appropriate options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $hebrew_date = json_decode(curl_exec($curl), true);
   $converted_date = $hebrew_date["hebrew"];

   echo "<div style='margin-top:200px;' class='login-box'><h2> $converted_date</h2></div>";
}
?>
