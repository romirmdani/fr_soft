<nav class="navbar-inverse navbar-fixed-top" style="font-size: 120%;">
	<div class="container" style="padding: 0px;">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index_user.php">FR Soft</a>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 <ul class="nav navbar-nav">				

				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-database"></i> Data
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=data_barang"> Data Barang</a></li>
						<li><a href="index.php?p=video">Data Gudang</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=galeri">Data Customer</a></li>
						<li><a href="index.php?p=video">Data Suplier</a></li>
						<li><a href="index.php?p=video">Data Salesman</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=video">Data Tipe Bayar</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-basket"></i> Pembelian
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=anggota">Faktur Pembelian</a></li>
						<li><a href="index.php?p=galeri">Pembayaran Pembelian</a></li>
						<li><a href="index.php?p=video">Retur Pembelian</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-hand-holding-usd"></i> Penjualan
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=anggota">Faktur Penjualan</a></li>
						<li><a href="index.php?p=galeri">Pembayaran Penjualan</a></li>
						<li><a href="index.php?p=video">Retur Penjualan</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-random"></i> Persediaan Barang
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=anggota">Kartu persedian Barang</a></li>
						<li><a href="index.php?p=galeri">Perpindahan Barang</a></li>
						<li><a href="index.php?p=video">Penyesuaian Barang</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-funnel-dollar"></i> Keuangan
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=anggota">Kas Masuk</a></li>
						<li><a href="index.php?p=galeri">Kas Keluar</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=video">Bank Masuk</a></li>
						<li><a href="index.php?p=video">Bank Keluar</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-file-signature"></i> Laporan
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=anggota">Persediaan Barang</a></li>
						<li><a href="index.php?p=galeri">Nilai Persedian Barang</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=video">Hutang</a></li>
						<li><a href="index.php?p=video">Piutang</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=video">Kas/Bank Harian</a></li>
						<li><a href="index.php?p=video">Laba Rugi</a></li>
						<li class="divider"></li>
						<li><a href="index.php?p=video">Analisa Penjualan</a></li>
						<li><a href="index.php?p=video">Analisa Pembelian</a></li>
					</ul>
				</li>

			
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php $nm=$b['USERNAME']; 
				$sub_nm = substr($nm,0,15);
			echo strtoupper( $sub_nm);
				?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?p=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>

			</li>
		</div>
	</div>
</nav>