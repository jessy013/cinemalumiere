<?php
namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class FilmService
{
    private $entityManager;
    function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }
    function ajouter($film)
    {

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