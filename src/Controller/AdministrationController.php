<?php

namespace App\Controller;

use App\Entity\Film;
use App\Service\GenreService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
use App\Entity\Seance;
use App\Form\FilmFormType;
use App\Form\GenreFormType;
use App\Form\SeanceFormType;
use App\Service\FilmService;
use App\Service\SeanceService;

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
    public function creerGenres(GenreService $pGenreService):Response
    {
        $genre = new Genre();
        
        $formulaire = $this->createForm(GenreFormType::class,$genre);
        
        $request = Request::createFromGlobals();

        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $pGenreService->ajouter($formulaire->getData());
            return $this->redirectToRoute('task_success');

        }
        else   
        return $this->render('administration/genres/form_genres.html.twig', [
            'formulaire' => $formulaire->createView()]);
        
        
    }

        /**
         * @route("administration/films/add", name="admin_creer_film")
         */
            public function creerFilms(FilmService $pFilmService)
            {
                $film = new Film();
            $formulaire = $this->createForm(FilmFormType::class,$film);
            $request = Request::createFromGlobals();
            $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $pFilmService->ajouter($formulaire->getData());
            return $this->redirectToRoute('task_success');

            }
        else
            return $this->render('administration/films/form_films.html.twig',
            ['formulaire' => $formulaire->createView()]);
        }
        /**
     * @Route("administration/seances",name="admin_liste_seances")
     */
    public function listeSeances(SeanceService $pSeanceService):Response
    {
        $seances = $pSeanceService->liste();
        return $this->render('administration/genres/liste_seances.html.twig', [
            'seances' => $seances
        ]);
    }
/**
 * @Route("administration/seances/add", name="admin_creer_seance")
 */
     public function creerSeances(SeanceService $pSeanceService)
    {
        
        $seance = new Seance();
        $formulaire = $this->createForm(SeanceFormType::class,$seance);
        $request = Request::createFromGlobals();
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $pSeanceService->ajouter($formulaire->getData());
            return $this->redirectToRoute('task_success');

        }
        else
        return $this->render('administration/seances/form_seances.html.twig',
        ['formulaire' => $formulaire->createView()]);
    }
}