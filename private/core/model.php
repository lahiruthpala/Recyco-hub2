<?php

/**
 * main model
 */
class Model extends Database
{
	public $errors = array();
	public function __construct()
	{
		// code...
		// var_dump(property_exists($this, 'table'));
	}


	public function where($column, $value)
	{

		$column = addslashes($column);
		//$query = "select * from $this->table WHERE id_column_name IN (id_value1, id_value2, id_value3,...);
		$query = "select * from $this->table where $column = :value";
		return $this->query($query, [
			'value' => $value
		]);
	}

	public function first($column, $value)
	{

		$column = addslashes($column);
		$query = "select * from $this->table where $column = :value";
		$data = $this->query($query, [
			'value' => $value
		]);

		//run functions after select
		if (is_array($data)) {
			if (property_exists($this, 'afterSelect')) {
				foreach ($this->afterSelect as $func) {
					$data = $this->$func($data);
				}
			}
		}

		if (is_array($data)) {
			$data = $data[0];
		}
		return $data;
	}

	public function findAll($pageNumber = 1, $pageSize = 10, $orderByColumn = 'id')
	{
		$offset = ($pageNumber - 1) * $pageSize;
		$query = "SELECT * FROM $this->table ORDER BY $orderByColumn LIMIT $pageSize OFFSET $offset";
		return $this->query($query);
	}

	public function insert($data)
	{
		//run functions before insert
		if (property_exists($this, 'beforeInsert')) {
			foreach ($this->beforeInsert as $func){
				$data = $this->$func($data);
			}
		}
		//remove unwanted columns
		if (property_exists($this, 'allowedColumns')) {
			foreach ($data as $key => $column) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);
		$query = "insert into $this->table ($columns) values (:$values)";
		$this->query($query, $data);
		return $data;
	}
	public function update($id, $data, $column)
	{
		if (property_exists($this, 'allowedColumns')) {
			foreach ($data as $key => $columns) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .= $key . "=:" . $key . ",";
		}

		$str = trim($str, ",");

		$data['id'] = $id;
		$query = "update $this->table set $str where $column = :id";
		// echo $query;
		return $this->query($query, $data);
	}
	public function delete($id, $column)
	{
		$query = "delete from $this->table where $column = :id";
		$data['id'] = $id;
		return $this->query($query, $data);
	}

	public function innerJoin($tables = [], $joinConditions = [], $data = [], $selectColumns = ['*'])
    {
        if (count($tables) < 1 && count($tables) == count($joinConditions)) {
            return false; // Need atleast one more table than $this->table to use innerjoin
        }

        $query = "SELECT " . implode(", ", $selectColumns) . " FROM " . $this->table;
        //adding inner joins
        for ($i = 0; $i < count($tables); $i++) {

            $query = $query . " INNER JOIN " . $tables[$i] . " ON ";

            //adding join condition if mentioned, else add default
            $query = $query . $joinConditions[$i] . " ";
        }
		
        //adding where conditions
        if (!empty($data)) {
            $keys = array_keys($data);
            $query = $query . "WHERE ";
            foreach ($keys as $key) {
                $query .= $this->table . "." . $key . "='" . $data[$key] . "' && ";

            }

            //remove the additional '&&' 
            $query = trim($query, "&& ");
        }
//        show($query);
  //      show($data);
    //    die;

        //since $data for where clause is expanded in here, no need to send the data to PDO
        //didnt use $key:=$key
        $res = $this->query($query, $data = []);

        if (is_array($res)) {
            return $res;
        } else{
			return false;
		}
	}

	public function custom($query, $data)
	{
		return $this->query($query, $data);
	}
}

