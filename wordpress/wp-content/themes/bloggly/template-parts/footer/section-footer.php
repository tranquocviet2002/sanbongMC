<style>
	/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #007b5e !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}

</style>
<?php 
$bloggly_option = blogone_theme_options();

$bs_main_footer_class = '';
if($bloggly_option['blogone_footer_bg_image']!=''){
	$bs_main_footer_class = 'bg_image';
}



?>

<?php
// Lấy dữ liệu từ wp_options
$quick_links = get_option('quick_links', ''); // '' là giá trị mặc định nếu không tìm thấy
$home1 = get_option('home1', ''); // '' là giá trị mặc định nếu không tìm thấy
$about = get_option('about', ''); // '' là giá trị mặc định nếu không tìm thấy
$FAQ = get_option('FAQ', ''); // '' là giá trị mặc định nếu không tìm thấy
$Get_Started = get_option('Get_Started', ''); // '' là giá trị mặc định nếu không tìm thấy
$Videos = get_option('Videos', ''); // '' là giá trị mặc định nếu không tìm thấy

// if (!empty($home1)) {
//     echo $home1; // Hiển thị footer từ database
// } else {
//     echo '<p>Footer mặc định </p>'; // Footer dự phòng nếu không có dữ liệu
// }
?>

<footer class="bs-footer_wrapper">
	
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5><?php echo $quick_links ?></h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $home1 ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $about ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $FAQ ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Get_Started ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Videos ?></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
				<h5><?php echo $quick_links ?></h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $home1 ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $about ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $FAQ ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Get_Started ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Videos ?></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
				<h5><?php echo $quick_links ?></h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $home1 ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $about ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $FAQ ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Get_Started ?></a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i><?php echo $Videos ?></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->

</footer>