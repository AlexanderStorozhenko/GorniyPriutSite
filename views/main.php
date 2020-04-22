<div class="home_carousel__loader"><img class="icon_looped" src="../static/svgs/circle.svg" alt="loader"/></div>

<div class="owl-carousel home_carousel">
    <div class="home_carousel__element" style="background:url(../static/images/с1.jpg);"></div>
    <div class="home_carousel__element" style="background:url(../static/images/c2.jpg);"></div>
    <div class="home_carousel__element" style="background:url(../static/images/c3.jpg);"></div>
    <div class="home_carousel__element" style="background:url(../static/images/c4.jpg);"></div>
    <div class="home_carousel__element" style="background:url(../static/images/c5.jpg);"></div>
</div>

<div class="content__header_1"><h1>О нас</h1></div>
<div class="content__article">
   <?=$data['text'][0]['text']?>
</div>
<div class="content__header_1"><h1>Видео</h1></div>

<div class="content__video">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/1ObCFr3KcuE" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
</div>

<script src="../static/js/home-carousel.js"></script>