<?php

namespace App\Tests\phpunit\Unit\Entity;

use App\Entity\Picture;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PictureTest extends TestCase
{
    public function testCreation(): void
    {
        $picture = new Picture($author = new User('kocal', 'kocal@example.com'));

        static::assertNull($picture->getId());
        static::assertSame($author, $picture->getAuthor());
        static::assertTrue($picture->getAlbums()->isEmpty());
        static::assertNull($picture->getImage());
        static::assertNull($picture->getImageFile());
        static::assertNull($picture->getTitle());
        static::assertNull($picture->getDescription());
    }

    public function testTitle(): void
    {
        $picture = new Picture(new User('kocal', 'kocal@example.com'), 'image.jpg');

        static::assertNull($picture->getTitle());

        $picture->setTitle('title');

        static::assertSame('title', $picture->getTitle());
    }

    public function testDescription(): void
    {
        $picture = new Picture(new User('kocal', 'kocal@example.com'), 'image.jpg');

        static::assertNull($picture->getDescription());

        $picture->setDescription('description');

        static::assertSame('description', $picture->getDescription());
    }
}