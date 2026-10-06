<?php
require_once "services/config.php";
$data=$conn->query("SELECT p.*,k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori=k.id_kategori ORDER BY p.id_produk");
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Produk - Kasir Toko</title><link rel="stylesheet" href="style.css"></head>
<body><div class="layout"><aside class="sidebar"><h1>Kasir Toko</h1><p>Sistem Informasi Kasir Toko</p><nav><a href="index.php">Dashboard</a><a class="active" href="produk.php">Produk</a><a href="transaksi.php">Transaksi</a></nav></aside>
<main class="content"><div class="header"><div><small>DATA MASTER</small><h2>Produk</h2><p>Data produk dari database.</p></div></div><section class="panel"><table><thead><tr><th>ID</th><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr></thead><tbody>
<?php while($row=$data->fetch_assoc()): ?><tr><td><?php echo $row['id_produk']; ?></td><td><strong><?php echo htmlspecialchars($row['nama_produk']); ?></strong></td><td><?php echo htmlspecialchars($row['nama_kategori']); ?></td><td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td><td><?php echo $row['stok']; ?></td></tr><?php endwhile; ?>
</tbody></table></section></main></div></body></html>
