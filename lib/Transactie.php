<?php

class Transactie {

    private string $ontvanger;
    private string $betaler;
    private int $bedrag;

    public function __construct(string $ontvanger, string $betaler, int $bedrag) {
        $this->ontvanger = $ontvanger;
        $this->betaler = $betaler;
        $this->bedrag = $this->setBedrag($bedrag);
    }

    public function setBedrag(int $bedrag) {
        if($bedrag > 0) {
            return $this->bedrag = $bedrag;
        } else {
            return 0;
        }
    }

    public function getBedrag() {
        return $this->bedrag;
    }

    public function getOntvanger() {
        return $this->ontvanger;
    }

    public function getBetaler() {
        return $this->betaler;
    }

    public function toString() {
        return "betaler: ".$this->getBetaler()." ontvanger: ".$this->getOntvanger()." bedrag:".$this->getBedrag();
    }

}