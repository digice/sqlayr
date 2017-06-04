<?php

/**
  * NOTE: You must create the Database and Test Table by running
  * the file create_db.sql on your mysql instance
  * before running any of these tests.
  **/

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'autoload.php';

class TestDatabase extends \sqlayr\Database
{

  protected static $shared;

  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  }

  public function __construct()
  {
    $this->host = 'localhost';
    $this->name = 'mysqltest';
    $this->user = 'mysqltest';
    $this->pass = 'mysqltest';
    parent::__construct();
  }

}

class TestTable extends \mysql\Table
{

  protected static $shared;

  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  }

  public function __construct()
  {
    $this->database = TestDatabase::shared();
    $this->name = 'test';
    $this->columns = array('first','last');
    parent::__construct();
  }

}

function test_insert() {

  echo PHP_EOL.'**** TEST INSERT ****'.PHP_EOL;

  $table = TestTable::shared();

  $assoc = array('first' => 'Test','last' => 'Testerson');

  $table->insertRow($assoc);

  if (isset($table->error)) {
    echo $table->error.PHP_EOL;
  }

}

function test_fetch() {

  echo PHP_EOL.'**** TEST FETCH ****'.PHP_EOL;

  $table = TestTable::shared();

  $row = $table->fetchRowById(1);

  if (isset($table->error)) {
    echo $table->error.PHP_EOL;
  }

  print_r($row);

}

function test_update() {

  echo PHP_EOL.'**** TEST UPDATE ****'.PHP_EOL;

  $table = TestTable::shared();

  $table->updateRowById(1,'first','Testy');

  $row = $table->fetchRowById(1);

  if ($row['first'] == 'Testy') {
    echo 'PASS'.PHP_EOL;
  } else {
    echo 'FAIL'.PHP_EOL;
  }

  if (isset($table->error)) {
    echo $table->error.PHP_EOL;
  }

}

function test_delete() {

  echo PHP_EOL.'**** TEST DELETE ****'.PHP_EOL;

  $table = TestTable::shared();

  $table->deleteRowById(1);

}

test_insert();
test_fetch();
test_update();
test_delete();
