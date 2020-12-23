<!-- background header -->
<div class="hero-image" style="max-height: 90vh;">
    <div class="hero-text">
        <h1 class="font-weight-bold header-text">Pangan adalah pilar hidup <br> matinya sebuah bangsa</h1>
    </div>
</div>

<!-- Tentang Kami -->
<section class="mt-5-custom px-sm-3 container">
    <div class="row">
        <div class="col-sm">
            <h2 class="font-weight-bold font-8">Tentang Kami</h2>
            <!-- kutipan kalimat tentang kami -->
            <p class="pt-2 text-justify">Kami merupakan mahasiswa sekolah vokasi ipb program studi manajemen informatika yang ditugaskan untuk membantu pemerintah dalam mengkapanyekan kegiatan diversivikasi pangan melalui media sistem dan teknologi informasi. Tujuan dari diversifikasi pangan ini adalah Meningkatkan kesadaran, peran, dan partisipasi masyarakat dalam mewujudkan pola konsumsi pangan yang Beragam, Bergizi Seimbang dan Aman (B2SA) serta mengurangi ketergantungan terhadap bahan pangan pokok beras
            </p>
            <button class="btn btn-dark btn-hidden">
                Selengkapnya
                <i class='fas fa-chevron-right'></i>
            </button>
        </div>
        <div class="col-sm text-center">
            <img class="tentang-img img-fluid img-shadow rounded-border" src="assets/images/img_jagung.jpg" alt="">
            <button class="mt-3 btn btn-dark btn-hidden-2">
                Selengkapnya
                <i class='fas fa-chevron-right'></i>
            </button>
        </div>
    </div>
</section>

<!-- Tujuan -->
<section class="mt-5-custom container-fluid bg-green">
    <div class="row">
        <div class="px-0 col-sm">
                <img class="object-cover img-fluid w-100 h-100" src="assets/images/img_beras2.jpg" alt="">
        </div>
        <div class="col-sm">
            <div class="px-sm-4 pt-3">
                <h2 class="font-weight-bold text-white font-8">Tujuan</h2>
                <!-- kutipan kalimat Tujuan -->
                <p class="pt-2 text-justify text-white">Website ini bertujuan untuk mengenalkan dan mengedukasi masyarakat tentang diversifikasi pangan. Diversifikasi pangan adalah membudayakan pola konsumsi pangan beragam, bergizi, seimbang, dan aman untuk hidup sehat, aktif, dan produktif
                </p>
                <button class="btn btn-dark mb-3">
                    Selengkapnya
                    <i class='fas fa-chevron-right'></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Artikel Terbaru -->
<?php $row = array_reverse($dataArtikel) ?>
<section class="mt-5-custom px-0 container-fluid ">
    <h2 class="container px-sm-3 font-weight-bold font-8">Artikel Terbaru</h2>
        <div class="position-relative">
            <img class="img-fluid mh-img-50"  src="/assets/uploads/<?php echo $row[0]->thumbnail ?>" alt="">
            <div class="container px-sm-3">
                <div class="position-absolute text-block-transparant index-1 text-white">
                    <h4 class="text-white font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[0]->judul)),0,45)."..."; ?></h4>
                    <!-- Kutipan artikel terbaru -->
                    <p class=" text-justify">
                        <?php echo substr($row[0]->konten,0,50)."..." ?>
                    </p>
                    <a href="#" class="text-blue-sea font-weight-bold">Selengkapnya
                        <hr class="biru ml-0 mt-0">
                    </a>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <img class="img-fluid mh-img-50" src="/assets/uploads/<?php echo $row[1]->thumbnail ?>" alt="">
            <div class="container px-sm-3">
                <div class="position-absolute text-block-transparant-right text-white index-1">
                    <h4 class="text-white font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[1]->judul)),0,45)."..."; ?></h4>
                    <!-- Kutipan artikel terbaru -->
                    <p class="text-justify">
                        <?php echo substr($row[1]->konten,0,50)."..." ?>
                    </p>
                    <a href="#" class="text-blue-sea font-weight-bold">Selengkapnya
                        <hr class="biru ml-0 mt-0">
                    </a>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <img class="img-fluid mh-img-50" src="/assets/uploads/<?php echo $row[2]->thumbnail ?>" alt="">
            <div class="container px-sm-3">
                <div class="position-absolute text-block-transparant text-white">
                    <h4 class="text-white font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[2]->judul)),0,45)."..."; ?></h4>
                    <!-- Kutipan artikel terbaru -->
                    <p class=" text-justify">
                        <?php echo substr($row[2]->konten,0,50)."..." ?>
                    </p>
                    <a href="#" class="text-blue-sea font-weight-bold">Selengkapnya
                        <hr class="biru ml-0 mt-0">
                    </a>
                </div>
            </div>
        </div>
    <div class="container px-sm-3 mt-6">
        <button class="btn btn-dark mb-3">
                    Lihat Semua
                    <i class='fas fa-chevron-right'></i>
        </button>  
    </div>
</section>

<!-- Resep Terpopuler -->
<section class="mt-2 container-fluid bg-secondary">
<?php $row = array_reverse($dataResep) ?>
    <div class="pt-4 pb-5 container">
        <h2 class="text-center pt-1 pb-3 font-weight-bold text-white font-8" style="letter-spacing:0.2rem;">Resep Terpopuler</h2>
        <div class="row">
            <!-- Gambar resep dan judul resep -->
            <div class="col-sm m-col-b">
                <div class="mx-auto card rounded-border size-card">
                    <img class="card-img-top top-border-rounded" style="height: 55%" src="/assets/uploads/<?php echo $row[0]->thumbnail ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-secondary"><?php echo $row[0]->author ?></p>
                        <h5 class="card-title text-dark font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[0]->judul)),0,45)."..."; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm m-col-b">
                <div class="mx-auto card rounded-border size-card">
                    <img class="card-img-top top-border-rounded" style="height: 55%" src="/assets/uploads/<?php echo $row[1]->thumbnail ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-secondary"><?php echo $row[1]->author ?></p>
                        <h5 class="card-title text-dark font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[1]->judul)),0,45)."..."; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="mx-auto card rounded-border size-card" >
                    <img class="card-img-top top-border-rounded" style="height: 55%" src="/assets/uploads/<?php echo $row[2]->thumbnail ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-secondary"><?php echo $row[2]->author ?></p>
                        <h5 class="card-title text-dark font-weight-bold"><?php echo substr(ucwords(str_replace("-", " ", $row[2]->judul)),0,45)."..."; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>