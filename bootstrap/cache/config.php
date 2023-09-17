<?php return array (
  'app' => 
  array (
    'name' => 'Tikbazar',
    'env' => 'local',
    'debug' => true,
    'url' => 'https://kash5astore.com',
    'timezone' => 'Asia/Tehran',
    'locale' => 'ar',
    'fallback_locale' => 'en',
    'key' => 'base64:sxTubHgk3VLQv3IdWD1Xqu8fF8M4HzHtDQ5AIt3+2QQ=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
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
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Melipayamak\\Laravel\\ServiceProvider',
      23 => 'Laravel\\Tinker\\TinkerServiceProvider',
      24 => 'App\\Providers\\AppServiceProvider',
      25 => 'App\\Providers\\AuthServiceProvider',
      26 => 'App\\Providers\\EventServiceProvider',
      27 => 'App\\Providers\\RouteServiceProvider',
      28 => 'Spatie\\Permission\\PermissionServiceProvider',
      29 => 'Intervention\\Image\\ImageServiceProvider',
      30 => 'Barryvdh\\DomPDF\\ServiceProvider',
      31 => 'Ixudra\\Curl\\CurlServiceProvider',
      32 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Common' => 'App\\Http\\Controllers\\Common',
      'Carbon' => 'Carbon\\Carbon',
      'Curl' => 'Ixudra\\Curl\\Facades\\Curl',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Helpers' => 'App\\Libraries\\Helpers',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Gapi' => 'Illuminate\\Support\\Facades\\View',
      'Melipayamak' => 'Melipayamak\\Laravel\\Facade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'admin',
      'passwords' => 'customers',
    ),
    'guards' => 
    array (
      'webs' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => true,
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'member' => 
      array (
        'driver' => 'session',
        'provider' => 'members',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Admin',
      ),
      'members' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Member',
      ),
    ),
    'passwords' => 
    array (
      'clients' => 
      array (
        'provider' => 'clients',
        'table' => 'password_resets',
        'expire' => 60,
      ),
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
        ),
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
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'E:\\shayegan_project\\shop\\storage\\framework/cache/data',
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
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'shayegan',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'shayegan',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'shayegan',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'shayegan',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => 
    array (
      'font_dir' => 'E:\\shayegan_project\\shop\\storage\\fonts/',
      'font_cache' => 'E:\\shayegan_project\\shop\\storage\\fonts/',
      'temp_dir' => 'C:\\Users\\ALI\\AppData\\Local\\Temp',
      'chroot' => 'E:\\shayegan_project\\shop',
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => false,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\Users\\ALI\\AppData\\Local\\Temp',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\shayegan_project\\shop\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\shayegan_project\\shop\\storage\\app/public',
        'url' => 'https://kash5astore.com/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
      ),
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'logging' => 
  array (
    'default' => 'stack',
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
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
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
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'loggingx' => 
  array (
    'default' => 'stack',
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
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
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
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'E:\\shayegan_project\\shop\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'mailgun',
    'host' => 'smtp.mailgun.org',
    'port' => '587',
    'from' => 
    array (
      'address' => 'noreply@kash5astore.com',
      'name' => 'kash5astore.com',
    ),
    'encryption' => 'tls',
    'username' => 'gulfweb@support.gulfclick.net',
    'password' => 'e7dc1a85fa1551b308f96216efce39d6-53c13666-33e54ac7',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'E:\\shayegan_project\\shop\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'melipayamak' => 
  array (
    'username' => '9178069467',
    'password' => '79862ec',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
  ),
  'paypal' => 
  array (
    'client_id' => 'AfrC4srXeUtepHHMUIwlQPifUqsCzj5fSlLPdHZKQhYpLn_-f5_GN1gVBACgnxypdeuLWz1GV4_H9xGd',
    'secret' => 'EHIoFu0pefTChCa3cOST-_ubH68EbRxVoXjNLAFLrPHV0niq7zA76P2cSsK_CNlv_J8ZHL7RZZ5f8lJv',
    'settings' => 
    array (
      'mode' => 'sandbox',
      'http.ConnectionTimeOut' => 1000,
      'log.LogEnabled' => true,
      'log.FileName' => 'E:\\shayegan_project\\shop\\storage/logs/paypal.log',
      'log.LogLevel' => 'FINE',
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
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
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
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => 'support.gulfclick.net',
      'secret' => 'key-b8863bc1400acfc64d5f1e90cfb9fbd0',
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
    'knet_test' => 
    array (
      'TRANSPORTAL_ID' => '',
      'TRANSPORTAL_PASS' => '',
      'CURRENCY_CODE' => '414',
      'LANGID' => 'USA',
      'ACTION' => '1',
      'TERM_RESOURCE_KEY' => '',
      'PAYMENT_REQUEST_URL' => 'https://www.kpaytest.com.kw/kpg/PaymentHTTP.htm?param=paymentInit&trandata=',
    ),
    'knet_live' => 
    array (
      'TRANSPORTAL_ID' => '',
      'TRANSPORTAL_PASS' => '',
      'CURRENCY_CODE' => '414',
      'LANGID' => 'USA',
      'ACTION' => '1',
      'TERM_RESOURCE_KEY' => '',
      'PAYMENT_REQUEST_URL' => 'https://www.kpay.com.kw/kpg/PaymentHTTP.htm?param=paymentInit&trandata=',
    ),
    'tahseel_test' => 
    array (
      'TAH_UID' => 'tahseeeltest12',
      'TAH_PWD' => 'tahseeeltest12',
      'TAH_SECRET' => 'tahseeeltest12',
      'TAH_ORDER_URL' => 'https://devorder.tahseeel.com/api/?p=order',
      'TAH_INFO_URL' => 'https://devorder.tahseeel.com/api/?p=order_info',
      'TAH_RETURN_URL' => '192.168.1.100:8000',
    ),
    'tahseel_live' => 
    array (
      'TAH_UID' => 'tahseeeltest12',
      'TAH_PWD' => 'tahseeeltest12',
      'TAH_SECRET' => 'tahseeeltest12',
      'TAH_ORDER_URL' => 'https://devorder.tahseeel.com/api/?p=order',
      'TAH_INFO_URL' => 'https://devorder.tahseeel.com/api/?p=order_info',
      'TAH_RETURN_URL' => '192.168.1.100:8000',
    ),
    'myfatoorah_test' => 
    array (
      'MF_CURRENCY' => 'KWD',
      'MF_CURRENCY_ID' => '1',
      'MF_TOKEN_API_URL' => 'https://apidemo.myfatoorah.com/Token',
      'MF_CALLBACK' => 'https://apidemo.myfatoorah.com/ApiInvoices/Transaction/',
      'MF_INVOICE_URL' => 'https://apidemo.myfatoorah.com/ApiInvoices/CreateInvoiceIso',
      'MF_USERNAME' => 'demoApiuser@myfatoorah.com',
      'MF_PASSWORD' => 'Mf@12345678',
    ),
    'myfatoorah_live' => 
    array (
      'MF_CURRENCY' => 'KWD',
      'MF_CURRENCY_ID' => '1',
      'MF_TOKEN_API_URL' => 'https://apidemo.myfatoorah.com/Token',
      'MF_CALLBACK' => 'https://apidemo.myfatoorah.com/ApiInvoices/Transaction/',
      'MF_INVOICE_URL' => 'https://apidemo.myfatoorah.com/ApiInvoices/CreateInvoiceIso',
      'MF_USERNAME' => 'demoApiuser@myfatoorah.com',
      'MF_PASSWORD' => 'Mf@12345678',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 43200,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'E:\\shayegan_project\\shop\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
  ),
  'tinker' => 
  array (
    'commands' => 
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
      0 => 'E:\\shayegan_project\\shop\\resources\\views',
    ),
    'compiled' => 'E:\\shayegan_project\\shop\\storage\\framework\\views',
  ),
  'flasher' => 
  array (
    'default' => 'flasher',
    'root_script' => 
    array (
      'cdn' => 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.js',
      'local' => '/vendor/flasher/flasher.min.js',
    ),
    'scripts' => 
    array (
    ),
    'styles' => 
    array (
      'cdn' => 
      array (
        0 => 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.css',
      ),
      'local' => 
      array (
        0 => '/vendor/flasher/flasher.min.css',
      ),
    ),
    'options' => 
    array (
    ),
    'use_cdn' => true,
    'auto_translate' => true,
    'auto_render' => true,
    'flash_bag' => 
    array (
      'enabled' => true,
      'mapping' => 
      array (
        'success' => 
        array (
          0 => 'success',
        ),
        'error' => 
        array (
          0 => 'error',
          1 => 'danger',
        ),
        'warning' => 
        array (
          0 => 'warning',
          1 => 'alarm',
        ),
        'info' => 
        array (
          0 => 'info',
          1 => 'notice',
          2 => 'alert',
        ),
      ),
    ),
    'filter_criteria' => 
    array (
    ),
    'presets' => 
    array (
      'created' => 
      array (
        'type' => 'success',
        'message' => 'The resource was created',
      ),
      'updated' => 
      array (
        'type' => 'success',
        'message' => 'The resource was updated',
      ),
      'saved' => 
      array (
        'type' => 'success',
        'message' => 'The resource was saved',
      ),
      'deleted' => 
      array (
        'type' => 'success',
        'message' => 'The resource was deleted',
      ),
    ),
  ),
  'flasher_toastr' => 
  array (
    'scripts' => 
    array (
      'cdn' => 
      array (
        0 => 'https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js',
        1 => 'https://cdn.jsdelivr.net/npm/@flasher/flasher-toastr@1.2.4/dist/flasher-toastr.min.js',
      ),
      'local' => 
      array (
        0 => '/vendor/flasher/jquery.min.js',
        1 => '/vendor/flasher/flasher-toastr.min.js',
      ),
    ),
    'styles' => 
    array (
    ),
    'options' => 
    array (
    ),
  ),
  'toastr' => 
  array (
    'options' => 
    array (
    ),
  ),
);
