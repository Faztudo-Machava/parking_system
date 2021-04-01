<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verdant</title>
    <!--<link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('swiper/swiper-bundle.min.css') }}" rel="stylesheet">
</head>

<body>
    <!-- =============Formulario de criação de user================= -->
    <div class="modal fade" id="cadUsers" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUser">Inscreve-se</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-info" role="alert">
                    ANTENÇÃO: Para criar conta é necessario que seja cliente do Palvic!
                </div>
                <form class="form" action="/addUtilizadorCliente" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="tEmail" aria-describedby="emailHelp"
                                name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="tPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="tPassword" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmarPass" class="form-label">Confirmar password</label>
                            <input type="password" class="form-control" id="confirmarPass" name="confirmarPassword"
                                required>
                        </div>
                        <div class="alert alert-danger d-none passConfirmMessage" id="error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn" id="inscrever" disabled>Inscrever</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- =============Formulario de login================= -->
    <form class="form" id="formLogin">
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="txtLogin">Iniciar sessão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="alert alert-danger d-none messageBox" id="error"></div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp"
                                name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="txtPassword" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>







    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ route('home') }}">Verdant</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
                    <li><button type="submit" class="btn" data-bs-toggle="modal"
                            data-bs-target="#cadUsers">Inscreva-se</button></li>
                    <li><button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#login">Iniciar sessão</button></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <div>
        @yield('conteudo')
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6 footer-contact">
                        <h3>Verdant</h3>
                        <p>
                            Av Maria de Lurdes <br>
                            Maputo<br>
                            Moçambique <br><br>
                            <strong>Contacto:</strong> +258 848711111<br>
                            <strong>Email:</strong> palvic@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-5 col-md-6 footer-links">
                        <h4>Links úteis</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nós</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de serviços</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Politica de privacidade</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Nossos serviços</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Parqueamento</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Parqueamento</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Parqueamento</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Parqueamento</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Parqueamento</a></li>
                        </ul>
                    </div>

                    <!--<div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>-->

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4 text-center">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Verdant</span></strong>. Todos direitos reservados
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
                    Designed by <a href="https://bootstrapmade.com/">MozerTech</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <!--<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>-->
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('php-email-form/validate.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/Auth.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert('{{ $error }}')
            </script>
        @endforeach
    @endif
</body>

</html>
