<?php
include '../layouts/connect.php';
include '../layouts/app.php';
?>


	
<div>
<div>
<section id="nav">
			<div class="navLeft">
				<h1>Admin Panel</h1>
			</div>
			
	</section>
		<section id="mid">
			<div class="symbol" onclick="show()">
				<span class="cross c1"></span>
				<span class="cross c2"></span>
			</div>
			<div class="midLeft" id="work">
				<div class="list">
					<ul>
						<li class="active">
						  <img
								src="https://cdn-icons-png.flaticon.com/128/1828/1828765.png"
								alt=""
							/><span>DASHBOARD</span>
						</li>
						
						<li> <a href="../admin/admin_see_album.php">
							<img
								src="https://cdn-icons-png.flaticon.com/128/2099/2099058.png"
								alt=""
							/><span>Album</span></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="fl">
<?php
			// Display the picture
			$id = $_GET['img_id'];
			$query =("SELECT * FROM pictures WHERE album_id = $id");
			$result = mysqli_query($con,$query);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$id = $row['id'];
					$imageUrl = '../upload_picture/'.$row['image'];
					$desc = $row['description'];
					
			?>  
				  <div class="fancy_im1 fr">
				  <a data-caption="<?php echo $desc; ?>"
								data-fancybox="gallery" 
								href="<?php echo  $imageUrl ?>">
								<img class="rounded img_small" src="<?php echo  $imageUrl ?>" />
							</a>
							<div style="text-align:center; margin: 5px 5px"><?php echo $desc; ?></div>
						<div class="flex" style="justify-content:space-between; margin: 2px 5px">
						<div>
						<a href="edit_picture.php?edit_pic='<?php echo $id ?>'" class="btn_edit">Edit</a>
						</div>
						
						<div>
						<a href="delete_picture.php?delete_pic='<?php echo $id ?>'" class="btn_delete">Delete</a>
						</div>
						</div>
					</div>

					<?php }}?>
			</div>
            
			</div>
		</section>
</div>			

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
		<script>
			Fancybox.bind('[data-fancybox="gallery"]', {
				Thumbs: false,
				Toolbar: false,

				Image: {
					zoom: false,
					click: false,
					wheel: "slide"
				}
			});
		</script>
 