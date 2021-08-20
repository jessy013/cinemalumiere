<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Film;
use App\Entity\ICrud;

class FilmService implements ICrud
{
    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
   public function ajouter($pData)
    {
        // la fonction static permet d'éviter de devoir instantier le film avec le
        // constructeur par défaut
        $film = Film::creer($pData->getTitre(),
        $pData->getResume(),
        $pData->getAnneeProduction(),
        $pData->getRealisateur(),
        $pData->getListeActeur(),
        $pData->getImageUrl());
        $this->entityManager->persist($film);
        $this->entityManager->flush();
    }
    public function supprimer($pId)
    {

    }
    public function liste()
    {
       return $this->entityManager->getRepository(film::class)->findAll();
    }
    public function lire($pId)
    {
        return $this->entityManager->getRepository(film::class)->find($pId);
    }
    public function sauvegarder()
    {

    }

}