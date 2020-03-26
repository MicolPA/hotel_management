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
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap shadow" style="display: none">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Panel de Administración</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if (!Yii::$app->user->isGuest): ?>
                    <?= Yii::$app->user->identity->name . " " . Yii::$app->user->identity->last_name ?>   
                <?php endif ?>
            </a>
            <div class="dropdown-menu mt-5" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/gestion/perfil/"><i class="fas fa-user-circle"></i> Perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/site/logout">Cerrar Sesión </a>
            </div>
        </li>
      </ul>
    </nav>
    <div class="m-3 text-white" style="display: none">
        token
    </div>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-2" style="height: 90vh">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item border-bottom pb-2 text-center pt-2 mb-3" style="background: #fafafa">
                <div class="rounded-circle m-auto" style="width: 80px;height:80px;background-image: url(/<?= Yii::$app->user->identity->photo_url ?>);background-size: cover;">
                  <!-- <img src="/<?//= Yii::$app->user->identity->photo_url ?>" width='100%'> -->
                </div>
                  <p class="h6 mb-0 mt-2 font-weight-light">Hola, Micol Peralta</p>
                  <a href="/gestion/perfil" class="btn btn-pink btn-sm btn-block mt-2">Ver Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-dark" href="/reports/rack">
                  <i class="fas fa-home text-pink"></i>
                  Inicio <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/habitacion/servicios">
                  <i class="fas fa-concierge-bell text-pink"></i>
                  Servicios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                  <i class="fas fa-user-friends text-pink"></i>
                  Huéspedes
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link text-dark" href="/reports/rack">
                  <i class="fas fa-chart-pie text-pink"></i>
                  Reportes
                </a>
              </li>
              
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="font-weight-bold text-primary"> Reservaciones</span>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/reservacion/crear">
                      <i class="fas fa-circle fa-sm text-primary"></i>
                      Hacer reservación
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                      <i class="fas fa-circle fa-sm text-primary"></i>
                      Ver reservaciones
                    </a>
                  </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span class="font-weight-bold text-primary"> Habitaciones</span>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/habitacion/crear">
                      <i class="fas fa-circle fa-sm text-primary"></i>
                      Registrar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="/habitacion/listado">
                      <i class="fas fa-circle fa-sm text-primary"></i>
                      Ver Listado
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/habitacion/tipos">
                      <i class="fas fa-circle fa-sm text-primary"></i>
                      Tipos de Hab.
                    </a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="pt-3 pb-2 mb-3 mt-3">
            <?= $content ?>
            <?= Alert::widget() ?>
            <?= $this->render('_alertas'); ?>
          </div>

            
        </main>
      </div>
    </div>
</div>

<footer class="footer ">
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
