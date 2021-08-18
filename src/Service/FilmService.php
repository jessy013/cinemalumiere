<?php
namespace App\Service;

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
       return $this->entityManager->getRepository(film::class)->findAll();
    }
    function LireFilm($pId)
    {
        return $this->entityManager->getRepository(film::class)->find($pId);
    }
    function sauvegarder()
    {

    }

}