<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="<?= base_url() ?>"><i class="mbri-desktop"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class=" nav-item"><a href="<?= base_url() ?>/clientes"><i class="mbri-sites"></i><span class="menu-title" data-i18n="Templates">Clientes</span></a></li>
            <li class=" nav-item"><a href="<?= base_url() ?>/pedidos"><i class="mbri-website-theme"></i><span class="menu-title" data-i18n="Admin Panels">Pedidos</span></a></li>
            <li class=" nav-item"><a href="<?= base_url() ?>/usuarios"><i class="mbri-extension"></i><span class="menu-title" data-i18n="Apps">Usuarios</span></a> </li>
            <li class=" nav-item"><a href=""><i class="mbri-pages"></i><span class="menu-title" data-i18n="Pages">Parametros</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="<?= base_url() ?>/parametros/filiais"><i class="la la-building"></i><span>Filiais</span></a></li>
                    <li><a class="menu-item" href="<?= base_url() ?>/parametros/status"><i class="la la-check-circle"></i><span>Status</span></a></li>
<!--                    <li><a class="menu-item" href="--><?//= base_url() ?><!--/parametros/documentacao"><i class="la la-code-fork"></i><span>Documentação</span></a></li>-->
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- END: Main Menu-->