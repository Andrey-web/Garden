<?php

namespace App;

class Garden
{
    private array $trees = [];
    private int $age = 0;

    public function __construct()
    {
        // Количество деревьев и количество яблок на деревьях не больше 100
        $treeCount = rand(0, 100);
        $applesPerTree = rand(0, 100);

        for ($i = 0; $i < $treeCount; $i++) {
            $tree = new Tree();
            $applesCount = min(rand(0, 100), $applesPerTree);
            for ($j = 0; $j < $applesCount; $j++) {
                $apple = new Apple(rand(0, 30));
                $tree->addApple($apple);
            }
            $this->addTree($tree);
        }
    }

    public function passDay(): void
    {
        foreach ($this->trees as $tree) {
            $tree->updateStateByAge($this->age);
        }
        $this->age++;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function addTree(Tree $tree): void
    {
        $this->trees[] = $tree;
    }

    public function getCountApples(): array
    {
        $applesCount = [];
        foreach ($this->trees as $tree) {
            $applesCount[] = $tree->apples;
        }
        return $applesCount;
    }

    public function getTreesCount(): int
    {
        return count($this->trees);
    }

    public function getTotalApplesCount(): int
    {
        $totalApplesCount = 0;
        foreach ($this->trees as $tree) {
            $totalApplesCount += $tree->getApplesCount();
        }
        return $totalApplesCount;
    }
}