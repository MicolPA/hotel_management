<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Panel de Administración</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= Yii::$app->user->identity->username ?>
            </a>
            <div class="dropdown-menu mt-5" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Perfil</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/site/singuot">Cerrar Sesión </a>
            </div>
        </li>
      </ul>
    </nav>
    <div class="m-3 text-white">
        token
    </div>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-2" style="height: 90vh">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active text-dark" href="#">
                  <i class="fas fa-home"></i>
                  Inicio <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                  <i class="fas fa-user-friends"></i>
                  Huéspedes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/habitacion/listado">
                  <i class="fas fa-building"></i>
                  Habitaciones
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                  <i class="fas fa-chart-pie"></i>
                  Reportes
                </a>
              </li>
              
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="font-weight-bold"> Reservaciones</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/reservacion/crear">
                      <i class="fas fa-file-alt mr-2"></i>
                      Hacer reservación
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                      <i class="fas fa-file-alt mr-2"></i>
                      Ver reservaciones
                    </a>
                  </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="font-weight-bold"> Habitaciones</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/habitacion/crear">
                      <i class="fas fa-bed"></i>
                      Crear
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                      <i class="fas fa-bed"></i>
                      Disponibles
                    </a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="pt-3 pb-2 mb-3">
            <?= $content ?>
            <?= Alert::widget() ?>
            <?= $this->render('_alertas'); ?>
          </div>

            
        </main>
      </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>
    setTimeout(function(){

        height = $(".navbar").innerHeight();
        $(".navbar").css({'max-height':height});

    },500);
</script>
