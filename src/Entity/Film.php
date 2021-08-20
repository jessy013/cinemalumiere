<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resume;

    /**
     * @ORM\Column(type="integer")
     */
    private $anneeProduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $realisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $listeActeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageUrl;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="films")
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="film", orphanRemoval=true)
     */
    private $seances;

    public static function creer($pTitre,$pResume,$AnneeProduction,$pRealisateur,$pListeActeur,$pImageUrl)
    {
        $film = new film ();
        $film->seances = new ArrayCollection();
        $film->titre = $pTitre;
        $film->resume = $pResume;
        $film->anneeProduction = $AnneeProduction;
        $film->realisateur = $pRealisateur;
        $film->listeActeur = $pListeActeur;
        $film->imageUrl = $pImageUrl;
        return $film;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getAnneeProduction(): ?int
    {
        return $this->anneeProduction;
    }

    public function setAnneeProduction(int $anneeProduction): self
    {
        $this->anneeProduction = $anneeProduction;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->realisateur;
    }

    public function setRealisateur(string $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    public function getListeActeur(): ?string
    {
        return $this->listeActeur;
    }

    public function setListeActeur(string $listeActeur): self
    {
        $this->listeActeur = $listeActeur;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setFilm($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getFilm() === $this) {
                $seance->setFilm(null);
            }
        }

        return $this;
    }
    function __toString()
    {
        return $this->titre." (".$this->anneeProduction.")";
    }
}
