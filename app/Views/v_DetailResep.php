<?php

$obj_judul = $dataResep['0']->judul;
$obj_thumb = $dataResep['0']->thumbnail;
$obj_content = $dataResep['0']->konten;
$obj_tanggal = $dataResep['0']->created_at;

?>

<section class="container-fluid px-0" style="min-height: 90vh">
    <div class="position-relative">
        <img class="img-fluid" src="/assets/uploads/<?php echo $obj_thumb?>" alt="" style="max-height: 50vh; width: 100vw; object-fit: cover;">
        <!-- Link kembali ke daftar resep -->
        <div class="position-absolute  icon-arrow">
            <a href="<?php echo site_url('DaftarResep')?>" class="white-color">
                <i class="fa fa-long-arrow-left"></i>
            </a>
        </div>
        <!-- Bacaan Artikel -->
        <div class="min-5-mt container">
            <div class="card w-100 border-0" >
                <div class="card-body card-shadow">
                    <h2 class="card-title text-center text-secondary font-weight-bold"><?php echo ucwords(str_replace("-", " ", $obj_judul)) ?></h2>
                    <h6 class="card-subtitle text-muted text-center"><?php echo date("d/m/Y", strtotime($obj_tanggal)) ?></h6>
                    <p class="card-text mt-4 px-sm-3 text-justify">

                        <?php echo $obj_content ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>