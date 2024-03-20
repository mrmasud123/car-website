<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Edit Post</h1>
                        <a href="news.php" class="btn btn-primary">View all news?</a>
                    </div>
                    <div class="dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="form-container w-100">
                            <form action="">
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Post Title</label>
                                    <input type="text" name="car_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Post Description</label>
                                    <textarea name="" class="form-control" style="resize: none;" id="" cols="30" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Post Status</label>
                                    <select name="" class="form-control" id="">
                                        <option value="" selected disabled>Choose Post Status</option>
                                        <option value="">Active</option>
                                        <option value="">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Photo </label>
                                    <input type="file" name="car_name" class="form-control mb-2">
                                    <div class="prev-photo">
                                        <img src="../images/about.jpg" alt="">
                                    </div>
                                </div>
                                <button class="btn btn-primary">Update?</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/admin.js"></script>

</body>

</html>