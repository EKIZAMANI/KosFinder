<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}

include("navbar.php");
include("engine.php");

 ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php
// Check for success parameter
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '
    <div class="container">
        <div class="alert alert-success" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
            <center><strong>Data Berhasil di Hapus!.</strong></center>
        </div>
    </div>';
}

if (isset($_GET['success']) && $_GET['success'] == 2) {
    echo '
    <div class="container">
        <div class="alert alert-success" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
            <center><strong>Data Berhasil di Update.</strong></center>
        </div>
    </div>';
}
?>
    <div class="container-fluid">
        <ul class="nav nav-pills nav-justified">
            <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Profile</a></li>
            <li style="background-color: #FAC0E6"><a data-toggle="pill" href="#menu4">Messages</a></li>
            <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Add Property</a></li>
            <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">View Property</a></li>
            <li style="background-color: #FFFAF0"><a data-toggle="pill" href="#menu3">Update Property</a></li>
            <li style="background-color: #FAFAF0"><a data-toggle="pill" href="#menu6">Booked Property</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <center>
                    <h3>Owner Profile</h3>
                </center>
                <div class="container">
                    <?php 
        include("../config/config.php");
        $u_email= $_SESSION["email"];

        $sql="SELECT * from owner where email='$u_email'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                    <div class="card">
                        <img src="../images/avatar.png" alt="John" style="height:200px; width: 100%">
                        <h1><?php echo $rows['full_name']; ?></h1>
                        <p class="title"><?php echo $rows['email']; ?></p>
                        <p><b>Phone No.: </b><?php echo $rows['phone_no']; ?></p>
                        <p><b>Address: </b><?php echo $rows['address']; ?></p>
                        <p><b>Id Type: </b><?php echo $rows['id_type']; ?></p>
                        <p><img src="../<?php echo $rows['id_photo']; ?>" height="100px"></p>

                        <!-- Trigger the modal with a button -->
                        <p><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Update
                                Profile</button></p>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Profile</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST">
                                            <div class="form-group">
                                                <label for="full_name">Full Name:</label>
                                                <input type="hidden" value="<?php echo $rows['owner_id']; ?>"
                                                    name="owner_id">
                                                <input type="text" class="form-control" id="full_name"
                                                    value="<?php echo $rows['full_name']; ?>" name="full_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="<?php echo $rows['email']; ?>" name="email" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_no">Phone No.:</label>
                                                <input type="text" class="form-control" id="phone_no"
                                                    value="<?php echo $rows['phone_no']; ?>" name="phone_no">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address"
                                                    value="<?php echo $rows['address']; ?>" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_type">Type of ID:</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $rows['id_type']; ?>" name="id_type" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Your Id:</label><br>
                                                <img src="../<?php echo $rows['id_photo']; ?>" id="output_image" /
                                                    height="100px" readonly>
                                            </div>
                                            <hr>
                                            <center><button id="submit" name="owner_update"
                                                    class="btn btn-primary btn-block">Update</button></center><br>

                                        </form>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div id="menu4" class="tab-pane fade">
                <div class="container">
                    <center>
                        <h3>See Messages</h3>
                    </center>
                    <?php 
      $owner_id=$rows['owner_id']; 
      $sql1="SELECT * FROM chat where owner_id='$owner_id' ";

    $query1 = mysqli_query($db, $sql1);

  if(mysqli_num_rows($query1)>0)
  {
    while($row= mysqli_fetch_assoc($query1)){

      $tenant_id=$row['tenant_id'];
      $sql2="SELECT * FROM tenant where tenant_id='$tenant_id' ";

    $query2 = mysqli_query($db,$sql2);

  if(mysqli_num_rows($query2)>0)
  {
    while ($rows= mysqli_fetch_assoc($query2)){
    
?>


                    <link rel="stylesheet" type="text/css" href="message-style.css">

                    <div class="tab">
                        <button class="tablinks" id="defaultOpen"
                            onmouseover="openCity(event, '<?php echo $rows["full_name"]; ?>')"><?php echo $rows["full_name"]; ?></button>
                    </div>

                    <div id="<?php echo $rows["full_name"]; ?>" class="tabcontent">
                        <?php
   $sql3="SELECT * FROM chat where tenant_id='$tenant_id' AND owner_id='$owner_id' ";

    $query3 = mysqli_query($db,$sql3);

  if(mysqli_num_rows($query3)>0)
  {
    while($ro= mysqli_fetch_assoc($query3)){
      echo $ro["message"]."<br>";
    }}
  ?>
                    </div>

                    <div class="clearfix"></div>


                    <?php
        // echo '<a href="send-message.php?owner_id='.$owner_id.'&tenant_id='.$tenant_id.'">'.$rows["full_name"].'</a>';
    }
  }}}}}?>
                </div>
            </div>







            <div id="menu1" class="tab-pane fade">
                <center>
                    <h3>Add Property</h3>
                </center>
                <div class="container">


                    <div id="map_canvas"></div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="province">Province/State:</label>
                                    <select class="form-control" name="province" required="required">
                                        <option value="">--Select Province/State--</option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                        <option value="Bali">Bali</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City"
                                        name="city">
                                </div>

                                <div class="form-group">
                                    <label for="contact_no">Contact No.:</label>
                                    <input type="text" class="form-control" id="contact_no"
                                        placeholder="Enter Contact No." name="contact_no">
                                </div>
                                <div class="form-group">
                                    <label for="property_type">Property Type:</label>
                                    <select class="form-control" name="property_type">
                                        <option value="">--Select Property Type--</option>

                                        <option value="Kos Pria">Kos Pria</option>
                                        <option value="Kos Wanita">Kos Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estimated_price">Estimated Price:</label>
                                    <input type="estimated_price" class="form-control" id="estimated_price"
                                        placeholder="Enter Estimated Price" name="estimated_price">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="total_rooms">Total No. of Rooms:</label>
                                    <input type="number" class="form-control" id="total_rooms"
                                        placeholder="Enter Total No. of Rooms" name="total_rooms">
                                </div>

                                <div class="form-group">
                                    <label for="description">Full Description:</label>
                                    <textarea type="comment" class="form-control" id="description"
                                        placeholder="Enter Property Description" name="description"></textarea>
                                </div>
                                <table class="table table-bordered" border="0">
                                    <tr>
                                        <div class="form-group">
                                            <label><b>Latitude/Longitude:</b><span
                                                    style="color:red; font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    *Click on Button</span></label>
                                            <td><input type="text" name="latitude" placeholder="Latitude" id="latitude"
                                                    class="form-control name_list" readonly required /></td>
                                            <td><input type="text" name="longitude" placeholder="Longitude"
                                                    id="longitude" class="form-control name_list" readonly required />
                                            </td>
                                            <td><input type="button" value="Get Latitude and Longitude"
                                                    onclick="getLocation()" class="btn btn-success col-lg-12"></td>
                                        </div>
                                    </tr>
                                </table>
                                <table class="table" id="dynamic_field">
                                    <tr>
                                        <div class="form-group">
                                            <label><b>Photos:</b></label>
                                            <td><input type="file" name="p_photo[]" placeholder="Photos"
                                                    class="form-control name_list" required accept="image/*" /></td>
                                            <td><button type="button" id="add" name="add"
                                                    class="btn btn-success col-lg-12">Add More</button></td>
                                        </div>
                                    </tr>
                                </table>
                                <input name="lat" type="text" id="lat" hidden>
                                <input name="lng" type="text" id="lng" hidden>
                                <hr>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg col-lg-12" value="Add Property"
                                        name="add_property">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>

                </div>
            </div>


            <div id="menu2" class="tab-pane fade">
                <center>
                    <h3>View Property</h3>
                </center>
                <div class="container-fluid">
                    <input type="text" id="myInput" onkeyup="viewProperty()" placeholder="Search..."
                        title="Type in a name">
                    <div style="overflow-x:auto;">
                        <table id="myTable">
                            <tr class="header">
                                <th>Id.</th>
                                <th>Province/State</th>

                                <th>City</th>

                                <th>Contact No.</th>
                                <th>Property Type</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Estmated Price</th>
                                <th>Total Rooms</th>
                                <th>Description</th>
                                <th>Photos</th>
                            </tr>
                            <?php 
                $u_email=$_SESSION['email'];
        $sql1="SELECT * from owner where email='$u_email'";
        $result1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($result1)>0)
      {
          while($rowss=mysqli_fetch_assoc($result1)){
            $owner_id=$rowss['owner_id'];

        $sql="SELECT * from add_property where owner_id='$owner_id'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                            <tr>
                                <td><?php echo $rows['property_id'] ?></td>
                                <td><?php echo $rows['province'] ?></td>

                                <td><?php echo $rows['city'] ?></td>

                                <td><?php echo $rows['contact_no'] ?></td>
                                <td><?php echo $rows['property_type'] ?></td>
                                <td><?php echo $rows['latitude'] ?></td>
                                <td><?php echo $rows['longitude'] ?></td>
                                <td>Rp.<?php echo $rows['estimated_price'] ?></td>
                                <td><?php echo $rows['total_rooms'] ?></td>

                                <td><?php echo $rows['description'] ?></td>
                                <td>
                                    <?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                                    <img src="<?php echo $row['p_photo'] ?>" width="50px">
                                    <?php }}}}}} ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div id="menu3" class="tab-pane fade">
                <center>
                    <h3>Update Property</h3>
                </center>
                <div class="container-fluid">
                    <input type="text" id="myInput" onkeyup="updateProperty()" placeholder="Search..."
                        title="Type in a name">
                    <div style="overflow-x:auto;">
                        <table id="myTable">
                            <tr class="header">
                                <th>Id.</th>
                                <th>Province/State</th>

                                <th>City</th>

                                <th>Contact No.</th>
                                <th>Property Type</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Estmated Price</th>
                                <th>Total Rooms</th>

                                <th>Description</th>
                                <th>Photos</th>
                                <th>Edit/Delete</th>
                            </tr>
                            <?php 

        $sql="SELECT * from add_property where owner_id='$owner_id'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                            <tr>
                                <td><?php echo $rows['property_id'] ?></td>
                                <td><?php echo $rows['province'] ?></td>

                                <td><?php echo $rows['city'] ?></td>

                                <td><?php echo $rows['contact_no'] ?></td>
                                <td><?php echo $rows['property_type'] ?></td>
                                <td><?php echo $rows['latitude'] ?></td>
                                <td><?php echo $rows['longitude'] ?></td>
                                <td>Rp.<?php echo $rows['estimated_price'] ?></td>
                                <td><?php echo $rows['total_rooms'] ?></td>

                                <td><?php echo $rows['description'] ?></td>
                                <td>
                                    <?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                                    <img src="<?php echo $row['p_photo'] ?>" width="50px">
                                    <?php }}  ?>
                                </td>
                                <form method="POST" action="delete.php">
                                    <td>

                                        <input type="hidden" name="property_id"
                                            value="<?php echo $rows['property_id']; ?>">
                                        <!-- <a href="update.php?id="data-toggle="pill" class="btn btn-success" name="edit_property"
                                            href="#menu5">Edit</a> -->
                                        <div
                                            style="background-color: #36A5B2; width: 70% ; border-radius: 3px; padding-bottom: 5px">
                                            <a style="color: white; font-size: 13px; padding: 8px"
                                                href="update.php?id=<?php echo $rows['property_id']; ?>">Update</a>
                                        </div>
                                        <input type="submit" class="btn btn-danger" name="delete_property"
                                            value="Delete">

                                    </td>

                            </tr>
                            </form>
                            <?php }} ?>
                        </table>
                    </div>
                </div>
            </div>




            <div id="menu5" class="tab-pane fade">
                <center>
                    <h3>Edit Property Details</h3>
                </center>
                <div class="container">


                    <div id="map_canvas"></div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="province">Province/State:</label>
                                    <select class="form-control" name="province" required="required">
                                        <option value="">--Select Province/State--</option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                        <option value="Bali">Bali</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City"
                                        name="city">
                                </div>

                                <div class="form-group">
                                    <label for="contact_no">Contact No.:</label>
                                    <input type="text" class="form-control" id="contact_no"
                                        placeholder="Enter Contact No." name="contact_no">
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="property_type">Property Type:</label>
                                    <select class="form-control" name="property_type">
                                        <option value="">--Select Property Type--</option>

                                        <option value="Kos Pria">Kos Pria</option>
                                        <option value="Kos Wanita">Kos Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estimated_price">Estimated Price:</label>
                                    <input type="estimated_price" class="form-control" id="estimated_price"
                                        placeholder="Enter Estimated Price" name="estimated_price">
                                </div>
                                <div class="form-group">
                                    <label for="total_rooms">Total No. of Rooms:</label>
                                    <input type="number" class="form-control" id="total_rooms"
                                        placeholder="Enter Total No. of Rooms" name="total_rooms">
                                </div>

                                <div class="form-group">
                                    <label for="description">Full Description:</label>
                                    <textarea type="comment" class="form-control" id="description"
                                        placeholder="Enter Property Description" name="description"></textarea>
                                </div>
                                <hr>

                                <table class="table table-bordered" border="0">
                                    <tr>
                                        <div class="form-group">
                                            <label><b>Latitude/Longitude:</b><span
                                                    style="color:red; font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    *Click on Button</span></label>
                                            <td><input type="text" name="latitude" placeholder="Latitude" id="latitude"
                                                    class="form-control name_list" readonly required /></td>
                                            <td><input type="text" name="longitude" placeholder="Longitude"
                                                    id="longitude" class="form-control name_list" readonly required />
                                            </td>
                                            <td><input type="button" value="Get Latitude and Longitude"
                                                    onclick="getLocation()" class="btn btn-success col-lg-12"></td>
                                        </div>
                                    </tr>
                                </table>
                                <table class="table" id="dynamic_field">
                                    <tr>
                                        <div class="form-group">
                                            <label><b>Photos:</b></label>
                                            <td><input type="file" name="p_photo[]" placeholder="Photos"
                                                    class="form-control name_list" required accept="image/*" /></td>
                                            <td><button type="button" id="add" name="add"
                                                    class="btn btn-success col-lg-12">Add More</button></td>
                                        </div>
                                    </tr>
                                </table>
                                <input name="lat" type="text" id="lat" hidden>
                                <input name="lng" type="text" id="lng" hidden>
                                <hr>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg col-lg-12"
                                        value="Update Property" name="add_property">
                                </div>
                            </div>
                        </div>
                    </form>
                    <br><br>

                </div>
            </div>

            <div id="menu6" class="tab-pane fade">
                <center>
                    <h3>Booked Property</h3>
                </center>
                <div class="container">
                    <input type="text" id="myInput" onkeyup="bookedProperty()" placeholder="Search..."
                        title="Type in a name">

                    <table id="myTable">
                        <tr class="header">
                            <th>Booked By</th>
                            <th>Booker Address</th>
                            <th>Property Province</th>
                        </tr>

                        <?php 
        include("../config/config.php");
            $u_email= $_SESSION["email"];

        $sql3="SELECT * from owner where email='$u_email'";
            $result3=mysqli_query($db,$sql3);

            if(mysqli_num_rows($result3)>0)
          {
              while($rowss=mysqli_fetch_assoc($result3)){
                $owner_id=$rowss['owner_id'];

                $sql2="SELECT * from add_property where owner_id='$owner_id'";
        $result2=mysqli_query($db,$sql2);

        if(mysqli_num_rows($result2)>0)
      {
          while($ro=mysqli_fetch_assoc($result2)){
            $property_id=$ro['property_id'];

        $sql="SELECT * from booking where property_id='$property_id'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                        <tr>

                            <?php 
        $tenant_id=$rows['tenant_id'];
        $property_id=$rows['property_id'];
        $sql1="SELECT * from tenant where tenant_id='$tenant_id'";
        $result1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($result1)>0)
      {
          while($row=mysqli_fetch_assoc($result1)){
          
       ?>


                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['address']; ?></td>



                            <td><?php echo $ro['province']; ?></td>

                        </tr>
                        <?php }}}}}}}} ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>




<script>
function viewProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>
<script>
function updateProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>
<script>
function bookedProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>
<script>
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i +
            '"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });





    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "name.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
</script>



<script>
if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
    var marker = new google.maps.Marker;
    document.getElementById('lat').value = results[0].geometry.location.lat();
    document.getElementById('lng').value = results[0].geometry.location.lng();


    // add this
    var latt = results[0].geometry.location.lat();
    var lngg = results[0].geometry.location.lng();
    $.ajax({
        url: "your-php-code-url-to-save-in-database",
        dataType: 'json',
        type: 'POST',
        data: {
            lat: lat,
            lng: lngg
        }
        success: function(data) {
            //check here whether inserted or not 
        }
    });


}
</script>


<script>
//For Latitude and Longitude
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("latitude").value = "Geolocation is not supported by this browser.";
        document.getElementById("longitude").value = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
}
</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>