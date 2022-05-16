<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserManager
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private EntityManager $entityManager
    )
    {
    }

    public function create(string $username, string $email, string $plainPassword): User
    {
        $user = new User($username, $email);
        $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}