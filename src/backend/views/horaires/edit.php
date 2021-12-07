<div id="content" class="main-content">
    <form action="<?= \src\Helper::base_url()?>backend/horaire/update"  id="form_submit" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-3">
                                <input type="hidden" name="id" value="<?= $horaire['id'] ?>">
                                <label for="film_id">Film</label></br>
                                <select class="selectpicker" name="film_id" >
                                    <option value="">--Choisir Film--</option>
                                    <?php
                                    while ($films && $film = $films->fetch())
                                    {
                                       ?>
                                        <option value="<?= $film['id'] ?>" <?php if($film['id'] == $horaire['film_id']){ echo "selected" ;}?>  ><?= htmlspecialchars($film['titre']) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input type="hidden" name="id" value="<?= $horaire['id'] ?>">
                                <label for="salle_id">Genre</label></br>
                                <select class="selectpicker" name="salle_id" >
                                    <option value="">--Choisir Salle--</option>
                                    <?php
                                    while ($salles && $salle = $salles->fetch())
                                    {
                                        ?>
                                        <option value="<?= $salle['id'] ?>" <?php if($salle['id'] == $horaire['salle_id']){ echo "selected" ;}?>  ><?= htmlspecialchars($salle['nom']) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="date">Date</label>
                                <div class="form-group mb-0">
                                    <input id="dateTimeFlatpickr" name="date" value="<?= htmlspecialchars($horaire['date']) ?>" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label for="prix">Prix</label>
                                <input name="prix" value="<?= htmlspecialchars($horaire['prix']) ?>" type="text" class="form-control" >
                            </div>
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                    <button class="btn btn-primary submit-fn mt-2" type="submit">Enregistrer</button>
                                    <a href="javascript:history.go(-1)" class="btn btn-danger mt-2" type="submit">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>