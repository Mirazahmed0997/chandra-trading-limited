<style>
    .hover-gallery {
        position: relative;
        width: 100%;
        max-width: 320px;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        border-radius: 12px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .hover-gallery img {
        position: absolute;
        inset: 0;

        width: 100%;
        height: 100%;

        object-fit: cover;

        transition: none;

        pointer-events: none;
    }

    .hover-gallery img {
        visibility: hidden;
    }

    .hover-gallery img:nth-of-type(1) {
        visibility: visible;
    }


    .hover-zone {
        position: relative;
        z-index: 10;

        width: 100%;
        height: 100%;
    }


    .hover-zone:nth-child(1):hover
    ~ img:nth-of-type(1) {
        visibility: visible;
    }

    .hover-zone:nth-child(1):hover
    ~ img:nth-of-type(2),
    .hover-zone:nth-child(1):hover
    ~ img:nth-of-type(3),
    .hover-zone:nth-child(1):hover
    ~ img:nth-of-type(4) {
        visibility: hidden;
    }


    .hover-zone:nth-child(2):hover
    ~ img:nth-of-type(1) {
        visibility: hidden;
    }

    .hover-zone:nth-child(2):hover
    ~ img:nth-of-type(2) {
        visibility: visible;
    }

    .hover-zone:nth-child(2):hover
    ~ img:nth-of-type(3),
    .hover-zone:nth-child(2):hover
    ~ img:nth-of-type(4) {
        visibility: hidden;
    }


    .hover-zone:nth-child(3):hover
    ~ img:nth-of-type(1),
    .hover-zone:nth-child(3):hover
    ~ img:nth-of-type(2) {
        visibility: hidden;
    }

    .hover-zone:nth-child(3):hover
    ~ img:nth-of-type(3) {
        visibility: visible;
    }

    .hover-zone:nth-child(3):hover
    ~ img:nth-of-type(4) {
        visibility: hidden;
    }


    /* .hover-zone:nth-child(4):hover
    ~ img:nth-of-type(1),
    .hover-zone:nth-child(4):hover
    ~ img:nth-of-type(2),
    .hover-zone:nth-child(4):hover
    ~ img:nth-of-type(3) {
        visibility: hidden;
    }

    .hover-zone:nth-child(4):hover
    ~ img:nth-of-type(4) {
        visibility: visible;
    } */


    /* Responsive */
    @media (min-width: 768px) {
        .hover-gallery {
            max-width: 280px;
        }
    }

    @media (min-width: 1200px) {
        .hover-gallery {
            max-width: 320px;
        }
    }
</style>


<div class="card card-sm bg-base-200 max-w-60 shadow">

    <figure class="hover-gallery">

        <div class="hover-zone"></div>
        <div class="hover-zone"></div>
        <div class="hover-zone"></div>
        <div class="hover-zone"></div>

        <img
            src="./assets/uploads/slider_img/image1.jpg"
            alt="Gallery image 1"
        >

        <img
            src="./assets/uploads/slider_img/image2.jpg"
            alt="Gallery image 2"
        >

        <img
            src="./assets/uploads/slider_img/image3.jpg"
            alt="Gallery image 3"
        >

        <!-- <img
            src="https://img.daisyui.com/images/stock/daisyui-hat-4.webp"
            alt="Gallery image 4"
        > -->

    </figure>

    

</div>