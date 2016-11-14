<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_type".
 *
 * @property integer $staff_type_id
 * @property string $staff_type_name
 */
class StaffType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_type_id'], 'required'],
            [['staff_type_id'], 'integer'],
            [['staff_type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_type_id' => 'Staff Type ID',
            'staff_type_name' => 'Staff Type Name',
        ];
    }
}
