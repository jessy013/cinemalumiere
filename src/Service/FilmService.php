<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film;
use App\Entity\ICrud;

class FilmService implements ICrud
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
    function supprimer($pId)
    {

    }
    function liste()
    {
       return $this->entityManager->getRepository(film::class)->findAll();
    }
    function lire($pId)
    {
        return $this->entityManager->getRepository(film::class)->find($pId);
    }
    function sauvegarder()
    {

    }

}