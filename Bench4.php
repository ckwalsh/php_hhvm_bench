<?php

define ('ITERATIONS', 1000000);

class A {
  function b($a) {
    return;
  }
}

class Bench4 {
  public static function run() {
    $a = new A();
    for ($i = 0; $i < ITERATIONS; ++$i) {
      $a->b(1);
    }

    for ($i = 0; $i < ITERATIONS; ++$i) {
      call_user_func_array(array($a, 'b'), array(1));
    }
  }
}

$time = microtime(true);
Bench4::run();
echo (microtime(true) - $time);
