<div class="sidenav-overlay">
    <div class="loader-wrapper">
        <div class="loader-container">
            <div class="ball-grid-pulse loader-primary">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021
            <a class="text-bold-800 grey darken-2" href="" target="_blank">Cadastro de pacientes</a>
        </span>
        <span class="float-md-right d-none d-lg-block">By <strong>Felipe Correa</strong>
            <i class="ft-heart pink"></i>
            <span id="scroll-top"></span>
        </span>
    </p>
</footer>
<!-- END: Footer-->

<script>
    let baseUrl = "<?= base_url() ?>";
</script>

<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
<script src="../../../app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
<script src="../../../app-assets/vendors/js/editors/tinymce/tinymce.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/typeahead/handlebars.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/formatter/formatter.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"></script>
<script src="../../../app-assets/vendors/js/forms/extended/card/jquery.card.js"></script>
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="../../../app-assets/vendors/js/toast/jquery.toast.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/scripts/modal/components-modal.js"></script>
<script src="../../../app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-inputmask.js"></script>
<script src="../../../app-assets/js/scripts/forms/switch.js"></script>
<script src="../../../app-assets/js/scripts/editors/editor-tinymce.js"></script>
<script src="../../../app-assets/js/scripts/forms/select/form-select2.js"></script>
<script src="../../../app-assets/js/scripts/forms/wizard-steps.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-inputmask.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-typeahead.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-formatter.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-maxlength.js"></script>
<script src="../../../app-assets/js/scripts/forms/extended/form-card.js"></script>
<script src="../../../app-assets/js/scripts/extensions/ex-component-sweet-alerts.js"></script>
<script src="../../../app-assets/js/scripts/pages/material-app.js"></script>
<script src="../../../app-assets/js/scripts/pages/invoices-list.js"></script>
<!-- END: Theme JS-->

<!-- Custom JS -->
<script src="../../../assets/js/scripts.js"></script>
<script src="../../../assets/js/buscacep.js"></script>
<script src="../../../assets/js/app.js"></script>

<script>
    var flash = JSON.parse('<?= ((new \App\Libraries\Cimsg())->getFlash() ?? null); ?>');
    if (flash) {
        msgToast(flash);
    }
</script>

</body>
<!-- END: Body-->

</html>