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
    <title>Document</title>
</head>
<body class="bg-abu">
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
                    </div>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </section>


        <section style="height: auto;">
            <div class="row " style="height: 43vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 my-3">
                            <div class="my-auto" style="font-size: 40px;">
                                CHART KUESIONER
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
                                        LIST RESPONSE KUESIONER
                                    </div>
                                    <table id="response" class="table table-striped table-bordered table-hover table.display">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>IP</th>
                                                <th>DAERAH</th>
                                                <th>WAKTU & TANGGAL</th>
                                                <th>RESPONSE</th>
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
                                                <td>
                                                    <form id="view<?php echo $row->responseid ?>" class="d-inline" action="<?php echo site_url('Panel/details'); ?>" method="POST">
                                                        <input type="hidden" id="id-edit-artikel-<?php echo $row->responseid ?>" name="id" value="<?php echo $row->responseid ?>">
                                                        <input type="hidden" id="tipe-edit-artikel-<?php echo $row->responseid ?>" name="tipe" value="artikel">
                                                        <a href="#" onclick="document.getElementById('edit-<?php echo $row->responseid ?>').submit();">Detail Response</a>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                                endforeach;

                                                if (empty($dataResponse)) {
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

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
      
    <!-- CDN Datadables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <!-- Kok bisa??  -->
    <script src="<?php echo site_url('/assets/js/v_post.js') ?>"></script> 
  </body>
</html>