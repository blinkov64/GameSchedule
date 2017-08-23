<?php

namespace Schedule\Model\Place;

class PlaceRepository {
    
    private $pdo;
    
    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }

    public function getPlaceList()
    {
        $stmt = $this->pdo->query('SELECT * FROM place');
        return $stmt->fetchALL(\PDO::FETCH_CLASS, PlaceModel::class);
    }
    
    public function getPlace($id)
    {
        
        $stmt = $this->pdo->prepare('SELECT * FROM place WHERE id = ?');
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, PlaceModel::class);
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