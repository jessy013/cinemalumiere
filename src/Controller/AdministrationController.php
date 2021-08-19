<?php

namespace App\Controller;

use App\Service\GenreService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
use App\Service\FilmService;
use App\Entity\Film;
use app\Entity\ICrud;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }
    public function listeGenre(GenreService $genreService ):response
    {
        $genres = $genreService->liste();
        return $this->render('administration/genres/liste_genres.html.twig', [
            'genres' => $genres
        ]);
        
    }
    /**
     * @Route("administration/genres/add",name="admin_creer_genre")
     */
    public function creerGenres(GenreService $genreService):Response
    {
        $genre = new Genre();
        $formulaire = $this->createForm(GenreFormType::class,$genre);
        return $this->render('administration/genres/form_genres.html.twig', [
            'formulaire' => $formulaire->createView()]);
        }
        public function creerFilms(FilmService $pFilmService)
        {
            $film = new film();
            $formulaire = $this->createForm(FilmFormType::class,$pfilm);
            return $this->render('administration/films/form_films.html.twig',[
                'formulaire' => $formulaire->createView()]);
        }
}
