<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

echo "Checking code coverage.\n";

$inputFile = $argv[1];

if (!is_file($inputFile)) {
    if (!file_exists($inputFile)) {
        throw new InvalidArgumentException(sprintf('Missing file: "%s".', $inputFile));
    }

    throw new InvalidArgumentException(sprintf('Invalid input file provided: "%s".', $inputFile));
}

if (!is_numeric($argv[2])) {
    throw new InvalidArgumentException('Given percentage to match must be a number (second parameter).');
}

$percentage = min(100, max(0, (int) $argv[2]));

$file = file_get_contents($inputFile);

if (!is_string($file)) {
    throw new InvalidArgumentException(sprintf('Failed to read file: "%s".', $inputFile));
}

$xml = new SimpleXMLElement($file);
$metrics = $xml->xpath('//metrics');
$totalElements = 0;
$checkedElements = 0;

foreach ($metrics as $metric) {
    $filePath = (string) $metric['name'];

    $totalElements += (int) $metric['elements'];
    $checkedElements += (int) $metric['coveredelements'];
}

$coverage = ($checkedElements / $totalElements) * 100;

if ($coverage < $percentage) {
    echo sprintf("Code coverage is %.2f%%, which is below the accepted %.2f%%.\n", $coverage, $percentage);
    die(1);
}

echo sprintf("Code coverage is %.2f%% - OK!\n", $coverage);
