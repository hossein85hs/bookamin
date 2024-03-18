<?php
    $user_id= $_SESSION['user_id'];
    $sql =" SELECT * FROM `article` WHERE `fk_users_id` = '$user_id' ORDER BY `id` DESC ";
    $result = $connection->query($sql);
    if(isset($_GET['action'])){
        $action = filter_pass($_GET['action']);
        if($action=='delete'){
            $id=filter_pass($_GET['id']);
            $sql = "SELECT * FROM `article` WHERE `id`='$id' AND `fk_users_id`='$user_id' ";
            $result = $connection->query($sql);
            if($row=$result->fetch(PDO::FETCH_ASSOC)){
                $sql="DELETE FROM `article` WHERE `id`= '$id'";
                $delete=$connection->query($sql);
                if($delete){
                    $img_name=$row['img_name'];
                    unlink(BASE_DIR.'/../article-image/'.$img_name);
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                    echo "<div class='alert alert-success'>با موفقیت مقاله حذف شد</div>";
                }
            }
        }
    }
?>

<div class="row  ">
    <div class="shadow w-100 card">
        <div class="card-body">
            <h3 class="card-title h5">فهرست مقالات</h3>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>تاریخ ثبت</th>

                    
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['publish_date']?></td>
                        <td><a class="btn btn-sm btn-danger" href="?page=article&action=delete&id=<?=$row['id']?>">حذف</a>
                        <a class="btn btn-sm btn-primary" href="<?=BASE_URL?>?page=article&id=<?=$row['id']?>">نمایش</a>
                        </td>
                    </tr>
                    <?php
                };
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>