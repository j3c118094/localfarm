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

    <form action="<?php echo site_url('Panel/save'); ?>" method="POST" enctype="multipart/form-data">

        <section class="sticky-top" style="height: 7vh;">
            <div class="row bg-green h-100">
                <div class="col">
                    
                </div>
                <div class="col text-center">
                    <div class="btn btn-group p-0" style="border: thin solid white;">
                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/dash') ?>" style="width: 45%;">DASH</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/form') ?>" style="width: 45%;">FORMS</a>

                        <a class="btn panelbtna " href="<?php echo site_url('Panel/post') ?>" style="width: 45%;">POSTS</a>
                    </div>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </section>


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
                                            <input id="judul" name="judul" type="text" class="form-control" style="font-size: 22px;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row h-100">
                                    <div class="col">
                                        <div class="form-group text-left" style="font-size: 14px">
                                            <label for="usr" >thumbnail</label>
                                            <input id="thumb" name="thumb" type="file" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group text-center my-4" style="font-size: 14px">
                                            <div class="btn-group ">
                                                <a href="<?php echo site_url('Panel/post') ?>" class="btn btn-warning">Batal</a>
                                                <input type="hidden" id="tipe" name="tipe" value="<?php echo $tipe ?>">
                                                <button type="submit" class="btn btn-green">Publish <?php echo ucwords($tipe) ?></button>
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
                                <textarea id="konten" name="konten" >
                                        
                                </textarea>
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
    </script>
  </body>
</html>