<?php

/**
 * @package   SQLayr
 * @author    Roderic Linguri
 * @copyright 2017 Digices LLC
 * @license   MIT
 */

namespace digices\sqlayr;

/** @function Quoted String or NULL
  * @descr    If no string, return NULL, otherwise return quoted/escaped string
  * @param    string
  * @return   string
  **/
function quoted_string_or_null($str) {
  if (strlen($str) > 0) {
    return "'".str_replace("'", "\\'", $str)."'";
  } else {
    return 'NULL';
  }
} // ./quoted_string_or_null

/** @function Asserted String
  * @descr    Make sure we at least have an empty string
  * @param    string
  * @return   string
  **/
function asserted_string($str) {
  if (strlen($str) > 0) {
    return "'".str_replace("'", "\\'", $str)."'";
  } else {
    return "''";
  }
} // ./asserted_string
