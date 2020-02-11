<section>
    <div class="image">
        <?php
        $logo = ["logohtml.jpg", "logocss.jpg", "logophp.jpg"];

        foreach ($logo as $different) {
            echo <<<html
                        <img src="assets/img/$different" alt="">
                        html;
        }

        $moto = ["moto4.jpg", "moto5.jpg", "moto6.jpg"];
        $i = 0;
        while ($i < count($moto)) {
            echo <<<html
                      <img src="assets/img/$moto[$i]" alt="">
                     html;
            $i = $i + 1;
        }
        ?>
    </div>
</section>

<!--  <section>

            
                <div class="image2">
           
                <img src="assets/img/moto4.jpg" alt="">
                <img src="assets/img/moto5.jpg" alt="">
                <img src="assets/img/moto6.jpg" alt="">
              

                </div>

            </section>
        
        
                
          
    