<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog</title>
   <link rel="shortcut icon" href="logo.png"/>
  
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <style><?php include "Css/Blog.css" ?></style>


</head>
<body>
   
<div class="container">

   <h1 class="heading">Agro Blog</h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>URBAN GARDENING</h3>
            <p>
                Transforming urban spaces into vibrant green havens through sustainable and 
                creative gardening practices.</p>
            <a href="https://medium.com/@s92063401/urban-gardening-d20013f5f467" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 25th nov, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>HEALTHY FOOD</h3>
            <p>
                Nourishing the body and mind with a wholesome array of nutrient-dense foods
                 promotes overall well-being and vitality.
            </p>
            <a href="https://medium.com/@s92063401/healthy-food-003a03a73605" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i>  27th nov, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>FRESH VEGETABLES & FRUITS</h3>
            <p>Elevate your health with a rainbow of fresh vegetables and fruits, packed with
               essential vitamins and antioxidants.</p>
            <a href="https://medium.com/@s92063401/fresh-vegetables-fruits-5fc245d130c3" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i>  27th nov, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>IoT Applications in Agriculture</h3>
            <p>
               IoT applications in agriculture enable data-driven decision-making by providing 
               real-time.</p>
            <a href="https://medium.com/@s92063401/iot-applications-in-agriculture-25fb96ee3762" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i>  28th nov, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>Organic Farming</h3>
            <p>Organic farming emphasizes natural methods, avoiding synthetic chemicals for
                sustainable and eco-friendly agriculture.</p>
            <a href="https://medium.com/@s92063401/organic-farming-7d7ca3f538a8" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i>  30th nov, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-6.jpg" alt="">
         </div>
         <div class="content">
            <h3>Green House</h3>
            <p>Greenhouses provide an ideal environment for plants, offering controlled conditions
                to enhance growth and yield.</p>
            <a href="https://medium.com/@s92063401/green-house-d7d29c865ae1" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i>1st dec,2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>
    </div>

    <div id="load-more"> load more </div>
 
 </div>

<script>

let loadMoreBtn = document.querySelector('#load-more');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.container .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   }
   currentItem += 3;

   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}

</script>

</body>
</html>