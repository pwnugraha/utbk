<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('asset/auth/') ?>style.css" />
    <title>Login - SobatUTBK</title>
    <link rel="icon" href="<?= base_url('asset/homepage/img'); ?>/logo.png" type="image/gif">

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form action="<?= base_url('login/proses') ?>" class="sign-in-form">
                    <a href="<?= base_url('') ?>"><img src="<?= base_url('asset/homepage/img'); ?>/logo-2.png" class="img-fluid" width="150" alt=""></a>
                    <h2 class="title" style="color: #EF8521">welcome Back !</h2>
                    <p class="title" style="font-size: 15px; color: #EF8521;">ayo mulai tingkatkan kemampuan
                        dan login sekarang </p>
                    <div class="input-field" style="border: 2px solid #EF8521;">
                        <i class="fas fa-user" style="color: #EF8521;"></i>
                        <input type="text" placeholder="Username" />
                    </div>
                    <div class="input-field" style="border: 2px solid #EF8521;">
                        <i class="fas fa-lock" style="color: #EF8521;"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <button type="submit" value="Login" class="btn solid" style="background-color: #EF8521;">Login</button>
                    <!-- <a href="#" class="title" style="font-size: 15px; text-decoration: none; color: #182F64;">Lupa password ?</a> -->
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>

                <form action="<?= base_url('') ?>" class="sign-up-form">
                    <h2 class="title" style="color: #183f9b;">Daftar sekarang</h2>
                    <p class="title" style="font-size: 15px; text-align: center; color:#183f9b">Kursi PTN sudah mulai menipis tapi
                        peluangmu masih sangat besar <br>
                        amankan peluangmu dan join sekarang !</p>
                    <div class=" input-field" style="border: 2px solid #183f9b;">
                        <i class="fas fa-user" style="color: #183f9b;"></i>
                        <input type="text" placeholder="Username" />
                    </div>
                    <div class="input-field" style="border: 2px solid #183f9b;">
                        <i class="fas fa-envelope" style="color: #183f9b;"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-field" style="border: 2px solid #183f9b;">
                        <i class="fas fa-lock" style="color: #183f9b;"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn" value="Daftar" style="background-color: #183f9b;" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Daftar sekarang</h3>
                    <p>
                        Kursi PTN sudah mulai menipis tapi
                        peluangmu masih sangat besar
                        amankan peluangmu dan join sekarang !
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Daftar
                    </button>
                </div>
                <img src="<?= base_url('asset/auth/') ?>img/login.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah punya akun ?</h3>
                    <p>
                        Ayo mulai tingkatkan kemampuan
                        dan login sekarang
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        login
                    </button>
                </div>
                <img src="<?= base_url('asset/auth/') ?>img/regis.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="<?= base_url('asset/auth/') ?>app.js"></script>
</body>

</html>