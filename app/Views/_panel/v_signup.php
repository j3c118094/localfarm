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
        <section style="height: 97vh;">
            <div class="row h-100" >
                <div class="col d-none d-lg-block">
                    
                </div>
                <div class="col card shadow-lg my-auto mx-4" style="height: auto;">
                    <div class="row h-100">
                        <div class="col my-auto mx-2">

                            <form class="text-left mb-4" action="" method="post">
                            <div class=" text-center">
                                <img src="/assets/images/localfarm-logo.png" class="logo"></img>
                                <div class="m-0 p-0 ">Administrator Panel Login</div>
                            </div>
                                <!-- Material input -->
                                <div class="form-group">
                                   <label for="usr">Username</label>
                                   <input type="text" class="form-control" id="usr" required>


                                   <label for="usr">Password</label>
                                   <input type="text" class="form-control" id="usr" required>
                                   <label for="usr">Konfirmasi Password</label>
                                   <input type="text" class="form-control" id="usr" required>
                                  
                                   
                                </div>
                                

                                <button type="submit" class=" btn btn-green w-100">Submit</button>
                            </form>

                            <div class="text-center font-weight-light mb-2">
                                Jika belum punya akun <a href="<?php echo site_url('Panel/signIn') ?>">daftar di sini</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-lg-block">
                    
                </div>
            </div>    
        </section>
       
        <section>
            <div class="row" style="height: 3vh;">
                <div class="col text-center sticky-bottom" style="font-size: 12px;">Copyright &copy; Localfarm 2020. All Rights Reserved</div>
            </div>    
        </section>

    </div>
    
</body>
</html>