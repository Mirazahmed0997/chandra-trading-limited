<?php
// echo '<pre>';
// print_r($applicant);
// print_r($educations);
// print_r($experiences);
// print_r($trainnings);
// print_r($languages);
// print_r($references);
// echo '</pre>';
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application - <?= html_escape($applicant->applicant_name ?? ''); ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d5c3a;
            --primary-soft: #f0f7f4;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            color: var(--text-dark);
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .form-container {
            max-width: 1300px;
            margin: 30px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
        }

        /* Top Header Styling */
        .company-header {
            border-bottom: 2px solid var(--primary-soft);
            padding: 20px;
            background-color: #9db9c6;
            color: white;
        }

        .header-title {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.6rem;
            letter-spacing: -0.5px;
        }

        .header-sub {
            font-size: 0.825rem;
            color: var(--text-muted);
        }

        .doc-badge {
            display: inline-block;
            background-color: var(--primary-soft);
            color: var(--primary-color);
            font-weight: 600;
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Section Cards & Headers */
        .section-block {
            margin-bottom: 28px;
        }



        .section-header {
            display: flex;
            align-items: center;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            padding-bottom: 6px;
            border-bottom: 1.5px solid var(--border-color);

        }

        .section-header i {
            margin-right: 8px;
            font-size: 1.1rem;
            background: #9DB9C6;
        }

        .section-header {
            background: #9DB9C6;
            padding: 10px;
            border-radius: 8px;
            color: #fff;
        }

        /* Applicant Info & Tables */
        .applicant-img {
            width: 220px;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table-custom {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }

        .table-custom th,
        .table-custom td {
            padding: 10px 14px;
            border-bottom: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .table-custom tr:last-child td {
            border-bottom: none;
        }

        .table-custom tr td:last-child,
        .table-custom tr th:last-child {
            border-right: none;
        }

        .table-custom thead th {
            background-color: var(--bg-light);
            color: var(--text-dark);
            font-weight: 600;
            text-align: center;
            font-size: 0.825rem;
        }

        .label-cell {
            font-weight: 600;
            width: 20%;
            background-color: var(--bg-light);
            color: #475569;
            font-size: 11px;
        }

        .value-cell {
            width: 30%;
            color: var(--text-dark);
            font-size: 11px;
        }

        .edu_head tr th {
            font-size: 11px;
        }

        .edu_cell tr td {
            font-size: 11px;
        }

        .training_head tr th {
            font-size: 11px;
        }

        .training_cell tr td {
            font-size: 11px;
        }

        .exp_head tr th {
            font-size: 11px;
        }

        .exp_cell tr td {
            font-size: 11px;
        }

        .skill_head tr th {
            font-size: 11px;
        }

        .skill_cell tr td {
            font-size: 11px;
        }

        .pro_head tr th {
            font-size: 11px;
        }

        .pro_cell tr td {
            font-size: 11px;
        }

        /* Cards & Highlight Containers */
        .info-card {
            background-color: var(--bg-light);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 4px;
            /* background-color: #9db9c6; */
        }

        .declaration-box {
            background-color: #f8fafc;
            border-left: 4px solid var(--primary-color);
            padding: 14px 18px;
            border-radius: 0 8px 8px 0;
            font-size: 0.85rem;
        }

        .applicant-signature {
            max-width: 140px;
            max-height: 45px;
            object-fit: contain;
        }

        .upload-btn {
            font-size: 0.75rem;
            padding: 2px 10px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Action Footer */
        .action-bar {
            background-color: #fff;
            padding-top: 20px;
            border-top: 1px dashed var(--border-color);
        }

        @media print {
            /* @page {
                size: A4;
                margin: 15mm !important;
            } */

            @page {
                size: A4 portrait;
                margin: 12mm 15mm;
            }

            /* 2. Body Reset */
            body {
                background: #ffffff !important;
                color: #000000 !important;
                font-size: 10pt;
                line-height: 1.4;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            /* 3. Container Adjustments */
            .form-container {
                border: none !important;
                box-shadow: none !important;
                padding: 20px !important;
                margin: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            /* 4. Hide Non-Print Elements */
            .no-print,
            .action-bar,
            .upload-btn {
                display: none !important;
            }

            /* 5. Page Break Controls */
            .section-block {
                page-break-inside: avoid;
                break-inside: avoid;
                margin-bottom: 20px;
            }

            .table-custom tr {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .company-header,
            .declaration-box {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            /* 6. High-Contrast Borders & Light Grays for Print */
            .table-custom,
            .table-custom th,
            .table-custom td,
            .info-card,
            .applicant-img {
                border-color: #94a3b8 !important;
            }

            .table-custom thead th,
            .label-cell {
                background-color: #f1f5f9 !important;
                color: #0f172a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .doc-badge {
                background-color: #f0f7f4 !important;
                color: #0d5c3a !important;
                border: 1px solid #0d5c3a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .declaration-box {
                background-color: #f8fafc !important;
                border-left: 4px solid #0d5c3a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body>

    <div class="container content-wrapper form-container">

        <!-- Header -->
        <div class="row text-center company-header mb-4">
            <div class="col-12">
                <h3 class="header-title mb-1 text-white">Chandra Trading Ltd.</h3>
                <p class="header-sub mb-1 text-white">
                    <i class="bi bi-geo-alt me-1 "></i>Lily pond center, Floor -21, Mission road, Motijheel, Dhaka-1203,
                    Bangladesh
                </p>
                <p class="header-sub mb-3 text-white">
                    <i class="bi bi-envelope me-1 text-white"></i>ctl05.2026@gmail.com &nbsp;|&nbsp;
                    <i class="bi bi-telephone me-1 text-white"></i>+880 1709-653400
                </p>
                <span class="doc-badge">Job Application Form</span>
            </div>
        </div>

        <!-- Position Applied -->
        <div class="info-card mb-4 d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted text-uppercase fw-semibold"
                    style="font-size: 0.75rem; letter-spacing: 0.5px;">Applied Position</span>
                <h5 class="mb-0 mt-1 fw-bold text-dark"><?= html_escape($applicant->applied_position ?? 'N/A'); ?></h5>
            </div>
            <div class="text-end no-print">
                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-printer me-1"></i> Print Form
                </button>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="section-block">
            <div class="section-header">
                <i class="bi bi-person-badge"></i> Personal Information
            </div>
            <div class="row g-3 align-items-start">
                <div class="col-md-3 text-center text-md-start">
                    <?php if (!empty($applicant->photo_url)): ?>
                        <img src="<?= base_url('assets/uploads/applications/photo/' . $applicant->photo_url); ?>"
                            alt="Applicant Photo" class="applicant-img" width="400px">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/130x155?text=No+Photo" alt="Applicant Photo"
                            class="applicant-img">
                    <?php endif; ?>
                </div>
                <div class="col-md-9">
                    <table class="table-custom">
                        <tbody>
                            <tr>
                                <td class="label-cell">Applicant's Name</td>
                                <td class="value-cell fw-semibold">
                                    <?= html_escape($applicant->applicant_name ?? '-'); ?>
                                </td>
                                <td class="label-cell">Gender</td>
                                <td class="value-cell"><?= html_escape($applicant->gender ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Father's Name</td>
                                <td class="value-cell"><?= html_escape($applicant->father_name ?? '-'); ?></td>
                                <td class="label-cell">Mother's Name</td>
                                <td class="value-cell"><?= html_escape($applicant->mother_name ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Permanent Address</td>
                                <td class="value-cell"><?= html_escape($applicant->permanent_address ?? '-'); ?></td>
                                <td class="label-cell">Present Address</td>
                                <td class="value-cell"><?= html_escape($applicant->present_address ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Contact Address</td>
                                <td class="value-cell"><?= html_escape($applicant->contact_address ?? '-'); ?></td>
                                <td class="label-cell">Mobile Number</td>
                                <td class="value-cell"><?= html_escape($applicant->contact_mobile ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Contact Email</td>
                                <td class="value-cell"><?= html_escape($applicant->contact_email ?? '-'); ?></td>
                                <td class="label-cell">DOB & Age</td>
                                <td class="value-cell">
                                    <?php
                                    if (!empty($applicant->date_of_birth)) {
                                        $dob = new DateTime($applicant->date_of_birth);
                                        $now = new DateTime();
                                        $age = $now->diff($dob)->y;
                                        echo html_escape($applicant->date_of_birth) . ' <span class="text-muted">(' . $age . ' yrs)</span>';
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell">Marital Status</td>
                                <td class="value-cell"><?= html_escape($applicant->marital_status ?? '-'); ?></td>
                                <td class="label-cell">Spouse's Name</td>
                                <td class="value-cell"><?= html_escape($applicant->spouse_name ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Nationality</td>
                                <td class="value-cell"><?= html_escape($applicant->nationality ?? '-'); ?></td>
                                <td class="label-cell">Religion</td>
                                <td class="value-cell"><?= html_escape($applicant->religion ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Blood Group</td>
                                <td class="value-cell"><span
                                        class="badge bg-light text-dark border"><?= html_escape($applicant->blood_group ?? '-'); ?></span>
                                </td>
                                <td class="label-cell">NID Number</td>
                                <td class="value-cell">
                                    <?= html_escape($applicant->nid_number ?? '-'); ?>
                                    <?php if (!empty($applicant->nid_document)): ?>
                                        <a href="<?= base_url('assets/uploads/applications/nid/' . $applicant->nid_document); ?>"
                                            target="_blank" class="btn btn-outline-primary upload-btn ms-2 no-print">
                                            <i class="bi bi-file-earmark-pdf"></i> View NID
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="section-block  headline">
            <div class="section-header">
                <i class="bi bi-telephone-outbound"></i> Emergency Contact
            </div>
            <table class="table-custom">
                <tbody>
                    <tr>
                        <td class="label-cell">Contact Person</td>
                        <td class="value-cell"><?= html_escape($applicant->emergency_contact_name ?? '-'); ?></td>
                        <td class="label-cell">Mobile Number</td>
                        <td class="value-cell"><?= html_escape($applicant->emergency_contact_mobile ?? '-'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Educational Qualification -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-mortarboard"></i> Educational Qualifications
            </div>
            <div class="table-responsive">
                <table class="table-custom text-center">
                    <thead class="edu_head">
                        <tr>
                            <th>Exam Name</th>
                            <th>Passing Year</th>
                            <th>Group / Major</th>
                            <th>Board / Institution</th>
                            <th>GPA / CGPA</th>
                            <th class="no-print" style="width: 10%;">Attachment</th>
                        </tr>
                    </thead>
                    <tbody class="edu_cell">
                        <?php if (!empty($educations)): ?>
                            <?php foreach ($educations as $edu): ?>
                                <tr>
                                    <td class="fw-medium text-start"><?= html_escape($edu->exam_name ?? '-'); ?></td>
                                    <td><?= html_escape($edu->passing_year ?? '-'); ?></td>
                                    <td><?= html_escape($edu->group_major ?? '-'); ?></td>
                                    <td class="text-start"><?= html_escape($edu->board_institution ?? '-'); ?></td>
                                    <td><?= html_escape($edu->result_gpa ?? '-'); ?></td>
                                    <td class="no-print">
                                        <?php if (!empty($edu->document)): ?>
                                            <a href="<?= base_url('assets/uploads/applications/education/' . $edu->document); ?>"
                                                target="_blank" class="btn btn-sm btn-light border upload-btn">View</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-muted py-3">No education details recorded.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Training Information -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-award"></i> Training & Certifications
            </div>
            <div class="table-responsive">
                <table class="table-custom text-center">
                    <thead class="training_head">
                        <tr>
                            <th>Training Title</th>
                            <th>Subject</th>
                            <th>Institution</th>
                            <th>Location</th>
                            <th>Year</th>
                            <th>Duration</th>
                            <th class="no-print" style="width: 10%;">Attachment</th>
                        </tr>
                    </thead>
                    <tbody class="training_cell">
                        <?php if (!empty($trainnings)): ?>
                            <?php foreach ($trainnings as $train): ?>
                                <tr>
                                    <td class="fw-medium text-start"><?= html_escape($train->training_title ?? '-'); ?></td>
                                    <td><?= html_escape($train->subject ?? '-'); ?></td>
                                    <td class="text-start"><?= html_escape($train->institution_name ?? '-'); ?></td>
                                    <td><?= html_escape($train->address ?? '-'); ?>
                                        (<?= html_escape($train->country ?? '-'); ?>)</td>
                                    <td><?= html_escape($train->training_year ?? '-'); ?></td>
                                    <td><?= html_escape($train->duration ?? '-'); ?></td>
                                    <td class="no-print">
                                        <?php if (!empty($train->document_url)): ?>
                                            <a href="<?= base_url('assets/uploads/applications/training/' . $train->document_url); ?>"
                                                target="_blank" class="btn btn-sm btn-light border upload-btn">View</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-muted py-3">No training details recorded.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Professional Experience -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-briefcase"></i> Professional Experience
            </div>
            <div class="table-responsive">
                <table class="table-custom text-center">
                    <thead class="exp_head">
                        <tr>
                            <th>Experience Type</th>
                            <th>Organization</th>
                            <th>Address</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th class="no-print" style="width: 10%;">Attachment</th>
                        </tr>
                    </thead>
                    <tbody class="exp_cell">
                        <?php if (!empty($experiences)): ?>
                            <?php foreach ($experiences as $exp): ?>
                                <tr>
                                    <td><?= html_escape($exp->experience_type ?? '-'); ?></td>
                                    <td class="fw-medium text-start"><?= html_escape($exp->organization_name ?? '-'); ?></td>
                                    <td class="text-start"><?= html_escape($exp->address ?? '-'); ?></td>
                                    <td><?= html_escape($exp->start_date ?? '-'); ?></td>
                                    <td>
                                        <?php if (!empty($exp->is_current_job) && $exp->is_current_job == 1): ?>
                                            <span
                                                class="badge bg-success-subtle text-success border border-success-subtle">Present</span>
                                        <?php else: ?>
                                            <?= html_escape($exp->end_date ?? '-'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="no-print">
                                        <?php if (!empty($exp->document_url)): ?>
                                            <a href="<?= base_url('assets/uploads/applications/experience/' . $exp->document_url); ?>"
                                                target="_blank" class="btn btn-sm btn-light border upload-btn">View</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-muted py-3">No experience details recorded.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- References & Technical Skills Grid -->
        <div class="row g-3 section-block headline">
            <div class="col-md-12">
                <div class="section-header">
                    <i class="bi bi-people"></i> References
                </div>
                <div class="table-responsive">
                    <table class="table-custom">
                        <thead class="skill_head">
                            <tr>
                                <th>Name & Role</th>
                                <th>Organization</th>
                                <th>Contact Details</th>
                            </tr>
                        </thead>
                        <tbody class="skill_cell">
                            <?php if (!empty($references)): ?>
                                <?php foreach ($references as $ref): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-semibold"><?= html_escape($ref->ref_name ?? '-'); ?></div>
                                            <div class="text-muted" style="font-size: 0.775rem;">
                                                <?= html_escape($ref->designation ?? '-'); ?>
                                            </div>
                                        </td>
                                        <td><?= html_escape($ref->organization_name ?? '-'); ?></td>
                                        <td style="font-size: 0.8rem;">
                                            <div><i class="bi bi-envelope"></i> <?= html_escape($ref->email ?? '-'); ?></div>
                                            <div><i class="bi bi-telephone"></i> <?= html_escape($ref->mobile_number ?? '-'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-3">No references provided.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        <div class="col-md-12">
            <div class="section-header">
                <i class="bi bi-cpu"></i> IT Knowledge & Skills
            </div>
            <div class="info-card h-100" style="max-height: 180px; overflow-y: auto;">
                <p class="mb-0 text-dark"><?= html_escape($applicant->it_skills ?? 'N/A'); ?></p>
            </div>
        </div>

        <!-- Language Proficiency -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-translate"></i> Language Proficiency
            </div>
            <div class="table-responsive">
                <table class="table-custom text-center">
                    <thead class="pro_head">
                        <tr>
                            <th>Language</th>
                            <th>Reading Skill</th>
                            <th>Writing Skill</th>
                            <th>Speaking Skill</th>
                        </tr>
                    </thead>
                    <tbody class="pro_cell">
                        <?php if (!empty($languages)): ?>
                            <?php foreach ($languages as $lang): ?>
                                <tr>
                                    <td class="fw-medium text-start"><?= html_escape($lang->language_name ?? '-'); ?></td>
                                    <td><?= html_escape($lang->reading_skill ?? '-'); ?></td>
                                    <td><?= html_escape($lang->writing_skill ?? '-'); ?></td>
                                    <td><?= html_escape($lang->speaking_skill ?? '-'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-muted py-3">No language proficiency recorded.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Salary Expectations & Career Goals -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-cash-stack"></i> Expectations & Career Intentions
            </div>
            <div class="info-card">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <strong class="text-secondary">Expected Salary: </strong>
                        <span class="fw-bold fs-6 ms-1">
                            <?= !empty($applicant->expected_salary) ? html_escape(number_format((float) $applicant->expected_salary, 2)) : 'N/A'; ?>
                        </span>
                        <span class="badge bg-secondary ms-2">
                            <?= (!empty($applicant->is_salary_negotiable) && $applicant->is_salary_negotiable == 1) ? 'Negotiable' : 'Non-negotiable'; ?>
                        </span>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="fw-semibold text-dark mb-1">Career Growth Expectations</div>
                        <div class="text-secondary" style="font-size: 0.825rem;">
                            <?= nl2br(html_escape($applicant->future_expectations ?? 'N/A')); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="fw-semibold text-dark mb-1">Your role for the organization if appointed.</div>
                        <div class="text-secondary" style="font-size: 0.825rem;">
                            <?= nl2br(html_escape($applicant->role_in_organization ?? 'N/A')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Declaration -->
        <div class="d-flex align-items-center justify-content-between">
            <div class="declaration-box mb-4">
                <div class="fw-bold text-dark mb-1"><i class="bi bi-info-circle me-1"></i> Declaration of Accuracy</div>
                I hereby declare that all details provided in this application are true, complete, and correct to the
                best
                of my knowledge and belief.
            </div>

            <div class="text-center">
                <?php if (!empty($applicant->applicant_signature_url)): ?>
                    <img src="<?= base_url('assets/uploads/applications/signature/' . $applicant->applicant_signature_url); ?>"
                        alt="Signature" class="applicant-signature d-block mx-auto mb-1">
                <?php else: ?>
                    <div class="fw-bold mb-4 text-dark"><?= html_escape($applicant->applicant_name ?? ''); ?></div>
                <?php endif; ?>
                <div class="border-top border-dark pt-1 text-uppercase fw-semibold text-muted"
                    style="font-size: 0.7rem; letter-spacing: 0.5px;">
                    Applicant's Signature
                </div>
            </div>
        </div>

        <!-- Verification Report -->
        <div class="section-block headline">
            <div class="section-header">
                <i class="bi bi-shield-check"></i> Office Verification Report
            </div>
            <div class="border rounded p-3 bg-light">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">


                        <ol class="text-muted mb-0" style="font-size: 0.825rem;">
                            <div class="fw-semibold text-dark">Initial Verification Report</div>
                            <?php
                            $conditions = $applicant->verification_comments ?? '';

                            if (!empty($conditions)) {
                                $items = explode('-', $conditions);

                                foreach ($items as $item) {
                                    $item = trim($item);

                                    if (!empty($item)) {
                                        echo '<li>' . html_escape($item) . '</li>';
                                    }
                                }
                            } else {
                                echo '<li>N/A</li>';
                            }
                            ?>
                        </ol>

                    </div>
                    <div class="col-md-6">


                        <ol class="text-muted mb-0" style="font-size: 0.825rem;">
                            <div class="fw-semibold text-dark">Re-verification</div>
                            <?php
                            $conditions = $applicant->reverification_comments ?? '';

                            if (!empty($conditions)) {
                                $items = explode('-', $conditions);

                                foreach ($items as $item) {
                                    $item = trim($item);

                                    if (!empty($item)) {
                                        echo '<li>' . html_escape($item) . '</li>';
                                    }
                                }
                            } else {
                                echo '<li>N/A</li>';
                            }
                            ?>
                        </ol>

                    </div>

                </div>
                <hr class="my-2 border-color">
                <div class="row pt-1 text-muted" style="font-size: 0.8rem;">
                    <div class="col-6">
                        <strong>Verifier:</strong> <?= html_escape($applicant->verifier_name ?? 'N/A'); ?>
                    </div>
                    <div class="col-6">
                        <strong>Re-verifier:</strong> <?= html_escape($applicant->reverifier_name ?? 'N/A'); ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Decision / Signature Footer -->
        <div class="action-bar d-flex justify-content-between align-items-end">
            <div class="no-print">
                <?php if ($applicant->application_status == 'Accepted'): ?>
                    <button type="button" class="btn btn-secondary px-4 me-2" disabled>
                        <i class="bi bi-check-circle-fill me-1"></i> Application Accepted
                    </button>
                <?php else: ?>

                    <a href="<?= base_url('accept_application/' . $applicant->application_id); ?>"
                        class="btn btn-success px-4 me-2"
                        onclick="return confirm('Are you sure you want to accept this application?');">
                        <i class="bi bi-check-lg me-1"></i> Accept Application
                    </a>
                <?php endif; ?>


                <?php if ($applicant->application_status == 'Rejected'): ?>
                    <button type="button" class="btn btn-secondary px-4 me-2" disabled>
                        <i class="bi bi-check-circle-fill me-1"></i> Application Rejected
                    </button>
                <?php else: ?>

                    <a href="<?= base_url('reject_application/' . $applicant->application_id); ?>"onclick="return confirm('Are you sure you want to accept this application?');">
                        <button class="btn btn-outline-danger px-4">
                            <i class="bi bi-x-lg me-1"></i> Reject
                        </button>
                    </a>
                <?php endif; ?>


                <button type="button" class="btn btn-primary btn-sm rounded-3 px-3 fw-medium add_btn"
                    data-bs-toggle="modal" data-bs-target="#VerificationReport">
                    <i class="bi bi-plus-lg me-1"></i> Verification Report
                </button>

                <?php if ($applicant->application_status == 'Accepted'): ?>
                    <a href="<?= base_url('appointment_letter_form/' . $applicant->application_id); ?>"
                        class="btn btn-success btn-sm rounded-3 px-3 fw-medium add_btn">
                        <i class="bi bi-plus-lg me-1"></i> Make Appointment Letter
                    </a>
                <?php endif; ?>






            </div>

        </div>

    </div>

</body>

</html>


<!-- -----------------------------modal---------------- -->
<div class="modal fade" id="VerificationReport" tabindex="-1" aria-labelledby="VerificationReportLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="VerificationReportLabel">
                    Verification Report
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?= base_url('update_application_verification/' . $applicant->application_id); ?>"
                method="POST">

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="category_name" class="form-label">
                            Verifier Name
                        </label>

                        <input type="text" value="<?= html_escape($applicant->verifier_name ?? 'N/A'); ?>"
                            name="verifier_name" id="category_name" class="form-control"
                            placeholder="Enter category name" required>
                    </div>

                    <div class="mb-3">
                        <label for="initial_verification" class="form-label">
                            Initial Verification
                        </label>

                        <textarea value="" name="verification_comments" id="initial_verification" class="form-control"
                            rows="4" placeholder="Enter initial verification details"
                            required><?= html_escape($applicant->verification_comments ?? 'N/A'); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category_name" class="form-label">
                            Re-Verifier Name
                        </label>

                        <input type="text" value="<?= html_escape($applicant->reverifier_name ?? 'N/A'); ?>"
                            name="reverifier_name" id="category_name" class="form-control"
                            placeholder="Enter category name" required>
                    </div>

                    <div class="mb-3">
                        <label for="re_verification" class="form-label">
                            Re-Verification
                        </label>

                        <textarea name="reverification_comments" value="" id="re_verification" class="form-control"
                            rows="4" placeholder="Enter re-verification details"
                            required><?= html_escape($applicant->reverification_comments ?? 'N/A'); ?></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary btn-sm">
                        Create
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>