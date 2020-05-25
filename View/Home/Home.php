<div class="main-container__home">
    <div class="info-box">#QuedateEnCasa - LOS ENVIOS SE PROGRAMAN LUEGO DE LA CUARENTENA</div>
    <div class="banner-imaganes">
        <div class="img-top">
            <div class="img-left">
            <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-left.svg" alt="nothing to show" />
            </div>
            <a>
                <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/CONJUNTOS.jpg" alt="nothing to show"/>
            </a>
            <div>
                <a>
                    <img alt="nothing to show" src="https://petitbebe.com.pe/wp-content/uploads/2019/12/SKIPHOP-1.jpg" />
                </a>
                <a>
                    <img alt="nothing to show" src="https://petitbebe.com.pe/wp-content/uploads/2020/02/PACKBODYS39.jpg" />
                </a>
            </div>
        </div>
    </div>

    <!-- contenido principal de los productos -->
    <div class="content-products">
        <div class="img-bottom">
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-left.svg" alt="nothing to show" />
            </div>
            <div>
                <h2>Separa tus productos</h2>
                <p>Con un 20% de inicial</p>
            </div>
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-right.svg" alt="nothing to show" />
            </div>
        </div>
        <div class="selected-products">
         <i class="far fa-calendar"></i> No se encontraron productos que concuerden con la selección.
        </div>

        <!-- Img bottom 2 -->
        <div class="img-bottom">
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-left.svg" alt="nothing to show" />
            </div>
            <div>
                <h2>Stock</h2>
                <p>Para entrega inmediata</p>
            </div>
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-right.svg" alt="nothing to show" />
            </div>
        </div>
        <!-- Img Bottom 2 -->

        <!-- Products -->
            <div class="card-deck card-grid">
                <?php
for ($i = 0; $i < 12; $i++) {
    echo '
                    <div class="card " onmouseover="showOption(' . $i . ')" onmouseout="hideOption(' . $i . ')" >
                    <section class="card-img-stock">
                        <span>STOCK</span>
                        <img src="https://petitbebe.com.pe/wp-content/uploads/2020/04/241840465-300x300.jpg" class="card-img-top" alt="...">
                        <i class="fas fa-heart"></i>
                    </section>
                <div class="card-body">
                <h5 class="card-title">Body Camisero OshKosh</h5>
                <div>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                </div>
                <span class="card-text before">S/ 55.00</span>
                <span class="card-text now">S/ 39.00</span>

                <div class="collapse  collapse-style" id="collapseExample' . $i . '">
                    <div class="item-size">
                        9M
                    </div>
                </div>
                <button type="button" class="btn btn-warning btn-add">Añadir al carrito</button>
                </div>
                </div>
                    ';
}
?>
            </div>
        <!-- Products -->

                <!-- Marcas -->
                <div class="img-bottom">
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-left.svg" alt="nothing to show" />
            </div>
            <div>
                <h2>Marca con las que trabajamos</h2>
            </div>
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-right.svg" alt="nothing to show" />
            </div>
        </div>
        <!-- Marcas -->
        <div class="content-brands">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                       <div class="grid-carrusel">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client02.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client01.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client05.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/clent08.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client03.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client06.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client04-1.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="grid-carrusel">
                           <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client02.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client01.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client05.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/clent08.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client03.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client06.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client04-1.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                       <div class="grid-carrusel">
                           <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client02.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client01.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client05.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/clent08.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client03.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client06.png" class="d-block w-100" alt="...">
                            <img src="https://petitbebe.com.pe/wp-content/uploads/2019/07/client04-1.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
                <!-- Opiniones clientes -->
        <div class="img-bottom">
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-left.svg" alt="nothing to show" />
            </div>
            <div>
                <h2>¿Qué dicen nuestros clientes?</h2>
            </div>
            <div>
              <img  src="https://petitbebe.com.pe/wp-content/themes/blankslate/img/section-title-right.svg" alt="nothing to show" />
            </div>
        </div>
        <!-- Opiniones clientes -->
        <div class="customer-opinions">
            Aqui opiniones
        </div>
    </div>
        <!-- contenido principal de los productos -->

</div>
<script>
function showOption(i) {
  const collapse_item = document.getElementById("collapseExample"+i)
  collapse_item.classList.add("show");

}
function hideOption(i){
    const collapse_item = document.getElementById("collapseExample"+i)
     collapse_item.classList.remove("show");
}
</script>