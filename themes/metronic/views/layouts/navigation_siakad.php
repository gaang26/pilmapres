<!-- BEGIN TOP NAVIGATION MENU -->
<div class="nav-collapse collapse">
    <ul class="nav">
        <li class="<?php echo ($this->id=='site' && $this->action->id=='index')?'active':'';?>">
            <?php echo CHtml::link(
                'Beranda',
                array('default/index')
            );?>
        </li>
        <?php
        if(WebUserSiakad::isMahasiswa()){
            ?>
            <li class="<?php echo ($this->id=='rencanastudi')?'active':'';?>">
                <?php echo CHtml::link(
                    'Rencana Studi',
                    array('rencanastudi/index')
                );?>
            </li>
            <?php
        }
        ?>
        <?php
        if(WebUserSiakad::isKaryawan()){
            ?>
            <!-- <li class="<?php echo ($this->id=='registrasi')?'active':'';?>">
                <?php echo CHtml::link(
                    'Kurikulum',
                    array('kurikulum/index')
                );?>
            </li> -->
            <li class="dropdown <?php echo ($this->id=='kurikulum' || $this->id=='matkul')?'active':'';?>">
                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                    Kurikulum
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo ($this->id=='matkul')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Mata Kuliah',
                            array('matkul/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='kurikulum')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Kurikulum Semester',
                            array('kurikulum/index')
                        );?>
                    </li>
                </ul>
            </li>
            <li class="dropdown <?php echo ($this->id=='kelas' || $this->id=='rencanastudi' || $this->id=='hasilstudi')?'active':'';?>">
                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                    Rencana Studi
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo ($this->id=='kelas')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Entri Data Kelas Matkul',
                            array('kelas/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='rencanastudi')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Entri Data Rencana Studi',
                            array('rencanastudi/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='hasilstudi')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Entri Nilai Hasil Studi',
                            array('hasilstudi/index')
                        );?>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                    Laporan
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo ($this->id=='mahasiswa')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Mahasiswa',
                            array('mahasiswa/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='dosen')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Dosen',
                            array('dosen/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='tenagapendidik')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Tenaga Pendidik',
                            array('tenagapendidik/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='ruangan')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Ruangan Kelas',
                            array('ruangan/index')
                        );?>
                    </li>
                </ul>
            </li>
            <li class="dropdown <?php echo ($this->id=='prodi' || $this->id=='mahasiswa' || $this->id=='dosen' || $this->id=='tenagapendidik' || $this->id=='ruangan')?'active':'';?>">
                <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                    Lain-lain
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo ($this->id=='prodi')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Program Studi',
                            array('prodi/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='mahasiswa')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Mahasiswa',
                            array('mahasiswa/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='dosen')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Dosen',
                            array('dosen/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='tenagapendidik')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Tenaga Pendidik',
                            array('tenagapendidik/index')
                        );?>
                    </li>
                    <li class="<?php echo ($this->id=='ruangan')?'active':'';?>">
                        <?php echo CHtml::link(
                            'Data Ruangan Kelas',
                            array('ruangan/index')
                        );?>
                    </li>
                </ul>
            </li>
            
            <?php
        }
        ?>
        <li class="menu-search">
            <span class="sep"></span>
            <i class="icon-search search-btn"></i>
        </li>
    </ul>
    <div class="search-box">
        <div class="input-append">
            <form>
                <input style="background:#fff;" class="m-wrap" type="text" placeholder="Search" />
                <button type="submit" class="btn theme-btn">Go</button>
            </form>
        </div>
    </div>                            
</div>
<!-- END TOP NAVIGATION MENU -->