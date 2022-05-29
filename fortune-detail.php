<?php include 'header.php';

$falgetir = $db->prepare("SELECT * FROM fallar WHERE id= :id");
$falgetir->execute(array(
  'id' => $_GET['id']
));
$rows = $falgetir->fetch(PDO::FETCH_ASSOC);
$id = $rows['id'];
?>

<section id="fortune-detail">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h4></h4>
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= $rows['fotograf'] ?>" alt="fal-resmi" class="img-fluid w-100">
            </div>
            <div class="col-md-8">
              <?php
              $usergetir = $db->prepare("SELECT * FROM kullanicilar where id=:user_id");
              $usergetir->execute(array('user_id' => $rows['user_id']));
              $usercek = $usergetir->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="card-body">
                <img src="<?= $usercek['fotograf'] ?>" class="rounded-0" alt="user" width="7%">
                <span><a href="#" class="text-decoration-none text-success"><?= $usercek['isim'] ?></a></span>
                <h5 class="card-title mt-3"><?= $rows['baslik'] ?></h5>
                <p class="card-text"><?= $rows['detay'] ?></p>
                <div class="action">
                  <?php
                  $yorumlar = $db->prepare("SELECT COUNT(*) FROM yorumlar WHERE fal_id=$id");
                  $yorumlar->execute();
                  $yorumsay = $yorumlar->fetchColumn();
                  ?>
                  <nav class="nav">
                    <a class="nav-link text-dark" href="#"><i class="fas fa-thumbs-up text-danger"></i> <?= $rows['begeni'] ?></a>
                    <a class="nav-link text-dark" href="#"><i class="fas fa-comment text-success"></i> <?= $yorumsay ?></a>
                    <a class="nav-link text-dark" href="#"><i class="fas fa-share-alt text-info"></i> Paylaş</a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="comments">
                <?php
                $i = 1;
                if (isset($_POST['limit'])) {
                    $i = (int)$_POST['limit'];
                    $yorumgetir = $db->prepare("SELECT * FROM yorumlar WHERE fal_id=$id LIMIT $i");
                    $yorumgetir->execute(array());
                } else {
                    $yorumgetir = $db->prepare("SELECT * FROM yorumlar WHERE fal_id=$id LIMIT $i");
                    $yorumgetir->execute(array());
                }
                foreach ($yorumgetir as $yorum) {
                    $yorumcugetir = $db->prepare("SELECT * FROM kullanicilar where id=:user_id");
                    $yorumcugetir->execute(array('user_id' => $yorum['user_id']));
                    $yorumcucek = $yorumcugetir->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="user mb-3 mt-3">
                        <img src="<?= $yorumcucek['fotograf'] ?>" class="rounded-0" alt="user" width="7%">
                        <a href="#" class="text-decoration-none text-success"></a>
                        <p class="pt-2" style="font-size:14px; text-align:justify;"><?= $yorum['yorum'] ?></p>
                        <div class="comment-action">
                            <nav class="nav">
                                <a class="nav-link text-dark" href="#"><i class="fas fa-thumbs-up text-danger"></i><?= $yorum['begeni'] ?></a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-coins text-warning"></i> Bağış Yap</a>
                                <?php if ($kullanicicek['id'] == $yorumcucek['id']) { ?>
                                    <a class="nav-link text-dark" href="system.php?yorumsil=ok&url=<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>&id=<?=$yorum['id']?>"><i class="fas fa-trash text-danger"></i> Yorumu Sil</a>
                                <?php } ?>
                            </nav>
                        </div>
                    </div>
                <?php } ?>
                <?php include 'add-comment.php' ?>
                <form action="" method="POST">
                    <button type="submit" name="limit" value="<?= $i += 2 ?>" class="text-muted btn btn-muted"><i class="fa fa-plus"></i> Daha
                        fazla yorum göster </button>
                    <button type="submit" name="limit" value="<?= $i = 0 ?>" class="text-danger btn btn-muted"> Yorumları Kapat </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer id="footer" class="bg-black">
  <div class="container">
    <div class="row p-2">
      <div class="col-md-12">
        <h4 class="text-center p-2 text-white">Sosyal Medya'da Biz</h4>
        <nav class="nav d-flex justify-content-center">
          <a href="#"><i class="p-3 fab fa-facebook-f text-primary fa-2x"></i></a>
          <a href="#"><i class="p-3 fab fa-twitter text-info fa-2x"></i></a>
          <a href="#"><i class="p-3 fab fa-youtube text-danger fa-2x"></i></a>
          <a href="#"><i class="p-3 fab fa-pinterest text-danger fa-2x"></i></a>
        </nav>
      </div>
      <div class="col-md-12">
        <p class="text-center text-muted mt-3">Copyright 2022 | Falzade</p>
      </div>
    </div>
  </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>