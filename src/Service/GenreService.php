<?php
namespace app\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ICrud;

class GenreService implements ICrud
{
   private $entityManager;
   public function __construct(EntityManagerInterface $em)
   {
       $this->entityManager = $em;

   }
	/**
	 *
	 * @return mixed
	 */
	function liste() {
	}
	
	/**
	 *
	 * @param mixed $pId 
	 *
	 * @return mixed
	 */
	function lire($pId) {
	}
	
	/**
	 *
	 * @return mixed
	 */
	function sauvegarder() {
	}
	
	/**
	 *
	 * @param mixed $pId 
	 *
	 * @return mixed
	 */
	function supprimer($pId) {
	}
}