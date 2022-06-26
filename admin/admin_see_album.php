<?php
include '../layouts/app.php';
include '../layouts/connect.php'
?>

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
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/1508/1508964.png"
								alt=""
							/> <a href="../admin/add_album.php"><span>Add Album</span></a>
						</li>
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/833/833593.png"
								alt=""
							/><a href="../admin/add_picture.php"><span>Add Picture</span></a>
						</li>
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/1286/1286853.png"
								alt=""
							/><a href="../user/album.php"><span>User See Album</span></a>
						</li>
						
						
					</ul>
				</div>
			</div>
            
			<div class="midMid">
				<div class="midMid3">
                <?php 
    		$sql= "SELECT * FROM albums";
			$result=$con->query($sql);

			if($result){
			while($row = mysqli_fetch_array($result)){
			$imageUrl = '../upload_album/'.$row['images'];
			$id = $row['id'];
			$name = $row['name'];
	?>
					<div class="progress1 progress">
					
    <div class="img_card">
        <a href="admin_see_picture.php? img_id='<?php echo $id;?>'"><img src="<?php echo $imageUrl ?>" alt="Cinque Terre" width="80" height="80"></a>
    </div>
    <div>
        <p ><?php echo $name?></p>
    </div>
	<div class="midMid1">
					<div class="flex" style="justify-content:space-between; margin: 2px 5px">
						   <a href="edit_picture.php? edit_picture='<?php echo $id ?>'" class="btn_edit">Edit</a>
						
							<a href="delete_album.php?delete_album='<?php echo $id ?>'" class="btn_delete">Delete</a>
							</div>
				</div>
					</div>
                    <?php }}?>
				</div>
			</div>
			
		</section>
</div>