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

<?php
$connect=mysqli_connect("localhost","root","@nikita","adsass");

if($connect)
{   $cmd="SELECT id FROM `register` order by id desc limit 1;";
    $ins=mysqli_query($connect,$cmd);
    $id_num=0;
    if($ins){//for converting the last inserted id into new id
        $row = $ins->fetch_assoc();
        $id=$row['id'];
        $id++;
        
    }
    $id=strval($id);
    $name=$_POST['name'];
    $email=$_POST['email-Id'];
    $pass=$_POST['password'];
}
$cmd="insert into register values('".$id."','".$name."','".$email."','".$pass."',true);";
$ins=mysqli_query($connect,$cmd);
if ($ins) {
    //echo "Successfully Registered.";
    $msg="Successfully Registered";
}
else
{
    $msg="Something Error or Already registered.";
}

?>
<div class="firstDiv">
    <div class="formbox">
        <h2><?php echo $msg; ?></h2>
        <a class="submitBtn" href="login.html">Login</a>
    </div>
</div>
</body>
</html>