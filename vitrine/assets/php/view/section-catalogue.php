
        <section>
            <h2>Catalogue BMW</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eos qui ratione dolorum ut corporis repudiandae rerum expedita harum nobis ad voluptatibus, obcaecati sequi. Dolore hic distinctio eveniet molestiae incidunt!</p>
        <img class="imagePrincipal" src="assets/img/bmw1.jpg" alt="voiture1">
       

        
        <div class="container">
         <!--   <img src="assets/img/bmw1.jpg" alt="voiture1">
                <img src="assets/img/bmw2.jpg" alt="voiture2">
                <img src="assets/img/bmw3.jpg" alt="voiture3">
                <img src="assets/img/bmw4.jpg" alt="voiture4">
        -->
        <?php
            $listeBmw = glob("assets/img/bmw*.{jpg,jpeg,gif,png}", GLOB_BRACE);

            foreach($listeBmw as $image)
            {
                echo <<<codehtml
                <img src="$image" alt="$image">
                codehtml;


            }


        ?>




        </div>

        </section>
    </main>