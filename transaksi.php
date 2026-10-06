<?php
require_once "services/config.php";
$data=$conn->query("SELECT t.*,p.nama_produk FROM transaksi t JOIN produk p ON t.id_produk=p.id_produk ORDER BY t.id_transaksi DESC");
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Transaksi - Kasir Toko</title><link rel="stylesheet" href="style.css"></head>
<body><div class="layout"><aside class="sidebar"><h1>Kasir Toko</h1><p>Sistem Informasi Kasir Toko</p><nav><a href="index.php">Dashboard</a><a href="produk.php">Produk</a><a class="active" href="transaksi.php">Transaksi</a></nav></aside>
<main class="content"><div class="header"><div><small>TRANSAKSI</small><h2>Riwayat Transaksi</h2><p>Data transaksi dari database.</p></div></div><section class="panel"><table><thead><tr><th>ID</th><th>Produk</th><th>Jumlah</th><th>Total</th><th>Tanggal</th></tr></thead><tbody>
<?php while($row=$data->fetch_assoc()): ?><tr><td><?php echo $row['id_transaksi']; ?></td><td><strong><?php echo htmlspecialchars($row['nama_produk']); ?></strong></td><td><?php echo $row['jumlah']; ?></td><td>Rp <?php echo number_format($row['total'],0,',','.'); ?></td><td><?php echo $row['tanggal']; ?></td></tr><?php endwhile; ?>
</tbody></table></section></main></div></body></html>
