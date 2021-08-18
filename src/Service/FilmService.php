<?php
namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film;

class FilmService
{
    private $entityManager;
    function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
    function ajouter($pTitre, $pResume, $AnneeProduction, $pRealistaeur, $pListeActeur, $pImageUrl)
    {
        $film = film::create($pTitre, $pResume, $AnneeProduction, $pRealistaeur, $pListeActeur, $pImageUrl);
        $this->entityManager->persist($film);
        $this->entityManager->flush();
    }
    function supprimer()
    {

    }
    function recupererlist()
    {

    }
    function recupererFilm()
    {

    }
    function sauvegarder()
    {

    }

}