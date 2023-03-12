<?php
class DB
{
    private static $_instance = null; #Static instance variable to hold the singleton instance of the class
    private $_pdo, #Stores a PDO instance
    $_query, #Stores the query to be executed
    $_error = false, #Stores the error status of the last operation
    $_results, #Stores the result set of the last query
    $_count = 0; #Stores the number of rows affected by the last query

    private function __construct()
    {
        #Creates a new PDO instance with the database connection details obtained from the Config class
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'));
        } catch (PDOException $e) { #If the connection fails, output the error message and exit
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        #If the instance does not exist create a new instance
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    #Preperes and executes query so there cannot be sql injections
    public function query($sql, $params = array())
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    #Binds a value to a paramete
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                #Fetches all rows from a result set and returns an array of objects
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                #Returns the number of rows affected
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function action($action, $table, $where = array())
    {
        if (count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0]; #field (username)
            $operator = $where[1]; #Operator (=)
            $value = $where[2]; #Specific result (Kristaps)

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                #If theres not an error return this
                if (!$this->query($sql, array($value))->_error) {
                    return $this;
                }
            }
        }
        return false;
    }

    #Get function (gets data and passes it to action)
    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    }

    #Delete function
    public function delete($table, $where)
    {
        return $this->action('DELETE *', $table, $where);
    }

    #Flags error
    public function error()
    {
        return $this->_error;
    }

    #Counts
    public function count()
    {
        return $this->_count;
    }
}