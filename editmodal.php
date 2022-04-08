<?php 
  $ref_id = $_POST['edit_data'];
// print($ref_id);


include "db_conn.php";
if(isset($_POST['edit_data'])){


    $ref_id = $_POST['edit_data'];
    // print($ref_id);

    $qry = "select * from demo_form where id='$ref_id'";
    $result = mysqli_query($conn, $qry);

    while($data = mysqli_fetch_array($result)){
        ?>
    <form action="updatedata.php" method="POST" >
        <div class="form-group">
            <label> Reference Number </label>
            <input id="reference" name="reference" value="<?php echo $data['uniqueID'] ?>" class="form-control" placeholder="Edit Reference Number">
        </div>

        <div class="form-group">
            <label> Name </label>
            <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>" class="form-control" placeholder="Edit Name">
        </div>

        <div class="form-group">
            <label> Email </label>
            <input type="text" id="email" name="email" value="<?php echo $data['email'] ?>"  class="form-control" placeholder="Edit Email">
        </div>

        <div class="form-group">
            <label> Phone Number </label>
            <input  id="phone" name="phone" value="<?php echo $data['phone_number'] ?>"  class="form-control" placeholder="Edit Phone Number">
        </div>

        <div class="form-group">
            <label> Date </label>
            <input type="date" id="date" name="date" value="<?php echo $data['date'] ?>" class="form-control" placeholder="Edit Date">
        </div>
        <input name="id" value="<?php echo $data['id'] ?>" class="form-control" hidden>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary updatebtn">Update Data</button>
        </div>
    </form>

<?php
    }
}
mysqli_close($conn);
?>
