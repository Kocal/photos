<?php

namespace App\Controller\Me;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PicturesController extends AbstractController
{
    #[Route('/i/pictures', name:'my_pictures')]
    public function __invoke() {
        return $this->render('me/pictures.html.twig');
    }
}