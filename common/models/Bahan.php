<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bahan".
 *
 * @property int $id_bahan
 * @property string|null $nama_bahan
 */
class Bahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_bahan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bahan' => 'Id Bahan',
            'nama_bahan' => 'Nama Bahan',
        ];
    }
}
