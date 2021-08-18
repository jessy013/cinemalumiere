<?php
namespace App\Service;

use App\Entity\ICrud;
use App\Entity\Seance;

class SeanceService implements ICrud
{
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