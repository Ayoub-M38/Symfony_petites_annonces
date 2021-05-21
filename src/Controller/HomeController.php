<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use App\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AnnonceRepository $annonceRepository, BlogpostRepository $blogpostRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'annonces' => $annonceRepository->lastTree(),
            'blogposts' => $blogpostRepository->lastTree(),
        ]);
    }
}
