<?php

use backend\assets\AppAsset;
use common\helpers\Html;
use common\helpers\Url;
use common\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
list($path, $link) = $this->getAssetManager()->publish('@vendor/almasaeed2010/adminlte');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link href="<?php echo $link.'/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo $link.'/dist/css/AdminLTE.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo $link.'/plugins/iCheck/square/blue.css'; ?>" rel="stylesheet">
    <link href="<?php echo $link.'/dist/css/skins/_all-skins.min.css'; ?>" rel="stylesheet">

    <?php $this->head() ?>

    <script src="<?php echo $link.'/plugins/jQuery/jquery-2.2.3.min.js'; ?>"></script>
    <script src="<?php echo $link.'/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo $link.'/plugins/iCheck/icheck.min.js'; ?>"></script>
</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>

<?= $content ?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
