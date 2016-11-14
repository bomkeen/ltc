<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caregiver".
 *
 * @property integer $id
 * @property string $pname
 * @property string $fname
 * @property string $lname
 * @property string $cid
 * @property string $sex
 * @property string $birth_date
 * @property integer $create_by
 * @property string $hcode
 * @property string $education
 * @property string $train_name
 * @property string $train_name_other
 * @property string $train_dep
 * @property string $train_date
 * @property string $exp
 * @property string $moo
 * @property string $tmbpart
 * @property string $tmbpart_name
 * @property string $amppart
 * @property string $amppart_name
 * @property string $chwpart
 * @property string $chwpart_name
 * @property string $status
 */
class Caregiver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caregiver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moo','chwpart','amppart','tmbpart'
            ,'pname','fname','lname','cid'], 'required'],
            [['birth_date', 'train_date'], 'safe'],
            [['create_by'], 'integer'],
            [['pname', 'sex'], 'string', 'max' => 10],
            [['fname', 'lname', 'train_name','addressid'
                , 'train_name_other', 'train_dep', 'tmbpart', 'tmbpart_name', 'amppart', 'amppart_name', 'chwpart', 'chwpart_name'], 'string', 'max' => 255],
            [['cid'], 'string', 'max' => 13],
            [['hcode'], 'string', 'max' => 7],
            [['education'], 'string', 'max' => 11],
            [['exp'], 'string', 'max' => 3],
            [['moo'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 1],
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
            'lname' => 'นามสกุล',
            'cid' => 'บัตรประชาชน',
            'sex' => 'เพศ',
            'birth_date' => 'วันเกิด',
            'create_by' => 'Create By',
            'hcode' => 'Hcode',
            'education' => 'การศึกษา',
            'train_name' => 'หลักสูตรอบรม',
            'train_name_other' => 'หลักสูตรอบรมอื่นๆ',
            'train_dep' => 'หน่วยงานที่ตัดอบรม',
            'train_date' => 'วันที่จบการอบรม',
            'exp' => 'ประสบการณ์ดูแลผู้สูงอายุ(ปี)',
            'moo' => 'หมู่',
            'tmbpart' => 'ตำบล',
            'tmbpart_name' => 'ตำบล',
            'amppart' => 'อำเภอ',
            'amppart_name' => 'อำเภอ',
            'chwpart' => 'จังหวัด',
            'chwpart_name' => 'จังหวัด',
            'status' => 'สถานะการปฎิบัติงาน',
            'addressid' => 'Addressid'
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
