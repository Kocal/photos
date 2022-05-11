<?php

namespace App\Controller\Me;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumsController extends AbstractController
{
    #[Route('/i/albums', name:'my_albums')]
    public function __invoke(): Response
    {
        return $this->render('me/albums.html.twig');
    }
}