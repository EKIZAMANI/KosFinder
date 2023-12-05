<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:../owner-index.php");
}

include("navbar.php");
$db = new mysqli('localhost', 'root', '', 'renthouse');

// mengambil data dari url
$property_id = $_GET["id"];

// Fetch existing data
$query = "SELECT * FROM add_property WHERE property_id = '$property_id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

// apabila di submit
if (isset($_POST["update"])) {
    if (update($_POST, $property_id) > 0) {
        echo "<script>
                alert('data berhasil di update!');
              </script>";

        header("Location: owner-index.php?success=2");
        exit();
    } else {
        echo mysqli_error($db);
    }
}

function update($data, $property_id)
{
    global $db;

    $province = htmlspecialchars($data['province']);
    $city = htmlspecialchars($data['city']);
    $contact_no = htmlspecialchars($data['contact_no']);
    $property_type = htmlspecialchars($data['property_type']);
    $estimated_price = htmlspecialchars($data['estimated_price']);
    $total_rooms = htmlspecialchars($data['total_rooms']);
    $description = htmlspecialchars($data['description']);

    $query = "UPDATE add_property
              SET province = '$province', city = '$city', contact_no = '$contact_no', 
                  property_type = '$property_type', estimated_price = '$estimated_price', 
                  total_rooms = '$total_rooms', description = '$description'
              WHERE property_id = '$property_id'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="padding: 50px">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Your existing HTML for the form fields here -->

                    <div class="form-group">
                        <label for="province">Province/State:</label>
                        <select class="form-control" name="province" required="required">
                            <option value="">--Select Province/State--</option>
                            <!-- Add logic to select the current province -->
                            <?php
                            $selectedProvince = $row['province'];
                            $provinces = array("Aceh", "Sumatera Utara", "Sumatera Selatan", "Sumatera Barat", "DKI Jakarta", "Jawa Barat", "Jawa Tengah", "Yogyakarta", "Bali");
                            foreach ($provinces as $province) {
                                $selected = ($selectedProvince == $province) ? "selected" : "";
                                echo "<option value=\"$province\" $selected>$province</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Add logic to set the current city -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city"
                            value="<?php echo $row['city']; ?>">
                    </div>

                    <!-- Add logic to set the current contact_no -->
                    <div class="form-group">
                        <label for="contact_no">Contact No.:</label>
                        <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No."
                            name="contact_no" value="<?php echo $row['contact_no']; ?>">
                    </div>

                    <!-- Add logic to select the current property_type -->
                    <div class="form-group">
                        <label for="property_type">Property Type:</label>
                        <select class="form-control" name="property_type">
                            <option value="">--Select Property Type--</option>
                            <?php
                            $selectedPropertyType = $row['property_type'];
                            $propertyTypes = array("Kos Pria", "Kos Wanita");
                            foreach ($propertyTypes as $type) {
                                $selected = ($selectedPropertyType == $type) ? "selected" : "";
                                echo "<option value=\"$type\" $selected>$type</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Add logic to set the current estimated_price -->
                    <div class="form-group">
                        <label for="estimated_price">Estimated Price:</label>
                        <input type="estimated_price" class="form-control" id="estimated_price"
                            placeholder="Enter Estimated Price" name="estimated_price"
                            value="<?php echo $row['estimated_price']; ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- Add logic to set the current total_rooms -->
                    <div class="form-group">
                        <label for="total_rooms">Total No. of Rooms:</label>
                        <input type="number" class="form-control" id="total_rooms"
                            placeholder="Enter Total No. of Rooms" name="total_rooms"
                            value="<?php echo $row['total_rooms']; ?>">
                    </div>

                    <!-- Add logic to set the current description -->
                    <div class="form-group">
                        <label for="description">Full Description:</label>
                        <textarea type="comment" class="form-control" id="description"
                            placeholder="Enter Property Description"
                            name="description"><?php echo $row['description']; ?></textarea>
                    </div>

                    <hr>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg col-lg-12" value="Update Property"
                            name="update">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>