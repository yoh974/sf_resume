<?php

namespace App\DataFixtures;

use App\Entity\Resume;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encodePassword;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->encodePassword = $userPasswordEncoderInterface;
    }
    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user
            ->setEmail('test@test.fr')
            ->setPassword($this->encodePassword->encodePassword($user, "admin"))
            ->setRoles(["ROLE_ADMIN"])
            ;
        $manager->persist($user);
        $resume = new Resume();
        $resume
            ->setBio("une bio")
            ->setCatchy("catchy")
            ;
        $manager->persist($resume);
        $manager->flush();
    }
}
