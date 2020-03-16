<?php

namespace App\Classes;

class player
{
    public $id;
    public $name;
    public $cards;

    /**
     * player constructor.
     * @param $id
     * @param $name
     * @param $cards
     */
    public function __construct($id, $name, $cards)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cards = $cards;
    }


}
