<?php
	echo "<h1>Daftar Dosen</h1>";
	echo "<table>
	         <tr>
			    <th>NIP</th>
				<th>Nama</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>";
	foreach($d as $row){
$link = anchor(site_url("dosen/show/$row->nip"),"Detil");
		echo "<tr>
		         <td>{$row->nip}</td>
				 <td>{$row->nama}</td>
<td><img src=\"/ci/uploads/{$row->foto}\"></td>
				 <td>$link</td>
			</tr>";
	}
	echo "</table>";
?>