<?php
include "includes/headerDash.php";
include "includes/bloggerStats.php";
include "includes/messaging.php";
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow position-fixed fixed-top">
        <div class="container">
            <div class="navbar-brand d-grid">
                <a href="#"><img src="images/newLogo3.png" alt="" class="img_size"></a>
            </div>

            <div class="profile_detail d-flex align-items-center justify-content-between text-white">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="d-flex align-items-center me-4">
                        <span class="material-icons-sharp cursor" title="Notifications" onclick="show('dashbody_6','btn6');">
                            notifications
                        </span>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="photo bg-black rounded-circle overflow-hidden" id="userphoto">

                            <img src="<?= $staff_photo ?>" alt="" class="img_size">
                        </div>
                        <div class="dropdown me-3">
                            <a class="text-white dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            </a>
                            <ul class="dropdown-menu px-2">
                                <li class="d-flex align-items-center">
                                    <span class="material-icons-sharp">
                                        person
                                    </span>
                                    <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#profileEdit">
                                        My Profile
                                    </a>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span class="material-icons-sharp">
                                        logout
                                    </span>
                                    <a class="dropdown-item cursor" href="models/logout.php">
                                        Logout
                                    </a>
                                </li>

                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>
                        <div class="row">
                            <p class="m-0 p-0 ps-2 name"><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></p>
                            <small class="position"><?= $staff_info["position"] ?></small>
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="pad"></div>

    <main>
        <div class="row mx-0">

            <!-- alerts -->
            <!-- alerts -->
            <div aria-live="polite" aria-atomic="true" class="position-relative">
                <!-- Position it: -->
                <!-- - `.toast-container` for spacing between toasts -->
                <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
                <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
                <div class="toast-container top-0 end-0 p-3">
                    <!-- Then put toasts within -->
                    <div class="toast" id="toast1" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <span class="material-icons-sharp rounded me-2 text-danger">
                                warning
                            </span>
                            <strong class="me-auto">Error Message</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="btn-close" onclick="closeAlert()"></button>
                        </div>
                        <div class="toast-body bg-danger text-white toast1Msg">
                            ........
                        </div>
                    </div>
                    <div class="toast" id="toast2" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <span class="material-icons-sharp rounded me-2 text-success">
                                warning
                            </span>
                            <strong class="me-auto">Success Message</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="btn-close" onclick="closeAlert2()"></button>
                        </div>
                        <div class="toast-body bg-success text-white " id="toast2Msg">
                            ........
                        </div>
                    </div>
                </div>
            </div>
            <!-- alerts -->
            <!-- alerts -->


            <!-- ASIDE -->
            <!-- ASIDE -->
            <aside class="bg-white col d-none d-lg-grid p-3 pt-5">
                <div class="dash_navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item nav_item nav_item2 d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_1','btn1');" id="btn1">
                            <span class="material-icons-sharp text-primary">
                                dashboard
                            </span>
                            <p class="align-self-center my-auto ms-3">Dashboard</p>
                        </li>
                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_2','btn2');" id="btn2">
                            <span class="material-icons-sharp text-primary">
                                note_add
                            </span>
                            <p class="align-self-center my-auto ms-3">New Blog Post</p>
                        </li>

                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_3','btn3');" id="btn3">
                            <span class="material-icons-sharp text-primary">
                                list_alt
                            </span>
                            <p class="align-self-center my-auto ms-3">All Posts</p>
                        </li>

                        <li class="nav-item nav_item d-flex align-items-center justify-content-start p-2" onclick="show('dashbody_6','btn6');" id="btn6">
                            <span class="material-icons-sharp text-primary">
                                email
                            </span>
                            <p class="align-self-center my-auto ms-3">Messages <span class="badge badge-pill badge-danger bg-danger">0</span></p>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- ASIDE -->
            <!-- ASIDE -->

            <!-- CHANGING DASHBOARD -->
            <!-- CHANGING DASHBOARD -->
            <div class="dashbody col-10 p-5 overflow-y-scroll">
                <!-- dash body 1 -->
                <!-- dash body 1 -->
                <div id="dashbody_1" class="page">
                    <div class="body_1">
                        <p>Dashboard Admin #<span class="staffID"><?= $staff_info['Staff_id'] ?></span></p>
                    </div>
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white">Hospital Stats</h5>
                            <div class="card-body row px-4">
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-primary">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Number of Posts</small>
                                            <h4 class="noStaff"><?= $blogcount ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-danger">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Total Blog Comments</small>
                                            <h4 class="noPatient"><?= $totalcomm ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="details d-flex align-items-center">
                                        <span class="material-icons-sharp me-2 span_1 fs-1 text-info">
                                            reorder
                                        </span>
                                        <div class="details_2">
                                            <small class="mb-5 fw-bold">Total Blog Views</small>
                                            <h4 class="revenue"><?= $totalviewcount ?></h4>
                                            <small class="text-muted">last updated: <?= $today ?></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- dash body 1 -->
                <!-- dash body 1 -->

                <!-- dash body 2 -->
                <!-- dash body 2 -->
                <div id="dashbody_2" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    note_add
                                </span>
                                Add New Blog Post
                            </h5>
                            <div class="card-body px-2">
                                <form class="row g-3 px-3" id="addBlog">

                                    <div class="col-md-12">
                                        <label for="inputEmail" class="form-label">Blog Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Name of Author</label>
                                        <input type="text" class="form-control" name="author">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Blog Thumbnail</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="avatar" id="inputGroupFile02">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Blog Body</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary text-white w-100" id="addBlogBtn" onclick="addBlog()">
                                            Add Blog
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- dash body 2 -->
                <!-- dash body 2 -->


                <!-- dash body 3 -->
                <!-- dash body 3 -->
                <div id="dashbody_3" class="page" style="display: none;">
                    <div class="body_2 mb-4" id="resultStaff2">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    list_alt
                                </span>
                                Blog Posts
                            </h5>
                            <div class="card-body px-2">
                                <div class="row g-3 px-3">
                                    <table class="table table-hover table-primary">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Title </th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Views</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Date</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>

                                            </tr>
                                        </thead>
                                        <tbody id="data-output1">
                                            <?php
                                            $i = 1;
                                            while ($result4 = mysqli_fetch_assoc($sql4)) {
                                                $pID = $result4['post_id'];
                                                $sql3 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = ' $pID ' ");
                                                $comcount = mysqli_num_rows($sql3);

                                                $sql7 = mysqli_query($conn, "select * from nhmh_blog_visits_db where post_id = ' $pID ' ");
                                                $viewcount = mysqli_num_rows($sql7);

                                            ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><img src="images/blog_posts/post<?= $result4['post_photo'] ?>" class="img_size2"></td>
                                                    <td><?= $result4['post_title'] ?></td>
                                                    <td><?= $result4['post_author'] ?></td>
                                                    <td><?= $viewcount ?></td>
                                                    <td><?= $comcount ?></td>
                                                    <td><?= $result4['publish_date'] ?></td>
                                                    <td>
                                                        <button data-bs-toggle="modal" data-bs-target="#editBlog" class="btn btn-success text-white m-0" data-editPostID="<?= $result4['post_id'] ?>">
                                                            <span class="material-icons-sharp">
                                                                edit
                                                            </span>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger text-white m-0 delete-btn1" data-id="<?= $result4['post_id'] ?>">
                                                            <span class="material-icons-sharp">
                                                                delete
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 3 -->
                <!-- dash body 3 -->

                <!-- delete modal -->
                <!-- delete modal -->

                <div class="modal fade" id="delete-modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Blog post</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger delete-confirm-btn1">Delete post</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete modal -->
                <!-- delete modal -->


                <!-- dash body 6 -->
                <!-- dash body 6 -->
                <div id="dashbody_6" class="page" style="display: none;">
                    <div class="body_2 mb-4">
                        <div class="card shadow border-0 rounded-0">
                            <h5 class="card-header bg-white  d-flex align-items-center gap-2">
                                <span class="material-icons-sharp text-primary">
                                    dashboard
                                </span>
                                NHMH Messaging software
                            </h5>
                            <div class="card-body px-4">
                                <div class="row">
                                    <div class="col-4">
                                        <h3>Chats</h3>
                                        <div class="card-body bg-light rounded-3 p-1 d-flex align-items-center">
                                            <span class="material-icons-sharp text-primary me-2">
                                                search
                                            </span>
                                            <input type="text" class="form-control bg-light text-primary border-0" id="searchUsers" placeholder="Search Users...." value="">
                                        </div>

                                        <div class="users mt-2">
                                            <?php while ($mresult10 = mysqli_fetch_assoc($msql10)) {

                                                $outgoing_id = $staff_info['unique_id'];

                                                $msql11 = mysqli_query($conn, "SELECT * FROM nhmh_internal_messages_db WHERE (incoming_msg_id = {$mresult10['unique_id']}
                OR outgoing_msg_id = {$mresult10['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");

                                                $row11 = mysqli_fetch_assoc($msql11);

                                                (mysqli_num_rows($msql11) > 0) ? $result = $row11['message'] : $result = "No message available";
                                                (strlen($result) > 20) ? $msg =  substr($result, 0, 20) . '...' : $msg = $result;

                                                if (isset($row11['outgoing_msg_id'])) {
                                                    ($outgoing_id == $row11['outgoing_msg_id']) ? $you = "You: " : $you = "";
                                                } else {
                                                    $you = "";
                                                }

                                            ?>
                                                <div class="card-body d-flex align-items-start gap-2 border-bottom cursor" data-userMsgId="<?= $mresult10['unique_id'] ?>">
                                                    <form action="" id="messageForm">
                                                        <input type="hidden" name="incoming_id" id="incoming_id">
                                                        <input type="hidden" name="outgoing_id" value="<?= $staff_info['unique_id'] ?>">
                                                    </form>

                                                    <img src="images/staff<?= $mresult10['photo'] ?>" alt="" class="bg-primary img_wrap rounded">
                                                    <div class="row">
                                                        <div class="d-flex align-items-center mb-0 col-12 ">
                                                            <h6><?= $mresult10['position'] ?> <?= $mresult10['firstname'] ?></h6>
                                                            <!-- <small class="text-muted mx-auto">09:24</small> -->
                                                        </div>
                                                        <small class="col-12"><?= $you . $msg ?></small>
                                                    </div>
                                                    <?php if (($mresult10['status']) == "Offline now") { ?>
                                                        <span class="badge badge-pill badge-danger bg-light">0</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-pill badge-danger bg-success">0</span>
                                                    <?php } ?>

                                                </div>
                                            <?php } ?>


                                        </div>
                                    </div>
                                    <div class="col-8 bg-light p-2">

                                        <div class="card-body bg-white" id="msgUI1" style="display: none;">
                                            <div class="card-header d-flex bg-white gap-4">
                                                <span class="material-icons-sharp cursor" onclick="closeMsg()">
                                                    clear
                                                </span>
                                                <img src="" id="msgUIimg" class="bg-primary img_size">
                                                <div class=" mb-0">
                                                    <h6 id="msgUIname">Doctor Olamide</h6>
                                                    <small class="text-muted mx-auto" id="msgUIstatus">Active now</small>
                                                </div>

                                            </div>
                                            <div class="card-body bg-light msg-body d-fl" id="msg_blank">


                                            </div>
                                            <div class="card-body bg-white ">
                                                <form class="d-flex align-items-center" id="sendMessage">
                                                    <input type="hidden" name="incoming" id="incoming_id1">
                                                    <input type="hidden" name="outgoing" value="<?= $staff_info['unique_id'] ?>">
                                                    <input type="text" class="form-control bg-light border-0" id="send" placeholder="Send Message" name="message">
                                                    <button type="submit" class="btn btn-primary" onclick="insertChat()">
                                                        <span class="material-icons-sharp text-white ">
                                                            send
                                                        </span>
                                                    </button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dash body 6 -->
                <!-- dash body 6 -->


            </div>
        </div>
    </main>

    <!-- Modal for Add Service-->
    <!-- Modal for Add Service-->
    <div class="modal fade" id="editBlog" style="display: none;" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Edit Blog</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 px-3" id="updateBlog">

                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Blog Title</label>
                            <input type="hidden" class="form-control" id="number" name="blog_id">
                            <input type="text" class="form-control" name="uptitle" id="out1">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Name of Author</label>
                            <input type="text" class="form-control" name="upauthor" id="out2">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Blog Thumbnail</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="upavatar" id="inputGroupFile02">
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Blog Body</label>
                            <textarea class="form-control" id="out3" rows="8" name="upbody"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary text-white w-100" id="upBlogBtn" onclick="updateBlog()">
                                Republish Post
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal for Add Service-->
    <!-- Modal for Add Service-->


    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signinLabel">Admin Profile</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><small>You can edit your profile. To see the effect of update, logout and login back.</small>
                    <form action="" id="updateProfile" class="">
                        <div class="bg-danger card p-1 mb-1 text-center errMsg text-white" style="display: none;">
                            <p class="mb-0">success</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name</label>
                                <input type="text" class="form-control inp1" name="first_name" value="<?= $staff_info['firstname'] ?>">
                                <input type="hidden" name="user_id" id="hideID" value="<?= $staff_info['unique_id'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Last Name</label>
                                <input type="text" class="form-control inp2" name="last_name" value="<?= $staff_info['lastname'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="text" class="form-control inp3" name="email" value="<?= $staff_info['email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Phone</label>
                                <input type="text" class="form-control inp4" name="phone" value="<?= $staff_info['phone'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Address</label>
                                <textarea class="form-control inp5" name="address" id="exampleFormControlTextarea2" rows="3"><?= $staff_info['address'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mt-2 border-top p-2 pb-2">
                            <small class="text-danger">You can change your picture</small>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profile_photo" id="inputGroupFile02">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary text-white  px-5 w-100" onclick="updateProfiles('updateBtn')" id="updateBtn">Save
                                Changes
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal for dash profile-->
    <!-- Modal for dash profile-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/inactivity.js"></script>
    <script src="javascript/updateStaff.js"></script>
    <script src="javascript/bloggerOpr.js"></script>
    <script src="javascript/getMessages.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="javascript/navigate.js"></script>
</body>

</html>