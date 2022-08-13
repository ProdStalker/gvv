<?php

namespace App\Controller;

use App\Entity\HeaderBanner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $headerBanner = (new HeaderBanner())->setTitle('Genève Ville Vivante')
            ->setImageUrl('https://geneve-ville-vivante.ch/img/banners/home.jpg');

        return $this->render('home/index.html.twig', [
            'headerBanner' => $headerBanner
        ]);
    }
}
