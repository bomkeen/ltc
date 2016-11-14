<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cinstype_old".
 *
 * @property string $id_instype
 * @property string $instype_name
 * @property string $instype_dateexp
 * @property string $maininscl
 */
class CinstypeOld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinstype_old';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_instype', 'instype_name'], 'required'],
            [['id_instype'], 'string', 'max' => 2],
            [['instype_name'], 'string', 'max' => 150],
            [['instype_dateexp'], 'string', 'max' => 50],
            [['maininscl'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_instype' => 'Id Instype',
            'instype_name' => 'Instype Name',
            'instype_dateexp' => 'Instype Dateexp',
            'maininscl' => 'Maininscl',
        ];
    }
}
