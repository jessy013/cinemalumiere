<?php
namespace app\Service;

use Doctrine\ORM\EntityManagerInterface;
use ICrud;

class GenreService implements ICrud
{
   private $entityManager;
   public function __construct(EntityManagerInterface $em)
   {
       $this->entityManager = $em;
       
   }
}