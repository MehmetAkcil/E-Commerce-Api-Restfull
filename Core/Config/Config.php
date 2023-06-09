<?php

namespace Core\Config;

class Config
{

    public static string $base_url = 'http://ecommerce/';
    const SMTP_HOST = 'smtp.example.com';
    const SMTP_USERNAME = 'name@example.com';
    const SMTP_PASSWORD = '';
    const SMTP_PORT = 465;
    const SMTP_MAILER = 'Mailer';
    const CSRF_TOKEN_NAME = 'csrftoken';
    const CSRF_TOKEN_NAME_SESSION = 'csrftoken';
    const RECAPTCHA_SECRET_KEY = '6LdJTCMlAAAAAKhYb8bs7LmOoJqToHPzIdh000000';
    const RECAPTCHA_SITE_KEY = '6LdJTCMlAAAAAIWR-u5IgtLRkIy07ctNez000000';

    const RATE_LIMITER_STATUS = FALSE;
    const RATE_LIMITER_EXPIRATION = 20; // 20 second
    const RATE_LIMITER_MAX_REQUESTS_PER_MINUTE = 10; // 20 second

    const IP_RESTRICTOR_STATUS = FALSE;
    const IP_RESTRICTOR_ALLOWED = ['127.0.0.1', '192.168.1.1'];


    const JWT_SECRET_TOKEN = 'hajstu6ts7n459j0qhgdrqnur8';


    public static bool $origin = TRUE;
    public static array $databases = [
        'default' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'ecommerce'
        ]
    ];

    public static function base_url($url = ''): string
    {
        $baseurl = Config::$base_url;
        if($url === '/'){
            return $baseurl;
        }

        $end = substr($baseurl, -1, 1);
        if($end != '/'){
            $baseurl .= '/';
        }

        $end = substr($url, 0, 1);

        if($end == '/'){
            $url = ltrim($url, '/');
        }

        return $baseurl . $url;
    }

    public static function current_url(): string
    {

        return self::base_url(Header::getServer('REQUEST_URI'));
    }

    public static function path_rate_limiter(): string
    {
        return Header::getServer('DOCUMENT_ROOT') . '/Temp/RateLimiter/';
    }

    public static function path_cache(): string
    {
        return Header::getServer('DOCUMENT_ROOT') . '/Temp/Cache/';
    }

    public static function path_sessions(): string
    {
        return Header::getServer('DOCUMENT_ROOT') . '/Temp/Sessions/';
    }

    public static function path_uploads(): string
    {
        return Header::getServer('DOCUMENT_ROOT') . '/Temp/Uploads/';
    }

    public static function path_views($path = ''): string
    {
        return Header::getServer('DOCUMENT_ROOT') . '/Core/Views/' . $path;
    }
}