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
    <title>Panel - <?= $judulPage ?></title>
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

                            <form class="text-left mb-4" action="<?php echo site_url('Panel/register'); ?>" method="post" autocomplete="off">
                            <div class=" text-center">
                                <img src="/assets/images/localfarm-logo.png" class="logo"></img>
                                <div class="m-0 p-0 ">Administrator Panel Login</div>
                            </div>
                                <!-- Material input -->
                                <div class="form-group">
                                    <?php 

                                        $href= site_url('Panel/signIn');
                                        if ($status == "berhasil"){
                                            echo '<div class="text-center bg-success py-2 text-white ">Registrasi berhasil, silahkan <a class="text-white font-weight-bold" href="'.$href.'">masuk disini.</a></div>';
                                        } elseif ($status == "gagal") {
                                            echo '<div class="text-center bg-danger py-2 text-white font-weight-bold">Registrasi gagal.</div>';
                                        } else {
                                            echo '<div class="text-center text-white font-weight-bold"></div>';
                                        }

                                    ?>

                                   <label for="nama">Nama</label>
                                   <input type="text" class="form-control" id="nama" name="nama" required>
                                   <label for="usr">Username</label>
                                   <input type="text" class="form-control" id="usr" name="user" required>


                                   <label for="pass">Password</label>
                                   <input type="password" class="form-control" id="pass" name="pass" required>
                                   <label for="confirm">Konfirmasi Password</label>
                                   <input type="password" class="form-control" id="confirm" name="confirm" required>
                                   <div class="text-center mt-2" id="message"></div>
                                   <label for="root">Root Access</label>
                                   <input type="password" class="form-control" id="root" name="root" required>
                                   <div class="text-center mt-2" id="rootmsg"></div>
                                  
                                  
                                   
                                </div>

                                <button id="submit" type="submit" class=" btn btn-green w-100" disabled=>Submit</button>
                            </form>

                            <div class="text-center font-weight-light mb-2">
                                Jika sudah punya akun <a href="<?php echo site_url('Panel/signIn') ?>">masuk di sini</a>
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
        $('#pass, #confirm').on('keyup', function () {
            
            if ($('#pass').val() == $('#confirm').val()) {
                $('#message').html('Password Sama').css('color', 'green');
                window.setTimeout(  
                function() {      
                    $('#message').fadeOut();
                },  
                1500);
            } else { 
                $('#message').html('Password Tidak Sama').css('color', 'red');
            }
        });

        $('#root').on('keyup', function() {
            rootask = $('#root').val();
            $.post("<?=site_url('Panel/rootaccess')?>",{},
            function(data)
            {
                if (rootask == data) {
                $('#rootmsg').html('Root Access Diberikan').css('color', 'green');
                window.setTimeout(  
                function() {      
                    $('#rootmsg').fadeOut();
                    $('#submit').prop("disabled", false); 
                },  
                1500);
                    
                } else { 
                    $('#rootmsg').html('Root Access Ditolak').css('color', 'red');
                }
            });

        });
    </script>    
</body>
</html>