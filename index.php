<?php
include "layout/header.php";

?>
    <section>
        <img class="me" src="image/bg 2.png" alt="">
        <p class="intro">Welcome 
            <?php 
            if (isset($_POST['email'])){
                echo $_SESSION['first_name'];
            }
            else{
                echo "USER";
            }
            ?> 
        </p>
        
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus provident expedita, sit accusantium asperiores aliquam, aliquid autem laborum harum esse ratione totam voluptates minima voluptatem reprehenderit ipsum, illo labore ut.</p>
    </section>
    <section>
        <p class="intro_2">TAKE A LOOK AT OUR GALLERY</p>
        <div class="container_">
            <img src="image/(10).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
        <div class="container_">
            <img src="image/(11).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
        <div class="container">
            <img src="image/(10).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
        <div class="container_">
            <img src="image/(10).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
        <div class="container_">
            <img src="image/(10).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
        <div class="container">
            <img src="image/(10).jpg" class="image" alt="">
            <p class="talk">Relaxing</p>
        </div>
    </section>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis hic quis qui natus aperiam dolorem voluptas aut, voluptatum culpa, facilis, accusantium facere eligendi. Non, quae omnis! Excepturi aspernatur dicta iure!</p>
    </section>
    <?php
    include "layout/footer.php";
    ?>