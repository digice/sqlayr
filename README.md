# SQLayr #

_MySQL Database Wrapper for PHP using PDO_

- Author: Roderic Linguri <linguri@digices.com>
- Version: 0.4.1
- Copyright: 2017 Digices LLC

---
###### CLASS REFERENCE ######
## Database ##

_Example Implementation:_

```PHP
class MyDatabase extends \digices\sqlayr\Database
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
---
_Available Properties:_

### Error ###
String (PDOException description)

---
_Available Methods:_

### Execute ###

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$affected_rows = $db->execute('UPDATE `test` SET <#column#> = <#value#>;');
```

### Insert ###

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Integer (Insert ID)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$insertId = $db->execute('INSERT INTO `test` (<#columns#>) VALUES (<#values#>);');
```

### Fetch ###

###### PARAMETERS: ######
String (SQL Statement)

###### RETURN: ######
Array (Record Assocs)

###### EXAMPLE: ######
```PHP
$db = MyDatabase::shared();
$rows = $db->fetch('SELECT * FROM `test`;');
```
---
###### CLASS REFERENCE ######
## Table ##

_Example Implementation:_

```PHP
class MyTable extends \digices\sqlayr\Table
{
  /** @property MyTable (instance) **/
  protected static $shared;

  /** @method MyTable (getter) **/
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

} // ./MyTable
```

---
_Available Properties:_

### Error ###
String (PDOException description)

---
_Available Methods:_

### Insert Row ###

###### PARAMETERS: ######
Array (Record Assoc)

###### RETURN: ######
Integer (ID of inserted row)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$id = $tbl->insertRow(array('first' => 'Test','last' => 'Testerson'));
```
###### NOTE: ######
_If no values for columns `created` and/or `updated` are provided, these will get set automatically_

### Fetch Rows By Column ###

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

### Fetch Row By Id ###

###### PARAMETERS: ######
Integer (ID)

###### RETURN: ######
Assoc (Record)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$row = $tbl->fetchRowById(1);
```

### Update Rows By Column ###

###### PARAMETERS: ######
String (Match Column Name)
Any (Match Value)
String (Set Column Name)
Any (Set Column Value)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$affected = $tbl->updateRowsByColumn('last','Testerson','first','Testy');
```

### Update Row By Id ###

###### PARAMETERS: ######
Integer (ID)
String (Set Column Name)
Any (Set Column Value)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$affected = $tbl->updateRowById(1,'first','Testy');
```

### Delete Rows By Column ###

###### PARAMETERS: ######
String (Match Column Name)
Any (Match Value)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$affected = $tbl->deleteRowsByColumn('last','Testerson');
```

### Delete Row By Id ###

###### PARAMETERS: ######
Integer (ID)

###### RETURN: ######
Integer (Affected Rows)

###### EXAMPLE: ######
```PHP
$tbl = MyTable::shared();
$affected = $tbl->deleteRowById(1);
```
