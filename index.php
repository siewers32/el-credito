<?php
include("lib/Transactie.php");
include('lib/Rekening.php');
include('lib/Bank.php');

$bank = new Bank();
$bank->addRekening(new Rekening("albert"));
$bank->addRekening(new Rekening("geert"));
$bank->addRekening(new Rekening("bank"));
$bank->addTransactie(new Transactie("geert", "bank", 100));
$bank->addTransactie(new Transactie("geert", "albert", 20));
$bank->addTransactie(new Transactie("albert", "bank", 100));
$bank->addTransactie(new Transactie("albert", "geert", 22));
$bank->addTransactie(new Transactie("geert", "albert", 11));
$bank->addTransactie(new Transactie("albert", "geert", 8));
$bank->addTransactie(new Transactie("albert", "geert", 18));
?>

<?php foreach($bank->getRekeningen() as $r) { ?>
    <h3>Overzicht van rekening <?= $r->getEigenaar() ?></h3>
    <table>
        <tr>
            <th>Ontvanger</th><th>Betaler</th><th>Bedrag</th>
        </tr>
        <?php foreach($bank->getTransactionsFromRekening($r->getEigenaar()) as $t) { ?>
            <tr>
                <td><?= $t->getOntvanger() ?></td>
                <td><?= $t->getBetaler() ?></td>
                <td style="text-align: right;">
                    <?php echo ($t->getOntvanger() != $r->getEigenaar()) ? "-" : NULL; ?>
                    <?= $t->getBedrag() ?>
                </td>
            </tr>
        <?php } ?>
        <tr><td colspan="3" style="text-align:right;">Totaal: <?= $bank->getSaldoFromRekening($r->getEigenaar()) ?></td></tr>
    </table>
<?php } ?>
<ul>
<?php foreach($bank->getMessages() as $m) { ?>
    <li><?= $m ?></li>
<?php } ?>
</ul>
