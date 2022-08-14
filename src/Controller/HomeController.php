<?php

namespace App\Controller;

use App\Entity\HeaderBanner;
use App\Repository\HeaderBannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HeaderBannerRepository $headerBannerRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'headerBanner' => $headerBannerRepository->findOneBy([
                'slug' => 'gvv'
            ])
        ]);
    }
}
