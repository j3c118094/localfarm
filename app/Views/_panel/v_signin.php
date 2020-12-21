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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body class="bg-abu">
    <?php 

        if ($is_admin) {
            header('Location: '.site_url('Panel'));
            die();
        }

    ?>
    <div class="container-fluid">
        <section style="height: 97vh;">
            <div class="row h-100" >
                <div class="col d-none d-lg-block">
                    
                </div>
                <div class="col card shadow-lg my-auto mx-4" style="height: auto;">
                    <div class="row h-100">
                        <div class="col my-auto mx-2">

                            <form class="text-left mb-4" action="<?php echo site_url('Panel/account') ?>" method="post">
                            <div class=" text-center">
                                <img src="/assets/images/localfarm-logo.png" class="logo"></img>
                                <div class="m-0 p-0 ">Administrator Registration</div>
                                <?php 

                                    $href= site_url('Panel/signIn');
                                    if ($status == 1){
                                        echo '<div id="message" class="text-center bg-warning py-2 ">Akun tidak ditemukan</div>';
                                    } elseif ($status == 2) {
                                        echo '<div id="message" class="text-center bg-warning py-2 ">Password salah</div>';
                                    } else {
                                        echo '<div id="message" class="text-center text-white font-weight-bold"></div>';
                                    }

                                ?>`
                            </div>
                                <!-- Material input -->
                                <div class="form-group">
                                   <label for="usr">Username</label>
                                   <input type="text" class="form-control" id="usr" name="user" required>


                                   <label for="pass">Password</label>
                                   <input type="password" class="form-control" id="pass" name="pass" required>
                                   
                                </div>
                                

                                <button type="submit" class=" btn btn-green w-100">Submit</button>
                            </form>

                            <div class="text-center font-weight-light mb-2">
                                Jika belum punya akun <a href="<?php echo site_url('Panel/signUp') ?>">daftar di sini</a>
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
    <script>
        window.setTimeout(  
        function() {      
            $('#message').fadeOut();
        },  
        3500);
    </script>   
</body>
</html>