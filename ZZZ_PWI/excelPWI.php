<?php

$file = __DIR__ . '/DBentry/PWI_Abnahmeprotokoll 2024-2028 Fa. ACTS.xlsx';

$zip = new \ZipArchive();
$zip->open($file, ZipArchive::CREATE);

$xml = $zip->getFromName('xl/worksheets/sheet2.xml');
// var_dump($xml);

$dom = new \DOMDocument();
$dom->loadXML($xml);

$xpath = new \DOMXPath($dom);

$rootNamespace = $dom->lookupNamespaceUri($dom->namespaceURI);
// var_dump($rootNamespace);
// exit("vorbei");
$xpath->registerNamespace('xls', $rootNamespace);
// $xpath->registerNamespace('o', 'http://schemas.openxmlformats.org/markup-compatibility/2006');

$query = "//xls:sheetData/xls:row[4]/xls:c[@r='B4']";
// $query = "//xls:sheetData/xls:row/xls:c/xls:v";

$results = $xpath->evaluate($query);

foreach ($results as $result) {
    var_dump($result->nodeValue);
}
