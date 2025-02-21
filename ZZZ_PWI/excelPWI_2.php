<?php

$file = __DIR__ . '/DBentry/PWI_Abnahmeprotokoll 2024-2028 Fa. ACTS.xlsx';

$zip = new \ZipArchive();
$zip->open($file, ZipArchive::CREATE);

$xml = $zip->getFromName('xl/sharedStrings.xml');
// var_dump($xml);

$dom = new \DOMDocument();
$dom->loadXML($xml);

$xpath = new \DOMXPath($dom);

$rootNamespace = $dom->lookupNamespaceUri($dom->namespaceURI);
// var_dump($rootNamespace);
// exit("vorbei");
$xpath->registerNamespace('xls', $rootNamespace);
// $xpath->registerNamespace('o', 'http://schemas.openxmlformats.org/markup-compatibility/2006');

$query = "//xls:sst/xls:si[105]/xls:t";
// $query = "//xls:sheetData/xls:row/xls:c/xls:v";

$results = $xpath->evaluate($query);
// var_dump($results->nodeValue);

$element = $results->item(0);
// var_dump($element);
$element->nodeValue = "Leck die Katz am Arsch";

$dom = $xpath->document;
$xml = $dom->saveXML();
$zip->addFromString('xl/sharedStrings.xml', $xml, \ZIPARCHIVE::FL_OVERWRITE);

