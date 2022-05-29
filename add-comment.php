<form action="system.php" method="POST">
    <input type="hidden" name="user_id" value="<?=$kullanicicek['id']?>">
    <input type="hidden" name="fal_id" value="<?=$rows['id']?>">
    <input type="hidden" name="yorumekle">
    <input type="hidden" name="url" value="<?=$_SERVER['PHP_SELF']?>">
    <input type="hidden" name="request" value="<?=$_SERVER['QUERY_STRING']?>">

    <div class="form-floating mb-3">
        <input type="text" name="comment" class="form-control rounded-pill" id="floatingInput" placeholder="Yorum Yap">
        <label for="floatingInput">Yorum Yap</label>
    </div>
</form>