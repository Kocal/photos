<?php

namespace App\Controller\Me;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlbumsController extends AbstractController
{
    #[Route('/i/albums', name:'my_albums')]
    public function __invoke() {
        return $this->render('me/albums.html.twig');
    }
}