<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cprename".
 *
 * @property string $id_prename
 * @property string $prename
 * @property string $detail
 */
class Cprename extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cprename';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prename', 'prename'], 'required'],
            [['id_prename'], 'string', 'max' => 3],
            [['prename', 'detail'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prename' => 'Id Prename',
            'prename' => 'Prename',
            'detail' => 'Detail',
        ];
    }
}
