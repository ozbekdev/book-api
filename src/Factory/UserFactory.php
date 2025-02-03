<?php

namespace App\Factory;

use App\Entity\User;
use DateTimeZone;
use Symfony\Component\Clock\DatePoint;

class UserFactory
{
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

        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setAge($age);
        $user->setGender($gender);
        $user->setPhone($phone);
        $user->setCreatedAt(new DatePoint(timezone: new DateTimeZone('Asia/Tashkent')));

        return $user;
    }
}