<?php

namespace Schedule\Model\Repository;

use Schedule\Model\TournamentModel;

class TournamentRepository {
    
    private $pdo;
    
    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }

    public function getTournamentList()
    {
        $stmt = $this->pdo->query('SELECT * FROM tournament');
        return $stmt->fetchALL(\PDO::FETCH_CLASS, TournamentModel::class);
    }
    
    public function getTournament($tournamentModel)
    {
        
        $stmt = $this->pdo->prepare('SELECT * FROM tournament WHERE id = ?');
        $stmt->execute([$tournamentModel->getId()]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, TournamentModel::class);
        return $stmt->fetch();        
    }
    
    public function createTournament($tournamentModel)
    {
        $query = 'INSERT INTO tournament(name, active)'.
                    ' VALUES(:name, :active)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $tournamentModel->getName());
        $stmt->bindParam(':active', $tournamentModel->getActive());
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }
    
    public function updateTournament($tournamentModel)
    {
        $query = 'UPDATE tournament SET'.
                    ' name = :name,'.
                    ' active = :active'.
                    ' WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $tournamentModel->getName());
        $stmt->bindParam(':active', $tournamentModel->getActive());
        $stmt->bindParam(':id', $tournamentModel->getId());
        $stmt->execute();
    }
}
