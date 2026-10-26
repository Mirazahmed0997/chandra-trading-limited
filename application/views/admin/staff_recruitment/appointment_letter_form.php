<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .appointment-wrapper {
        background: #f4f6f9;
        min-height: 100vh;
        padding: 30px 0;
    }

    .appointment-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .04);
        overflow: hidden;
        margin-bottom: 24px;
    }

    .appointment-card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #e9ecef;
        background: #fff;
    }

    .appointment-card-body {
        padding: 25px;
    }

    .section-icon {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 19px;
        flex-shrink: 0;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        min-height: 44px;
        border: 1px solid #dce1e8;
        border-radius: 7px;
        font-size: 14px;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, .10);
    }

    .required {
        color: #dc3545;
    }

    .form-help {
        color: #6b7280;
        font-size: 12px;
        margin-top: 5px;
    }

    .appointment-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 20px 25px;
        background: #fff;
        border-top: 1px solid #e9ecef;
    }

    .btn-save {
        padding: 10px 22px;
        font-weight: 600;
        border-radius: 7px;
    }

    .section-description {
        font-size: 13px;
        color: #6b7280;
        margin: 5px 0 0;
    }

    @media (max-width: 576px) {

        .appointment-card-body,
        .appointment-card-header,
        .appointment-footer {
            padding: 18px;
        }
    }
</style>

