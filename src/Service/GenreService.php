<?php
namespace app\Service;

use Doctrine\ORM\EntityManagerInterface;

class GenreService
{
   private $entityManager;
   public function __construct(EntityManagerInterface $em)
   {
       
   }
}