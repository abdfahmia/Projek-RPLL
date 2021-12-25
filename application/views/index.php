<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/assets/fontawesome/css/all.css') ?>">



    <title>Desserthash.id</title>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">Desserthash.id</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list ml-3">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#menu" class="nav__link">Menu</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                    <li class="nav__item position-relative"><a href="<?= base_url('cart') ?>" class="nav__link">
                            <i class="fas fa-shopping-cart" style="font-size:23px;"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:10px">
                                <?php $cart = $this->cart->total_items(); ?>
                                <?= $cart ?>
                            </span></a></li>


                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">Desserthash.id</h1>
                    <h2 class="home__subtitle">Cobalah Menu Terbaik <br> Minggu ini</h2>
                    <a href="#menu" class="button">Lihat Menu</a>
                </div>

                <img src="<?= base_url('assets/frontend/img/pg.png') ?> " alt="" class="home__img">
            </div>
        </section>

        <!--========== ABOUT ==========-->
        <section class="about section bd-container" id="about">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial">Tentang kami</span>
                    <h2 class="section-title about__initial">Eat me and you will find Hapiness <br> Desserthash.id</h2>
                    <p class="about__description" style="text-align: justify;">Halo sobat maniezzzz!!!!

                        Perlu hal yang balikin Mood?
                        Mau makan manis tapi ga kemanisan?
                        Butuh makanan yang bisa bikin kalian Bahagia?

                        Tenang kami punya solusi!!!!! Soal harga ga perlu khawatir karena aman di kantong lho, ngeluarin 25k kamu udah bisa dapetin yang BIG!!! dan ukuran KECIL cuma 10k!!!👻👻👻
                        Dessert terbaik di seluruh kota, dengan layanan pelanggan yang sangat baik, makanan terbaik dan dengan harga terbaik, kunjungi kami.</p>
                    <a href="https://www.instagram.com/desserthash.id/" class="button">Explore</a>
                </div>

                <img src="<?= base_url('assets/frontend/img/about.jpg') ?>" alt="" class="about__img">
            </div>
        </section>




        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <span class="section-subtitle">Spesial</span>
            <h2 class="section-title">Menu minggu ini</h2>

            <div class="menu__container bd-grid">
                <?php $i = 1 ?>
                <?php foreach ($produk as $a) : ?>
                    <div class="menu__content">
                        <img src="<?= base_url('assets/frontend/img/varian/' . $a->gambar) ?>" alt="" class="menu__img">
                        <h3><?= $a->nama_produk ?></h3>
                        <span><?= $a->ukuran ?></span>
                        <span>Rp.<?= $a->harga ?></span>
                        <a href="<?= base_url('cart/tambah/' . $a->id_produk) ?>" class="button menu__button"><i class='bx bx-cart'></i></a>
                    </div>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </div>

            <!-- <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/milkbath.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Milkbath</h3>
                    <span class="menu__detail">Big</span>
                    <span class="menu__preci">Rp. 25000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>

                <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/chocovado.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Chocovado</h3>
                    <span class="menu__detail">Small</span>
                    <span class="menu__preci">Rp. 10000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>
                <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/chocovado.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Chocovado</h3>
                    <span class="menu__detail">Big</span>
                    <span class="menu__preci">Rp. 10000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>

                <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/tiramisu.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Tiramisu</h3>
                    <span class="menu__detail">Small</span>
                    <span class="menu__preci">Rp. 10000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>
                  <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/tiramisu.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Tiramisu</h3>
                    <span class="menu__detail">Big</span>
                    <span class="menu__preci">Rp. 25000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>
                <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/redvelvet.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Redvelvet</h3>
                    <span class="menu__detail">Small</span>
                    <span class="menu__preci">Rp. 10000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>
                <div class="menu__content">
                    <img src="<?= base_url('assets/frontend/img/varian/redvelvet.jpg') ?>" alt="" class="menu__img">
                    <h3 class="menu__name">Dessertbox-Redvelvet</h3>
                    <span class="menu__detail">Big</span>
                    <span class="menu__preci">Rp. 25000</span>
                    <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div> -->
            <!--  <a href="menu.php" class="button">Lihat Semua Menu</a> -->
        </section>


        <!--========== CONTACT US ==========-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Let's talk</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">Jika Anda ingin memesan dessert box dari kami, hubungi kami dan kami akan segera melayani Anda, dengan layanan obrolan 24/7 kami.</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Order Now</a>
                </div>
            </div>
        </section>
    </main>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Desserthash.id</a>
                <span class="footer__description">Restaurant</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/desserthash.id/" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Delivery/COD</h3>
                <ul>
                    <li>Hash</li>
                    <li>Gosend</li>
                    <li>Grab Delivery</li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Information</h3>
                <ul>
                    <li><a href="#contact" class="footer__link">Contact us</a></li>
                    <li><a href="#menu" class="footer__link">Menu</a></li>
                    <li><a href="#about" class="footer__link">About</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Address</h3>
                <ul>
                    <li>Cisarua, Bogor</li>
                    <li>Jawa Barat, Indonesia</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">
            <marquee>&#169; 2021 Desserthash. Eat me and you will find Hapiness</marquee>
        </p>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="<?= base_url('assets/frontend/assets/js/main.js') ?> "></script>
</body>

</html>