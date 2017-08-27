<?php

namespace Schedule\Model\Repository;

use Schedule\Model\TeamModel;

class TeamRepository {
    
    private $pdo;
    
    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }

    public function getTeamList()
    {
        $stmt = $this->pdo->query('SELECT * FROM team');
        return $stmt->fetchALL(\PDO::FETCH_CLASS, TeamModel::class);
    }
    
    public function getTeam($teamModel)
    {
        
        $stmt = $this->pdo->prepare('SELECT * FROM team WHERE id = ?');
        $stmt->execute([$teamModel->getId()]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, TeamModel::class);
        return $stmt->fetch();        
    }
    
    public function createTeam($teamModel)
    {
        $query = 'INSERT INTO team(name, active)'.
                    ' VALUES(:name, :active)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $teamModel->getName());
        $stmt->bindParam(':active', $teamModel->getActive());
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }
    
    public function updateTeam($teamModel)
    {
        $query = 'UPDATE team SET'.
                    ' name = :name,'.
                    ' active = :active'.
                    ' WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $teamModel->getName());
        $stmt->bindParam(':active', $teamModel->getActive());
        $stmt->bindParam(':id', $teamModel->getId());
        $stmt->execute();
    }
}
