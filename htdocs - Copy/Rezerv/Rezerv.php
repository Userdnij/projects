<?php
if (empty($_POST) === false) {


    $nameform = $_POST['name'];
    $surnameform = $_POST['surname'];
    $emailform = $_POST['email'];
    $table_numberform = $_POST['table_number'];
    $dateform = $_POST['date'];


    $currentDateTime = new DateTime();
    $reservationDateTime = new DateTime($_POST['date']);

    if ($reservationDateTime >= $currentDateTime) {
        require '1connection.php';

        $sql = 'INSERT INTO rezervacija (name, surname, email, table_number, date)
                    VALUES (?, ?, ?, ?, ?)';


        $statement = $conn->prepare($sql);

        $statement->execute([$nameform, $surnameform, $emailform, $table_numberform, $dateform]);
    }

}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Club</title>

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <link rel="stylesheet" href="rez.css.">

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

                <a href="../Hom/Home.html">
                <img src="log.png" width="160px" >
                </a>

                <ul class="navbar-list">
                    <li>
                        <a href="../Cena/Cenas.php" class="navbar-link">Cenas</a>
                    </li>

                    <li>
                        <a href="Rezerv.php" class="navbar-link">Rezervēšana</a>
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



<div class="intro">
    <div class="place">

        <form action="" class="price-form" method="post">
            <input type="text" class="price-input" id="name" name="name" placeholder="Enter Your Name" pattern="^[a-zA-Z]+$" required maxlength="20" >
            <input type="text" class="price-input" id="surname" name="surname" placeholder="Enter Your Surname" required maxlength="20">
            <input type="email" class="price-input" id="email" name="email" placeholder="Enter Your Email" required maxlength="30">
            <input type="number" class="price-input" id="table_number" name="table_number" placeholder="Enter Your Table Number | max:40" min="1" max="40" required maxlength="2">
            <input type="datetime-local" class="price-input" id="date" name="date" placeholder="date" required>
            <?php
            if(isset($_POST['date'])) {
                $currentDateTime = new DateTime();

                $reservationDateTime = new DateTime($_POST['date']);

                if ($reservationDateTime < $currentDateTime) {
                    echo '<font size="+2"><p style= "color: red">'. 'Nedrīkst rezervēt laiku pagātnē!'.'</p></font>';
                } else {
                    echo '<font size="+2"><p style= "color: green">'. 'Rezervācija noritēja veiksmīgi!'.'</p></font>';
                }
            }
            ?>
            <button class="button" type="submit" >Rezervēt</button>
        </form>
    </div>
</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

