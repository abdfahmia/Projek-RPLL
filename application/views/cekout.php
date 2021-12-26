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
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-5">
                <table class="table" style="float:left">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Ukuran</th>
                        <th>Subtotal</th>

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

                        </tr>

                    <?php endforeach; ?>


                </table>
                <h1>Alamat Pengiriman</h1>
                <hr>
                <form action="<?= base_url('cart/sukses') ?>" method="post" target="_blank">
                    <input class="form-control" type="text" name="nama" Placeholder="Nama Penerima">
                    <hr>
                    <input class="form-control" type="text" name="no_telp" Placeholder="No Telp">
                    <hr>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control">
                    </textarea>

                    <br>
            </div>
            <div class="col-3 total shadow" style="margin-left:120px;height:20vh">
                <h2 class="title" style="font-size:30px">Ringkasan Belanja</h2>
                <hr>
                <div class="list">
                    <span>Total Item</span>
                    <span style="float: right;"><?= $this->cart->total_items(); ?></span>
                </div>
                <div class="list">
                    <span>Total Pembayaran</span>
                    <span style="float: right;">Rp <?= number_format($this->cart->total(), 0, '.', '.'); ?></span>
                </div>
                <button type="submit">Pembayaran</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
