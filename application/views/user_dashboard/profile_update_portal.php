<?php

$staff = isset($staff_login_info) ? $staff_login_info : null;

// echo '<pre>';
// print_r($staff);
// // print_r($password);
// echo '</pre>';
// exit;
?>



<div class="modal fade" id="VerificationReport" tabindex="-1" aria-labelledby="VerificationReportLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="VerificationReportLabel">
                    Update Profile
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('update_profile'); ?>" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="staff_image" class="form-label">
                            Update Image
                        </label>
                        <input type="file" name="staff_image" id="staff_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Update Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input value="<?= htmlspecialchars($staff->password); ?>" type="password" name="password"
                                id="password" class="form-control" placeholder="Password">
                            <span class="input-group-text" style="cursor: pointer;"
                                onclick="togglePassword('password', 'toggleIcon')">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>