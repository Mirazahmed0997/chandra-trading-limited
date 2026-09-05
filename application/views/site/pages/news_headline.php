<?php
$news = $this->db->order_by('created_at', 'DESC')
                 ->where('status', 1)
                 ->get('news')
                 ->result_array();
?>

<section class="news-ticker">
    <div class="container">
        <div class="ticker-wrapper">
            <div class="ticker-title">
                <span>Update News</span>
            </div>

            <div class="ticker-content">
                <ul class="ticker-list">

                    <?php if (!empty($news)): ?>
                        <?php foreach ($news as $row): ?>
                            <li>
                                <?= $row['headline'] ?>...
                                <a href="<?= base_url('news_details/' . $row['id']); ?>" class="dashed-link">Details</a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No news available</li>
                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </div>
</section>

<style>
    .news-ticker {
        background: #32aaba;
        padding: 10px 0;
        overflow: hidden;
        position: relative;

    }

    .dashed-link {
        text-decoration: none;
        border-bottom: 1px solid #000;
        color: #000;
        padding-bottom: 2px;
        transition: color 0.3s;
    }

    .dashed-link:hover {
        color: #007bff;
        border-bottom-color: #007bff;
    }

    .ticker-wrapper {
        display: flex;
        align-items: center;
    }

    .ticker-title {
        font-weight: bold;
        padding-right: 20px;
    }

    .ticker-content {
        overflow: hidden;
        flex: 1;
        height: 24px;
        /* adjust based on font-size */
        position: relative;
    }

    .ticker-list {
        list-style: none;
        padding: 0;
        margin: 0;
        position: absolute;
        top: 0;
    }

    .ticker-list li {
        height: 24px;
        line-height: 24px;
        white-space: nowrap;
        color: black;
    }
    .ticker-list li a{
       font-weight: 700;
    }
</style>


<!-- <style>
   .news-ticker {
    background: #f5f5f5;
    padding: 10px 0;
    overflow: hidden;
    position: relative;
}

.ticker-wrapper {
    display: flex;
    align-items: center;
}

.ticker-title {
    font-weight: bold;
    padding-right: 20px;
}

.ticker-content {
    overflow: hidden;
    flex: 1;
    position: relative;
}

.ticker-move {
    display: inline-block;
    white-space: nowrap;
    animation: scroll-left 30s linear infinite;
}

.ticker-move span {
    display: inline-block;
    padding: 0 10px; /* space between items */
}

/* Animation */
@keyframes scroll-left {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}
</style> -->


<script>
    const tickerList = document.querySelector('.ticker-list');
    const items = tickerList.querySelectorAll('li');
    let index = 0;

    function showNextTicker() {
        const itemHeight = items[0].offsetHeight;
        index++;
        if (index >= items.length) index = 0;
        tickerList.style.transition = 'transform 0.5s';
        tickerList.style.transform = `translateY(-${itemHeight * index}px)`;
    }

    setInterval(showNextTicker, 3000);
</script>