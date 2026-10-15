<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Select Language</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #f0fdf4,
                    #eff6ff
                );

            font-family:
                "Segoe UI",
                Arial,
                sans-serif;
        }

        .language-card {

            width: 90%;
            max-width: 550px;

            background: #fff;

            border-radius: 20px;

            padding: 50px 35px;

            text-align: center;

            box-shadow:
                0 20px 60px
                rgba(0, 0, 0, 0.12);
        }

        .logo {

            width: 100px;
            height: 100px;

            object-fit: contain;

            margin-bottom: 20px;
        }

        .language-btn {

            display: block;

            padding: 18px;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            text-decoration: none;

            color: #1f2937;

            font-size: 18px;

            font-weight: 600;

            transition: all .2s ease;
        }

        .language-btn:hover {

            transform: translateY(-3px);

            border-color: #1b7b43;

            background: #f0fdf4;

            color: #1b7b43;
        }

    </style>

</head>

<body>

<div class="language-card">

    <img
        src="<?= base_url('assets/images/logo.png'); ?>"
        class="logo"
        alt="Company Logo"
    >

    <h2 class="fw-bold mb-2">
        Welcome / স্বাগতম
    </h2>

    <p class="text-muted mb-4">
        Please select your preferred language
        <br>
        আপনার পছন্দের ভাষা নির্বাচন করুন
    </p>

    <div class="row g-3">

        <div class="col-md-6">

            <a
                href="<?= site_url('language/set/bangla'); ?>"
                class="language-btn"
            >
                🇧🇩 বাংলা
            </a>

        </div>

        <div class="col-md-6">

            <a
                href="<?= site_url('language/set/english'); ?>"
                class="language-btn"
            >
                🇬🇧 English
            </a>

        </div>

    </div>

</div>

</body>

</html>