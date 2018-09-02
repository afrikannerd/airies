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
    /**
     * @var Schema $instance
     */
    private $pdo = null;

    private $table = "";
    private $select = [];
    private $where = [];
    private $join = [];
    private $having = [];
    private $union = [];
    private $orderBy = [];
    private $groupBy = [];
    private $offset;
    private $limit;
    private $lastID;
    private $numrows;
    private $binding = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->pdo();
    }
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
    function query()
    {}
    function select()
    {
        $this->select[] = func_get_args();
        return $this;
    }
    function update(string $table = null)
    {}
    function insert(string $table = null)
    {}
    function delete(string $table = null)
    {}
    function union()
    {}
    function join()
    {}
    function having()
    {}

    /**
     * @param string $sql
     * @param mixed ...$args
     */
    function where(string $sql, ...$args)
    {
        $this->where[] = $sql;
        $this->bind($args);
    }
    function orderBy(string $col, $sort = "ASC")
    {
        $this->orderBy = [$col,$sort];
    }
    function groupBy()
    {}
    function limit($limit, $offset)
    {}


    private function bind($args)
    {
        if(is_array($args))
        {
            $this->binding = array_merge($this->binding,$args);
        }else
        {
            $this->binding[] = $args;
        }
    }

}