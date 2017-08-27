<?php

namespace Schedule\Model\Repository;

use Schedule\Model\GameModel;

class GameRepository {
    
    private $pdo;
    
    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }

    public function getGameList()
    {
        $stmt = $this->pdo->query('SELECT game.id, game.tournament_id, game.date,'
                . ' game.time, team.name as team_id, place.name as place_id,'
                . ' place.address as placeAddress'
                . ' FROM game INNER JOIN team ON game.team_id = team.id '
                . 'INNER JOIN place ON game.place_id = place.id');
        return $stmt->fetchALL(\PDO::FETCH_CLASS, GameModel::class);
    }
}