<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../static/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../static/css/style.css">

    <title>Главная</title>
</head>

<script src="../static/js/jquery.js"></script>
<script src="../static/js/owl.carousel.js"></script>
<script src="../static/js/masonry.js"></script>
<body>
<div class="image_view_container">
    <div class="image_view">
        <img src="" alt="">
    </div>
</div>

<div class="sender_mail_container">
    <div class="sender_mail">
        <div class="sender_mail__content">
            <input type="text" class="sender_mail__content__input" name="name" placeholder="ФИО" required/>
            <input type="text" class="sender_mail__content__input" name="title"
                   placeholder="Тема (Например заказ домика)" required/>
            <input type="number" class="sender_mail__content__input" name="phone" placeholder="Номер телефона"
                   required/>
            <textarea class="sender_mail__content__text" name="text" placeholder="Сообщение" required></textarea>
            <div class="sender_mail__content__submit_block">
                <p>*вам могут позвонить после отправки сообщения для уточнения заказа</p>
                <button onclick="send()" type="submit">Отправить</button>
            </div>
        </div>
        <button onclick="closeForm()" class="sender_mail__close_btn"> <img src="../static/svgs/times.svg"/> </button>
    </div>
</div>

<div class="wrapper">
    <header class="header">
        <div class="header__info">

            <div class="header__logo_block">
                <img src="../static/images/logo.jpg" alt="горный приют"/>
            </div>

            <div class="header__content">
                <div class="header__content__contacts">
                    <div class="header__contact_info">
                        <img src="../static/svgs/phone.svg">
                        <p>+7 903 992 79 63</p>
                    </div>
                    <div class="header__contact_info">
                        <img src="../static/svgs/envelope.svg">
                        <p> reklama@us-rub.ru</p>
                    </div>
                    <div class="header__content__btn">
                        <button onclick="openForm()" class="write_mail___btn">
                            Напишите нам
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="header__links">
            <ul>
                <li><a href="/">
                        <div class="header__links__link">Главная</div>
                    </a></li>
                <li>
                    <div class="header__links__sep"></div>
                </li>
                <li><a href="/services">
                        <div class="header__links__link">Услуги</div>
                    </a></li>
                <li>
                    <div class="header__links__sep"></div>
                </li>
                <li><a href="/scheme">
                        <div class="header__links__link">Схема проезда</div>
                    </a></li>
                <li>
                    <div class="header__links__sep"></div>
                </li>
                <li><a href="/photo?p=1">
                        <div class="header__links__link">Фотогалерея</div>
                    </a></li>
            </ul>
        </div>

    </header>

    <div class="content">
        <?php if (!empty($content["content"])) require_once $content["content"] ?>
    </div>

    <div class="sidebar">
        <div class="news">
            <div class="news__header">
                Новости
            </div>
            <div class="news__list">

                <? foreach ($data["news"] as $new) : ?>

                    <div class="new">
                        <div class="new__title">
                            <div class="new__title__text"><?= $new['title'] ?></div>
                            <div class="new__title__date"><?= $new['date'] ?></div>
                        </div>
                        <div class="new__content"><?= $new['text'] ?></div>
                    </div>
                <? endforeach; ?>

            </div>

        </div>
    </div>

</div>
</body>
<script src="../static/js/send-mail.js"></script>
<script src="../static/js/close-form.js"></script>
</html>

