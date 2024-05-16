        <div class="card-body p-4">
            <div class="d-flex flex-start">
                <div style="width:100px;height:100px" class="me-3 user_img">
                    <img style="object-fit:contain" class="rounded-circle w-100" src="images/users_img/<?php echo $comment['user_img']?>" alt="Not found"/>
                </div>
                <div>
                    <h6 class="fw-bold text-capitalize mb-1">
                        <?php echo $comment['first_name'] . " " . $comment['last_name'] ?>
                    </h6>
                    <div class="d-flex align-items-center mb-3">
                        <p class="mb-0"></p>
                        <a href="#!" class="link-muted"><i
                                class="fa fa-pencil-alt ms-2"></i><?php echo $comment['comment_date'] ?></a>
                        <a href="#!" class="link-muted"><i class="fa fa-redo-alt ms-2"></i></a>
                    </div>
                    <p class="mb-0"> <?php echo $comment['user_comment'] ?></p>
                    <div class="news-reaction d-flex align-items-center mb-4 mt-2">
                        <div class="like me-5 d-flex align-items-center">
                            <i data-post-id="<?php echo $comment['comment_id'] ?>" data-inc-type="like" class="fa fa-thumbs-up fs-3 me-2 thumb"></i>
                            <span class="badge bg-success"><?php echo $comment['comment_like']; ?></span>
                        </div>
                        <div class="dislike d-flex align-items-center">
                            <i data-inc-type="dislike"  data-post-id="<?php echo $comment['comment_id'] ?>" class="fa fa-thumbs-down fs-3 me-2 thumb"></i>
                            <span class="badge bg-success"><?php echo $comment['comment_dislike']; ?></span>
                        </div>
                        <?php 
                            if($comment['user_id']==$_SESSION['logged_user_id']){
                                echo "<button data-comment-id=".$comment['comment_id']." class='ms-3 btn btn-sm btn-danger comment_delete'><i class='fa fa-trash'></i></button>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-0" />