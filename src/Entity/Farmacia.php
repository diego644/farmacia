<?php

namespace App\Entity;

use App\Repository\FarmaciaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FarmaciaRepository::class)]
class Farmacia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $historiaClinica = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $obraSocial = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $auditoria = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $recibido = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $enviado_O_S = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $recibido_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entregado_2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observacionesFarmacia = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\ManyToOne(inversedBy: 'farmacias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'farmacias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Post $post = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoriaClinica(): ?string
    {
        return $this->historiaClinica;
    }

    public function setHistoriaClinica(?string $historiaClinica): static
    {
        $this->historiaClinica = $historiaClinica;

        return $this;
    }

    public function getObraSocial(): ?string
    {
        return $this->obraSocial;
    }

    public function setObraSocial(?string $obraSocial): static
    {
        $this->obraSocial = $obraSocial;

        return $this;
    }

    public function getAuditoria(): ?string
    {
        return $this->auditoria;
    }

    public function setAuditoria(?string $auditoria): static
    {
        $this->auditoria = $auditoria;

        return $this;
    }

    public function getRecibido(): ?string
    {
        return $this->recibido;
    }

    public function setRecibido(?string $recibido): static
    {
        $this->recibido = $recibido;

        return $this;
    }

    public function getEnviadoOS(): ?string
    {
        return $this->enviado_O_S;
    }

    public function setEnviadoOS(?string $enviado_O_S): static
    {
        $this->enviado_O_S = $enviado_O_S;

        return $this;
    }

    public function getRecibido2(): ?string
    {
        return $this->recibido_2;
    }

    public function setRecibido2(?string $recibido_2): static
    {
        $this->recibido_2 = $recibido_2;

        return $this;
    }

    public function getEntregado2(): ?string
    {
        return $this->entregado_2;
    }

    public function setEntregado2(?string $entregado_2): static
    {
        $this->entregado_2 = $entregado_2;

        return $this;
    }

    public function getObservacionesFarmacia(): ?string
    {
        return $this->observacionesFarmacia;
    }

    public function setObservacionesFarmacia(?string $observacionesFarmacia): static
    {
        $this->observacionesFarmacia = $observacionesFarmacia;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): static
    {
        $this->post = $post;

        return $this;
    }
}
