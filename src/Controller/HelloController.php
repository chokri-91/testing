<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello/{firstName}/{age}', name: 'hello')]

    public function index(string $firstName = 'Chokri',int $age = 20): Response
    {
        if($age < 18)
        {
            return $this->redirect('https://www.disney.fr');
        }        
        $firstName = ucfirst($firstName);

        return new Response("<p>Bonjour $firstName, vous avez $age ans</p>");
    }
}
