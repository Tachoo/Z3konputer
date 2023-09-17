<?php include_once __DIR__.'/../templates/header.php'; ?>

<div class="fog hide op09">
     <div class="Cant-Opciones">
     </div>
</div>
<main class="main">
   <div class="product-single contenedor">
    <section class="product-img">
        <picture>
        <source
             sizes="1920w, 1280w, 640w" 
             srcset="/build/img/920-008084_1.avif 1920w, 
                     /build/img/920-008084_1.avif 1280w, 
                     /build/img/920-008084_1.avif 640w" 
             type="image/avif">
        <source
             sizes="1920w, 1280w, 640w" 
             srcset="/build/img/920-008084_1.webp 1920w, 
                     /build/img/920-008084_1.webp 1280w, 
                     /build/img/920-008084_1.webp 640w" 
             type="image/webp">
        <source
             sizes="1920w, 1280w, 640w" 
             srcset="/build/img/920-008084_1.jpg 1920w, 
                     /build/img/920-008084_1.jpg 1280w, 
                     /build/img/920-008084_1.jpg 640w" 
             type="image/jpeg">
        <img loading="lazy" decoding="async" src="/build/img/920-008084_1.jpg" lazyalt="imagen" width="250" height="250" id="920-008084_1" >
        </picture>
    </section>
    <section class="product-info">
        <div class="product-info__main">
            <div class="product-price">
                <span class="price-simbol">$</span><span class="price-import">1,200</span><span class="price-cents">00</span>
            </div>
            <div class="product-msi">
                <span>Hasta</span> <span class="bold7">12 meses sin intereses</span><span>de $180.00</span>
                <a href="#">Ver mas opciones</a>
            </div>
            <div class="product-delivery">
                <span>Entrega</span> <span>Gratis el </span><span class="bold7">domingo, 10 de septiembre.</span>
                <a href="#">Ver detalles</a>
            </div>
        </div>
        <div class="product-info__buybeef">
               <div class="selector-cantidad">
                 <span class="selector-cantidad__opcion border">
                    <span>Cant.:</span>
                    <span class="product-cantidad">0</span>
                    <span class="material-symbols-outlined icon-expand">expand_more</span>
               </div>
               <form class="product-info__buyacccion" action="#" method="get">
                    <button class="add-info" type="submit">
                        <span>Agregar a carrito</span>
                    </button>
               </form>
              
        </div>
    </section>
    <section class="product-detail"></section>
    <section class="Galeria"></section>
    <section class="Opinions"></section>
   </div>
</main>
<?php include_once __DIR__.'/../templates/footer.php'; ?>

<?php $script='<script src="build/js/app.min.js"></script>'?>