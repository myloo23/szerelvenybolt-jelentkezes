<?php

$products = [
    [
        "nev" => "Bosch kazán",
        "kategoria" => "Fűtéstechnika",
        "leiras" => "Modern, energiatakarékos kondenzációs kazán.",
        "ar" => 300000,
        "keszlet" => 8,
        "kep" => "assets/szerelvenyboltkft.jpg"
    ],
    [
        "nev" => "Daikin klíma",
        "kategoria" => "Klímatechnika",
        "leiras" => "Csendes okos klíma.",
        "ar" => 220000,
        "keszlet" => 0,
        "kep" => "assets/szerelvenyboltkft.jpg"
    ]
];

header('Content-Type: application/xml; charset=utf-8');

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><termekek></termekek>');

foreach ($products as $product) {
    if ($product["keszlet"] > 0) {
        $termek = $xml->addChild("termek");
        $termek->addChild("nev", htmlspecialchars($product["nev"]));
        $termek->addChild("ar", $product["ar"]);
        $termek->addChild("keszlet", $product["keszlet"]);
    }
}

echo $xml->asXML();