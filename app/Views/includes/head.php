<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Daily Voting - An Online Voting Platform">
    <meta name="keywords" content="bet, bet365, betting, cricket, gambling, game, hyip, invest, ipl, live, lottery, online betting, online game, soccer, sports">

    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="apple-touch-icon" href="#">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="#">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Daily Voting | Home">
    <meta itemprop="name" content="Voting | Home">
    <meta itemprop="description" content="Daily Voting - An Online Voting Platform">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Daily Voting - An Online Voting Platform">
    <meta property="og:description" content="Daily Voting - An Online Voting Platform">
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image">


    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/skitter.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/animate.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/owl.carousel.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/style.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/jquery.fancybox.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/owl.theme.default.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/aos.css') ?>" />
    <script src="https://kit.fontawesome.com/4303e06f63.js" crossorigin="anonymous"></script>

    <script src="<?= base_url('public/assets/js/fontawesomepro.js') ?>"></script>
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash(); ?>">

    <style>
        .modal .text-box,
        .login-section .text-box {
            background: url();
            background-size: cover;
        }

        #swal2-title {
            color: black !important;
        }

        .btn-custom1 {
            width: 75px;
            height: 35px;
            text-align: center;
            text-transform: capitalize;
            font-size: 15px;
            font-weight: 600;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 3px;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            float: right;
        }
        

        .spinner-border{
            float: right;

        }
        .bg-secondary{
            background-color: var(--bgDark) !important;

        }
    </style>

</head>