<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="dash-head d-flex align-items-center justify-content-between">
                        <h1 class="mb-3">Add New Post <i class="ms-2 fa fa-newspaper-o"></i></h1>
                        <a href="news.php" class="btn btn-warning btn-sm d-inline">All Posts?<i class="ms-2 fa fa-plus"></i></a>
                    </div>
                    <!-- <div class="dashboard-container"> -->
                      <div class="news-form">
                        <form id="add-post-form" action="" enctype="multipart/form-data">
                            <div class="form-group mt-2 mb-2">
                                <input name="author_name" type="text" value="<?php echo $_SESSION['logged_admin_name'] ?>" readonly class="form-control">
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <input name="post_title" type="text" placeholder="Enter post title" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="post_desc" class="form-control" id="" cols="15" style="resize: none;" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <select name="post_type" class="form-control" id="">
                                    <option value="" selected disabled>Choose post category</option>
                                    
                                    <?php 
                                        $DB->select("post_category","*");  
                                $all_cat=$DB->getResult();
                                foreach($all_cat as $cat){
                                    echo '<option value="'.$cat['id'].'">'.$cat['cat_name'].'</option>';
                                }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <input name="post_img" type="file" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <select name="post_publish" id="" class="form-control">
                                    <option value="" selected disabled>Publish Now?</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <button class="mt-3 btn btn-dark">Add Post?</button>
                       </form>
                      </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/admin.js"></script>

</body>

</html>