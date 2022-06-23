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
							/><span>Add Album</span>
						</li>
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/833/833593.png"
								alt=""
							/><span>Add Picture</span>
						</li>
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/2099/2099058.png"
								alt=""
							/><span>Album</span>
						</li>
						<li>
							<img
								src="https://cdn-icons-png.flaticon.com/128/1286/1286853.png"
								alt=""
							/><span>LOG OUT</span>
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
        <a href="../user/picture.php? img_id='<?php echo $id;?>'"><img src="<?php echo $imageUrl ?>" alt="Cinque Terre" width="80" height="80"></a>
    </div>
    <div>
        <p ><?php echo $name?></p>
    </div>
					</div>
         <?php }}?>
				</div>
			</div>
			
		</section>
</div>