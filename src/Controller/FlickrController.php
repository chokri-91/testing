<?php

namespace App\Controller;

use App\Infrastructure\FlickrService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


#[Route('/flickr')]

class FlickrController extends AbstractController
{
    #[Route('/', name: 'flickr_list', methods:'get')]
    public function index(): Response
    {
        return $this->render('flickr/flickr.html.twig');
    }

    #[Route('/', name: 'flickr_search', methods:'post')]
    public function searchAction(Request $Request): Response
    { 
        $search = $Request->get('search');
        $flickrService = new FlickrService();
        $flickrPhotos = $flickrService->searchPhotos($search);

        return $this->render('flickr/flickr.html.twig', [
         'search'       => $search,
         'flickrPhotos' => $flickrPhotos
        ]);
    }
}
