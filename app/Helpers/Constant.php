<?php

namespace App\Helpers;


class Constant
{
    const NULL = 'null';
    const NOT_NULL = 'not_null';
    const SEARCH = 'search';
    const TYPE = 'type';
    const BETWEEN = 'between';
    const BETWEEN_DATES = 'between_dates';
    const PER_PAGE = 'per_page';
    const FILTER = 'filters';
    const ID = 'id';
    const IS_ACTIVE = 'is_active';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const GOALS = 'goals';
    const OBJECTIVES = 'objectives';
    const GOAL_LEVEL = 'goal_level';
    const IMAGE = 'image';
    const VIDEO = 'video';
    const DOCUMENT = 'document';
    const OTHER = 'other';
    const MAIN_IMAGE = 'main_image';
    const COVER_IMAGE = 'cover_image';
    const GOAL = 'Goal';
    const OBJECTIVE = 'Objective';
    const KPI = 'KPI';
    const KEYWORDS = 'keywords';

    const WEEKLY    = 'Weekly';
    const MONTHLY   = 'Monthly';
    const ANNUAL    = 'Annual';

    const CP_GUARD = 'cp';
    const APP_GUARD = 'app';
    const MANAGER_GUARD = 'manager';

    const USER_ROLE = 'user';
    const ADMIN_ROLE = 'admin';
    const MODERATOR_ROLE = 'moderator';

    const FIRST_NAME = 'first_name';

    const CREATED_AT = 'created_at';
    // const ROLES = [self::ADMIN_ROLE, self::MODERATOR_ROLE, self::USER_ROLE];
    // const CP_ROLES = [self::ADMIN_ROLE, self::MODERATOR_ROLE];
    // const WEBSITE_ROLES = [self::USER_ROLE];


    const OUR_LANGUAGES = ['ar', 'en'];

    const SURVEY = 'survey';
    const ASSESSMENT = 'assessment';
    const PRODUCT = 'product';
    const AUDIENCE_ROLE_SURVEY = 'audience_role_survey';
    const AUDIENCE_ROLE_ASSESSMENT = 'audience_role_assessment';

    // date time response format
    const RESPONSE_DATETIME_FORMAT = 'd-m-Y h:i a';
    const RESPONSE_DATE_FORMAT = 'd-m-Y';
    const RESPONSE_TIME_FORMAT = 'h:i a';

    // date time validations
    const DATETIME_FORMAT = 'Y-m-d H:i:s';
    const DATE_HOURS = 'Y-m-d H:i';
    const DATE_FORMAT = 'Y-m-d';
    const TIME_FORMAT = 'H:i:s';
    const PERIOD_FORMAT = '%H:%I:%S';

    const STRING_REGEX = '/^[a-zA-Z0-9ء-ي_.\s-]*$/u';
    const NORMAL_STRING_REGEX = '/^[\ُ\ْ\~\ٌ\ً\َ\؛\ٍ\ِ\ّ\!\%\’\?\؟\'\$\%\?\،\,\.\(\)\[\]\_\-\s\da-zA-Z0-9ء-ي]*$/u';
    const WORD_REGEX = '/^[a-zA-Z0-9_.-]*$/u';
    const PHONE_REGEX = '/^([0-9\s\-\+\(\)]*)$/u';
    const USERNAME_EMAIL_REGEX = '/^(?=.{4,}$)[a-zA-Z0-9._@-]+(?<![_.@])$/u';
    const JSON_REGEX = '/^[\ُ\ْ\~\ٌ\ً\َ\؛\ٍ\ِ\ّ\!\%\’\?\؟\'\$\%\?\،\{\}\"\[\]\:\,\.\(\)\[\]\_\-\s\da-zA-Z0-9ء-ي]*$/u';
    const DOUBLE_REGIX = '/^\d+(\.\d{1,2})?$/';


    const VIDEO_MIMETYPES       = 'mp4,m1v,m2a,m2v,m3a,mov,mpeg,ts,3gpp,wmv,flv,ogx,oga,ogv,ogg,webm,avi';
    const DOCUMENT_MIMETYPES    = 'doc,docx,pdf,csv,xlsx,xls,ppt,odt,ods,odp,txt,pptx';
    const IMAGE_MIMETYPES       = 'jpg,jpeg,png,bmp,gif,svg,webp';

    const START_DATE = "start_date";
    const END_DATE = "end_date";
}
