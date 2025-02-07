<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Brand.php';?>
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
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #e9f3f8;
    padding: 10px;
    border-radius: 5px;
}

#openAddModalBtn {
    background-color: #ffffff;
    color: #007bff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}

#openAddModalBtn:hover {
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
$brand = new Brand();


if (isset($_GET['delbrand'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
	$delbrand= $brand->delbrandById($id);

}

?>
<?php
// Handle Brand Deletion
if (isset($_GET['delbrand'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
    $delbrand = $brand->delbrandById($id);
}

// Handle AJAX Request for Adding/Updating Brand
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brandName'])) {
    $brandName = $_POST['brandName'];
    $brandId = isset($_POST['brandid']) ? $_POST['brandid'] : null;

    if ($brandId) {
        $response = $brand->brandUpdate($brandName, $brandId);
    } else {
        $response = $brand->brandInsert($brandName);
    }

    echo json_encode([
        "success" => $response ? true : false,
        "message" => $response ? "Brand " . ($brandId ? "updated" : "added") . " successfully!" : "Failed to process request."
    ]);
    exit();
}
?>

        <<div class="grid_10">
    <div class="box round first grid">
        <div class="header-container">
            <h2>Brand List</h2>
            <button id="openAddModalBtn">Add New Brand</button>
        </div>
        <div class="block">
            <?php if (isset($delbrand)) { echo $delbrand; } ?>

                	<?php 

                
                	if (isset($delbrand)) {
                		echo $delbrand;
                	}

					
                	?>

                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				<?php
				$getBrand = $brand->getAllBrand();
				if ($getBrand) {
					$i = 0;
					while ($result = $getBrand->fetch_assoc()) {
						$i++;
				

				?>		
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><button class="editBtn" data-id="<?php echo $result['brandId']; ?>" data-name="<?php echo $result['brandName']; ?>">Edit</button></a> || <a onclick="return confirm('Are you sure to delete!')" href="?delbrand=<?php echo $result['brandId'];?>">Delete</a></td>
						</tr>
					<?php } } ?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <!-- Add/Edit Brand Modal -->
<div id="brandModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle">Add Brand</h2>
        <div id="responseMessage"></div>

        <form id="brandForm" method="POST">
            <input type="hidden" name="brandid" id="brandid">
            <input type="text" name="brandName" id="brandName" placeholder="Enter Brand Name..." required />
            <input type="submit" value="Save" />
        </form>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
    $(document).ready(function() {
    // Open Add Modal
    $("#openAddModalBtn").click(function() {
        $("#modalTitle").text("Add Brand");
        $("#brandid").val(""); // Clear hidden input
        $("#brandName").val(""); // Clear text input
        $("#brandModal").fadeIn();
    });

    // Open Edit Modal
    $(".editBtn").click(function() {
        let brandId = $(this).data("id");
        let brandName = $(this).data("name");

        $("#modalTitle").text("Edit Brand");
        $("#brandid").val(brandId);
        $("#brandName").val(brandName);
        $("#brandModal").fadeIn();
    });

    // Close Modal
    $(".close").click(function() {
        $("#brandModal").fadeOut();
    });

    // Submit Form via AJAX (Add & Update)
    $("#brandForm").submit(function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.post("", formData, function(response) {
            response = JSON.parse(response);
            $("#responseMessage").text(response.message);
            if (response.success) {
                setTimeout(() => location.reload(), 1000);
            }
        });
    });
});
</script>
<?php include 'inc/footer.php';?>

