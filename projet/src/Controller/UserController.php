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
    #[Route('/', name: '_connexion')]
    public function index(): Response
    {
        return $this->render("Site/connexion.html.twig");
    }

    #[Route('/accueil', name: '_accueil')]
    public function indexx(): Response
    {
        return $this->render("Site/accueil.html.twig");
    }

    #[Route('/ajouterendur', name : '_ajouterendur')]
    public function ajouterendurAction(EntityManagerInterface $em) : void
    {
        $user_rita = new User();
        $user_rita
            ->setLogin("rita")
            ->setPassword("atir")
            ->setNom("Zrour")
            ->setPrenom("Rita")
            ->setRoles(["client"])
            ->setDateNaiss(new \DateTime('1990-01-01'));
        $em->persist($user_rita);


        $user_gilles = new User();
        $user_gilles
            ->setLogin("gilles")
            ->setPassword("sellig")
            ->setNom("Subrenat")
            ->setPrenom("Gilles")
            ->setRoles(["administrateur"])
            ->setDateNaiss(new \DateTime("05/06/1983"));
        $em->persist($user_gilles);

        $user_sadmin = new User();
        $user_sadmin
            ->setLogin("sadmin")
            ->setPassword("nimdas")
            ->setNom("Moi")
            ->setPrenom("Moi")
            ->setRoles(["super-administrateur"])
            ->setDateNaiss(new \DateTime("05/06/1023"));
        $em->persist($user_sadmin);

        $user_simon = new User();
        $user_simon
            ->setLogin("simon")
            ->setPassword("nomis")
            ->setNom("Simon")
            ->setPrenom("Simon")
            ->setRoles(["client"])
            ->setDateNaiss(new \DateTime("05/06/1213"));
        $em->persist($user_simon);


        $em->flush();

    }

    #[Route ('/deleteUsers', name :"_delete_all_users" )]
    public function deleteAllUsersAction(EntityManagerInterface $em) : void
    {
        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();
        foreach ($users as $user)
        {
            $em->remove($user);
        }

        //$em->remove($user);
        $em->flush();

    }

    #[Route ('/modif', name : "_modif_user")]
    public function modifAction(EntityManagerInterface $em) : void
    {
        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();
        $id = 0;
        foreach ($users as $user){


        }
    }



}
