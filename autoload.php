<?php

/**
 * @package   SQLayr
 * @author    Roderic Linguri
 * @copyright 2017 Digices LLC
 * @license   MIT
 */

/** Autoload **/

namespace sqlayr;

function load_src() {
  $path = __DIR__.DIRECTORY_SEPARATOR.'src';
  $di = new \DirectoryIterator($path);
  foreach ($di as $item) {
    $fn = $item->getFilename();
    if (substr($fn, 0, 1) != '.') {
      require_once $path.DIRECTORY_SEPARATOR.$fn;
    }
  }
}

\sqlayr\load_src();
