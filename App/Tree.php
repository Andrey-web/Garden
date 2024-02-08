<?php

namespace App;

class Tree
{
    public array $apples = [];

    public function addApple(Apple $apple): void
    {
        $this->apples[] = $apple;
    }

    public function updateStateByAge(int $age): void
    {
        $this->growApples($age);
        $this->rotApples();
        $this->dropApples();
    }

    private function growApples(int $age): void
    {
        foreach ($this->apples as $apple) {
            $apple->grow();
        }

        // Каждые 30 суток на каждом дереве рождается новое яблоко
        if ($age > 0 && $age % 30 === 0) {
            $this->apples[] = new Apple();
        }
    }

    private function rotApples(): void
    {
        foreach ($this->apples as $apple) {
            $apple->rot();
        }
    }

    private function dropApples(): void
    {
        foreach ($this->apples as $key => $apple) {
            // Яблоки могут упасть через 28 или 32 дня с вероятностью 50%
            $chance = rand(0, 1);
            if ($chance === 1) {
                $dropDay = 28;
            } else {
                $dropDay = 32;
            }
            if (!$apple->isDropped() && !$apple->isRotten() && ($apple->getAge() === $dropDay || $apple->getAge() === 32)) {
                $apple->fall();
            }

            if ($apple->isRotten()) {
                unset($this->apples[$key]);
            }
        }
    }

    public function getApplesCount(): int
    {
        return count($this->apples);
    }
}