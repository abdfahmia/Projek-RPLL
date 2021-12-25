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
                    <li class="nav__item"><a href="<?= base_url('home') ?>" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="<?= base_url('home') ?>#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="<?= base_url('home') ?>#menu" class="nav__link">Menu</a></li>
                    <li class="nav__item"><a href="<?= base_url('home') ?>#contact" class="nav__link">Contact us</a></li>
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
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Quantity</th>
                <th>Ukuran</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1 ?>
            <?php foreach ($this->cart->contents() as $a) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $a['name'] ?></td>
                    <td>Rp <?= number_format($a['price'], 0, '.', '.') ?></td>
                    <td><?= $a['qty'] ?></td>
                    <?php if ($this->cart->has_options($a['rowid']) == TRUE) : ?>

                        <?php foreach ($this->cart->product_options($a['rowid']) as $option_name => $option_value) : ?>
                            <td><?= $option_value ?></td>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <td>Rp <?= number_format($a['subtotal'], 0, '.', '.') ?></td>
                    <td><a href="<?= base_url('cart/deletecart/' . $a['rowid']) ?>" class="btn btn-danger mb-3" style="font-size:13px;margin-bottom:19px"><i class="fa fa-trash"></i></a></td>
                </tr>

            <?php endforeach; ?>
            <?php $i = 1 ?>


            <tr>
                <td colspan="5">Total Pembayaran</td>
                <td>Rp <?= number_format($this->cart->total(), 0, '.', '.'); ?></td>
                <td><a href="<?= base_url('cart/cekout') ?>" class="btn btn-success">Checkout</a></td>
            </tr>
            <?php $i++ ?>


        </table>