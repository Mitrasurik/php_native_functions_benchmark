<?php 

include "Library/functions.php";



function array_unique_benchmark(int $size, int $valueLength, string $sortOrder) {
    echo "Beging benchmark with size : $size, elementSize $valueLength, sorting type '$sortOrder'. \n";
    echo "\n\n\n";
    $a = generateLargeHeavyArraySorted($size, $valueLength, $sortOrder);

    $countOccurences = 0;
    $start = microtime(true);
    while (microtime(true) - $start < 10) {
      array_keys(array_count_values($a));
      $countOccurences++;
    }

    echo "Native php alternative : array_keys(array_count_values()) - count : {$countOccurences}\n";

    $countOccurences = 0;
    $start = microtime(true);
    while (microtime(true) - $start < 10) {
      array_keys(array_flip($a));
      $countOccurences++;
    }

    echo "Native php alternative : array_keys(array_flip()) - count : {$countOccurences}\n";

    $countOccurences = 0;
    $start = microtime(true);
    while (microtime(true) - $start < 10) {
      unique_preserve_keys($a);
      $countOccurences++;
    }

    echo "Custom implementation : unique_preserve_keys - count : {$countOccurences}\n";

    $countOccurences = 0;
    $start = microtime(true);
    while (microtime(true) - $start < 10) {
      array_unique($a);
      $countOccurences++;
    }
    echo "array_unique - count : {$countOccurences}\n";
}

array_unique_benchmark(10, 10, 'begin');
array_unique_benchmark(10, 10, 'end');
array_unique_benchmark(10, 10, 'random');

array_unique_benchmark(10, 100, 'begin');
array_unique_benchmark(10, 100, 'end');
array_unique_benchmark(10, 100, 'random');

array_unique_benchmark(10, 1_000, 'begin');
array_unique_benchmark(10, 1_000, 'end');
array_unique_benchmark(10, 1_000, 'random');

array_unique_benchmark(1_000, 10, 'begin');
array_unique_benchmark(1_000, 10, 'end');
array_unique_benchmark(1_000, 10, 'random');

array_unique_benchmark(1_000, 100, 'begin');
array_unique_benchmark(1_000, 100, 'end');
array_unique_benchmark(1_000, 100, 'random');

array_unique_benchmark(1_000, 1_000, 'begin');
array_unique_benchmark(1_000, 1_000, 'end');
array_unique_benchmark(1_000, 1_000, 'random');

array_unique_benchmark(1_000_000, 10, 'begin');
array_unique_benchmark(1_000_000, 10, 'end');
array_unique_benchmark(1_000_000, 10, 'random');

array_unique_benchmark(1_000_000, 100, 'begin');
array_unique_benchmark(1_000_000, 100, 'end');
array_unique_benchmark(1_000_000, 100, 'random');

array_unique_benchmark(1_000_000, 1_000, 'begin');
array_unique_benchmark(1_000_000, 1_000, 'end');
array_unique_benchmark(1_000_000, 1_000, 'random');

array_unique_benchmark(1_000_000_0, 10, 'begin');
array_unique_benchmark(1_000_000_0, 10, 'end');
array_unique_benchmark(1_000_000_0, 10, 'random');

array_unique_benchmark(1_000_000_0, 100, 'begin');
array_unique_benchmark(1_000_000_0, 100, 'end');
array_unique_benchmark(1_000_000_0, 100, 'random');

array_unique_benchmark(1_000_000_0, 1_000, 'begin');
array_unique_benchmark(1_000_000_0, 1_000, 'end');
array_unique_benchmark(1_000_000_0, 1_000, 'random');