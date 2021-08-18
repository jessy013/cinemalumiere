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