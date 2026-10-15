<div class="news-container">

    <?php if (!empty($news)): ?>

        <div class="news-card">

            <!-- Headline -->
            <h1 class="news-title">
                <?= $news['headline']; ?>
            </h1>

            <!-- Meta Info -->
            <div class="news-meta">
                <span class="author">
                    <i class="fa fa-user"></i>
                    <?= $news['posted_by']; ?>
                </span>

                <span class="date">
                    <i class="fa fa-calendar"></i>
                    <?= date('F d, Y', strtotime($news['created_at'])); ?>
                </span>
            </div>

            <!-- Divider -->
            <hr>

            <!-- Details -->
            <div class="news-content">
                <?= nl2br($news['details']); ?>
            </div>

        </div>

    <?php else: ?>
        <p class="no-news">No news found</p>
    <?php endif; ?>

</div>


<style>
    .news-container {
        
        /* margin: 40px auto; */
        padding: 20px;
        background: linear-gradient(90deg, #32aaba, #feb47b)
    }

    .news-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .news-card:hover {
        transform: translateY(-3px);
    }

    .news-title {
        font-size: 28px;
        font-weight: 700;
        color: #222;
        margin-bottom: 15px;
    }

    .news-meta {
        display: flex;
        gap: 20px;
        font-size: 14px;
        color: #777;
        margin-bottom: 15px;
    }

    .news-meta i {
        margin-right: 5px;
        color: #32aaba;
    }

    .news-content {
        font-size: 16px;
        line-height: 1.8;
        color: #444;
        margin-top: 15px;
    }

    .no-news {
        text-align: center;
        color: red;
        font-weight: bold;
    }
</style>