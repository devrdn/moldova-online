<?php
class DataBase {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "culture_md";
    private $pdo;


    public function __construct() {
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
        } catch (Exception $e) {
            echo "DB Error: " . $e->getMessage();
        }
    }
        
    
    public function query(string $query, bool $fetch = true) : array
    {
        try {
            $result = $this->pdo->query($query);
            if ($fetch == true) {
                $array = array();
                $array = $result->fetchAll(\PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            exit($e->getMessage(). ", query: ". $query);
        }
        $result = null;
        return $array;
    }

    public function prepare_query(string $query, array $data, bool $fetch = true) {
        try {
            $result = $this->pdo->prepare($query);
            $result->execute($data);
            if ($fetch == true) {
                $array = array();
                $array = $result->fetchAll(\PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            exit ($e->getMessage());
        }
        $result = null;
        return $array;
    }

    private function deleteSqlComments(string $string = ''): string 
    {
        $pattern =  '@(--[^\r\n]*)|(/\*[\w\W]*?(?=\*/)\*/)@ms';
        return (empty($string)) ? '' : preg_replace($pattern, '', $string);
    }


    public function select(array $tables, array $data = [ "*" ], array $where = [], array $limit =[]) {
        $fields = implode(", ", $data);
        $tables = implode(", ", $tables);
        $query = "SELECT {$fields} FROM {$tables}";
        if (!empty($where)) {
            $twhere = [];
            
            foreach($where as $key => $key) {
                $twere[] = "{$key} = :{$key}";
            }  
            
            $query .= " WHERE ". implode(" AND ", $twere);
        }
        if (!empty($limit)) {
            $query .= " LIMIT {$limit['offset']}, {$limit['limit']}";
        }
        return $this->prepare_query($query, $where);
    }

    public function exists(array $table, array $where) {
        $result = $this->select($table, ["count(*) as c"], $where);
        return count($result)  > 0 && $result[0]["c"] > 0;
    }

    public function disconnect() {
        $this->pdo = null;
    }
}