<?php include 'header.php';

$usergetir = $db->prepare("SELECT * FROM kullanicilar where id=:id");
$usergetir->execute(array('id' => $_GET['id']));
$usercek = $usergetir->fetch(PDO::FETCH_ASSOC);

?>
<section id="profil">
  <div class="container">
    <div class="row montserrat">
      <div class="user p-4 mt-5">
        <div class="container">
          <div class="row d-flex align-items-center p-2 bg-light">
            <div class="col-md-3 p-2">
              <img src="<?= $usercek['fotograf'] ?>" alt="user" height="65">
              <span class="text-success fw-bold"> <?= $usercek['isim'] ?></span>
            </div>
            <div class="col-md-3 p-2">
              <i class="fas fa-envelope p-2 bg-dark text-white"></i>
              <span><a href="mailto:<?= $usercek['kullanici_ad'] ?>" class="text-decoration-none text-success fw-bold"><?= $usercek['kullanici_adi'] ?></a></span>
            </div>
            <div class="col-md-3 p-2">
              <i class="fas fa-phone-alt p-2 bg-dark text-white"></i>
              <span><a href="tel:<?= $usercek['telefon'] ?>" class="text-decoration-none text-success fw-bold"><?= $usercek['telefon'] ?></a></span>
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <table class="table table-light table-sm border">
          <thead>
            <tr>
              <th colspan="3" class="text-center">İSTATİSTİKLER</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Toplam Beğeni</td>
              <td><i class="fas fa-thumbs-up"></i> 116</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Toplam Yorum</td>
              <td><i class="fas fa-comment"></i> 14</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Toplam Fal</td>
              <td><i class="fas fa-coffee"></i> 8</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">En Çok Beğeni Alan Yorum</h5>
            <h6 class="card-subtitle mb-2 text-muted">Fal id: <a href="#" class="text-muted">#1688</a></h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#" class="card-link text-decoration-none bg-dark text-white p-2">Devamını Oku</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row bg-light mt-4">
      <div class="col-md-12 mt-3">
        <h4 class="text-center text-success montserrat fw-bold">Takip Edilenler</h4>
        <ol class="list-group rounded-0 m-4">
          <li class="list-group-item d-flex align-items-center align-items-start">
            <div class="col-md-3 p-2">
              <img src="assets/img/users/user-women.png" alt="user" height="65">
              <span class="text-success fw-bold"> Berrin</span><span class="text-success"> (Çevrimiçi)</span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fas fa-envelope p-2 bg-dark text-white"></i>
              <span><a href="mailto:baris@gmail.com" class="text-decoration-none text-success fw-bold">berrrin@gmail.com</a></span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fab fa-facebook-f p-2 bg-dark text-white"></i>
              <span><a href="#" class="text-decoration-none text-success fw-bold">Facebook</a></span>
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </li>
          <li class="list-group-item d-flex align-items-center align-items-start">
            <div class="col-md-3 p-2">
              <img src="assets/img/users/user-man2.png" alt="user" height="65">
              <span class="text-success fw-bold"> Serdar</span><span class="text-danger"> (Çevrimdışı)</span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fas fa-envelope p-2 bg-dark text-white"></i>
              <span><a href="mailto:serdar@gmail.com" class="text-decoration-none text-success fw-bold">serdar@gmail.com</a></span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fab fa-twitter p-2 bg-dark text-white"></i>
              <span><a href="#" class="text-decoration-none text-success fw-bold">Twitter</a></span>
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </li>
          <li class="list-group-item d-flex align-items-center align-items-start">
            <div class="col-md-3 p-2">
              <img src="assets/img/users/user-man3.png" alt="user" height="65">
              <span class="text-success fw-bold"> Emre</span><span class="text-success"> (Çevrimiçi)</span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </li>
          <li class="list-group-item d-flex align-items-center align-items-start">
            <div class="col-md-3 p-2">
              <img src="assets/img/users/user-women2.png" alt="user" height="65">
              <span class="text-success fw-bold"> Leyla</span><span class="text-success"> (Çevrimiçi)</span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fas fa-envelope p-2 bg-dark text-white"></i>
              <span><a href="mailto:leyla@gmail.com" class="text-decoration-none text-success fw-bold">leyla@gmail.com</a></span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </li>
          <li class="list-group-item d-flex align-items-center align-items-start">
            <div class="col-md-3 p-2">
              <img src="assets/img/users/user-women1.png" alt="user" height="65">
              <span class="text-success fw-bold"> Fatma</span><span class="text-success"> (Çevrimdışı)</span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fas fa-envelope p-2 bg-dark text-white"></i>
              <span><a href="mailto:fatma@gmail.com" class="text-decoration-none text-success fw-bold">fatma@gmail.com</a></span>
            </div>
            <div class="col-md-3 p-2 d-none d-sm-block">
              <i class="fas fa-phone-alt p-2 bg-dark text-white"></i>
              <span><a href="tel:05555555555" class="text-decoration-none text-success fw-bold">0546478974</a></span>
            </div>
            <div class="col-md-3 p-2">
              <a href="#" class="text-decoration-none p-2 bg-dark text-white"><i class="fas fa-envelope"></i> Mesaj Gönder</a>
            </div>
          </li>
        </ol>
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