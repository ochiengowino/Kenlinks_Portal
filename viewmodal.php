<?php 
include "login-system/db_conn.php";
if(isset($_POST['data1'])){


    $ref_id = $_POST['data1'];
    // print($ref_id);

    $qry = "select * from demo_form where id='$ref_id'";
    $result = mysqli_query($conn, $qry);

    while($data = mysqli_fetch_array($result)){
        ?>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <th>Reference Number</th>
                    <td> <?php echo $data['uniqueID']; ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td> <?php echo $data['phone_number']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td> <?php echo $data['email']; ?></td>
                </tr>
                <tr>
                    <th>Request Date</th>
                    <td> <?php echo $data['date']; ?></td>
                </tr>
                <tr>
                    <th>Updated On</th>
                    <td> <?php echo $data['sent_date']; ?></td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td> <?php echo $data['message']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>     

<?php
    }
}
?>


