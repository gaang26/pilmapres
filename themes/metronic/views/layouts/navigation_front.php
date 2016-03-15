<!-- BEGIN TOP NAVIGATION MENU -->
<div class="nav-collapse collapse">
    <ul class="nav">
        <li class="<?php echo ($this->id=='site' && $this->action->id=='index')?'active':'';?>">
            <?php echo CHtml::link(
                '<i class="icon-home"></i> Beranda',
                array('/site/index')
            );?>
        </li>
        <!--
        <li><?php echo CHtml::link('<span class="icon-help"></span> Bantuan?',array('#helpModal'),array('data-toggle'=>'modal'));?></li> -->

        <?php
        if(!Yii::app()->user->isGuest){
        ?>
        <li class="dropdown <?php echo ($this->id=='kurikulum' || $this->id=='matkul')?'active':'';?>">
            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                <i class="icon-user"></i> User
                <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <?php echo CHtml::link(
                        'Ganti Password',
                        array('biodata/ubahpassword')
                    );?>
                </li>
                <li class="<?php echo ($this->id=='matkul')?'active':'';?>">
                    <?php echo CHtml::link(
                        'Logout',
                        array('/site/logout')
                    );?>
                </li>
            </ul>
        </li>
        <?php }?>
    </ul>
</div>
<!-- END TOP NAVIGATION MENU -->
