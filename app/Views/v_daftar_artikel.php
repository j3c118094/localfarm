

<!-- Judul dan Pencarian -->
<section class="mt-5-custom container">
    <h1 class="text-secondary font-weight-bold artikel-txt">Daftar Artikel</h1>
    <div class="row">
        <div class="col-sm">
            <h4 class="text-secondary">Semoga Bermanfaat</h4>
            <hr class="green ml-0 mt-0">
        </div>
        <div class="col-sm ">
            <!-- Pencarian -->
            <form class="wrap" method="GET" action="<?php echo site_url('DaftarArtikel/cari') ?>">
                <div class="search">
                    <input type="text" name="q" id="q" class="searchTerm" placeholder="Pencarian..." value="<?php if (!empty($cari)) echo $cari ?>" autocomplete="disabled">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Daftar Artikel -->
<section class="container mb-5">

 

    <div class="row">


    <?php foreach ( array_reverse($dataArtikel) as $row) : ?>
        <div class="col-sm m-col-b m-col-t">
            <div class="mx-auto card size-card-artikel">
                <a href="<?php echo site_url('Artikel/read/'.$row->judul) ?>">
                    <img class="card-img-top" style="height: 25vh; object-fit: contain;" src="/assets/uploads/<?php echo $row->thumbnail ?>" alt="Card image cap">
                </a>
                <div class="card-body-custom">
                    <div class="bg-secondary p-card" style="height: 10vh; "> 
                        <h5 class="card-title text-white"><?php echo substr(ucwords(str_replace("-", " ", $row->judul)),0,45)."..."; ?></h5>
                    </div>
                    <div class="bg-green-light text-white p-card" style="height: 25vh;">
                        <span>
                            <i class='far fa-calendar-alt mr-1'></i>
                            <?php echo date("d/m/Y", strtotime($row->created_at)) ?>
                        </span>
                        <hr class="white ml-0 mt-0">
                        <p class="card-text text-justify"> <?php echo substr($row->konten,0,50)."..." ?></p>
                    </div>
                    <div class="text-right">
                        <a style="position: relative; top: -2rem;" href="<?php echo site_url('Artikel/read/'.$row->judul) ?>" class="text-dark font-weight-bold pr-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
        endforeach;

        if (empty($dataArtikel)) {
    ?>

    <div class="col text-center mt-5">
        <h3>Artikel <?php echo $cari ?> tidak ditemukan</h3>
    </div>

    <?php } ?>

        
    </div>


</section>