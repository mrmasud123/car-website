<?php include 'partials/header.inc.php'; ?>
<?php
$admin_id = $_SESSION["logged_admin_id"];
$DB->select("admin_tbl", "*", null, "id=$admin_id");
$data = $DB->getResult();

?>
<div class="dashboard-content mt-5 px-2">

    <div class="dashboard-container">
        <div class="profile">
            <h1>Profile Information</h1>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td class="text-capitalize">
                        <?php echo $data[0]['admin_name'] ?>
                    </td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td class="text-lowercase">
                        <?php echo $data[0]['admin_email'] ?>
                </tr>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <?php echo $data[0]['admin_password'] ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="admin-post-container"></div>
    </div>
</div>
</div>
</div>
</section>

<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>