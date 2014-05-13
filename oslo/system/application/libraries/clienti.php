<?php

/* 
 * creo la mia classe per i clienti
 */
 
// controllo sul percorso della Library
if (!defined('BASEPATH')) 
{
  // interruzione in caso di esito negativo del controllo
  exit('No direct script access allowed');
}
// dichiarazione della classe
class Clienti {
  // funzione di classe
//  var $nome;
//  var $cognome;
//  var $telefono;
  
  function add($e) {
    // operazioni ed eventuale valore di ritorno
      $e=$e.$e;
      return $e;
  }
}

