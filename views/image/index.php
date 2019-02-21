<?php

use yii\helpers\Html;

$this->title = 'Image';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <?php foreach ($image as $single): ?>
            <div class="col-lg-2" style="margin-bottom: 10px;">

                <img src="<?= Html::encode("{$single->image_path}") ?>" style="width: 160px; height: 100px;"
                     title="<?= Html::encode("{$single->title}") ?>">
                <span><?= Html::a('Update', ['update', 'id' => $single->id], ['class' => 'label label-default', 'data-method' => 'POST']) ?></span>
                <span><?= Html::a('Delete', ['delete', 'id' => $single->id], ['class' => 'label label-danger', 'data-method' => 'POST']) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
