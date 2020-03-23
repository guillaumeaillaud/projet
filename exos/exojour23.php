<?php // exo13: DESSINER UN DAMIER dessinerDamier
//  EN PARAMETRE, ON DONNE LE NOMBRE DE CASES PAR COTE

//  NOTE: ON POURRA UTILISER 
//       "\n" POUR LE RETOUR A LA LIGNE 
//       OU BIEN "<br>" EN HTML

//   SI ON APPELLE LA FONCTION

//   dessinerDamier(3);
// 
//   ON DEVRAIT OBTENIR LE TEXTE SUIVANT

//    X0X
//   0X0
//    X0X

// SI ON APPELLE LA FONCTION

//   dessinerDamier(4);

// ON DEVRAIT OBTENIR LE TEXTE SUIVANT

//   X0X0
//    0X0X
//  X0X0
//   0X0X



function dessinerDamier($nombreCaseCotes)
{
    $tab = [$nombreCaseCotes];
  for ($i=0; $i < $tab ; $i++) { 
      $colonnes = $tab;
      for ($i=0; $i < $colonnes ; $i++) { 
        $damier = $colonnes;  
      }
  }

    return $damier;


}


echo dessinerDamier(3);