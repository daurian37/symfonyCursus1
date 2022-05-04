<?php

namespace App\Controller;

use App\Entity\Artist;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{

    #[Route('/artist', name: 'app_artist')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $artist = new Artist();
        $artist->setName('BALENVOKOLO');
        $artist->setLastName('Daurian');

        $entityManager->persist($artist);
        $entityManager->flush();


        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }
}
