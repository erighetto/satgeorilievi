<?php
/**
 * Author: emanuel
 * Date: 06/09/16
 * Time: 16.24
 */

define ('ROOT',__DIR__);

require_once ROOT . '/vendor/autoload.php';

// init application
$app = new Silex\Application();

// set debug mode
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => ROOT . '/templates',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => '1.0', 'base_path' => '/web/assets/css'),
        'js' => array('version' => '1.0', 'base_path' => '/web/assets/js'),
        'images' => array('base_path' => '/web/assets/images'),
    ),
));

$app->register(new Satgeorilievi\Services\SanitizerServiceProvider());

$app->register(new Kilte\Silex\Pagination\PaginationServiceProvider, array('pagination.per_page' => 20));

$app->register(new DF\Silex\Provider\YamlConfigServiceProvider(ROOT . '/config/settings.yml'));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $app['config']['database']
));

$app->register(new DF\Silex\Provider\YamlConfigServiceProvider(ROOT . '/config/routing.yml'));

$app->register(new DF\Silex\Provider\YamlConfigServiceProvider(ROOT . '/config/services.yml'));

$app->mount('/servizi', new Satgeorilievi\Controllers\ServicesControllerProvider());

$app->mount('/news', new Satgeorilievi\Controllers\FeedsControllerProvider());

$app->mount('/', new Satgeorilievi\Controllers\PagesControllerProvider());

$app->run();