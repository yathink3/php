<?php

interface CharacterInterface
{
    public function getName(): string;
}

abstract class Character implements CharacterInterface
{
    public $name;

    public function getName(): string
    {
        return $this->name;
    }
}

class Superhero extends Character
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class VampiricDog extends Character
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class ComicBook
{
    public $mainCharacter;

    public function __construct(CharacterInterface $character)
    {
        $this->mainCharacter = $character;
    }
}

$superhero = new Superhero('Caffeine Man');
$superheroComic = new ComicBook($superhero);

var_dump($superheroComic->mainCharacter->getName());

$vampireDog = new VampiricDog('Mr. Fangz');
$vampireComic = new ComicBook($vampireDog);

var_dump($vampireComic->mainCharacter->getName());
