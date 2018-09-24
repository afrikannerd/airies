<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 12:01 PM
 */

namespace Framework;


class Schema
{


    /**SQL execution error container
     *
     * @var array $errors
     *
     */
    private $errors = [];

    /**container of columns and sql statements passed to the Schema class for processing
     *
     * @var array $select
     *
     */
    private $select = [];

    /**container of clauses to be used with the 'WHERE' statements
     *
     * @var array $where
     *
     */
    private $where = [];

    /**container of 'JOIN' statements
     *
     * @var array $join
     *
     */
    private $join = [];

    /**container of clauses to be used with the 'HAVING' statements
     *
     * @var array $having
     *
     */
    private $having = [];

    /**container of clauses to be used with the 'UNION' statements
     *
     * @var array $union
     *
     */
    private $union = [];

    /**container of columns to be used with the 'ORDER BY' statements
     *
     * @var array $orderBy
     *
     */
    private $orderBy = [];

    /**container of columns to be used with the 'GROUP BY' statements
     *
     * @var array $groupBy
     *
     */
    private $groupBy = [];

    /**container of values to be bound to the sql statements at runtime
     *
     * @var array $binding
     *
     */
    private $binding = [];

    /**Container of data due for insertion or update by the application
     *
     * @var array $data
     *
     */
    private $data = [];

    /**Result index from which to return the result
     *
     * @var int $offset
     *
     */
    private $offset = 0;

    /**The maximum number of rows that can be returned in a resultset
     *
     * @var $limit
     *
     */
    private $limit;

    /**The last insert id in a succesful 'INSERT' operation
     *
     * @var $lastID
     *
     */
    private $lastID;

    /**The number of rows returned in an SQL 'SELECT' operation
     *
     * @var $numrows
     *
     */
    private $numrows;

    /**
     *
     * @var \PDO $instance
     *
     */
    private $pdo = null;

    /**Current table in use by the application query
     *
     * @var string $table
     *
     */
    private $table = "";

    private $query = null;

    private $success = false;

    /**
     * Schema constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {

        $this->app = $app;
        $this->pdo();
    }

    /**
     * Creates a \PDO connection
     * @return void
     */
    function pdo()
    {
        if(!$this->pdo instanceof \PDO)
        {

            try{
                $this->pdo = new \PDO("mysql:host=localhost;dbname=schoolcms;","root","banter");
            }
            catch (\PDOException $ex)
            {
                #$this->app->log->exception($ex);
            }

        }
    }

    /**Execute the sql query
     * @param $sql
     * @return mixed
     */
    function query($sql)
    {

        $this->success = false;
        if($this->query = $this->pdo->prepare($sql))
        {


            if($this->binding)
            {
                foreach ($this->binding as $key => $val)
                {
                    echo $key." ".$val,"<br>";

                    $this->query->bindValue(++$key,$val);
                }

            }
            print($this->query->queryString);

            if($this->query->execute())
            {
                $this->numrows = $this->query->rowCount();
                $this->success = true;

            }
            #dnd([$this->binding,$this->query->fetchAll(\PDO::FETCH_OBJ)]);
            $this->errors = $this->query->errorInfo();

        }else{
            $this->errors = $this->query->errorInfo();
        }

        return $this;

    }
    function select()
    {
        $this->select = array_merge($this->select,func_get_args());
        return $this;
    }
    function update(string $table = null)
    {
        $this->table($table);

        $sql = "UPDATE ".$this->table." SET ".$this->prepareUpdate();
        $result = $this->query($sql);
        $this->_reset();
        return $result;
    }

    /**Insert a record into the database
     * @param string|null $table
     * @return mixed
     */
    function insert(string $table = null)
    {
        $this->table($table);
        $sql = "INSERT INTO {$this->table} ";
        $sql .= $this->prepareInsert();
        #dnd($sql);
        $result = $this->query($sql);
        $this->_reset();
        return $result;
    }

    /**Delete a database record
     * @param $sql
     * @param null $args
     * @return bool
     */
    function delete($sql,$args = null)
    {

        $sql = "DELETE FROM {$this->table} WHERE".$sql;
        $this->bind($args);

        $result = $this->query($sql);
        $this->_reset();
        return $result;

    }
    function union()
    {
        $this->union = func_get_args();
        return $this;
    }

