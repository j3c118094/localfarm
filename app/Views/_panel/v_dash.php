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
                        <a class="btn panelbtna " href="<?php echo site_url('Panel') ?>" style="width: 45%;">DASH</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/form') ?>" style="width: 45%;">FORMS</a>

                        <a class="btn panelbtnp " href="<?php echo site_url('Panel/post') ?>" style="width: 45%;">POSTS</a>

                        <button type="submit" form="signout" class="btn btn-danger d-lg-none h-100 my-auto" href="<?php echo site_url('Panel/post') ?>" style="width: 20%;"> <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <form id="signout" method="POST" action="<?php echo site_url('Panel/signOut') ?>">
                    </form>
                </div>
                <div class="col d-none d-lg-block text-right mr-0 pr-0 h-100">
                    <button type="submit" form="signout" class="btn btn-danger h-100 my-auto" href="<?php echo site_url('Panel/post') ?>" style="width: 25%;">  Keluar <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></button>
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
            <div class="row " style="height: 43vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto ">
                    <div class="row h-100">
                        <div class="col-6 card mx-1 my-3">
                            <div class="my-auto" style="font-size: 40px;">
                                CHART
                            </div>
                        </div>

                        <div class="col card mx-1 my-3">
                            <div class="my-auto" style="font-size: 40px;">
                                LIST
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block text-right">
                    
                </div>
            </div>
        </section>

        <section style="height: auto;">
            <div class="row " style="height: 100vh;" >
                <div class="col-3 d-none d-lg-block">
                    
                </div>
                <div class="col text-center mx-auto">
                    <div class="row h-100">
                        <div class="col card mx-1 mb-3">
                            <div class="my-auto" style="font-size: 40px;">
                                LIST
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