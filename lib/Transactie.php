<?php

class Transactie {

    private string $ontvanger;
    private string $betaler;
    private int $bedrag;

    public function __construct(string $ontvanger, string $betaler, int $bedrag) {
        $this->ontvanger = $ontvanger;
        $this->betaler = $betaler;
        $this->bedrag = $bedrag;
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

}