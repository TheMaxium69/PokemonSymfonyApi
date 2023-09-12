<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{

    #[Route('/pokemon', name: 'pokemon_all')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pokemons = $entityManager->getRepository(Pokemon::class)->findAll();

        return $this->json($pokemons);
    }

    #[Route('/pokemon/{id}', name: 'pokemon_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $pokemon = $entityManager->getRepository(Pokemon::class)->find($id);

        return $this->json($pokemon);
    }
}
