<?php

class Utilisateur{
    private $user_name;
    private $user_pass;

    public function getNom()
    {
        return $this->user_name;
    }

    public function setNom($new_user_name)
    {
        $this->user_name = $new_user_name;
    }

    public function setPasse($new_user_pass)
    {
        $this->user_pass = $new_user_pass;
    }
}