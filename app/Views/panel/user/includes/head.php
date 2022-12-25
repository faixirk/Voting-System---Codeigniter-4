<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= csrf_meta() ?>

    <link rel="shortcut icon" href="#" type="image/x-icon">

    <link rel="apple-touch-icon" href="#">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Daily Voting | Dashboard">

    <meta itemprop="name" content="Voting | Dashboard">
    <meta itemprop="description" content="Voting - An Online voting Platform">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Voting - An Online Voting Platform">
    <meta property="og:description" content="Voting - An Online voting Platform">
    <meta property="og:image:type" content="image/png" />



    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/bootstrap.min.css')?>" />
    
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/animate.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/owl.carousel.min.cs')?>s" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/owl.theme.default.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/skitter.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/aos.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/jquery.fancybox.min.css')?>" />

    <script src="<?= base_url('public/assets/js/fontawesome/fontawesomepro.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/style.css')?>" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/4303e06f63.js" crossorigin="anonymous"></script>

    <style>
      
        /* .chats  li:hover {
            background: var(--primary);
            color: var(--white); 

        } */
      

.DivWithScroll{
    height:140px;
    overflow:scroll;
    overflow-x:hidden;
}
        .container {
  /* border: 2px solid #dedede; */
  /* background-color: #f1f1f1; */
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

/* .leftbar {
  width: 290px !important;
} */
#fixedbutton {
    position: fixed;
    bottom: 70px;
    right: 12px; 
}
    </style>
</head>