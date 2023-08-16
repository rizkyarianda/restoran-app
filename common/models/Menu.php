<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property int|null $id_kategori
 * @property string|null $nama_menu
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori'], 'default', 'value' => null],
            [['id_kategori'], 'integer'],
            [['nama_menu'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'id_kategori' => 'Id Kategori',
            'nama_menu' => 'Nama Menu',
        ];
    }
}
