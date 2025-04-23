<?php return array (
  'activitylog' => 
  array (
    'enabled' => true,
    'delete_records_older_than_days' => 365,
    'default_log_name' => 'default',
    'default_auth_driver' => NULL,
    'subject_returns_soft_deleted_models' => false,
    'activity_model' => 'Spatie\\Activitylog\\Models\\Activity',
    'table_name' => 'activity_log',
    'database_connection' => NULL,
  ),
  'app' => 
  array (
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:x5z9wvTaIS0axv7KWmNHc6AR9WVXOyvZ6RLVvjYbC9E=',
    'cipher' => 'AES-256-CBC',
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      15 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      16 => 'Illuminate\\Queue\\QueueServiceProvider',
      17 => 'Illuminate\\Redis\\RedisServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'app\\Providers\\AppServiceProvider',
      23 => 'app\\Providers\\AuthServiceProvider',
      24 => 'app\\Providers\\EventServiceProvider',
      25 => 'app\\Providers\\OpenAIServiceProvider',
      26 => 'app\\Providers\\RouteServiceProvider',
      27 => 'app\\Providers\\VoltServiceProvider',
      28 => 'RealRashid\\SweetAlert\\SweetAlertServiceProvider',
      29 => 'Kyslik\\ColumnSortable\\ColumnSortableServiceProvider',
      30 => 'Gloudemans\\Shoppingcart\\ShoppingcartServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'Alert' => 'RealRashid\\SweetAlert\\Facades\\Alert',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
      'backpack' => 
      array (
        'driver' => 'session',
        'provider' => 'backpack',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'app\\Models\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'app\\Models\\Admin',
      ),
      'backpack' => 
      array (
        'driver' => 'eloquent',
        'model' => 'app\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
      'backpack' => 
      array (
        'provider' => 'backpack',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 600,
      ),
    ),
    'password_timeout' => 10800,
    'chief' => 
    array (
      'email' => 'romanadmin@secure.com',
      'password' => 'Tcsupport@4321nvx@Xml@2023*',
      'user_id' => '1',
    ),
  ),
  'auto-translations' => 
  array (
    'lang_path' => 'C:\\rstoresV1R\\rsmstores\\lang',
    'default_driver' => 'chatgpt',
    'source_language' => 'en',
    'drivers' => 
    array (
      'chatgpt' => 
      array (
        'api_key' => NULL,
        'model' => 'gpt-3.5-turbo',
        'temperature' => 0.7,
        'max_tokens' => 4096,
        'http_timeout' => 300,
      ),
      'google' => 
      array (
        'api_key' => NULL,
      ),
      'deepl' => 
      array (
        'api_key' => NULL,
        'api_url' => 'https://api-free.deepl.com/v2/translate',
      ),
      'my_custom_driver' => 
      array (
        'class' => 'app\\Drivers\\MyCustomDriver',
        'api_key' => NULL,
      ),
    ),
  ),
  'backpack' => 
  array (
    'base' => 
    array (
      'registration_open' => false,
      'route_prefix' => 'chiefs/onebyone',
      'web_middleware' => 'web',
      'setup_auth_routes' => true,
      'setup_dashboard_routes' => true,
      'setup_my_account_routes' => true,
      'setup_password_recovery_routes' => true,
      'setup_email_verification_routes' => false,
      'setup_email_verification_middleware' => true,
      'email_verification_throttle_access' => '3,15',
      'password_recovery_throttle_notifications' => 600,
      'password_recovery_token_expiration' => 60,
      'password_recovery_throttle_access' => '3,10',
      'user_model_fqn' => 'app\\Models\\User',
      'middleware_class' => 
      array (
        0 => 'app\\Http\\Middleware\\AdminMiddleware',
      ),
      'middleware_key' => 'admin',
      'authentication_column' => 'email',
      'authentication_column_name' => 'Email',
      'email_column' => 'email',
      'guard' => 'admin',
      'passwords' => 'backpack',
      'avatar_type' => 'gravatar',
      'gravatar_fallback' => 'blank',
      'root_disk_name' => 'root',
      'useDatabaseTransactions' => false,
      'token_username' => false,
      'registration' => 
      array (
        'enabled' => false,
      ),
    ),
    'crud' => 
    array (
      'show_translatable_field_icon' => true,
      'translatable_field_icon_position' => 'right',
      'locales' => 
      array (
        'en' => 'English',
        'fr' => 'French',
        'it' => 'Italian',
        'ro' => 'Romanian',
      ),
      'view_namespaces' => 
      array (
        'buttons' => 
        array (
          0 => 'crud::buttons',
        ),
        'columns' => 
        array (
          0 => 'crud::columns',
        ),
        'fields' => 
        array (
          0 => 'crud::fields',
        ),
        'filters' => 
        array (
          0 => 'crud::filters',
        ),
      ),
      'uploaders' => 
      array (
        'withFiles' => 
        array (
          'image' => 'Backpack\\CRUD\\app\\Library\\Uploaders\\SingleBase64Image',
          'upload' => 'Backpack\\CRUD\\app\\Library\\Uploaders\\SingleFile',
          'upload_multiple' => 'Backpack\\CRUD\\app\\Library\\Uploaders\\MultipleFiles',
        ),
      ),
      'file_name_generator' => 'Backpack\\CRUD\\app\\Library\\Uploaders\\Support\\FileNameGenerator',
      'operations' => 
      array (
        'list' => 
        array (
          'contentClass' => 'col-md-12',
          'dataSource' => NULL,
        ),
      ),
    ),
    'operations' => 
    array (
      'create' => 
      array (
        'contentClass' => 'col-md-12 bold-labels',
        'tabsType' => 'horizontal',
        'groupedErrors' => true,
        'inlineErrors' => true,
        'autoFocusOnFirstField' => true,
        'defaultSaveAction' => 'save_and_back',
        'showSaveActionChange' => true,
        'showCancelButton' => true,
        'warnBeforeLeaving' => false,
      ),
      'form' => 
      array (
        'contentClass' => 'col-md-12 bold-labels',
        'tabsType' => 'horizontal',
        'groupedErrors' => true,
        'inlineErrors' => true,
        'autoFocusOnFirstField' => true,
        'defaultSaveAction' => 'save_and_back',
        'showSaveActionChange' => false,
        'showCancelButton' => true,
        'warnBeforeLeaving' => false,
      ),
      'list' => 
      array (
        'contentClass' => 'col-md-12',
        'responsiveTable' => true,
        'persistentTable' => true,
        'searchableTable' => true,
        'searchDelay' => 400,
        'persistentTableDuration' => false,
        'defaultPageLength' => 10,
        'pageLengthMenu' => 
        array (
          0 => 
          array (
            0 => 10,
            1 => 25,
            2 => 50,
            3 => 100,
            4 => -1,
          ),
          1 => 
          array (
            0 => 10,
            1 => 25,
            2 => 50,
            3 => 100,
            4 => 'backpack::crud.all',
          ),
        ),
        'actionsColumnPriority' => 1,
        'lineButtonsAsDropdown' => false,
        'lineButtonsAsDropdownMinimum' => 1,
        'lineButtonsAsDropdownShowBefore' => 0,
        'resetButton' => true,
        'searchOperator' => 'like',
        'showEntryCount' => true,
        'eagerLoadRelationships' => true,
      ),
      'reorder' => 
      array (
        'contentClass' => 'col-md-12 col-md-offset-2',
        'escaped' => false,
      ),
      'show' => 
      array (
        'contentClass' => 'col-md-12',
        'setFromDb' => true,
        'timestamps' => true,
        'softDeletes' => false,
        'tabsEnabled' => false,
        'tabsType' => 'horizontal',
      ),
      'update' => 
      array (
        'contentClass' => 'col-md-12 bold-labels',
        'tabsType' => 'horizontal',
        'groupedErrors' => true,
        'inlineErrors' => true,
        'autoFocusOnFirstField' => true,
        'defaultSaveAction' => 'save_and_back',
        'showSaveActionChange' => true,
        'showCancelButton' => true,
        'showDeleteButton' => false,
        'warnBeforeLeaving' => false,
        'showTranslationNotice' => true,
        'eagerLoadRelationships' => false,
      ),
    ),
    'theme-tabler' => 
    array (
      'layout' => 'horizontal_overlap',
      'auth_layout' => 'default',
      'styles' => 
      array (
        0 => 'C:\\rstoresV1R\\rsmstores\\vendor/backpack/theme-tabler/resources/assets/css/color-adjustments.css',
        1 => 'C:\\rstoresV1R\\rsmstores\\vendor/backpack/theme-tabler/resources/assets/css/colors.css',
      ),
      'options' => 
      array (
        'colorModes' => 
        array (
          'system' => 'la-desktop',
          'light' => 'la-sun',
          'dark' => 'la-moon',
        ),
        'defaultColorMode' => 'system',
        'showColorModeSwitcher' => true,
        'useStickyHeader' => false,
        'useFluidContainers' => false,
        'sidebarFixed' => false,
        'doubleTopBarInHorizontalLayouts' => false,
        'showPasswordVisibilityToggler' => false,
      ),
      'classes' => 
      array (
        'body' => NULL,
        'topHeader' => NULL,
        'sidebar' => NULL,
        'menuHorizontalContainer' => NULL,
        'menuHorizontalContent' => NULL,
        'footer' => NULL,
        'table' => NULL,
        'tableWrapper' => NULL,
      ),
    ),
    'ui' => 
    array (
      'view_namespace' => 'backpack.theme-tabler::',
      'view_namespace_fallback' => 'backpack.theme-tabler::',
      'default_date_format' => 'D MMM YYYY',
      'default_datetime_format' => 'D MMM YYYY, HH:mm',
      'html_direction' => 'ltr',
      'project_name' => 'RSM-RomanStockManager',
      'meta_robots_content' => 'noindex, nofollow',
      'home_link' => '',
      'project_logo' => '<b>Back</b>pack',
      'breadcrumbs' => true,
      'developer_name' => 'welasonnelson-opensource',
      'developer_link' => 'http://romanstockmanager.com',
      'show_powered_by' => false,
      'show_getting_started' => false,
      'styles' => 
      array (
      ),
      'mix_styles' => 
      array (
      ),
      'vite_styles' => 
      array (
      ),
      'scripts' => 
      array (
      ),
      'mix_scripts' => 
      array (
      ),
      'vite_scripts' => 
      array (
      ),
      'classes' => 
      array (
        'table' => NULL,
        'tableWrapper' => NULL,
      ),
      'dashboard' => 
      array (
        'enabled' => true,
        'use_custom_view' => true,
        'custom_view' => 'vendor.backpack.base.dashboard',
        'force_full' => false,
      ),
    ),
    'basset' => 
    array (
      'dev_mode' => true,
      'verify_ssl_certificate' => true,
      'disk' => 'public',
      'path' => 'basset',
      'cache_map' => true,
      'view_paths' => 
      array (
        0 => 'C:\\rstoresV1R\\rsmstores\\resources\\views',
      ),
      'nonce' => NULL,
      'relative_paths' => true,
    ),
  ),
  'blade-heroicons' => 
  array (
    'prefix' => 'heroicon',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'blade-icons' => 
  array (
    'sets' => 
    array (
    ),
    'class' => '',
    'attributes' => 
    array (
    ),
    'fallback' => '',
    'components' => 
    array (
      'disabled' => false,
      'default' => 'icon',
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\rstoresV1R\\rsmstores\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'romanstockmanager_cache_',
  ),
  'cart' => 
  array (
    'calculator' => 'Gloudemans\\Shoppingcart\\Calculation\\DefaultCalculator',
    'tax' => 24,
    'database' => 
    array (
      'connection' => NULL,
      'table' => 'shoppingcart',
    ),
    'destroy_on_logout' => false,
    'format' => 
    array (
      'decimals' => 2,
      'decimal_point' => '.',
      'thousand_separator' => '',
    ),
  ),
  'cloudinary' => 
  array (
    'notification_url' => NULL,
    'cloud_url' => 'cloudinary://679648855434483:6ZWq3MAjkQrqUa0q8_GtK9lUj_w@dobjzzjpg',
    'upload_preset' => NULL,
    'upload_route' => NULL,
    'upload_action' => NULL,
  ),
  'columnsortable' => 
  array (
    'columns' => 
    array (
      'alpha' => 
      array (
        'rows' => 
        array (
          0 => 'description',
          1 => 'email',
          2 => 'name',
          3 => 'slug',
        ),
        'class' => 'fa fa-sort-alpha',
      ),
      'amount' => 
      array (
        'rows' => 
        array (
          0 => 'amount',
          1 => 'price',
        ),
        'class' => 'fa fa-sort-amount',
      ),
      'numeric' => 
      array (
        'rows' => 
        array (
          0 => 'created_at',
          1 => 'updated_at',
          2 => 'level',
          3 => 'id',
          4 => 'phone_number',
        ),
        'class' => 'fa fa-sort-numeric',
      ),
    ),
    'enable_icons' => true,
    'default_icon_set' => 'fa fa-sort',
    'sortable_icon' => 'fa fa-sort',
    'clickable_icon' => false,
    'icon_text_separator' => ' ',
    'asc_suffix' => '-asc',
    'desc_suffix' => '-desc',
    'anchor_class' => NULL,
    'active_anchor_class' => NULL,
    'direction_anchor_class_prefix' => NULL,
    'uri_relation_column_separator' => '.',
    'formatting_function' => 'ucfirst',
    'format_custom_titles' => true,
    'inject_title_as' => NULL,
    'allow_request_modification' => true,
    'default_direction' => 'asc',
    'default_direction_unsorted' => 'asc',
    'default_first_column' => false,
    'join_type' => 'leftJoin',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'RsmDBmain',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'RsmDBmain',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'RsmDBmain',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'RsmDBmain',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'romanstockmanager_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'hide_empty_tabs' => false,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'open' => NULL,
      'driver' => 'file',
      'path' => 'C:\\rstoresV1R\\rsmstores\\storage\\debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'editor' => 'phpstorm',
    'remote_sites_path' => NULL,
    'local_sites_path' => NULL,
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'defer_datasets' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'auth' => false,
      'gate' => true,
      'session' => true,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
      'jobs' => false,
      'pennant' => false,
    ),
    'options' => 
    array (
      'time' => 
      array (
        'memory_usage' => false,
      ),
      'messages' => 
      array (
        'trace' => true,
      ),
      'memory' => 
      array (
        'reset_peak' => false,
        'with_baseline' => false,
        'precision' => 0,
      ),
      'auth' => 
      array (
        'show_name' => true,
        'show_guards' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'exclude_paths' => 
        array (
        ),
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => false,
        ),
        'hints' => false,
        'show_copy' => true,
        'slow_threshold' => false,
        'memory_usage' => false,
        'soft_limit' => 100,
        'hard_limit' => 500,
      ),
      'mail' => 
      array (
        'timeline' => false,
        'show_body' => true,
      ),
      'views' => 
      array (
        'timeline' => false,
        'data' => false,
        'group' => 50,
        'exclude_paths' => 
        array (
          0 => 'vendor/filament',
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'session' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'symfony_request' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'events' => 
      array (
        'data' => false,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'filament' => 
  array (
    'panels' => 
    array (
      'default' => 
      array (
        'id' => 'default',
        'label' => 'Default',
        'resource_directories' => 
        array (
          0 => 'app/Filament/Resources',
        ),
        'resource_namespaces' => 
        array (
          0 => 'App\\Filament\\Resources',
        ),
      ),
    ),
    'brand' => 
    array (
      'name' => 'Roman Admin Panel',
      'logo' => 'static/logo2.png',
    ),
    'broadcasting' => 
    array (
    ),
    'default_filesystem_disk' => 'public',
    'middleware' => 
    array (
      0 => 'web',
      1 => 'app\\Http\\Middleware\\RestrictFilamentAccess',
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\rstoresV1R\\rsmstores\\storage\\app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\rstoresV1R\\rsmstores\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      'basset' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\rstoresV1R\\rsmstores\\storage\\app/public/basset',
        'url' => 'http://localhost/storage/basset',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
      'root' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\rstoresV1R\\rsmstores',
      ),
    ),
    'links' => 
    array (
      'C:\\rstoresV1R\\rsmstores\\public\\storage' => 'C:\\rstoresV1R\\rsmstores\\storage\\app/public',
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      6 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddContext',
      7 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionHandledStatus',
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
          1 => 'Authorization',
          2 => 'Cookie',
          3 => 'Set-Cookie',
          4 => 'X-CSRF-TOKEN',
          5 => 'X-XSRF-TOKEN',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'gravatar' => 
  array (
    'default' => 
    array (
      'size' => 80,
      'fallback' => 'mp',
      'secure' => false,
      'maximumRating' => 'g',
      'forceDefault' => false,
      'forceExtension' => 'jpg',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
      18 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\OpenAiSolutionProvider',
      19 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\SailNetworkSolutionProvider',
      20 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownMysql8CollationSolutionProvider',
      21 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownMariadbCollationSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => 'C:\\rstoresV1R\\rsmstores',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
    'open_ai_key' => NULL,
    'with_stack_frame_arguments' => true,
    'argument_reducers' => 
    array (
      0 => 'Spatie\\Backtrace\\Arguments\\Reducers\\BaseTypeArgumentReducer',
      1 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ArrayArgumentReducer',
      2 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StdClassArgumentReducer',
      3 => 'Spatie\\Backtrace\\Arguments\\Reducers\\EnumArgumentReducer',
      4 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ClosureArgumentReducer',
      5 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeArgumentReducer',
      6 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeZoneArgumentReducer',
      7 => 'Spatie\\Backtrace\\Arguments\\Reducers\\SymphonyRequestArgumentReducer',
      8 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\ModelArgumentReducer',
      9 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\CollectionArgumentReducer',
      10 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StringableArgumentReducer',
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'laravolt' => 
  array (
    'avatar' => 
    array (
      'driver' => 'gd',
      'generator' => 'Laravolt\\Avatar\\Generator\\DefaultGenerator',
      'ascii' => false,
      'shape' => 'circle',
      'width' => 100,
      'height' => 100,
      'chars' => 2,
      'fontSize' => 48,
      'uppercase' => true,
      'rtl' => false,
      'fonts' => 
      array (
        0 => 'C:\\rstoresV1R\\rsmstores\\config\\laravolt/../fonts/OpenSans-Bold.ttf',
        1 => 'C:\\rstoresV1R\\rsmstores\\config\\laravolt/../fonts/rockwell.ttf',
      ),
      'foregrounds' => 
      array (
        0 => '#FFFFFF',
      ),
      'backgrounds' => 
      array (
        0 => '#f44336',
        1 => '#E91E63',
        2 => '#9C27B0',
        3 => '#673AB7',
        4 => '#3F51B5',
        5 => '#2196F3',
        6 => '#03A9F4',
        7 => '#00BCD4',
        8 => '#009688',
        9 => '#4CAF50',
        10 => '#8BC34A',
        11 => '#CDDC39',
        12 => '#FFC107',
        13 => '#FF9800',
        14 => '#FF5722',
      ),
      'border' => 
      array (
        'size' => 1,
        'color' => 'background',
        'radius' => 0,
      ),
      'theme' => 
      array (
        0 => 'colorful',
      ),
      'themes' => 
      array (
        'grayscale-light' => 
        array (
          'backgrounds' => 
          array (
            0 => '#edf2f7',
            1 => '#e2e8f0',
            2 => '#cbd5e0',
          ),
          'foregrounds' => 
          array (
            0 => '#a0aec0',
          ),
        ),
        'grayscale-dark' => 
        array (
          'backgrounds' => 
          array (
            0 => '#2d3748',
            1 => '#4a5568',
            2 => '#718096',
          ),
          'foregrounds' => 
          array (
            0 => '#e2e8f0',
          ),
        ),
        'colorful' => 
        array (
          'backgrounds' => 
          array (
            0 => '#f44336',
            1 => '#E91E63',
            2 => '#9C27B0',
            3 => '#673AB7',
            4 => '#3F51B5',
            5 => '#2196F3',
            6 => '#03A9F4',
            7 => '#00BCD4',
            8 => '#009688',
            9 => '#4CAF50',
            10 => '#8BC34A',
            11 => '#CDDC39',
            12 => '#FFC107',
            13 => '#FF9800',
            14 => '#FF5722',
          ),
          'foregrounds' => 
          array (
            0 => '#FFFFFF',
          ),
        ),
        'pastel' => 
        array (
          'backgrounds' => 
          array (
            0 => '#ef9a9a',
            1 => '#F48FB1',
            2 => '#CE93D8',
            3 => '#B39DDB',
            4 => '#9FA8DA',
            5 => '#90CAF9',
            6 => '#81D4FA',
            7 => '#80DEEA',
            8 => '#80CBC4',
            9 => '#A5D6A7',
            10 => '#E6EE9C',
            11 => '#FFAB91',
            12 => '#FFCCBC',
            13 => '#D7CCC8',
          ),
          'foregrounds' => 
          array (
            0 => '#FFF',
          ),
        ),
      ),
    ),
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => 'C:\\rstoresV1R\\rsmstores\\resources\\views/livewire',
    'layout' => 'components.layouts.app',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => false,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'pagination_theme' => 'bootstrap',
  ),
  'livewire-powergrid' => 
  array (
    'theme' => 'app\\View\\PowerGridThemes\\Tabler',
    'plugins' => 
    array (
      'flatpickr' => 
      array (
        'locales' => 
        array (
          'pt_BR' => 
          array (
            'locale' => 'pt',
            'dateFormat' => 'd/m/Y H:i',
            'enableTime' => true,
            'time_24hr' => true,
          ),
        ),
      ),
      'select' => 
      array (
        'default' => 'tom',
        'tom' => 
        array (
          'plugins' => 
          array (
            'clear_button' => 
            array (
              'title' => 'Remove all selected options',
            ),
          ),
        ),
        'slim' => 
        array (
          'settings' => 
          array (
            'alwaysOpen' => false,
          ),
        ),
      ),
    ),
    'filter' => 'inline',
    'persist_driver' => 'cookies',
    'cached_data' => true,
    'check_version' => true,
    'exportable' => 
    array (
      'default' => 'openspout_v4',
      'openspout_v4' => 
      array (
        'xlsx' => 'PowerComponents\\LivewirePowerGrid\\Components\\Exports\\OpenSpout\\v4\\ExportToXLS',
        'csv' => 'PowerComponents\\LivewirePowerGrid\\Components\\Exports\\OpenSpout\\v4\\ExportToCsv',
      ),
      'openspout_v3' => 
      array (
        'xlsx' => 'PowerComponents\\LivewirePowerGrid\\Components\\Exports\\OpenSpout\\v3\\ExportToXLS',
        'csv' => 'PowerComponents\\LivewirePowerGrid\\Components\\Exports\\OpenSpout\\v3\\ExportToCsv',
      ),
    ),
    'auto_discover_models_paths' => 
    array (
      0 => 'C:\\rstoresV1R\\rsmstores\\app\\Models',
    ),
  ),
  'livewire-tables' => 
  array (
    'theme' => 'bootstrap-5',
    'cache_assets' => false,
    'inject_core_assets_enabled' => true,
    'inject_third_party_assets_enabled' => true,
    'enable_blade_directives' => false,
    'use_json_translations' => false,
    'script_base_path' => '/rappasoft/laravel-livewire-tables',
    'dateFilter' => 
    array (
      'defaultConfig' => 
      array (
        'format' => 'Y-m-d',
        'pillFormat' => 'd M Y',
      ),
    ),
    'dateTimeFilter' => 
    array (
      'defaultConfig' => 
      array (
        'format' => 'Y-m-d\\TH:i',
        'pillFormat' => 'd M Y - H:i',
      ),
    ),
    'dateRange' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
        'allowInput' => true,
        'altFormat' => 'F j, Y',
        'ariaDateFormat' => 'F j, Y',
        'dateFormat' => 'Y-m-d',
        'earliestDate' => NULL,
        'latestDate' => NULL,
      ),
    ),
    'numberRange' => 
    array (
      'defaultOptions' => 
      array (
        'min' => 0,
        'max' => 100,
      ),
      'defaultConfig' => 
      array (
        'minRange' => 0,
        'maxRange' => 100,
        'suffix' => '',
      ),
    ),
    'selectFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'multiSelectFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'multiSelectDropdownFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'events' => 
    array (
      'enableUserForEvent' => true,
    ),
    'enable_blade_directives ' => false,
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\rstoresV1R\\rsmstores\\storage\\logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\rstoresV1R\\rsmstores\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\rstoresV1R\\rsmstores\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'sandbox.smtp.mailtrap.io',
        'port' => '2525',
        'encryption' => 'tls',
        'username' => '1199db92ff727c',
        'password' => 'fdde2027e228e1',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'supports@romanstockmanager.com',
      'name' => 'RomanStockManager',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\rstoresV1R\\rsmstores\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'openai' => 
  array (
    'api_key' => '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',
    'model' => 'gpt-3.5-turbo',
    'max_tokens' => '500',
    'temperature' => '0.7',
    'tier_limits' => 
    array (
      'basic' => '50000',
      'pro' => '200000',
      'enterprise' => '-1',
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'querydetector' => 
  array (
    'enabled' => true,
    'threshold' => 1,
    'except' => 
    array (
    ),
    'log_channel' => 'daily',
    'output' => 
    array (
      0 => 'BeyondCode\\QueryDetector\\Outputs\\Alert',
      1 => 'BeyondCode\\QueryDetector\\Outputs\\Log',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'app\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'app\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\rstoresV1R\\rsmstores\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'romanstockmanager_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'sweetalert' => 
  array (
    'theme' => 'default',
    'cdn' => NULL,
    'alwaysLoadJS' => false,
    'neverLoadJS' => false,
    'timer' => 5000,
    'width' => '32rem',
    'height_auto' => true,
    'padding' => '1.25rem',
    'background' => '#fff',
    'animation' => 
    array (
      'enable' => false,
    ),
    'animatecss' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
    'show_confirm_button' => true,
    'show_close_button' => false,
    'button_text' => 
    array (
      'confirm' => 'OK',
      'cancel' => 'Cancel',
    ),
    'toast_position' => 'top-end',
    'timer_progress_bar' => false,
    'middleware' => 
    array (
      'autoClose' => false,
      'toast_position' => 'top-end',
      'toast_close_button' => true,
      'timer' => 6000,
      'auto_display_error_messages' => true,
    ),
    'customClass' => 
    array (
      'container' => NULL,
      'popup' => NULL,
      'header' => NULL,
      'title' => NULL,
      'closeButton' => NULL,
      'icon' => NULL,
      'image' => NULL,
      'content' => NULL,
      'input' => NULL,
      'actions' => NULL,
      'confirmButton' => NULL,
      'cancelButton' => NULL,
      'footer' => NULL,
    ),
    'confirm_delete_confirm_button_text' => 'Yes, delete it!',
    'confirm_delete_confirm_button_color' => NULL,
    'confirm_delete_cancel_button_color' => '#d33',
    'confirm_delete_cancel_button_text' => 'Cancel',
    'confirm_delete_show_cancel_button' => true,
    'confirm_delete_show_close_button' => false,
    'confirm_delete_icon' => 'warning',
    'confirm_delete_show_loader_on_confirm' => true,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\rstoresV1R\\rsmstores\\resources\\views',
    ),
    'compiled' => 'C:\\rstoresV1R\\rsmstores\\storage\\framework\\views',
  ),
  'octane' => 
  array (
    'server' => 'roadrunner',
    'https' => false,
    'listeners' => 
    array (
      'Laravel\\Octane\\Events\\WorkerStarting' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesAreValid',
        1 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesCanBeMoved',
      ),
      'Laravel\\Octane\\Events\\RequestReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        22 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\FlushLocaleState',
        31 => 'Laravel\\Octane\\Listeners\\FlushQueuedCookies',
        32 => 'Laravel\\Octane\\Listeners\\FlushSessionState',
        33 => 'Laravel\\Octane\\Listeners\\FlushAuthenticationState',
        34 => 'Laravel\\Octane\\Listeners\\EnforceRequestScheme',
        35 => 'Laravel\\Octane\\Listeners\\EnsureRequestServerPortMatchesScheme',
        36 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToApplication',
        37 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToPaginator',
      ),
      'Laravel\\Octane\\Events\\RequestHandled' => 
      array (
      ),
      'Laravel\\Octane\\Events\\RequestTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TaskReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        22 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TaskTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TickReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        22 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TickTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Contracts\\OperationTerminated' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\FlushOnce',
        1 => 'Laravel\\Octane\\Listeners\\FlushTemporaryContainerInstances',
      ),
      'Laravel\\Octane\\Events\\WorkerErrorOccurred' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\ReportException',
        1 => 'Laravel\\Octane\\Listeners\\StopWorkerIfNecessary',
      ),
      'Laravel\\Octane\\Events\\WorkerStopping' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CloseMonologHandlers',
      ),
    ),
    'warm' => 
    array (
      0 => 'auth',
      1 => 'cache',
      2 => 'cache.store',
      3 => 'config',
      4 => 'cookie',
      5 => 'db',
      6 => 'db.factory',
      7 => 'db.transactions',
      8 => 'encrypter',
      9 => 'files',
      10 => 'hash',
      11 => 'log',
      12 => 'router',
      13 => 'routes',
      14 => 'session',
      15 => 'session.store',
      16 => 'translator',
      17 => 'url',
      18 => 'view',
    ),
    'flush' => 
    array (
    ),
    'tables' => 
    array (
      'example:1000' => 
      array (
        'name' => 'string:1000',
        'votes' => 'int',
      ),
    ),
    'cache' => 
    array (
      'rows' => 1000,
      'bytes' => 10000,
    ),
    'watch' => 
    array (
      0 => 'app',
      1 => 'bootstrap',
      2 => 'config/**/*.php',
      3 => 'database/**/*.php',
      4 => 'public/**/*.php',
      5 => 'resources/**/*.php',
      6 => 'routes',
      7 => 'composer.lock',
      8 => '.env',
    ),
    'garbage' => 50,
    'max_execution_time' => 30,
  ),
  'prologue' => 
  array (
    'alerts' => 
    array (
      'levels' => 
      array (
        0 => 'info',
        1 => 'warning',
        2 => 'error',
        3 => 'success',
      ),
      'session_key' => 'alert_messages',
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
  ),
);
