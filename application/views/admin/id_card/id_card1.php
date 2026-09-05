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

        img{
            width: 200px;
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

        .top-header {
            height: 31%;
            background: #12153d;
            position: relative;
            overflow: hidden;
            padding: 4cqw 5cqw;
        }

        .top-header::before {
            content: "";
            position: absolute;
            right: -60%;
            top: 25%;
            width: 90%;
            height: 180%;
            background: #4388c7;
            transform: rotate(-25deg);
        }

        .top-header::after {
            content: "";
            position: absolute;
            left: -10%;
            bottom: 43%;
            width: 45%;
            height: 14%;
            background: #4388c7;
            border-radius: 0 0 60px 0;
            transform: rotate(24deg);
            z-index: 4;
        }

        .id-card::before {
            content: "";
            position: absolute;
            top: 15%;
            left: -32%;
            width: 60%;
            height: 100%;
            background: #fff;
            transform: rotate(197deg);
            z-index: 2;
        }

        .id-card::after {
            content: "";
            position: absolute;
            top: 28%;
            left: 35%;
            width: 60%;
            height: 100%;
            background: #fff;
            transform: rotate(190deg);
            z-index: 2;
        }

        .logo {
            width: 18cqw;
            position: relative;
            z-index: 10;
        }

        .company-name {
            color: #fff;
            font-size: 3.2cqw;
            font-weight: 700;
            margin-top: 0.5cqw;
            position: relative;
            z-index: 10;
            line-height: 1.2;
        }

        .company-sub {
            color: #fff;
            margin-top: 1.5cqw;
            font-size: 2.5cqw;
            position: relative;
            z-index: 10;
        }

        .photo-wrapper {
            position: absolute;
            width: 100%;
            top: 14%;
            text-align: center;
            z-index: 30;
        }

        .photo-circle {
            width: 41cqw;
            height: 41cqw;
            margin: auto;
            border-radius: 50%;
            border: 1.9cqw solid #fff;
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
            top: 45%;
            left: 0;
            width: 100%;
            text-align: center;
            color: #12153d;
            font-size: 5.8cqw;
            font-weight: 700;
            line-height: 1.1;
            z-index: 35;
        }

        .designation {
            position: absolute;
            top: 56.5%;
            left: 50%;
            transform: translateX(-50%);
            width: 82%;
            padding: 1cqw 1.5cqw;
            border-radius: 20px;
            background: #4388c7;
            color: #fff;
            text-align: center;
            font-size: 2.8cqw;
            font-weight: 500;
            z-index: 35;
            box-shadow: 0 4px 12px rgba(67, 136, 199, 0.22);
        }

        .designation p {
            margin: 0;
        }

        .info-area {
            position: absolute;
            top: 55.5%;
            left: 8%;
            width: 84%;
            z-index: 35;
        }

        .info-area .row {
            margin-bottom: 2cqw;
        }

        .label-box {
            background: #1d4f8d;
            color: #fff;
            padding: 1.2cqw 2cqw;
            border-radius: 20px;
            font-size: 3cqw;
            font-weight: 700;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .value-box {
            background: #ffffff;
            border: 0.35cqw solid #1d4f8d;
            border-radius: 20px;
            padding: 1.2cqw 2cqw;
            font-size: 3cqw;
            font-weight: 700;
            color: #222;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .bottom-design {
            position: absolute;
            bottom: 6%;
            left: 0;
            width: 100%;
            height: 18%;
            overflow: hidden;
        }

        .bottom-blue {
            width: 87%;
            height: 142%;
            background: #4388c7;
            border-radius: 0 20px 20px 0;
            z-index: 8;
            position: absolute;
            transform: rotate(-35deg);
            top: 94%;
            left: -28%;
        }


       .bottom-navy {
            width: 97%;
            height: 131%;
            background: #12153D;
            border-radius: 0 20px 20px 0;
            z-index: 7;
            position: absolute;
            transform: rotate(-33deg);
            top: 109%;
            left: 2%;
        }
            
        .footer {
            position: absolute;
            bottom: 1.8%;
            width: 100%;
            text-align: center;
            background: #4388c7;
            color: #fff;
            font-weight: 700;
            font-size: 2.8cqw;
            z-index: 5;
        }

        .footer {
            position: absolute;
            bottom: 0.01%;
            width: 100%;
            text-align: center;
            background: #4388c7;
            color: #fff;
            font-weight: 700;
            font-size: 2.8cqw;
            z-index: 5;
        }
        .footer-img {
            position: absolute;
            bottom: -36.8%;
            width: 103%;
            text-align: center;
            color: #fff;
            font-weight: 700;
            font-size: 2.8cqw;
            z-index: 5;
            left: 2px;
        }

        

        

        @media print {
    @page {
        size: A4;
        margin: 0;
    }

    body {
        background: none !important;
        padding: 0 !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .controls {
        display: none !important;
    }

    
    .card-wrapper {
        width: 2.2in !important;
        height: 3.3in !important;
        max-width: none !important;
        transform: scale(1.2); 
        transform-origin: center center;
        
    }

    .id-card {
        box-shadow: none !important;
        border:1px solid black !important;
    }

    .company-name {
            font-size: 3cqw !important;
         
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

    <div class="card-wrapper ">
        <div class="id-card">

            <div class="top-header">
                <div class="row align-items-start g-1">
                    <div class="col-2">
                        <img src="./assets/uploads/33737.png" class="logo img-fluid" alt="Logo" >
                    </div>
                    <div class="col-10 text-center">
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

            <div class="member-name">
                মিরাজ আহমেদ
            </div>

            <!-- <div class="designation">
                <p>সহকারী ব্যবস্থাপক (গ্রাফিক্স ডিজাইনার)</p>
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

           <!-- <div class="bottom-design">
                <div class="bottom-blue"></div>
                <div class="bottom-navy"></div>
            </div> -->

            <div>
                <img class='footer-img' src="./assets/uploads/footer.png" alt="">
            </div>


            <footer class="footer">
                <i class="bi bi-globe2"></i> https://chandracoop.com/
            </footer>

        </div>
    </div>

</body>
</html>