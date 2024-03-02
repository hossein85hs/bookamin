<?php
    $user_id= $_SESSION['user_id'];
    $sql =" SELECT * FROM `article` WHERE `fk_users_id` = '$user_id' ORDER BY `id` DESC ";
    $result = $connection->query($sql);

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
                        <td><a class="btn btn-sm btn-danger" href="#">حذف</a></td>
                    </tr>
                    <?php
                };
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>