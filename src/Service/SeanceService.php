<?php
namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ICrud;
use App\Entity\Seance;


class SeanceService implements ICrud
{
    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager =$em;
    }
    public static function creer($pDateDebut,$pDateFin)
    {
        $Seance = new Seance();
        $Seance->dateDebut = $pDateDebut;
        $Seance->dateFin = $pDateFin;
        return $Seance;
    }
    public function ajouter($pData)
    {
        // la fonction static permet d'éviter de devoir instantier le film avec le
        // constructeur par défaut
        $seance = Seance::creer($pData->getDateFin(),
        $pData->getDateDebut(),
        $this->entityManager->persist($pData),
        $this->entityManager->flush(),
    );
    
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