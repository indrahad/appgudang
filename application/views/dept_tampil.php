<table>
	<thead>
		<tr>
			<th>Nama</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list_dept as $i => $row): ?>
			<tr>
				<td><?php echo $row->nm_dept ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>