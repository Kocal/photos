<?php

namespace App\Tests\phpunit\Unit\Entity;

use App\Entity\Album;
use App\Entity\Picture;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class AlbumTest extends TestCase
{
    public function testCreation(): void
    {
        $album = new Album('My album', $author = new User('kocal', 'kocal@example.com'));

        static::assertNull($album->getId());
        static::assertSame('My album', $album->getTitle());
        static::assertSame($author, $album->getAuthor());
        static::assertTrue($album->getPictures()->isEmpty());
        static::assertNull($album->getDescription());
    }

    public function testDescription(): void
    {
        $album = new Album('My album', $author = new User('kocal', 'kocal@example.com'));

        static::assertNull($album->getDescription());

        $album->setDescription('My description');

        static::assertSame('My description', $album->getDescription());
    }

    public function testAddPicture(): void
    {
        $album = new Album('My album', $author = new User('kocal', 'kocal@example.com'));

        static::assertTrue($album->getPictures()->isEmpty());

        $album->addPicture($picture1 = new Picture($author, 'image1.jpg'));
        $album->addPicture($picture2 = new Picture($author, 'image2.jpg'));

        static::assertEquals([$picture1, $picture2], $album->getPictures()->toArray());
    }
}