<?php

namespace App\Entity;

use App\Repository\JobApplicationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobApplicationRepository::class)]
class JobApplication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $candidate_message = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_added = null;

    #[ORM\ManyToOne]
    private ?JobOffer $job_offer_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCandidateMessage(): ?string
    {
        return $this->candidate_message;
    }

    public function setCandidateMessage(string $candidate_message): self
    {
        $this->candidate_message = $candidate_message;

        return $this;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->date_added;
    }

    public function setDateAdded(\DateTimeInterface $date_added): self
    {
        $this->date_added = $date_added;

        return $this;
    }

    public function getJobOfferId(): ?JobOffer
    {
        return $this->job_offer_id;
    }

    public function setJobOfferId(?JobOffer $job_offer_id): self
    {
        $this->job_offer_id = $job_offer_id;

        return $this;
    }
}
