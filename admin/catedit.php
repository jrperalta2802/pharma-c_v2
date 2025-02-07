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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['catId'])) {
    $id = $_POST['catId'];
    $catName = $_POST['catName'];
    $updateCat = $cat->catUpdate($catName, $id);
    echo json_encode(["message" => $updateCat]);
    exit;
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="categoryTable">
                    <?php
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                        $i = 0;
                        while ($result = $getCat->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catName']; ?></td>
                        <td>
                            <button class="editBtn" data-id="<?php echo $result['catId']; ?>" data-name="<?php echo $result['catName']; ?>">Edit</button>
                            ||
                            <a onclick="return confirm('Are you sure to delete?')" href="?delcat=<?php echo $result['catId']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Category</h2>
        <div class="block copyblock">
            <form id="editCategoryForm">
                <input type="hidden" name="catId" id="editCatId">
                <input type="text" name="catName" id="editCatName" required />
                <input type="submit" value="Update" />
            </form>
            <p id="updateResponse"></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Get modal and button
var editModal = document.getElementById("editModal");
var closeModal = document.getElementsByClassName("close")[0];

// Close the modal
closeModal.onclick = function() {
    editModal.style.display = "none";
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target == editModal) {
        editModal.style.display = "none";
    }
}

// Open the modal when clicking edit
$(document).ready(function() {
    $(".editBtn").click(function() {
        var catId = $(this).data("id");
        var catName = $(this).data("name");

        $("#editCatId").val(catId);
        $("#editCatName").val(catName);
        
        editModal.style.display = "block";
    });

    // Handle form submission with AJAX
    $("#editCategoryForm").submit(function(e) {
        e.preventDefault();
        var catId = $("#editCatId").val();
        var catName = $("#editCatName").val();

        $.ajax({
            type: "POST",
            url: "", // Submitting to the same page
            data: { catId: catId, catName: catName },
            dataType: "json",
            success: function(response) {
                $("#updateResponse").text(response.message);
                
                // Delay reloading the page slightly for a smoother experience
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        });
    });
});
</script>

<?php include 'inc/footer.php';?>
