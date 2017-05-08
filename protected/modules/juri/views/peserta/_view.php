<?php if($data->isCompleteJuri()): ?>
<tr>
	<td><?php echo $index+1; ?></td>
	<td><?php echo $data->PIN; ?></td>
	<td><?php echo $data->NAMA; ?></td>
	<td><?php echo $data->PT->NAMA; ?></td>
	<td><?php echo $data->BIDANG; ?></td>
	<td><?php echo $data->getProdiView(); ?></td>
	<td><?php echo CHtml::link('<i class="fa fa-search"></i> Selengkapnya',array('peserta/view','id'=>$data->ID_PESERTA),array(
		'class'=>'btn btn-sm blue'
	)); ?></td>
</tr>
<?php else:?>
    <tr style="background-color: #f4bb51">
        <td><?php echo $index+1; ?></td>
        <td><?php echo $data->PIN; ?></td>
        <td><?php echo $data->NAMA; ?></td>
        <td><?php echo $data->PT->NAMA; ?></td>
        <td><?php echo $data->BIDANG; ?></td>
        <td><?php echo $data->getProdiView(); ?></td>
        <td><?php echo CHtml::link('<i class="fa fa-search"></i> Selengkapnya',array('peserta/view','id'=>$data->ID_PESERTA),array(
				'class'=>'btn btn-sm blue'
			)); ?></td>
    </tr>
<?php endif; ?>
