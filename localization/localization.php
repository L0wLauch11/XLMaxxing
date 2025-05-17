<?php

$currentLanguage = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
$supportedLanguages = ['en', 'de'];

$loadedLanguages = [];

foreach ($supportedLanguages as $supportedLanguage) {
    if ($supportedLanguage == 'en') {
        // I am writing this program in English, thus no translation file is needed
        continue;
    }

    $loadedLanguages[$supportedLanguage] = require_once "languages/$supportedLanguage.php";
    //print_r($loadedLanguages[$supportedLanguage]);
}

if (!in_array($currentLanguage, $supportedLanguages)) {
    $currentLanguage = 'en';
}

function tl(string $englishString): string {
    global $loadedLanguages;
    global $currentLanguage;

    if ($currentLanguage == 'en' ||
            !array_key_exists($englishString, $loadedLanguages[$currentLanguage])) {
        return $englishString;
    }

    return $loadedLanguages[$currentLanguage][$englishString];
}