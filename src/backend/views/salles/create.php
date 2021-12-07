<div id="content" class="main-content">
    <form action="<?php echo \src\Helper::base_url();?>backend/salle/save"  id="form_submit" method="post" enctype="multipart/form-data">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <?php if( $msg = \src\Helper::showSession('flash_status')){ ?>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row p-4">

                            <div class="col-12 alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <x-heroicon-o-adjustments height="20px" width="20px" />
                                </button>
                                <strong>Success</strong>
                                <?=$msg?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row w-100">
                            <div class="col-lg-4">
                                <label for="nom">Nom du salle</label>
                                <input name="nom" value="<?=\src\Helper::showSession('nom') ?>" type="text" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="adresse">Adresse</label>
                                <input name="adresse" value="<?=\src\Helper::showSession('adresse') ?>" type="text" class="form-control">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12 mt-3 layout-spacing">
                                <button class="btn btn-primary submit-fn mt-2" type="submit">Enregistrer</button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger mt-2" type="submit">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>