<?php
ob_start();
session_start();
include 'connect.php';

/*Kullanici Girisi*/
if (isset($_POST['login'])) {

  $kullanici_adi = $_POST['kullanici_adi'];
  $kullanici_sifre = $_POST['kullanici_sifre'];

  if ($kullanici_adi && $kullanici_sifre) {

    $kullanicisor = $db->prepare("SELECT * FROM kullanicilar where kullanici_adi=:ad and kullanici_sifre=:sifre");
    $kullanicisor->execute(array(
      'ad' => $kullanici_adi,
      'sifre' => md5($kullanici_sifre)
    ));

    echo $say = $kullanicisor->rowCount();

    if ($say > 0) {
      $_SESSION['kullanici_adi'] = $kullanici_adi;
      $_SESSION['kullanici_adi'] = $kullanici_adi;
      header('Location:index.php');
    } else {
      header('Location:login.php?durum=no');
    }
  }
}

/*Kullanici Kayıt İşlemi*/
if (isset($_POST['signin'])) {

  $uploads_dir = 'assets/img/users/';

  @$tmp_name = $_FILES['fotograf']["tmp_name"];
  @$name = $_FILES['fotograf']["name"];

  $refimgyol = 'assets/img/users/' . $name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$name");

  $kullanicikaydet = $db->prepare("INSERT INTO kullanicilar SET
    kullanici_adi=:ad,
    kullanici_sifre=:sifre,
    isim=:isim,
    fotograf=:foto
    ");
  $insert = $kullanicikaydet->execute(array(
    'ad' => $_POST['kullanici_adi'],
    'sifre' => md5($_POST['kullanici_sifre']),
    'isim' => $_POST['isim'],
    'foto' => $refimgyol
  ));

  if ($insert) {
    Header("Location:login.php?kayit=ok");
  } else {
    Header("Location:signin.php?durum=no");
  }
}

/*Fal ekleme İşlemi*/
if (isset($_POST['falekle'])) {

  $uploads_dir = 'assets/img/fortunes/';

  @$tmp_name = $_FILES['fotograf']["tmp_name"];
  @$name = $_FILES['fotograf']["name"];

  $random = rand(10000, 99999);
  $refimgyol = 'assets/img/fortunes/' . $random . $name;
  @move_uploaded_file($tmp_name, "$uploads_dir/" . "$random"."$name");

  $falkaydet = $db->prepare("INSERT INTO fallar SET
    baslik=:baslik,
    detay=:detay,
    user_id=:user_id,
    fotograf=:foto
    ");
  $insert = $falkaydet->execute(array(
    'baslik' => $_POST['baslik'],
    'detay' => $_POST['detay'],
    'user_id' => $_POST['user_id'],
    'foto' => $refimgyol
  ));

  if ($insert) {
    Header("Location:index.php");
  } else {
    Header("Location:index.php");
  }
}

/*fal silme İşlemi*/
if ($_GET['falsil'] == 'ok') {

  $falgetir = $db->prepare("SELECT * FROM fallar");
  $falgetir->execute(array());
  $falbul = $falgetir->fetch(PDO::FETCH_ASSOC);

  unlink($falbul['fotograf']);

  $falsil = $db->prepare("DELETE FROM fallar where id=:id");
  $kontrol = $falsil->execute(array(
    "id" => $_GET['id']
  ));

  if ($kontrol) {
    header("Location: " . "http://" . $_GET['url'] . $location);
  } else {
    header("Location: " . "http://" . $_GET['url'] . $location);
  }
}


/*Yorum ekleme İşlemi*/
if (isset($_POST['yorumekle'])) {

  $yorumekle = $db->prepare("INSERT INTO yorumlar SET
    yorum=:yorum,
    user_id=:user,
    fal_id=:fal
    ");
  $insert = $yorumekle->execute(array(
    'yorum' => $_POST['comment'],
    'user' => $_POST['user_id'],
    'fal' => $_POST['fal_id']
  ));

  if ($insert) {
    Header("Location:" . $_POST['url'] . '?' . $_POST['request']);
  } else {
    Header("Location:" . $_POST['url'] . '?' . $_POST['request']);
  }
}

/*Yorum silme İşlemi*/
if ($_GET['yorumsil'] == 'ok') {

  $yorumsil = $db->prepare("DELETE FROM yorumlar where id=:id");
  $kontrol = $yorumsil->execute(array(
    "id" => $_GET['id']
  ));

  if ($kontrol) {
    header("Location: " . "http://" . $_GET['url'] . $location);
  } else {
    header("Location: " . "http://" . $_GET['url'] . $location);
  }
}
