<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      	<?php
	      	$getFpd = $pd->getFeaturedProduct();
	      	if ($getFpd) {
	      		while ($result = $getFpd->fetch_assoc()) { 
	      
	      			
	      	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'],60); ?></p>
					 <p><span class="price">₱<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php } } ?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


			<?php
			$getAllProducts = $pd->getAllProduct();
			if ($getAllProducts) {
				while ($result = $getAllProducts->fetch_assoc()) { 
					?>
					
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $result['productId']; ?>"><img class="img1" src="admin/<?php echo $result['image']; ?>" /></a>
						<h2><?php echo $result['productName']; ?></h2>
						<p><span class="price">₱<?php echo $result['price']; ?></span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
					</div>
					
					<?php 
					}
				} else {
					echo "<p>No products available at the moment.</p>";
				}
				?>

		
			</div>
    </div>
 </div>

 <?php include 'inc/footer.php';?>

 <style>
.grid_1_of_4 {
    display: flex;
    flex-direction: column;
    align-items: center;    
    grid-template-columns: repeat(4, 1fr); /* Four columns layout */
    gap: 20px; /* Consistent gap for better alignment */
    max-width: 1200px; /* Limit the grid width */
    justify-content: center;
    padding: 20px;
}

/* Product card styling */
.images_1_of_4 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 300px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    text-align: center;
    background-color: #ffffff;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 9.5px;
}

.images_1_of_4 img {
    height: 120px; /* Reduced image height */
    width: auto;
    object-fit: contain;
    border-radius: 5px;
}

.images_1_of_4:hover {
    transform: translateY(-5px);
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
}

.images_1_of_4 h2 {
    color: #CC3636;
    font-family: 'Monda', sans-serif;
    font-size: 1em; /* Slightly smaller font size */
    max-height: 2.6em; /* Limit to two lines */
    -webkit-line-clamp: 2; /* Show only 2 lines */
    margin: 0 2px;
    line-height: 1em;
    text-align: center;

}

.images_1_of_4 p {
    font-size: 1em; /* Slightly smaller text */
    color: #333;
    margin: none;
    text-align: center;
    font-family: 'Monda', sans-serif;


}

.images_1_of_4 p span.price {
    font-size: 1em; /* Adjusted price size */
    font-weight: bold;
    color: #CC3636;
}

.images_1_of_4 .button {
    margin-top: none;
	margin-bottom: 10px;
}

.images_1_of_4 .button a {
    padding: 8px 18px; /* Slightly smaller button */
    font-size: 0.85em;
    background-color: #F58220;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.images_1_of_4 .button a:hover {
    background-color: #70389C;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .grid_1_of_4 {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .grid_1_of_4 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .grid_1_of_4 {
        grid-template-columns: 1fr;
    }
}

 </style>
