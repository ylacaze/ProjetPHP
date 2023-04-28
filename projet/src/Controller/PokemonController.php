<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{

    #[Route('/pokemons', name: 'list_pokemon')]
    public function index(EntityManagerInterface $em): Response
    {

        $PokemonRepository = $em->getRepository(Pokemon::class);
        $pokemons = $PokemonRepository->findAll();
        $args = array(
            'Pokemons' => $pokemons,
        );

        return $this->render('Pokemon/Pokemons.html.twig', $args);
    }

    #[Route('/pokemon/{id}', name: 'one_pokemon',requirements: ['id' => '[1-9]\d*'],)]
    public function detail(EntityManagerInterface $em,int $id): Response{
        $PokemonRepository = $em->getRepository(Pokemon::class);
        $poke = $PokemonRepository->find($id);

        $admin = true;

        $args = array(
            'poke' => $poke,
            'admin' => $admin,
        );

        return $this->render('Pokemon/Pokemon.html.twig', $args);
    }

    public function add(EntityManagerInterface $em){
        $pikachu = new Pokemon();
        $pikachu
            ->setLibelle("pikachu")
            ->setPrix(25)
            ->setQteStock(60);
        $em->persist($pikachu);

        $salameche = new Pokemon();
        $salameche
            ->setLibelle("salameche")
            ->setPrix(35)
            ->setQteStock(40);
        $em->persist($salameche);

        $carapuce = new Pokemon();
        $carapuce
            ->setLibelle("carapuce")
            ->setPrix(35)
            ->setQteStock(40);
        $em->persist($carapuce);

        $bulbizare = new Pokemon();
        $bulbizare
            ->setLibelle("bulbizare")
            ->setPrix(35)
            ->setQteStock(40);
        $em->persist($bulbizare);

        $mewtwo = new Pokemon();
        $mewtwo
            ->setLibelle("mewtwo")
            ->setPrix(3000)
            ->setQteStock(1);
        $em->persist($mewtwo);

        $em->flush();

    }
}
