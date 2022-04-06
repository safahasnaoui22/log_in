<?php
$host="localhost";
$user="root";
$password="";
$db="user_login";

session_start();
$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("coonection error");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    

    $sql="select * from user1 where  username='".$username."' AND password='".$password."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

if($row["usertype"] =="user")
{ $_SESSION["username"]=$username;

    header("location:username.php");
}

elseif($row["usertype"] =="admin")
{   $_SESSION["username"]=$username;
    header("location:admin.php");
}
else
{
   echo "username or password inccorect";
}

}

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <center>
       
        <br><br><br>
        <div class="login_box">
        <div>
            <br><br>
            <form action="#" method="post">
            <h1 id="tittle">Log_In</h1>
            <br>
            <label for="">username</label>
        <input type="text" name="username" id="pass" require >
    </div>
<br><br>
    <div>
        <label for="">password</label>
        <input type="text" name="password" id="pass" require >
    </div>
<br><br>
    <div>
        <input id="login" type="submit" value="login">
    </div>
            </form>
        
    <br><br>
        </div>
   
    </center>
  

</body>
</html>