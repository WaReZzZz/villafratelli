<?php

namespace VillaFratelli\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\File\Stream;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class HomeControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

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

        $controllers->get('/download/{idimage}', function ($idimage) use ($app) {
            $images = $this->getImages($app, array("idImages=$idimage"));

            if ($images) {
                foreach ($images as $value) {
                    $imageFile = file_get_contents('http://res.cloudinary.com/afriat/image/upload/villafratelli/' . $value['dossier'] . strtoupper($value['nom']));

                    $tmpFilePath = WEB_DIRECTORY . '/../cache/files/' . $value['nom'];
                    $file = fopen($tmpFilePath, "w+");
                    fputs($file, $imageFile);
                    if (is_file($tmpFilePath)) {
                        $response = new BinaryFileResponse($tmpFilePath);
                        $response->trustXSendfileTypeHeader();
                        $response->setContentDisposition(
                            ResponseHeaderBag::DISPOSITION_ATTACHMENT, $value['nom'],
                            iconv('UTF-8', 'ASCII//TRANSLIT', $value['nom'])
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
