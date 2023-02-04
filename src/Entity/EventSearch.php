<?php
namespace App\Entity ;

class EventSearch {

    /**
    * @var int|null
    */

    private $maxPrice ;



    /**
    * @return int|null
    */
    public function getMaxPrice (): ?int {
    return $this->maxPrice ;
    }

    /**
    * @param int|null $maxPrice
    * @return EventSearch
    */
    public function setMaxPrice (?int $maxPrice) : EventSearch {
    $this->maxPrice = $maxPrice ;
    return $this;
    }







}