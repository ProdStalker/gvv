<?php

namespace App\Controller;

use App\Repository\HeaderBannerRepository;
use App\Service\Managers\HeaderBannerManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HeaderBannerManager $headerBannerManager): Response
    {
        return $this->render('home/index.html.twig', [
            'headerBanner' => $headerBannerManager->findBySlug('gvv')
        ]);
    }
}
