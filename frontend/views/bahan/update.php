<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\bahan $model */

$this->title = 'Update Bahan: ' . $model->id_bahan;
$this->params['breadcrumbs'][] = ['label' => 'Bahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bahan, 'url' => ['view', 'id_bahan' => $model->id_bahan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
