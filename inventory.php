<!DOCTYPE html>
<html>

<body>


    <head>
        <meta charset="utf-8">
        <title>Dashboard - <?php echo $_SESSION['username']; ?></title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>
    <div class="jumbotron text-center">
        <h1>HPCL Inventory Management</h1>
        <p>Manage inventories in and out of the company</p>
    </div>
    <p><a href="addinventory.php">Add Inventory</a></p>
    <?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
    require('db.php');
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
  // echo 'connect success';
}

$sql = "SELECT * FROM inventory";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

echo '<div class="container">';
echo '<table class="table table-striped table-responsive">';
echo '<thead>';
echo '<tr>';
echo '<th>S.No</th>';
echo '<th>Inventory Id</th>';
echo '<th>Item Name</th>';
echo '<th>Quantity</th>';
echo '<th>Created On  </th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// echo '<td>1</td>';
// echo '<td>John</td>';
// echo '<td>Doe</td>';
// echo '<td>john@example.com</td>';
// while($row = $result->fetch_assoc()) {
//   // echo "<td>".$row["id"]."</td><td>".$row["inventory_id"]."<td></td>".$row["itemname"]."</td><td>".$row["qty"]."</td><td>".$row["created_at"]."</td>"
//         // echo "<br> id: ". $row["id"]. "<br>";
// }
// echo "<td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td>";
while($row = $result->fetch_assoc()) {
  echo "<tr><td>".$row["id"]."</td><td>".$row["inventory_id"]."</td><td>".$row["itemname"]."</td><td>".$row["qty"]."</td><td>".$row["created_at"]."</td></tr>";

  // echo "<br> id: ". $row["id"]. "<br>";
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
// echo '</div>';
    // while($row = $result->fetch_assoc()) {
    //     echo "<br> id: ". $row["id"]. "<br>";
    // }
} else {
    echo "0 results";
}

$con->close();
?>
    <!-- 
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
            </tbody>
        </table>
    </div> -->

    <p><a href="logout.php">Logout</a></p>
    </div>
</body>

</html>