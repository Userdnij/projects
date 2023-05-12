<?php

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Club</title>

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <link rel="stylesheet" href="cenas.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>

<body id="top">

<div class="body">
    <header class="header">

        <div class="container">


            <nav class="navbar" data-nav>

                <a href="../Hom/Home.php">
                    <img src="log.png" width="160px" >
                </a>
                <ul class="navbar-list">
                    <li>
                        <a href="Cenas.php" class="navbar-link">Cenas</a>
                    </li>

                    <li>
                        <a href="../Rezerv/Rezerv.php" class="navbar-link">Rezervēšana</a>
                    </li>
                </ul>
            </nav>

            <div class="header-actions">

                <button class="search">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <a href="../loginSys/login_form.php" >
                    <button class="btn-sign_in">

                        <div class="icon-box">
                            <ion-icon name="log-in-outline"></ion-icon>
                        </div>

                        <span>Log-in</span>

                    </button>
                </a>
            </div>

        </div>
    </header>
</div>


    <style>
        table {
            border-collapse: collapse;
            width: 150%;

        }

        th, td {
            padding: 13px;
            text-align: center;
            border-bottom: 13px solid var(--raisin-black-2);
            background: var(--raisin-black-3);
        }

        th:last-child, td:last-child {
            text-align: center;

        }

        buttoni {
            background-color: #4CAF50;
            color: white;
            padding: 6px 22px;
            border: none;
            cursor: pointer;

        }
    </style>
<div class="posicija">

<table>
    <tr>
        <th><font color="#4CAF50">Nosaukums</font></th>
        <th><font color="#4CAF50">Laiks</font></th>
        <th><font color="#4CAF50">Cenas</font></th>
        <th><font color="#4CAF50">Iegūšana</font></th>
    </tr>
    <?php if(!empty($rezultat)): ?>
    <?php foreach ($rezultat as $rezultats): ?>
    <tr>
        <td><?php echo $rezultats["nosaukums"] ?></td>
        <td><?php echo $rezultats["laiks"] ?></td>
        <td><?php echo $rezultats["cenas"] ?></td>
        <td> <a href="Pirksana.php?id=<?=$rezultats["id"]?>"class="btn btn-info btn-block add-to-cart" data-id="<?=$rezultats["id"]?>">Pirkt</a></td>
    </tr>
        <?php endforeach; ?>
        <?php endif; ?>


</table>

</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>