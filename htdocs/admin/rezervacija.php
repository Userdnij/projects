<?php
include '../loginSys/acc.php';
require_once "../Rezerv/1connection.php";
function pirkums():array
{

    $servername = "localhost";
    $database = "user_db";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    global $pdo;
    $res = $pdo->query("SELECT * from `rezervacija`; ");
    return $res->fetchAll();

}

$rezultat = pirkums();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<a class="btn btn-primary"  href="Admin.php" role="button">back</a>

<center>
<form action="" method="post">
    <table>
        <tr>
            <th><font color="#4CAF50">ID</font></th>
            <th><font color="#4CAF50">Name</font></th>
            <th><font color="#4CAF50">Surname</font></th>
            <th><font color="#4CAF50">email</font></th>
            <th><font color="#4CAF50">table_number</font></th>
            <th><font color="#4CAF50">date</font></th>
        </tr>
        <?php if(!empty($rezultat)): ?>
            <?php foreach ($rezultat as $rezultats): ?>
                <tr>
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <form action="" method="post">

                    <td><li class="list-group-item"><?php echo $rezultats["id"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["name"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["surname"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["email"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["table_number"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["date"] ?></li></td>
                                 </ul>
                    </div>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</form>

<br>
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <form action="" method="post">
            <li class="list-group-item">
<form action="" method="post">
    Add new: <br>
    <input type="text" name="name" placeholder="name"><br><br>
    <input type="text" name="surname" placeholder="surname"><br><br>
    <input type="text" name="email" placeholder="email"><br><br>
    <input type="text" name="table_number" placeholder="table_number"><br><br>
    <input type="datetime-local" name="date"><br><br>
    <input type="submit" name="submit_add" value="Add">
</form>
            </li> </ul>
</div>
<?php
if(isset($_POST['submit_add'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $table_number = $_POST['table_number'];
    $date = $_POST['date'];

    require_once '../Rezerv/1connection.php';
    $sql = 'INSERT INTO rezervacija (name, surname, email, table_number, date)
                        VALUES (?, ?, ?, ?, ?)';


    $statement = $conn->prepare($sql);

    $statement->execute([$name, $surname, $email, $table_number, $date]);
    header('location:rezervacija.php');
}
?>
<br>
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        <form action="" method="post">
            <li class="list-group-item">
<form action="" method="post">
    Delete by id: <br>
    <input type="text" name="id" placeholder="id"><br><br>
    <input type="submit" name="submit_delete" value="Delete">
</form>
</li> </ul>
</div>
<?php
if(isset($_POST['submit_delete'])) {
    $id = $_POST['id'];

    require_once '../Rezerv/1connection.php';

    $sql = 'DELETE FROM rezervacija WHERE id = ?';

    $statement = $conn->prepare($sql);

    $statement->execute([$id]);
    header('location:rezervacija.php');
}
?>

</body>
</html>
