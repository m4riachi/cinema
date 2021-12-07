<div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <?php if( $msg = \src\Helper::showSession('flash_status')){ ?>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row p-4">

                            <div class="col-12 alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <x-heroicon-o-adjustments height="20px" width="20px" />
                                </button>
                                <strong>Success: </strong>
                                <?php echo $msg;  ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <a href="<?php echo \src\Helper::base_url();?>backend/salle/create" class="btn btn-primary btn-rounded mb-2 float-right">
                                    <div class="icon-container">
                                        <x-heroicon-o-plus class="w-6 h-6 text-gray-500"/>
                                        <b class="icon-name">Ajouter</b>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nom de salle</th>
                                    <th>Adresse</th>
                                    <th class="no-content"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                while ($salles && $data = $salles->fetch())
                                {
                                ?>
                                <tr>
                                    <td><?= htmlspecialchars($data['nom']) ?></td>
                                    <td><?= htmlspecialchars($data['adresse']) ?></td>
                                    <td style="width: 143px">
                                        <a href="<?php echo \src\Helper::base_url();?>backend/salle/edit/?id=<?=$data['id']?>" class="btn btn-primary" style="padding: 0.4375rem 0.55rem;" title="Modifier">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                        <form action="<?=\src\Helper::base_url()?>backend/salle/delete" method="post" class="d-inline-block">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                            <button  class="btn btn-danger ml-2" id="todo-task-trash" onclick="if (confirm('Voulez-vous vraimenet faire cette action?')) { $(this).parent().submit() } "
                                                     style="padding: 0.4375rem 0.55rem;" data-toggle="pill" href="#pills-trash"
                                                     role="tab" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </form>                                    </td>
                                </tr>
                                <?php
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>