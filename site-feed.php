<?php
if (!empty($_GET)) {
    if (!empty($_GET['user_id'])) {
        $falgetir = $db->prepare("SELECT * FROM fallar where user_id=:id");
        $falgetir->execute(array('id' => $_GET['user_id']));
    } elseif (!empty($_GET['yorumcu_id'])) {
        $falgetir = $db->prepare("SELECT * FROM yorumlar where user_id=:id");
        $falgetir->execute(array('id' => $_GET['yorumcu_id']));

        $usergetir = $db->prepare("SELECT * FROM kullanicilar where id=:user_id");
        $usergetir->execute(array('user_id' => $_GET['yorumcu_id']));
        $usercek = $usergetir->fetch(PDO::FETCH_ASSOC);

        foreach ($falgetir as $rows) { ?>
            <!--Yorumlar Alanı-->
            <div class="shadow-sm w-100 rounded-3">
                <div class="card-body">
                    <div class="comments">
                        <div class="user mb-3 mt-3">
                            <div class="comment-action">
                                <div class="user mb-3 mt-3">
                                    <img src="<?= $usercek['fotograf'] ?>" class="rounded-0" alt="user" width="10%">
                                    <a href="profile.php?id=<?= $usercek['id'] ?>" class="text-decoration-none text-success fw-bold"><?= $usercek['isim'] ?></a>
                                </div>
                                <p class="text-muted"><?= $rows['yorum'] ?></p>
                                <nav class="nav">
                                    <a class="nav-link text-dark" href="fortune-detail.php?id=<?=$rows['fal_id']?>"><i class="fas fa-link text-info"></i> Fal'a Git</a>
                                    <a class="nav-link text-dark" href="system.php?yorumsil=ok&url=<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>&id=<?= $rows['id'] ?>"><i class="fas fa-trash text-danger"></i> Yorumu Sil</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--Yorumlar Alanı Son-->
    <?php  }
} else {
    $falgetir = $db->prepare("SELECT * FROM fallar ORDER BY id DESC");
    $falgetir->execute(array());
}
foreach ($falgetir as $rows) {
    $id = $rows['id'];
    ?>
    <div class="shadow-sm w-100 rounded-3">
        <?php
        $usergetir = $db->prepare("SELECT * FROM kullanicilar where id=:user_id");
        $usergetir->execute(array('user_id' => $rows['user_id']));
        $usercek = $usergetir->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="user mb-3 mt-3">
            <img src="<?= $usercek['fotograf'] ?>" class="rounded-0" alt="user" width="10%">
            <a href="profile.php?id=<?= $usercek['id'] ?>" class="text-decoration-none text-success fw-bold"><?= $usercek['isim'] ?></a>
        </div>
        <h5 class="text-muted"><?= $rows['baslik'] ?></h5>
        <a href="fortune-detail.php?id=<?= $rows['id'] ?>"><img src="<?= $rows['fotograf'] ?>" class="card-img-top" alt="kahve"></a>
        <div class="card-body">
            <div class="action">
                <nav class="nav">
                    <?php
                    $yorumlar = $db->prepare("SELECT COUNT(*) FROM yorumlar WHERE fal_id=$id");
                    $yorumlar->execute();
                    $yorumsay = $yorumlar->fetchColumn();
                    ?>
                    <a class="nav-link text-dark" href="#"><i class="fas fa-thumbs-up text-danger"></i>
                        <?= $rows['begeni'] ?></a>
                    <a class="nav-link text-dark" href="#"><i class="fas fa-comment text-success"></i><?= $yorumsay ?></a>
                    <a class="nav-link text-dark" href="#"><i class="fas fa-share-alt text-info"></i> Paylaş</a>
                    <?php if ($kullanicicek['id'] == $rows['user_id']) { ?>
                        <a class="nav-link text-dark" href="system.php?falsil=ok&url=<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>&id=<?= $rows['id'] ?>"><i class="fas fa-trash text-danger"></i> Falı Sil</a>
                    <?php } ?>
                </nav>
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
                        <a href="profile.php?id=<?= $yorumcucek['id'] ?>" class="text-decoration-none text-success"><?= $yorumcucek['isim'] ?></a>
                        <p class="pt-2" style="font-size:14px; text-align:justify;"><?= $yorum['yorum'] ?></p>
                        <div class="comment-action">
                            <nav class="nav">
                                <a class="nav-link text-dark" href="#"><i class="fas fa-thumbs-up text-danger"></i><?= $yorum['begeni'] ?></a>
                                <a class="nav-link text-dark" href="#"><i class="fas fa-coins text-warning"></i> Bağış Yap</a>
                                <?php if ($kullanicicek['id'] == $yorumcucek['id']) { ?>
                                    <a class="nav-link text-dark" href="system.php?yorumsil=ok&url=<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>&id=<?= $yorum['id'] ?>"><i class="fas fa-trash text-danger"></i> Yorumu Sil</a>
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
<?php } ?>