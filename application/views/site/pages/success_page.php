<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations Card</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- canvas-confetti library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1.25rem;
            color: #1e293b;
        }

        /* Minimalist Modern Card Setup */
        .congrats-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.07), 0 10px 20px -10px rgba(0, 0, 0, 0.04);
            max-width: 440px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .congrats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 45px -15px rgba(0, 0, 0, 0.1), 0 12px 22px -10px rgba(0, 0, 0, 0.05);
        }

        /* Animated Icon Wrapper */
        .icon-circle {
            width: 80px;
            height: 80px;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.25rem;
            margin-bottom: 1.5rem;
            animation: scaleIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Custom Buttons */
        .btn-primary-custom {
            background-color: #0f172a;
            color: #ffffff;
            border: none;
            font-weight: 500;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover,
        .btn-primary-custom:focus {
            background-color: #1e293b;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-outline-custom {
            background-color: transparent;
            color: #64748b;
            border: 1px solid #cbd5e1;
            font-weight: 500;
            border-radius: 0.75rem;
            padding: 0.75rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-outline-custom:hover {
            background-color: #f8fafc;
            color: #334155;
            border-color: #94a3b8;
        }

        /* Toast Container */
        #toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>

<body>

    <!-- Main Congratulations Card -->
    <div class="congrats-card p-4 p-sm-5 text-center">
        <!-- Animated Icon -->
        <div class="icon-circle">
            <i class="fa-solid fa-check"></i>
        </div>

        <!-- Header Text -->
        <h2 class="fw-bold text-slate-900 mb-2">Congratulations!</h2>

        <!-- Message Body -->
        <p class="text-secondary fs-6 mb-4">
            You've successfully applied for this position.
        </p>

        <!-- Actions -->
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="<?php echo base_url('application_form') ?>">
                <button id="primaryBtn" class="btn btn-primary-custom flex-grow-1">
                    Continue <i class="fa-solid fa-arrow-right ms-1 text-opacity-75"></i>
                </button>
            </a>
            <!-- <button id="shareBtn" class="btn btn-outline-custom">
                <i class="fa-solid fa-share-nodes me-1"></i> Share
            </button> -->
        </div>
    </div>

    <div id="toast-container">
        <div id="shareToast" class="toast align-items-center text-bg-dark border-0 rounded-3 shadow" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body px-3 py-2 text-sm">
                    <i class="fa-solid fa-circle-check text-success me-2"></i> Link copied to clipboard!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function triggerConfetti() {
            confetti({
                particleCount: 80,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6']
            });
        }

        // Copy utility with fallback
        function copyToClipboard(text) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(showToast).catch(() => fallbackCopy(text));
            } else {
                fallbackCopy(text);
            }
        }

        function fallbackCopy(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                showToast();
            } catch (err) {
                console.error('Could not copy text', err);
            }
            document.body.removeChild(textArea);
        }

        function showToast() {
            const toastEl = document.getElementById('shareToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }

        // Event Listeners
        window.addEventListener('load', () => {
            // Trigger festive confetti burst on initial load
            setTimeout(triggerConfetti, 250);
        });

        document.getElementById('primaryBtn').addEventListener('click', () => {
            triggerConfetti();
        });

        document.getElementById('shareBtn').addEventListener('click', () => {
            triggerConfetti();
            copyToClipboard(window.location.href);
        });
    </script>
</body>

</html>