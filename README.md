# SQLayr #

_MySQL Database Wrapper for PHP using PDO_

## Class Reference: Database ##

_Extend the Database class:_

```PHP
class MyDatabase extends \sqlayr\Database
{
  /** @property MyDatabase (instance) **/
  protected static $shared;

  /** @method MyDatabase (getter) **/
  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  } // ./shared

  /** @method constructor **/
  public function __construct()
  {
    $this->host = 'localhost';
    $this->name = 'mydb';
    $this->user = 'mydb';
    $this->pass = 'secret';
    parent::__construct();
  } // ./construct

} // ./MyDatabase
```

_Available Methods:_

### Public Method: Execute ###
```PHP
$affected_rows = MyDatabase->execute('UPDATE `test` SET <#column#> = <#value>;');
```

### Public Method: Insert ###
```PHP
$insertId = MyDatabase->execute('INSERT INTO `test` (<#columns#>) VALUES (<#values#>);');
```

### Public Method: Fetch ###
```PHP
$rows = MyDatabase->fetch('SELECT * FROM `test`;');
```

