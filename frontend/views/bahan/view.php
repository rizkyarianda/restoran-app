<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\bahan $model */

$this->title = $model->id_bahan;
$this->params['breadcrumbs'][] = ['label' => 'Bahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bahan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_bahan' => $model->id_bahan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_bahan' => $model->id_bahan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bahan',
            'nama_bahan',
        ],
    ]) ?>

</div>
