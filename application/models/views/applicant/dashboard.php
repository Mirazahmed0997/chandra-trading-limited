<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">










            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p>মোট সদস্য</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p>সদস্য প্রত্যাহার তালিকা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p>বিদ্যমান সদস্য তালিকা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p> বিনিয়োগ গ্রহণ সদস্য</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p>বিনিয়োগ বকেয়া সংখ্যা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                            
                            <?= !empty($member_count) ? $member_count : 0; ?>
                            </h3>
                            <p> বিনিয়োগ খেলাপি সংখ্যা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>Applicant/members_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               

              
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->