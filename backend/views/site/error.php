<?php

use common\helpers\Html;
use common\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->context->layout = 'guest';
?>
<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> <?= Html::encode($this->title) ?></h3>
        <p>
            <?php echo nl2br(Html::encode($message)) ?><br>
            We could not find the page you were looking for. Meanwhile, you may <a href="<?php echo Url::to(['/']); ?>">return to dashboard</a>.
        </p>
    </div>
</div>
