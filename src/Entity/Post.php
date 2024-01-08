<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fecha = null;

    #[ORM\Column(length: 255)]
    private ?string $hora = null;

    #[ORM\Column(length: 255)]
    private ?string $paciente = null;

    #[ORM\Column(length: 255)]
    private ?string $sector = null;

    #[ORM\Column(length: 255)]
    private ?string $medicacion = null;

    #[ORM\Column(length: 255)]
    private ?string $presentacion = null;

    #[ORM\Column(length: 255)]
    private ?string $cantidad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dosisDiaria = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $detalles = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Farmacia::class, orphanRemoval: true)]
    private Collection $farmacias;

    public function __construct($cantidad = null, $detalles = null, $dosisDiaria = null, $fecha = null, $hora = null, $medicacion = null, $observaciones = null, $paciente = null, $presentacion = null, $sector = null)
    {
        $this->cantidad = $cantidad;
        $this->detalles = $detalles;
        $this->dosisDiaria = $dosisDiaria;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->medicacion = $medicacion;
        $this->observaciones = $observaciones;
        $this->paciente = $paciente;
        $this->presentacion = $presentacion;
        $this->sector = $sector;
        $this->creation_date = new DateTime();
        $this->farmacias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?string
    {
        return $this->hora;
    }

    public function setHora(string $hora): static
    {
        $this->hora = $hora;

        return $this;
    }

    public function getPaciente(): ?string
    {
        return $this->paciente;
    }

    public function setPaciente(string $paciente): static
    {
        $this->paciente = $paciente;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): static
    {
        $this->sector = $sector;

        return $this;
    }

    public function getMedicacion(): ?string
    {
        return $this->medicacion;
    }

    public function setMedicacion(string $medicacion): static
    {
        $this->medicacion = $medicacion;

        return $this;
    }

    public function getPresentacion(): ?string
    {
        return $this->presentacion;
    }

    public function setPresentacion(string $presentacion): static
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    public function getCantidad(): ?string
    {
        return $this->cantidad;
    }

    public function setCantidad(string $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getDosisDiaria(): ?string
    {
        return $this->dosisDiaria;
    }

    public function setDosisDiaria(?string $dosisDiaria): static
    {
        $this->dosisDiaria = $dosisDiaria;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): static
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getDetalles(): ?string
    {
        return $this->detalles;
    }

    public function setDetalles(?string $detalles): static
    {
        $this->detalles = $detalles;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Farmacia>
     */
    public function getFarmacias(): Collection
    {
        return $this->farmacias;
    }

    public function addFarmacia(Farmacia $farmacia): static
    {
        if (!$this->farmacias->contains($farmacia)) {
            $this->farmacias->add($farmacia);
            $farmacia->setPost($this);
        }

        return $this;
    }

    public function removeFarmacia(Farmacia $farmacia): static
    {
        if ($this->farmacias->removeElement($farmacia)) {
            // set the owning side to null (unless already changed)
            if ($farmacia->getPost() === $this) {
                $farmacia->setPost(null);
            }
        }

        return $this;
    }
}
