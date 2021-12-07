<div id="content" class="main-content">
    <form action="<?php echo \src\Helper::base_url();?>backend/genre/update"  id="form_submit" method="post" enctype="multipart/form-data">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row w-100">
                            <div class="col-lg-4">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($genre['id']) ?>">
                                <label for="nom">Nom du genre</label>
                                <input name="nom" value="<?= htmlspecialchars($genre['nom']) ?>" type="text" class="form-control">
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