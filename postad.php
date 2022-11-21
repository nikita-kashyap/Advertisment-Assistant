<?php
if(isset($_GET['q'])){
    $id=$_GET['q'];
    $conn=mysqli_connect("localhost","root","@nikita","adsass");
    $sql = "SELECT * FROM register WHERE id='".$id."';";
    $result = mysqli_query($conn, $sql);
    if ($result != false&&mysqli_num_rows($result) == 1) 
    {
        $row = $result->fetch_assoc();
        $name=$row['name'];
?>
<html>
<head>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <style>
        #mainContent{
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        #mainContent h1{
            margin:0;
            text-align:center;
        }
        #mainContent form{
            display:flex;
            justify-content:center;
            align-items:center;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="navigation">
            <a>Ads Assistent</a>
            <a href="login.html">Logout</a>
            <a href="">Hi, <?php echo $name ?></a>
        </div>
        <div class="firstDiv">
            <div id="sidenav" class="dashboardContainer">
                <button id="activeTab" name="dashboard" class="navbtn" onclick="getNewPage(this)">Dashboard</button>
                <button class="navbtn" name="postad" onclick="getNewPage(this)">New Ads</button>
                <button class="navbtn" name="status" onclick="getNewPage(this)">Ads Status</button>
                <button class="navbtn" name="chats" onclick="getNewPage(this)">Chats</button>
                <button class="navbtn" name="about" onclick="getNewPage(this)">About</button>
                <button class="navbtn" name="contacts" onclick="getNewPage(this)">Contacts</button>
            </div>
            <!-- set main content from here -->
            <div id="mainContent" class="dashboardContainer">
                <h1>Post New Advertisement</h1>
                <form method="post" action="handler.php?handle=postad&q="+<?php echo $id ?>>
                    <table>
                        <tr>
                            <td><label for="id">User Id*</label></td>
                            <td><input id="id" value=<?php echo $id ?> required></td>
                        </tr>
                        <tr>
                            <td><label for="title">Ad title*</label></td>
                            <td><input name="title" id="title" required></td>
                        </tr>
                        <tr>
                            <td><label for="mfg">Manufacured on*</label></td>
                            <td><input name="mfg" type="date" id="mfg" required></td>
                        </tr>
                        <tr>
                            <td><label for="location">Location*</label></td>
                            <td><input name="location" id="location" required></td>
                        </tr>
                        <tr>
                            <td><label for="contact">Contact*</label></td>
                            <td><input name="contact" id="contact" required></td>
                        </tr>
                        <tr>
                            <td><label for="description">Description*</label></td>
                            <td><textarea name="description" id="description" required></td>
                        </tr>
                        <tr>
                            <td><input name="submit" type="submit" value="Post"></td>
                        </tr>
                    </table>
                </form>
                
            </div>
        </div>
    </div>
    <script>
        function getNewPage(t){
            let btn=t.name;
            let target=btn+".php?q="+<?php echo $id; ?>;
            window.location.href=target;
        }
    </script>
</body>
</html>
<?php
    }else{
       echo "Invalid Id";
    }
}else{
    $uname="page not found: Please contact to the service provider;";
    echo $uname;
}
?>

 