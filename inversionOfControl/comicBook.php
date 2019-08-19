<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> comicBook.php
 * @Purpose : to study inversion of control
 * @description: Create an IOC in Php
 * @overview:IOC demonstartion
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 19-aug-2019
 *******************************************************************************************************************/

/**
 * interface class 
 */
interface CharacterInterface
{
    public function getName(): string;
}

/**
 * abstract class ,Character class implements CharacterInterface
 */
abstract class Character implements CharacterInterface
{
    public $name;

    public function getName(): string
    {
        return $this->name;
    }
}

/**
 * superhero class extend character
 */
class Superhero extends Character
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

/**
 * vamparicDog extends Character
 */
class VampiricDog extends Character
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

/**
 * class comicBook
 */
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
