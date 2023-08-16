<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Resep Menu';
?>
<div class="site-index">
    <div class="p-5 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Data Master</h1>
        </div>
    </div>
    <?php  if (!Yii::$app->user->isGuest) { ?>
    <div class="body-content">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-center">
                <h2>Daftar Bahan</h2>
                <p><a class="btn btn-outline-secondary" href="<?= Url::to('daftar-bahan') ?>">Pilih &raquo;</a></p>
            </div>
            <div class="col-lg-4 text-center">
                <h2>Daftar Kategori</h2>
                <p><a class="btn btn-outline-secondary" href="<?= Url::to('site/daftar-kategori') ?>">Pilih &raquo;</a></p>
            </div>
            <!-- <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div> -->
        </div>

    </div>
    <?php } ?>

</div>
