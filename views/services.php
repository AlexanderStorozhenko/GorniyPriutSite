<div class="services_table">
    <div class="services_table__row_caption ">
        <div class="services_table__col_caption">Услуга</div>
        <div class="services_table__col_caption">Стоимость</div>
    </div>
    <? for ($i = 0;$i < count($data['services']);$i++) : ?>
        <? if ($i % 2 == 0) : ?>
            <div class="services_table__row services_table_row_fill">
                <div class="services_table__col"><?= $data['services'][$i]['name'] ?></div>
                <div class="services_table__col_price"><?=  $data['services'][$i]['price'] ?></div>
            </div>
        <?else:?>
            <div class="services_table__row">
                <div class="services_table__col"><?=  $data['services'][$i]['name'] ?></div>
                <div class="services_table__col_price"><?=  $data['services'][$i]['price'] ?></div>
            </div>
        <? endif; ?>
    <? endfor;?>

</div>

