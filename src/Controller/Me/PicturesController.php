<?php

namespace App\Controller\Me;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PicturesController extends AbstractController
{
    #[Route('/i/pictures', name:'my_pictures')]
    public function __invoke(): Response
    {
        return $this->render('me/pictures.html.twig');
    }
}