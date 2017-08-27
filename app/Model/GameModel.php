<?php

namespace Schedule\Model;

class GameModel {
    
    private $id;
    private $tournament_id;
    private $date;
    private $time;
    private $team_id;
    private $place_id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getTournamentId()
    {
        return $this->tournament_id;
    }
    
    public function setTournamentId($tournamentId)
    {
        $this->tournament_id = $tournamentId;
    }
    public function getDate()
    {
        return $this->date;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getTime()
    {
        return $this->time;
    }
    
    public function setTime($time)
    {
        $this->time = $time;
    }
    
    public function getTeamId()
    {
        return $this->team_id;
    }
    
    public function setTeamId($teamId)
    {
        $this->team_id = $teamId;
    }
    public function getPlaceId()
    {
        return $this->place_id;
    }
    
    public function setPlaceId($placeId)
    {
        $this->place_id = $placeId;
    }
}
