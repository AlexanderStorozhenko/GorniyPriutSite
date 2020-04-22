<?php

class Db
{

    protected static $_instance;
    protected $pdo;
    protected $lastId;
    protected $where = [];
    protected $order = [];
    protected $limit = [];
    protected $groupBy = [];
    protected $select = [];
    protected $update = [];
    protected $insert = [];
    protected $delete = [];
    protected $join = [];
    protected $create = [];

    protected $tbName = '';

    protected function __construct()
    {

        $db_settings = include('settings.php');
        $this->pdo = new PDO($db_settings['dsn'], $db_settings['user'], $db_settings['pass'], $db_settings['opt']);

    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function selectBuild($table,$debug = false)
    {

        $selectTmp = [];

        if (!empty($this->select)) {
            foreach ($this->select as $key => $val) {
                if ($key == '' || is_numeric($key)) {
                    $selectTmp[] = $val;
                } else {
                    $selectTmp[] = $val . ' as ' . $key;
                }
            }

            $queryString = 'SELECT ';
            $queryString .= implode(',', $selectTmp);
            $queryString .= ' FROM ' . $table . " ";

            if (!empty($this->join)) {
                $queryString .= " " . $this->join['type'] . " JOIN " . $this->join['table'];
                $queryString .= " ON ." . $this->join['cond'];
            }

            if (!empty($this->where)) {
                $queryString .= ' WHERE ';
                $whereTmpArray = [];
                foreach ($this->where as $key => $val) {
                    $keyData = explode('#', $key);
                    $keyData = count($keyData) == 1 ? ['=', $keyData[0]] : $keyData;

                    if (in_array($keyData[0], ['<', '>', '=', '!=', '>=', '<='])) {
                        $whereTmpArray[] = $keyData[1] . ' ' . $keyData[0] . ' ' . $val . ' ';
                    } else {
                        $whereTmpArray[] = $keyData[1] . ' = ' . $val . ' ';
                    }
                }
                $queryString .= implode(' AND ', $whereTmpArray);
            }

            if (!empty($this->groupBy)) {
                $queryString .= " GROUP BY " . $this->groupBy;
            }
            if (!empty($this->order)) {
                $queryString .= " ORDER BY " . implode(',', $this->order['values']) . ' ' . $this->order['type'];
            }
            if (!empty($this->limit)) {
                $queryString .= " LIMIT " . $this->limit['limit'] . " OFFSET " . $this->limit['offset'];
            }
            if($debug)
             echo $queryString;
            $data = $this->pdo->query($queryString);
            $queryData = $data->fetchAll();
            $this->clear();
            return $queryData;
        }
    }

    public function updateBuild($table)
    {
        $queryString = 'UPDATE ';
        $queryString .= $table . ' SET ';
        // $queryString .= implode(',', $this->update);
        $updateTmp = [];
        if (!empty($this->update)) {
            foreach ($this->update as $key => $value) {
                $updateTmp[] = $key . ' = ' . $value . ' ';
            }
        }
        $queryString .= implode(',', $updateTmp);
        if (!empty($this->where)) {
            $queryString .= ' WHERE ';
            $whereTmpArray = [];
            foreach ($this->where as $key => $val) {
                $keyData = explode('#', $key);
                $keyData = count($keyData) == 1 ? ['=', $keyData[0]] : $keyData;

                if (in_array($keyData[0], ['<', '>', '=', '!=', '>=', '<='])) {
                    $whereTmpArray[] = $keyData[1] . ' ' . $keyData[0] . ' ' . $val . ' ';
                } else {
                    $whereTmpArray[] = $keyData[1] . ' = ' . $val . ' ';
                }
            }
            $queryString .= implode(' AND ', $whereTmpArray);
        }
        echo $queryString;
        $data = $this->pdo->query($queryString);
        $queryData = $data->fetchAll();

        $this->clear();
        return $queryData;
    }

    public function insertBuild($table)
    {
        $queryString = 'INSERT INTO ';
        $queryString .= $table . ' VALUES ';
        $queryString .= '(' . implode(',', $this->insert) . ')';
        echo $queryString;
        $data = $this->pdo->query($queryString);
        $queryData = $data->fetchAll();

        $this->clear();
        return $queryData;
    }

    public function deleteBuild($table)
    {
        $deleteTmp = [];


        $queryString = 'DELETE ';
        $queryString .= ' FROM ' . $table . " ";

        if (!empty($this->where)) {
            $queryString .= ' WHERE ';
            $whereTmpArray = [];
            foreach ($this->where as $key => $val) {
                if (in_array(explode('#', $key)[0], ['<', '>', '=', '!', '>=', '<='])) {
                    if ($key[0] == '!') {
                        $whereTmpArray[] = $key[1] . ' ' . $key[0] . '= ' . $val . ' ';
                    } else {
                        $whereTmpArray[] = $key[1] . ' ' . $key[0] . ' ' . $val . ' ';
                    }
                } else {
                    $whereTmpArray[] = $key . ' = ' . $val . ' ';
                }
            }
            $queryString .= implode(' AND ', $whereTmpArray);
        }
//        echo $queryString;
        $data = $this->pdo->query($queryString);
        $queryData = $data->fetchAll();
        $this->clear();
        if (count($queryData) == 1)
            return $queryData[0];
        return $queryData;

    }

    protected static function IjectionCheck($string)
    {

    }

    public function select(array $array = ['*'])
    {
        $this->select = array_merge($this->select, $array);
        return $this;
    }

    public function insert(array $values)
    {
        $this->insert = array_merge($this->insert, $values);
        return $this;
    }

    public function update(array $array)
    {
        $this->update = array_merge($this->update, $array);
        return $this;
    }

    public function where(array $array)
    {
        $this->where = array_merge($this->where, $array);
        return $this;
    }

    public function order(array $array)
    {
        $this->order = array_merge($this->order, $array);
        return $this;
    }

    public function group($val)
    {
        $this->groupBy = $val;
        return $this;
    }

    public function join(array $array)
    {
        $this->join = array_merge($this->join, $array);
        return $this;
    }

    public function limit(array $array)
    {
        $this->limit = array_merge($this->limit, $array);
        return $this;
    }

    public function create(array $array)
    {
        $this->create = array_merge($this->create, $array);
        return $this;
    }

    private function clear()
    {
        $this->select = [];
        $this->update = [];
        $this->insert = [];
        $this->where = [];
        $this->order = [];
        $this->groupBy = [];
        $this->join = [];
        $this->limit = [];
    }
}
