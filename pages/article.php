<div class="container-fluid">
<div class="container-fluid">
<div class="row">
<?php
if(isset($_GET['id'])){
$id = filter_pass($_GET['id']);
$sql = "SELECT `article`.* 
    , `users`.`username` 
    FROM `article`,`users` 
    WHERE `article`.`fk_users_id`=`users`.`id` AND `article`.`id` = '$id'";
$result = $connection->query($sql);
if($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="col-xs-12 col-md-8 col-xl-9 fs-5 py-3 gap-4 d-flex flex-column" >

        <img class="rounded-3  col-xl-9 col-xs-12 " src="<?=BASE_URL . '/article-image/' . $row['img_name']?>"  >
        <h2><?=$row['title']?></h2>
        <p class="content-article  h-100"><?=$row['content']?></p>
        <div>
            <p>تاریخ ثبت مقاله : <?=$row['publish_date']?></p>
            <p>نویسنده : <?=$row['username']?></p>
        </div>

    </div>
<?php
}}
?>
    <div class="d-flex flex-column col-xs-12 col-md-4 col-xl-3 mb-4 h-100">
    <?php
    $id = filter_pass($_GET['id']);
    $sql =" SELECT * FROM `article` WHERE `id` != '$id'  ORDER BY `id` DESC ";
    $result = $connection->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
    ?>
            <div class="box-article-suggestions">
                <a href="?page=article&id=<?=$row['id']?>">
                    <div class="border border-2 text-center rounded d-flex  flex-row mt-3 " >
                        <img class="w-50 h-50 box-article-img  rounded "
                             src="<?= BASE_URL.'/../article-image/'. $row['img_name'] ?>">
                        <h4 class="mt-2 w-100 align-self-center ms-2 fs-5" ><?= $row['title'] ?></h4>
                    </div>
                </a>
            </div>


        <?php
    }
    ?>
    </div>
</div>
</div>
</div>
