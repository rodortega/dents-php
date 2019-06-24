<?php
namespace Mini\Model;

use Mini\Core\Model;

class Transaction extends Model
{
    public function add(array $inputs)
    {
        $sql = "
        INSERT INTO transactions(
        patient_id,
        tooth_number,
        treatment_id,
        total,
        date_created,
        status)
        VALUES(
        :patient_id,
        :tooth_number,
        :treatment_id,
        :total,
        :date_created,
        :status)";

        $param = array(
            ':patient_id' => $inputs['patient_id'],
            ':tooth_number' => $inputs['tooth_number'],
            ':treatment_id' => $inputs['treatment_id'],
            ':total' => $inputs['total'],
            ':date_created' => $inputs['date_created'],
            ':status' => $inputs['status']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
    }

    public function get_transactions_by_patient($patient_id)
    {
        $sql = "
        SELECT * FROM transactions 
        WHERE patient_id = :patient_id";

        $param = array(
            ':patient_id' => $patient_id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }

    public function get_revenue_by_date($start,$end)
    {
        $sql = "SELECT CONCAT( doctors.firstname,' ',doctors.lastname) AS doctor, SUM(transactions.total) AS revenue, COUNT(tooth_number) as transactions 
        FROM transactions 
        LEFT JOIN doctors ON doctors.id = transactions.doctor_id
        WHERE transactions.date_created BETWEEN :start AND :end
        GROUP BY doctor_id";

        $param = array(
            ':start' => $start,
            ':end' => $end
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }

    public function get_transactions_by_date($start,$end)
    {
        $sql = "SELECT transactions.*, CONCAT(patients.firstname,' ',patients.lastname) as name 
        FROM transactions 
        LEFT JOIN patients ON patients.id = transactions.patient_id 
        WHERE transactions.date_created BETWEEN :start AND :end";

        $param = array(
            ':start' => $start,
            ':end' => $end
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }

    public function delete($id)
    {
        $sql = "
        DELETE FROM transactions
        WHERE id = :id";

        $param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }
}