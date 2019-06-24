<?php
namespace Mini\Model;

use Mini\Core\Model;

class Payment extends Model
{
    public function add(array $inputs)
    {
        $sql = "
        INSERT INTO payments(
        transaction_id,
        payment,
        date_created)
        VALUES(
        :transaction_id,
        :payment,
        :date_created)";

        $param = array(
            ':transaction_id' => $inputs['transaction_id'],
            ':payment' => $inputs['payment'],
            ':date_created' => $inputs['date_created']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
    }

    public function get_payments_by_transaction($transaction_id)
    {
        $sql = "
        SELECT * FROM payments 
        WHERE transaction_id = :transaction_id";

        $param = array(
            ':transaction_id' => $transaction_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }

    public function count_existing($transaction_id)
    {
        $sql = "
        SELECT COUNT(*) as count FROM payments
        WHERE transaction_id = :transaction_id";

        $param = array(
            ':transaction_id' => $transaction_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
    }

    public function delete($id)
    {
        $sql = "
        DELETE FROM payments
        WHERE id = :id";

        $param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }
}