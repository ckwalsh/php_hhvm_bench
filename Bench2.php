<?php

class Bench2 {
  public static function run() {
    $elements = array();

    ////
    // An array of 10,000 elements with random string values
    ////
    for($i = 0; $i < 1000000; $i++) {
            $elements[] = (string)rand(10000000, 99999999);
    }

    ////
    // for test
    ////
    for($i = 0; $i < count($elements); $i++) { }

    ////
    // foreach test
    ////
    foreach($elements as $element) { }
  }
}

$time = microtime(true);
Bench2::run();
echo (microtime(true) - $time);
