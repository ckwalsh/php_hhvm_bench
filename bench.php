<?php

$ports = array(
  'Zend' => 1666,
  'HHVM' => 1667,
);
$baseline = 'Zend';
$tests = 5;
$runs = 10;
$results = array();

foreach ($ports as $server => $port) {
  $base_url = "http://localhost:$port/bench";
  $results[$server] = array();
  for ($i = 1; $i <= $tests; $i++) {
    $url = "$base_url/Bench$i.php";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $time = 0;
    for ($j = 0; $j < $runs; $j++) {
      $t = (float) curl_exec($ch);
      echo "$server - Test $i.$j: $t\n";
      $time += $t;
    }
    $results[$server][$i] = $time;
    $avg = $time / $runs;
    echo "$server - Test $i.avg: $avg\n";
  }
}

echo "\n";
echo "=== Ratios (Higher is Better) ===\n";
$padding = 0;
$servers = array_keys($ports);
foreach ($servers as $server) {
  $padding = max($padding, strlen($server));
}

$padding += 1;

echo " Test ";
foreach ($servers as $server) {
  printf("| %{$padding}s ", $server);
}
echo "\n";

for ($i = 1; $i <= $tests; $i++) {
  printf(" %4d ", $i);
  $base = $results[$baseline][$i];
  foreach ($servers as $server) {
    $ratio = $base / $results[$server][$i];
    printf("| % {$padding}.2f ", $ratio);
  }
  echo "\n";
}
