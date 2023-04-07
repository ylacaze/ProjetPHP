<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
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


    public function ajouterEnDurAction(EntityManagerInterface $em)
    {
        $user_rita = new User();
        $user_rita
            ->setLogin("rita")
            ->setPassword("atir")
            ->setNom("Zrour")
            ->setPrenom("Rita")
            ->setRoles(["client"])
            ->setDateNaiss(05/05/1990);
        $em->persist($user_rita);

        $user_gilles = new User();
        $user_gilles
            ->setLogin("gilles")
            ->setPassword("sellig")
            ->setNom("Subrenat")
            ->setPrenom("Gilles")
            ->setRoles(["administrateur"])
            ->setDateNaiss(05/06/1983);
        $em->persist($user_gilles);

        $user_sadmin = new User();
        $user_sadmin
            ->setLogin("sadmin")
            ->setPassword("nimdas")
            ->setNom("Moi")
            ->setPrenom("Moi")
            ->setRoles(["super-administrateur"])
            ->setDateNaiss(05/06/1023);
        $em->persist($user_sadmin);

        $user_simon = new User();
        $user_simon
            ->setLogin("simon")
            ->setPassword("nomis")
            ->setNom("Simon")
            ->setPrenom("Simon")
            ->setRoles(["client"])
            ->setDateNaiss(05/06/1213);
        $em->persist($user_simon);


        $em->flush();
        dump($user_rita);

    }



}
