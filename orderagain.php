					<?php
                    if (!empty ($_SESSION['id'])) {
	$prevOrder= mysqli_query($conn,"SELECT * FROM orders WHERE  userID = '".$user_id."'  ORDER BY id DESC LIMIT 1");
	if (!empty($prevOrder)) { 
		while ($row=mysqli_fetch_array($prevOrder)) {	
            $orderProd = $row['prodID'];
	$categoryOrder = 'Order Again'; 
			?>
						
					<section id="<?php echo$categoryOrder; ?>">
	                        <h4 style=" text-transform: capitalize"><?php echo$categoryOrder; ?></h4>
							<div class="table_wrapper">
	                            <table class="table cart-list menu-gallery">
	                                <thead>
									<tr>
											<th></th>
	                                        <th>
	                                            Item
	                                        </th>
	                                        <th>
	                                            Price
	                                        </th>
	                                        <th>
	                                        </th>
	                                    </tr>
	                                </thead>
	                                <tbody>
									<?php
	$product= mysqli_query($conn,"SELECT * FROM products WHERE restID = '".$restID."' && id = '".$orderProd."' ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {	
	
			?><tr>
			<td class="d-md-flex align-items-center">
			<form method="post" action="resturant.php?restId=<?php echo $restID ; ?>action=add&pid=<?php echo $row["id"]; ?>&prodName=<?php echo $row["name"]; ?>&prodExtra1=<?php if(strcasecmp($row["extra1"],$extrasel) == 0){echo $row["extra1"];} else{echo "";}?>&prodExtra2=<?php if(strcasecmp($row["extra2"],$extrasel) == 0){echo $row["extra2"];} else{echo "";}?>&prodPrice=<?php echo $row["price"]; ?>&extrasel=<?php echo $extrasel; ?>&refresh=1">
				<figure>
				<a href="<?php echo $row["image"]; ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["image"]; ?>" class="lazy"></a>
				</figure>
				</td>
				<td>
				<div class="flex-md-column">
					<input hidden type="text" value="<?php echo $row['id']?>" name="pid" id="pid">	
					<h4><?php echo $row["name"]; ?></h4>
					<input hidden type="text" value="<?php echo $row['name']?>" name="name" id="name">
					<input hidden type="text" value="<?php echo $row['extra1']?>" name="extra1" id="extra1">
					<input hidden type="text" value="<?php echo $row['extra2']?>" name="extra2" id="extra2">
					<p>
					<?php echo $row["description"]; ?>
					</p>
					
					<?php
		if ($row["extra"] == 'yes'){
		$extra = $row["extra1"];
		$extra2 = $row["extra2"];
		echo '<div class="row opt_order">
		<div class="col-6">
		<label class="container_radio">' .$extra.'
		<input type="radio" value="' . $extra . '" name="extra" id="extra" checked>
		<span class="checkmark"></span>
		</label>
		</div>
		<div class="col-6">
		<label class="container_radio">' .$extra2.'
		<input type="radio" value="' . $row['extra2'] . '" name="extra" id="extra">
		<span class="checkmark"></span>
		</label>
		</div>
		</div>';
		}
		
		?>
		
				</div>
			</td>
			<td>
				<strong><?php echo 'N$ '. $row["price"]; ?></strong>
				<input hidden type="text" value="<?php echo $row['price']?>" name="price" id="price">
			<td class="options">
			<input type="hidden"  name="quantity" value="1" size="1"  /><input type="submit" value="Add" id="add" name="add" class="btn_1 ">
			
			</td>
			</form>
		</tr>
		
		<?php
			}
	}  else {
		
 echo "No Records.";

	}
	?>
	                                </tbody>
	                            </table>
	                        </div>
	                    </section>
						<?php
		}
    }
	}  ?>

    
	                    <!-- /section -->
