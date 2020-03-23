<?php


function distribuerBillet ($billet){
    
    $phrase="";
    

switch($billet){
    case($billet>200):
       $retour= intval($billet/200);
       $billet=$billet-($retour*200);
       $val=$retour. " x 200,";
       $phrase=$val;
          
    case($billet>100):
       $retour= intval($billet/100);
       $billet=$billet-($retour*100);
       $val1=$retour. " x 100,";
       $phrase=$phrase . $val1;
            
    case($billet>50):
        $retour= intval($billet/50);
        $billet=$billet-($retour*50);
        $val2=$retour. " x 50,";
        $phrase=$phrase . $val2;
    
    case($billet>20):
        $retour=intval($billet/20);
        $billet=$billet-($retour*20);
        $val3=$retour. " x 20,";
        $phrase=$phrase . $val3;
  
    case($billet>10):
        $retour=intval($billet/10);
        $billet=$billet-($retour*10);
        $val4=$retour. " x 10,";
        $phrase=$phrase . $val4;
    
    case($billet>5):
        $retour=intval($billet/5);
        $billet=$billet-($retour*5);
        $val5=$retour. " x 5";
        $phrase=$phrase . $val5;
    break;
    
  
    
    


        }
         

    
    

return $phrase;

}
$billet=40050;

echo distribuerBillet($billet);
