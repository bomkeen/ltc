<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "need2_2".
 *
 * @property integer $id
 * @property string $key
 * @property string $detail
 */
class Need22 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'need2_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'detail' => 'Detail',
        ];
    }
}
