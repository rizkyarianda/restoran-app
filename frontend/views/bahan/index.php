<?php

use common\models\bahan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\BahanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Bahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Bahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataProvider as $key => $value) : ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $value['nama_bahan'] ?></td>
                <td>
                    <?= Html::a('<span class="fa fa-eye"></span>', ['/bahan/view', 'id_bahan' => $value['id_bahan']])?>
                    <?= Html::a('<span class="fa fa-pencil"></span>', ['/bahan/update', 'id_bahan' => $value['id_bahan']])?>
                    <?= Html::a('<span class="fa fa-trash"></span>', ['/bahan/delete', 'id_bahan' => $value['id_bahan']])?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>


</div>