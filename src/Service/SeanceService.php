<?php
namespace App\Service;

use App\Entity\ICrud;
use App\Entity\Seance;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class SeanceService implements ICrud
{
    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager =$em;
    }
    public static function create($pDateDebut,$pDateFin)
    {
        $Seance = new Seance();
        $Seance->dateDebut = $pDateDebut;
        $Seance->dateFin = $pDateFin;
        return $Seance;
    }
    public function ajouter($pDateDebut,$pDateFin)
    {
        $seance = Seance::create($pDateDebut,$pDateFin);
        $this->entityManager->persist($seance);
        $this->entityManager->flush();
    }
    public function liste()
    {
         return $this->entityManager->getRepository(Seance::class)->findAll();
    }
    public function lire($pId)
    {
        return $this->entityManager->getRepository(Seance::class)->find($pId);
    }
    public function sauvegarder()
    {
        
    }
    public function supprimer($pId)
    {
        
    }
}