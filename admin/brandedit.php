<?php
include '../classess/Brand.php';

$brand = new Brand();

// Validate Brand ID
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location='brandlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}

// Fetch brand details
$getBrand = $brand->getBrandById($id);
if ($getBrand) {
    $result = $getBrand->fetch_assoc();
}

// Handle AJAX request for brand update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['brandName'])) {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->brandUpdate($brandName, $id);

    echo json_encode([
        "success" => $updateBrand ? true : false,
        "message" => $updateBrand ? "Brand updated successfully!" : "Failed to update brand."
    ]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brand</title>
    <style>
        /* General Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
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
</head>
<body>

<div class="container">
    <h2>Update Brand</h2>
    <button id="openModalBtn">Edit Brand</button>
</div>

<!-- Modal -->
<div id="brandModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Brand</h2>
        <div id="responseMessage"></div>

        <form id="updateBrandForm" class="form" method="POST">
            <input type="text" name="brandName" id="brandName" value="<?php echo $result['brandName']; ?>" required />
            <input type="hidden" name="brandid" value="<?php echo $id; ?>" />
            <input type="submit" value="Update" />
        </form>
    </div>
</div>

<script>
document.getElementById("openModalBtn").addEventListener("click", function() {
    document.getElementById("brandModal").style.display = "block";
});

document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("brandModal").style.display = "none";
});

// Handle AJAX Form Submission
document.getElementById("updateBrandForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("responseMessage").innerHTML = data.message;
        if (data.success) {
            setTimeout(() => { location.reload(); }, 2000);
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

</body>
</html>
