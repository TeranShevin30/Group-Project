<?php require_once'connection/connection.php'; ?>

<?php
    session_start();
    $id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div style="margin-left:20%;margin-top:100px">
        <h1 style="color:#041ec2">Pasta Sales Management System</h1>
        <br><br>
        <?php
            $sql3 = "SELECT * FROM users WHERE userid=$id";
            if($result_set = $connection->query($sql3)){
                while($datarows = $result_set->fetch_array(MYSQLI_ASSOC)){
                    echo "<h4>Name: " . $datarows['Names'] . "</h4><br>" . 
                        "<h4>Email: " . $datarows['mails'] . "</h4>";
                }
            }
        ?>
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
</body>
</html>