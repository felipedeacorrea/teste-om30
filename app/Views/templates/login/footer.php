

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/form-login-register.js"></script>
    <script src="../../../app-assets/js/scripts/pages/bootstrap-toast.js"></script>
    <!-- END: Page JS-->
    <!-- Toast -->
    <script>
        $(document).ready(function () {
            var toast_body = $("#toast_body");
            var toast_alert = $("#toast_alert");
            <?php
            $session = session();
            $alert = $session->getFlashdata('alert');

            if (isset($alert)) :
            ?>
                <?php if ($alert == "error_autentication") : ?>
                toast_body.html("Usuário ou senha incorretos!");
                toast_alert.toast('show');

                <?php elseif ($alert == "session_expired") : ?>
                toast_body.html("Sessão expirada! Acesse sua conta para continuar.");
                toast_alert.toast('show');
                <?php endif; ?>
            <?php endif; ?>
        });
    </script>
</body>
<!-- END: Body-->

</html>