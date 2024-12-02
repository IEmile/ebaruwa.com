<?php

namespace App\DataFixtures;
use App\Entity\Users; 
use \DateTime;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new DateTime();
        $user = new Users();
        $user->setEmail('ishimweemile51@gmail.com');
        $user->setPassWord('Emile4444.');
        $user->setUserName('IShimwe Emile');
        $user->setState('Rwanda');
        $user->setPhone('0780375551');
        $user->setActive(1);
        $user->setUserCode('4444');
        $user->setJoiningDate($now);
        $manager->persist($user);

        
        $user2 = new Users();
        $user2->setEmail('blackemi4444@gmail.com');
        $user2->setPassWord('Emile4444.');
        $user2->setUserName('IShimwe Emile Black');
        $user2->setState('Rwanda');
        $user2->setPhone('0780375551');
        $user2->setActive(1);
        $user2->setUserCode('4454');
        $user2->setJoiningDate($now);
        $manager->persist($user2);

        $manager->flush();
    }
}