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
if (isset($_GET['delcat'])) {
    $catId = $_GET['delcat'];
    $deleteCat = $cat->delCatById($catId);
    echo json_encode(["message" => $deleteCat]);
    exit;
}
?>
<?php
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['catId']) && isset($_POST['catName'])) {
        // Updating category
        $catId = $_POST['catId'];
        $catName = $_POST['catName'];
        $updateCat = $cat->catUpdate($catName, $catId);
        echo json_encode(["message" => $updateCat]);
    } else {
        // Adding new category
        $catName = $_POST['catName'];
        $insertCat = $cat->catInsert($catName);
        echo json_encode(["message" => $insertCat]);
    }
    exit;
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <div class="header-bar">
            <h2>Category List</h2>
            <button id="openModalBtn">Add New Category</button>
        </div>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $getCat = $cat->getAllCat();
                if ($getCat) {
                    $i = 0;
                    while ($result = $getCat->fetch_assoc()) {
                        $i++;
                ?>      
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['catName'];?></td>
                        <td>
                            <button class="editBtn" data-id="<?php echo $result['catId']; ?>" data-name="<?php echo $result['catName']; ?>">Edit</button>
                            || <a onclick="return confirm('Are you sure to delete!')" href="?delcat=<?php echo $result['catId'];?>">Delete</a>
                        </td>
                    </tr>
                <?php } } ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New Category</h2>
        <form id="categoryForm">
            <input type="text" name="catName" id="catName" placeholder="Enter Category Name..." required />
            <button type="submit" id="saveCategoryBtn">Save</button>
        </form>
        <p id="responseMessage"></p>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Category</h2>
        <form id="editCategoryForm">
            <input type="hidden" name="catId" id="editCatId">
            <input type="text" name="catName" id="editCatName" required />
            <button type="submit" id="saveEditCategoryBtn">Save</button>
        </form>
        <p id="editResponseMessage"></p>
    </div>
</div>

<script>
    document.getElementById("saveCategoryBtn").addEventListener("click", function(e) {
    e.preventDefault(); // Prevent default link behavior
    document.getElementById("categoryForm").submit(); // Submit the form
    });
    document.getElementById("saveEditCategoryBtn").addEventListener("click", function(e) {
    e.preventDefault(); // Prevent default link behavior
    document.getElementById("editCategoryForm").submit(); // Submit the form
    });
$(document).ready(function() {
    // Open Add Modal
    $("#openModalBtn").click(function() {
        $("#myModal").show();
    });

    // Close modal
    $(".close").click(function() {
        $(".modal").hide();
    });

    // Close modal when clicking outside
    $(window).click(function(event) {
        if ($(event.target).is(".modal")) {
            $(".modal").hide();
        }
    });

    // Handle "Add Category" form submission
    $("#saveCategoryBtn").click(function(e) {
        e.preventDefault();
        var catName = $("#catName").val();

        $.ajax({
            type: "POST",
            url: "",
            data: { catName: catName },
            dataType: "json",
            success: function(response) {
                $("#responseMessage").text(response.message);
                $(".modal").hide(); // Close modal after success
                location.reload(true);  // ✅ Reloads page immediately after saving
            }
        });
    });

    // Open Edit Modal
    $(".editBtn").click(function() {
        var catId = $(this).data("id");
        var catName = $(this).data("name");

        $("#editCatId").val(catId);
        $("#editCatName").val(catName);
        $("#editModal").show();
    });

    // Handle "Edit Category" form submission
    $("#saveEditCategoryBtn").click(function(e) {
        e.preventDefault();
        var catId = $("#editCatId").val();
        var catName = $("#editCatName").val();

        $.ajax({
            type: "POST",
            url: "",
            data: { catId: catId, catName: catName },
            dataType: "json",
            success: function(response) {
                $("#editResponseMessage").text(response.message);
                $(".modal").hide(); // Close modal after success
                location.reload(true);  // ✅ Reloads page immediately after saving
            }
        });
    });

    // Handle delete category
    $(".deleteBtn").click(function(e) {
        e.preventDefault();
        var catId = $(this).data("id");

        if (confirm("Are you sure you want to delete this category?")) {
            $.ajax({
                type: "GET",
                url: "",
                data: { delcat: catId },
                success: function(response) {
                    alert("Category deleted successfully!");
                    location.reload(true);  // ✅ Reloads page immediately after deleting
                }
            });
        }
    });
});

</script>

<?php include 'inc/footer.php';?>