<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caremanager".
 *
 * @property integer $id
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $cid
 * @property string $sex
 * @property integer $staff_type_id
 * @property string $birth_date
 * @property integer $create_by
 * @property string $hcode
 */
class Caremanager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caremanager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid','fname', 'lname'], 'required'],
            [['staff_type_id', 'create_by','job_id'], 'integer'],
            [['birth_date','train_date','education','status'], 'safe'],
            [['pname', 'sex'], 'string', 'max' => 10],
            [['fname', 'lname','train_dep','train_name','train_name_other'
                ,'education_type'], 'string', 'max' => 255],
            [['cid'], 'integer', 'min'=>13],
            [['train_hour','exp'], 'integer'],
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
            'job_id'=>'ตำแหน่ง',
            'education'=>'การศึกษา',
            'education_type'=>'สาขา',
            'train_name'=>'หลักสูตรอบรม',
            'train_name_other'=>'หลักสูตรอบรมอื่นๆ',
            'train_dep'=>'หน่วยงานที่จัดอบรม',
            'train_date'=>'วันที่จบการอบรม',
            'train_hour'=>'ระยะเวลาการอบมรม(ชั่วโมง)'
            ,'exp'=>'ประสบการณ์ดูแลผู้สูงอายุ(ปี)','status'=>'สถานะการปฎิบัติงาน'
           
        ];
    }
     public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sex' => array(
                'ชาย' => 'ชาย',
                'หญิง' => 'หญิง',
            ),
            'education' => array(
                'ปริญญาตรี'=>'ปริญญาตรี',
                'ปริญญาโท'=>'ปริญญาโท',
                'ปริญญาเอก'=>'ปริญญาเอก',
                'อื่นๆ'=>'อื่นๆ'
            ),
             'education_type' => array(
                'การแพทย์'=>'การแพทย์',
                'การพยาบาล'=>'การพยาบาล',
                'การพยาบาล และการผดุงครรภ์'=>'การพยาบาล และการผดุงครรภ์',
                'การสาธารณสุข'=>'การสาธารณสุข',
                'อื่นๆ'=>'อื่นๆ'
            ),
            'train_name' => array(
                'หลักสูตร 70 ชั่วโมง'=>'หลักสูตร 70 ชั่วโมง',
                'หลักสูตร 420 ชั่วโมง'=>'หลักสูตร 420 ชั่วโมง',
                'อื่นๆ'
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
