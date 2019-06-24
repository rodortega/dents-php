<?php
namespace Mini\Model;

use Mini\Core\Model;

class Patient extends Model
{

    public function get()
    {
        $sql = "
        SELECT * FROM patients";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function add(array $inputs)
    {
        $sql = "
        INSERT INTO patients(
        firstname,
        lastname,
        gender,
        birthdate,
        address,
        cellphone,
        occupation,
        picture,
        date_created)
        VALUES(
        :firstname,
        :lastname,
        :gender,
        :birthdate,
        :address,
        :cellphone,
        :occupation,
        :picture,
        :date_created)";

        $param = array(
            ':firstname' => $inputs['firstname'],
            ':lastname' => $inputs['lastname'],
            ':gender' => $inputs['gender'],
            ':birthdate' => $inputs['birthdate'],
            ':address' => $inputs['address'],
            ':cellphone' => $inputs['cellphone'],
            ':occupation' => $inputs['occupation'],
            ':picture' => $inputs['picture'],
            ':date_created' => $inputs['date_created']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $this->db->lastInsertId();
    }

    public function update(array $inputs)
    {
        $sql = "
        UPDATE patients 
        SET firstname = :firstname,
        lastname = :lastname,
        birthdate = :birthdate,
        address = :address,
        cellphone = :cellphone,
        occupation = :occupation
        WHERE id = :id";

        $param = array(
            ':id' => $inputs['id'],
            ':firstname' => $inputs['firstname'],
            ':lastname' => $inputs['lastname'],
            ':birthdate' => $inputs['birthdate'],
            ':address' => $inputs['address'],
            ':cellphone' => $inputs['cellphone'],
            ':occupation' => $inputs['occupation']
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }

    public function view($id)
    {
        $sql = "
        SELECT * FROM patients 
        WHERE id = :id";

        $param = array(
            ':id' => $id
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetch();
    }

    public function upload(array $inputs)
    {
        $sql = "
        UPDATE patients SET
        picture = :picture 
        WHERE id = :id";

        $param = array(
            ':id' => $inputs['id'],
            ':picture' => $inputs['file_url']
        );

        $query = $this->db->prepare($sql);
        return $query->execute($param);
    }

    public function search(array $inputs)
    {
        $sql = "
        SELECT * FROM patients 
        WHERE firstname REGEXP :input 
        OR lastname REGEXP :input";

        $param = array(
            ':input' => $inputs['name']
        );

        $query = $this->db->prepare($sql);
        $query->execute($param);

        return $query->fetchAll();
    }
}