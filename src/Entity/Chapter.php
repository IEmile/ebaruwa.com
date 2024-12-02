<?php

namespace App\Entity;

use App\Repository\ChapterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapterRepository::class)]
class Chapter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: Types::SMALLFLOAT)]
    private ?float $views = null;

    #[ORM\Column(type: Types::SMALLFLOAT)]
    private ?float $stars = null;

    #[ORM\Column]
    private ?bool $published = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    private ?string $price = null;

    #[ORM\Column]
    private ?bool $priced = null;

    #[ORM\Column]
    private ?bool $viewPermision = null;

    #[ORM\Column(length: 4000, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'chapters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getViews(): ?float
    {
        return $this->views;
    }

    public function setViews(float $views): static
    {
        $this->views = $views;

        return $this;
    }

    public function getStars(): ?float
    {
        return $this->stars;
    }

    public function setStars(float $stars): static
    {
        $this->stars = $stars;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): static
    {
        $this->published = $published;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isPriced(): ?bool
    {
        return $this->priced;
    }

    public function setPriced(bool $priced): static
    {
        $this->priced = $priced;

        return $this;
    }

    public function isViewPermision(): ?bool
    {
        return $this->viewPermision;
    }

    public function setViewPermision(bool $viewPermision): static
    {
        $this->viewPermision = $viewPermision;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): static
    {
        $this->book = $book;

        return $this;
    }
}
