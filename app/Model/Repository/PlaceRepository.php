<?php

namespace Schedule\Model\Repository;

use Schedule\Model\PlaceModel;

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
    
    public function getPlace($placeModel)
    {
        
        $stmt = $this->pdo->prepare('SELECT * FROM place WHERE id = ?');
        $stmt->execute([$placeModel->getId()]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, PlaceModel::class);
        return $stmt->fetch();        
    }
    
    public function createPlace($placeModel)
    {
        $query = 'INSERT INTO place(name, address, active)'.
                    ' VALUES(:name, :address, :active)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $placeModel->getName());
        $stmt->bindParam(':address', $placeModel->getAddress());
        $stmt->bindParam(':active', $placeModel->getActive());
        $stmt->execute();
    }
    
    public function updatePlace($placeModel)
    {
        $query = 'UPDATE place SET'.
                    ' name = :name,'.
                    ' address = :address,'.
                    ' active = :active'.
                    ' WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $placeModel->getName());
        $stmt->bindParam(':address', $placeModel->getAddress());
        $stmt->bindParam(':active', $placeModel->getActive());
        $stmt->bindParam(':id', $placeModel->getId());
        $stmt->execute();
    }
}