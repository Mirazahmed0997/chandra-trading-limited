<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Design - Front & Back</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'SolaimanLipi', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .no-print-btn {
            margin-bottom: 20px;
        }

        .cards-wrapper {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }


       .wide-triangle {
            position: absolute;
            width: 470px;
            height: 187px;
            left: -75px;
            background: #12153D;
            clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
            transform: rotate(180deg);
            z-index:2;
        }

        .wide-triangle1 {
            width: 341px;
            height: 408px;
            background: #4388c7;
            clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
            transform: rotate(277deg);
            position: absolute;
            left: 58px;
            top: -105px;
        }
        .rectangle {
            width: 140px;
            height: 32px;
            background: #4388c7;
            transform: rotate(399deg);
            position: absolute;
            border-radius: 0 0 60px 0;
            left: -32px;
            top: 93px;
        }


        /* --- CARD COMMON BASE --- */
        .card-box {
            width: 320px;
            height: 507px;
            position: relative;
            background: #fff;
            /* border-radius: 12px; */
            border: 1px solid #4388c7;
            overflow: hidden;
        }

        .bg-shape {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            object-fit: cover;
        }

        .header{
            display:flex;
            flex-direction: column;
            
        }

        .logo {
            position: absolute;
            top: 9px;
            left: 118px;
            width: 88px;
            z-index: 2;
        }

        .header-title {
            position: absolute;
            top: 61px;
            left: 5px;
            width: 100%;
            z-index: 2;
            text-align: center;
        }

        .header-title h2 {
            font-size: 12.5px;
            /* font-weight: semi-bold; */
            color: #fff;
            margin: 0;
            /* line-height: 1.2; */
        }

        .header-title p {
            font-size: 9.5px;
            color: #fff;
            margin: 2px 0 0 0;
            font-weight: 600;
        }

        /* --- FRONT SIDE DESIGN --- */
        .user-photo {
            position: absolute;
            top: 100px;
            left: 90px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #fff;
            object-fit: cover;
            z-index: 2;
            border: 4px solid #4388C7;
        }

        .user-name {
            position: absolute;
            top: 250px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            z-index: 2;
        }
        .designation {
            position: absolute;
            top: 280px;
            width: 60%;
            text-align: center;
            font-size: 9px;
            font-weight: 700;
            z-index: 2;
            left: 60px;
        }
        .designation p{
            border: 2px solid #4388C7;
            border-radius:10px;
        }

        .details-table {
            position: absolute;
            top: 310px;
            left: 66px;
            width: 280px;
            z-index: 2;
        }

        .data-row {
            display: flex;
            /* margin-bottom: 8px; */
            font-size: 11px;
            font-weight: bold;
        }

        .data-label {
            width: 40%;
            color: black;
            text-align: left;
            font-size:10px;
        }

        .data-value {
            width: 60%;
            color: #000;
            text-align: left;
            background: #fff;
        }

        .footer-link {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* background: #4388c7; */
            color: #fff;
            text-align: center;
            font-size: 18px;
            z-index: 2;

            background: linear-gradient(
                    124deg,
                    #4388c7 0%,
                    #4388c7 70%,
                    #12153D 50%,
                    #12153D 100%
                );
        }
        .header-shape {
            position: absolute;
            top: 0;
            padding: 12px;
            width: 100%;
            color: #fff;
            text-align: center;
            font-size: 18px;
            z-index: 2;

            background: linear-gradient(
                     135deg,
                    #12153D 0%,
                    #12153D 30%,
                    #4388c7 0%,
                    #4388c7 55%
                );
        }
        

        /* --- BACK SIDE DESIGN --- */


        .header-title2 {
            position: absolute;
            top: 34px;
            left: 5px;
            width: 100%;
            z-index: 2;
            text-align: center;
        }

        .header-title2 h2 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .term-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 4px;
    }                                                                                                       

        .li-shape {
            display: block;
            width: 8px;
            height: 8px;
            background: #4388c7;
            transform: rotate(48deg);
            flex-shrink: 0;
        }

        .terms {
            font-size: 8.5px;
            font-weight: 700;
            line-height: 1.6;
            margin: 0;
        }

        .data-row1 {
            display: flex;
            /* margin-bottom: 8px; */
            /* font-size: 9px; */
            font-weight: bold;
        }

        .data-label1 {
            width: 40%;
            color: black;
            text-align: left;
            font-size:8.5px;
        }

        .data-value1 {
            width: 60%;
            color: #000;
            text-align: left;
            background: #fff;
            font-size:8px;
        }
        
        .term-divider {
            border: 0;
            border-top: 5px solid #4388c7;
            margin: 5px 0;
        }


        .back-details-table {
            position: absolute;
            top: 60px;
            left: 22px;
            width: 280px;
            z-index: 2;
        }

        .info {
            position: absolute;
            top: 155px;
        }

        .qr-code {
            position: absolute;
            bottom: 90px;
            left: 98px;
            width: 120px;
            height: 120px;
            z-index: 2;
            border: 1px solid #4388c7;
            border-radius: 10px;
            
        }

        .signature-container {
            position: absolute;
            bottom: 35px;
            right: 25px;
            text-align: center;
            z-index: 2;
        }

        .signature-img {
            height: 25px;
            margin-bottom: 2px;
        }

        .signature-text {
            font-size: 10px;
            font-weight: bold;
            color: #000;
            border-top: 1px solid #000;
            padding-top: 2px;
            margin: 0;
        }

        .footer-img {
            position: absolute;
            bottom: -32.8%;
            width: 44%;
            text-align: center;
            color: #fff;
            font-weight: 700;
            font-size: 2.8cqw;
            left: 372px;
        }

        /* --- PRINT ADJUSTMENTS ONLY --- */
        @media print {
            body {
                background: none;
                padding: 0;
                margin: 0;
            }

            .no-print-btn {
                display: none !important;
            }

            .cards-wrapper {
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                align-items: flex-start !important;
                gap: 20px !important;
                width: 100% !important;
            }

            .card-box {
                box-shadow: none !important;
                page-break-inside: avoid !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;

                margin-top: 42px !important;
            }

        .designation {
           
        }
        .designation p{
            padding-top:1px !important;
            border: 1px solid #4388C7 !important;
        }
        }
    </style>
