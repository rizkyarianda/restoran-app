<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\bahan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_bahan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
