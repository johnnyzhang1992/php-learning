<?php
/**
 * Created by PhpStorm.
 * User: zq199
 * Date: 2016/10/31
 * Time: 23:01
 */
require 'class/system.php';
require 'controller/get_home_data.php';
//主页
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="content col-md-10 col-md-offset-1">
    <div class="main-content col-md-8">
        <div class="content-header clearfix">
          <span class="pull-left">最新动态</span>
            <span class="pull-right">
                <a href="add_new.php" target="_blank">写文章</a>
            </span>
        </div>
        <div class="blog-content">
            <ul class="blog-list">
                <?php
                $item = $home_data->show_blog_list();
                $num = count($item);
                for($i=0;$i<$num;$i++){
                    $id = $i+1;
                    $item_content = '';
                    if(strlen($item[$i]['content'])>160){
                        $item_content = mb_substr($item[$i]['content'],0,160). '...';
                    } else{ $item_content = $item[$i]['content'];}

                    echo "<li class='blog-item'><div class='item-title'><h4><a href='/php-mysql/blog/article.php?id=$id'>".$item[$i]['title']."</a></h4></div>"
                        ."<div class='item-tag'><a href='#' class='btn btn-info'>".$item[$i]['tag']."</a></div >"
                        ."<div class='item-content'>".$item_content."</div ></li >" ;
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="side-content col-md-4">
        <div class="user-card" style="text-align: center">
            <div class="avatar" style="">
                <img src="<?php @$home_data->get_user_avatar() ?>" alt="" style="width: 60px;height: 60px">
            </div>
            <div class="user-name">
                <a href="#"><?php @$home_data->get_user_name()?></a>
            </div>
            <div class="user-description">
                <p><?php @$home_data->get_user_description() ?></p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
