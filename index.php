<?php
include "./fb-login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login With Facebook</title>
</head>

<body>

<h1>Login With Facebook</h1>
    <?php
    if (isset($_SESSION["access_token"])) {
    ?>
        <div class="row">
        <div class="card">
            <div class="card-header">
                <img src="<?php echo $image ?>" alt="">
            </div>
            <div class="card-body">
                <h2><?php echo $name; ?></h2>
                <a href="./logout.php" class="logout">Logout</a>
            </div>
        </div>

        </div>

    <?php } else { ?>
        <div class="login">
        <a href="<?php echo $login ?>">Login with facebook</a>
        </div>

    <?php } ?>

</body>

</html>