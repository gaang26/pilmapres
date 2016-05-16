<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="<?php echo ($this->id=='default' && $this->action->id=='index')?'active':''?>">
                <?php echo CHtml::link('<i class="icon-home"></i> <span class="title">Dashboard</span>',array('default/index')); ?>
            </li>
            <li class="<?php echo ($this->id=='peserta')?'active':''?>">
                <?php echo CHtml::link('<i class="icon-graduation"></i> <span class="title">Peserta</span>',array('peserta/index')); ?>
            </li>
            <li class="<?php echo ($this->id=='jadwal' && $this->action->id=='index')?'active':''?>">
                <?php echo CHtml::link('<i class="icon-calendar"></i> <span class="title">Jadwal</span>',array('jadwal/index')); ?>
            </li>
            <li class="<?php echo ($this->id=='berita' && $this->action->id=='index')?'active':''?>">
                <?php echo CHtml::link('<i class="icon-info"></i> <span class="title">Berita & Informasi</span>',array('berita/index')); ?>
            </li>
            <li class="<?php echo ($this->id=='user')?'active':''?>">
                <a href="javascript:;">
                <i class="icon-users"></i>
                <span class="title">Manajemen User</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ($this->id=='user' && $this->action->id=='admin')?'active':''?>">
                        <?php echo CHtml::link('<i class="icon-user"></i> <span class="title">User Admin</span>',array('user/admin')); ?>
                    </li>
                    <li class="<?php echo ($this->id=='user' && $this->action->id=='juri')?'active':''?>">
                        <?php echo CHtml::link('<i class="icon-user"></i> <span class="title">User Juri</span>',array('user/juri')); ?>
                    </li>
                    <li class="<?php echo ($this->id=='user' && $this->action->id=='kopertis')?'active':''?>">
                        <?php echo CHtml::link('<i class="icon-user"></i> <span class="title">User Kopertis</span>',array('user/kopertis')); ?>
                    </li>
                    <li class="<?php echo ($this->id=='user' && $this->action->id=='pt')?'active':''?>">
                        <?php echo CHtml::link('<i class="icon-user"></i> <span class="title">User Perguruan Tinggi</span>',array('user/pt')); ?>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($this->id=='pt' && $this->action->id=='index')?'active':''?>">
                <?php echo CHtml::link('<i class="icon-list"></i> <span class="title">Perguruan Tinggi</span>',array('pt/index')); ?>
            </li>
            <!-- <li class="active">
                <a href="index.html">
                <i class="icon-list"></i>
                <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="index-boxed.html">
                <i class="icon-layers"></i>
                <span class="title">Boxed Page Layout</span>
                </a>
            </li>
            <li>
                <a href="profile.html">
                <i class="icon-user"></i>
                <span class="title">User Profile</span>
                </a>
            </li>
            <li>
                <a href="todo.html">
                <i class="icon-check"></i>
                <span class="title">Todo</span>
                </a>
            </li>
            <li>
                <a href="timeline.html">
                <i class="icon-paper-plane"></i>
                <span class="title">Timeline</span>
                </a>
            </li>
            <li>
                <a href="compatibility.html">
                <i class="icon-puzzle"></i>
                <span class="title">Compatibility</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Multi Level Menu</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-settings"></i> Item 1 <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                <i class="icon-user"></i>
                                Sample Link 1 <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#"><i class="icon-power"></i> Sample Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-star"></i> Sample Link 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-camera"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-link"></i> Sample Link 2</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-globe"></i> Item 2 <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><i class="icon-tag"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-graph"></i> Sample Link 1</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <i class="icon-bar-chart"></i>
                        Item 3 </a>
                    </li>
                </ul>
            </li> -->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
