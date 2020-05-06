<?php

class Utilisateur{
    protected $user_name;
    protected $user_region;
    protected $prix_abo;
    protected $user_pass;
    

    public const ABONNEMENT = 15;

    public function __construct($n, $p, $r){
        $this->user_name = $n;
        $this->user_pass = $p;
        $this->user_region = $r;
    }

    public function __destruct()
    {
        
    }

    public function getNom()
    {
        echo $this->user_name;
    }

    public function setPrixAbo(){
        // si on veut calculer un prix abo
        // different selon le profil des utilisateurs
        if($this->user_region === 'sud'){
            return $this->prix_abo = self::ABONNEMENT / 2;
        }else{
            return $this->prix_abo = self::ABONNEMENT;
        }
    }

    public function getPrixAbo(){
        echo $this->prix_abo;
    }

    /*public function setNom($new_user_name)
    {
        $this->user_name = $new_user_name;
    }

    public function setPasse($new_user_pass)
    {
        $this->user_pass = $new_user_pass;
    } */


}

?>