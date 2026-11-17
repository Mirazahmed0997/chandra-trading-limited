<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <h1>
            Leave Application
            <small>Submit a new leave request</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- Display Flash Messages -->
                <?php if ($this->session->flashdata('leave_applications_success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('leave_applications_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('leave_applications_error')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('leave_applications_error'); ?>
                    </div>
                <?php endif; ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Apply For Leave</h3>
                    </div>

                    <?php echo form_open_multipart('add_leave_appication', array('role' => 'form'));  ?>
                    <div class="box-body">

                        <div class="form-group">
                            <label for="leave_type">Leave Type <span class="text-danger">*</span></label>
                            <select name="leave_type" id="leave_type" class="form-control" required>
                                <option value="">Select Leave Type</option>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Annual Leave">Annual Leave</option>
                                <option value="Maternity/Paternity Leave">Maternity/Paternity Leave</option>
                                <option value="Unpaid Leave">Unpaid Leave</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="from_date">From Date <span class="text-danger">*</span></label>
                                    <input type="date" name="from_date" id="from_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="to_date">To Date <span class="text-danger">*</span></label>
                                    <input type="date" name="to_date" id="to_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_days">Total Days <span class="text-danger">*</span></label>
                                    <input type="number" step="0.5" name="total_days" id="total_days"
                                        class="form-control" placeholder="e.g. 1 or 2" required readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reason">Reason <span class="text-danger">*</span></label>
                            <textarea name="reason" id="reason" rows="4" class="form-control"
                                placeholder="Enter reason for leave..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="attachment">Attachment (Supporting Document)</label>
                            <input type="file" name="attachment" id="attachment" class="form-control">
                            <p class="help-block">Allowed files: jpg, png, pdf</p>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit
                            Application</button>
                        <a href="<?php echo site_url('user_movement_list'); ?>" class="btn btn-default">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </section>
</div>

<!-- Optional JavaScript to auto-calculate total days between From and To dates -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#from_date, #to_date').change(function () {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();

        if (fromDate && toDate) {
            var start = new Date(fromDate);
            var end = new Date(toDate);

            if (end >= start) {
                var diffTime = Math.abs(end - start);
                var diffDays = (diffTime / (1000 * 60 * 60 * 24)) + 1; // inclusive of start day
                $('#total_days').val(diffDays.toFixed(1));
            } else {
                alert('To Date cannot be earlier than From Date');
                $('#to_date').val('');
                $('#total_days').val('');
            }
        }
    });
</script>