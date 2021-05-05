<div aria-live="polite" aria-atomic="true" class="toast-placement d-flex justify-content-center align-items-center"
     data-autohide="false">
    <div class="toast" aria-live="assertive" aria-atomic="true" data-delay="5000" id="toast_alert">
        <div class="toast-header">
            <i class="la la-warning rounded mr-2"></i>
            <strong class="mr-auto">Atenção!</strong>
            <button type="button" class="ml-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body red" id="toast_body"></div>
    </div>
</div>
<div class="app-content content login">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0 text-center">
                                <h1 style="width: 100%">Sistema de cadastro de pacientes</h1>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" action="/login/autenticar" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control" name="usuario"
                                                   placeholder="Digite o Usuário" required>
                                            <div class="form-control-position">
                                                <i class="la la-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" name="senha"
                                                   placeholder="Digite a Senha" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success btn-block"><i class="ft-unlock"></i>
                                            ACESSAR
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <p class="text-center m-0">Cadastro de pacientes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->