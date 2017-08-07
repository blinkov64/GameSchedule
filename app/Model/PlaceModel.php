<?php

namespace Schedule\Model;

class PlaceModel {
    
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPlaceList()
    {
        $stmt = $this->pdo->query('SELECT * FROM place');
        return $stmt->fetchALL();        
    }
    
    public function getPlace($id)
    {
        
        $stmt = $this->pdo->prepare('SELECT * FROM place WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();        
    }
    
    public function createPlace($updateData)
    {
        $query = 'INSERT INTO place(name, address, active)'.
                    ' VALUES(:name, :address, :active)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $updateData['name']);
        $stmt->bindParam(':address', $updateData['address']);
        $stmt->bindParam(':active', $updateData['active']);
        $stmt->execute();
    }
    
    public function updatePlace($id, $updateData)
    {
        $query = 'UPDATE place SET'.
                    ' name = :name,'.
                    ' address = :address,'.
                    ' active = :active'.
                    ' WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $updateData['name']);
        $stmt->bindParam(':address', $updateData['address']);
        $stmt->bindParam(':active', $updateData['active']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