    /**SQL JOIN clauses
     * @param $sql
     * @param null $args
     * @return $this
     */
    function join($sql,$args = null)
    {
        $args =  func_get_args();
        $this->join[] = array_shift($args);
        $this->bind($args);
        return $this;
    }

    /**SQL HAVING clauses
     * @param string $sql
     * @param null $param
     * @return $this
     */
    function having(string $sql,$param = null)
    {
        $this->having[] = $sql;
        if($param)
        {
            $this->bind($param);
        }
        return $this;
    }

    /**0778224403
     * @param string $sql
     * @param mixed ...$args
     */
    function where(string $sql, ...$args)
    {
        $this->where[] = $sql;
        if($args)
        {
            $this->bind($args);
        }
        return $this;
    }

    /**
     * @param string $col
     * @param string $sort
     * @return $this
     */
    function orderBy(string $col, $sort = "ASC")
    {   
        $this->orderBy = [$col,$sort];
        return $this;
    }

    /**
     * @return $this
     */
    function groupBy()
    {
        $this->groupBy = array_merge($this->groupBy,func_get_args());
        return $this;
    }

    /**
     * @param int $limit
     * @param null $offset
     * @return $this
     */
    function limit($limit = 5, $offset = null)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param $args
     */
    private function bind($args)
    {
        if(is_array($args))
        {
            $this->binding = array_merge($this->binding,$args);

        }elseif($args)
        {
            $this->binding[] = $args;
        }
    }

    /**Accepts the table name
     * @param $table
     * @return $this
     */
    function from($table)
    {
        $this->table($table);
        return $this;
    }

    /**
     * @return string
     */
    function prepareSelect()
    {
        
        $sql = "SELECT ";

        if($this->select)
        {
            $sql .= implode(" , ",$this->select);
        }else{
            $sql .= " * ";
        }

        $sql .= " FROM ".$this->table;
        if($this->join)
        {
            $sql .= " ".implode(" ",$this->join);
        }

        if($this->where)
        {
            $sql .= " WHERE ".implode("  AND",$this->where);
        }

        if($this->having)
        {
            $sql .= " HAVING ".implode("  ",$this->having);
        }

        if($this->groupBy)
        {
            $sql .= " GROUP BY ".implode(" , ",$this->groupBy);
        }

        if($this->orderBy)
        {
            $sql .= " ORDER BY ".implode("  ",$this->orderBy);
        }
        #dnd($sql);
        return $sql;
    }

    /**
     * @param null $table
     * @return mixed
     */
    function fetch($table = null)
    {
        $this->table($table);
        $this->query($this->prepareSelect());
        $result = $this->query->fetch(\PDO::FETCH_OBJ);
        $this->_reset();
        return $result;
    }

    /**
     * @param null $table
     * @return mixed
     */
    function fetchAll($table = null)
    {
        $this->table($table);
        $this->query($this->prepareSelect());
        $result = $this->query->fetchAll(\PDO::FETCH_OBJ);
        $this->_reset();
        return $result;
    }
    /**
     * @param string $key
     * @param $value
     * @return Schema
     */
    function data(string $key,$value):self
    {
        $this->data[] = $key;
        $this->bind($value);
        return $this;
    }

    /**
     * @return string
     */
    function prepareInsert()
    {
        $sql = '('.join(',',array_values($this->data)).') VALUES (';

        for ($i = 0; $i < count($this->data);$i++)
        {
            $sql .= ' ?,';
        }


        $sql = rtrim($sql,',');
        $sql .= ')';
        if($this->where)
        {
            $sql .= ' WHERE '.implode(' ',$this->where);
        }

        return $sql;

    }

    /**
     * @return string
     */
    function prepareUpdate()
    {
        $sql = join('=?,',array_values($this->data));

        $sql .= "=?";
        if($this->where)
        {
            $sql .= " WHERE ".join('',$this->where);
        }
        return $sql;
    }

    /**
     * @param $table
     */
    private function table($table)
    {
        if($table)
        {
            $this->table = $table;
        }
    }
    
    public function errors() {
        return $this->errors;
    }

    function lastID()
    {
        return $this->lastID;
    }
    public function success()
    {
        return $this->success;
    }
    
    public function _reset()
    {
        $this->data = [];
        $this->query = null;
        $this->binding = [];
        $this->errors = [];
        $this->having = [];
        $this->join = [];
        $this->groupBy = [];
        $this->orderBy = [];
        $this->select = [];
        $this->union = [];
        $this->where = [];

    }


}