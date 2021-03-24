<div id="steps">
        <div id="step-1" class="book-step active-step" data-tippy-content="
        <?php
                                                                            if ($display_any_provider == true || count($available_providers) > 1 || $display_one_provider == true) {
                                                                                echo lang('service_and_provider');
                                                                            } else {
                                                                                echo lang('service');
                                                                            } ?>">
            <strong>1</strong>
        </div>

        <div id="step-2" class="book-step" data-toggle="tooltip" data-tippy-content="<?= lang('appointment_date_and_time') ?>">
            <strong>2</strong>
        </div>
        <div id="step-3" class="book-step" data-toggle="tooltip" data-tippy-content="<?= lang('customer_information') ?>">
            <strong>3</strong>
        </div>
        <div id="step-4" class="book-step" data-toggle="tooltip" data-tippy-content="<?= lang('appointment_confirmation') ?>">
            <strong>4</strong>
        </div>
</div>