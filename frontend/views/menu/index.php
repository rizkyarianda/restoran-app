<?php

use common\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\MenuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Menu', ['/menu/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_kategori',
            'nama_menu',
            [
                'header' => 'Aksi',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{lihat}',  // the default buttons + your custom button
                'buttons' => [
                    'lihat' => function($url, $model, $key) {     // render your custom button
                        return Html::a('Lihat Resep', ['lihat-resep', 'id' => $model->id_menu],['class' => 'btn btn-primary']);
                    }
                ]
                ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Menu $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_menu' => $model->id_menu]);
                 }
            ],
        ],
    ]); ?>


</div>
