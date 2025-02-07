<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classess/Brand.php';

$brand = new Brand();

// Handle form submission (AJAX request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brandName'])) {
    $brandName = $_POST['brandName'];
    $insertBrand = $brand->brandInsert($brandName);
    
    // Send JSON response for AJAX
    echo json_encode([
        "success" => $insertBrand ? true : false,
        "message" => $insertBrand ? "Brand added successfully!" : "Failed to add brand."
    ]);
    exit();
}
?>

<style>
/* General Styles */
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; }
.grid_10 { width: 100%; max-width: 1000px; margin: 0 auto; }
.box { background: #fff; padding: 20px; margin-top: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
h2 { text-align: center; margin-bottom: 20px; }

/* Button */
#openModalBtn { display: block; margin: 10px auto; padding: 10px 20px; background: #007bff; color: #fff; border: none; cursor: pointer; border-radius: 4px; }
#openModalBtn:hover { background: #0056b3; }

/* Modal Styling */
.modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); }
.modal-content { background: #fff; margin: 10% auto; padding: 20px; width: 50%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: relative; }
.close { position: absolute; right: 10px; top: 10px; font-size: 24px; cursor: pointer; color: #f44336; }
.close:hover { color: #d32f2f; }

/* Form */
.form input[type="text"], .form input[type="submit"] { width: 100%; padding: 12px; font-size: 16px; border-radius: 4px; margin-bottom: 10px; }
.form input[type="text"] { border: 1px solid #ddd; }
.form input[type="submit"] { background: #28a745; color: white; border: none; cursor: pointer; }
.form input[type="submit"]:hover { background: #218838; }

/* Success/Error Message */
#responseMessage { text-align: center; margin-top: 10px; font-size: 16px; font-weight: bold; }
</style>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Brand List</h2>
        <button id="openModalBtn">Add New Brand</button>
    </div>
</div>

<!-- Add New Brand Modal -->
<div id="brandModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New Brand</h2>
        <form id="brandForm">
            <input type="text" name="brandName" id="brandName" placeholder="Enter Brand Name..." required />
            <input type="submit" value="Save" />
        </form>
        <p id="responseMessage"></p>
    </div>
</div>

<!-- jQuery & AJAX Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Open Modal
    $("#openModalBtn").click(function() {
        $("#brandModal").fadeIn();
    });

    // Close Modal
    $(".close").click(function() {
        $("#brandModal").fadeOut();
    });

    // Submit Form via AJAX
    $("#brandForm").submit(function(e) {
        e.preventDefault();
        var brandName = $("#brandName").val();

        $.post("", { brandName: brandName }, function(response) {
            response = JSON.parse(response);
            $("#responseMessage").text(response.message);
            if (response.success) {
                $("#brandName").val(""); // Clear input
                setTimeout(() => location.reload(), 1000); // Reload after 1s
            }
        });
    });
});
</script>

<?php include 'inc/footer.php'; ?>
