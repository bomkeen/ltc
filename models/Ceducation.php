<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ceducation".
 *
 * @property string $educationcode
 * @property string $educationname
 */
class Ceducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ceducation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['educationcode', 'educationname'], 'required'],
            [['educationcode'], 'string', 'max' => 2],
            [['educationname'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'educationcode' => 'Educationcode',
            'educationname' => 'Educationname',
        ];
    }
}
