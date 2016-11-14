<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opt".
 *
 * @property integer $id
 * @property string $opt_code
 * @property string $opt_name
 * @property string $amppart_name
 * @property string $chwpart_name
 */
class Opt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'opt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['opt_code', 'opt_name', 'amppart_name', 'chwpart_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'opt_code' => 'Opt Code',
            'opt_name' => 'Opt Name',
            'amppart_name' => 'Amppart Name',
            'chwpart_name' => 'Chwpart Name',
        ];
    }
}
