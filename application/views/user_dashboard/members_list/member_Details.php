<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4">Member Details</h2>
                <!-- <a href="<?= base_url('Applicant/edit_member/' . $member->id) ?>" class="btn btn-success">
                    <i class="fas fa-edit"></i> Edit
                </a> -->
            </div>

            <div class="row">
                <!-- Member Info -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">ব্যক্তিগত তথ্য (Personal Info)</div>
                        <div class="card-body">
                            <p><strong>স্মারক নং:</strong> <?= $member->sarok_no ?></p>
                            <p><strong>তারিখ:</strong> <?= $member->sarok_date ?></p>
                            <p><strong>নাম:</strong> <?= $member->name ?></p>
                            <p><strong>পিতা:</strong> <?= $member->father_name ?></p>
                            <p><strong>মাতা:</strong> <?= $member->mother_name ?></p>
                            <p><strong>NID:</strong> <?= $member->nid ?></p>
                            <p><strong>জন্ম তারিখ:</strong> <?= $member->birth_date ?></p>
                            <p><strong>মোবাইল:</strong> <?= $member->mobile_number ?></p>
                            <p><strong>ই-মেইল:</strong> <?= $member->email ?></p>
                            <p><strong>লিঙ্গ:</strong> <?= $member->gender ?></p>
                            <p><strong>গ্রাম:</strong> <?= $member->village ?></p>
                            <p><strong>ডাকঘর:</strong> <?= $member->post ?></p>
                            <p><strong>উপজেলা:</strong> <?= $member->sub_district ?></p>
                            <p><strong>জেলা:</strong> <?= $member->district ?></p>
                            <p><strong>সমিতিতে পদবী:</strong> <?= $member->association_designation ?></p>
                            <p><strong>সমিতি জেলা:</strong> <?= $member->association_district ?></p>
                            <p><strong>সমিতি নাম:</strong> <?= $member->association_name ?></p>
                            <p><strong>টাকার পরিমাণ:</strong> <?= $member->paid_amount ?></p>
                            <p><strong>রশিদ নম্বর:</strong> <?= $member->voucher_no ?></p>
                            <p><strong>ব্যবস্থাপনা কমিটির তারিখ:</strong> <?= $member->managing_committee_date ?></p>
                        </div>
                    </div>
                </div>

                <!-- Branch Info -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">সমবায় সংক্রান্ত তথ্য (Co-operative Info)</div>
                        <div class="card-body">

                            <p><strong>সমিতি নাম:</strong> <?= $member->Cooperative_association_name ?></p>
                            <p><strong>সমিতির মোবাইল:</strong> <?= $member->Cooperative_association_number ?></p>
                            <p><strong>নিবন্ধিত ঠিকানা:</strong> <?= $member->Cooperative_association_registration_address ?></p>
                            <p><strong>বর্তমান ঠিকানা:</strong> <?= $member->Cooperative_association_address ?></p>
                            <p><strong>সভাপতি:</strong> <?= $member->Cooperative_association_chairman ?></p>
                            <p><strong>সম্পাদক:</strong> <?= $member->Cooperative_association_secretary ?></p>
                            <p><strong>রেজিস্ট্রেশন নং:</strong> <?= $member->Cooperative_association_registration_no ?></p>
                            <p><strong>রেজিস্ট্রেশন তারিখ:</strong> <?= $member->Cooperative_association_registration_date ?></p>
                            <p><strong>সমিতির শ্রেনি:</strong> <?= $member->Cooperative_association_class ?></p>
                            <p><strong>টাইপ:</strong> <?= $member->Cooperative_association_type ?></p>
                            <p><strong>সমিতির সদস্য সংখ্যা:</strong> <?= $member->Cooperative_association_member_count ?></p>
                            <p><strong>সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা:</strong> <?= $member->Cooperative_association_working_area ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nominee & Documents -->
            <div class="row">
                <!-- Nominee -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark">Nominee Info</div>
                        <div class="card-body">
                            <p><strong>নমিনি নাম:</strong> <?= $member->nomini_name ?></p>
                            <p><strong>নমিনি পদবী:</strong> <?= $member->nomini_designation ?></p>
                            <p><strong>নমিনি মোবাইল:</strong> <?= $member->nomini_mobile_no ?></p>
                            <p><strong>নমিনি তারিখ:</strong> <?= $member->nomini_date ?></p>
                            <p><strong>নমিনি স্বাক্ষর:</strong><br>
                                <?php if ($member->nomini_sign): ?>
                                    <img src="<?= base_url('assets/uploads/project/members/nominee_sign/' . $member->nomini_sign) ?>"
                                        class="img-fluid" style="max-width:150px;">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Documents -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">Documents & Logo</div>
                        <div class="card-body">
                            <p><strong>Logo:</strong><br>
                                <?php if ($member->logo): ?>
                                    <img src="<?= base_url('assets/uploads/project/members/logo/' . $member->logo) ?>"
                                        class="img-fluid" style="max-width:150px;">
                                <?php else: ?>
                                    No Logo
                                <?php endif; ?>
                            </p>
                            <p><strong>Document:</strong><br>
                                <?php if ($member->document_1): ?>
                                    <a href="<?= base_url('assets/uploads/project/members/members_document/' . $member->document_1) ?>"
                                        target="_blank" class="btn btn-sm btn-primary">View PDF</a>
                                <?php else: ?>
                                    No Document
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>