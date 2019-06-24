<?php
namespace Mini\Model;

use Mini\Core\Model;

class Appointment extends Model
{
    public function get()
    {
        $sql = "SELECT appointments.id, appointments.doctor_id, appointments.title, CONCAT(patients.firstname,' ', patients.lastname) as name, patients.cellphone, appointments.start
        FROM appointments
        LEFT JOIN patients ON patients.id = appointments.patient_id";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function today($today)
    {
        $sql = "SELECT appointments.id, appointments.title, CONCAT(patients.firstname,' ', patients.lastname) as name, patients.cellphone, appointments.start, appointments.status
        FROM appointments 
        LEFT JOIN patients ON patients.id = appointments.patient_id 
        WHERE DATE(appointments.start) = :today";

        $param = array(
            ':today' => $today
        );


        $query = $this->db->prepare($sql);
        $query->execute($param);
        return $query->fetchAll();
    }

    public function read($id)
    {
        $sql = "UPDATE appointments 
        SET status = '0' 
        WHERE id = :id";

        $param = array(
            ":id" => $id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);
    }

    public function add($inputs)
    {
    	$sql = "
    	INSERT INTO appointments(
        doctor_id,
    	patient_id,
    	title,
    	start)
    	VALUES(
        :doctor_id,
    	:patient_id,
    	:title,
    	:start)";

    	$param = array(
            ':doctor_id' => $inputs['doctor_id'],
            ':patient_id' => $inputs['patient_id'],
            ':title' => $inputs['title'],
            ':start' => $inputs['start']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
    }

    public function update($inputs)
    {
        $sql = "
        UPDATE appointments 
        SET start = :start
        WHERE id = :id";

        $param = array(
            ':id' => $inputs['id'],
            ':start' => $inputs['start']
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }

    public function delete($id)
    {
        $sql = "
        DELETE FROM appointments 
        WHERE id = :id";

        $param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }
}