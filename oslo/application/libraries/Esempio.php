<?php

/* 
 * creo classe esempio
 */
 
// controllo sul percorso della Library
if (!defined('BASEPATH')) 
{
  // interruzione in caso di esito negativo del controllo
  exit('No direct script access allowed');
}
// dichiarazione della classe
class Esempio {
    
    function show_hello_world()
  {
    $risultato=5;   
    return $risultato;
  }
    
}

