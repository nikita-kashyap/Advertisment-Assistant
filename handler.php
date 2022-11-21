<?php
if(isset($_GET['q'])){
    $id=$_GET['q'];
    $conn=mysqli_connect("localhost","root","@nikita","adsass");
    $sql = "SELECT * FROM register WHERE id='".$id."';";
    $result = mysqli_query($conn, $sql);
    $msg="Something error";
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
        if(isset($_GET['handle'])){
            if($_GET['handle']=="postad"){
                //write to send code for post details
            }
        }
    }else{
        $msg="Invalid User Id";
    }
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
            <a class="submitBtn" href="dashboard.php?q=<?php echo $id; ?>">Try Again</a>
        </div>
    </div>
</body>
</html>