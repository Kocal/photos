<?php

namespace App\Tests\phpunit\Unit\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreation(): void
    {
        $user = new User('kocal', 'kocal@example.com');

        static::assertNull($user->getId());
        static::assertSame('kocal', $user->getUsername());
        static::assertSame('', $user->getPassword());
        static::assertEquals(['ROLE_USER'], $user->getRoles());
        static::assertTrue($user->getAlbums()->isEmpty());
        static::assertTrue($user->getPictures()->isEmpty());
    }

    public function testGetRoles(): void
    {
        $user = new User('kocal', 'kocal@example.com');

        static::assertEquals(['ROLE_USER'], $user->getRoles());

        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        static::assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }

    public function setPassword(): void
    {
        $user = new User('kocal', 'kocal@example.com');

        static::assertSame('', $user->getPassword());

        $user->setPassword('custom-password');

        static::assertSame('custom-password', $user->getPassword());
    }
}