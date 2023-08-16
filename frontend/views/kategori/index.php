<?php

use common\models\kategori;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\KategoriSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Kategori';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Kategori', ['/kategori/create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                <td><?= $value['nama_kategori'] ?></td>
                <td>
                    <?= Html::a('<span class="fa fa-eye"></span>', ['/kategori/view', 'id_kategori' => $value['id_kategori']])?>
                    <?= Html::a('<span class="fa fa-pencil"></span>', ['/kategori/update', 'id_kategori' => $value['id_kategori']])?>
                    <?= Html::a('<span class="fa fa-trash"></span>', ['/kategori/delete', 'id_kategori' => $value['id_kategori']])?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>



</div>
