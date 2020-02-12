<section>
    <div class="image">
        <?php
        $logo = ["logohtml.jpg", "logocss.jpg", "logophp.jpg"];

        foreach ($logo as $different) 
        {
            echo <<<html
                        <img src="assets/img/$different" alt="">
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

        
        
                
          
    