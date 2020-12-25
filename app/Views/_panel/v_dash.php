<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/panel.css">

    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="/assets/js/fusioncharts.js"></script>

    <script type="text/javascript" src="/assets/js/themes/fusioncharts.theme.fusion.js"></script>
    <title>Panel - <?= $judulPage ?></title>
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
                <div class="col d-none d-lg-block h-100">

                </div>
                <div class="col text-center ">
                    <div class="btn btn-group p-0" style="border: thin solid white;">
                        <a class="btn panelbtna " href="<?php echo site_url('Panel/dash') ?>" style="width: 45%;">DASH</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/form') ?>" style="width: 45%;">FORMS</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/post') ?>" style="width: 45%;">POSTS</a>

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
            <div class="row mt-3" style="height: auto;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto ">
                    <form id="export" method="POST" action="<?php echo site_url('Panel/exportxls') ?>">
                    <input type="hidden" id="valid-request" name="valid" value="valid">
                        <button type="submit" class="btn btn-success h-100 my-auto" style="width: 25%;">  PRINT REPORT <i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-3 d-none d-lg-block text-right">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row " style="height: 43vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto ">
                    <div class="row h-100">
                        <div class="col card mx-1 my-3">
                            
                            <div class="my-auto">
                                <?php
                                    include "fusioncharts-wrapper/fusioncharts.php";
                                    $chartData = "";
                                    foreach ($dataJoin as $obj){
                                        $count = 0;
                                        foreach ($dataResponse as $ref){
                                            $count += 1;
                                        }
                                        $chartData .= '{"label": "'.$obj->kota.'","value": "'.$count.'"},';
                                    }

                                    $columnChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", '{
                                    "chart": {
                                        "caption": "Domisili Pengisi Kuesioner Localfarm",
                                        "subcaption": "",
                                        "xaxisname": "Kota",
                                        "yaxisname": "Jumlah (Orang)",
                                        "numbersuffix": "",
                                        "theme": "fusion"
                                    },
                                    "data": [
                                        '.$chartData.'
                                    ]
                                    }');

                                    $columnChart->render();
                                ?>
                                <div id="chart-1"></div>
                            </div>
                        </div>

                        <div class="col card mx-1 mb-3">
                            <div class="row py-3">
                                <div class="col">
                                    <div class="text-center">
                                        LIST RESPONSE KUESIONER
                                    </div>
                                    <table id="response" class="table table-striped table-bordered table-hover table.display">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>IP</th>
                                                <th>DAERAH</th>
                                                <th>WAKTU & TANGGAL</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            <?php foreach ($dataResponse as $row) : ?>

                                            <tr>
    
                                                <td>
                                                    <?php echo long2ip($row->visitor_ip); ?>
                                                </td>
                                                <td>
                                                    <?php echo $kota; ?>  
                                                </td>
                                                <td>
                                                    <?php echo $row->submitted_at; ?>  
                                                </td>
                                            </tr>

                                            <?php
                                                endforeach;

                                                if (empty($dataResponse)) {
                                            ?>

                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data</td>
                                                
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block text-right">
                    
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



    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>