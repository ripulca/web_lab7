<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Form\PhotoType;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class MainController extends AbstractController
{
    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(PhotoRepository $photoRepository): Response
    {
        $photos=$photoRepository->getAllPhotos();
        $pages=$photos->getIterator()->count();
        return $this->render('index.html.twig', [
            'photos' => $photos,
            'pages' => $pages
        ]);
    }

    #[Route('/{page}', name: 'app_pages_index', methods: ['GET'])]
    public function indexPage(PhotoRepository $photoRepository, $page = 1): Response
    {
        $photos=$photoRepository->getAllPhotos($page);
        $pages = $photos->getIterator()->count();
        // $totalPhotos = $photos->count();
        // $iterator = $photos->getIterator();
        
        return $this->render('index.html.twig', [
            'photos' => $photoRepository->findAll(),
            'pages' => $pages
        ]);
    }
}