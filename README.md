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
$db = MyDatabase::shared();
$affected_rows = $db->execute('UPDATE `test` SET <#column#> = <#value>;');
```

### Public Method: Insert ###

###### PARAMETERS ######
String (SQL Statement)

###### RETURN ######
Integer (Insert ID)

###### EXAMPLE ######
```PHP
$db = MyDatabase::shared();
$insertId = $db->execute('INSERT INTO `test` (<#columns#>) VALUES (<#values#>);');
```

### Public Method: Fetch ###
```PHP
$db = MyDatabase::shared();
$rows = $db->fetch('SELECT * FROM `test`;');
```

