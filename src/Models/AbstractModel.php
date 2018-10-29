<?php

namespace App\Models;


abstract class AbstractModel
{
    protected $table;
    protected $db;
    protected $qb;
    protected $column;

    public function __construct($db)
    {
        $this->db = $db;
        $this->qb = $db->createQueryBuilder();
        
    }

    public function getAll()
    {
        $this->qb->select('*')->from($this->table);

        $query = $this->qb->execute();

        return $query->fetchAll();

    }

    public function find($column, $value)
    {
        $param = ':'.$column;
        $qb = $this->db->createQueryBuilder();
        $qb->select('*')
            ->from($this->table)
            ->setParameter($param, $value)
            ->where($column . ' = '. $param);
        $result = $qb->execute();
        return $result->fetch();
    }

    public function createData(array $data)
    {
        $valuesColumn = [];
        $valuesData   = [];

        foreach ($data as $dataKey => $dataValue) {

                $valuesColumn[$dataKey] = ':' .$dataKey;
                $valuesData[$dataKey]   = $dataValue;

        }
        $this->qb->insert($this->table)
             ->values($valuesColumn)
             ->setParameters($valuesData)
             ->execute();
    }



}
