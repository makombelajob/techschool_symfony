<?php

namespace App\DataFixtures;

use App\Entity\Subjects;
use App\Entity\Users;
use App\Entity\Classes;
use App\Entity\Courses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Data extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        // Users
        for ($i = 0; $i <= 10; $i++) {
            $user = new Users();
            $user->setEmail($faker->unique()->email());
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password123'));
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setRegisterAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 year', 'now')));
            $manager->persist($user);
        }

        // Subjects
        $subjectLabels = [
            'informatique',
            'electronique',
            'mathematique',
            'culture_generale'
        ];

        foreach ($subjectLabels as $key) {
            $subject = new Subjects();
            $subject->setName(ucfirst(str_replace('_', ' ', $key)));
            $manager->persist($subject);
            $this->addReference('subject_' . $key, $subject);
        }

        // Classes
        $classData = [
            ['name' => '6e A', 'level' => 6],
            ['name' => '5e B', 'level' => 5],
            ['name' => '4e C', 'level' => 4],
            ['name' => '3e A', 'level' => 3],
            ['name' => '3e B', 'level' => 3],
        ];

        foreach ($classData as $i => $data) {
            $classRoom = new Classes();
            $classRoom->setName($data['name']);
            $classRoom->setLevel($data['level']);
            $manager->persist($classRoom);
            $this->addReference('classRoom_' . $i, $classRoom);
        }

        $manager->flush();
    }
}
