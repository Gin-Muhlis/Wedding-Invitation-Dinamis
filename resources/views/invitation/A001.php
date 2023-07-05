<!DOCTYPE html>
<html lang="id" >
<head>
    <?php foreach ($mempelai->getResult() as $row){ ?>
    <title><?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?> </title> 

	<!-- REQUIRED META AREA	 -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#f5f6fa" />
    <meta property="og:title" content="<?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?>">
    <meta property="og:description" content="<?php
    echo 'Hello ' . $invite . '! Kamu Di Undang..';
    ?>">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website" />
    <?php }?>

	<!-- CSS STYLE AREA	 -->
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.png?<?= date("Y-m-d"); ?>">
    <link href="<?php echo base_url() ?>/assets/themes/blueroses/css/bootstrap.min.css?SIDOINIKAHV2" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/themes/blueroses/css/jquery.fancybox.css?SIDOINIKAHV2" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/blueroses/mdi/css/materialdesignicons.min.css?SIDOINIKAHV2">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/blueroses/css/style.css?SIDOINIKAHV2">

    
</head>

<body>

<!-- ============== HALAMAN AWAL =============== -->
<div class="thebegining">
	<div class="content-thebegining">
		<img src="<?php echo base_url() ?>/assets/base/img/logo2.png" style="width:100px;height: 100px;"> <br>		
	</div>

	<div class="salam">
		<a style="font-weight: bold;font-size: 30px;color: #2f3640;">Hello!</a><br>
		<a style="font-weight: normal;font-size:18px;"><?php 
        if(!empty($invite)){
            echo $invite;
        }
        ?></a><br>
		<a style="font-weight: normal;font-size:18px;color: #2f3640;font-family: sans-serif;">You are invited to our wedding party!</a>	
	</div>
		<a style="font-weight: bold;font-size: 16px;color: #2f3640;position: absolute;bottom: 20px;right: 0;left: 0;">klik untuk membuka undangan</a>
</div>		

<div class="dekorasi-all">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/blueroses/img/top_flower.png" class="imgatas">  -->

	<!-- GAMBAR DEKORASI KIRI -->
	<img src="<?php echo base_url() ?>/assets/themes/blueroses/img/kiri-atas.png" class="imgatas-kiri">
	<!-- GAMBAR DEKORASI KANAN --> 
	<!-- <img src="<?php echo base_url() ?>/assets/themes/blueroses/img/kanan-atas.png" class="imgatas-kanan">  -->
</div>

<div class="dekorasi-sampul">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/blueroses/img/top_flower.png" class="imgatas">  -->
	
	<!-- GAMBAR DEKORASI KIRI -->
	<!-- <img src="<?php echo base_url() ?>/assets/themes/blueroses/img/kiri-atas.png" class="imgatas-kiri"> -->
	<!-- GAMBAR DEKORASI KANAN --> 
	<!-- <img src="<?php echo base_url() ?>/assets/themes/blueroses/img/kanan-atas.png" class="imgatas-kanan"> -->
</div>

