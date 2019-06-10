<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>
    <p>Add Fake Post</p><br>
        <form action = "addpost.php" method  = "POST">
            User ID
            <input type = "number" name = "userId" id = "userId" placeholder="User ID">
            <br><br>
            Title
            <input type = "text" name = "title" id = "title" placeholder = "Post Title">
            <br><br>
            Body <br>
            <textarea rows = "4" cols = "50"> </textarea>
            <br><br>
            <input type = "submit" value = "Add">
        </form> 
        <form action ="main.php"><input type="submit" value="Go back!" ></form>
        <br>
  </body>
</html>
<?php

//API useing POST method to add fake post to jsonplaceholder database

$curl = curl_init();
$title = $_POST['title'];
$body = $_POST['body'];
$userId = $_POST['userId'];

if($title || $body || $userId)
{
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n   \"title\": \"$title\",\r\n    \"body\": \"$body\",\r\n    \"userId\": $userId\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: e75ef7f3-fbd3-4546-a1b2-6a48efb2be1c",
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
