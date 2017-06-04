# SQLayr #

_MySQL Database Wrapper for PHP using PDO_

#   #
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

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$affected_rows = $db->execute('UPDATE `test` SET <#column#> = <#value>;');
```

### Public Method: Insert ###

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Integer (Insert ID)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$insertId = $db->execute('INSERT INTO `test` (<#columns#>) VALUES (<#values#>);');
```

### Public Method: Fetch ###

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Array (Record Assocs)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$rows = $db->fetch('SELECT * FROM `test`;');
```
#   #
## Class Reference: Table ##

_Extend the Table class:_

```PHP
class MyTable extends \sqlayr\Table
{
  /** @property MyTable (instance) **/
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
    $this->database = MyDatabase::shared();
    $this->name = 'test';
    $this->columns = array('first','last');
    parent::__construct();
  } // ./construct

} // ./MyDatabase
```

_Available Methods:_

### Public Method: Insert Row ###

###### PARAMETERS: ######
Array (Record Assoc)

###### RETURN: ######
Integer (ID of inserted row)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$id = $tbl->insertRow(array('first' => 'Test','last' => 'Testerson'));
```

### Public Method: Fetch Rows By Column ###

###### PARAMETERS: ######
String (Column Name)
Any (Value)

###### RETURN: ######
Array (Record Assocs)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$rows = $tbl->fetchRowsByColumn('last','Testerson');
```

### Public Method: Fetch Row By Id ###

###### PARAMETERS: ######
Integer (ID)

###### RETURN: ######
Assoc (Record)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$row = $tbl->fetchRowById(1);
```

