<?php

namespace app\models;

use Yii;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class NeedScreen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'need_screen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['need_screen_date','oapp_p','oapp_date','caremanager_id'], 'required'],
            [['create_by'], 'integer'],
            [['create_date', 'need1_1','need1_2','need1_3','need1_3_2'
                ,'need2_1','need2_2','need2_3','need2_4','need2_5'
                ,'need_other','caremanager_id','oapp_p','oapp_date','need_screen_date'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['hcode'], 'string', 'max' => 255],
        ];
    }
      public function scenarios() {

        $scenarios = parent::scenarios();

        $scenarios['page1'] = ['id','create_by','create_date','need_screen_date','cid','hcode','need1_1'];
        $scenarios['page2'] = ['need1_2','need1_3','need1_3_2','need2_1','need2_2'];
        $scenarios['page3'] = ['need2_3','need2_4','need2_5','need_other','oapp_p','oapp_date','caremanager_id'];
        
        return $scenarios;
    }
    
public function behaviors()
{
    return [
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need1_1',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need1_1',
            ],
            'value' => function ($event) {
         if($this->need1_1<>''){
                return implode(',', $this->need1_1);
         }
            },
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need1_2',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need1_2',
            ],
            'value' => function ($event) {
                if($this->need1_2<>''){
                return implode(',', $this->need1_2);
                }
            },
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need1_3',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need1_3',
            ],
            'value' => function ($event) {
                if($this->need1_3<>''){
                return implode(',', $this->need1_3);
                }
            },
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need1_3_2',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need1_3_2',
            ],
            'value' => function ($event) {
                if($this->need1_3_2<>''){
                return implode(',', $this->need1_3_2);
                }
            },
        ],            
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need2_1',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need2_1',
            ],
            'value' => function ($event) {
                if($this->need2_1<>''){
                return implode(',', $this->need2_1);
                }
            },
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need2_2',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need2_2',
            ],
            'value' => function ($event) {
                if($this->need2_2<>''){
                return implode(',', $this->need2_2);
                }},
        ],
                        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need2_3',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need2_3',
            ],
            'value' => function ($event) {
                if($this->need2_3<>''){
                return implode(',', $this->need2_3);
                }},
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need2_4',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need2_4',
            ],
            'value' => function ($event) {
                if($this->need2_4<>''){
                return implode(',', $this->need2_4);
                }},
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'need2_5',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'need2_5',
            ],
            'value' => function ($event) {
                if($this->need2_5<>''){
                return implode(',', $this->need2_5);
                }},
        ],                
    ];
}
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'hcode' => 'Hcode',
            'create_by' => 'Create By',
            'create_date' => 'Create Date',
            'need1_1' => '1.1 การตรวจรักษาเพิ่มเติมจากแพทย์ หรือพยาบาลเกี่ยวกับ',
            'need1_2' => '1.2 การได้รับเครื่องมือ/อุปกรณ์ช่วย',
            'need1_3' => 'นักกิจกรรมบำบัด ในหัวข้อบริการ::',
            'need1_3_2' => 'นักกิจกายภาพ ในหัวข้อบริการ::',
            'need2_1' => '2.1 ผู้สูงอายุต้องการผู้ดูแลลักษณะใด'
            ,'need2_2' => '2.2 รูปแบบการบริการในบ้าน คือ ผู้ดูแลฝึกและช่วยเหลือในด้าน',
            'need2_3' => '2.3 รูปแบบการบริการในชุมชน/เครือข่ายด้าน'
            ,'need2_4' => '2.4 การปรับสภาพแวดล้อมและ/หรือการปรับสภาพบ้านและ/หรือการจัดซื้อและ/หรือการจัดจ้างทําอุปกรณ์',
            'need2_5' => '2.5 การหารายได้และความมั่นคงในครอบครัว'
            ,'need_other' => 'ความต้องการอื่นๆ (ระบุ)',
            'caremanager_id'=>'ชื่อ - สกุล ผู้ประเมิน','oapp_p'=>'นัดหมายเพื่อประเมินซ้ำภายใน',
            'oapp_date'=>'วันที่นัดหมายในการประเมินครั้งต่อไป','need_screen_date'=>'วันที่ทำการประเมินความต้องการ'
            
        ];
    }
    //////////for upadate
    public function need1_1ToArray()
{
  return $this->need1_1 = explode(',', $this->need1_1);
}
    public function need1_2ToArray()
{
  return $this->need1_2 = explode(',', $this->need1_2);
}
    public function need1_3ToArray()
{
  return $this->need1_3 = explode(',', $this->need1_3);
}
 public function need1_3_2ToArray()
{
  return $this->need1_3_2 = explode(',', $this->need1_3_2);
}
   public function need2_1ToArray()
{
  return $this->need2_1 = explode(',', $this->need2_1);
}
   public function need2_2ToArray()
{
  return $this->need2_2 = explode(',', $this->need2_2);
}
   public function need2_3ToArray()
{
  return $this->need2_3 = explode(',', $this->need2_3);
}
   public function need2_4ToArray()
{
  return $this->need2_4 = explode(',', $this->need2_4);
}
   public function need2_5ToArray()
{
  return $this->need2_5 = explode(',', $this->need2_5);
}
/////////////
 public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'c_oapp_p' => array(
                '1 เดือน' => '1 เดือน',
                '2 เดือน' => '2 เดือน',
                '3 เดือน' => '3 เดือน',
                
            ),
                   
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }


}
