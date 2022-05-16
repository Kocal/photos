<?php

namespace App\EntityBehaviors\Timestampable\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait
{
    #[ORM\Column(name: "created_at", type: "datetime_immutable", nullable: false)]
    protected \DateTimeImmutable|null $createdAt = null;

    #[ORM\Column(name: "updated_at", type: "datetime_immutable", nullable: false)]
    protected \DateTimeImmutable|null $updatedAt = null;

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function updateTimestamps(): void
    {
        // Create a datetime with microseconds
        $dateTime = \DateTimeImmutable::createFromFormat('U.u', sprintf('%.6F', microtime(true)));

        if ($dateTime === false) {
            throw new \Exception('Unable to create a new immutable date.');
        }

        $dateTime->setTimezone(new \DateTimeZone(date_default_timezone_get()));

        if ($this->createdAt === null) {
            $this->createdAt = $dateTime;
        }

        $this->updatedAt = $dateTime;
    }
}