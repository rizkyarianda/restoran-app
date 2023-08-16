<?php

use common\models\bahan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\BahanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bahans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bahan',
            'nama_bahan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, bahan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_bahan' => $model->id_bahan]);
                 }
            ],
        ],
    ]); ?>


</div>
