<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/panel.css">

    <!-- -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
 
    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Panel - <?= $judulPage ?></title>

    <style>

    </style>
</head>
<body class="bg-abu">

    <?php 

        if (!($is_admin)) {
            header('Location: '.site_url('Panel/signIn'));
            die();
        }

    ?>
    <div class="container-fluid">

        <section class="sticky-top" style="height: 7vh;">
            <div class="row bg-green h-100">
                <div class="col">
                    
                </div>
                <div class="col text-center">
                    <div class="btn btn-group p-0" style="border: thin solid white;">
                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/dash') ?>" style="width: 45%;">DASH</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/form') ?>" style="width: 45%;">FORMS</a>

                        <a class="btn panelbtna " href="<?php echo site_url('Panel/post') ?>" style="width: 45%;">POSTS</a>
                        <button type="submit" form="signout" class="btn btn-danger d-lg-none h-100 my-auto" style="width: 20%;"> <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <form id="signout" method="POST" action="<?php echo site_url('Panel/signOut') ?>">
                    </form>
                </div>
                <div class="col d-none d-lg-block text-right mr-0 pr-0 h-100">
                    <button type="submit" form="signout" class="btn btn-danger h-100 my-auto" style="width: 25%;">  Keluar <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></button>
                </div>
            </div>
        </section>

        <section>
            <div class="row bg-green" style="height: 2em;">
                <div class="col">
                    <p class="text-center text-white" style="font-size: 1.2em;">Selamat datang, <?php echo $nama ?></p>
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row " style="height: 20vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 my-3">
                            <div class="my-auto" style="font-size: 40px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center" style="font-size: 12px;">
                                            JUMLAH POST RESEP
                                        </div>
                                        <?php echo count($dataResep) ?>
                                    </div>
                                    <div class="col">
                                        <form action="<?php echo site_url('Panel/editor'); ?>" method="post">
                                            <input type="hidden" id="id-resep-baru" name="id" value="">
                                            <input type="hidden" id="tipe-resep-baru" name="tipe" value="resep">
                                            <button type="submit" class="btn btn-green">Tambah Resep baru!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row " style="height: 20vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="my-auto" style="font-size: 40px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center" style="font-size: 12px;">
                                            JUMLAH POST ARTIKEL
                                        </div>
                                        <?php echo count($dataArtikel) ?>
                                    </div>
                                    <div class="col">
                                        <form action="<?php echo site_url('Panel/editor'); ?>" method="post">
                                            <input type="hidden" id="id-artikel-baru" name="id" value="">
                                            <input type="hidden" id="tipe-artikel-baru" name="tipe" value="artikel">
                                            <button type="submit" class="btn btn-green">Tambah Artikel baru!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row " style="height: auto;" >
                <div class="col-3 d-none d-lg-block">
                     
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="row py-3">
                                <div class="col">
                                    <div class="text-center">
                                        LIST RESEP
                                    </div>
                                    <table id="resep" class="table table-striped table-bordered table-hover table.display">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">

                                            <?php foreach ($dataResep as $row) : ?>

                                            <tr>
    
                                                <td>
                                                    <form class="d-inline" action="<?php echo site_url('Panel/delete'); ?>" method="POST">
                                                        <input type="hidden" id="id-del-resep-<?php echo $row->id ?>" name="id" value="<?php echo $row->id ?>">
                                                        <input type="hidden" id="tipe-del-resep-<?php echo $row->id ?>" name="tipe" value="resep">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                        &nbsp;
                                                        &nbsp;
                                                    <form id="edit-resep-<?php echo $row->id ?>" class="d-inline" action="<?php echo site_url('Panel/editor'); ?>" method="POST">
                                                        <input type="hidden" id="id-edit-resep-<?php echo $row->id ?>" name="id" value="<?php echo $row->id ?>">
                                                        <input type="hidden" id="tipe-edit-resep-<?php echo $row->id ?>" name="tipe" value="resep">
                                                        <a href="#" onclick="document.getElementById('edit-resep-<?php echo $row->id ?>').submit();"><?php echo substr(ucwords(str_replace("-", " ", $row->judul)),0,15)."..."; ?></a>
                                                    </form>
                                                </td>
                                                <td><?php echo $row->created_at; ?>  

                                                </td>
                                            </tr>

                                            <?php
                                                endforeach;

                                                if (empty($dataResep)) {
                                            ?>

                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data</td>
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>

                                <div class="col">
                                    <div class="text-center">
                                        LIST ARTIKEL
                                    </div>
                                    <table id="artikel" class="table table-striped table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th width="170">Aksi</th> -->
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">

                                            <?php foreach ($dataArtikel as $row) : ?>

                                            <tr>
                                                <td>
                                                    <form class="d-inline" action="<?php echo site_url('Panel/delete'); ?>" method="POST">
                                                        <input type="hidden" id="id-del-artikel-<?php echo $row->id ?>" name="id" value="<?php echo $row->id ?>">
                                                        <input type="hidden" id="tipe-del-artikel-<?php echo $row->id ?>" name="tipe" value="artikel">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                        &nbsp;
                                                        &nbsp;

                                                    <form id="edit-artikel-<?php echo $row->id ?>" class="d-inline" action="<?php echo site_url('Panel/editor'); ?>" method="POST">
                                                        <input type="hidden" id="id-edit-artikel-<?php echo $row->id ?>" name="id" value="<?php echo $row->id ?>">
                                                        <input type="hidden" id="tipe-edit-artikel-<?php echo $row->id ?>" name="tipe" value="artikel">
                                                        <a href="#" onclick="document.getElementById('edit-artikel-<?php echo $row->id ?>').submit();"><?php echo substr(ucwords(str_replace("-", " ", $row->judul)),0,15)."..."; ?></a>
                                                    </form>
                                                </td>
                                                <td><?php echo $row->created_at; ?></td>
                                            </tr>

                                            <?php
                                                endforeach;

                                                if (empty($dataArtikel)) {
                                            ?>

                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data</td>
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>
        <!-- tadi gw taro di sini -->
    </div>

        <!-- coba-coba tabel buat data tables 
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th scope="col">nama barang</th>
                    <th scope="col">kode</th>
                    <th scope="col">jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Hello </td>
                    <td> Hello </td>
                    <td> Hello </td>
                </tr>
            </tbody>
        </table>

        -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- CDN Datadables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <!-- Kok bisa??  -->
    <script src="<?php echo site_url('/assets/js/v_post.js') ?>"></script> 

<!--     <script>
        $(document).ready(function() {
            $('table.display').DataTable({
                paging: true,
                scrollY: 400
            });
        } );

        $(document).ready(function() {
            $('#table1').DataTable( {
                paging: true,
                scrollY: 400
            });
        } );

    </script> -->
  </body>
</html>