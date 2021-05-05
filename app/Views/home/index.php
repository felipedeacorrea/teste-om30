<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- eCommerce statistic -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">0</h3>
                                        <h6>Total de pedidos</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">R$0</h3>
                                        <h6>Total em venda</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">0</h3>
                                        <h6>Total de clientes</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-follow success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">0%</h3>
                                        <h6>Meta atingida</h6>
                                    </div>
                                    <div>
                                        <i class="icon-heart danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ eCommerce statistic -->

            <!-- Recent Transactions -->
            <div class="row match-height">
                <div id="recent-transactions" class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Últimos pedidos</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="<?= base_url()?>/pedidos" target="_blank">Todos os pedidos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Pedido</th>
                                        <th class="border-top-0">Cliente</th>
                                        <th class="border-top-0">Valor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(!empty($dados['listPedidos'])){
                                            foreach ($dados['listPedidos'] as $key => $pedido){ ?>
                                                <tr>
                                                    <td class="text-truncate">
                                                        <i class="la la-dot-circle-o success font-medium-1 mr-1"></i> <?= $pedido['status'] ?? null?>
                                                    </td>
                                                    <td class="text-truncate">
                                                        <a href="#"><?= $pedido['id']?></a>
                                                    </td>
                                                    <td class="text-truncate">
                                                        <span><?= $pedido['nomeFantasia']?></span>
                                                    </td>
                                                    <td class="text-truncate"><?= $pedido['totalPedido'] ?? ''?></td>
                                                </tr>
                                            <?php }
                                        }else{ ?>
                                           <tr>
                                               <td colspan="4" style="text-align: center">
                                                   <p>Sem pedidos cadastrados</p>
                                               </td>
                                           </tr>
                                        <?php }
                                    ?>

<!--                                    <tr>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Declined-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <a href="#">100349</a>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <span>Empresa do João das Neves</span>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">R$ 13.598,81</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <i class="la la-dot-circle-o warning font-medium-1 mr-1"></i> Pending-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <a href="#">100333</a>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <span>TKM Web Digital</span>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">R$ 1.098,81</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Pago-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <a href="#">100328</a>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <span>Empresa da Maria das Rosas</span>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">R$ 7.398,81</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Pago-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <a href="#">100325</a>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">-->
<!--                                            <span>Mais uma empresa do Jorge</span>-->
<!--                                        </td>-->
<!--                                        <td class="text-truncate">R$ 3.798,81</td>-->
<!--                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body sales-growth-chart">
                                <div id="monthly-sales" class="height-250"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="chart-title mb-1 text-center">
                                <h6>Total de vendas por mês</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->

        </div>
    </div>
</div>
<!-- END: Content-->