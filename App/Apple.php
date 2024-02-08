<?php

namespace App;

class Apple
{
    private const COLORS = ['зеленое', 'желтое', 'красное'];
    private const SIZE = ['мелкое', 'среднее', 'крупное'];
    private int $age;
    private string $color;
    private string $size;
    private int $isRotten = 0;
    private int $isDropped = 0;

    public function __construct($appleAge = 0)
    {
        $this->color = self::COLORS[array_rand(self::COLORS)];
        $this->size = self::SIZE[array_rand(self::SIZE)];
        $this->age = $appleAge;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function grow(): void
    {
        $this->age++;
    }

    public function rot(): void
    {
        if ($this->isDropped) {
            $this->isRotten = 1;
        }
    }

    public function fall(): void
    {
        $this->isDropped = 1;
    }

    public function isDropped(): int
    {
        return $this->isDropped;
    }

    public function isRotten(): int
    {
        return $this->isRotten;
    }
}