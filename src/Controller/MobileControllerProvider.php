<?php

namespace App\Controller;

use App\Kernel;
use Doctrine\ORM\EntityManagerInterface;
use MobileDetectBundle\DeviceDetector\MobileDetectorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class MobileControllerProvider extends AbstractController
{
    private $connection;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->connection = $entityManager->getConnection();
    }

    #[Route('/download/{idimage}', name: 'mobile_download', methods: ['GET'])]
    public function download(int $idimage, Kernel $kernel, Filesystem $filesystem)
    {
        $images = $this->getImages(array("idImages=$idimage"));

        if ($images) {
            foreach ($images as $value) {
                $imageFile = $kernel->getPublicDir() . '/' . $value['dossier'] . strtoupper($value['nom']);
                if (is_file($imageFile)) {
                    $response = new BinaryFileResponse($imageFile);
                    $response->trustXSendfileTypeHeader();
                    $response->setContentDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT, $value['nom'],
                        iconv('UTF-8', 'ASCII//TRANSLIT', $value['nom'])
                    );

                    return $response;
                }
            }
        }
        return $this->render('mobile/contacts.twig', ['page' => 'contacts']);
    }

    private function getImages($where = null, $or = null, $else = null)
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
        return $this->connection->fetchAllAssociative($sql);
    }

}
