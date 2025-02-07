<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
/* Styles for the modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Styling for form elements */
.form input[type="text"], .form input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form input[type="submit"] {
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

.form input[type="submit"]:hover {
    background-color: #4cae4c;
}

/* Aligning header and button */
.header-bar {
    display: flex;
    justify-content: right;
    align-items: right;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    position: relative;
}

.header-bar h2 {
    position: absolute;
    left: 15px;
    margin: 0;
    font-size: 18px;
}

#openModalBtn {
    background-color: #ffffff;
    color: #007bff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}

#openModalBtn:hover {
    background-color: #0056b3;
    color: #fff;
}
/* Table Container */
.table-container {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
    overflow-x: auto; /* Enables horizontal scrolling */
}

/* Table Styles */
.data {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    font-size: 14px;
}

/* Table Header */
.data thead th {
    background-color: #007bff;
    color: white;
    text-align: left;
    padding: 12px;
    font-weight: bold;
}

/* Table Row */
.data tbody tr {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.data tbody tr:hover {
    background-color: #f1f1f1;
}

/* Table Cells */
.data td {
    padding: 12px;
    text-align: left;
    color: #555;
}

/* Image Cell */
.data td img {
    border-radius: 5px;
    max-width: 100%;
}

/* Action Links */
.data td a {
    color: #007bff;
    text-decoration: none;
}

.data td a:hover {
    text-decoration: underline;
}

/* Pagination (for DataTables) */
.paginate_button {
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    margin: 0 5px;
}

.paginate_button:hover {
    background-color: #0056b3;
}

/* Hide the pagination numbers on mobile */
@media (max-width: 768px) {
    .data thead th {
        font-size: 12px;
        padding: 8px;
    }

    .data td {
        font-size: 12px;
        padding: 8px;
    }

    .data td img {
        width: 30px;
        height: 30px;
    }

    .data td:last-child {
        white-space: nowrap;
    }

    .data td a {
        font-size: 12px;
    }
}
.editBtn {
    background: none;
    border: none;
    color: #007bff; /* Same as the Delete link */
    cursor: pointer;
    font-size: 14px;
    font-family: inherit;
    font-weight: bold; /* Make it bold */

}

.editBtn:hover {
    color: #0056b3; /* Darker blue on hover */
    text-decoration: underline;
}

</style>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classess/Cart.php');
$ct = new Cart();
$fm = new Format();
?>
<?php 
if (isset($_GET['shiftid'])) {
	$id = $_GET['shiftid'];
	$shift = $ct->productShifted($id);

}

if (isset($_GET['delproid'])) {
	$id = $_GET['delproid'];
	$delOrder = $ct->delProductShifted($id);

}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
                if (isset($shift)) {
                	echo $shift;
                }

                if (isset($delOrder)) {
                	echo $delOrder;
                }


                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust. ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$getOrder = $ct->getAllOrderProduct();
						if ($getOrder) {
							while ($result = $getOrder->fetch_assoc()) {
						
						  ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td>₱ <?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>

							<?php 

							if ($result['status'] == '0') { ?>
							<td><a href="?shiftid=<?php echo $result['id']; ?>">Shifted</a></td>	
							<?php }elseif($result['status'] == '1'){?>
								<td>Pending</td>
							<?php } else{ ?>
								<td><a href="?delproid=<?php echo $result['id']; ?>">Remove</a></td>
						<?php } ?>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
