<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Category.php';?>

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

/* Form styles */
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
</style>

<?php
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $insertCat = $cat->catInsert($catName);
    echo json_encode(["message" => $insertCat]);
    exit;
}
?>

<!-- Trigger Button -->
<button id="openModalBtn">Add New Category</button>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <form id="categoryForm">
                <input type="text" name="catName" id="catName" placeholder="Enter Category Name..." required />
                <input type="submit" value="Save" />
            </form>
            <p id="responseMessage"></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Get modal and button
var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];

// Open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Handle form submission with AJAX
$(document).ready(function() {
    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        var catName = $("#catName").val();
        
        $.ajax({
            type: "POST",
            url: "", // Submitting to the same page
            data: { catName: catName },
            dataType: "json",
            success: function(response) {
                $("#responseMessage").text(response.message);
                modal.style.display = "none";
                location.reload(); // Refresh the page to update the category list
            }
        });
    });
});
</script>

<?php include 'inc/footer.php';?>
