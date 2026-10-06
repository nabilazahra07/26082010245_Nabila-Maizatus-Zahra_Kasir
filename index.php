<?php
require_once "services/config.php";
$produk = $conn->query("SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori=k.id_kategori ORDER BY p.id_produk");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kasir Toko - Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="layout">
<aside class="sidebar">
<h1>Kasir Toko</h1><p>Sistem Informasi Kasir Toko</p>
<nav>
<a class="active" href="index.php">Dashboard</a>
<a href="produk.php">Produk</a>
<a href="transaksi.php">Transaksi</a>
</nav>
</aside>
<main class="content">
<div class="header"><div><small>WEBSITE KASIR</small><h2>Dashboard</h2><p>Kelola data produk dan transaksi.</p></div><span class="status">● Database Terhubung</span></div>
<div class="cards">
<div class="card"><span>Total Produk</span><b><?php echo $conn->query("SELECT COUNT(*) t FROM produk")->fetch_assoc()['t']; ?></b></div>
<div class="card"><span>Total Kategori</span><b><?php echo $conn->query("SELECT COUNT(*) t FROM kategori")->fetch_assoc()['t']; ?></b></div>
<div class="card"><span>Total Transaksi</span><b><?php echo $conn->query("SELECT COUNT(*) t FROM transaksi")->fetch_assoc()['t']; ?></b></div>
</div>
<section class="panel">
<div class="panel-title"><div><h3>Daftar Produk</h3><p>Data diambil langsung dari MySQL.</p></div><a class="button" href="produk.php">Lihat Produk</a></div>
<table><thead><tr><th>ID</th><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr></thead><tbody>
<?php while($row=$produk->fetch_assoc()): ?>
<tr><td><?php echo $row['id_produk']; ?></td><td><strong><?php echo htmlspecialchars($row['nama_produk']); ?></strong></td><td><?php echo htmlspecialchars($row['nama_kategori']); ?></td><td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td><td><?php echo $row['stok']; ?></td></tr>
<?php endwhile; ?>
</tbody></table>
</section>
</main></div>
</body></html>
