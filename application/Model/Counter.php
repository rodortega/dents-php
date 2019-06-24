<?php
namespace Mini\Model;

use Mini\Core\Model;

class Counter extends Model
{
    public function today($today)
    {
        $sql = "SELECT * FROM counter 
        WHERE date_created = :today";

        $param = array(
            ":today" => $today
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);
        
        return $query->fetch();
    }

    public function get_counter_by_date($start,$end)
    {
        $sql = "SELECT * FROM counter 
        WHERE date_created 
        BETWEEN :start AND :end";

        $param = array(
            ':start' => $start,
            ':end' => $end
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }
}