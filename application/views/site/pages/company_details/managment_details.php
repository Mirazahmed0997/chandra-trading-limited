<section class="about-section">
    <div class="about-container">
        <div class="section-header">
        </div>
        <div class="story-grid">
            <div class="story-content">
                <h3 class="story-title"><?= $managment_info['name'] ?? 'Management সদস্য' ?></h3>
                <p class="story-text">
                    <?= $managment_info['designation'] ?? '' ?>
                </p>
                <p class="story-text">
                    <?= $managment_info['details'] ?>
                </p>

            </div>
            <div class="story-image-wrapper">
                <img src="<?= base_url('./assets/uploads/project/management_img/' . $managment_info['image']) ?>"
                    alt="Our team collaborating on design projects" class="story-image" loading="lazy" width="1200"
                    height="1200">
            </div>
        </div>

    </div>
</section>

<link href="https://fonts.maateen.me/noto-sans-bengali/font.css" rel="stylesheet">


<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        text-align: justify;
    }

    :root {
        /* Colors */
        --color-white: #ffffff;
        --color-gray-50: #f9fafb;
        --color-gray-200: #e5e7eb;
        --color-gray-600: #4b5563;
        --color-gray-800: #1f2937;
        --color-blue-100: #dbeafe;
        --color-blue-600: #2563eb;
        --color-blue-700: #1d4ed8;
        /* Spacing */
        --spacing-1: 0.25rem;
        --spacing-3: 0.75rem;
        --spacing-4: 1rem;
        --spacing-6: 1.5rem;
        --spacing-8: 2rem;
        --spacing-12: 3rem;
        --spacing-16: 4rem;
        --spacing-20: 5rem;
        --spacing-24: 6rem;
        /* Container */
        --container-max-width: 80rem;
        /* max-w-7xl */
        --content-max-width: 48rem;
        /* max-w-3xl */
    }

    /* Reset */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* Base Styles */
    body {
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        line-height: 1.5;
    }

    /* Component Styles */
    .about-section {
        background-color: var(--color-gray-50);
        padding: var(--spacing-16) 0;
    }

    .about-container {
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--spacing-4);
    }

    .section-header {
        text-align: center;
        margin-bottom: var(--spacing-16);
    }

    .section-title {
        font-size: 1.875rem;
        font-weight: 500;
        color: var(--color-gray-800);
        margin-bottom: var(--spacing-4);
    }

    .section-description {
        font-size: 1.125rem;
        color: var(--color-gray-600);
        max-width: var(--content-max-width);
        margin: 0 auto;
    }

    .story-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: var(--spacing-12);
        align-items: center;
        margin-bottom: var(--spacing-20);
    }

    .story-content {
        order: 2;
        font-size: 16px;
        line-height: 1.9;
        color: #0b5ed7;
    }

    .story-title {
        font-size: 1.5rem;
        font-weight: 500;
        color: var(--color-gray-800);
        margin-bottom: var(--spacing-6);
    }

    .story-text {
        font-size: 1rem;
        color: var(--color-gray-600);
        margin-bottom: var(--spacing-6);
    }

    .story-text:last-of-type {
        margin-bottom: var(--spacing-8);
    }

    .story-link {
        display: inline-flex;
        align-items: center;
        color: var(--color-blue-600);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .story-link:hover {
        color: var(--color-blue-700);
    }

    .story-link-icon {
        width: 1.25rem;
        height: 1.25rem;
        margin-left: var(--spacing-1);
    }

    .story-image-wrapper {
        display: flex;
        justify-items: center;
        order: 1;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        width: 90%;
    }

    .story-image {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .values-section {
        margin-bottom: var(--spacing-20);
    }

    .values-title {
        font-size: 1.5rem;
        font-weight: 500;
        color: var(--color-gray-800);
        text-align: center;
        margin-bottom: var(--spacing-8);
    }

    .values-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: var(--spacing-8);
    }

    .value-card {
        background-color: var(--color-white);
        border: 1px solid var(--color-gray-200);
        border-radius: 1rem;
        padding: var(--spacing-8);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .value-icon-wrapper {
        width: 3rem;
        height: 3rem;
        background-color: var(--color-blue-100);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: var(--spacing-6);
    }

    .value-icon {
        width: 1.5rem;
        height: 1.5rem;
        color: var(--color-blue-600);
    }

    .value-title {
        font-size: 1.25rem;
        font-weight: 400;
        color: var(--color-gray-800);
        margin-bottom: var(--spacing-3);
    }

    .value-description {
        color: var(--color-gray-600);
    }

    /* Responsive Breakpoints */
    @media (min-width: 640px) {
        .about-section {
            padding: var(--spacing-24) 0;
        }

        .about-container {
            padding: 0 var(--spacing-6);
        }

        .section-title {
            font-size: 2.25rem;
        }
    }

    @media (min-width: 768px) {
        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .about-container {
            padding: 0 var(--spacing-8);
        }

        .story-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .story-content {
            order: 1;
        }

        .story-image-wrapper {
            order: 2;
        }

        .values-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>









<!-- <section class="hero-modern-business" aria-label="Business Hero Section">
    <div class="hero-modern-business__container">

        <div class="hero-modern-business__image-wrapper">
            <img src="<?= base_url('./assets/uploads/project/management_img/' . $managment_info['image']) ?>"
                loading="lazy" alt="Modern business team collaborating in a bright office"
                class="hero-modern-business__image" />
        </div>
        <div class="hero-modern-business__content">

            <h1 class="hero-modern-business__title">
                <?= $managment_info['name'] ?? 'Management সদস্য' ?>
            </h1>
            <span class="hero-modern-business__badge">
                <?= $managment_info['designation'] ?? '' ?>
            </span>
            <p class="hero-modern-business__desc">
                <?= $managment_info['details'] ?>
            </p>


        </div>

    </div>
</section> -->






<!-- <style>
    .hero-modern-business__image-wrapper {
        width: 100%;
        max-width: 450px;
        height: auto;
        overflow: hidden;
        border-radius: 12px;
        border: 2px solid black;
        
    }

    .hero-modern-business__image-wrapper img {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
        object-position: top;
    }


    .hero-modern-business__image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        display: block;
    }

    @media (max-width: 768px) {
        .hero-modern-business__image-wrapper {
            height: 250px;
        }
    }

    @media (max-width: 480px) {
        .hero-modern-business__image-wrapper {
            height: 220px;
        }
    }

    

:root {
        --primary-color: #4f46e5;
        /* indigo-600 */
        --primary-color-dark: #4338ca;
        /* indigo-700 */
        --primary-bg: #f1f5f9;
        /* slate-50 */
        --primary-text: #0f172a;
        /* slate-900 */
        --secondary-text: #475569;
        /* slate-600 */
        --badge-bg: #e0e7ff;
        /* indigo-100 */
        --badge-text: #4338ca;
        /* indigo-700 */
        --button-border: #e0e7ff;
        /* indigo-200 */
        --button-hover-bg: #eef2ff;
        /* indigo-50 */
        --button-focus: #a5b4fc;
        /* indigo-200 */
        --button-focus-solid: #4338ca;
        /* indigo-400 */
        --star-color: #facc15;
        /* yellow-400 */
        --img-border: #e2e8f0;
        /* slate-200 */
        --shadow-lg: 0 10px 15px -3px rgba(16, 24, 40, 0.1), 0 4px 6px -4px rgba(16, 24, 40, 0.1);
        --shadow-sm: 0 1px 2px 0 rgba(16, 24, 40, 0.05);
        --font-sans: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --radius-lg: 0.5rem;
        --radius-full: 9999px;
        --transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }



     .hero-modern-business {
        font-family: 'Noto Sans Bengali', sans-serif;
        width: 100%;
        background: var(--primary-bg);
        /* font-family: var(--font-sans); */
        font-size: 16px;
        padding: 3rem 1rem;
    }

    @media (min-width: 640px) {
        .hero-modern-business {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    @media (min-width: 768px) {
        .hero-modern-business {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
    }

    .hero-modern-business__container {
        max-width: 80rem;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
    }

    @media (min-width: 768px) {
        .hero-modern-business__container {
            flex-direction: row;
            gap: 4rem;
            align-items: stretch;
        }
    }

    .hero-modern-business__content {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        text-align: left;
        font-size: 16px;
    }

    @media (min-width: 768px) {
        .hero-modern-business__content {
            width: 50%;
        }
    }

    .hero-modern-business__badge {
        display: inline-block;
        padding: 0.25rem 1rem;
        margin-bottom: 1rem;
        border-radius: var(--radius-full);
        background: var(--badge-bg);
        color: var(--badge-text);
        font-size: 0.875rem;
        font-weight: 500;
        letter-spacing: 0.025em;
        box-shadow: var(--shadow-sm);
    }

    .hero-modern-business__title {
        font-size: 1.875rem;
        font-weight: 800;
        color: var(--primary-text);
        line-height: 1;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 640px) {
        .hero-modern-business__title {
            font-size: 2.25rem;
        }
    }

    @media (min-width: 768px) {
        .hero-modern-business__title {
            font-size: 3rem;
        }
    }

    .hero-modern-business__desc {
        font-family: 'Noto Sans Bengali', sans-serif;
        font-size: 20px;
        /* matches screenshot */
        line-height: 2;
        /* proper spacing */
        color: #1a5fd0;
        /* exact blue tone */
        text-align: justify;
        text-justify: inter-word;
        letter-spacing: 0.3px;
        word-spacing: 2px;
    }

    @media (min-width: 640px) {
        .hero-modern-business__desc {
            font-size: 1.25rem;
        }
    }

    .hero-modern-business__actions {
        display: flex;
        flex-direction: row;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .hero-modern-business__button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-lg);
        font-size: 1rem;
        font-weight: 600;
        box-shadow: var(--shadow-lg);
        border: none;
        outline: none;
        cursor: pointer;
        transition: background var(--transition), color var(--transition), border-color var(--transition);
        text-decoration: none;
        position: relative;
    }

    .hero-modern-business__button--primary {
        background: var(--primary-color);
        color: #fff;
    }

    .hero-modern-business__button--primary:hover,
    .hero-modern-business__button--primary:focus {
        background: var(--primary-color-dark);
    }

    .hero-modern-business__button--primary:focus {
        box-shadow: 0 0 0 2px var(--button-focus-solid), 0 0 0 4px #fff;
    }

    .hero-modern-business__button--secondary {
        background: #fff;
        color: var(--primary-color);
        border: 1px solid var(--button-border);
    }

    .hero-modern-business__button--secondary:hover,
    .hero-modern-business__button--secondary:focus {
        background: var(--button-hover-bg);
        color: var(--primary-color-dark);
        border-color: var(--primary-color-dark);
    }

    .hero-modern-business__button--secondary:focus {
        box-shadow: 0 0 0 2px var(--button-focus), 0 0 0 4px #fff;
    }

    .hero-modern-business__avatars {
        display: flex;
        align-items: center;
        gap: 1rem;
        max-width: 64rem;
        padding: 1rem 0;
        justify-content: center;
    }

    .hero-modern-business__avatar-group {
        display: flex;
        align-items: center;
    }

    .hero-modern-business__avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: var(--radius-full);
        border: 2px solid #fff;
        object-fit: cover;
        margin-right: -0.75rem;
        box-shadow: 0 0 0 1px var(--img-border);
        background: #fff;
    }

    .hero-modern-business__rating {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .hero-modern-business__stars {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .hero-modern-business__star {
        width: 1.25rem;
        height: 1.25rem;
        color: var(--star-color);
        display: inline-block;
    }

    .hero-modern-business__rating-text {
        font-size: 0.875rem;
    }

    .hero-modern-business__rating-text .font-semibold {
        font-weight: 600;
    }

    .hero-modern-business__image-wrapper {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
        .hero-modern-business__image-wrapper {
            width: 50%;
            margin-bottom: 0;
            align-items: center;
        }
    }

    .hero-modern-business__image {
        border-radius: 0.75rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--img-border);
        object-fit: cover;
        width: 100%;
        height: auto;
        max-height: 22.5rem;
        background: #fff;
        display: block;
    }



</style> -->