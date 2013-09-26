<?php

class Bench1 {
  public static function run() {
    $r = 10 * 1000 * 1000;

    while($r-- > 0) {
      new StdClass();
    }
  }
}

$time = microtime(true);
Bench1::run();
echo (microtime(true) - $time);
