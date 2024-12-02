<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Enum\Audience;
use App\Enum\Genre;
use App\Enum\Language;
use App\Enum\License;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {  // Generate 10 books
            $book = new Book();

            // Manually set data for each field
            $book->setTitle('Book Title ' . ($i + 1));  // String for title
            $book->setDescription('This is a description for Book ' . ($i + 1));  // String for description
            $book->setTags(['tag1', 'tag2', 'tag3']);  // Array for tags

            // Use enum cases for the audience, language, genre, and license fields
            $audienceCases = Audience::cases();  // Get all cases of Audience enum
            $book->setAudience($audienceCases[$i % count($audienceCases)]);  // Cycle through enum cases

            $languageCases = Language::cases();  // Get all cases of Language enum
            $book->setLanguage($languageCases[$i % count($languageCases)]);  // Cycle through enum cases

            $genreCases = Genre::cases();  // Get all cases of Genre enum
            $book->setCategory($genreCases[$i % count($genreCases)]);  // Cycle through enum cases

            $licenseCases = License::cases();  // Get all cases of License enum
            $book->setCopyRight($licenseCases[$i % count($licenseCases)]);  // Cycle through enum cases

            $book->setRating(rand(0, 1));  // Randomly set rating to true (1) or false (0)
            $book->setCoverImageUrl('https://example.com/cover' . ($i + 1) . '.jpg');  // String for cover image URL
            $book->setCharacters(['Character A', 'Character B']);  // Array for characters
            // Persist the book entity
            $manager->persist($book);
        }

        $manager->flush();  // Save all generated entities to the database

    }
}

