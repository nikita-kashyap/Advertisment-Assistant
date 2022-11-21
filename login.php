<?php 
session_start();
$conn=mysqli_connect("localhost","root","@nikita","adsass");
$msg = "Error";
if (isset($_POST['email-Id']) && isset($_POST['password'])) 
{
    $uname =$_POST['email-Id'];
    $pass =$_POST['password'];
    $sql = "SELECT * FROM register WHERE email='".$uname."' AND password='".$pass."';";
    $result = mysqli_query($conn, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {   
        $row = $result->fetch_assoc();
        $id=$row['id'];
        $loc = "location:dashboard.php?q=".$id;
        header($loc);
    }else{
    //    header("location:login.html");
        $msg="Invalid Id or Password.";
    }
}else{
    // header("location:login.html");
    $msg="Empty Data.";
}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        .formbox{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;                
            height:200px;
            padding:50px;
        }
        </style>
</head>
<body>
<div class="firstDiv">
        <div class="formbox">
            <h2><?php echo $msg; ?></h2>
            <a class="submitBtn" href="login.html">Try Again</a>
        </div>
    </div>
</body>
</html>