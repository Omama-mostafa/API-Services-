<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List PICs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
      
    <p>List Lastest 10 Pictures</p> 
    <br>
    <form action ="main.php"><input type="submit" value="Go back!" ></form>
    <br><br>
  </body>
</html>

<?php


// API to get the lastest 10 photos from splashbase app

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.splashbase.co/api/v1/images/latest",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 38d3c5bc-559d-41bf-a013-f1ab19fda455",
    "cache-control: no-cache"
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "cURL Error #:" . $err;
}
else 
{
    $res = json_decode($response , true);
    $arr = $res['images'];
    //echo "Result : <br>";
    //echo "<table border = 1>";
    //echo "<tr><th>ID</th><th>URL</th><th>Source ID</th></tr>";
    foreach($arr as $a)
    {
      ?>
      <img src="<?php echo $a['url']; ?>"/>

    <?php
    }
}
?>

