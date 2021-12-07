
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Memico - Cinema Bootstrap HTML5 Template</title>
    <!-- Bootstrap -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="<?= \src\Helper::base_url()?>assets/frontend/css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= \src\Helper::base_url()?>assets/frontend/css/theme.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<header class="header header-horizontal header-view-pannel">
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="<?= \src\Helper::base_url()?>frontend/home/index">
                        <span class="logo-element">
                            <span class="logo-tape">
                                <span class="svg-content svg-fill-theme" data-svg="<?= \src\Helper::base_url()?>assets/frontend/images/svg/logo-part.svg"></span>
                            </span>
                            <span class="logo-text text-uppercase">
                                <span>M</span>emico</span>
                        </span>
            </a>
            <button class="navbar-toggler" type="button">
                        <span class="th-dots-active-close th-dots th-bars">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
            </button>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \src\Helper::base_url() ?>frontend/home/index" >Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \src\Helper::base_url() ?>frontend/horaire/index">Horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \src\Helper::base_url()?>frontend/contact/index" >Contactez-nous</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
    <?php require_once $view; ?>

<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<footer class="section-text-white footer footer-links bg-darken">
    <div class="footer-body container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <a class="footer-logo" href="<?= \src\Helper::base_url()?>assets/frontend/home/index">
                            <span class="logo-element">
                                <span class="logo-tape">
                                    <span class="svg-content svg-fill-theme" data-svg="<?= \src\Helper::base_url()?>assets/frontend/images/svg/logo-part.svg"></span>
                                </span>
                                <span class="logo-text text-uppercase">
                                    <span>M</span>emico</span>
                            </span>
                </a>
                <div class="footer-content">
                    <p class="footer-text">VOTRE CINÉMA MEMICO MARRAKECH
                        <br/>Maroc</p>
                    <p class="footer-text">Call us:&nbsp;&nbsp;+212-6425599</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Follow</h5>
                <ul class="list-wide footer-content list-inline">
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-slack-hash"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-6">
                <h5 class="footer-title text-uppercase">Newslettre</h5>
                <div class="footer-content">
                    <p class="footer-text">Inscrivez-vous à notre Newsletter pour recevoir nos meilleures offres</p>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert" id="success-newslettre">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>Votre inscription a été faite avec succès
                            </div>
                            <div class="alert alert-danger" role="alert" id="error-newslettre">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>Email incorrecte, Vous pouvez réessayer
                            </div>
                        </div>
                    </div>
                    <form id="newsletterForm" class="footer-form" autocomplete="off">
                        <div class="input-group">
                            <input id="email" class="form-control" name="email" type="email" placeholder="Votre Email" />
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="submit"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">Copyright 2021 &copy; Amico Cenima. All rights reserved.</div>
    </div>
</footer>
<!-- jQuery library -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/js/jquery-3.3.1.js"></script>
<!-- Bootstrap -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/bootstrap/js/bootstrap.js"></script>
<!-- Paralax.js -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/parallax.js/parallax.js"></script>
<!-- Waypoints -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/waypoints/jquery.waypoints.min.js"></script>
<!-- Slick carousel -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/slick/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Inits product scripts -->
<script src="<?= \src\Helper::base_url()?>assets/frontend/js/script.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
<script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>

<script type="text/javascript">

    $('#newsletterForm').on('submit',function(event){
        event.preventDefault();
        email = $('#email').val();
        $.ajax({
            url: "<?= \src\Helper::base_url()?>frontend/home/newsletter",
            type:"POST",
            data:{
                email:email,
            },
            success:function(){
                $('#error-newslettre').css('display', 'none');
                $('#success-newslettre').toggle();
                $('#newsletterForm input').val('');
            },
            error: function () {
                $('#success-newslettre').css('display', 'none');
                $('#error-newslettre').toggle();
            },
        });
    });

</script>
</body>
</html>
