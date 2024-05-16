<?php 
    include 'partials/header.inc.php'; 
    $pid=$_GET['pid'];
    $DB->select("news","*",null,"id=$pid");
    $news_data=$DB->getResult();
    // echo "<pre>";
    // print_r($news_data);
    // echo "</pre>";
    // die();
    foreach($news_data as $news){


?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Edit Post</h1>
                        <a href="news.php" class="btn btn-primary">View all news?</a>
                    </div>
                    <div class="text-light dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="form-container w-100">
                        <form id="edit-post-form" action="" enctype="multipart/form-data">
                            <div class="form-group mt-2 mb-2">
                                <input name="author_name" readonly type="text" value="<?php echo $news['auth_name']; ?>" class="form-control">
                                <input type="text" hidden readonly name="post_id" value="<?php echo $pid; ?>" class="form-control">
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <input name="post_title" value="<?php echo $news['title']; ?>" type="text" placeholder="Enter post title" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="post_desc" class="form-control" id="" cols="15" style="resize: none;" rows="5"><?php echo $news['post_desc']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <select name="post_type" class="form-control" id="">
                                    <?php 
                                        $DB->select("post_category","*",null);
                                        $all_cat=$DB->getResult();
                                        foreach($all_cat as $s_cat){    
                                            if($s_cat['id']==$news['post_type']){
                                                echo "<option class='text-capitalize' selected value='".$s_cat['id']."'>".$s_cat['cat_name']."</option>";
                                            }else{
                                                echo "<option class='text-capitalize' value='".$s_cat['id']."'>".$s_cat['cat_name']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <input name="new_post_img" type="file" class="form-control">
                                <input name="old_post_img" type="text" hidden value="<?php echo $news['post_img'] ?>" readonly class="form-control">
                                <div class="prev_post_img mt-3" style="width:200px;height:150px">
                                    <img class="rounded" style="width:100%;height:100%;object-fit:cover" src="../images/post_img/<?php echo $news['post_img']; ?>" alt="">
                                </div>
                            </div>
                            <div class="form-group mb-2 edit-post">
                                <label for="">Choose post status</label>
                                <?php  
                                if($news['post_status']){
                                    echo '<input type="checkbox" data-news-id='.$news["id"].' class="toggle-checkbox news__check" checked />';
                                }else{
                                    echo '<input type="checkbox" data-news-id='.$news["id"].' class="toggle-checkbox news__check" />';
                                }
                            ?>
                            </div>
                            <button class="mt-3 btn btn-dark">Update Post?</button>
                       </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/admin.js"></script>

</body>

</html>