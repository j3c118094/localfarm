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

        <form action="<?php echo site_url('Panel/save'); ?>" method="POST" enctype="multipart/form-data">
        <section style="height: auto;">
            <div class="row " style="height: 33vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 my-3">
                            <div class="my-auto">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group text-left" style="font-size: 14px">
                                            <label for="usr" >Judul</label>
                                            <input required id="judul" name="judul" type="text" class="form-control" style="font-size: 22px;" value="<?php if (!empty($id)) echo ucwords(str_replace("-", " ", $data->judul)); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row h-100">
                                    <div class="col">
                                        <div class="form-group text-left" style="font-size: 14px">
                                            <label for="usr" >Thumbnail <?php if (!empty($id)) echo '<a href="'.site_url('/assets/images/').$data->thumbnail.'">sebelumnya</a>'; ?></label>
                                            <input required id="thumb" name="thumb" type="file" accept="image/png, .jpeg, .jpg" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group text-center my-4" style="font-size: 14px">
                                            <div class="btn-group ">
                                                <a href="<?php echo site_url('Panel/post') ?>" class="btn btn-warning">Batal</a>
                                                <input type="hidden" id="id" name="id" value="<?php if (!empty($id)) echo $id; ?>">
                                                <input type="hidden" id="tipe" name="tipe" value="<?php echo $tipe ?>">
                                                <button type="submit" class="btn btn-green">Save <?php echo ucwords($tipe) ?></button>
                                            </div>
                                        </div>
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
            <div class="row " style="height: auto" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3 px-0">
                            <div class="" style="font-size: 40px;">

                                <textarea required id="konten" name="konten" ><?php if (!empty($id)) echo $data->konten; ?></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    
                </div>
            </div>
        </section>


    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('konten', {
            height: "50vh"
        });


        $('#thumb').bind('change', function() {
            var valid = ["png", "jpg", "jpeg"];
            var ext = $("#thumb").val().split(".").pop().toLowerCase();
            
            if (!(valid.includes(ext))){
                alert("Hanya menerima .png .jpg .jpeg");
                $("#thumb").val("");
            }
        });
    </script>
  </body>z
</html>