<?php 
//   $ref_id = $_POST['del_data'];
// print($ref_id);


include "login-system/db_conn.php";
if(isset($_POST['del_data'])){


    $ref_id = $_POST['del_data'];
    // print($ref_id);

    $qry = "select * from demo_form where id='$ref_id'";
    $result = mysqli_query($conn, $qry);

    while($data = mysqli_fetch_array($result)){
        ?>
        Are you really sure you want to delete this record?
    <form action="deletedata.php" method="POST" >
        <div class="form-group">
            <!-- <label> Reference Number </label> -->
            <input name="id" value="<?php echo $data['id'] ?>" class="form-control" hidden>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-danger">Yes... Delete!</button>
        </div>
    </form>

<?php
    }
}
mysqli_close($conn);
?>
