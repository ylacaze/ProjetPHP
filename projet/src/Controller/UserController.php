<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//#[Route('/user', name: '_user')]
class UserController extends AbstractController
{
    #[Route('/', name: '_user')]
    public function index(): Response
    {
        return $this->render("User/view.html.twig");
    }


}
