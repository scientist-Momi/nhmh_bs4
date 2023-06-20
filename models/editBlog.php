<?php

include_once "../includes/db_connector.php";

// Getting all inputs from form
$uptitle = stripslashes($_POST['uptitle']);
$upauthor = stripslashes($_POST['upauthor']);
$upbody = stripslashes($_POST['upbody']);
$blog_id = stripslashes($_POST['blog_id']);
$avatar = $_FILES['upavatar'];

$sql = mysqli_query($conn, "select * from nhmh_blogposts_db where post_id = '$blog_id' ");

if(mysqli_num_rows($sql) > 0){
    $sql_array = mysqli_fetch_assoc($sql);

    $title = $sql_array['post_title'];
    $author = $sql_array['post_author'];
    $body = $sql_array['content'];
    $photo = $sql_array['post_photo'];
    
    if(!empty($uptitle)){
        $title = $uptitle;
    }if(!empty($upauthor)){
        $author = $upauthor;
    }if(!empty($upbody)){
        $body = $upbody;
    }if(!empty($avatar)){
        // To work on uploading photo
        $affix = "nhmh";
        $avatar_name = $affix . $avatar['name'];
        $avatar_tmp_name = $avatar['tmp_name'];
        $avatar_destination_path = '../images/blog_posts/post' . $avatar_name;

        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $avatar_name);
        $extension = end($extension);

        if (in_array($extension, $allowed_files)) {
            //make sure image is not too large
            if ($avatar['size'] < 2000000) {
                // to check if file already exists
                if (file_exists($avatar_destination_path)) {
                    $photo = $photo;
                } else {
                    // upload avatar
                    $photo = $avatar_name;

                }
            } else {
                $photo = $photo;
            }
        } else {
            $photo = $photo;
        }
    }
    $today = date("Y-m-d");

    $publish_date = date('F j, Y', strtotime($today));

    $sql2 = mysqli_query($conn, "update nhmh_blogposts_db set post_title = '$title', post_author = '$author', publish_date = '$publish_date', content = '$body', post_photo = '$photo' where post_id = '$blog_id' ");

    if($sql2){
        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
        echo "Successful";
    }

}
