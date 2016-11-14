<?php

namespace app\models;

use Yii;
use app\models\Ceducation;
use app\models\Coccupation;
use app\models\Chospital;
use app\models\Cchronic;
use app\models\NhsoScore;

class Person extends \yii\db\ActiveRecord
{
   
 

    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid','fname','fname','lname','birth_date'], 'required'],
            [[ 'moo', 'occupation', 'fstatus', 'discharge', 'update_user','survey_staff_id','nhso_score_staff_id', 'age_now'], 'integer'],
            [['ddischarge','birth_date','age_now', 'update_date','chwpart','province','survey_score'
            ,'survey_date','ass_score','ass_date','nhso_score_date','nhso_score'], 'safe'],
            [['hcode'], 'string', 'max' => 5],
            [['hname', 'pname', 'fname', 'lname', 'sex', 'ptname', 'hmain', 'hsub', 'house_num', 'tmbpart', 'tambon', 'amppart', 'ampart', 'chwpart', 'province', 'chronic'], 'string', 'max' => 255],
            [['cid'], 'string', 'max'=>13,'min' => 13],
            [['addressid'], 'string', 'max' => 8],
            [['education'], 'string', 'max' => 11],
            [['religion','ptype'], 'string', 'max' => 2],
            [['tel'], 'string', 'max' => 10],
            [['update_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hcode' => 'Hcode',
            'hname' => 'หน่วยบริการ',
            'cid' => 'เลขบัตรประชาชน',
            'pname' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'lname' => 'สกุล',
            'sex' => 'เพศ',
            'birth_date' => 'วันเกิด',
            'age_now' => 'อายุ',
            'ptype' => 'Ptype',
            'ptname' => 'สิทธิ',
            'hmain' => 'Hmain',
            'hsub' => 'Hsub',
            'addressid' => 'Addressid',
            'house_num' => 'บ้านเลขที่',
            'moo' => 'หมู่',
            'tmbpart' => 'ตำบล',
            'tambon' => 'ตำบล',
            'amppart' => 'อำเภอ',
            'ampart' => 'อำเภอ',
            'chwpart' => 'จังหวัด',
            'province' => 'จังหวัด',
            'education' => 'การศึกษา',
            'occupation' => 'อาชีพ',
            'chronic' => 'โรคประจำตัว',
            'religion' => 'ศาสนา',
            'fstatus' => 'สถานะภาพสมรส',
            'tel' => 'Tel.',
            'discharge' => 'สถานะการจำหน่าย',
            'ddischarge' => 'วันที่จำหน่าย',
            'update_status' => 'Update Status',
            'update_user' => 'Update User',
            'update_date' => 'Update Date',
            'survey_staff_id'=>'survey_staff_id',
            'survey_score'=>'survey_score',
            'survey_date'=>'survey_date',
            'ass_staff_id'=>'survey_staff_id',
            'ass_score'=>'survey_score',
            'ass_date'=>'survey_date',
            'nhso_score'=>'nhso_score',
            'nhso_score_staff_id'=>'nhso_score_staff_id',
            'nhso_score_date'=>'nhso_score_date',
            
            'educationaliasname'=>'ระดับการศึกษา',
            'occupationaliasname'=>'อาชีพ',
            'hmainname'=>'สถานพยาบาลหลัก',
            'chronicname'=>'โรคประจำตัว',
            'AdlgroupaliasName'=>'',
            'AdlassaliasName'=>'',
            'NhsogroupaliasName'=>''
            
        ];
    }
    public function getNhsogroupalias() {
        return @$this->hasOne(NhsoScore::className(), ['score' => 'nhso_score']);
    }
    public function getNhsogroupaliasName() {
        return @$this->nhsogroupalias->name;
    }
     public function getAdlassalias() {
        return @$this->hasOne(LAdlGroup::className(), ['score' => 'ass_score']);
    }
    public function getAdlassaliasName() {
        return @$this->adlassalias->group_name;
    }
     public function getAdlgroupalias() {
        return @$this->hasOne(LAdlGroup::className(), ['score' => 'survey_score']);
    }
    public function getAdlgroupaliasName() {
        return @$this->adlgroupalias->group_name;
    }
    public function getHmainalias() {
        return @$this->hasOne(Chospital::className(), ['hoscode' => 'hmain']);
    }
    public function getHmainName() {
        return @$this->hmainalias->hosname;
    }
    public function getChronicalias() {
        return @$this->hasOne(Cchronic::className(), ['id_chronic' => 'chronic']);
    }
    public function getChronicName() {
        return @$this->chronicalias->tchronic;
    }
    public function getEducationalias() {
        return @$this->hasOne(Ceducation::className(), ['educationcode' => 'education']);
    }
    public function getEducationaliasName() {
        return @$this->educationalias->educationname;
    }
     public function getOccupationalias() {
        return @$this->hasOne(Coccupation::className(), ['occupationcode' => 'occupation']);
    }
    public function getOccupationaliasName() {
        return @$this->occupationalias->occupationname;
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
            'fstatus' => array(
                '1' => 'โสด',
                '2' => 'คู่',
                '3' => 'หม้าย',
                '4'=>'หย่า',
                '5'=>'แยก',
                '6'=>'สมณะ',
                '9' => 'ไม่ทราบ',
            ),
           
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
}
