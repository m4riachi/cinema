<section class="after-head d-flex section-text-white position-relative">
    <div class="d-background" data-image-src="<?= \src\Helper::base_url()?>upload/contact-img.png" data-parallax="scroll"></div>
    <div class="d-background bg-black-80"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Horaires</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="#">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <span>Movies</span>
            </div>
        </div>
    </div>
</section>
<section class="section-long">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase">Horaires</h2>
            <p class="section-text">Dates: <?=  date("d F Y") .' - '. date("d F Y", strtotime(date("Y-m-d").' + 8 days')) ?></p>
        </div>
        <div class="section-pannel">
            <div class="grid row">
                <div class="col-md-12">
                    <form autocomplete="off" action="<?= \src\Helper::base_url() ?>frontend/horaire/search" method="post">
                        <div class="row form-grid">
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat input-group">
                                    <select class="form-control" name="genre">
                                        <option value="null" selected="true">genre</option>
                                        <?php
                                        while ($genre = $genres->fetch())
                                        {
                                            ?>
                                            <option value="<?= htmlspecialchars($genre['nom']) ?>" <?php if(isset($_SESSION['genre']) && htmlspecialchars($genre['nom']) == $_SESSION['genre']) echo 'selected="selected"'?>><?= htmlspecialchars($genre['nom']) ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat date input-group" data-toggle="datetimepicker" data-target="#release-year-field">
                                    <input class="datetimepicker-input form-control" id="release-year-field" name="date" type="date" value="<?php if(isset($_SESSION['date']) && $_SESSION['date'] != null) echo date('Y-m-d',strtotime(htmlspecialchars($_SESSION['date'])))?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="input-group">
                                    <input id="search" class="form-control" name="keyword" type="text" value="<?php if(isset($_SESSION['keyword']) && $_SESSION['keyword'] != null) echo htmlspecialchars($_SESSION['keyword'])?>" placeholder="Recherche par mots-clés" />
                                    <div class="input-group-append">
                                        <button class="btn btn-theme" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php
        foreach ($films as $data) {
            ?>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="<?=\src\Helper::base_url().''.htmlspecialchars($data['photo'])?>" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=<?= htmlspecialchars($data['bande_annonce_url'])?>" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html"><?= htmlspecialchars($data['titre'])?></a>
                    </h4>
                    <div class="entity-category">
                        <?php
                        $length = count($data['genres']);
                        foreach ($data['genres'] as $key => $genre) { ?>
                            <a class="content-link" href="movies-blocks.html"><?= $genre['nom'] ?></a> <?php if ($key !== array_key_last($data['genres'])) echo ',' ?>
                        <?php }   ?>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">8,1</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">125</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text"><?= htmlspecialchars($data['description'])?></p>

                </div>
                <div class="entity-extra pr-2 pl-2">
                    <div class="text-uppercase entity-extra-title">Horaires</div>
                    <div class="entity-showtime">
                        <div class="showtime-wrap">
                            <?php
                            foreach ($data['horaires'] as $horaire ) {  ?>
                                <div class="showtime-item" style="width:50%!important;">
                                    <span class="<?php if(date("d-m-y g:i a") > date("d-m-y g:i a",strtotime($horaire['date']) ))echo 'disabled';?> btn-time btn p-2" ><?= date("d-m-y g:i a",strtotime($horaire['date']) )?></span>
                                    <!--span class="disabled btn-time btn" aria-disabled="true">< ?= date("g:i a",strtotime($horaire['date'])) ?></span-->
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php
        }
        ?>
        <div class="section-bottom">
            <div class="paginator">
                <a class="paginator-item" href="#"><i class="fas fa-chevron-left"></i></a>
                <a class="paginator-item" href="#">1</a>
                <a class="paginator-item" href="#"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</section>
<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
