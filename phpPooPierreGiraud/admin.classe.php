<?php

class Admin extends Utilisateur {

    protected static $ban;
    public const ABONNEMENT =5;

    public function __construct($n, $p, $r)
    {
        $this->user_name = strtoupper($n) ;
        $this->user_pass = $p;
        $this->user_region = $r;
    }

   /* public function getNom()
    {
        parent::getNom();
        echo ' (depuis la classe etendue)<br>';
    }
    */

    public function setBan (...$b){
        foreach($b as $banned){
            self::$ban[] .= $banned;
        }
    }

    public function getBan (){
        echo 'Utilisateur bannis :  ';
        foreach(self::$ban as $valeur) {
            echo $valeur .', ';
        }
    }

    public function setPrixAbo()
    {
        if($this->user_region === 'sud'){
            return $this->prix_abo = self::ABONNEMENT;
        }else{
            return $this->prix_abo = parent::ABONNEMENT / 2;
        }
    }
}