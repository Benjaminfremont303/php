<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController{
    #[Route('blog/', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html', [
            'controller_name' => 'BlogController',
        ]);
    }
    #[Route('/blog/publish', name: 'publish')]
    public function publish(): Response
    {
        return $this->render('blog/publish.html', [
           
        ]);
    }
    #[Route('/blog/tendance', name: 'tendance')]
    public function tendance(): Response
    {
        return $this->render('blog/tendance.html', [
           
        ]);
    }
    #[Route('/blog/monblog', name: 'monblog')]
    public function monblog(): Response
    {
        return $this->render('blog/monblog.html', [
           
        ]);
    }
    #[Route('/blog/creer', name: 'monblog')]
    public function creer(): Response
    {
        return $this->render('blog/creer.html', [
           
        ]);
    }
    #[Route('/blog/connexion', name: 'connexion')]
    public function connexion(): Response
    {
        return $this->render('blog/connexion.html', [
           
        ]);
    }
    #[Route('/blog/inscription', name: 'inscription')]
    public function inscription(): Response
    {
        return $this->render('blog/inscription.html', [
           
        ]);
    }
    
}

