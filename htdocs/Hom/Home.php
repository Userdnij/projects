<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cyber Club</title>

  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <link rel="stylesheet" href="./assets/css/main.css">

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

        <a href="Home.php">
          <img src="./assets/images/log.png" width="160px" >
        </a>
        <ul class="navbar-list">
          <li>
            <a href="../Cena/Cenas.php" class="navbar-link">Cenas</a>
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

        <?php
        include '../loginSys/acc.php';

        $func = '';
        if(isset($_SESSION['name']) && $_SESSION['name'] != '') {
          $func = 'logout';
        } else {
          $func = 'login_form';
        }
        ?>
        <a href="../loginSys/<?=$func?>.php">
          <button class="btn-sign_in">
            <div class="icon-box">
              <ion-icon name="log-in-outline"></ion-icon>
            </div>
            <span>
            <?php
            if(session_status() == 2 && isset($_SESSION['name']) && $_SESSION['name'] != '') {
              echo 'Logout';
            } else {
              echo 'Log-in';
            }
            ?>
            </span>
          </button>
        </a>
      </div>

    </div>
  </header>
</div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<div class="place">
<p><?php
   if(isset($_SESSION['admin'])) {
     if($_SESSION['admin'] == 1) {
       ?><a href="../admin/Admin.php">ADMIN PANEL</a><?php
     }
   }
  ?></p>
</div>

<h1>Laipni lūdzam CyberNora — jūsu virtuālajā spēļu oāzē!</h1>
<h2>Atveriet CyberNora durvis un iegremdējieties aizraujošā spēļu pasaulē, kurā varat atraisīt savu potenciālu,
  pārbaudīt jaunas stratēģijas un iegūt draugus, kuriem ir kopīga jūsu aizraušanās ar spēlēm. Neatkarīgi no tā,
  vai esat pieredzējis profesionālis vai tikai sāc savu darbību, CyberNora ir vieta, kur atradīsit savu komandu, ģimeni.</h2>

</body>
</html>