<?php
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');

$select = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION['uid'] . "'";
$res = $Con->query($select);
$data = $res->fetch_assoc();

if (isset($_POST['btn_update'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_add'];

    $upqry = "UPDATE tbl_user SET user_name='" . $name . "', user_email='" . $email . "', user_contact='" . $contact . "', user_address='" . $address . "' WHERE user_id='" . $_SESSION['uid'] . "'";

    if ($Con->query($upqry)) {
        echo "<script>alert('Profile updated successfully!'); window.location='MyProfile.php';</script>";
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
                                <label for="txt_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($data['user_name']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($data['user_email']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_contact" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo htmlspecialchars($data['user_contact']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="txt_add" class="form-label">Address</label>
                                <textarea class="form-control" name="txt_add" id="txt_add" rows="3" required><?php echo htmlspecialchars($data['user_address']); ?></textarea>
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