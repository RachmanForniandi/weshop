<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my-profile&module=kategori&action=form"; ?>" class="tombol-action">+ Tambah Kategori</a>
</div>

<?php 
	$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] :1;
	$data_per_halaman = 3;
	$mulai_dari = ($pagination-1) * $data_per_halaman;

	$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT $mulai_dari, $data_per_halaman");
	
	if(mysqli_num_rows($queryKategori)==0){
		echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
	}else{
		
		echo "<table class='table-list'>";
		
		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Kategori</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			  </tr>";
			  
	$no=1 + $mulai_dari;
	while($row= mysqli_fetch_assoc($queryKategori)){
		echo "<tr>
				<td class='kolom-nomor'>$no</td>
				<td class='kiri'>$row[kategori]</td>
				<td class='tengah'>$row[status]</td>
				<td class='tengah'>
					<a class= 'tombol-action' href='".BASE_URL."index.php?page=my-profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
				</td>
			  </tr>";
			  
			  $no++;
		}
	echo "</table>";

	$queryHitungKategori="SELECT * FROM kategori";
	pagination($queryHitungKategori, $data_per_halaman, $pagination,"index.php?page=my-profile&module=kategori&action=list");
	}
?>