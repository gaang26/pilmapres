<div id="myCarousel" class="carousel slide custom-carousel">

  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php
    for($i=1;$i<=7;$i++){
      if($i==1){
        echo '<div class="active item"><img src="'.Yii::app()->request->baseUrl.'/images/carousel/2015/s'.$i.'.jpg" width="100%"></div>';
      }else{
        echo '<div class="item"><img src="'.Yii::app()->request->baseUrl.'/images/carousel/2015/s'.$i.'.jpg" width="100%"></div>';
      }
    }
    ?>
    <!-- <div class="active item"><img src="<?php echo Yii::app()->request->baseUrl?>/images/carousel/s10.jpg" width="100%"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl?>/images/carousel/s11.jpg" width="100%"></div>
    <div class="item"><img src="<?php echo Yii::app()->request->baseUrl?>/images/carousel/s12.jpg" width="100%"></div> -->
  </div>
  <!-- Carousel nav -->
  <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
  <ol class="carousel-indicators">
    <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li> -->
    <?php
    for($i=0;$i<7;$i++){
      if($i==0){
        echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
      }else{
        echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
      }
    }
    ?>
  </ol>

  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

<style type="text/css">
.custom-carousel{
    height:400px;
    overflow:hidden;
    padding: 0px;
    /*margin: -42px -25px 10px -25px;*/
}
.carousel-indicators .active{
    background-color: #FFF;
    opacity: 0.6;
}
.carousel-control{
  background: none;
  border: none;
  border-radius: none;
}
</style>

<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('#myCarousel').carousel({
    interval: 3000
  });
})
</script>
