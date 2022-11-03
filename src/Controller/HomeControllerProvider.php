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

class HomeControllerProvider extends AbstractController
{
    private $connection;
    private $mobileDectector;

    public function __construct(EntityManagerInterface $entityManager, MobileDetectorInterface $mobileDetector)
    {
        $this->connection = $entityManager->getConnection();
        $this->mobileDectector = $mobileDetector;
    }

    #[Route('/', name: 'home', methods: ['GET'])]
    public function home()
    {
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('home.twig');
        }
        return $this->render('mobile/home.twig');
    }

    #[Route('/description/', name: 'description', methods: ['GET'])]
    public function description()
    {
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('description.twig');
        }
        return $this->render('mobile/description.twig');
    }

    #[Route('/rooms/', name: 'rooms', methods: ['GET'])]
    public function rooms()
    {
        $images = $this->getImages(where: ["dossier = 'images/big/rooms/'"]);
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('images.twig', ['aImages' => $images, 'page' => 'rooms']);
        }
        return $this->render('mobile/images.twig', ['aImages' => $images, 'page' => 'rooms']);
    }

    #[Route('/spa/', name: 'spa', methods: ['GET'])]
    public function spa()
    {
        $images = $this->getImages(["dossier = 'images/big/spa/'"]);
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('images.twig', ['aImages' => $images, 'page' => 'spa']);
        }
        return $this->render('mobile/images.twig', ['aImages' => $images, 'page' => 'spa']);
    }

    #[Route('/pool/', name: 'pool', methods: ['GET'], priority: 1)]
    public function pool()
    {
        $images = $this->getImages(["dossier = 'images/big/piscine/'"]);
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('images.twig', ['aImages' => $images, 'page' => 'piscine']);
        }
        return $this->render('mobile/images.twig', ['aImages' => $images, 'page' => 'piscine']);
    }

    #[Route('/night/', name: 'night', methods: ['GET'])]
    public function night(EntityManagerInterface $entityManager)
    {
        $images = $this->getImages(["dossier = 'images/big/nuit/'"]);
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('images.twig', ['aImages' => $images, 'page' => 'nuit']);
        }
        return $this->render('mobile/images.twig', ['aImages' => $images, 'page' => 'nuit']);
    }

    #[Route('/contacts/', name: 'contacts', methods: ['GET'])]
    public function contacts()
    {
        if (!$this->mobileDectector->isMobile()) {
            return $this->render('contacts.twig', ['page' => 'contacts']);
        }
        return $this->render('mobile/contacts.twig', ['page' => 'contacts']);
    }

    #[Route('/download/{idimage}', name: 'download', methods: ['GET'])]
    public function download(int $idimage, Kernel $kernel, Filesystem $filesystem)
    {
        $images = $this->getImages(["idImages=$idimage"]);

        if ($images) {
            foreach ($images as $value) {
                $imageFile = file_get_contents(
                    'http://res.cloudinary.com/afriat/image/upload/villafratelli/' . $value['dossier'] . strtoupper(
                        $value['nom']
                    )
                );

                $filesystem->mkdir($kernel->getProjectDir() . '/var/cache/files/');
                $tmpFilePath = $kernel->getProjectDir() . '/var/cache/files/' . $value['nom'];
                $file = fopen($tmpFilePath, "w+");
                fputs($file, $imageFile);
                if (is_file($tmpFilePath)) {
                    $response = new BinaryFileResponse($tmpFilePath);
                    $response->trustXSendfileTypeHeader();
                    $response->setContentDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        $value['nom'],
                        iconv('UTF-8', 'ASCII//TRANSLIT', $value['nom'])
                    );

                    return $response;
                }
            }
        }
        return 'Error';
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
