<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Menu $model */

$this->title = 'Buat Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kategori' => $kategori,
    ]) ?>

</div>
