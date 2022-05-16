<?php

namespace App\EntityBehaviors\Timestampable\Contract\Entity;

interface TimestampableInterface
{
    public function updateTimestamps(): void;

    public function getCreatedAt(): ?\DateTimeImmutable;

    public function setCreatedAt(\DateTimeImmutable $createdAt): void;

    public function getUpdatedAt(): ?\DateTimeImmutable;

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): void;
}