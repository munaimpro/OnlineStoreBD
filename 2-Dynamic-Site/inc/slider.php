	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
				$getIphone = $pd->latestFromIphone();
				if($getIphone){
					while($Iphone = $getIphone->fetch_assoc()){ ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $Iphone['productId']; ?>"> <img src="admin/<?php echo $Iphone['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $Iphone['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $Iphone['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			<?php } } ?>
			
			<?php
				$getSamsung = $pd->latestFromSamsung();
				if($getSamsung){
					while($Samsung = $getSamsung->fetch_assoc()){ ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $Samsung['productId']; ?>"> <img src="admin/<?php echo $Samsung['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $Samsung['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $Samsung['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			<?php } } ?>
			</div>
			
			<div class="section group">
			<?php
				$getAcer = $pd->latestFromAcer();
				if($getAcer){
					while($Acer = $getAcer->fetch_assoc()){ ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $Acer['productId']; ?>"> <img src="admin/<?php echo $Acer['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $Acer['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $Acer['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			<?php } } ?>
			
			<?php
				$getCanon = $pd->latestFromCanon();
				if($getCanon){
					while($Canon = $getCanon->fetch_assoc()){ ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $Canon['productId']; ?>"> <img src="admin/<?php echo $Canon['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Canon</h2>
						<p><?php echo $Canon['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $Canon['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			<?php } } ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>