<?php
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_POST['btn_submit'])) {
    $reply = $_POST['txt_replay'];

    $upQry = "UPDATE tbl_complaint 
              SET complaint_reply = '" . $reply . "', complaint_status = 1 
              WHERE complaint_id = '" . $_GET['cid'] . "'";

    if ($Con->query($upQry)) {
        echo "<script>
                alert('Reply Sent Successfully');
                window.location = 'ViewComplaint.php';
              </script>";
    }
    else {
        echo "<script>alert('Failed to send reply.');</script>";
    }
}

$selComp = "SELECT * FROM tbl_complaint WHERE complaint_id = '" . $_GET['cid'] . "'";
$resComp = $Con->query($selComp);
$dataComp = $resComp->fetch_assoc();
?>

   <!-- Content from Header.php -->
   <div class="row">
       <div class="col-lg-6 mx-auto">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Reply to Complaint</h6>
                  </div>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Your Reply</label>
                            <textarea name="txt_replay" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btn_submit" class="btn bg-gradient-info w-100 my-4 mb-2">Send Reply</button>
                        </div>
                    </form>
                </div>
            </div>
       </div>
   </div>

<?php
include("Footer.php");
?>
