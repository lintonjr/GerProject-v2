<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 11:31
 */

namespace App\Models;
use GERP\Framework\QueryBuilder;
use Pimple\Container;

class Users
{
    private $db;
    private $events;
    private $queryBuilder;

    public function __construct(Container $container)
    {
        $this->db = $container['db'];
        $this->events = $container['events'];
        $this->queryBuilder = new QueryBuilder;
    }
    public function get(array $conditions)
    {
        $query = $this->queryBuilder->select('users')
            ->where($conditions)
            ->getData();
        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = $this->db->prepare('SELECT * FROM `users`');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $this->events->trigger('creating.users', null, $data);

        $query = $this->queryBuilder->insert('users', $data)
                ->getData();

        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        $result = $this->get(['id' => $this->db->lastInsertId()]);

        $this->events->trigger('created.users', null, $result);

        return $result;
    }

    public function update(array $conditions, array $data)
    {
        $this->events->trigger('updating.users', null, $data);

        $query = $this->queryBuilder->update('users', $data)
            ->where($conditions)
            ->getData();

        $stmt = $this->db->prepare($query->sql);
        $stmt->execute(array_values($query->bind));

        $result = $this->get($conditions);

        $this->events->trigger('updated.users', null, $result);

        return $result;
    }

    public function delete(array $conditions)
    {
        $result = $this->get($conditions);

        $this->events->trigger('deleting.users', null, $result);

        $query = $this->queryBuilder->delete('users')
            ->where($conditions)
            ->getData();

        $stmt = $this->db->prepare($query->sql);
        $stmt->execute($query->bind);

        $this->events->trigger('deleted.users', null, $result);

        return $result;
    }
}