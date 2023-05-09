<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/blog/article')]
    public function number(): Response
    {
        $n = 1;
        $b = 1; 
        $c = $n + $b;
       $truc = array('unTRuc','deuxtruc');
   

        return $this->render('blog/article.html.twig', [
           'resultat' => $c,
           'thetruc' => $truc,
        ]);
    }
}