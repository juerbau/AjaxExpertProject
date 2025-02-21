<?php

$file = __DIR__ . '/DBentry/PWI_Abnahmeprotokoll 2024-2028 Fa. ACTS.xlsx';

$zip = new \ZipArchive();
$zip->open($file, ZipArchive::CREATE);

$zip->extractTo(__DIR__);

