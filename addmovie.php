<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Movie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
      
    <p> Add New Movie or Story</p>
        <form action = "addmovie.php" method = "POST">
            <br>
            Title 
            <input type = "text" name = "Title" id = "Title" placeholder = "Title">
            <br><br>
            Year
            <input type = "text" name = "Year" id = "Year" placeholder = "Year">
            <br><br>
            Type
            <input type = "text" name = "Type" id = "Type" placeholder="Type">
            <br><br>
            Poster <br>
            <textarea rows = "4" cols = "50"> </textarea>
            <br><br>
            <input type = "submit" value = "Add">
        </form>
        <form action ="main.php"><input type="submit" value="Go back!" ></form>

        <br>
 
  </body>
</html>

<?php

// API for POST new movie, stories to OMDB database from OMDB app

$curl = curl_init();

$Title = $_POST['Title'];
$Year = $_POST['Year'];
$Type = $_POST['Type'];
$Poster = $_POST['Poster'];
if($Title || $Year || $Type || $Poster)
{
  curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.omdbapi.com/?apikey=b0d5d997&i=tt3896198",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n            \"Title\": \".$Title\",\n            \"Year\": \".$Year\",\n            \"Type\": \".$Type\",\n            \"Poster\": \".$Poster\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 881737f0-195a-4eb0-a209-13420feaef67",
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
    echo "Movie you added : ";
    echo "<table border = 1><tr><th>Title</th><th>Year</th><th>Type</th><th>Poster</th></tr>";
    echo "<tr><td>".$Title."</td><td>".$Year."</td><td>".$Type."</td><td>".$Poster."</td></tr></table>";
}
}
?>

