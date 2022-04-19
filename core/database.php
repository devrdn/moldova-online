<?php
class DataBase
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "culture_md";
    private $pdo;


    public function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
        } catch (Exception $e) {
            echo "DB Error: " . $e->getMessage();
        }
    }


    /**
     * Выполняет запрос
     * 
     * @param $query string
     * @param $fetch [default: true] если требуется fetch
     */
    public function query(string $query, bool $fetch = false, bool $fetchOne = false): array
    {
        $array = array();
        try {
            $result = $this->pdo->query($query);
            if ($fetch == true) {
                if ($fetchOne) {
                    $array = $result->fetch(\PDO::FETCH_ASSOC);
                } else {
                    $array = $result->fetchAll(\PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            exit($e->getMessage() . ", query: " . $query);
        }
        $result = null;
        return $array;
    }

    /**
     * Подготовленный запрос
     * 
     * @param $query
     * @param $data
     * @param $fetch если требуется fetch
     */
    public function prepare_query(string $query, array $data, bool $fetch = false, bool $fetchOne = false): array
    {
        $this->deleteSqlComments($query);
        $this->pdo->quote($query);
        $array = array();
        try {
            $result = $this->pdo->prepare($query);
            $result->execute($data);
            if ($fetch == true) {
                $array = array();
                if ($fetchOne) {
                    $array = $result->fetch(\PDO::FETCH_ASSOC);
                } else {
                    $array = $result->fetchAll(\PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            exit($e->getMessage());
        }
        $result = null;
        return $array;
    }

    /**
     * Удаление комментарием SQL
     */
    private function deleteSqlComments(string $string = ''): string
    {
        $pattern =  '@(--[^\r\n]*)|(/\*[\w\W]*?(?=\*/)\*/)@ms';
        return (empty($string)) ? '' : preg_replace($pattern, '', $string);
    }


    /**
     * Запрос за выбор
     * 
     * @param array $table
     * @param array $data
     * @param array $where
     * @param array limit 
     */
    public function select(array $tables, array $data = ["*"], array $where = [], array $limit = [], bool $fetchOne = false)
    {
        $fields = implode(", ", $data);
        $tables = implode(", ", $tables);
        $query = "SELECT {$fields} FROM {$tables}";
        if (!empty($where)) {
            $twhere = [];

            foreach ($where as $key => $param) {
                $twere[] = "{$key} = :{$key}";
            }

            $query .= " WHERE " . implode(" AND ", $twere);
        }
        if (!empty($limit)) {
            $query .= " LIMIT {$limit['offset']}, {$limit['limit']}";
        }
        $this->deleteSqlComments($query);
        $this->pdo->quote($query);
        return $this->prepare_query($query, $where, true, $fetchOne);
    }

    /**
     * Вставка данных в таблицу
     * 
     * @param string $table таблица
     * @param array $value значения
     */
    public function insert(string $table, array $values, array $return = [])
    {
        $columns = implode(", ", array_keys($values));
        $value = '"' . implode('","', array_values($values));
        $query = "INSERT INTO {$table} ($columns) VALUES ({$value}\")";
        $this->query($query, false);
        if ($return != []) {
            return $this->select((array) $table, $return, $values, [], true);
        }
    }

    /**
     * Удаление записи из таблицы
     * 
     * @param string $table таблица
     * @param array $where условия выполнения
     */
    public function delete(string $table, array $where)
    {
        $twhere = [];
        foreach ($where as $key => $value) {
            $twhere[] = "{$key} = '{$value}'";
        }
        $twhere = implode(" AND ", $twhere);
        $query = "DELETE FROM {$table} WHERE {$twhere}";
        $this->query($query, false);
    }

    /**
     * Обновление данных
     * 
     * @param string $table
     * @param array $values
     * @param array $where
     */
    public function update(string $table, array $values, array $where)
    {
        $twhere = [];
        foreach ($where as $key => $param) {
            $twhere[] = "{$key} = '{$param}'";
        }
        $twhere = implode(" AND ", $twhere);
        $tval = [];
        foreach ($values as $key => $param) {
            $tval[] = "{$key} = '{$param}'";
        }
        $tval = implode(", ", $tval);

        $query = "UPDATE {$table} SET {$tval}  WHERE {$twhere}";
        return $this->query($query, false);
    }

    /**
     * Проверка, если в таблице существует хотя бы одна запись
     * 
     * @param string $table
     * @param array $where conditions
     */
    public function exists(string $table, array $where)
    {
        $table = (array)$table;
        $result = $this->select($table, ["count(*) as c"], $where);
        return count($result)  > 0 && $result[0]["c"] > 0;
    }

    /**
     * Отключение от базы данных
     */
    public function disconnect()
    {
        $this->pdo = null;
    }
}
