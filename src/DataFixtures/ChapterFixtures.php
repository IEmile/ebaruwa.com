<?php

// src/DataFixtures/ArticleFixtures.php

namespace App\DataFixtures;

use App\Entity\Chapter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChapterFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Define some sample data for the Article entity
        $articles = [
            [
                'title' => 'Introduction to Symfony',
                'image_url' => 'https://example.com/images/symfony.png',
                'views' => 123.45,
                'stars' => 4.5,
                'published' => true,
                'price' => 19.99,
                'priced' => true,
                'view_permision' => true,
                'content' => 'Learn the basics of Symfony and how to build modern web applications.',
            ],
            [
                'title' => 'Mastering Doctrine ORM',
                'image_url' => 'https://example.com/images/doctrine.png',
                'views' => 234.56,
                'stars' => 4.8,
                'published' => false,
                'price' => 29.99,
                'priced' => true,
                'view_permision' => false,
                'content' => 'Advanced guide to mastering Doctrine ORM for database interactions in Symfony.',
            ],
            [
                'title' => 'PHP 8 Features',
                'image_url' => 'https://example.com/images/php8.png',
                'views' => 345.67,
                'stars' => 5.0,
                'published' => true,
                'price' => 0.00,
                'priced' => false,
                'view_permision' => true,
                'content' => 'Explore the new features introduced in PHP 8 and how to leverage them.',
            ],
        ];

        foreach ($articles as $data) {
            $article = new Chapter();
            $article->setTitle($data['title']);
            $article->setImageUrl($data['image_url']);
            $article->setViews($data['views']);
            $article->setStars($data['stars']);
            $article->setPublished($data['published']);
            $article->setPrice($data['price']);
            $article->setPriced($data['priced']);
            $article->setViewPermision($data['view_permision']);
            $article->setContent($data['content']);

            $manager->persist($article);
        }

        // Save the data into the database
        $manager->flush();
    }
}
