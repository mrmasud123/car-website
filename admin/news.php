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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td class="text-capitalize">Masud Rana</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing .</td>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident iusto blanditiis voluptatem saepe, itaque non voluptate quod.</td>
                                    <td>20</td>
                                    <td><span class="status bg-success">Active</span></td>
                                    <td class="thumbnail"><img src="../images/11-2-car-picture.png" alt=""></td>
                                    <td>02/02/2023</td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        <a href="edit-post.php" class="btn btn-sm btn-primary">Edit?</a>
                                        <a href="#" class="btn btn-sm btn-danger">Delete?</a>
                                    </td>
                                </tr>
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