<div class="content-wrapper appointment-wrapper">
    <div class="container-fluid px-3 px-lg-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold mb-1">Create Appointment Letter</h2>
                        <p class="text-muted small mb-0">
                            Enter employee information and appointment terms.
                        </p>
                    </div>
                </div>
            </div>

            <a href="<?= base_url('projects_list/') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>

        <form action="<?= base_url('appointment_letter_save/') ?>" method="POST" id="appointmentForm"  enctype="multipart/form-data">

            <div class="appointment-card">
                <div class="appointment-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Employee Information</h5>
                            <p class="section-description">
                                Basic details of the appointed employee.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="appointment-card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">
                                Employee Full Name <span class="required">*</span>
                            </label>
                            <input type="text" name="employee_name" class="form-control"
                                value="<?= html_escape($applicant->applicant_name); ?>"
                                placeholder="Enter employee's full name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">
                                Father's Name <span class="required">*</span>
                            </label>
                            <input type="text" name="father_name" class="form-control"
                                value="<?= html_escape($applicant->father_name ?? '-'); ?>"
                                placeholder="Enter parent's name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Mother's Name <span class="required">*</span>
                            </label>
                            <input type="text" name="mother_name" class="form-control"
                                value="<?= html_escape($applicant->mother_name ?? '-'); ?>"
                                placeholder="Enter parent's name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Employee ID <span class="required">*</span></label>
                            <input type="text" name="employee_id" class="form-control" placeholder="Enter employee ID"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" name="employee_email" class="form-control"
                                value="<?= html_escape($applicant->contact_email ?? '-'); ?>"
                                placeholder="employee@example.com" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="required">*</span></label>
                            <input type="tel" name="employee_phone" class="form-control"
                                value="<?= html_escape($applicant->contact_mobile ?? '-'); ?>"
                                placeholder="Enter contact number" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Present Address <span class="required">*</span></label>
                            <input type="text" name="present_address" class="form-control"
                                value="<?= html_escape($applicant->present_address ?? '-'); ?>"
                                placeholder="Enter present address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Permanent Address <span class="required">*</span></label>
                            <input type="text" name="permanent_address" class="form-control"
                                value="<?= html_escape($applicant->permanent_address ?? '-'); ?>"
                                placeholder="Enter Permanent address" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="appointment-card">
                <div class="appointment-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Appointment Details</h5>
                            <p class="section-description">
                                Specify the designation, department, and employment terms.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="appointment-card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">
                                Designation / Job Title <span class="required">*</span>
                            </label>
                            <input type="text" name="designation" class="form-control"
                                placeholder="e.g. Software Engineer"
                                value="<?= html_escape($applicant->applied_position ?? 'N/A'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">
                                Application ID <span class="required">*</span>
                            </label>
                            <input type="text" name="applicant_id" class="form-control"
                                placeholder="e.g. Software Engineer"
                                value="<?= html_escape($applicant->application_id ?? 'N/A'); ?>" required>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Employment Type</label><span class="required">*</span>
                            <select name="employment_type" class="form-select" required>
                                <option value="">Select employment type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Contractual">Contractual</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Probationary">Probationary</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>

                        <!-- <div class="col-md-6">
                            <label class="form-label">Letter Number</label>
                            <input type="text"
                                   name="letter_number"
                                   class="form-control"
                                   placeholder="Enter letter number">
                        </div> -->

                        <!-- <div class="col-md-6">
                            <label class="form-label">
                                Appointment Date <span class="required">*</span>
                            </label>
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div> -->

                        <div class="col-md-6">
                            <label class="form-label">
                                Joining Date <span class="required">*</span>
                            </label>
                            <input type="date" name="joining_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Probation Period <span class="required">*</span></label>
                            <select name="probation_period" class="form-select" required>
                                <option value="">Select probation period</option>
                                <option value="Not Applicable">Not Applicable</option>
                                <option value="3 Months">3 Months</option>
                                <option value="6 Months">6 Months</option>
                                <option value="12 Months">12 Months</option>
                                <option value="As per policy">As per policy</option>
                            </select>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Salary Information -->
            <div class="appointment-card">
                <div class="appointment-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Compensation Details</h5>
                            <p class="section-description">
                                Enter the agreed salary and applicable benefits.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="appointment-card-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Monthly Basic Salary (BDT) <span class="required">*</span></label>
                            <input type="number" name="basic_salary" class="form-control"
                                placeholder="Enter basic salary" min="0" step="0.01" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gross Monthly Salary (BDT) <span class="required">*</span></label>
                            <input type="number" name="gross_salary" class="form-control"
                                placeholder="Enter gross salary" min="0" step="0.01" required>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="appointment-card">
                <div class="appointment-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Terms and Conditions</h5>
                            <p class="section-description">
                                Specify employment conditions and additional instructions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="appointment-card-body">
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label class="form-label">Terms and Conditions <span class="required">*</span></label>
                            <small> ( Use <span class="text-red fw-bold">"-"</span> in every conditions )</small>
                            <textarea name="conditions" required class="form-control" rows="5"
                                placeholder="Enter employment rules, confidentiality requirements, leave policy, notice period, termination conditions, and other applicable terms."></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Additional Instructions <span class="required">*</span></label>
                            <textarea name="additional_instructions" class="form-control" rows="3" required
                                placeholder="Enter any additional instructions for the employee."></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="appointment-card">
                <div class="appointment-card-header">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Authority Details</h5>
                          
                        </div>
                    </div>
                </div>

                <div class="appointment-card-body">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Authority Name <span class="required">*</span></label>
                            <input type="text" name="reporting_authority" class="form-control"
                                placeholder="Enter Authority Name"  required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Authority Designation <span class="required">*</span></label>
                            <input type="text" name="reporting_authority_designation" class="form-control"
                                placeholder="Designation" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Authority Signature <span class="required">*</span></label>
                            <input type="file" name="reporting_authority_sign" class="form-control"
                                placeholder="Designation" required>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="appointment-card">
                <div class="appointment-footer">
                    <div class="text-muted small">
                        <i class="bi bi-info-circle me-1"></i>
                        Fields marked <span class="required">*</span> are required.
                    </div>

                    <div class="d-flex gap-2">
                        <button type="reset" class="btn btn-light border">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset
                        </button>

                        <button type="submit" class="btn btn-primary btn-save">
                            <i class="bi bi-check2-circle me-1"></i>
                            Create Appointment Letter
                        </button>
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('appointmentForm');

        form.addEventListener('submit', function (event) {
            const appointmentDate =
                form.querySelector('[name="appointment_date"]').value;

            const joiningDate =
                form.querySelector('[name="joining_date"]').value;

            if (appointmentDate && joiningDate && joiningDate < appointmentDate) {
                event.preventDefault();
                alert('Joining date cannot be earlier than the appointment date.');
                return;
            }
        });
    });
</script>