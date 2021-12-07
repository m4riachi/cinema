<div id="content" class="main-content">
    <form action="<?=\src\Helper::base_url()?>backend/film/save" id="form_submit" method="post" enctype="multipart/form-data">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <?php if( $msg = \src\Helper::showSession('flash_status')){ ?>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row p-4">

                            <div class="col-12 alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <x-heroicon-o-adjustments height="20px" width="20px" />
                                </button>
                                <strong>Erreur</strong>
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
                                <label for="name">Genre</label><br>
                                <select name="genres[]" class="selectpicker" multiple >
                                    <option value="">--Choisir Genre--</option>
                                    <?php
                                    while ($data = $genres->fetch())
                                    {
                                    ?>

                                    <option value="<?=$data['id']?>" <?=(\src\Helper::showSession('genre_id') == $data['id']) ? 'selected' : '' ?>><?= htmlspecialchars($data['nom']) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="titre">Title</label>
                                <input name="titre" type="text" value="<?=\src\Helper::showSession('titre') ?>" class="form-control" >
                            </div>
                            <div class="col-lg-4">
                                <label for="annee">Annee</label>
                                <input name="annee" value="<?=\src\Helper::showSession('annee') ?>" type="text" class="form-control" >
                            </div>
                            <div class="col-lg-4">
                                <label for="bande_annonce_url">Bande Annonce URL</label>
                                <input name="bande_annonce_url" value="<?=\src\Helper::showSession('bande_annonce_url') ?>" type="text" class="form-control" >
                            </div>
                            <div class="col-lg-8">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"><?=\src\Helper::showSession('description') ?></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <button class="btn btn-primary submit-fn mt-2" type="submit">Enregistrer</button>
                                    <a href="javascript:history.go(-1)" class="btn btn-danger  mt-2" type="submit">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>