<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ID Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #efefef;
        font-family: 'SolaimanLipi', sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .controls {
        margin-bottom: 20px;
        text-align: center;
    }

    .btn-print {
        background-color: #12153d;
        color: #ffffff;
        border: none;
        padding: 10px 24px;
        font-size: 16px;
        border-radius: 25px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(18, 21, 61, 0.25);
        transition: all 0.2s ease;
    }

    .btn-print:hover {
        background-color: #1d4f8d;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(29, 79, 141, 0.35);
    }

    .card-wrapper {
        width: 100%;
        max-width: 450px; 
        container-type: inline-size;
    }

    .id-card {
        width: 100%;
        aspect-ratio: 1 / 1.586;
        background: #fff;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.18);
        border-radius: 12px;
    }

    .card-bg-img {
        position: absolute;
        top: -36px;
        left: -430px;
        width: 295%;
        height: 138%;
        object-fit: cover;
        z-index: 1;
    }
    .card-bg-img2 {
        position: absolute;
        top: -45px;
        left: -405px;
        width: 284%;
        height: 145%;
        object-fit: cover;
        z-index: 1;
    }

    .top-header {
        position: relative;
        z-index: 10;
        padding: 4cqw 4cqw 0 4cqw;
    }

    /* .logo {
        width: 30%;
        position: relative;
        z-index: 10;
        top: 39px;
    }
    .header {
        color: black;
        font-size: 5.8cqw;
        font-weight: 700;
        margin-top: 0.5cqw;
        position: absolute;
        top: 116px;
        left: 31px;
    }

    .company-name {
        color: black;
        font-size: 3.4cqw;
        font-weight: 600;
        margin-top: 0.5cqw;
        position: relative;
        z-index: 10;
        line-height: 1.2;
    }

    .company-sub {
        color: black;
        margin-top: 1cqw;
        font-size: 2.6cqw;
        position: relative;
        z-index: 10;
    } */


        /* ---------------------------------- */

     .logo {
    width: 25%;
    position: relative;
    z-index: 10;
    top: 72px;
    right: 14px;
}

  .header {
    color: black;
    font-size: 2.8cqw;
    font-weight: 700;
    margin-top: 0.5cqw;
    position: absolute;
    top: 98px;
    left: 59px;
}


    .company-name {
    color: black;
    font-size: 3.2cqw;
    font-weight: 600;
    margin-top: 0.5cqw;
    position: relative;
    z-index: 10;
    line-height: 1.2;
}


    .company-sub {
    color: black;
    margin-top: 1cqw;
    font-size: 2.4cqw;
    position: relative;
    z-index: 10;
}

    .photo-wrapper {
        position: absolute;
        width: 100%;
        top: 34%;
        text-align: center;
        z-index: 30;
    }

    .photo-circle {
        width: 40cqw;
        height: 40cqw;
        margin: auto;
        border-radius: 50%;
        border: 1.8cqw solid #fff;
        overflow: hidden;
        background: #ddd;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .photo-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .member-name {
        position: absolute;
        top: 57%;
        left: 0;
        width: 100%;
        text-align: center;
        color: #12153d;
        font-size: 5cqw;
        font-weight: 700;
        line-height: 1.1;
        z-index: 35;
    }

    .info-area {
        position: absolute;
        top: 63%;
        left: 8%;
        width: 84%;
        z-index: 35;
    }

    .info-area .row {
        margin-bottom: 1.5cqw;
    }

    .label-box {
        background: #2E6733;
        color: #fff;
        padding: 1.2cqw 2cqw;
        border-radius: 20px;
        font-size: 2.8cqw;
        font-weight: 700;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .value-box {
        background: #ffffff;
        border: 0.35cqw solid #2E6733;
        border-radius: 20px;
        padding: 1.2cqw 2cqw;
        font-size: 2.8cqw;
        font-weight: 700;
        color: #222;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        background: #4388c7;
        color: #fff;
        font-weight: 700;
        font-size: 2.8cqw;
        padding: 1cqw 0;
        z-index: 10;
    }

    @media print {
        @page {
            size: A4;
            margin: 0;
        }

        html, body {
            background: none !important;
            padding: 0 !important;
            margin: 0 !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            min-height: 100vh !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* .header {
            
            margin-top: none !important;
            position: absolute;
            top: 85px !important;
            left: 10px !important;
        } */
        .header {
            
            margin-top: none !important;
            position: absolute;
            top: 70px !important;
            left: 40px !important;
        }

          .logo {
            top: 58px !important;
            right: 8px !important;
        }

        .controls {
            display: none !important;
        }

        .card-wrapper {
            width: 2.2in !important;
            height: 3.3in !important; 
            max-width: none !important;
            transform: none !important;
        }

        .id-card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            page-break-inside: avoid;
        }

        .card-bg-img {
            position: absolute !important;
            top: -18px !important;
            left: -245px !important;
            width: 295% !important;
            height: 138% !important;
            object-fit: cover !important;
            z-index: 1 !important;
        }

        .card-bg-img2 {
            position: absolute !important;
            top: -30px !important;
            left: -250px !important;
            width: 300% !important;
            height: 145% !important;
            object-fit: cover !important;
            z-index: 1 !important;
        }
    }
</style>
</head>

<body>

    <div class="controls">
        <button class="btn-print" onclick="window.print()">
            <i class="bi bi-printer-fill"></i> Print ID Card
        </button>
    </div>

    <div class="card-wrapper">
        <div class="id-card">

            <img class="card-bg-img" src="./assets/uploads/shape1.png" alt="Card Design Background">

            <div class="top-header">
                <div class="row align-items-center g-1">
                    <div class="col-2 logo">
                        <img src="./assets/uploads/33737.png" class="img-fluid" alt="Logo">
                    </div>
                    <div class="col-10 text-center header">
                        <h1 class="company-name">
                            চান্দ্রা শিক্ষিত বেকার যুব বহুমুখী সমবায় সমিতি লিঃ
                        </h1>
                        <h6 class="company-sub">
                            নিবন্ধন নম্বর : ৫২৭/২০০১, তারিখ : ১৭.০৬.২০০১ইং
                        </h6>
                    </div>
                </div>
            </div>

            <div class="photo-wrapper">
                <div class="photo-circle">
                    <img src="./assets/uploads/miraz.png" alt="Member Photo">
                </div>
            </div>

            <!-- <div class="member-name">
                মিরাজ আহমেদ
            </div> -->

            <div class="info-area">
                <div class="row g-2">
                    <div class="col-5">
                        <div class="label-box">
                            আইডি নং:
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="value-box">
                            ১৫০০
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="label-box">
                            যোগদানের তারিখ :
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="value-box">
                            ০১/০৬/২৬
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="label-box">
                            মোবাইল :
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="value-box">
                            ০১৮৩৩ ৩৩৩৫৯৫
                        </div>
                    </div>
                </div>
            </div>

            <img class="card-bg-img2" src="./assets/uploads/shape2.png" alt="Card Design Background">

            <!-- <footer class="footer">
                <i class="bi bi-globe2"></i> https://chandracoop.com/
            </footer> -->

        </div>
    </div>

</body>
</html>