<?php

class Bank
{
    private array $rekeningen;
    private array $transacties;
    private array $messages;

    public function __construct() {
        $this->transacties = [];
        $this->rekeningen = [];
        $this->messages = [];
    }

    public function getRekeningen() {
        return $this->rekeningen;
    }

    public function addRekening(Rekening $rekening) {
        $this->rekeningen[$rekening->getEigenaar()]  = $rekening;
    }

    public function addTransactie(Transactie $t) {
        if($this->checkRekeningEigenaar($t)) {
            $this->transacties[] = $t;
        } else {
            $this->messages[] = "Deze transactie is ongeldig -> ".$t->toString();
        }
    }

    public function getMessages() {
        return $this->messages;
    }

    public function checkRekeningEigenaar(Transactie $t) {
        $ontvanger = false;
        $betaler = false;
        foreach($this->getRekeningen() as $r) {
            if ($t->getOntvanger() == $r->getEigenaar()) {
                $ontvanger = true;
            } elseif ($t->getBetaler() == $r->getEigenaar()) {
                $betaler = true;
            }
        }
        return $ontvanger && $betaler;
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