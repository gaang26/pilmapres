<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>No.Pendaftaran</th>
        <th>Nama Peserta</th>
        <th>Asal Perguruan Tinggi</th>
        <th>Program Studi</th>
        <th>Jenjang</th>
        <th>Semester</th>
        <th>Judul KTI</th>
        <th>Topik Karya Ilmiah</th>
        <th>Golongan</th>
        <th>KTM</th>
        <th>Surat Pengantar</th>
        <th>KTI</th>
        <th>Prestasi</th>
        <th>Video</th>
        <th>Status</th>
        <th>Email</th>
        <th>HP</th>
        <th>Jenis Kelamin</th>
        <th>Kopertis</th>
    </tr>
    <?php
    $i=1;
    foreach($model as $data)
    {
    ?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $data->PIN;?></td>
        <td><?php echo strtoupper($data->NAMA);?></td>
        <td><?php echo $data->PT->NAMA;?></td>
        <td><?php echo $data->Prodi->NAMA_PRODI;?></td>
        <td><?php echo $data->JENJANG;?></td>
        <td><?php echo $data->SEMESTER;?></td>
        <td><?php echo $data->JUDUL_KTI;?></td>
        <td><?php echo ($data->Topik!=null)?$data->Topik->JUDUL:'';?></td>
        <td><?php echo $data->BIDANG;?></td>
        <td><?php echo $data->getStatusKTM();?></td>
        <td><?php echo $data->getStatusPengantar();?></td>
        <td><?php echo $data->getStatusKaryaTulis();?></td>
        <td><?php echo $data->getStatusPrestasi();?></td>
        <td><?php echo $data->getStatusVideo();?></td>
        <td><?php echo ($data->isComplete())?'COMPLETE':'INCOMPLETE'; ?></td>
        <td><?php echo $data->EMAIL; ?></td>
        <td><?php echo $data->HP; ?></td>
        <td><?php echo $data->JENIS_KELAMIN; ?></td>
        <td><?php echo $data->PT->KOPERTIS; ?></td>
    </tr>
    <?php
    $i++;
    }
    ?>
</table>
