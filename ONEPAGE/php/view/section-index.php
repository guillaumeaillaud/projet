<section>
    <div class="image">
        <?php
        $logo = ["logohtml.jpg", "logocss.jpg", "logophp.jpg"];
        $texte1 = <<<texte
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, non nihil architecto, maxime cupiditate sit, voluptate modi delectus exercitationem eos reiciendis magnam veniam. Cupiditate minima, itaque blanditiis modi sint voluptas?
        texte;
        $texte2 = <<<texte
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, non nihil architecto, maxime cupiditate sit, voluptate modi delectus exercitationem eos reiciendis magnam veniam. Cupiditate minima, itaque blanditiis modi sint voluptas?
        texte;
        $texte3 = <<<texte
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, non nihil architecto, maxime cupiditate sit, voluptate modi delectus exercitationem eos reiciendis magnam veniam. Cupiditate minima, itaque blanditiis modi sint voluptas?
        texte;
        $paragraphe = [$texte1, $texte2, $texte3];

        foreach ($logo as $indice => $different) 
        {
            echo <<<html

            <div class="colonne">
                <img src="assets/img/$different" alt="">
                <p>$paragraphe[$indice]</p>
            </div>

            html;
        }
         ?>
    </div>
</section>
<section id="s5">
        <h1>CONTACT</h1>
        
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, non nihil architecto, maxime cupiditate sit, voluptate modi delectus exercitationem eos reiciendis magnam veniam. Cupiditate minima, itaque blanditiis modi sint voluptas?</p>

        <form action="#s5" method="GET">
            <input type="text" name="nom" placeholder="entrez votre nom">
            <input type="email" name="email" placeholder="entrez votre email">
            <textarea name="message" cols="50" rows="10" placeholder="entrez votre message"></textarea>
            <button type="submit">envoyer un message</button>
            <div>
                <?php require_once "php/controller/traitement-contact.php" ?>
            </div>
        </form>


</section>

        
        
                
          
    