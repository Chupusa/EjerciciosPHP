<?php
  $object = new Son;
  $object->test();
  $object->test2();

  class Dad
  {
    function test()
    {
      echo "[Class Dad] Yo Soy tu Padre<br>";
    }
  }

  class Son extends Dad
  {
    function test()
    {
      echo "[Class Son] Yo Soy Luke<br>";
    }
  	
    function test2()
    {
      parent::test();
    }
  }
?>