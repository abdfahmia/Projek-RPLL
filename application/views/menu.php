<?php

     $data = file_get_contents('data/pizza.json');
     $menu = json_decode($data, true);

     // var_dump($menu['menu'][0]["nama"]);
     $menu = $menu["menu"];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Responsive website food</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">Tasty</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.php" class="nav__link active-link">Home</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">





            <!--========== MENU ==========-->

            <section class="menu section bd-container" id="menu">
                 <h2 class="section-title" style="color: #069C54;">Tasty Restaurant</h2>
                 <!-- <div class="row"> -->
                      <!-- <div class="col-md-4"> -->
                           <div class="menu__container bd-grid">
                              <?php foreach ($menu as $row): ?>
                              <div class="menu__content">
                                   <img src="img/menu/<?= $row["gambar"]; ?>" class="menu__img"\ />
                                   <h3 class="menu__name"><?= $row["nama"]; ?></h3>
                                   <p style="font-size: 10px;"><?= $row["deskripsi"]; ?></p>
                                   <span class="menu__preci">Rp. <?= $row["harga"]; ?></span>
                                   <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                              </div>
                              <?php endforeach; ?>
                         </div>
                    <!-- </div> -->
               <!-- </div> -->
          </section>


        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Tasty Food</a>
                    <span class="footer__description">Restaurant</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Delivery</a></li>
                        <li><a href="#" class="footer__link">Pricing</a></li>
                        <li><a href="#" class="footer__link">Fast food</a></li>
                        <li><a href="#" class="footer__link">Reserve your spot</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Event</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Lima - Peru</li>
                        <li>Jr Union #999</li>
                        <li>999 - 888 - 777</li>
                        <li>tastyfood@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2020 Bedimcode. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>