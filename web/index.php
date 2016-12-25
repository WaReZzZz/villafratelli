<?php

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/VillaFratelli/Config/config.php';

use Silex\Application\SwiftmailerTrait;

$oMobileDetect = new \Mobile_Detect();
if ($oMobileDetect->isMobile() === true) {
    header('Location: http://mobile.villafratelli.com');
    exit;
}

$app = new Silex\Application();

if (null !== getenv('APPLICATION_ENV') && getenv('APPLICATION_ENV') === 'development') {
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
        'host' => 'auth.smtp.1and1.fr',
        'port' => '465',
        'username' => 'contact@textile.sexy',
        'password' => '-y8d+^QH"F)|',
        'encryption' => 'ssl',
        'auth_mode' => null,
    )
));
$app['mailer'] = new \Swift_MailTransport;

//$app['autoloader']->registerNamespace('TextileSexy\Controller', __DIR__.'/../lib');
//$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/VillaFratelli/Views',
    'twig.options' => array(
        'cache' => (!$app['debug']) ? __DIR__ . '/../cache/twig' : false,
    )
));
//$app['pages'] = include_once __DIR__ . '/../src/TextileSexy/Config/pages.global.php';
$app['twig'] = $app->extend("twig", function (\Twig_Environment $twig, Silex\Application $app) {
    //$twig->addExtension(new Twig_Extensions_Extension_Text());
    $twig->addExtension(new \VillaFratelli\Services\MyTwigExtensions());

    return $twig;
});

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__ . '/../cache/',
));

$app->error(function (\Exception $e, Symfony\Component\HttpFoundation\Request $request, $code) use($app) {
    $message = \Swift_Message::newInstance('Error on Textile.sexy', $request . 'Exception : ' . $e)
            ->setFrom('contact@textile.sexy')
            ->setTo(array('yaniv.afriat@gmail.com'));
    $app['mailer']->send($message);
    echo $e;
});
$app->mount('/', new \VillaFratelli\Controllers\HomeControllerProvider());
$app->mount('/ajax', new \VillaFratelli\Controllers\AjaxControllerProvider());
//$app->mount('/mobile', new \VillaFratelli\Controllers\MobileControllerProvider());

$app->run();
