<?php

require_once 'Modele/Capteur.php';
require_once 'Modele/Fuite.php';
require_once 'Modele/Conso.php';

$totalTests = 0;
$passedTests = 0;

function assertEqual($expected, $actual, $sql_name, $message = ''){
    global $totalTests, $passedTests;
    $totalTests++;
    if ($expected === $actual["$sql_name"]) {
        $passedTests++;
        echo "[OK] $message\n";
    } else {
        echo "[FAIL] $message\n";
        echo "    Expected: $expected\n";
        echo "    Actual: ".$actual["$sql_name"]."\n";
    }
}

$capteur = new Capteur();
$fuite = new Fuite();
$conso = new Conso();

assertEqual(5, $capteur->countCapteurs(), "nbr_capteur", 'Compte des capteurs');
assertEqual(3, $fuite->countFuites(), "nbr_fuites", 'Compte des fuites');
assertEqual(11088.0, $conso->calcConsoTotaleDernierJour(), "tot", "Consommation totale dernier jour");

echo "\nTests réussis : $passedTests/$totalTests\n";