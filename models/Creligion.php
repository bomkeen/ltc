<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "creligion".
 *
 * @property string $id_religion
 * @property string $religion
 * @property string $detail
 */
class Creligion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'creligion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_religion', 'religion'], 'required'],
            [['id_religion'], 'string', 'max' => 2],
            [['religion'], 'string', 'max' => 30],
            [['detail'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_religion' => 'Id Religion',
            'religion' => 'Religion',
            'detail' => 'Detail',
        ];
    }
}
