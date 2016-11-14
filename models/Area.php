<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id
 * @property string $hcode_create
 * @property integer $user_id_create
 * @property string $addressid
 * @property string $moo
 * @property string $moo_name
 * @property string $tmbpart
 * @property string $tmbpart_name
 * @property string $amppart
 * @property string $amppart_name
 * @property string $chwpart
 * @property string $chwpart_name
 * @property string $hcode_service
 * @property string $hcode_service_name
 * @property string $opt_code
 * @property string $opt_code_name
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moo','chwpart','amppart','tmbpart','opt_code'], 'required'],
            [['user_id_create'], 'integer'],
            [['moo'], 'string', 'min' => 2],
            [['hcode', 'addressid', 'moo_name', 'tmbpart'
                , 'tmbpart_name', 'amppart', 'amppart_name'
                , 'chwpart', 'chwpart_name', 'hcode_name'
                , 'opt_code', 'opt_code_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hcode' => 'Hcode Create',
            'user_id_create' => 'User Id Create',
            'addressid' => 'Addressid',
            'moo' => 'หมู่',
            'moo_name' => 'ชื่อหมู่บ้าน',
            'tmbpart' => 'ตำบล',
            'tmbpart_name' => 'ตำบล',
            'amppart' => 'อำเภอ',
            'amppart_name' => 'อำเภอ',
            'chwpart' => 'จังหวัด',
            'chwpart_name' => 'จังหวัด',
            'hcode_name' => 'หน่วยบริการ',
            'opt_code' => 'ชื่อ อปท. ที่รับผิดชอบ',
            'opt_code_name' => 'ชื่อ อปท.',
        ];
    }
}
