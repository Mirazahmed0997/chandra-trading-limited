



<div class="content-wrapper container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Edit Permission</h5>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('Permisions_controller/update_permission') ?>">

                <input type="hidden" name="per_id" value="<?= $permission->per_id ?>">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Identification</label>
                        <input type="number" name="per_identification" 
                            value="<?= $permission->per_identification ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" name="per_name" 
                            value="<?= $permission->per_name ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Type</label>
                        <input type="text" name="per_type" 
                            value="<?= $permission->per_type ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Extra Type</label>
                        <input type="number" name="per_extra_type" 
                            value="<?= $permission->per_extra_type ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Amount 1</label>
                        <input type="number" name="per_amount1" 
                            value="<?= $permission->per_amount1 ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Amount 2</label>
                        <input type="number" name="per_amount2" 
                            value="<?= $permission->per_amount2 ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Status</label>
                        <select name="per_status" class="form-control">
                            <option value="1" <?= $permission->per_status == 1 ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= $permission->per_status == 0 ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Server Status</label>
                        <input type="text" name="per_server_status" 
                            value="<?= $permission->per_server_status ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Branch Code</label>
                        <input type="number" name="per_branch_code" 
                            value="<?= $permission->per_branch_code ?>" 
                            class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Account Type</label>
                        <input type="text" name="per_account_type" 
                            value="<?= $permission->per_account_type ?>" 
                            class="form-control">
                    </div>

                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="<?= base_url('permisssions') ?>" class="btn btn-secondary">Back</a>
                </div>

            </form>
        </div>
    </div>
</div>