<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $aniid=$_GET['editid'];
        $aimg=$_FILES["image"]["name"];
$extension = substr($aimg,strlen($aimg)-4,strlen($aimg));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Hình ảnh có định dạng không hợp lệ. Chỉ jpg / jpeg/ png /gif định dạng được phép');</script>";
}
else
{

$aimg=md5($aimg).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$aimg);
    $query=mysqli_query($con, "update tblanimal set AnimalImage='$aimg' where ID='$aniid'");
    if ($query) {
  
    echo '<script>alert("Hình ảnh động vật đã được cập nhật.")</script>';
  }
  else
    {
      
      echo '<script>alert("Đã xảy ra sự cố. Vui lòng thử lại.")</script>';
    }

  
}

  }
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm chi tiết động vật - Hệ thống quản lý sở thú</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
     <?php include_once('includes/sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
          <?php include_once('includes/header.php');?>
            <!-- header area end -->
            <!-- page title area start -->
           <?php include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
          
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Cập nhật chi tiết động vật</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <?php
 $aniid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblanimal where ID='$aniid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Tên động vật</label>
                                                <input type="text" class="form-control" id="aname" name="aname" aria-describedby="emailHelp" placeholder="Nhập tên động vật" value="<?php  echo $row['AnimalName'];?>" readonly="true">
                                            </div>
                                       
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Hình ảnh động vật cũ</label>
                                                <img src="images/<?php  echo $row['AnimalImage'];?>" width="100" height="100">
                                            </div>
                                          <div class="form-group">
                                                <label for="exampleInputEmail1">Hình ảnh động vật mới</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true">
                                                
                                            </div>
                                           
                                         
                                            <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Cập nhập</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                         
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
<?php }  ?>