<?php 
ob_start();
session_start();
include 'connect.php';
include 'function.php';

$kullanicisor =$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_adi=:ad");
$kullanicisor->execute(array(
  'ad' => $_SESSION['kullanici_adi']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['kullanici_adi'])) {

  header('location:login.php?durum==yetkisizgiris');

}
?>

<!doctype html>
<html lang="tr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Berrin Kocabıyık, Barış Ömer Döngel">
  <meta name="description" content="Falını paylaş veya diğer insanların fallarını yorumla.">
  <meta name="keywords" content="fal, kahve falı, tarrot, kahve, falcılık, fal bakma, falzade">

  <!--Fontawesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Style CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Anasayfa</title>
</head>
<body style="background-color:#fefeff;">
  <header class="mb-5">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light montserrat">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="assets/img/logo.png" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-center">
            <li class="nav-item m-2">
              <a class="nav-link text-primary fw-bold p-2 shadow-sm" href="index.php"><i class="fas fa-rss-square"></i> Akış</a>
            </li>
            <li class="nav-item m-2">
              <a class="nav-link text-warning fw-bold p-2 shadow-sm" href="index.php?user_id=<?=$kullanicicek['id']?>"><i class="fas fa-coffee"></i> Fallarım</a>
            </li>
            <li class="nav-item m-2">
              <a class="nav-link text-success fw-bold p-2 shadow-sm" href="index.php?yorumcu_id=<?=$kullanicicek['id']?>"><i class="fas fa-comment"></i> Yorumlarım</a>
            </li>
          </ul>
          <div>
            <li class="nav-item dropdown d-flex kullanici">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?=$kullanicicek['fotograf']?>" height="50">
              </a>
              <ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php?id=<?=$kullanicicek['id']?>"><i class="fas fa-user"></i> Profil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Ayarlar</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
              </ul>
            </li>
          </div>
        </div>
      </div>
    </nav>
  </header>