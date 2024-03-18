<div class="row p-3 shadow w-100 card">

    <?php
    if(isset($_POST['sendBtn'])){
        $user_id= $_SESSION['user_id'];
        $title= filter_pass($_POST['title']);
        $content= filter_pass($_POST['content']);
        $publish_date = date("Y-m-d H:i:s");
        //upload image

            $img_file = $_FILES['img_file'];
            $img_name =basename($img_file['name']);
            $img_type = $img_file['type'];
            $img_size = $img_file['size'];
            $img_tmp_name = $img_file['tmp_name'];
            $error_flag= 0;

        //if image

            if($img_type == "image/png" || $img_type == "image/jpeg"){
            }else{
                echo "<div class='alert alert-danger'>فرمت عکس نامعتبر است</div>";
                $error_flag = 1;
            }
            if($img_size >= 8000000 ){
                $error_flag = 1;
            }

        //
        if( $error_flag == 0){
            $file_dir=BASE_DIR.'/../article-image/'. $img_name;
            $upload_result=move_uploaded_file($img_tmp_name,$file_dir);
            if($upload_result == true){
//                echo "<div class='alert alert-success '>با موفقیت آپلود شد</div>";
                $sql = "INSERT INTO `article`
                        (`fk_users_id`,`title`,`content`,`img_name`,`publish_date`)
                        VALUES
						(:fk_users_id ,:title,:content,:img_name,:publish_date)";
            }
        }


        //
        $result = $connection->prepare($sql);
        $result->bindParam(':fk_users_id', $user_id);
        $result->bindParam(':title', $title);
        $result->bindParam(':content', $content);
        $result->bindParam(':img_name', $img_name);
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

    <form method="post" action="" enctype="multipart/form-data" >
        <h3 class="h4">ثبت مقاله</h3>

        <input type="text" class="form-control my-3"
               placeholder="عنوان مقاله" name="title" id="title">

        <textarea class="form-control my-4"
                  placeholder="عنوان مقاله" rows="7" name="content" id="content"></textarea>

        <input type="file" class="d-block my-3" name="img_file">

        <input type="submit" class="btn btn-primary" name="sendBtn" id="sendBtn" value="ثبت" >
    </form>
</div>