<?php

/**
 * @package   SQLayr
 * @author    Roderic Linguri
 * @copyright 2017 Digices LLC
 * @license   MIT
 */

namespace digices\sqlayr;

abstract class Database
{

  /** @property \PDO instance **/
  protected $pdo;

  /** @property string **/
  public $error;

  /** @property string **/
  protected $host;

  /** @property string **/
  protected $name;

  /** @property string **/
  protected $user;

  /** @property string **/
  protected $pass;

  /** @method constructor **/
  public function __construct() {

    $this->error = false;

    try {
      $this->pdo = new \PDO('mysql:host='.$this->host.';dbname='.$this->name, $this->user, $this->pass);
      $errorInfo = $this->pdo->errorInfo();
      if (isset($errorInfo[2])) {
        $this->error = $errorInfo[2];
      }
    } catch (\PDOException $e) {
      $this->error = $e->getMessage();
    }

    print $this->error;

  } // ./constructor

  /** @method Execute
    * @param  string (sql statement)
    * @return integer (affected rows)
    **/
  public function execute($sql) {
    if ($res = $this->pdo->exec($sql)) {
      return $res;
    } else {
      $errorInfo = $this->pdo->errorInfo();
      if (isset($errorInfo[2])) {
        $this->error = $errorInfo[2];
      }
      return false;
    }
  } // ./execute

  /** @method Insert
   * @param  string (sql statement)
   * @return integer (insert id)
   **/
  public function insert($sql) {
    if ($res = $this->pdo->exec($sql)) {
      return $this->pdo->lastInsertId();
    } else {
      $errorInfo = $this->pdo->errorInfo();
      if (isset($errorInfo[2])) {
        $this->error = $errorInfo[2];
      }
      return false;
    }
  } // ./insert

  /** @method Fetch
   * @param  string (sql statement)
   * @return mixed (assoc)
   **/
  public function fetch($sql) {
    if ($res = $this->pdo->query($sql,\PDO::FETCH_ASSOC)) {
      return $res->fetchAll();
    } else {
      $errorInfo = $this->pdo->errorInfo();
      if (isset($errorInfo[2])) {
        $this->error = $errorInfo[2];
      }
      return false;
    }
  } // ./fetch

}
