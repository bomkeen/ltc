<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dgrooming".
 *
 * @property integer $id
 * @property string $name
 * @property integer $score
 */
class Dgrooming extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dgrooming';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'score'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'score' => 'Score',
        ];
    }
}
