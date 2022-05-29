<form class="mt-5 p-3 shadow montserrat" action="system.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?=$kullanicicek['id']?>">
    <div class="user mb-3">
        <img src="<?=$kullanicicek['fotograf']?>" alt="user" width="12%">
        <a href="profile.php?id=<?=$kullanicicek['id']?>" class="text-decoration-none text-success"><?=$kullanicicek['isim']?></a>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Fal Başlık" aria-describedby="emailHelp" name="baslik">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="detay"></textarea>
        <label for="floatingTextarea">Detay</label>
    </div>
    <div class="mt-3 mb-3">
        <label for="formFile" class="form-label fw-bold">Fotoğrafı Yükle</label>
        <input class="form-control" type="file" id="formFile" name="fotograf">
    </div>
    <button type="submit" name="falekle" style="text-transform:uppercase;" class="btn btn-success w-100 rounded-0 mt-2"><i class="fas fa-share"></i> Paylaş</button>
</form>