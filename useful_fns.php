<?php

//Kötőjel után is nagybetű + sztringtisztításért felelős FUNCTION

function ucname($string) {
    $string =ucwords(strtolower($string));

    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}
?>