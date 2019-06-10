<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get Movie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
        <p>Search For Movie or Story</p> 

        <form action = "getmovie.php" method = "POST">
            <br>
            <input type = "text" name = "name" id = "id" placeholder="Enter Movie or Story name">
            <input type = "submit" value = "Get">
        </form>
        <form action ="main.php"><input type="submit" value="Go back!" ></form>
        <br>
  </body>
</html>
<?php

//API for search for movie, stories by its name from OMDB app
$curl = curl_init();
$name = $_POST["name"];
if($name)
{
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.omdbapi.com/?apikey=b0d5d997&s=.$name&r=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Zoho-authtoken {{User.Auth_Token}}",
    "Postman-Token: 2e884a16-1bfe-47d6-8596-9b58e1c31762",
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
    $arr = $res['Search'];
    
    echo "Result : <br>";
    foreach($arr as $a)
    {
      echo "<table border = 1>";
      echo "<tr><th>Title</th><th>Year</th><th>Type</th></tr>";
        echo"<tr><td>".$a['Title'].
            "</td><td>".$a['Year'].
            "</td><td> " .$a['Type'].
            "</td></tr></table>"
            ?>
            <img src="<?php echo $a['Poster']; ?>"/>
            <?php
            //"</td></tr>";
    }
    //echo "</table>";
}
}
?>
