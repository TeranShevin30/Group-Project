<?php require_once'connection/connection.php'; ?>
<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header("Location: profile.php");
    }

    if(isset($_POST['login'])){
        $mail = mysqli_real_escape_string($connection,$_POST['username']);
        $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);

        $sql2 = "SELECT * FROM users WHERE mails='{$mail}' AND pswd='{$pswd}' ";
        $result2 = mysqli_query($connection,$sql2);

        if(mysqli_num_rows($result2) == 1){
            $row = mysqli_fetch_assoc($result2);
            $_SESSION['user_id'] = $row['userid'];

            header("Location: profile.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div style="margin-left:20%;margin-top:200px">
        <h1 style="color:#041ec2">Pasta Sales Management System</h1>
        <form action="login.php" method="post">
            <div class="mb-3 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Username</label>
                <input type="email" name="username" class="form-control" id="formGroupExampleInput" placeholder="Email" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" name="pswd" class="form-control" id="formGroupExampleInput2" placeholder="Password" required>
            </div>
            <button name="login" class="btn btn-outline-primary">Login</button>
        </form>
        <a href="sign.php" class="btn btn-outline-primary">Create an account</a>
    </div>
</body>
</html>