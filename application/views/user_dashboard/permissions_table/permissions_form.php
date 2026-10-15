<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Permission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="content-wrapper w-75 container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Permission Form</h5>
        </div>

        <div class="card-body">
            <form method="post" action="<?php echo base_url('Permisions_controller/create_permission') ?>">

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Identification</label>
                        <input type="number" name="per_identification" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="per_name" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Type</label>
                        <input type="number" name="per_type" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Extra Type</label>
                        <input type="number" name="per_extra_type" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Amount 1</label>
                        <input type="number" name="per_amount1" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Amount 2</label>
                        <input type="number" name="per_amount2" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Status</label>
                        <select name="per_status" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Server Status</label>
                        <select name="per_server_status" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label class="form-label">Online / Offline Submit</label>
                        <select name="per_online_offline_submit" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Branch Code</label>
                        <input type="number" name="per_branch_code" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Account Type</label>
                        <input type="number" name="per_account_type" class="form-control">
                    </div>

                    <!-- <div class="col-md-4 mb-3">
                        <label class="form-label">Created By</label>
                        <input type="number" name="per_created_by" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Updated By</label>
                        <input type="number" name="per_updated_by" class="form-control">
                    </div> -->

                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>