<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary-rgb: 37, 99, 235;
            --bs-body-bg: #f8fafc;
        }

        body {
            background-color: var(--bs-body-bg);
            color: #334155;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }

        .form-card {
            background: #f2e9e9;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            width: 1300px;
        }

        .wizard-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2rem;
        }

        .wizard-steps::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 3px;
            background: #e2e8f0;
            transform: translateY(-50%);
            z-index: 1;
        }

        .wizard-progress-bar {
            position: absolute;
            top: 50%;
            left: 0;
            height: 3px;
            background: #2563eb;
            transform: translateY(-50%);
            z-index: 1;
            transition: width 0.3s ease;
        }

        .step-item {
            position: relative;
            z-index: 2;
            background: #f2e9e9;
            padding: 0 0.5rem;
            text-align: center;
        }

        .step-button {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            background: #ffffff;
            color: #64748b;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .step-item.active .step-button {
            border-color: #2563eb;
            background: #2563eb;
            color: #ffffff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        .step-item.completed .step-button {
            border-color: #10b981;
            background: #10b981;
            color: #ffffff;
        }

        .step-label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 500;
            color: #64748b;
            margin-top: 0.5rem;
        }

        .step-item.active .step-label {
            color: #0f172a;
            font-weight: 600;
        }

        /* Repeating Dynamic Cards */
        .repeater-card {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 0.75rem;
            transition: border-color 0.2s ease;
        }

        .repeater-card:hover {
            border-color: #94a3b8;
        }

        /* Custom File Upload Input */
        .file-upload-wrapper {
            position: relative;
            border: 1px dashed #cbd5e1;
            border-radius: 0.5rem;
            padding: 0.75rem;
            text-align: center;
            background: #ffffff;
            transition: all 0.2s;
        }

        .file-upload-wrapper:hover {
            border-color: #2563eb;
            background: #f0f6ff;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e293b;
            letter-spacing: -0.01em;
        }

        @media (max-width: 768px) {
            .step-label {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class=" py-5">
        <div class="content-wrapper row justify-content-center">
            <div class="col-xl-10">
                <div class="form-card p-4 p-md-5">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark mb-1">Employment Application</h3>
                        <p class="text-muted small">Please complete all required fields to submit your profile.</p>
                    </div>

                    <form action="<?= base_url('create_application') ?>" method="POST" enctype="multipart/form-data"
                        id="jobApplicationForm" class="needs-validation" novalidate>

                        <div class="wizard-steps mb-4">
                            <div class="wizard-progress-bar" id="wizardProgress" style="width: 0%;"></div>
                            <div class="step-item active" data-step="1">
                                <button type="button" class="step-button">1</button>
                                <span class="step-label">Personal Info</span>
                            </div>
                            <div class="step-item" data-step="2">
                                <button type="button" class="step-button">2</button>
                                <span class="step-label">Education & Experience</span>
                            </div>
                            <div class="step-item" data-step="3">
                                <button type="button" class="step-button">3</button>
                                <span class="step-label">Skills & Languages</span>
                            </div>
                            <div class="step-item" data-step="4">
                                <button type="button" class="step-button">4</button>
                                <span class="step-label">References & Salary</span>
                            </div>
                        </div>

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="step1">
                                <div class="border-bottom pb-2 mb-4">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-person-badge me-2"></i>Position & Personal Details</h5>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Applied Position <span
                                                class="text-danger">*</span></label>
                                        <select name="applied_position" class="form-select" required>
                                            <option disabled selected>Select</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Officer">Officer</option>
                                            <option value="IT">IT</option>
                                            <option value="HR">HR</option>
                                            <option value="Management">Management</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Applicant Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="applicant_name" class="form-control" required
                                            placeholder="Full Name">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Gender <span
                                                class="text-danger">*</span></label>
                                        <select name="gender" class="form-select" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Date of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Photo Upload</label>
                                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Father's Name</label>
                                        <input type="text" name="father_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Mother's Name</label>
                                        <input type="text" name="mother_name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Marital Status</label>
                                        <select name="marital_status" class="form-select">
                                            <option value="Single">Single</option>
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Spouse Name</label>
                                        <input type="text" name="spouse_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Nationality</label>
                                        <input type="text" name="nationality" class="form-control" value="Bangladeshi">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Religion</label>
                                        <input type="text" name="religion" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Blood Group</label>
                                        <select name="blood_group" class="form-select">
                                            <option value="">Select Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">NID Number</label>
                                        <input type="text" name="nid_number" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-medium">NID Document Upload</label>
                                        <input type="file" name="nid_document" class="form-control"
                                            accept=".pdf,image/*" required>
                                    </div>

                                    <div class="col-12 mt-4 border-bottom pb-2 mb-2">
                                        <h5 class="section-title text-primary mb-0"><i
                                                class="bi bi-telephone me-2"></i>Contact Details</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Contact Mobile <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="contact_mobile" class="form-control" required
                                            placeholder="+8801XXXXXXXXX">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Contact Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="contact_email" class="form-control" required
                                            placeholder="name@domain.com">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Present Address</label>
                                        <textarea name="present_address" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Permanent Address</label>
                                        <textarea name="permanent_address" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">Contact Address</label>
                                        <textarea name="contact_address" class="form-control" rows="2"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Emergency Contact Name</label>
                                        <input type="text" name="emergency_contact_name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Emergency Contact Mobile</label>
                                        <input type="text" name="emergency_contact_mobile" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 2: EDUCATION & EXPERIENCE -->
                            <div class="tab-pane fade" id="step2">
                                <!-- Education Section -->
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-mortarboard me-2"></i>Educational Qualifications</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addEducationRow()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Education
                                    </button>
                                </div>

                                <div id="educationContainer" class="d-flex flex-column gap-3 mb-4">
                                    <!-- First Default Record -->
                                    <div class="repeater-card p-3 position-relative">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Exam / Degree <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="education[0][exam_name]"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label small fw-medium">Passing Year <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="education[0][passing_year]"
                                                    class="form-control form-control-sm" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Group / Major</label>
                                                <input type="text" name="education[0][group_major]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">GPA / Result</label>
                                                <input type="number" step="0.01" name="education[0][result_gpa]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-medium">Board / Institution</label>
                                                <input type="text" name="education[0][board_institution]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label small fw-medium">Document Attachment</label>
                                                <input type="file" name="education[0][document]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100"
                                                    onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Experience Section -->
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-briefcase me-2"></i>Employment Experience</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addExperienceRow()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Experience
                                    </button>
                                </div>

                                <div id="experienceContainer" class="d-flex flex-column gap-3">
                                    <!-- First Default Record -->
                                    <div class="repeater-card p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Organization</label>
                                                <input type="text" name="experience[0][organization_name]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Role / Type</label>
                                                <input type="text" name="experience[0][experience_type]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Address</label>
                                                <input type="text" name="experience[0][address]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Start Date</label>
                                                <input type="date" name="experience[0][start_date]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">End Date</label>
                                                <input type="date" name="experience[0][end_date]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label small fw-medium">Document</label>
                                                <input type="file" name="experience[0][document_url]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100"
                                                    onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="checkbox" name="experience[0][is_current_job]"
                                                        value="1" class="form-check-input" id="currentJob0">
                                                    <label class="form-check-label small" for="currentJob0">I currently
                                                        work here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 3: SKILLS & LANGUAGES -->
                            <div class="tab-pane fade" id="step3">
                                <div class="border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i class="bi bi-gear me-2"></i>IT &
                                        Technical Skills</h5>
                                </div>
                                <div class="mb-4">
                                    <textarea name="it_skills" class="form-control" rows="3"
                                        placeholder="List software applications, frameworks, programming languages, etc."></textarea>
                                </div>

                                <!-- Training Section -->
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-award me-2"></i>Trainings & Certifications</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addTrainingRow()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Training
                                    </button>
                                </div>

                                <div id="trainingContainer" class="d-flex flex-column gap-3 mb-4">
                                    <div class="repeater-card p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Training Title</label>
                                                <input type="text" name="training[0][training_title]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Subject / Topic</label>
                                                <input type="text" name="training[0][subject]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Institution</label>
                                                <input type="text" name="training[0][institution_name]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Country</label>
                                                <input type="text" name="training[0][country]"
                                                    class="form-control form-control-sm" value="Bangladesh">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label small fw-medium">Year</label>
                                                <input type="number" name="training[0][training_year]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label small fw-medium">Duration</label>
                                                <input type="text" name="training[0][duration]"
                                                    class="form-control form-control-sm" placeholder="e.g. 3 Months">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Document</label>
                                                <input type="file" name="training[0][document_url]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100"
                                                    onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Languages Section -->
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-translate me-2"></i>Language Proficiency</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addLanguageRow()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Language
                                    </button>
                                </div>

                                <div id="languageContainer" class="d-flex flex-column gap-3">
                                    <div class="repeater-card p-3">
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Language</label>
                                                <input type="text" name="language[0][language_name]"
                                                    class="form-control form-control-sm" placeholder="e.g. English">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Reading</label>
                                                <select name="language[0][reading_skill]"
                                                    class="form-select form-select-sm">
                                                    <option value="Native">Native</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Writing</label>
                                                <select name="language[0][writing_skill]"
                                                    class="form-select form-select-sm">
                                                    <option value="Native">Native</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label small fw-medium">Speaking</label>
                                                <select name="language[0][speaking_skill]"
                                                    class="form-select form-select-sm">
                                                    <option value="Native">Native</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100"
                                                    onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 4: REFERENCES & SALARY -->
                            <div class="tab-pane fade" id="step4">
                                <!-- References Section -->
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-people me-2"></i>Professional References</h5>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addReferenceRow()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Reference
                                    </button>
                                </div>

                                <div id="referenceContainer" class="d-flex flex-column gap-3 mb-4">
                                    <div class="repeater-card p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Reference Name</label>
                                                <input type="text" name="reference[0][ref_name]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Designation</label>
                                                <input type="text" name="reference[0][designation]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Organization</label>
                                                <input type="text" name="reference[0][organization_name]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Email</label>
                                                <input type="email" name="reference[0][email]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label small fw-medium">Mobile</label>
                                                <input type="text" name="reference[0][mobile_number]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label small fw-medium">Address</label>
                                                <input type="text" name="reference[0][address]"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger w-100"
                                                    onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expectations Section -->
                                <div class="border-bottom pb-2 mb-3">
                                    <h5 class="section-title text-primary mb-0"><i
                                            class="bi bi-cash-stack me-2"></i>Expectations & Final Submission</h5>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Expected Salary</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" name="expected_salary"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center pt-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="is_salary_negotiable" class="form-check-input"
                                                id="negotiableSwitch" value="1" checked>
                                            <label class="form-check-label fw-medium" for="negotiableSwitch">Salary
                                                requirement is negotiable</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Future Expectations</label>
                                        <textarea name="future_expectations" class="form-control" rows="3"
                                            placeholder="Describe your long-term career aspirations..."></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">Your role for the organization if
                                            appointed</label>
                                        <textarea name="role_in_organization" class="form-control" rows="3"
                                            placeholder="How do you see yourself contributing?"></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-medium">Applicant Signature Upload</label>
                                        <input type="file" name="applicant_signature" class="form-control"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Wizard Actions Footer -->
                        <div class="d-flex justify-content-between align-items-center mt-5 pt-3 border-top">
                            <button type="button" class="btn btn-outline-secondary px-4" id="prevBtn"
                                onclick="changeStep(-1)" disabled>
                                <i class="bi bi-arrow-left me-1"></i> Previous
                            </button>
                            <button type="button" class="btn btn-primary px-4" id="nextBtn" onclick="changeStep(1)">
                                Next Step <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                            <button type="submit" class="btn btn-success px-4 d-none" id="submitBtn">
                                Submit Application <i class="bi bi-check-lg ms-1"></i>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <script>
        let currentStep = 1;
        const totalSteps = 4;

        let eduCount = 1, expCount = 1, trnCount = 1, langCount = 1, refCount = 1;

        function updateStepUI() {
            document.querySelectorAll('.tab-pane').forEach((pane, idx) => {
                pane.classList.toggle('show', idx + 1 === currentStep);
                pane.classList.toggle('active', idx + 1 === currentStep);
            });

            document.querySelectorAll('.step-item').forEach((item, idx) => {
                const stepNum = idx + 1;
                item.classList.toggle('active', stepNum === currentStep);
                item.classList.toggle('completed', stepNum < currentStep);
            });

            const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
            document.getElementById('wizardProgress').style.width = `${progressPercent}%`;

            document.getElementById('prevBtn').disabled = (currentStep === 1);
            if (currentStep === totalSteps) {
                document.getElementById('nextBtn').classList.add('d-none');
                document.getElementById('submitBtn').classList.remove('d-none');
            } else {
                document.getElementById('nextBtn').classList.remove('d-none');
                document.getElementById('submitBtn').classList.add('d-none');
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function changeStep(direction) {
            const form = document.getElementById('jobApplicationForm');

            if (direction === 1) {
                const currentPane = document.getElementById(`step${currentStep}`);
                const requiredFields = currentPane.querySelectorAll('[required]');
                console.log(requiredFields)
                let valid = true;

                requiredFields.forEach(field => {
                    if (!field.checkValidity()) {
                        valid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                if (!valid) {
                    form.classList.add('was-validated');
                    return;
                }
            }

            currentStep += direction;
            updateStepUI();



        }

        /* Dynamic Row Handlers */
        function addEducationRow() {
            const tpl = `
        <div class="repeater-card p-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Exam / Degree <span class="text-danger">*</span></label>
                    <input type="text" name="education[${eduCount}][exam_name]" class="form-control form-control-sm" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-medium">Passing Year <span class="text-danger">*</span></label>
                    <input type="number" name="education[${eduCount}][passing_year]" class="form-control form-control-sm" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Group / Major</label>
                    <input type="text" name="education[${eduCount}][group_major]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">GPA / Result</label>
                    <input type="number" step="0.01" name="education[${eduCount}][result_gpa]" class="form-control form-control-sm">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-medium">Board / Institution</label>
                    <input type="text" name="education[${eduCount}][board_institution]" class="form-control form-control-sm">
                </div>
                <div class="col-md-5">
                    <label class="form-label small fw-medium">Document Attachment</label>
                    <input type="file" name="education[${eduCount}][document]" class="form-control form-control-sm">
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-sm btn-outline-danger w-100" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>`;
            document.getElementById('educationContainer').insertAdjacentHTML('beforeend', tpl);
            eduCount++;
        }

        function addExperienceRow() {
            const tpl = `
        <div class="repeater-card p-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Organization</label>
                    <input type="text" name="experience[${expCount}][organization_name]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Role / Type</label>
                    <input type="text" name="experience[${expCount}][experience_type]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Address</label>
                    <input type="text" name="experience[${expCount}][address]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Start Date</label>
                    <input type="date" name="experience[${expCount}][start_date]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">End Date</label>
                    <input type="date" name="experience[${expCount}][end_date]" class="form-control form-control-sm">
                </div>
                <div class="col-md-5">
                    <label class="form-label small fw-medium">Document</label>
                    <input type="file" name="experience[${expCount}][document_url]" class="form-control form-control-sm">
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-sm btn-outline-danger w-100" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="experience[${expCount}][is_current_job]" value="1" class="form-check-input" id="currentJob${expCount}">
                        <label class="form-check-label small" for="currentJob${expCount}">I currently work here</label>
                    </div>
                </div>
            </div>
        </div>`;
            document.getElementById('experienceContainer').insertAdjacentHTML('beforeend', tpl);
            expCount++;
        }

        function addTrainingRow() {
            const tpl = `
        <div class="repeater-card p-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Training Title</label>
                    <input type="text" name="training[${trnCount}][training_title]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Subject / Topic</label>
                    <input type="text" name="training[${trnCount}][subject]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Institution</label>
                    <input type="text" name="training[${trnCount}][institution_name]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Country</label>
                    <input type="text" name="training[${trnCount}][country]" class="form-control form-control-sm" value="Bangladesh">
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-medium">Year</label>
                    <input type="number" name="training[${trnCount}][training_year]" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-medium">Duration</label>
                    <input type="text" name="training[${trnCount}][duration]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Document</label>
                    <input type="file" name="training[${trnCount}][document_url]" class="form-control form-control-sm">
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-sm btn-outline-danger w-100" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>`;
            document.getElementById('trainingContainer').insertAdjacentHTML('beforeend', tpl);
            trnCount++;
        }

        function addLanguageRow() {
            const tpl = `
        <div class="repeater-card p-3">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Language</label>
                    <input type="text" name="language[${langCount}][language_name]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Reading</label>
                    <select name="language[${langCount}][reading_skill]" class="form-select form-select-sm">
                        <option value="Native">Native</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Writing</label>
                    <select name="language[${langCount}][writing_skill]" class="form-select form-select-sm">
                        <option value="Native">Native</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-medium">Speaking</label>
                    <select name="language[${langCount}][speaking_skill]" class="form-select form-select-sm">
                        <option value="Native">Native</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-sm btn-outline-danger w-100" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>`;
            document.getElementById('languageContainer').insertAdjacentHTML('beforeend', tpl);
            langCount++;
        }

        function addReferenceRow() {
            const tpl = `
        <div class="repeater-card p-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Reference Name</label>
                    <input type="text" name="reference[${refCount}][ref_name]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Designation</label>
                    <input type="text" name="reference[${refCount}][designation]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Organization</label>
                    <input type="text" name="reference[${refCount}][organization_name]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Email</label>
                    <input type="email" name="reference[${refCount}][email]" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-medium">Mobile</label>
                    <input type="text" name="reference[${refCount}][mobile_number]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-medium">Address</label>
                    <input type="text" name="reference[${refCount}][address]" class="form-control form-control-sm">
                </div>
                <div class="col-md-1 d-flex align-items-end justify-content-end">
                    <button type="button" class="btn btn-sm btn-outline-danger w-100" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>`;
            document.getElementById('referenceContainer').insertAdjacentHTML('beforeend', tpl);
            refCount++;
        }

        function removeRow(btn) {
            const card = btn.closest('.repeater-card');
            const container = card.parentElement;
            if (container.children.length > 1) {
                card.remove();
            } else {
                alert('At least one entry is required.');
            }
        }
    </script>

    <script>
        numbers= document.querySelectorAll('input[type="number"]').forEach(function (input) {

            input.addEventListener('wheel', function (e) {
                this.blur();
            });

        });

        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>