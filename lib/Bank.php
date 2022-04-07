<?php

class Bank
{
    private array $rekeningen;
    private array $transacties;

    public function __construct() {
        $this->transacties = [];
        $this->rekeningen = [];
    }

    public function getRekeningen() {
        return $this->rekeningen;
    }

    public function addRekening(Rekening $rekening) {
        $this->rekeningen[$rekening->getEigenaar()]  = $rekening;
    }

    public function addTransactie(Transactie $t) {
        $this->transacties[] = $t;
    }

    public function getRekening(string $eigenaar) {
        return $this->rekeningen[$eigenaar];
    }

    public function getSaldoFromRekening(string $eigenaar) {
        $saldo = 0;
        foreach($this->transacties as $t) {
            if($t->getOntvanger() == $eigenaar) {
                $saldo += $t->getBedrag();
            } elseif($t->getBetaler() == $eigenaar){
                $saldo -= $t->getBedrag();
            }
        }
        return $saldo;
    }

    public function getTransactionsFromRekening(string $eigenaar) {
        $rekeningTransacties = [];
        foreach($this->transacties as $t) {
            if ($t->getOntvanger() == $eigenaar || $t->getBetaler() == $eigenaar) {
                $rekeningTransacties[] = $t;
            }
        }
        return $rekeningTransacties;
    }
}