<div id="konten" style="z-index: 1;">

    <?php foreach ($data->getResult() as $row){
        $kunci = $row->kunci;
		$youtube = $row->video;
		$salam_pembuka = $row->salam_pembuka;
		$musiknya = "/assets/users/".$kunci."/musik.mp3";
		$maps = $row->maps;
    }
	?>

	<!-- ============== MUSIK =============== -->
	<audio loop src="<?php echo base_url() ?><?= $musiknya ?>" id="audio" ></audio>
	<?php foreach ($mempelai->getResult() as $row){  ?>
	
	<!-- ============== SAMPUL =============== -->	
	<div id="sampul-konten" class="konten" >                	
      	<table style="width: 100%;margin-top:-50px"> <!-- tambahkan margin-top:-XX jika kurang ketas -->
      		<tbody>
      		 <tr>
                <th style="text-align: center;">
                    <span class="the-wedding">- THE WEDDING OF -</span>
                </th>
            </tr>

			<tr>
      			<th style="text-align: center;margin-bottom:-15px;display: block;">
                    <span class="nama-mempelai"><?php echo $row->nama_panggilan_pria; ?> & <?php echo $row->nama_panggilan_wanita; ?></span>
                </th>
			</tr>
			<tr>
      			<th style="text-align: center;">
				  <span class="tanggal-weddingnya" ></span>   
                </th>
      		</tr>
            
			<tr>
                <th style="position: relative;text-align: center;display:block;margin-top:40px">
					<img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png" class="cover-foto"/>
					
					<!-- image border cover -->
                    <img src="<?= base_url() ?>/assets/themes/blueroses/img/bg-flower.png" class="cover-border" /><br>
					<!-- image border cover -->

                </th>
			</tr>
			
      		</tbody>
      	</table>
    </div>
	
	<!-- ============== MEMPELAI =============== -->
    <div id="mempelai-konten" class="konten" style="display: none;">   
		<img src="<?php echo base_url() ?>/assets/base/img/bismillah.png" class="mempelai-salam-pembuka"/><br>
        <p class="mempelai-intermezzo" ><?= $salam_pembuka ?></p>

        <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png" class="mempelai-img" />

        <h1 class="mempelai-pria-nama"><?php echo $row->nama_pria; ?></h1>
        <p class="mempelai-pria-ortu"><?php echo "Putra ".$row->nama_ayah_pria . " dan " .$row->nama_ibu_pria  ?></p> 
        <h1 class="dengan">dengan</h1>

        <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png" class="mempelai-img"/>

        <h1 class="mempelai-wanita-nama"><?php echo $row->nama_wanita; ?></h1>
        <p class="mempelai-wanita-ortu"><?php echo "Putri ".$row->nama_ayah_wanita . " dan " .$row->nama_ibu_wanita  ?></p>

    </div>
    <?php } ?>  

	<!-- ============== ACARA =============== -->
	<?php 
	
	foreach ($acara->getResult() as $row){ 
		$tanggal_akad =  $row->tanggal_akad;
		$tanggal_resepsi =  $row->tanggal_resepsi;
	?>
    <div id="acara-konten" style="display: none;" class="konten">

    	<div class="section-title">
            <h2> Acara </h2>
	    </div>

	    <div class="acaranya" >
			<table class="tb-acara">
				<thead>
					<th colspan="4" class="acara-title">
						<!-- <img src="<?php echo base_url() ?>/assets/themes/blueroses/img/akad-badge.png"> -->

						- AKAD NIKAH -
					</th>
				</thead>
				<tbody>
					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-calendar icon-acara" ></th>
						<th class="tb-ket-acara"> Tanggal</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara" id="tanggal-acara-akad"><?php echo $row->tanggal_akad; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-timer icon-acara" ></th>
						<th class="tb-ket-acara"> Jam</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row->jam_akad; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-map-marker icon-acara" ></th>
						<th class="tb-ket-acara"> Tempat</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row->tempat_akad; ?><br><?php echo $row->alamat_akad; ?></th>
					</tr>


				</tbody>
			</table>		

			<table class="tb-acara">
				<thead>
					<th colspan="4" class="acara-title">
						
					<!-- <img src="<?php echo base_url() ?>/assets/themes/blueroses/img/resepsi-badge.png"> -->

					- RESEPSI -
					</th>
				</thead>
				<tbody>
					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-calendar icon-acara"></th>
						<th class="tb-ket-acara"> Tanggal</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara " id="tanggal-acara-resepsi"><?php echo $row->tanggal_resepsi; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-timer icon-acara" ></th>
						<th class="tb-ket-acara"> Jam</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row->jam_resepsi; ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-map-marker icon-acara" ></th>
						<th class="tb-ket-acara"> Tempat</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?php echo $row->tempat_resepsi; ?><br><?php echo $row->alamat_resepsi; ?></th>
					</tr>


				</tbody>
			</table>			
		</div>
    </div>
    <?php } ?> 

	<!-- ============== ALBUM =============== -->
	<div id="album-konten" style="display: none;">
		<section class="gallery-section section-padding" id="gallery">
				<div class="container">
					<div class="row">
						<div class="col col-xs-12">
							<div class="section-title">
								<h2>Gallery Foto Kami</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col col-xs-12">
							<div class="gallery-grids">

							<?php  foreach($album as $key => $data) {  ?>

								<div class="grid">
									<a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album'] ?>.png" class="fancybox" data-fancybox-group="gall-1">
										<img src="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png" alt>
									</a>
								</div>

							<?php } ?>

							</div>
							
						</div>
						
						<?php if($youtube != ""){ 
								$embed = str_replace("youtu.be","www.youtube.com/embed","$youtube");
								$unik = str_replace("https://youtu.be","","$youtube");
								$unikfinal = str_replace("/","","$unik");
						?>
						<div class="col col-xs-12">
							<div class="youtube">
									<a href="<?php echo $embed; ?>" data-type="iframe" class="video-play-btn">
										<img src="https://img.youtube.com/vi/<?php echo $unikfinal; ?>/maxresdefault.jpg" alt class="img img-responsive">
										<i class="mdi mdi-play"></i>
									</a>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
		</section>
	</div>
	
	<!-- ============== UACAPAN/KOMENTAR =============== -->
    <div id="ucapan-konten" style="display: none;" class="konten">
    	
    	<div class="col-12 ucapan-field">
            <div class="section-title">
				<h2>Beri Ucapan</h2>
			</div>
	                <div class="row">
	                    <div class="col-12">
		                    <div class="form-group">
		                        <input id="nama" type="text" class="form-control mt-2" placeholder="Nama Anda" value="<?= $invite ?>" required>
		                    </div>
	                    </div>
	                    <div class="col-12">
		                    <div class="form-group">
		                        <textarea id="komentar" class="form-control" id="exampleFormControlTextarea1" placeholder="Pesan anda.." rows="3" required></textarea>
		                    </div>
	                    </div>
	                    <div class="col-12">
	                    	<button id="submitKomen" class="btn btn-primary btn-block" >Kirim</button>
							<img src="<?= base_url() ?>/assets/base/img/loadinga.svg" height="30px" style="display:none;" id="loading_">
	                    </div>
	                </div>
        </div>
        <div class="komen-netizen" >
			
			<div class="layout-komen">				
				<?php  foreach($komen as $key => $data) { ?>
				<div class="komen" >
					<div class="col-12 komen-nama">
						<?= \esc($data['nama_komentar']); ?>
					</div>
					<div class="col-12 komen-isi">
						<?= \esc($data['isi_komentar']); ?>
					</div>
				</div>
				<?php } ?> 
			</div>

			<a href="#" id="loadMore" class="btn btn-primary btn-block" role="button">Lebih Banyak.</a>
        </div>


    </div>

	<!-- ============== CERITA =============== -->
    <div id="cerita-konten" style="display: none;" class="konten">
    	
		<section class="cerita section-padding" id="cerita">
			<div class="container">
				<div class="section-title">
						<h2> Cerita Kita </h2>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="main-timeline">

						<?php 
						$no=0;
						foreach($cerita as $key => $data) { 
							$no++;
							if($no % 2 == 0){ ?>

								<div class="timeline">
									<div class="timeline-icon"></div>
									<div class="timeline-content">
										<span class="date"><?php echo $data['tanggal_cerita']; ?></span>
										<h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
										<p class="description">
										<?php echo $data['isi_cerita']; ?>
										</p>
									</div>
								</div>
							<?php }else{?>
								<div class="timeline">
									<div class="timeline-icon"></div>
									<div class="timeline-content right">
										<span class="date"><?php echo $data['tanggal_cerita']; ?></span>
										<h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
										<p class="description">
										<?php echo $data['isi_cerita']; ?>
										</p>
									</div>      
								</div>
							<?php } ?>

							
						<?php } ?> 
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
	
	<!-- ============== LOKASI =============== -->
    <div id="lokasi-konten" style="display: none;" class="konten">

		<div class="section-title">
			<h2>Denah Lokasi</h2>
		</div>
		<div class="col-12 maps">
			<?= $maps ?>
		</div>

	</div>
	
</div>


<!-- ============== BOTTOM NAVIGATION =============== -->
<nav class="mobile-bottom-nav2" id="nav">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;" id="hehe">

				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="mempelai">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="acara">		
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				<div class="mobile-bottom-nav__item" id="lain">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-more" id="lain"></i>
						Lain
					</div>		
				</div>

		
			</div>
		</div>	
	</div>
</nav>
<nav class="mobile-bottom-nav2" id="nav2" style="display: none;">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px; " id="hehe">
				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="mempelai">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="acara">		
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				
				<?php foreach ($rules->getResult() as $row){ ?>
				<div class="mobile-bottom-nav__item" id="ucapan"
				<?php 
                if($row->gallery != 1)
                    echo "style=display:none;";
                }?>>

					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-message-bulleted"></i>
						Ucapan
					</div>		
				</div>

		
			</div>
		</div>	
	</div>

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;">
		<?php foreach ($rules->getResult() as $row){ ?>
				<div class="mobile-bottom-nav__item" id="album" 
                <?php 
                if($row->gallery != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
                        <i class="navbar-icon mdi mdi-image"></i>
                        Album
                    </div>      
				</div>

				<div class="mobile-bottom-nav__item" id="cerita" 
                <?php 
                if($row->cerita != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-chart-bubble" ></i>
						 Cerita Kita
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="lokasi" 
				<?php 
                if($row->lokasi != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-map-marker"></i>
						Lokasi
					</div>		
				</div>


				<div class="mobile-bottom-nav__item">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-close-circle" style="color:red;" id="tutup"></i>
						Tutup
					</div>		
				</div>

            <?php } ?>
			</div>
		</div>
	</div>


</nav>


</body>

<div class="dekorasi-all dekorasi-all-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/blueroses/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/blueroses/img/kanan-bawah.png" > 
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/blueroses/img/kiri-bawah.png" >  -->
</div>

<div class="dekorasi-sampul dekorasi-sampul-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/blueroses/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/blueroses/img/kanan-bawah.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/blueroses/img/kiri-bawah.png" > -->
</div>



<!-- mengirimkan data php ke javascript -->
<script>var base_url = '<?php echo base_url() ?>';</script>
<script>var tanggal_akad = '<?php echo $tanggal_akad; ?>';</script>
<script>var tanggal_resepsi = '<?php echo $tanggal_resepsi; ?>';</script>
<!-- mengirimkan data php ke javascript -->

<!-- JS AREA -->
<script src="<?php echo base_url() ?>/assets/themes/blueroses/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/blueroses/js/bootstrap.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/themes/blueroses/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/blueroses/js/jquery-plugin-collection.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/blueroses/js/script.js"></script>

</html>
