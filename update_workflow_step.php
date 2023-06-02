<?php


/* Cancel workflow
 * -------------------------------------------- */

try {
    $bs_form_id  = 21;
    $bs_entry_id = $data['nlf_entry_id'];
    $bs_step_id  = 8; //  Completed

    $entry = GFAPI::get_entry($bs_entry_id);

    $api = new Gravity_Flow_API($bs_form_id);
    /*
     * @var array() $entry The Entry 
     * @var bool $success True for success. False if not currently in a workflow.
     * 
     */
    $status = $api->cancel_workflow($entry);

    // $result = update_gravityflow_step($bs_form_id, $bs_entry_id, $bs_step_id);
    bs($status);
} catch (Exception $err) {
    $errors = array();
    bs('' . $err->getMessage());

    foreach ($err as $error) {
        bs('Content: ' . $error);
    }
}
