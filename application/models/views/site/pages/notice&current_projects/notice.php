<?php
$notices = $this->db->order_by('created_at', 'DESC')
                 ->where('status', 1)
                 ->get('notices')
                 ->result_array();
?>



<div class="notice-board">
    <h3><i class="fas fa-bullhorn"></i> নোটিশ বোর্ড</h3>
    <div class="notice-ticker-container">
        <ul class="scrolling-notices">
           
             <?php if (!empty($notices)): ?>
                        <?php foreach ($notices as $row): ?>
                            
                            <li><i class="fas fa-angle-right nav-icon"></i>
                               
                                <a style="font-size: 12px;" href="<?= base_url('notice_details/' . $row['id']); ?>" class="dashed-link"> <?= $row['headline'] ?><span style="font-size: 10px;">...বিস্তারিত</span></a>
                                <span style="font-size: 10px; color: brown;"><?= date('Y-m-d', strtotime($row['created_at'])); ?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No news available</li>
                    <?php endif; ?>
        </ul>
    </div>
    <a href="#" class="view-all">সকল নোটিশসমূহ</a>
</div>

<style>
    .notice-ticker-container{
        width: 100%;
        height: 250px;
    }
    .notice-board a {
        border-bottom: 1px solid black;
        font-weight: bold;
    }
</style>