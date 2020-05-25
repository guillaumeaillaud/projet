<?php
/*
//EXO1
// AJOUTER LE CODE POUR AFFICHER coucou

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class Exo1 {
    public function __construct()
    {
        echo "coucou";
    }
}
// CODE NON MODIFIABLE 
// (LAISSER CE CODE TEL QUEL SINON TU PAIES UNE AMENDE...)
$objet = new Exo1;

?>



<?php
//EXO2
// AJOUTER LE CODE POO POUR AFFICHER
/*
(header)
(section)
(footer)


// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...


class Header {
    public function __construct()
    {
        echo "(header)"."<br>";
    }
}
class Section {
    public function __construct()
    {
        echo "(section)"."<br>";
    }
}
class Footer {
    public function __construct()
    {
        echo "(footer)";
    }
}

// CODE NON MODIFIABLE 
// (LAISSER CE CODE TEL QUEL SINON TU PAIES UNE AMENDE...)
// CODE NON MODIFIABLE
$objetHeader    = new Header;
$objetSection   = new Section;
$objetFooter    = new Footer;



//EXO3

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
// (header)
// (LE CONTENU DE MA PAGE)
// (footer)

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class Page {

    public $contenu;

    public function setContenu($cont){
        $this->contenu = $cont;
        
        
    }

    public function afficher(){
        echo "(header)"."<br>";
        echo $this->contenu."<br>";
        echo "(footer)";
        
    
}
}

// CODE NON MODIFIABLE
$objetPage = new Page;                              
$objetPage->setContenu("LE CONTENU DE MA PAGE");    
$objetPage->afficher();    

*/

//EXO4

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(header)
(SECTION1)
(SECTION2)
(SECTION3)
(footer)



// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

// VERSION STRING

class Page {

    public $contenu;

    public function ajouterContenu($cont){
        
            $this->contenu .= "<br>".$cont;
        
    }

    public function afficherliste()
    {
        echo "(header)";
        echo $this->contenu."<br>";
        echo "(footer)";
    }
}

//VERSION ARRAY

class Page {

    public $contenu =[];

    public function ajouterContenu($cont){
        
            array_push($this->contenu, $cont);
        
    }

    public function afficherliste()
    {
        echo "(header)";
        foreach(this->$contenu as $elem){
            echo $elem."<br>";
        }
        echo "(footer)";
    }
}


// CODE NON MODIFIABLE
$objetPage = new Page;                     
$objetPage->ajouterContenu("SECTION1");
$objetPage->ajouterContenu("SECTION2");
$objetPage->ajouterContenu("SECTION3");
$objetPage->afficherListe();

*/


//EXO 5

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
(CODE DU HEADER)
(CODE DE LA SECTION1)
(CODE DE LA SECTION2)
(CODE DU FOOTER)


// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class PageV2 {

    //propriete => permet de stocker des infos pour les utiliser a travers differentes methodes
    // pour avoir une propriete qui soit partagé je dois faire une propriete STATIC (collective)

    
    public static $tabAsso = [];

    public function ajouter($cle, $valeur)
    {
        //on va memoriser les parametres ds un tab asso
        PageV2::$tabAsso[$cle] = $valeur;
    }

    public function afficherTab($tabCle)
    {
        //on a deux tableaux $tabCle qui est un tableau ordonné avec des clés
        // et on a $tabAsso qui est un tableau associatif clé/valeur
        //on veut acceder au valeur du tableau asso
        //on va faire une boucle sur $tabCle pour avoir les elements ds le bon ordre
        foreach($tabCle as $cle)
        {
            // a partir de la clé je dois retrouver la valeur associé
            $valeur = PageV2::$tabAsso[$cle];
            echo $valeur;
        }
    }
}

// CODE NON MODIFIABLE
$objet1 = new PageV2;
$objet1->ajouter("header", "(CODE DU HEADER)");

$objet2 = new PageV2;
$objet2->ajouter("footer", "(CODE DU FOOTER)");

$objet3 = new PageV2;
$objet3->ajouter("section1", "(CODE DE LA SECTION1)");

$objet4 = new PageV2;
$objet4->ajouter("section2", "(CODE DE LA SECTION2)");

$objet5 = new PageV2;
$objet5->afficherTab(["header", "section1", "section2", "footer"]);

*/

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
<header>
    <h1>TITRE1</h1>
</header>
<main>
    <section>
        CONTENU DE MA SECTION
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...


// CODE NON MODIFIABLE
new Info("h1",      "TITRE1");
new Info("section", "CONTENU DE MA SECTION");
new Info("footer",  "TOUS DROITS RESERVES");

$header = new Header;
$main   = new Main;
$footer = new Footer;

echo
<<<CODEHTML

$header
$main
$footer

CODEHTML;