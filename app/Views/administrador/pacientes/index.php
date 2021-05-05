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
                                <a href="<?= base_url() ?>/pacientes/novo" class="btn btn-primary"><i
                                            class="ft-plus white"></i> Adicionar novo</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="project-task-list"
                                           class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                        <thead>
                                        <tr>
                                            <th>Nome Paciente</th>
                                            <th>Nome da Mãe</th>
                                            <th>Dt. de Nascimento</th>
                                            <th>CPF</th>
                                            <th>CNS</th>
                                            <th>Endereço</th>
                                            <th>Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($dados)):
                                            foreach ($dados as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="media-left pr-1">
                                                                    <span class="avatar avatar-sm avatar-online rounded-circle">
                                                                        <?php
                                                                        if (!empty($value['foto_perfil'])) {
                                                                            $fotoPerfil = base_url($value['foto_perfil']);
                                                                        } else {
                                                                            $fotoPerfil = "https://via.placeholder.com/150";
                                                                        }
                                                                        ?>
                                                                        <img src="<?= $fotoPerfil ?>" alt="avatar">
                                                                    </span>
                                                            </div>
                                                            <div class="media-body media-middle">
                                                                <a class="media-heading name"><?= $value['nome_paciente'] ?></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted"><?= $value['nome_mae'] ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted"><?= $value['data_nascimento'] ?? null ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted"><?= _formatCnpjCpf($value['cpf']) ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted"><?= $value['cns'] ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted">
                                                            <?= $value['endereco']['logradouro'] . ", " . $value['endereco']['numero'] . " " . $value['endereco']['complemento'] . "<br>" . $value['endereco']['bairro'] . ", " . $value['endereco']['cidade'] . "/" . $value['endereco']['uf'] ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('/pacientes/editar') . "/" . _encrypt($value['id_paciente']) ?>"
                                                           class="btn btn-info">Editar</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>