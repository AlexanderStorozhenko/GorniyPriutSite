function showImage(image){
    let imageView = $(".image_view");
    imageView.css("display","block");
    // imageView.css("margin-left", -image.width + "px");
    // imageView.css("margin-top",-image.height + "px");
    // imageView.css("top","50%");
    // imageView.css("left","50%");
    $(".image_view_container").css("display","block");
    $(".image_view img").attr("src",image.src);
}

$(window).on('load', function () {

    $(".image_view_container").click(function () {
        $(this).css("display","none");
        $(".image_view").css("display","none");
    });

    $.each($(".photos__element"), function () {
        let height = $(this).height();
        let width = $(this).width();

        if(width > 300 || height > 300)  {
            width = width/3;
            height=height/3;
        }
        $(this).css('height', height);
        $(this).css('width', width);
        $(this).css('display', "block");
        $(".photos_loader").remove();
    });
    var $container = $('.photos');
    // инициализация
    $container.masonry({
        columnWidth: 1,

        // обращаемся к пунктам
        itemSelector: '.photos__element'
    });

});