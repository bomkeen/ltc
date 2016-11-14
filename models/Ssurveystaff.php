<?php

namespace app\models;

use Yii;
use app\models\StaffType;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ssurveystaff".
 *
 * @property integer $id
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $cid
 * @property string $sex
 * @property integer $staff_type_id
 * @property string $birth_date
 * @property string $create_by
 * @property string $hcode
 */
class Ssurveystaff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ssurveystaff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pname','fname','lname','cid'],'required'],
            [['staff_type_id','create_by'], 'integer'],
            [['birth_date','status'], 'safe'],
            [['pname', 'sex'], 'string', 'max' => 10],
            [['fname', 'lname' ], 'string', 'max' => 255],
            [['cid'], 'string','min'=>13, 'max' => 13],
            [['hcode'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pname' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'lname' => 'สกุล',
            'cid' => 'เลขบัตรประชาชน',
            'sex' => 'เพศ',
            'staff_type_id' => 'สถานะในชุมชน',
            'birth_date' => 'วันเกิด',
            'create_by' => 'Create By',
            'hcode' => 'Hcode',
            'status'=>'สถานะการปฏิบัติงาน'
        ];
    }
     public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sex' => array(
                'ชาย' => 'ชาย',
                'หญิง' => 'หญิง',
            ),
             'discharge' => array(
                '1' => 'ตาย',
                '2' => 'ย้าย',
                '3' => 'สาบสูญ',
                '9' => 'ไม่จำหน่าย',
            ),
            'status' => array(
                'Y' => 'ปฎิบัติงาน',
                'N' => 'ไม่ปฎิบัติงาน',
            ),
            
           
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
    
}
