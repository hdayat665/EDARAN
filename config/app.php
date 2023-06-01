<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Kuala_Lumpur',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // ...
    ])->toArray(),

    'response' => [
        'success' => [
            'type' => 'success',
            'title' => 'Success!',
            'status' => true
        ],
        'error' => [
            'type' => 'error',
            'title' => 'Error!',
            'status' => false
        ],

    ],

    'entitle-group' => [
        'motor' => 'Mileage claim  for own motorcycle only & with prior approval from supervisor. if leave blank KM field, it will assume as no limit. Click the + button to add the subsequent KM and rate.Click the - button to remove the subsequent KM and rate',
        'car' => 'Mileage claim  for own car only & with prior approval from supervisor. if leave blank KM field, it will assume as no limit. Click the + button to add the subsequent KM and rate.Click the - button to remove the subsequent KM and rate'
    ],

    'permission' => [
        'hris' => 'HRIS',
        'hris_register_employee' => 'HRIS_REGISTER_EMPLOYEE',
        'hris_update_employee' => 'HRIS_UPDATE_EMPLOYEE',
        'hris_terminate_employee' => 'HRIS_TERMINATE_EMPLOYEE',
        'hris_activate_employee' => 'HRIS_ACTIVATE_EMPLOYEE',
        'employee_info' => 'EMPLOYEE_INFO',
        'tsr' => 'TSR',
        'tsr_timesheet_create_event' => 'TSR_TIMESHEET_CREATE_EVENT',
        'tsr_timesheet_approval' => 'TSR_TIMESHEET_APPROVAL',
        'tsr_timesheet_reject' => 'TSR_TIMESHEET_REJECT',
        'my_timesheet' => 'MY_TIMESHEET',
        'timesheet_approval' => 'TIMESHEET_APPROVAL',
        'attendance' => 'ATTENDANCE',
        'attendance_view_action_log' => 'ATTENDANCE_VIEW_ACTION_LOG',
        'my_attendance' => 'MY_ATTENDANCE',
        'attendance_info' => 'ATTENDANCE_INFO',
        'leave' => 'LEAVE',
        'leave_hod_approve' => 'LEAVE_HOD_APPROVE',
        'department' => 'DEPARTMENT',
        'HOD' => 'HOD',
        'leave_approval' => 'LEAVE_APPROVAL',
        'project' => 'PROJECT',
        'add_customer' => 'ADD_CUSTOMER',
        'edit_customer' => 'EDIT_CUSTOMER',
        'delete_customer' => 'DELETE_CUSTOMER',
        'register_project' => 'REGISTER_PROJECT',
        'view_project' => 'VIEW_PROJECT',
        'update_status' => 'UPDATE_STATUS',
        'update_project' => 'UPDATE_PROJECT',
        'view_project_request' => 'VIEW_PROJECT_REQUEST',
        'approve_project_request' => 'APPROVE_PROJECT_REQUEST',
        'reject_project_request' => 'REJECT_PROJECT_REQUEST',
        'customer' => 'CUSTOMER',
        'project_info' => 'PROJECT_INFO',
        'project_approval' => 'PROJECT_APPROVAL',
        'claim' => 'CLAIM',
        'claim_department_approve' => 'CLAIM_DEPARTMENT_APPROVE',
        'claim_finance_approve' => 'CLAIM_FINANCE_APPROVE',
        'claim_admin_approve' => 'CLAIM_ADMIN_APPROVE',
        'finance' => 'FINANCE',
        'admin' => 'ADMIN',
        'claim_approval' => 'CLAIM_APPROVAL',
        'settings' => 'SETTINGS',
        'setting_general' => 'SETTING_GENERAL',
        'setting_attendance' => 'SETTING_ATTENDANCE',
        'setting_timesheet' => 'SETTING_TIMESHEET',
        'setting_leave' => 'SETTING_LEAVE',
        'setting_claim' => 'SETTING_CLAIM',
        'reporting' => 'REPORTING',
        'report_tsr' => 'REPORT_TSR',
        'report_attendance' => 'REPORT_ATTENDANCE',
        'report_leave' => 'REPORT_LEAVE',
        'report_project' => 'REPORT_PROJECT',
        'report_claim' => 'REPORT_CLAIM',
        'report_cor' => 'REPORT_COR',
    ],

];