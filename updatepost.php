<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
         
    <p>Update Fake Post</p> <br>
        <form action = "updatepost.php" method = "POST">
            ID
            <input type = "number" name = "id" id = "id" placeholder = "Target Post ID">
            <br><br> 
            User ID
            <input type = "number" name = "userId" id = "userId" placeholder = "Target Post UserID">
            <br><br> 
            Title
            <input type = "text" name = "title" id = "title" placeholder = "Target Post Title">
            <br><br>
            Body <br>
            <textarea rows = "4" cols = "50"> </textarea>
            <br><br>
            <input type = "submit" value = "Update">
        </form>
        <form action ="main.php"><input type="submit" value="Go back!" ></form>

        <br>
 
  </body>
</html>

<?php

//API useing PUT method to add fake post to jsonplaceholder database

$curl = curl_init();
$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
$userId = $_POST['userId'];
if ($id || $title || $body || $userId)
{
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts/1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => "{\n    \"userId\": $userId,\n    \"id\": $id,\n    \"title\": \".$title\",\n    \"body\": \".$body\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 9afbc13f-e035-4971-bef1-a5dba94abf73",
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

    echo "Result : <br>";
    echo "<table border = 1>";
    echo "<tr><th>ID</th><th>User ID</th><th>Title</th><th>Body</th></tr>";
    
    echo "<tr><td> ".$res['id'].
        "</td><td> ".$res['userId'].
        "</td><td> ".$res['title'].
        "</td><td> ".$res['body'].
        "</td></tr>";
    echo "<table";
}
}
?>
