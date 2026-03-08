<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select = "SELECT * FROM tbl_worker WHERE worker_id='" . $_SESSION['wid'] . "'";
$res = $Con->query($select);
$data = $res->fetch_assoc();

if (isset($_POST['btn_update'])) 
{
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_add'];

    $upqry = "update tbl_worker set worker_name='" . $name . "',worker_email='" . $email . "',worker_contact='" . $contact . "',worker_address='" . $address . "' where worker_id='" . $_SESSION['wid'] . "'";
    if ($Con->query($upqry)) {
        echo "<script>alert('Profile Updated Successfully'); window.location='MyProfile.php';</script>";
    }
}
?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-0">Edit Profile</h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="txt_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($data['worker_name']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($data['worker_email']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo htmlspecialchars($data['worker_contact']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_add" class="form-label">Address</label>
                                <textarea class="form-control" name="txt_add" id="txt_add" rows="3" required><?php echo htmlspecialchars($data['worker_address']); ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="btn_update" class="btn btn-primary px-5">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('Foot.php');
?>
