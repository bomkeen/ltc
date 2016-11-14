<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cchronic".
 *
 * @property string $id_chronic
 * @property string $echronic
 * @property string $tchronic
 */
class Cchronic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cchronic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_chronic', 'echronic', 'tchronic'], 'required'],
            [['id_chronic'], 'string', 'max' => 6],
            [['echronic', 'tchronic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_chronic' => 'Id Chronic',
            'echronic' => 'Echronic',
            'tchronic' => 'Tchronic',
        ];
    }
}
