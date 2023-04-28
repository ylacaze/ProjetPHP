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

    #[Route('/add/Poke', name: 'add_pokemon')]
    public function add(EntityManagerInterface $em): Response{
        //TODO

    }
}
