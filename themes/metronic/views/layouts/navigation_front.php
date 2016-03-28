<!-- BEGIN TOP NAVIGATION MENU -->
<div class="nav-collapse collapse">
    <ul class="nav">
        <?php
        if(!Yii::app()->user->isGuest){
            if(WebUser::isPeserta()){
                ?>
                <li class="<?php echo ($this->id=='default' && $this->action->id=='index')?'active':'';?>">
                    <?php echo CHtml::link(
                        '<i class="icon-home"></i> BERANDA',
                        array('/peserta/default/index')
                    );?>
                </li>
                <li class="dropdown <?php echo ($this->id=='default' && $this->action->id=='resetpassword')?'active':'';?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                        <i class="icon-user"></i> <?php echo Yii::app()->user->getState('nama'); ?>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <?php echo CHtml::link(
                                'Ganti Password',
                                array('/peserta/biodata/ubahpassword')
                            );?>
                        </li>
                        <li>
                            <?php echo CHtml::link('<span class="icon-help"></span> Bantuan?',array('#helpModal'),array('data-toggle'=>'modal'));?>
                        </li>
                        <li>
                            <?php echo CHtml::link(
                                'Logout',
                                array('/peserta/default/logout')
                            );?>
                        </li>
                    </ul>
                </li>
                <?php
            }else if(WebUser::isUserPT()){
                ?>
                <li class="<?php echo ($this->id=='default' && $this->action->id=='index')?'active':'';?>">
                    <?php echo CHtml::link(
                        '<i class="icon-home"></i> BERANDA',
                        array('/pt/default/index')
                    );?>
                </li>
                <li class="dropdown <?php echo ($this->id=='default' && $this->action->id=='resetpassword')?'active':'';?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                        <i class="icon-user"></i> <?php echo strtoupper(Yii::app()->user->getState('nama')); ?>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li>
                            <?php echo CHtml::link(
                                'Ganti Password',
                                array('/pt/biodata/ubahpassword')
                            );?>
                        </li>
                        <li>
                            <?php echo CHtml::link('<span class="icon-help"></span> Bantuan?',array('#helpModal'),array('data-toggle'=>'modal'));?>
                        </li>
                        <li>
                            <?php echo CHtml::link(
                                'Logout',
                                array('/pt/default/logout')
                            );?>
                        </li>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>
<!-- END TOP NAVIGATION MENU -->
