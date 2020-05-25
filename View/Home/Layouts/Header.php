<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/View/Home/assets/css/index.css">

</head>
<body>

   <header class="header-default">
      <section class="logo-company">
        <div class="icons">
        <a href="https://trello.com/b/UPTbyUUJ/sistemas-de-ventas" target="_blank"> <i class="fab fa-facebook-f networks"></i> </a>
        <a href="https://trello.com/b/UPTbyUUJ/sistemas-de-ventas" target="_blank"> <i class="fab fa-instagram networks"></i> </a>

        </div>
        <div class="info-header">
          PAGOS CON TARJETA TIENEN UN RECARGO DEL 5%
        </div>
      </section>
      <section class="wishlist">
        <a href="https://trello.com/b/UPTbyUUJ/sistemas-de-ventas" target="_blank">
          <img src="/View/Home/assets/img/logo_company.svg" alt="logo company"></img>
        </a>
        <div class="input-search input-search-1">
          <input placeholder="¿Buscas un producto?" />
          <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <section class="icons-purchase">
          <a>
          <i class="fas fa-user"></i>
          <span class="span-cart"> Mi cuenta</span>
          </a>
          <a>
          <i class="fas fa-heart"></i>
          <span class="span-cart"> wishlist</span>
          </a>
          <div class="popover__wrapper">

          <a class="cart">
            <i class="fas fa-shopping-cart"><div class="circle">3</div></i>
            <span class="span-cart popover__title"> Carrito</span>
          </a>

          <div class="popover__content">
            <?php
for ($i = 1; $i <= 3; $i++) {
    echo '
                    <div class="content-cart">
                    <img src="https://media.giphy.com/media/11SIBu3s72Co8w/giphy.gif" />
                    <div class="content-text">
                      <h6>Polera micropolar OshKosh - 2T</h6>
                      <div>
                        <pan>1 x</span>
                        <span>S/ 350</span>
                      </div>
                    </div>
                    <i class="fas fa-trash"></i>
                </div>
                <hr />

                    ';
}
?>

            <div class="button-purchase">
            <a type="button" class="btn btn-warning">Ver carrito</a>
            <a type="button" class="btn btn-warning">Comprar</a>
            </div>
          </div>
      </div>
        </section>
        <div class="icon-hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="input-search input-search-2">
          <input placeholder="¿Buscas un producto?" />
          <i class="fas fa-long-arrow-alt-right"></i>
        </div>
      </section>
    </header>
