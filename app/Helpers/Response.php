<?php

namespace App\Helpers;


class Response
{

    public const SUCCESS                = 'response.success';
    public const FAILED                 = 'response.failed';
    public const NOT_AUTHORIZED         = 'response.not_authorized';
    public const NOT_AUTHENTICATED      = 'response.not_authenticated';
    public const USER_NOT_FOUND         = 'response.user_not_found';
    public const NOT_VERIFIED           = 'response.not_verified';
    public const NOT_ENABLED            = 'response.not_enabled';

    public const WRONG_PASSWORD         = 'response.wrong_password';
    public const LOGIN_SUCCESSFULLY     = 'response.login_successfully';
    public const LOGOUT_SUCCESSFULLY    = 'response.logout_successfully';
    public const LOGIN_FAILED           = 'response.login_failed';
    public const CODE_FAILED            = 'response.code_failed';
    public const MUST_LOGIN             = 'response.must_login';

    public const ADDED_SUCCESSFULLY     = 'response.added_successfully';
    public const UPDATED_SUCCESSFULLY   = 'response.updated_successfully';

    public const COUNTRY_ADDED_SUCCESSFULLY     = 'response.country_added_successfully';
    public const COUNTRY_UPDATED_SUCCESSFULLY   = 'response.country_updated_successfully';
    public const CITY_ADDED_SUCCESSFULLY     = 'response.city_added_successfully';
    public const CITY_UPDATED_SUCCESSFULLY   = 'response.city_updated_successfully';
    public const USER_ADDED_SUCCESSFULLY     = 'response.user_added_successfully';
    public const USER_UPDATED_SUCCESSFULLY   = 'response.user_updated_successfully';
    public const OWNER_ADDED_SUCCESSFULLY     = 'response.owner_added_successfully';
    public const OWNER_UPDATED_SUCCESSFULLY   = 'response.owner_updated_successfully';
    public const COMPANY_ADDED_SUCCESSFULLY     = 'response.company_added_successfully';
    public const COMPANY_UPDATED_SUCCESSFULLY   = 'response.company_updated_successfully';
    public const ROLE_ADDED_SUCCESSFULLY     = 'response.role_added_successfully';
    public const ROLE_UPDATED_SUCCESSFULLY   = 'response.role_updated_successfully';

    public const COUNTRY_DELETED_SUCCESSFULLY   = 'response.country_deleted_successfully';
    public const CITY_DELETED_SUCCESSFULLY   = 'response.city_deleted_successfully';
    public const USER_DELETED_SUCCESSFULLY   = 'response.user_deleted_successfully';
    public const OWNER_DELETED_SUCCESSFULLY   = 'response.owner_deleted_successfully';
    public const COMPANY_DELETED_SUCCESSFULLY   = 'response.company_deleted_successfully';
    public const ROLE_DELETED_SUCCESSFULLY   = 'response.role_deleted_successfully';


    public const DELETED_SUCCESSFULLY   = 'response.deleted_successfully';
    public const TRASHED_SUCCESSFULLY   = 'response.trashed_successfully';
    public const RESTORED_SUCCESSFULLY  = 'response.restored_successfully';
    public const NOT_ALLOWED            = 'response.not_allowed';
    public const NOT_FOUND              = 'response.not_found';
    public const WRONG_ANS_NUMBER       = 'response.wrong_answers_numbers';
    public const EXCEEDED_CAMPAIGN_END_DATE = 'validation.custom.exceeded_campaign_end_date';
    public const EDITED = 'response.edited';
    public const AUDIENCE_ROLE_ALREADY_ASSIGNED = 'response.audience_role_already_assigned';
    public const FEEDBACK_WAS_SENT = 'response.feedback_was_sent';
    public const PROGRAM_PRESENTATION_NOT_FINISHED_YET = 'response.prgram_presentaion_not_finished_yet';
    public const REQUEST_WILL_PROCESSING = 'response.your_request_will_processing';

    public const DURATION_OUT_OF_TIME_LINE = 'response.duration_out_of_time_line';

    public const INTEGRATION_CONNECTION_FAILED = 'response.integration_connection_failed';

    public const IMPORT_USERS_PROCESSING = 'response.your_request_import_users_will_processing';
    public const IMPORT_USERS_FAILED = 'response.your_request_import_users_failed';

    public const LDAP_CONNECTION_SUCCESS  = 'response.ldap_connection_success';
    public const LDAP_CONNECTION_FAILD  = 'response.ldap_connection_failed';
    public const AZUR_CONNECTION_SUCCESS  = 'response.azur_connection_success';
    public const AZUR_CONNECTION_FAILD  = 'response.azur_connection_failed';
    /**
     * @param mixed $message
     * @param null $content
     * @param integer $status
     *
     * @return JsonResponse
     */
    public static function respondSuccess($message, $content = null, $status = 200)
    {
        return response()->json([
            'status'    => true,
            'message'   => trans($message),
            'data'      => $content,
        ], $status);
    }

    /**
     * @param mixed $message
     * @param integer $status
     *
     * @return JsonResponse
     */
    public static function respondError($message, $status = 500, $data = null)
    {
        return response()->json([
            'status'    => false,
            'message'   => trans($message),
            'data'      => $data,
        ], $status);
    }
}
