<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Add Inventory - <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['itemname'])) {
        // removes backslashes
        $itemname = stripslashes($_REQUEST['itemname']);
        //escapes special characters in a string
        $itemname = mysqli_real_escape_string($con, $itemname);
        $timestamp = time();
        $qty    = stripslashes($_REQUEST['qty']);
        $qty    = mysqli_real_escape_string($con, $qty);
        $create_datetime = date("Y-m-d H:i:s");
        // echo 'test mani';
        // echo $_SESSION['username'];
        $created_by = $_SESSION['username'];
        $query    = "INSERT into `inventory` (itemname, qty, inventory_id, created_by)
                     VALUES ('$itemname', '$qty', '$timestamp','$created_by' )";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You added inventory successfully.</h3><br/>
                  <p class='link'>Click here to <a href='inventory.php'>See Inventory</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='addinventory.php'>add inventory</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Add Inventory</h1>
        <input type="text" class="login-input" name="itemname" placeholder="Item Name" required />
        <input type="text" class="login-input" name="qty" placeholder="Quantity">
        <input type="submit" name="submit" value="Add Inventory" class="login-button">
        <p class="link"><a href="inventory.php">See Inventory</a></p>
    </form>
    <?php
    }
?>
</body>

</html>