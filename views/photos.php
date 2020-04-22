
<div class="pagination">
    <? if (!empty($data)) : ?>
    <?  for($i=1;$i<$data['pagination']+1;$i++) : ?>
    <a href="<?='/photo?p=' . $i ?>" class="pagination__element"><?=$i?></a>
        <? endfor; ?>
    <? endif; ?>
</div>
<div class="photos_loader"><img class="icon_looped" src="../static/svgs/circle.svg" alt="loader"/></div>
<div class="photos">
    <? if (!empty($data)) : ?>
        <?  for($i=0;$i<count($data['images'][0]);$i++) : ?>
            <img onclick="showImage(this)" class="photos__element <?="photo_size_" . $data['sizes'][$i]?>" src="../static/images/photos/<?=$data["images"][0][$i]['path'] . '.jpg' ?>" alt=""/>
        <? endfor; ?>
    <? endif; ?>
</div>
<div class="pagination">
    <? if (!empty($data)) : ?>
        <?  for($i=1;$i<$data['pagination']+1;$i++) : ?>
            <a href="<?='/photo?p=' . $i ?>" class="pagination__element"><?=$i?></a>
        <? endfor; ?>
    <? endif; ?>
</div>
<script src="../static/js/photos-loader.js">
</script>