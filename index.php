<?php
include 'header.php'; ?>
<section id="feed">
    <div class="container">
        <div class="row">
            <!--sol-->
            <div class="col-md-3 mt-5 d-none d-sm-block">
                <div class="about-us mb-5">
                    <h5 class="text-center montserrat border-bottom border-success p-3">Falzade Hakkında</h5>
                    <p class="text-center"><span class="text-success">Falzade</span> insanların fallarını paylaşıp,
                        başkalarının
                        fallarına <span class="text-success">yorum yapabildiği</span>, ve beğenilen yorumların yine
                        kullanıcılar
                        tarafından <span class="text-success">bağış sistemi ile desteklenebildiği</span> bir sosyal
                        medya falcılık
                        platformudur.</p>
                </div>
                <div class="info-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="text-success rounded-0 nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Nasıl
                                Başladı ?</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="text-success rounded-0 nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Nasıl
                                Çalışır ?</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card shadow-sm rounded-0">
                                <img src="https://1.bp.blogspot.com/-s5Ow1IgWvT0/WViMW61qFqI/AAAAAAAAArE/MxtR6Yalkl8OcjT4TO3l3B9jvG9dFpkBQCLcBGAs/s1600/R%25C3%25BCyada-Fal-Bakt%25C4%25B1rmak-G%25C3%25B6rmek.jpg" class="card-img-top rounded-0" alt="...">
                                <div class="card-body">
                                    <p class="card-text" style="text-align:justify;">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris
                                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                        in voluptate velit
                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt
                                        in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card shadow-sm rounded-0">
                                <img src="https://www.gursesgazetesi.com/images/haberler/2019/03/falcilik-buyuculuk-ufurukculuk-suc-mudur-yasak-midir-falcilik-ufurukculuk-cezasi-nedir.jpg" class="card-img-top rounded-0" alt="...">
                                <div class="card-body">
                                    <p class="card-text" style="text-align:justify;">
                                        Kahve falınızın falını çekip Falzade'de paylaşırsınız. Daha sonra yine siteye
                                        bizzat üye olan
                                        kullanıcılar tarafından falınız <span class="text-success">beğeni ve yorum
                                            alabilir</span>.
                                        Yorumlarda herkes kendi tarzına göre falınızı yorumlar. En çok beğenilen ve
                                        özellikle falı
                                        paylaşan kişinin beğendiği yorumlar yukarıda görünür. Çok beğeni alan yorumlarda
                                        <span class="text-success">"Bağış Yap"</span>" butonu açılır. Sitede ki üyeler
                                        ve isterse falın
                                        sahibi, yorumu yapan falcıya bağış yapabilir.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-footer">
                    <div class="site-menu mt-5">
                        <nav class="nav d-flex justify-content-center border-bottom">
                            <a href="#" class="nav-link text-muted">Hakkımızda</a>
                            <a href="#" class="nav-link text-muted">KVKK</a>
                            <a href="#" class="nav-link text-muted">İletişim</a>
                        </nav>
                    </div>
                    <div class="social">
                        <nav class="nav d-flex justify-content-center">
                            <a href="#" class="nav-link"><i class="fab fa-facebook-square text-primary"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-instagram text-warning"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-twitter text-info"></i></a>
                            <a href="#" class="nav-link"><i class="fab fa-youtube text-danger"></i></a>
                        </nav>
                    </div>
                </div>
            </div>
            <!--orta-->
            <div class="col-md-6">
                <!--Fal paylaş-->
                <?php include 'share-fortune.php'; ?>
                <!--Fal paylaş Son-->
                <div class="feed mt-5 montserrat">
                    <!--İçerik 1-->
                    <?php include 'site-feed.php'; ?>
                    <!--İçerik 1 son-->

                </div>
                <!--feed son-->

                <!--load more-->
                <div class="loadmore text-center m-5 montserrat">
                    <a href="#" class="text-decoration-none text-muted border rounded-pill p-3 shadow-sm">Daha Fazla
                        Göster...</a>
                </div>
            </div>
            <!--Sağ-->
            <?php include 'site-right.php'; ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>