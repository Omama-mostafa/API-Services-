<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
      
    <p>Delete Fake Post</p><br>
        <form action = "deletepost.php" method = "POST">
            ID
            <input type = "number" name = "id" id = "id" placeholder = "Target Post ID">
            <br><br>
            <input type = "submit" value = "Delete">
        </form> 
        <form action ="main.php"><input type="submit" value="Go back!" ></form>

  </body>
</html>

<?php

//API useing POST method to add fake post to jsonplaceholder database

$curl = curl_init();
$id = $_POST['id'];
if($id)
{
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts/1?id=$id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: c2a6cd3f-6ae1-47d2-b36b-84cfa0655624",
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
    echo "The Post Deleted Successfully";
    echo $response;
}
}
?>