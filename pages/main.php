<div class="container-fluid text-center row-cols-xl-5 my-5">
    <?php
    $sql =" SELECT * FROM `article` ORDER BY `id` DESC ";
    $result = $connection->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="col-lg-3 col-md-5 col-sm-8 col-xs-12 box-article border
         border-2 text-center rounded pb-3 p-2 d-inline-block ">
            <img class=" box-article-img rounded" style="max-height: 165px;min-height: 165px "
                 src="<?= BASE_URL.'/../article-image/'. $row['img_name'] ?>">
            <h4 class="my-3"><?= $row['title'] ?></h4>
            <a class="btn btn-primary w-100" href="?page=article&id=<?=$row['id']?>">نمایش مقاله</a>
        </div>
    <?php
    }
    ?>
</div>
