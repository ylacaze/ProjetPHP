<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'panier_index')]
    public function index(): JsonResponse
    {
        return $this->render('Site/panier.html.twig', []);
    }

    #Route('/panier/add/{id}', name='panier_add'
    public function add($id, Request $request) {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])){
            $panier[$id]++;
        }else $panier[$id] = 1;

        $session->set('panier', $panier);
        dd($session->get('panier'));
    }
}
