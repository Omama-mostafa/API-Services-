<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="body.css" />
    
</head>

<header> 
    <p>Free APIs</p>
</header>
    <body>

    <p>There are Some APIs</p>
        
        <p>Get Fake Posts By Post ID</p> <br>

        <form action = "getpost.php" method = "POST">
            <input type = "number" name = "id" id = "id">
            <input type = "submit" value = "Get">
        </form>
        <form action ="main.php"><input type="submit" value="Go back!" ></form>
        <br>
 
  </body>
</html>

<?php
// API search about fake posts by post id  from jsonplaceholder website

$curl = curl_init();
$id = $_POST['id'];
if($id)
{
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts?id=$id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 64f8dce5-254e-4509-9e85-93b19bcbabef",
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
    $arr = json_decode($response , true);
    $res = $arr[0];
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
