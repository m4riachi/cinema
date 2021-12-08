
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo \src\Helper::base_url()?>assets/backend/assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/bootstrap-select/bootstrap-select.min.css">
    <!--  END CUSTOM STYLE FILE  -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link href="<?php echo \src\Helper::base_url()?>assets/backend/plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->

</head>
<body class="sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3><?= $title ?></h3>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-item flex-row search-ul">
                <li class="nav-item align-self-center search-animated">
                    <div class="search-bar"></div>
                </li>
            </ul>
            <ul class="navbar-item flex-row navbar-dropdown">


                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="<?= \src\Helper::base_url()?>backend/login/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a class="footer-logo" href="#">
                            <span class="logo-element">
                                <span class="logo-tape">
                                    <span class="svg-content svg-fill-theme" data-svg="<?php echo \src\Helper::base_url()?>assets/frontend/images/svg/logo-part.svg"></span>
                                </span>
                                <span class="logo-text text-uppercase">
                                    <span></span></span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="<?php echo \src\Helper::base_url()?>backend/salle/list" class="nav-link"> <span>M</span>emico</span> </a>
                    </li>
                    <li class="nav-item toggle-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left sidebarCollapse"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    </li>
                </ul>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>paramètres</span></div>
                    </li>
                    <li class="menu">
                        <a href="<?php echo \src\Helper::base_url()?>backend/salle/list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Salles</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo \src\Helper::base_url()?>backend/genre/list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Genres</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo \src\Helper::base_url()?>backend/film/list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span>Films</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo \src\Helper::base_url()?>backend/horaire/list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Horaires</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="<?php echo \src\Helper::base_url()?>backend/admin/list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>users</span>
                            </div>
                        </a>
                    </li>
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <?php require_once $view; ?>
       

    </div>
    <!-- END MAIN CONTAINER -->
    
    
        
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/app.js"></script>
    
    
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/highlight/highlight.pack.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/scrollspyNav.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/scrollspyNav.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/scrollspyNav.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/assets/js/scrollspyNav.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?php echo \src\Helper::base_url()?>assets/backend/plugins/noUiSlider/nouislider.min.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>

        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
       var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
         enableTime: true,
         dateFormat: "Y-m-d H:i",
    });
    </script>
</body>
</html>