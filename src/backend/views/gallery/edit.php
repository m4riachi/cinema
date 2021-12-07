<div id="content" class="main-content">
    <form action="<?= \src\Helper::base_url()?>backend/gallery/update"  id="form_submit" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="id" value="<?= $gallery['id'] ?>">
                                <label for="name">Genre</label></br>
                                <select class="selectpicker" name="genre_id" >
                                    <option value="">--Choisir Genre--</option>
                                    <?php
                                    while ($data = $films->fetch())
                                    {
                                        ?>
                                        <option value="<?= $data['id'] ?>" <?php if($data['id'] == $gallery['id']){ echo "selected" ;}?>  ><?= htmlspecialchars($data['nom']) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="files[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <input type="hidden"  />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
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