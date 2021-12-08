<section class="after-head d-flex section-text-white position-relative">
    <div class="d-background" data-image-src="<?= \src\Helper::base_url()?>upload/contact-img.png" data-parallax="scroll"></div>
    <div class="d-background bg-black-80"></div>
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Détails</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="<?= \src\Helper::base_url()?>frontend/home/index">Accueil</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <span>Détails</span>
            </div>
        </div>
    </div>
</section>
<section class="section-long">
    <div class="container">
        <div>
            <div class="grid row">
                <div class="section-line">
                    <div class="">
                        <div class="p-3">
                            <h2 class="entity-title"><?= $film['titre'] ?></h2>
                            <div class="entity-category">
                                <?php
                                $length = count($film['genres']);
                                foreach ($film['genres'] as $key => $genre) { ?>
                                    <a class="content-link" href = "movies-blocks.html" > <?= $genre['nom'] ?></a> <?php if ($key !== array_key_last($film['genres'])) echo ',' ?>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                        <div class="p-3">
                            <div class="">
                                <p>
                                    <?= $film['description'] ?>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid row">
            <?php
            foreach ($film['photos'] as $data) { ?>
            <div class="col-sm-6 col-lg-4">
                <div class="gallery-entity">
                    <div class="entity-preview" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img class="embed-responsive-item" src="<?=\src\Helper::base_url().''.$data['photo']?>" alt="" />
                        </div>
                        <div class="d-over bg-black-40 collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-view-popup">
                                <a class="content-link action-icon-bordered rounded-circle" href="<?=\src\Helper::base_url().''.$data['photo']?>" data-magnific-popup="image">
                                    <span class="icon-content"><i class="fas fa-search"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="section-bottom">
            <div class="paginator">
                <a class="paginator-item" href="#"><i class="fas fa-chevron-left"></i></a>
                <a class="paginator-item" href="#">1</a>
                <span class="active paginator-item">2</span>
                <a class="paginator-item" href="#">3</a>
                <span class="paginator-item">...</span>
                <a class="paginator-item" href="#">10</a>
                <a class="paginator-item" href="#"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</section>
<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
