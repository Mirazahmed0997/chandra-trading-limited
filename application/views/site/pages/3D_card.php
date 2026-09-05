

<!-- Include Tailwind & daisyUI via CDN if not already in your build -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex flex-wrap gap-6 justify-center p-8">

  <!-- Card 1 -->
  <div class="hover-3d">
    <figure class="w-60 rounded-2xl shadow-xl overflow-hidden">
      <img src="https://img.daisyui.com/images/stock/card-1.webp?x" alt="Tailwind CSS 3D card" class="w-full h-full object-cover" />
    </figure>
    <!-- 8 hover detection zones -->
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Card 2 -->
  <div class="hover-3d">
    <figure class="w-60 rounded-2xl shadow-xl overflow-hidden">
      <img src="https://img.daisyui.com/images/stock/card-2.webp?x" alt="Tailwind CSS 3D hover" class="w-full h-full object-cover" />
    </figure>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Card 3 -->
  <div class="hover-3d">
    <figure class="w-60 rounded-2xl shadow-xl overflow-hidden">
      <img src="https://img.daisyui.com/images/stock/card-3.webp?x" alt="Tailwind CSS 3D hover" class="w-full h-full object-cover" />
    </figure>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

</div>

<style>
  .hover-3d {
    position: relative;
    display: inline-block;
    perspective: 1000px;
  }

  .hover-3d figure {
    transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
    transform-style: preserve-3d;
  }

  .hover-3d > div {
    position: absolute;
    z-index: 10;
    width: 33.33%;
    height: 33.33%;
  }

  .hover-3d > div:nth-child(2) { top: 0; left: 0; }
  .hover-3d > div:nth-child(3) { top: 0; left: 33.33%; }
  .hover-3d > div:nth-child(4) { top: 0; left: 66.66%; }
  .hover-3d > div:nth-child(5) { top: 33.33%; left: 0; }
  .hover-3d > div:nth-child(6) { top: 33.33%; left: 66.66%; }
  .hover-3d > div:nth-child(7) { top: 66.66%; left: 0; }
  .hover-3d > div:nth-child(8) { top: 66.66%; left: 33.33%; }
  .hover-3d > div:nth-child(9) { top: 66.66%; left: 66.66%; }

  .hover-3d > div:nth-child(2):hover ~ figure { transform: rotateX(15deg) rotateY(-15deg); }
  .hover-3d > div:nth-child(3):hover ~ figure { transform: rotateX(15deg) rotateY(0deg); }
  .hover-3d > div:nth-child(4):hover ~ figure { transform: rotateX(15deg) rotateY(15deg); }
  .hover-3d > div:nth-child(5):hover ~ figure { transform: rotateX(0deg) rotateY(-15deg); }
  .hover-3d > div:nth-child(6):hover ~ figure { transform: rotateX(0deg) rotateY(15deg); }
  .hover-3d > div:nth-child(7):hover ~ figure { transform: rotateX(-15deg) rotateY(-15deg); }
  .hover-3d > div:nth-child(8):hover ~ figure { transform: rotateX(-15deg) rotateY(0deg); }
  .hover-3d > div:nth-child(9):hover ~ figure { transform: rotateX(-15deg) rotateY(15deg); }
</style>