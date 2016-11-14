<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coccupation".
 *
 * @property string $occupationcode
 * @property string $occupationname
 */
class Coccupation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coccupation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['occupationcode'], 'required'],
            [['occupationcode'], 'string', 'max' => 4],
            [['occupationname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'occupationcode' => 'Occupationcode',
            'occupationname' => 'Occupationname',
        ];
    }
}
