<!-- BEGIN BREADCRUMBS -->   
<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <div class="span5">
            <h1><?php echo $this->pageTitle;?></h1>
        </div>
        <div class="span7">
            <?php
            if($this->breadcrumbs){
                echo '<ul class="pull-right breadcrumb">';
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    //'homeLink'=>CHtml::link('Beranda',array('default/index')),
                    'tagName'=>'li',
                    'separator'=>'<span class="divider" style="color:#ccc;"> / </span>',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                ));
                echo '</ul>';
            }
            ?>
            <script type="text/javascript">
            $(document).ready(function(){
                $('li.breadcrumbs').removeAttr('class');
            })
            </script>
        </div>
    </div>
</div>
<!-- END BREADCRUMBS -->