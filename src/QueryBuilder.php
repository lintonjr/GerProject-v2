<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 21:00
 */

namespace GERP\Framework;


class QueryBuilder
{

    private $sql;
    private $bind = [];

    public function select(string $table)
    {
        $this->sql = "SELECT * FROM `{$table}`";
        return $this;
    }

    public function insert(string $table, array $data)
    {
        $sql = "INSERT INTO `{$table}` (%s) VALUES (%s)";

        $columns = array_keys($data);
        $values = array_fill(0, count($columns), '?');
        $this->bind = array_values($data);

        $this->sql = sprintf($sql, implode(', ', $columns), implode(', ', $values));

        return $this;
    }

    public function update(string $table, array $data)
    {
        $sql = "UPDATE `{$table}` SET %s";

        $columns = array_keys($data);

        foreach ($columns as &$column){
            $column = $column . '=?';
        }

        $this->bind = array_values($data);
        $this->sql = sprintf($sql, implode(', ', $columns));

        return $this;
    }

    public function delete(string $table)
    {
        $this->sql = "DELETE FROM `{$table}`";
        return $this;
    }

    public function where(array $conditions)
    {
        if (!$this->sql){
            throw new \Exception("Select(), update() or delete required before where() method");
        }

        $columns = array_keys($conditions);

        foreach ($columns as &$column){
            $column = $column . '=?';
        }

        $this->bind = array_merge($this->bind, array_values($conditions));

        $this->sql .= ' WHERE ' . implode(' and', $columns);

        return $this;
    }

    public function getData() :\stdClass
    {
        $query = new \stdClass;
        $query->sql = $this->sql;
        $query->bind = $this->bind;

        $this->sql = null;
        $this->bind = [];

        return $query;
    }
}