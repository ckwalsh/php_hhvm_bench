<?php

class Foo
{
  public $self;
  public $var = '3.1415962654';
}

class Bench3 {
  public static function run() {
    $baseMemory = memory_get_usage();

    for ($i = 0; $i <= 2500000; $i++)
    {
      $a = new Foo;
      $a->self = $a;
    }
  }
}

$time = microtime(true);
Bench3::run();
echo (microtime(true) - $time);
