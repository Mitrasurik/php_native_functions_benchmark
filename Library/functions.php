<?php

function generateLargeHeavyArraySorted(int $size = 1_000_000, int $valueLength = 1_000_000, string $sortOrder = 'begin'): array {
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

    switch ($sortOrder) {
        case 'begin':
            asort($array);
            break;
        case 'end':
            arsort($array);
            break;
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
