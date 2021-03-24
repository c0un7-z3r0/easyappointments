<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= lang('page_title') . ' ' . $company_name ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

    <link rel="icon" type="image/x-icon" href="<?= asset_url('assets/img/favicon.ico') ?>">
    <link rel="icon" sizes="192x192" href="<?= asset_url('assets/img/logo.png') ?>">

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
</head>

<body>
    <div id="main" class="container">
        <div class="row wrapper">
            <div id="book-appointment-wizard" class="col-12 col-lg-10 col-xl-8">

                <!-- FRAME TOP BAR -->

                <?php include "book/header.php"; ?>


                <?php if ($manage_mode) : ?>
                    <div id="cancel-appointment-frame" class="row booking-header-bar">
                        <div class="col-12 col-md-10">
                            <small><?= lang('cancel_appointment_hint') ?></small>
                        </div>
                        <div class="col-12 col-md-2">
                            <form id="cancel-appointment-form" method="post" action="<?= site_url('appointments/cancel/' . $appointment_data['hash']) ?>">

                                <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>" />

                                <textarea name="cancel_reason" style="display:none"></textarea>

                                <button id="cancel-appointment" class="btn btn-warning btn-sm">
                                    <?= lang('cancel') ?>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="booking-header-bar row">
                        <div class="col-12 col-md-10">
                            <small><?= lang('delete_personal_information_hint') ?></small>
                        </div>
                        <div class="col-12 col-md-2">
                            <button id="delete-personal-information" class="btn btn-danger btn-sm"><?= lang('delete') ?></button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($exceptions)) : ?>
                    <div style="margin: 10px">
                        <h4><?= lang('unexpected_issues') ?></h4>

                        <?php foreach ($exceptions as $exception) : ?>
                            <?= exceptionToHtml($exception) ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>


                <!-- SELECT SERVICE AND PROVIDER -->

                            <?php include "book/service_provider.php" ?>

                <!-- SELECT APPOINTMENT DATE -->

                <?php include "book/appointment_date.php" ?>


                <!-- ENTER CUSTOMER DATA -->

                <?php include "book/customer_data.php" ?>

                <!-- APPOINTMENT DATA CONFIRMATION -->
                <?php include "book/confirm.php" ?>

                
                <!-- FRAME FOOTER -->

                <div id="frame-footer">
                    <small>
                        <span class="footer-powered-by">
                            Powered By

                            <a href="https://easyappointments.org" target="_blank">Easy!Appointments</a>
                        </span>

                        <span class="footer-options">
                            <span id="select-language" class="badge badge-secondary">
                                <i class="fas fa-language mr-2"></i>
                                <?= ucfirst(config('language')) ?>
                            </span>

                            <a class="backend-link badge badge-primary" href="<?= site_url('backend'); ?>">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <?= $this->session->user_id ? lang('backend_section') : lang('login') ?>
                            </a>
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <?php if ($display_cookie_notice === '1') : ?>
        <?php require 'cookie_notice_modal.php' ?>
    <?php endif ?>

    <?php if ($display_terms_and_conditions === '1') : ?>
        <?php require 'terms_and_conditions_modal.php' ?>
    <?php endif ?>

    <?php if ($display_privacy_policy === '1') : ?>
        <?php require 'privacy_policy_modal.php' ?>
    <?php endif ?>

    <script>
        var GlobalVariables = {
            availableServices: <?= json_encode($available_services) ?>,
            availableProviders: <?= json_encode($available_providers) ?>,
            baseUrl: <?= json_encode(config('base_url')) ?>,
            manageMode: <?= $manage_mode ? 'true' : 'false' ?>,
            customerToken: <?= json_encode($customer_token) ?>,
            dateFormat: <?= json_encode($date_format) ?>,
            timeFormat: <?= json_encode($time_format) ?>,
            firstWeekday: <?= json_encode($first_weekday) ?>,
            displayCookieNotice: <?= json_encode($display_cookie_notice === '1') ?>,
            appointmentData: <?= json_encode($appointment_data) ?>,
            providerData: <?= json_encode($provider_data) ?>,
            customerData: <?= json_encode($customer_data) ?>,
            displayAnyProvider: <?= json_encode($display_any_provider) ?>,
            displayOneProvider: <?= json_encode($display_one_provider) ?>,
            csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>
        };

        var EALang = <?= json_encode($this->lang->language) ?>;
        var availableLanguages = <?= json_encode(config('available_languages')) ?>;
    </script>

    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/popper/popper.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/tippy/tippy-bundle.umd.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book_api.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book.js') ?>"></script>

    <script>
        $(function() {
            FrontendBook.initialize(true, GlobalVariables.manageMode);
            GeneralFunctions.enableLanguageSelection($('#select-language'));
        });
    </script>

    <?php google_analytics_script(); ?>
</body>

</html>