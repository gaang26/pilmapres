<?php
$this->pageTitle = 'Karya Tulis Ilmiah';
$this->breadcrumbs = array(
    'Beranda'=>array('default/index'),
    $this->pageTitle
);
?>
<?php $this->renderPartial('../default/_step'); ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
