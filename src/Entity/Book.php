<?php

namespace App\Entity;

use App\Enum\Audience;
use App\Enum\Genre;
use App\Enum\Language;
use App\Enum\License;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(enumType: Genre::class)]
    private ?Genre $category = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $tags = null;

    #[ORM\Column(enumType: Audience::class)]
    private ?Audience $Audience = null;

    #[ORM\Column(enumType: Language::class)]
    private ?Language $language = null;

    #[ORM\Column(enumType: License::class)]
    private ?License $copyRight = null;

    #[ORM\Column]
    private ?bool $Rating = null;

    #[ORM\Column(length: 255)]
    private ?string $coverImageUrl = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $characters = null;

    /**
     * @var Collection<int, Chapter>
     */
    #[ORM\OneToMany(targetEntity: Chapter::class, mappedBy: 'book', orphanRemoval: true)]
    private Collection $chapters;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users = null;

    public function __construct()
    {
        $this->chapters = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    
    public function getCategory(): ?Genre
    {
        return $this->category;
    }

    public function setCategory(Genre $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getAudience(): ?Audience
    {
        return $this->Audience;
    }

    public function setAudience(Audience $Audience): static
    {
        $this->Audience = $Audience;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(Language $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getCopyRight(): ?License
    {
        return $this->copyRight;
    }

    public function setCopyRight(License $copyRight): static
    {
        $this->copyRight = $copyRight;

        return $this;
    }

    public function isRating(): ?bool
    {
        return $this->Rating;
    }

    public function setRating(bool $Rating): static
    {
        $this->Rating = $Rating;

        return $this;
    }

    public function getCoverImageUrl(): ?string
    {
        return $this->coverImageUrl;
    }

    public function setCoverImageUrl(string $coverImageUrl): static
    {
        $this->coverImageUrl = $coverImageUrl;

        return $this;
    }

    public function getCharacters(): ?array
    {
        return $this->characters;
    }

    public function setCharacters(?array $characters): static
    {
        $this->characters = $characters;

        return $this;
    }

    /**
     * @return Collection<int, Chapter>
     */
    public function getChapters(): Collection
    {
        return $this->chapters;
    }

    public function addChapter(Chapter $chapter): static
    {
        if (!$this->chapters->contains($chapter)) {
            $this->chapters->add($chapter);
            $chapter->setBook($this);
        }

        return $this;
    }

    public function removeChapter(Chapter $chapter): static
    {
        if ($this->chapters->removeElement($chapter)) {
            // set the owning side to null (unless already changed)
            if ($chapter->getBook() === $this) {
                $chapter->setBook(null);
            }
        }

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
