<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get PICs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
      
    <p>Search For Picture Category</p> 
        <form action = "searchphoto.php" method = "POST">
            <br>
            <input type = "text" name = "name" id = "id" placeholder="Enter Pic Category">
            <input type = "submit" value = "Get">
        </form>
        <form action ="main.php"><input type="submit" value="Go back!" ></form>
        <br>
  </body>
</html>

<?php
// API to search photo by uits type from splashbase app

$curl = curl_init();
$name = $_POST['name'];
if($name)
{
  curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.splashbase.co/api/v1/images/search?query=.$name",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Zoho-authtoken {{User.Auth_Token}}",
    "Content-Type: application/json",
    "Postman-Token: 7ae34b00-a992-4541-a16c-5b25933debcc",
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
    /*echo "Result : <br>";
    echo "<table border = 1>";
    echo "<tr><th>ID</th><th>URL</th><th>Source ID</th></tr>";
    */
    foreach($arr as $a)
    {
      ?>
      <img src="<?php echo $a['url']; ?>"/>

<?php
    }
}
}
?>

