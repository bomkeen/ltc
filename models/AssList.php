<?php

namespace app\models;

use Yii;
use app\models\NhsoScore;

class AssList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ass_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_d1','s_d2','s_d3','s_d4','s_d5','s_d6','s_d7','s_d8','s_d9', 's_d10'], 'required'],
            [[ 's_d1', 's_d2', 's_d3', 's_d4', 's_d5', 's_d6', 's_d7', 's_d8', 's_d9', 's_d10', 's_sum', 'nhso_score'], 'integer'],
            [['create_date','create_by','ass_staff_id',], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['hcode'], 'string', 'max' => 5],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'hcode' => 'Hcode',
            'ass_staff_id' => 'ผู้ประเมิน',
            'create_by' => 'Create By',
            'create_date' => 'วันที่ทำการสำรวจ',
            's_d1' => '1.Feeding (รับประทานอาหารเมื่อเตรียมสารับไว้ให้เรียบร้อยต่อหน้า)',
            's_d2' => '2.Grooming (ล้างหน้า หวีผม แปรงฟัน โกนหนวด ในระยะเวลา 24-28 ชั่วโมงที่ผ่านมา)',
            's_d3' => '3.Transfer (ลุกนั่งจากที่นอน หรือจากเตียงไปยังเก้าอี้)',
            's_d4' => '4.Toilet use (ใช้ห้องน้า)',
            's_d5' => '5.Mobility (การเคลื่อนที่ภายในห้องหรือบ้าน)',
            's_d6' => '6.Dressing (การสวมใส่เสื้อผ้า)',
            's_d7' => '7.Stairs (การขึ้นลงบันได 1 ชั้น)',
            's_d8' => '8.Bathing (การอาบน้า)',
            's_d9' => '9.Bowels (การกลั้นการถ่ายอุจจาระในระยะ 1 สัปดาห์ที่ผ่านมา)',
            's_d10' => '10.Bladder (การกลั้นปัสสาวะในระยะ 1 สัปดาห์ที่ผ่านมา)',
            's_sum' => 'ผลรวมคะแนน',
            'nhso_score' => 'Nhso Score',
            
            'nhsoname'=>'ประเมินกลุ่มผู้สูงอายุ'
        ];
    }
     public function getAdlgroupalias() {
        return @$this->hasOne(LAdlGroup::className(), ['score' => 's_sum']);
    }
    public function getAdlgroupaliasName() {
        return @$this->adlgroupalias->group_name;
    }
      public function getNhsonamealias() {
        return @$this->hasOne(NhsoScore::className(), ['score' => 'nhso_score']);
    }
    public function getNhsoName() {
        return @$this->nhsonamealias->name;
    }
}
