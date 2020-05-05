<?php

class Admin extends Utilisateur {

    protected $ban;
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

    public function setBan ($b){
        $this->ban[] .= $b;
    }

    public function getBan (){
        echo 'Utilisateur bannis par '.$this->user_name.' : ';
        foreach($this->ban as $valeur) {
            echo $valeur .', ';
        }
    }

    public function setPrixAbo()
    {
        if($this->prix_abo === 'sud'){
            return $this->prix_abo = self::ABONNEMENT;
        }else{
            return $this->prix_abo = parent::ABONNEMENT / 2;
        }
    }
}