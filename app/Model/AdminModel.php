<?php

namespace Schedule\Model;

class AdminModel {
    
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function login($postData)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE login = ? AND password = ?');
        $stmt->execute([$postData['login'], $postData['password']]);
        return $stmt->fetch();        
    }
    
    public function setToken($token, $id)
    {
        $query = 'UPDATE admin SET'.
                    ' token = :token'.
                    ' WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
    public function isAdmin($token)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM admin WHERE token = ?');
        $stmt->execute([$token]);
        return $stmt->fetch();  
    }
    
    public function getAdminLogin($token)
    {
        $stmt = $this->pdo->prepare('SELECT login FROM admin WHERE token = ?');
        $stmt->execute([$token]);
        return $stmt->fetch();  
    }
    
    public function deleteToken($token)
    {
        $update = '';
        $query = 'UPDATE admin SET'.
                    ' token = :update'.
                    ' WHERE token = :token';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':update', $update);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
    }
}
