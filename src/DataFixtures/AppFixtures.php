<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Todo;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 50; $i++) {
            $todo = new Todo();
            $todo->setTitle($faker->title);
            $todo->setDescription($faker->text(200));
            $todo->setChecked(false % 4);

            $manager->persist($todo);
            # code...
        }

        // for ($i = 0; $i < 5; $i++) {
        $user = new User();
        $user->setEmail($faker->email());
        $user->setPassword($this->hasher->hashPassword($user, "passqord"));

        $manager->persist($user);
        // }

        $manager->flush();
    }
}
