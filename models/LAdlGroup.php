<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "l_adl_group".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $group_name
 * @property integer $score
 */
class LAdlGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'l_adl_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'score'], 'integer'],
            [['group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
            'score' => 'Score',
        ];
    }
}
