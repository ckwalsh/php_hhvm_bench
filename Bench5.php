<?php
/*
  PHP Benchmark
  Copyright John Post StarFixIT
  Downloaded from: http://onlinephpfunctions.com
 */

class Bench5
{

    public static function run()
    {
      $bm = new Bench5();

      $bm->benchmark_Math();
      $bm->benchmark_StringManipulation();
      $bm->benchmark_Loops();
      $bm->benchmark_IfElse();
    }

    function __construct() {
    }

    function benchmark_Math($runCount = 50000)
    {
        $functions = array("abs", "acos", "asin", "atan", "bindec", "floor", "exp", "sin", "tan", "pi", "is_finite", "is_nan", "sqrt");
        for ($i = 0; $i < $runCount; $i++) {
            foreach ($functions as $function) {
                 call_user_func_array($function, array($i));
            }
        }
    }

    function benchmark_StringManipulation($runCount = 50000)
    {
        $functions = array("addslashes", "chunk_split", "metaphone", "strip_tags", "md5", "sha1", "strtoupper", "strtolower", "strrev", "strlen", "soundex", "ord");
        $string = "the quick brown fox jumps over the lazy dog";
        for ($i = 0; $i < $runCount; $i++) {
            foreach ($functions as $function) {
                 call_user_func_array($function, array($string));
            }
        }
    }

    function benchmark_Loops($runCount = 3000000)
    {
        for ($i = 0; $i < $runCount; ++$i)
            ;
        $i = 0;
        while ($i < $runCount)
            ++$i;
    }

    function benchmark_IfElse($runCount = 3000000)
    {
        for ($i = 0; $i < $runCount; $i++) {
            if ($i == -1) {

            } elseif ($i == -2) {

            } else if ($i == -3) {

            }
        }
    }

}

$time = microtime(true);
Bench5::run();
echo (microtime(true) - $time);
