
        <section>
            <div class="image">
                <?php
                    $logo = ["logohtml.jpg","logocss.jpg","logophp.jpg"];

                    foreach ($logo as $different)
                    {
                        echo <<<html
                        <img src="assets/img/$different" alt="">
                        html;
                    }
                  
                ?>
            </div>
        </section>

            <section>
                <div class="image2">
                    <?php
                        $moto = ["moto4.jpg","moto5.jpg","moto6.jpg"];
                        
                        foreach ($moto as $changement)
                        {
                            echo <<<html
                            <img src="assets/img/$changement" alt="">
                            html;
                        }

                    ?>
             <!--   <img src="assets/img/moto4.jpeg" alt="">
                <img src="assets/img/moto5.jpeg" alt="">
                <img src="assets/img/moto6.jpeg" alt="">
                    -->   

                </div>

            </section>
        
        
                
          
    