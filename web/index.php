<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

if (class_exists(Dotenv::class)) {
    // Load environment variables
    try {
        $dotenv = new Dotenv(__DIR__ . '/../');
        $dotenv->overload();
    } catch (\Exception $e) {
    }
}

\Sentry\init(['dsn' => getenv('SENTRY_DSN')]);

const WEB_DIRECTORY = __DIR__;

$oMobileDetect = new \Mobile_Detect();

$app = new Silex\Application();

if (getenv('APPLICATION_ENV') === 'development') {
    $app['debug'] = true;
} else {
    $app['debug'] = false;
}

$app->register(new Silex\Provider\SessionServiceProvider(), array(
    'session.storage.options' => array(
        'cookie_lifetime' => 14400, //4x60minutes
        'cookie_secure' => !$app['debug'],
        'cookie_httponly' => !$app['debug']
    )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'orm.proxies_dir' => __DIR__ . '/../var/doctrine/proxies'));

$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host' => getenv('SMTP_HOST'),
        'port' => getenv('SMTP_PORT'),
        'username' => getenv('SMTP_USERNAME'),
        'password' => getenv('SMTP_PASSWORD'),
        'encryption' => getenv('SMTP_ENCRYPTION'),
        'auth_mode' => null,
    )
));
$app['mailer'] = new \Swift_MailTransport;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/VillaFratelli/Views',
    'twig.options' => array(
        'cache' => (!$app['debug']) ? __DIR__ . '/../cache/twig' : false,
    )
));

$app['twig'] = $app->extend("twig", function (\Twig_Environment $twig, Silex\Application $app) {
    //$twig->addExtension(new Twig_Extensions_Extension_Text());
    $twig->addExtension(new \App\Services\MyTwigExtensions());

    return $twig;
});

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__ . '/../cache/',
));

$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'host' => getenv('DBB_DBHOST'),
    'dbname' => getenv('DBB_DBNAME'),
    'user' => getenv('DBB_DBUSER'),
    'password' => getenv('DBB_DBPASS'),
    'charset' => 'utf8');

if ($oMobileDetect->isMobile() === true) {
    $app->mount('/', new \MobileControllerProvider());
    $app->mount('/ajax', new \AjaxControllerProvider());
} else {
    $app->mount('/', new \HomeControllerProvider());
    $app->mount('/ajax', new \AjaxControllerProvider());
}

$app->run();
