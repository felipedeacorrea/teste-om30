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
                                <form class="form form-horizontal" method="post" action="<?= base_url('pacientes/salvar')?>" enctype="multipart/form-data" novalidate="">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> Dados do paciente</h4>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nome_paciente">Nome Completo</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="nome_paciente" class="form-control" placeholder="Nome Completo" name="nome_paciente">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nome_mae">Nome da Mãe</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="nome_mae" class="form-control" placeholder="Nome da mãe" name="nome_mae">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cpf">CPF</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="cpf" class="form-control" placeholder="CPF" name="cpf">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cns">CNS</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="cns" class="form-control" placeholder="CNS" name="cns">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="data_nascimento">Data de nascimento</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="date" id="data_nascimento" class="form-control" placeholder="Data Nascimento" name="data_nascimento">
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="ft-user"></i> Endereço</h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cep">CEP</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="CEP" name="cep" id="cep">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary buscacep" type="button">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="logradouro">Logradouro</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="logradouro" class="form-control" placeholder="Logradouro" name="logradouro">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="numero">Número</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="numero" class="form-control" placeholder="Número" name="numero">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="complemento">Complemento</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="complemento" class="form-control" placeholder="Complemento" name="complemento">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="bairro">Bairro</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="bairro" class="form-control" placeholder="Bairro" name="bairro">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="cidade">Cidade</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="cidade" class="form-control" placeholder="Cidade" name="cidade">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="uf">UF</label>
                                            <div class="col-md-9 mx-auto">
                                                <select id="uf" name="uf" class="form-control">
                                                    <option value="none" selected="" disabled="">Selecione a UF</option>
                                                    <?php
                                                    if(!empty($uf)){
                                                        foreach ($uf as $key => $value): ?>
                                                            <option value="<?= $key ?>"><?= $value ?></option>
                                                        <?php endforeach;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <h4 class="form-section"><i class="ft-clipboard"></i> Arquivos</h4>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Foto do perfil</label>
                                            <div class="col-md-9 mx-auto">
                                                <label id="projectinput8" class="file center-block">
                                                    <input type="file" id="foto_perfil" name="foto_perfil">
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancelar
                                        </button>
                                        <input type="submit" class="btn btn-primary" value="Salvar">
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