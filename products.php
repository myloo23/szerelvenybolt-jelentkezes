<?php

header('Content-Type: application/json; charset=utf-8');

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

echo json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);