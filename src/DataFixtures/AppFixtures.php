<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user
            ->setEmail('test@test.fr')
            ->setFirstName('test')
            ->setLastName('fixture')
            ;
        $manager->persist($user);
        $manager->flush();
    }
}
