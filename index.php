<?php
use App\Apple;
use App\Garden;
use App\Tree;

require __DIR__ . '/autoload.php';

$garden = new Garden(); // создаём сад

echo "Дней саду: ";
echo $garden->getAge();
echo "<br>";
echo "Сейчас деревьев: ";
echo $garden->getTreesCount();
echo "<br>";
echo "Яблок: ";
echo $garden->getTotalApplesCount();

echo "<pre>";
$garden->passDay(); // прошли одни сутки
$garden->passDay(); // прошли одни сутки
$garden->passDay(); // прошли одни сутки
var_dump($garden->getCountApples()); // получить список висящих яблок на деревьях
$garden->passDay(); // прошли одни сутки
var_dump($garden->getCountApples()); // получить список висящих яблок на деревьях этого сада
$garden->passDay(); // прошли одни сутки
var_dump($garden->getCountApples()); // получить список висящих яблок на деревьях этого сада
echo "</pre>";

echo "<br>";
echo "Стало дней саду: ";
echo $garden->getAge();
echo "<br>";
echo "Осталось яблок после прошедших дней: ";
echo $garden->getTotalApplesCount();
echo "<br>";
echo "Добавление дерева";
$tree = new Tree();
$garden->addTree($tree);
echo "<br>";
echo "Стало деревьев: ";
echo $garden->getTreesCount();

echo "<br>";
echo "Добавление яблока";
$tree->addApple(new Apple());
echo "<br>";
echo "Яблок стало: ";
echo $garden->getTotalApplesCount();