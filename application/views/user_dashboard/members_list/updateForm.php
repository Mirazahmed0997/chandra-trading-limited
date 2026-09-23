<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">
                        <i class="fas fa-user-edit"></i> সদস্য পদের আবেদন ফরম (Update)
                    </h3>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('Site/update_member/' . $member->id); ?>" method="POST"
                        enctype="multipart/form-data" onsubmit="return validatePassword()">


                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>স্মারক নং</label>
                                <input type="text" class="form-control" name="sarok_no"
                                    value="<?= $member->sarok_no ?>">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>তারিখ</label>
                                <input type="date" class="form-control" name="sarok_date"
                                    value="<?= $member->sarok_date ?>">
                            </div>

                        </div>


                        <!-- authentication Info -->
                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>মোবাইল নম্বর</label>
                                <input type="text" class="form-control" name="mobile_number"
                                    value="<?= $member->mobile_number ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>ই-মেইল</label>
                                <input type="text" class="form-control" name="email"
                                    value="<?= $member->email ?>">
                            </div>


                            <div class="col-md-4 form-group">
                                <label class="text-green">পাসওয়ার্ড পরিবর্তন করুন</label>
                                <div style="position:relative;">
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="<?= $member->password ?>">

                                    <i class="fa fa-eye" onclick="togglePassword('password', this)"
                                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                    </i>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="text-green">কন্ফার্ম পাসওয়ার্ড</label>
                                <div style="position:relative;">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control" value="<?= $member->password ?>">

                                    <i class="fa fa-eye" onclick="togglePassword('confirm_password', this)"
                                        style="position:absolute; right:10px; top:10px; cursor:pointer;">
                                    </i>
                                </div>
                            </div>

                        </div>


                        <!-- Personal Information -->
                        <h5 class="mt-4 mb-3 text-primary">১. ব্যক্তিগত তথ্য</h5>

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>নাম</label>
                                <input type="text" class="form-control" name="name" value="<?= $member->name ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>পিতা</label>
                                <input type="text" class="form-control" name="father_name"
                                    value="<?= $member->father_name ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>মাতা</label>
                                <input type="text" class="form-control" name="mother_name"
                                    value="<?= $member->mother_name ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>NID</label>
                                <input type="number" class="form-control" name="nid" value="<?= $member->nid ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>জন্ম তারিখ</label>
                                <input type="date" class="form-control" name="birth_date"
                                    value="<?= $member->birth_date ?>">
                            </div>



                            <!-- <div class="col-md-4 form-group">
                                <label>মোবাইল নম্বর</label>
                                <input type="text" class="form-control" name="mobile_number"
                                    value="<?= $member->mobile_number ?>">
                            </div> -->


                            <div class="col-md-4 form-group">
                                <label>লিঙ্গ</label>
                                <select class="form-control" name="gender">
                                    <option value="">নির্বাচন করুন</option>

                                    <option value="পুরুষ" <?= ($member->gender == 'পুরুষ') ? 'selected' : '' ?>>
                                        পুরুষ
                                    </option>

                                    <option value="মহিলা" <?= ($member->gender == 'মহিলা') ? 'selected' : '' ?>>
                                        মহিলা
                                    </option>

                                    <option value="অন্যান্য" <?= ($member->gender == 'অন্যান্য') ? 'selected' : '' ?>>
                                        অন্যান্য
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>গ্রাম</label>
                                <input type="text" class="form-control" name="village" value="<?= $member->village ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>ডাকঘর</label>
                                <input type="text" class="form-control" name="post" value="<?= $member->post ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>উপজেলা</label>
                                <input type="text" class="form-control" name="sub_district"
                                    value="<?= $member->sub_district ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>জেলা</label>
                                <input type="text" class="form-control" name="district"
                                    value="<?= $member->district ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>সমিতিতে পদবি </label>
                                <input type="text" class="form-control" name="association_designation"
                                    value="<?= $member->association_designation ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>সমিতি জেলা</label>
                                <input type="text" class="form-control" name="association_district"
                                    value="<?= $member->association_district ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>সমিতি নাম</label>
                                <input type="text" class="form-control" name="association_name"
                                    value="<?= $member->association_name ?>">
                            </div>


                            <div class="col-md-4 form-group">
                                <label>টাকার পরিমাণ</label>
                                <input type="text" class="form-control" name="paid_amount"
                                    value="<?= $member->paid_amount ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>রশিদ নম্বর</label>
                                <input type="text" class="form-control" name="voucher_no"
                                    value="<?= $member->voucher_no ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>ব্যবস্থাপনা কমিটির তারিখ</label>
                                <input type="date" class="form-control" name="managing_committee_date"
                                    value="<?= $member->managing_committee_date ?>">
                            </div>

                        </div>


                        <!-- Cooperative -->
                        <h5 class="mt-4 mb-3 text-success">২. সমবায় সংক্রান্ত তথ্য</h5>

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>সমিতির নাম</label>
                                <input type="text" class="form-control" name="Cooperative_association_name"
                                    value="<?= $member->Cooperative_association_name ?>">
                            </div>



                            <div class="col-md-4 form-group">
                                <label>মোবাইল</label>
                                <input type="text" class="form-control" name="Cooperative_association_number"
                                    value="<?= $member->Cooperative_association_number ?>">
                            </div>




                            <div class="col-md-4 form-group">
                                <label>সভাপতি</label>
                                <input type="text" class="form-control" name="Cooperative_association_chairman"
                                    value="<?= $member->Cooperative_association_chairman ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>সম্পাদক</label>
                                <input type="text" class="form-control" name="Cooperative_association_secretary"
                                    value="<?= $member->Cooperative_association_secretary ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>রেজিস্ট্রেশন নং</label>
                                <input type="text" class="form-control" name="Cooperative_association_registration_no"
                                    value="<?= $member->Cooperative_association_registration_no ?>">
                            </div>


                            <div class="col-md-4 form-group">
                                <label>নিবন্ধিত ঠিকানা</label>
                                <input type="text" class="form-control"
                                    name="Cooperative_association_registration_address"
                                    value="<?= $member->Cooperative_association_registration_address ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>বর্তমান ঠিকানা</label>
                                <input type="text" class="form-control" name="Cooperative_association_address"
                                    value="<?= $member->Cooperative_association_address ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>সমিতির শ্রেনি</label>
                                <input type="text" class="form-control" name="Cooperative_association_class"
                                    value="<?= $member->Cooperative_association_class ?>">
                            </div>


                            <div class="col-md-4 form-group">
                                <label>টাইপ</label>
                                <select class="form-control" name="Cooperative_association_type">
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="প্রাথমিক" <?= $member->Cooperative_association_type == 'initial' ? 'selected' : '' ?>>প্রাথমিক</option>
                                    <option value="কেন্দ্রীয়" <?= $member->Cooperative_association_type == 'central' ? 'selected' : '' ?>>কেন্দ্রীয়
                                    </option>
                                    <option value="জাতীয়" <?= $member->Cooperative_association_type == 'national' ? 'selected' : '' ?>>জাতীয়
                                    </option>
                                </select>
                            </div>



                            <div class="col-md-4 form-group">
                                <label>সমিতির সদস্য সংখ্যা</label>
                                <input type="text" class="form-control" name="Cooperative_association_member_count"
                                    value="<?= $member->Cooperative_association_member_count ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>সমিতির সদস্য নির্বাচনী ও কর্ম এলাকা</label>
                                <input type="text" class="form-control" name="Cooperative_association_working_area"
                                    value="<?= $member->Cooperative_association_working_area ?>">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>রেজিস্ট্রেশন তারিখ</label>
                                <input type="date" class="form-control" name="Cooperative_association_registration_date"
                                    value="<?= $member->Cooperative_association_registration_date ?>">
                            </div>


                        </div>


                        <!-- Nominee -->
                        <h5 class="mt-4 mb-3 text-warning">৩. মনোনীত সদস্য তথ্য</h5>

                        <div class="row">

                            <div class="col-md-3 form-group">
                                <label>নাম</label>
                                <input type="text" class="form-control" name="nomini_name"
                                    value="<?= $member->nomini_name ?>">
                            </div>

                            <div class="col-md-3 form-group">
                                <label>পদবী</label>
                                <input type="text" class="form-control" name="nomini_designation"
                                    value="<?= $member->nomini_designation ?>">
                            </div>

                            <div class="col-md-3 form-group">
                                <label>মোবাইল</label>
                                <input type="text" class="form-control" name="nomini_mobile_no"
                                    value="<?= $member->nomini_mobile_no ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>তারিখ</label>
                                <input type="date" class="form-control" name="nomini_date"
                                    value="<?= $member->nomini_date ?>">
                            </div>

                            <div class="col-md-3 form-group">
                                <label>স্বাক্ষর</label>
                                <input type="file" class="form-control" name="nomini_sign">

                                <?php if ($member->nomini_sign): ?>
                                    <img src="<?= base_url('assets/uploads/project/members/nominee_sign/' . $member->nomini_sign) ?>"
                                        width="60">
                                <?php endif; ?>

                            </div>

                        </div>


                        <!-- Documents -->
                        <h5 class="mt-4 mb-3 text-danger">৪. ডকুমেন্ট</h5>

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>লোগো</label>
                                <input type="file" class="form-control" name="logo">

                                <?php if ($member->logo): ?>
                                    <img src="<?= base_url('assets/uploads/project/members/logo/' . $member->logo) ?>"
                                        width="60">
                                <?php endif; ?>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>PDF</label>
                                <input type="file" class="form-control" name="document_1">

                                <?php if ($member->document_1): ?>
                                    <a target="_blank"
                                        href="<?= base_url('assets/uploads/project/members/members_document/' . $member->document_1) ?>">View</a>
                                <?php endif; ?>

                            </div>

                        </div>

        <!-- ----------------------- addmission issuer data-------------------- -->

                        <h5 class="mt-4 mb-3 text-danger">৫. ভর্তি ইস্যুকারী তথ্য</h5>

                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>ভর্তি ইস্যুকারী স্বাক্ষর</label>
                                <input type="file" class="form-control" name="Admission_Issuer_sign">

                                <?php if ($member->logo): ?>
                                    <img src="<?= base_url('/assets/uploads/project/members/admission_issuer_sign/' . $member->Admission_Issuer_sign) ?>"
                                        width="60">
                                <?php endif; ?>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>পদবী</label>
                                <input type="text" class="form-control" name="Admission_Issuer_designation"
                                    value="<?= $member->Admission_Issuer_designation ?>">
                            </div>

                             <div class="col-md-4 form-group">
                                <label>ইস্যুর তারিখ</label>
                                <input type="date" class="form-control" name="Admission_Issue_date"
                                    value="<?= $member->Admission_Issue_date ?>">
                            </div>

                        </div>


                        <div class="text-right mt-4">
                            <button class="btn btn-success btn-lg">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>

<script>
    function validatePassword() {

        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("পাসওয়ার্ড কমপক্ষে ৮ ডিজিট হতে হবে");
            return false;
        }
        if (password !== confirmPassword) {
            alert("পাসওয়ার্ড মিলছে না!");
            return false;
        }


        return true;
    }


    function togglePassword(fieldId, icon) {

        var input = document.getElementById(fieldId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }

    }

</script>