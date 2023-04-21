<div class="specials-section">
					<div class="container">
						<div class="specials-grids">
							
							<div class="col-md-4 specials1">
								<h3> Chi tiết</h3>
								<ul>
									<li><a href="about.php">Về chúng tôi</a></li>
									<li><a href="index.php">Trang chủ</a></li>
									<li><a href="contact.php">Liên hệ</a></li>
									<li><a href="admin/index.php">Quản trị viên</a></li>
								</ul>
							</div>
							<div class="col-md-4 specials1">
								<h3>Liên hệ</h3>
								<?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
								<address>
									<p>Email : <?php  echo $row['Email'];?></p>
								 <p>Số điện thoại : <?php  echo $row['MobileNumber'];?></p>
								 <p><?php  echo $row['PageDescription'];?></p>
								</address><?php } ?>
							</div>
							<div class="col-md-4 specials1">
								<h3>Mạng xã hội</h3>
								<ul>
									<li><a href="#">facebook</a></li>
									<li><a href="#">twitter</a></li>
									<li><a href="#">google+</a></li>
									<li><a href="#">Tiktok</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>