<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\nav\NavX;
use dektrium\user\models\User;
use dektrium\user\models\Profile;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
<?php 
if(Yii::$app->user->isGuest){
    $bar='';
}else {
  $p = Profile::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->one();  
    $bar=$p->name;
}

?>
        
        <div class="wrap">
            <?php
            NavBar::begin([
                //'brandLabel' => '<img src="../inc/bar_logo.gif" class="pull-left img-responsive " style="width: 50%"/>'.$bar,
                'brandLabel' => '<img src="../inc/bar_logo.gif"  height:32px class="pull-left"/>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo NavX::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                  //  ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'จัดการข้อมูลผู้สูงอายุ', 'items' => [
                            ['label' => 'นำเข้าข้อมูลผู้สูงอายุ', 'url' => ['#']],
                            ['label' => 'บันทึก/แก้ไขข้อมูลผู้สูงอายุ', 'url' => ['/person']],
                        ]],
                    ['label' => 'คัดกรอง/ประเมิน', 'items' => [
                            ['label' => 'คัดกรองจำแนกผู้สูงอายุตามศักยภาพ', 'url' => ['/survey']],
                        ['label' => 'ประเมินหาผู้สูงอายุที่มีภาวะพึ่งพิง(กลุ่ม 2,3)', 'url' => ['/ass-list']],
                        ['label' => 'ประเมินความต้องการได้รับการดูแลของผู้สูงอายุ', 'url' => ['/need-screen']],
                            
                        ]],
              
             Yii::$app->user->isGuest ?
['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
['label' => 'Account(' . Yii::$app->user->identity->username . ')', 'items'=>[
    ['label' => 'จัดการข้อมูล', 'url' => ['/user/settings/profile']],
    ['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
]],
['label' => 'ลงทะเบี่ยน', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'จัดการข้อมูลมาตรฐาน', 'items' => [
                           ['label' => 'RBAC', 'url' => ['admin/assignment']],
                        ['label' => 'จัดการสิทธิ', 'url' => ['/user/admin/index']],
                         ['label' => 'ข้อมูลผู้สำรวจ', 'url' => ['/ssurveystaff/create']],
                        ['label' => 'ข้อมูลเขตรับผิดชอบ', 'url' => ['/area/create']],
                        ['label' => 'ข้อมูล Caremanager', 'url' => ['/caremanager/create']],
                        ['label' => 'ข้อมูล CareGiver', 'url' => ['/caregiver/create']],
                        
                           
                        ]],
                  
                    ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
<?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
