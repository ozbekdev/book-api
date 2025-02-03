<?php

namespace App\Factory;

use App\Entity\User;
use DateTimeZone;
use Symfony\Component\Clock\DatePoint;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

readonly class UserFactory
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher) {}

    /**
     * @throws \DateMalformedStringException
     */
    public function create(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        int $age,
        string $gender,
        string $phone
    ): User
    {
        $user = new User();

        $hashedPassword = $this->passwordHasher->hashPassword($user, $password);

        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $user->setAge($age);
        $user->setGender($gender);
        $user->setPhone($phone);
        $user->setCreatedAt(new DatePoint(timezone: new DateTimeZone('Asia/Tashkent')));

        return $user;
    }
}