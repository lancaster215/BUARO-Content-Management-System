<?php
	include '../../vendor/Parsedown/Parsedown.php';
	function decode($string) {
	return htmlspecialchars_decode($string, ENT_HTML5 | ENT_QUOTES);
	}
?>

<style>
.pic img {
  height: 150px;
  width:150px;
  border-radius:50%;

 
  -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;

}
 
.pic img:hover {
  box-shadow: 0px 0px 15px 5px rgba(65, 65, 65, 0.99);
}
@media (max-width: 768px){
	h3{
		font-size: 15px;
		font-weight: bold;
	}
	p{
		margin-top: 230px;
		max-width: 300px;
	}
	.top-b,footer{
		width: 500px;
	}
	.title{
	}
}
</style>

<link rel="stylesheet" type="text/css" href="../css/breadcrumb.css">
<script>
function w3_open() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("sidebar").classList.add("w3-animate-left");
    document.getElementById("main").style.marginLeft = "200px";
}
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.width = 0;
    document.getElementById("main").style.marginLeft = 0;
    document.getElementById("sidebar").classList.remove("w3-animate-left");
}
</script>
<div id="content2">												<!--  T  H  E     C  O  N  T  E  N  T  -->
			<div class="top-b">
				<ul class="breadcrumb">
					<a class="w3-padding-16 w3-opennav" href="javascript:void(0)" onclick="w3_open()" style="text-decoration:none;margin-left:40px;margin-right:10px;font-size:20px;">&#9776;</a>
					<li><a href="aro3.php">Home</a></li>
					<li>Stories</li>
				</ul>
			</div>
			<div class="w3-container w3-padding-jumbo">
				<?php
					$parsedown = new Parsedown();
					$getquery = "SELECT * FROM post WHERE post_type = 1 AND status = 'shown'" ;
					$run = mysqli_query($con,$getquery);
					$id = 0;
					while($row = mysqli_fetch_array($run)){
						echo '<div class="post">';
						$newstring = substr($parsedown->text($row['content']),0,250);
						if(!isset($row['imgbanner']) || $row['imgbanner']=="none" || $row['imgbanner']==""){
							$row['imgbanner'] = "../../data/events-stories/noimage.jpg";
						}
						echo '
						<div  class = "pic" onclick = "viewStory('.$row['post_id'].')">
							<div class="w3-container w3-half">
								<div id="title" style="height:50px;">
									<h3>'.$row['title'].'</h3>
								</div>
								<div class="w3-container w3-half" style="margin-bottom:50px;">
               						<img src="'.$row['imgbanner'].'"alt = "Avatar">
               					</div>
               					<div clss="w3-container" style="min-width:500px;">
									<p>'.decode($newstring).'<a style="cursor:pointer; color:#441cff;">...Read More</a></p>
								</div>
               					<hr>
               				</div>
						</div>
							';
						$id++;
						echo '</div>';
					}
				?>
				</div>
				<div class="pagination">

				</div>
				</div>
				
			</div>