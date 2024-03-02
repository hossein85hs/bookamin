<div class="row p-3 shadow w-100 card">

    <?php
    if(isset($_POST['sendBtn'])){
        $user_id= $_SESSION['user_id'];
        $title= filter_pass($_POST['title']);
        $content= filter_pass($_POST['content']);
        $publish_date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `article`
                        (`fk_users_id`,`title`,`content`,`publish_date`)
                        VALUES
						(:fk_users_id ,:title,:content,:publish_date)";

        //
        $result = $connection->prepare($sql);
        $result->bindParam(':fk_users_id', $user_id);
        $result->bindParam(':title', $title);
        $result->bindParam(':content', $content);
        $result->bindParam(':publish_date',$publish_date);
        //
        $runcode = $result->execute();
        //
        if($runcode == true){
            echo "<div class='alert alert-success'>مقاله با موفقیت ثبت شد </div>";
        }
        else{
            echo "<div class='alert alert-danger'>خطا در ثبت مقاله  </div>";
        };
    }
    ?>

    <form method="post" action="" >
        <h3 class="h4">ثبت مقاله</h3>

        <input type="text" class="form-control my-3"
               placeholder="عنوان مقاله" name="title" id="title">

        <textarea class="form-control my-4"
                  placeholder="عنوان مقاله" rows="7" name="content" id="content"></textarea>

        <input type="submit" class="btn btn-primary" name="sendBtn" id="sendBtn" value="ثبت" >
    </form>
</div>