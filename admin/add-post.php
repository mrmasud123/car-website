<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="dash-head d-flex align-items-center justify-content-between">
                        <h1 class="mb-3">Add New Post <i class="ms-2 fa fa-newspaper-o"></i></h1>
                        <a href="news.php" class="btn btn-warning btn-sm d-inline">All Posts?<i class="ms-2 fa fa-plus"></i></a>
                    </div>
                    <!-- <div class="dashboard-container"> -->
                      <div class="news-form">
                        <form action="">
                            <div class="form-group mt-2 mb-2">
                                <input type="text" value="Masud" disabled class="form-control">
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <input type="text" placeholder="Enter post title" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="" class="form-control" id="" cols="15" style="resize: none;" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <select name="" class="form-control" id="">
                                    <option value="" selected disabled>Choose post category</option>
                                    <option value="">Sales</option>
                                    <option value="">Promotion</option>
                                    <option value="">Exchange</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <input type="file" class="form-control">
                                
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