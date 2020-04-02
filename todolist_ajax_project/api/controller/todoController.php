<?php

class todoController {

    // proprietes de classe
    private $model;

    // constructeur prend en parametre une instance de ma classe model
    public function __construct($model)
    {
        $this->model = $model;
    }


    // methodes de classe
    public function getAll()
     {
      $data =  $this->model->getTodos();

     // je veux verifier s'il y a au moins un element dans mon tableau
      if(count($data) > 0) {
        // code a executer si la condition est vrai
        // je construit ma reponse sous le forme d'un tableau associatif
        $response = [
            "status" => "succes",
            "message" => "Les données ont bien été récupérés",
            "payload" => $data
        ];
      } else {
         // code a executer si la condition est fausse
        $response = [
            "status" => "error",
            "message" => "Aucune données dans la table",
        ];

      }

      // je dois transformer le tableau associatif en json qui va pouvoir et compris et exploité en js
     echo json_encode($response);
    }

    // create : prend en parametre une request de typer POST
    public function create($request)
     {
         //la reponse va contenir les infos du formulaire
         // je verifie si j'ai bien title et description dans ma requet
         if(isset($request['title'], $request['description'])) {
            $todo = [
                'title' => $request['title'],
                'description' => $request['description']
            ];

            if($this->model->createTodos($todo)) {
                $response = [
                    "status" => "succes",
                    "message" => "Lea nouvelle tache a bien été enregistrée",
                ];

            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Echec de création de la nouvelle tâche',
                ];
            }
            echo json_encode($response);
         }
        
        // si la methode createTodo de la classe model renvois true
        
        //reponse de type succes

        //sinon reponse de type erreur

    }


    // create

    // create

}

//require_once "../model.php";

// creer une nouvelle instance de la classe Model

//$model = new Model();

// on crée une nouvelle instance de la classe TodoController et on lui passe l'instance de la classe Model su'on vient de créer
//$controller = new todoController($model);

//$todo = [
  //  'title' => 'titre test méthode create',
  //  'description' => 'description test',
//];

// on appelle la méthode getAll de la classe TodoController
//$controller->getAll();