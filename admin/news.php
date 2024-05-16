<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="dash-head d-flex align-items-center justify-content-between">
        <h1 class="mb-3">News/Blogs <i class="ms-2 fa fa-newspaper-o"></i></h1>
        <a href="add-post.php" class="btn btn-warning btn-sm d-inline">Add Post?<i class="ms-2 fa fa-plus"></i></a>
    </div>
    <div class="dashboard-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Total Views</th>
                    <th>Status</th>
                    <th>Thumbnail</th>
                    <th>Published date</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $DB->select("post_category", "*", "news on news.post_type=post_category.id",null,"news.id asc");

                $all_news = $DB->getResult();
                if(count($all_news)>=1){
                foreach ($all_news as $news) {
                    ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td class="text-capitalize"><?php echo $news['auth_name']; ?></td>
                        <td><?php echo $news['title'] ?></td>
                        <td><?php echo substr($news['post_desc'], 0,20)."......";?></td>
                        <td><?php echo $news['total_views']; ?></td>
                        <td>
                            <?php  
                                if($news['post_status']){
                                    echo '<input type="checkbox" data-news-id='.$news["id"].' class="toggle-checkbox news__check" checked />';
                                }else{
                                    echo '<input type="checkbox" data-news-id='.$news["id"].' class="toggle-checkbox news__check" />';
                                }
                            ?>
                        </td>
                        <td class="thumbnail"><img src="../images/post_img/<?php  echo $news['post_img'];  ?>" alt=""></td>
                        <td><?php echo $news['publish_date'] ?></td>
                        <td><span class="badge bg-warning text-capitalize"><?php echo $news['cat_name']; ?></span></td>
                        <td class="d-flex align-items-center justify-content-between">
                            <a href="edit-post.php?pid=<?php echo $news['id'] ?>" class="btn btn-sm btn-primary">Edit?</a>
                            <button data-auth-id="<?php echo $news['auth_id'] ?>" data-post-id="<?php echo $news['id'] ?>" class="delete_post btn btn-sm btn-danger">Delete?</button>
                        </td>
                    </tr>
                    <?php
                }}else{
                    echo "<tr ><td colspan='10'>No post found</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>

<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>
