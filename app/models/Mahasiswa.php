<?php

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM mahasiswa ORDER BY id DESC";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkNPM($npm)
    {
    $query = "SELECT id FROM mahasiswa WHERE npm = :npm";

    $stmt = $this->db->prepare($query);

    $stmt->bindParam(':npm', $npm);

    $stmt->execute();

    return $stmt->fetch();
    }

    public function create($data)
    {
    $query = "INSERT INTO mahasiswa
    (
        npm,
        nama_lengkap,
        fakultas,
        jurusan,
        tempat_lahir,
        tanggal_lahir,
        jenis_kelamin,
        status_id
    )
    VALUES
    (
        :npm,
        :nama_lengkap,
        :fakultas,
        :jurusan,
        :tempat_lahir,
        :tanggal_lahir,
        :jenis_kelamin,
        :status_id
    )";

   
    $stmt = $this->db->prepare($query);

    
    return $stmt->execute([
        ':npm' => $data['npm'],
        ':nama_lengkap' => $data['nama_lengkap'],
        ':fakultas' => $data['fakultas'],
        ':jurusan' => $data['jurusan'],
        ':tempat_lahir' => $data['tempat_lahir'],
        ':tanggal_lahir' => $data['tanggal_lahir'],
        ':jenis_kelamin' => $data['jenis_kelamin'],
        ':status_id' => $data['status_id']
    ]);
    }

    public function find($id)
    {
    $query = "SELECT * FROM mahasiswa WHERE id = :id";

    $stmt = $this->db->prepare($query);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
    $query = "UPDATE mahasiswa SET
        npm = :npm,
        nama_lengkap = :nama_lengkap,
        fakultas = :fakultas,
        jurusan = :jurusan,
        tempat_lahir = :tempat_lahir,
        tanggal_lahir = :tanggal_lahir,
        jenis_kelamin = :jenis_kelamin,
        status_id = :status_id
    WHERE id = :id";

    $stmt = $this->db->prepare($query);

    return $stmt->execute([
        ':id' => $id,
        ':npm' => $data['npm'],
        ':nama_lengkap' => $data['nama_lengkap'],
        ':fakultas' => $data['fakultas'],
        ':jurusan' => $data['jurusan'],
        ':tempat_lahir' => $data['tempat_lahir'],
        ':tanggal_lahir' => $data['tanggal_lahir'],
        ':jenis_kelamin' => $data['jenis_kelamin'],
        ':status_id' => $data['status_id']
    ]);
    }

    public function delete($id)
    {
    $query = "DELETE FROM mahasiswa WHERE id = :id";

    $stmt = $this->db->prepare($query);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

    public function searchAndFilter($search = '', $jurusan = '')
    {
   
    $query = "SELECT * FROM mahasiswa";
    $conditions = [];
    $params = [];

   
    if (!empty($search)) {

        $conditions[] =
            "(npm LIKE :search
            OR nama_lengkap LIKE :search)";

        $params[':search'] = "%$search%";
    }

   
    if (!empty($jurusan)) {

        $conditions[] =
            "jurusan = :jurusan";

        $params[':jurusan'] = $jurusan;
    }

    
    if (!empty($conditions)) {

        $query .= " WHERE " .
            implode(" AND ", $conditions);
    }

   
    $query .= " ORDER BY id DESC";

   
    $stmt = $this->db->prepare($query);

   
    $stmt->execute($params);

  
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}