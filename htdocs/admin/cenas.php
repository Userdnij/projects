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
        $res = $pdo->query("SELECT * from `cenas`; ");
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
    <script>
    </script>
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
            <th><font color="#4CAF50">Nosaukums</font></th>
            <th><font color="#4CAF50">Laiks</font></th>
            <th><font color="#4CAF50">Cenas</font></th>
        </tr>

        <?php if(!empty($rezultat)): ?>
            <?php foreach ($rezultat as $rezultats): ?>
                <tr> <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                    <td><li class="list-group-item"><?php echo $rezultats["id"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["nosaukums"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["laiks"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["cenas"] ?></li></td>
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
    <input type="text" name="nosaukums" placeholder="nosaukums"><br><br>
    <input type="text" name="laiks" placeholder="laiks"><br><br>
    <input type="text" name="cenas" placeholder="cenas"><br><br>
    <input type="submit" name="submit_add" value="Add">
</form>
    </li> </ul>
    </div>
<?php
    if(isset($_POST['submit_add'])) {
        $nosaukums = $_POST['nosaukums'];
        $laiks = $_POST['laiks'];
        $cenas = $_POST['cenas'];

        require_once '../Rezerv/1connection.php';
        $sql = 'INSERT INTO cenas (nosaukums, laiks, cenas)
                        VALUES (?, ?, ?)';


        $statement = $conn->prepare($sql);

        $statement->execute([$nosaukums, $laiks, $cenas]);
        header('location:cenas.php');
    }
?>
<br><br><br>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
<form action="" method="post">
    <li class="list-group-item">
        Delete by id: <br>

    <input type="text" name="id" placeholder="id"><br><br>
    <input type="submit" name="submit_delete" value="Delete">
</form></li> </ul>
    </div>
<?php
    if(isset($_POST['submit_delete'])) {
        $id = $_POST['id'];

        require_once '../Rezerv/1connection.php';

        $sql = 'DELETE FROM cenas WHERE id = ?';

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);
        header('location:cenas.php');
    }
?>

</body>
</html>
