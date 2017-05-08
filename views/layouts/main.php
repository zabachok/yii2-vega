<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<?php if (isset($this->params['breadcrumbs'])): ?>
    <?=
    \yii\widgets\Breadcrumbs::widget(
        [
            'encodeLabels' => false,
            'homeLink' => [
                'label' => '<i class="fa fa-home" aria-hidden="true"></i> Home',
                'url' => '/',
            ],
            'links' => $this->params['breadcrumbs'],
        ]
    )
    ?>
<?php endif; ?>
<?= $content ?>
<?php $this->endContent(); ?>
