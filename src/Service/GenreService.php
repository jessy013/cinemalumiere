<?php
namespace app\Service;


use App\Entity\Genre;
use App\Entity\ICrud;
use Doctrine\ORM\EntityManagerInterface;


class GenreService implements ICrud
{
   private $entityManager;
   public function __construct(EntityManagerInterface $em)
   {
       $this->entityManager = $em;

   }

    function ajouter($pIntitule)
   {
       $genre = Genre::create($pIntitule);
       $this->entityManager->persist($genre);
       $this->entityManager->flush();
   }
	/**
	 *
	 * @return mixed
	 */
	function liste() 
    {
        return $this->entityManager->getRepository(Genre::class)->findAll();
    }
	
	/**
	 *
	 * @param mixed $pId 
	 *
	 * @return mixed
	 */
	function lire($pId) 
    {
        return $this->entityManager->getRepository(genre::class)->find($pId);
    }
	
	/**
	 *
	 * @return mixed
	 */
	function sauvegarder() 
    {

    }
	
	/**
	 *
	 * @param mixed $pId 
	 *
	 * @return mixed
	 */
	function supprimer($pId) 
    {

	}
}