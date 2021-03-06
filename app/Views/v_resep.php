    
<!-- Judul dan Pencarian -->
<section class="mt-5-custom container">
    <h1 class="text-secondary font-weight-bold artikel-txt">Daftar Resep</h1>
    <div class="row">
        <div class="col-sm">
            <h4 class="text-secondary">Semoga Bermanfaat</h4>
            <hr class="green ml-0 mt-0">
        </div>
        <div class="col-sm ">
            <!-- Pencarian -->
            <form class="wrap" method="GET" action="<?php echo site_url('DaftarResep/cari') ?>">
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
 
    <!-- daftarresep -->
    <section class="daftar-resep" style="height: auto; min-height: 55vh;">
      <div class="container">


      <?php foreach ( array_reverse($dataResep) as $row) : ?>
        <div class="row mb-2 justify-content-center">
          <div class="col justify-content-center d-flex" >
            <div class="card" style="width: 75%;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <a href="<?php echo site_url('Resep/read/'.$row->judul) ?>" >
                    <img src="/assets/uploads/<?php echo $row->thumbnail ?>" class="card-img" alt="... " style="
                    height: 33vh;
                    object-fit: cover;
                    min-width: 100%;
                    max-width: 100%;">
                  </a>
                </div>
                <div class="col-md-8" >
                  <div class="card-body-custom" >
                    <div class="bg-secondary p-card" style="height: 8vh">
                      <h5 class="card-title text-white pt-2 font-judul"><?php echo substr(ucwords(str_replace("-", " ", $row->judul)),0,38)."..."; ?></h5>
                    </div>
                    <div class="bg-green-light text-white p-card pb-5 font-isi" style="height: 25vh">
                      <span>
                          <i class='far fa-calendar-alt mr-1'></i>
                          <?php echo date("d/m/Y", strtotime($row->created_at)) ?>
                      </span>
                      <hr class="white ml-0 mt-1">
                      <p class="card-text"> <?php echo substr($row->konten,0,135)."..." ?></p>
                      <div class="text-right">
                        <a href="<?php echo site_url('Resep/read/'.$row->judul) ?>" class="text-dark font-weight-bold pr-2">Selengkapnya</a>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php
        endforeach;

        if (empty($dataResep)) {
    ?>

    <div class="col text-center my-5">
        <h3>Resep <?php echo $cari ?> tidak ditemukan</h3>
    </div>

    <?php } ?>

      </div>
    </section>
    <!-- akhirdaftarresep -->
    
