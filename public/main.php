<?php
session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once './functions/connect.php';

$main = $pdo->prepare("SELECT * FROM dishes");
$main -> execute();
$result = $main->fetchAll(PDO::FETCH_OBJ);
//print_r($result);
?>  
  <main>
    <h1>Меню</h1>

    <section class="main-content"> 
      <div class="container">
        <div class="row">

<?php 
 foreach ($result as $resu) { ?>
          <div class="col-lg-4 col-sm-6">
            <div class="product-card">
              <div class="product-thumb">
                <a href="#"><img src="admin/dishes/images/<?php echo $resu->filename ?>" alt="товар"></a>
              </div>
              <div class="product-details">
                <h3><a href="#"><?php echo $resu->header ?></a></h3>
                <p><?php echo $resu->text ?></p>
              </div>
              <div class="product-bottom-details d-flex justify-content-between">
                <div class="product-price">  
                  <small><?php echo $resu->price ?>₽</small>
                </div>
                <div class="product-links">
                  <i class="fas fa-cart-plus"></i>
                  <button class="addToCart" data-id="<?php echo $resu->id ?>">Заказать</button>
                </div>
              </div>
            </div>
          </div>
<?php } ?>


        </div>
      </div>
    </section>
    <br>
    <br>

  </main>


  <!-- Modal -->
  <div class="modal fade" id="crt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ваш заказ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="myTable">
            <tbody>
              <tr><div class="cart-out"></div></tr>
              <tr><div class="numberz"></tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" data-bs-dismiss="modal">Закрыть</button>
          <button type="button" class="of">Оформить</button>
      </form>
        </div>
      </div>
    </div>
  </div>