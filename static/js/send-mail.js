function send() {

    let nameText =  $('.sender_mail__content__input[name="name"]').val();
    let titleText =  $('.sender_mail__content__input[name="title"]').val();
    let phoneText =  $('.sender_mail__content__input[name="phone"]').val();
    let messageText =  $('.sender_mail__content__text[name="text"]').val();

    $.ajax({
        type: "POST",
        url: "/home/mail",
        dataType: "json",
        data: {name:nameText,title:titleText,phone:phoneText,text:messageText},
    }).done(function (data) {

    });
}
function openForm() {
    $(".sender_mail_container").css("display","block");
}
function closeForm(){
    $(".sender_mail_container").css("display","none");
}