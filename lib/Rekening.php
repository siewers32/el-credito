<?php

class Rekening
{
    private string $eigenaar;

    public function __construct($eigenaar) {
        $this->eigenaar = $eigenaar;
    }

    public function getEigenaar() {
        return $this->eigenaar;
    }
}