</head>

<body>

    <div class="no-print-btn">
        <button class="btn btn-primary rounded-pill px-4" onclick="window.print()">
            <i class="bi bi-printer-fill me-2"></i> Print ID Cards
        </button>
    </div>

    <div class="cards-wrapper">

        <!-- FRONT SIDE -->
        <div class="card-box">
            <!-- <img class="bg-shape" src="./assets/uploads/shape1.png" alt="BG"> -->
             <div class="wide-triangle"></div>
             <div class="wide-triangle1"></div>
             <div class="rectangle"></div>
            <div class='header'>
                <div>
                    <img class="logo" src="./assets/uploads/33737.png" alt="Logo">
                </div>

                <div class="header-title">
                    <h2>চান্দ্রা শিক্ষিত বেকার যুব বহুমুখী সমবায় সমিতি লিঃ</h2>
                    <p>নিবন্ধন নম্বর : ৫২৭/২০০১, তারিখ : ১৭.০৬.২০০১ইং</p>
                </div>
            </div>

            <img class="user-photo" src="./assets/uploads/miraz.png" alt="User Photo">
            <div class="user-name">মিরাজ আহমেদ</div>

            <div class="designation">
                <p>ব্যবস্থাপক (আইটি)</p>
            </div>

            <div class="details-table">
                <div class="data-row">
                    <div class="data-label">আইডি নং</div>
                    <div class="data-value">:  ১৫০০</div>
                </div>
                <div class="data-row">
                    <div class="data-label">যোগদান</div>
                    <div class="data-value">:  ০১/০৬/২৬</div>
                </div>
               
                <div class="data-row">
                    <div class="data-label">ইস্যু</div>
                    <div class="data-value">:  ০১/০৬/২৬</div>
                </div>
                <div class="data-row">
                    <div class="data-label">মেয়াদ উত্তীর্ণ</div>
                    <div class="data-value">:  ০১/০৬/২৬</div>
                </div>
                <div class="data-row">
                    <div class="data-label">রক্তের গ্রুপ</div>
                    <div class="data-value">:  AB+</div>
                </div>
            </div>

             <div class="signature-container">
                <img class="signature-img" src="./assets/uploads/sign2.png" alt="Signature">
                <p class="signature-text">অনুমোদনকারীর স্বাক্ষর</p>
            </div>

            <div class="footer-link">
               🌐 https://chandracoop.com/
            </div>
        </div>




        <!-- BACK SIDE -->
        <div class="card-box">
            <div class="header-shape">
               <!-- 🌐 https://chandracoop.com/ -->
            </div>
            <!-- <img class="bg-shape" src="./assets/uploads/shape2.png" alt="BG"> -->
           
            <div class="header-title2">
                    <h2>Terms & Conditions</h2>
            </div>



            <div class="back-details-table">

                

            <div class="term-item">
                <span class="li-shape"></span>
                <span class="terms">এই কার্ডটি চান্দ্রা শিক্ষিত বেকার যুব বহুমুখী সমবায় সমিতি লিমিটেড - এর অফিসিয়াল পরিচয়পত্র । এটি হস্তান্তর যোগ্য নয় ।</span>
            </div>

            <div class="term-item">
                <span class="li-shape"></span>
                <span class="terms">অফিস চলাকালীন সময়ে কার্ডটি অবশ্যই দৃশ্যমানভাবে বহন করতে হবে ।</span>
            </div>

            <div class="term-item">
                <span class="li-shape"></span>
                <span class="terms">কার্ডটি হারিয়ে গেলে বা ক্ষতিগ্রস্থ হলে তাৎক্ষণিকভাবে কর্তৃপক্ষকে অবহিত করতে হবে।</span>
            </div>

            <div class="term-item">
                <span class="li-shape"></span>
                <span class="terms">চাকরি থেকে অব্যহতি বা পদত্যাগের ক্ষেত্রে কার্ডটি অবশ্যই কর্তৃপক্ষের নিকট ফেরত দিতে হবে ।</span>
            </div>

            <hr class="term-divider">

                

               <div class="info">
                 <div class="data-row1">
                    <div class="data-label1">ঠিকানা </div> 
                    <div class="data-value1">: চান্দ্রা শিক্ষিত বেকার যুব বহুমুখী সমবায় <span style="font-size: 8px; margin-left: 4px;">
                        সমিতি লি. চান্দ্রা বাজার, ফরিদগঞ্জ, চাঁদপুর
                    </span></div>
                </div>
                <div class="data-row1">
                    <div class="data-label1">ই-মেইল </div>
                    <div class="data-value1">: chandraweb@gmail.com</div>
                </div>
                <div class="data-row1">
                    <div class="data-label1">জরুরি যোগাযোগ </div>
                    <div class="data-value1">: ০১৮৩৩ ৩৩৩৫৯৫</div>
                </div>
               </div>
                
            </div>

            <img class="qr-code" src="./assets/uploads/QR.png" alt="QR Code">

           
        </div>

         <div>
            <img class='footer-img' src="./assets/uploads/footer.png" alt="">
        </div>

    </div>

</body>
</html>