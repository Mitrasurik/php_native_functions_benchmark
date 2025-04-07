<?php 

function generateLargeHeavyArray(int $size = 1_000_000, int $valueLength = 1_000_000): array {
    $baseValues = [
        str_repeat('A', $valueLength),
        str_repeat('B', $valueLength),
        str_repeat('C', $valueLength),
        str_repeat('Z', $valueLength)
    ];

    $array = [];

    for ($i = 0; $i < $size; $i++) {
        $key = 'key_' . str_pad((string)$i, 8, '0', STR_PAD_LEFT);
        $value = $baseValues[$i % count($baseValues)];
        $array[$key] = $value;
    }

    return $array;
}

function unique_preserve_keys(array $array): array {
    $seen = [];
    $result = [];

    foreach ($array as $key => $value) {
        if (!isset($seen[$value])) {
            $seen[$value] = true;
            $result[$key] = $value;
        }
    }

    return $result;
}


$a = generateLargeHeavyArray(1000000, 1000000);

function array_unique_refactored($a): array {
  return array_keys(array_count_values($a));
}

$countOccurences = 0;
$start = microtime(true);
while (microtime(true) - $start < 10) {
  array_keys(array_count_values($a));
  $countOccurences++;
}

echo "Native php alternative - executions : {$countOccurences}\n";

$countOccurences = 0;
$start = microtime(true);
while (microtime(true) - $start < 10) {
  array_unique_refactored($a);
  $countOccurences++;
}

echo "array_unique refactored - executions : {$countOccurences}\n";

$countOccurences = 0;
$start = microtime(true);
while (microtime(true) - $start < 10) {
  array_unique($a);
  $countOccurences++;
}
echo "array_unique - executions : {$countOccurences} ";

