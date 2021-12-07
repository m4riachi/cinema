<div id="content" class="main-content">
    <form action="<?= \src\Helper::base_url()?>backend/film/update"  id="form_submit" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="id" value="<?= $film['id'] ?>">
                            <div class="col-lg-4 mt-3">
                                <label for="name">Genre</label></br>
                                <select name="genres[]" class="selectpicker" multiple  >
                                    <option value="">--Choisir Genre--</option>
                                    <?php
                                    while ($data = $genres->fetch())
                                    {
                                        foreach ($film['genres'] as $film_genre) {
                                            ?>
                                            <option value="<?= $data['id'] ?>" <?php if($data['id'] == $film_genre['id']){ echo 'selected="selected"' ;}?>  ><?= htmlspecialchars($data['nom']) ?></option>
                                            <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <label for="titre">Title</label>
                                <input name="titre" value="<?= htmlspecialchars($film['titre']) ?>" type="text" class="form-control" >
                            </div>
                            <div class="col-lg-4 mt-3">
                                <label for="annee">Annee</label>
                                <input name="annee" value="<?= htmlspecialchars($film['annee']) ?>" type="text" class="form-control" >
                            </div>
                            <div class="col-lg-4 mt-3">
                                <label for="bande_annonce_url">Bande Annonce (Video ID in youtube)</label>
                                <input name="bande_annonce_url" value="<?= htmlspecialchars($film['bande_annonce_url'])  ?>" type="text" class="form-control" >
                            </div>

                            <div class="col-lg-8 mt-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="7"><?= htmlspecialchars($film['description']) ?></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <button class="btn btn-primary submit-fn mt-2" type="submit">Enregistrer</button>
                                    <a  href="javascript:history.go(-1)" class="btn btn-danger  mt-2" type="submit">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>