<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AjaxControllerProvider extends AbstractController
{
    private $connection;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->connection = $entityManager->getConnection();
    }

    #[Route('/ajax/validateCookie/', name: 'validate_cookie')]
    public function validateCookie(SessionInterface $session)
    {
        if ($session->get('cookie') !== null) {
            return $this->json(array('cookie' => true), 201);
        }
        $session->set('cookie', true);
        return $this->json(array('cookie' => true), 201);
    }

    #[Route('/ajax/isCookieValidated/', name: 'is_cookie_validated')]
    public function isCookieValidated(SessionInterface $session)
    {
        if ($session->get('cookie') !== null) {
            return $this->json(array('cookie' => true), 201);
        }
        return $this->json(array('cookie' => false), 201);
    }

    #[Route('/ajax/addNewsletter/', name: 'add_newsletter')]
    public function addNewsletter(Request $request)
    {
        if ($request->isMethod('POST')) {
            $post = array(
                'email' => $request->request->get('email'),
            );
            $this->connection->insert('newsletter', $post);
            return $this->json(array('success' => true), 201);
        }

        // display the form
        return $this->json(array('success' => false), 201);
    }
}
