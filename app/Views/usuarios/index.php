<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $title ?></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <a href="<?= base_url() ?>/usuarios/novo" class="btn btn-primary"><i
                                            class="ft-plus white"></i> Adicionar novo</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
                                <div class="table-responsive">
                                    <table id="project-task-list"
                                           class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="checkboxsmallall">
                                                    <label class="custom-control-label" for="checkboxsmallall"></label>
                                                </div>
                                            </th>
                                            <th>Nome</th>
                                            <th>E-mail/Usuario</th>
                                            <th>Telefone</th>
                                            <th>Data de cadastro</th>
                                            <th>Perfil</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        if (!empty($dados))
                                        {
                                            foreach ($dados as $key => $value) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="checkboxsmallall11">
                                                            <label class="custom-control-label"
                                                                   for="checkboxsmallall11"></label>
                                                        </div>
                                                    </th>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted"><?= $value['nome'] ?></p>
                                                    </td>

                                                    <td>
                                                        <p class="text-muted"><?= $value['email'] ?></p>
                                                    </td>

                                                    <td>
                                                        <p class="text-muted"><?= $value['telefone'] ?? '---' ?></p>
                                                    </td>

                                                    <td>
                                                        <p class="text-muted"><?= $value['dataCadastro'] ?></p>
                                                    </td>

                                                    <td>
                                                        <p class="text-muted"><?= $value['perfil'] ?></p>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if($value['status'] == true){ ?>
                                                            <span class="badge badge-success">Ativo</span>
                                                        <?php } else{ ?>
                                                            <span class="badge badge-danger">Inativo</span>
                                                        <?php }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('usuarios/editar') . "/" . $key?>"  class="btn btn-primary btn-min-width mr-1 mb-1"><i
                                                                    class="ft-edit-2"></i>
                                                            Editar</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        }
                                        ?>
                                        </tfoot>
                                    </table>
                                </div>
                                <!--/ Task List table -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>