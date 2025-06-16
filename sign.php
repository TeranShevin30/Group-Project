<?php require_once'connection/connection.php'; ?>

<?php
    if(isset($_POST['sign'])){
        $name = mysqli_real_escape_string($connection,$_POST['username']);
        $mail = mysqli_real_escape_string($connection,$_POST['mail']);
        $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);

        $sql1 = "INSERT INTO users (Names,mails,pswd) VALUES('{$name}','{$mail}','{$pswd}')";
        $result1 = mysqli_query($connection,$sql1);

        if(isset($result1)){
            header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div style="margin-left:20%;margin-top:200px">
        <h1 style="color:#041ec2">Pasta Sales Management System</h1>
        <form action="sign.php" method="post">
            <div class="mb-3 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Name</label>
                <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Name" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Username</label>
                <input type="email" name="mail" class="form-control" id="formGroupExampleInput" placeholder="Email"  required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" name="pswd" class="form-control" id="formGroupExampleInput2" placeholder="Password" required>
            </div>
            <button class="btn btn-outline-primary" name="sign">Sign Up</button>
        </form>
    </div>
</body>
</html>