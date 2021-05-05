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
                                <a href="javascript:history.back()" class="btn btn-success">Voltar</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="<?= base_url('usuarios/salvar') . "/" . $edit['id'] ?>">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Informaçõs do usúario</h4>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nome">Nome</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="nome" class="form-control" placeholder="Nome" name="nome" value="<?= $edit['nome'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="email">E-mail</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="email" id="email" class="form-control" placeholder="E-mail" name="email"  value="<?= $edit['email'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="telefone">Telefone</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="tel" id="telefone" class="form-control" placeholder="Telefone" name="telefone" value="<?= $edit['telefone'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">Status</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="perfil" name="status" class="form-control">
                                                    <option value="none" disabled="">Selecione o status</option>
                                                    <option value="true" <?= $edit['status'] == true ? 'selected' : '' ?>>Ativo</option>
                                                    <option value="false" <?= $edit['status'] == false ? 'selected' : '' ?>>Inativo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="peril">Perfil</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="perfil" name="perfil" class="form-control">
                                                    <option value="none" disabled="">Selecione o perfil</option>
                                                    <option value="administrador" <?= $edit['perfil'] == 'administrador' ? 'selected' : '' ?>>Administrador</option>
                                                    <option value="representante" <?= $edit['perfil'] == 'representante' ? 'selected' : '' ?>>Representante</option>
                                                    <option value="transportadora" <?= $edit['perfil'] == 'transportadora' ? 'selected' : '' ?>>Transportadora</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="senha">Senha</label>
                                            <div class="controls col-md-9 mx-auto">
                                                <input type="password" name="password" class="form-control mb-1" required data-validation-required-message="Campo é obrigatório!" value="<?= $edit['password'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="confirmarSenha">Confirmar senha</label>
                                            <div class="controls col-md-9 mx-auto">
                                                <input type="password" name="password2" data-validation-match-match="password" class="form-control mb-1" required data-validation-required-message="Campo é obrigatório!" value="<?= $edit['password2'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancelar
                                        </button>
                                        <input type="submit" class="btn btn-success" value="Salvar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>