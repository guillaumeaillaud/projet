<?php

class Admin extends Utilisateur {

    protected $ban;

    public function setBan ($b){
        $this->ban[] .= $b;
    }

    public function getBan (){
        echo 'Utilisateur bannis par '.$this->user_name.' : ';
        foreach($this->ban as $valeur) {
            echo $valeur .', ';
        }
    }
}