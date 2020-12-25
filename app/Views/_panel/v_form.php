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
                <div class="col">
                    
                </div>
                <div class="col text-center">
                    <div class="btn btn-group p-0" style="border: thin solid white;">
                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/dash') ?>" style="width: 45%;">DASH</a>

                        <a class="btn panelbtna " href="<?php echo site_url('Panel/form') ?>" style="width: 45%;">FORMS</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/post') ?>" style="width: 45%;">POSTS</a>
                        <button type="submit" form="signout" class="btn btn-danger d-lg-none h-100 my-auto"  style="width: 20%;"> <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></button>
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

        <section    >
            <div class="row mt-3">
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
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
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section >
            <div class="row"   >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="my-auto">
                                <?php
                                    $chartData = "";
                                    $chartData = '
                                                    {"label": "Sangat Tahu","value": "'.$dataPieQ11.'"},
                                                    {"label": "Cukup Tahu","value": "'.$dataPieQ12.'"},
                                                    {"label": "Tidak Tahu","value": "'.$dataPieQ13.'"},
                                                ';

                                    $columnChart2 = new FusionCharts("pie2d", "ex2", "100%", 400, "chart-2", "json", '{
                                    "chart": {
                                        "caption": "Response dari : Seberapa tahu anda tentang diversifikasi pangan?",
                                        "plottooltext": "<b>$percentValue</b> responden mengatakan $label",
                                        "showlegend": "1",
                                        "showpercentvalues": "1",
                                        "legendposition": "bottom",
                                        "usedataplotcolorforlabels": "1",
                                        "theme": "fusion"

                                    },
                                    "data": [
                                        '.$chartData.'
                                    ]
                                    }');

                                    $columnChart2->render();
                                ?>
                                <div id="chart-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section  >
            <div class="row "   >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto" >
                    <div class="row h-100" >
                        <div class="col card mx-1">
                            <div class="mx-auto mt-2" style="font-size: 17px; font-weight: 600">
                                Respons dari :  Apa saja yang termasuk pangan lokal menurut Anda?
                            </div> 
                            <div class="my-auto"style=" overflow-y : scroll;" >
                            <?php 

                                $respq2 = explode("|", $dataArr1);
                                $no = 0;
                                array_pop($respq2);
                                foreach ($respq2 as $each){
                            ?>
                                <div class="bg-secondary text-white text-left px-2 py-2 my-1" style="border-radius: 5px;">
                                    <?php
                                        $no += 1;
                                        echo $no.". ".$each;
                                    ?>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row"   >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="my-auto">
                                <?php
                                    $chartData = "";
                                    $chartData = '
                                                    {"label": "Sangat Sering","value": "'.$dataPieQ21.'"},
                                                    {"label": "Sedang","value": "'.$dataPieQ22.'"},
                                                    {"label": "Pernah","value": "'.$dataPieQ23.'"},
                                                    {"label": "Tidak Pernah","value": "'.$dataPieQ24.'"},
                                                ';

                                    $columnChart3 = new FusionCharts("pie2d", "ex3", "100%", 400, "chart-3", "json", '{
                                    "chart": {
                                        "caption": "Respons dari : Seberapa tahu anda tentang diversifikasi pangan?",
                                        "plottooltext": "<b>$percentValue</b> responden mengatakan $label",
                                        "showlegend": "1",
                                        "showpercentvalues": "1",
                                        "legendposition": "bottom",
                                        "usedataplotcolorforlabels": "1",
                                        "theme": "fusion"

                                    },
                                    "data": [
                                        '.$chartData.'
                                    ]
                                    }');

                                    $columnChart3->render();
                                ?>
                                <div id="chart-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row"   >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="my-auto">
                                <?php
                                    $chartData = "";
                                    $chartData = '
                                                    {"label": "Sangat Membantu","value": "'.$dataPieQ31.'"},
                                                    {"label": "Cukup Membantu","value": "'.$dataPieQ32.'"},
                                                    {"label": "Tidak Membantu","value": "'.$dataPieQ33.'"},
                                                ';

                                    $columnChart4 = new FusionCharts("pie2d", "ex4", "100%", 400, "chart-4", "json", '{
                                    "chart": {
                                        "caption": "Response dari : Menurut Anda apakah website kami sudah cukup membantu untuk informasi diversifikasi pangan?",
                                        "plottooltext": "<b>$percentValue</b> responden mengatakan $label",
                                        "showlegend": "1",
                                        "showpercentvalues": "1",
                                        "legendposition": "bottom",
                                        "usedataplotcolorforlabels": "1",
                                        "theme": "fusion"

                                    },
                                    "data": [
                                        '.$chartData.'
                                    ]
                                    }');

                                    $columnChart4->render();
                                ?>
                                <div id="chart-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section  >
            <div class="row "   >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col-6 text-center mx-auto" >
                    <div class="row h-100" >
                        <div class="col card mx-1">
                            <div class="mx-auto mt-2" style="font-size: 17px; font-weight: 600">
                                Respons dari :  Kritik dan saran mengenai diversifikasi pangan?
                            </div> 
                            <div class="my-auto"style="height: 45vh; overflow-y : scroll;" >
                            <?php 

                                $respq5 = explode("|", $dataArr2);
                                $no = 0;
                                array_pop($respq5);
                                foreach ($respq5 as $each){
                            ?>
                                <div class="bg-secondary text-white text-left px-2 py-2 my-1" style="border-radius: 5px;">
                                    <?php
                                        $no += 1;
                                        echo $no.". ".$each;
                                    ?>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row mt-4" style="height: auto;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
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
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>





    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
      
    <!-- CDN Datadables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <!-- Kok bisa??  -->
    <script src="<?php echo site_url('/assets/js/v_post.js') ?>"></script> 
  </body>
</html>