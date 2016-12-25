<?php

namespace VillaFratelli\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class HomeControllerProvider implements ControllerProviderInterface
{

    protected $conf;

    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];
        $globalConf = include __DIR__ . '/../Config/config.php';
        $envConf = array();
        if (file_exists(__DIR__ . '/../Config/' . getenv('APPLICATION_ENV') . '.php')) {
            $envConf = include_once __DIR__ . '/../Config/' . getenv('APPLICATION_ENV') . '.php';
        }
        $this->conf = array_merge($globalConf, $envConf);
        $controllers->before(function () use ($app) {
            $app['db.options'] = array(
                'driver' => 'pdo_mysql',
                'host' => $this->conf['BDD']['DBHOST'],
                'dbname' => $this->conf['BDD']['DBNAME'],
                'user' => $this->conf['BDD']['DBUSER'],
                'password' => $this->conf['BDD']['DBPASS'],
                'charset' => 'utf8');
        });

        $controllers->get('/', function () use ($app) {
            return $app['twig']->render('home.twig');
        })->bind('homepage');

        $controllers->get('/description/', function () use ($app) {
            return $app['twig']->render('description.twig');
        })->bind('description');

        $controllers->get('/rooms/', function () use ($app) {
            $images = $this->getImages($app, array("dossier = 'images/big/rooms/'"));
            return $app['twig']->render('images.twig', ['aImages' => $images, 'page' => 'rooms']);
        })->bind('rooms');

        $controllers->get('/spa/', function () use ($app) {
            $images = $this->getImages($app, array("dossier = 'images/big/spa/'"));
            return $app['twig']->render('images.twig', ['aImages' => $images, 'page' => 'spa']);
        })->bind('spa');

        $controllers->get('/pool/', function () use ($app) {
            $images = $this->getImages($app, array("dossier = 'images/big/piscine/'"));
            return $app['twig']->render('images.twig', ['aImages' => $images, 'page' => 'piscine']);
        })->bind('pool');

        $controllers->get('/night/', function () use ($app) {
            $images = $this->getImages($app, array("dossier = 'images/big/nuit/'"));
            return $app['twig']->render('images.twig', ['aImages' => $images, 'page' => 'nuit']);
        })->bind('night');

        $controllers->get('/contacts/', function () use ($app) {
            return $app['twig']->render('contacts.twig', ['page' => 'contacts']);
        })->bind('contacts');

        $controllers->get('/download/{idimage}', function($idimage) use ($app) {
            $images = $this->getImages($app, array("idImages=$idimage"));

            if ($images) {
                foreach ($images as $value) {
                    $imageFile = WEB_DIRECTORY . '/' . $value['dossier'] . $value['nom'];
                    if (is_file($imageFile)) {
                        $response = new BinaryFileResponse($imageFile);
                        $response->trustXSendfileTypeHeader();
                        $response->setContentDisposition(
                                ResponseHeaderBag::DISPOSITION_ATTACHMENT, $value['nom'], iconv('UTF-8', 'ASCII//TRANSLIT', $value['nom'])
                        );

                        return $response;
                    }
                }
            }
            return 'Error';
        })->value('idimage', '1');

        //mardi mercredi samedi lundi jeudi vendredi
        return $controllers;
    }

    private function getImages($app, $where = null, $or = null, $else = null)
    {
        $sqlWhere = '';
        if (is_array($where)) {
            $sqlWhere = " where (" . implode(' and ', $where) . ")";
        }
        $sqlOr = '';
        if (is_array($or)) {
            $sqlOr = " OR (" . implode(' and ', $or) . ")";
        }
        $sqlElse = '';
        if (is_array($else)) {
            $sqlElse = " OR (" . implode(' and ', $else) . ")";
        }
        $sql = "SELECT * FROM images $sqlWhere $sqlOr $sqlElse ";
        $result = $app['db']->fetchAll($sql);
        return $result;
    }

}
