<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets/img/saluv_kost.png') ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets/css/fonts.min.css') ?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/js/plugin/owl-carousel/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/js/plugin/owl-carousel/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/atlantis.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/js/plugin/select2/select2.min.css') ?>">

	<!-- Tostr CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/js/plugin/toaster/toastr.css') ?>">

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/js/plugin/dropzone/dropzone.css') ?>">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>">
</head>
<body>
<?php
    date_default_timezone_set("Asia/jakarta");
?>
<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="index.html" class="logo">
					<img src="<?= base_url('assets/img/logo_kost.png') ?>" width="170" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
                        <i class="fas fa-clock" style="color: #fff;"></i>&nbsp;&nbsp;
                        <div class="mr-3 mt-2">
                            <h3 id="clock" class="text-white"></h3>
                        </div>
                        
						<i class="fas fa-calendar-alt" style="color: #fff;"></i>&nbsp;&nbsp; <h3 class="text-white">
							<div class="date mr-3 mt-2">
								<script type="text/javascript">
									var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
										var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
										var date = new Date();
										var day = date.getDate();
										var month = date.getMonth();
										var thisDay = date.getDay(),
											thisDay = myDays[thisDay];
										var yy = date.getYear();
										var year = (yy < 1000) ? yy + 1900 : yy;
										document.write(day + ' ' + months[month] + ' ' + year);	
								</script>
							</div>
						</h3>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= base_url('assets/img/profile.jpg') ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= base_url('assets/img/profile.jpg') ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $this->session->userdata('nama') ?></h4>
												<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" id="logout" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url('assets/img/profile.jpg') ?> " alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $this->session->userdata('nama'); ?>
									<span class="user-level"><?= $this->session->userdata('level') ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
					<?php if($this->session->userdata('level') === 'Administrator'): ?>
                        <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('dashboard'); ?>">
								<i class="fas fa-home"></i>
								<p>Beranda</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Master</h4>
						</li>
						
						<li class="nav-item <?= $this->uri->segment(1) == 'kamar' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('kamar') ?>">
								<i class="fas fa-desktop"></i>
								<p>Kamar Kost</p>
							</a>
						</li>

						<li class="nav-item <?= $this->uri->segment(1) == 'fasilitas' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('fasilitas') ?>">
								<i class="fas fa-desktop"></i>
								<p>Fasilitas Kost</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Penghuni/Penyewa</h4>
						</li>
						

                        <li class="nav-item <?= $this->uri->segment(1) == 'penghuni' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('penghuni') ?>">
								<i class="fas fa-users"></i>
								<p>Penghuni Kost</p>
							</a>
						</li>

                        <li class="nav-item <?= $this->uri->segment(1) == 'tagihan' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('tagihan') ?>">
								<i class="fas fa-"></i>
								<p>Tagihan</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Pengaturan/Laporan</h4>
						</li>

                        <li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-print"></i>
								<p>Laporan</p>
							</a>
						</li>

                        <li class="nav-item <?= $this->uri->segment(1) == 'komplain' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('komplain') ?>">
								<i class="fas fa-file"></i>
								<p>Komplain</p>
							</a>
						</li>

						<li class="nav-item <?= $this->uri->segment(1) == 'user/penghuni' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('user/penghuni') ?>">
								<i class="fas fa-user"></i>
								<p>Akun Penghuni</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="#">
								<i class="fas fa-cogs"></i>
								<p>Pengaturan Website</p>
							</a>
						</li>

						<!-- Penghuni -->
						<?php elseif($this->session->userdata('level') == 'Penghuni') : ?>
						<li class="nav-item <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('user'); ?>">
								<i class="fas fa-home"></i>
								<p>Beranda</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Penghuni</h4>
						</li>
						
						<li class="nav-item">
							<a href="#">
								<i class="fas fa-file-alt"></i>
								<p>History</p>
							</a>
						</li>

						<li class="nav-item <?= $this->uri->segment(1) == 'data_komplain' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
							<a href="<?= base_url('data_komplain') ?>">
								<i class="fas fa-file"></i>
								<p>Komplain</p>
							</a>
						</li>
                        <?php endif; ?>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<!-- Content -->
                <?= $contents; ?>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					
					<div class="copyright mx-auto">
						<?= date('Y') ?>, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">WebKost</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js "></script> -->
	<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') ?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

	<!-- select2 -->
	<script src="<?= base_url('assets/js/plugin/select2/select2.full.min.js') ?>"></script>

	<!-- Chart JS -->
	<script src="<?= base_url('assets/js/plugin/chart.js/chart.min.js') ?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>

	<!-- Datatables -->
	<script src="<?= base_url('assets/js/plugin/datatables/datatables.min.js') ?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url('assets/js/plugin/jqvmap/jquery.vmap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') ?>"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url('assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugin/sweet-alert/sweetalert.min.js') ?>"></script>

	<!-- Owl Carousel -->
	<script src="<?= base_url('assets/js/plugin/owl-carousel/owl.carousel.js') ?>"></script>

	<!-- Slick js -->
	<script src="<?= base_url('assets/js/plugin/slick/slick.min.js') ?> "></script>

	<!-- Toastr -->
	<script src="<?= base_url('assets/js/plugin/toaster/toastr.min.js') ?>"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url('assets/js/atlantis.min.js') ?>"></script>

    <!-- Dropzone js -->
    <script src="<?= base_url('assets/js/plugin/dropzone/dropzone.js') ?>"></script>

	<!-- DatePicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url('assets/js/setting-demo.js') ?>"></script>
    <!-- js kamar -->
    <?php $this->load->view('kamar/js_kamar.php') ?>
	<!-- js penghuni -->
	<?php $this->load->view('penghuni/js_penghuni.php') ?>
	<!-- js fasilitas -->
	<?php $this->load->view('fasilitas/js_fasilitas.php') ?>
	<!-- js tagihan -->
	<?php $this->load->view('tagihan/js_tagihan.php') ?>
	<!-- js user -->
	<?php $this->load->view('user/js_user.php') ?>
	<!-- js komplain -->
	<?php $this->load->view('user/js_komplain.php') ?>

	<!-- <script src="<?= base_url('assets/js/demo.js') ?>"></script> -->
	<script>
		$(function () {
            $('.datepicker').datepicker({
                language: "es",
                autoclose: true,
                format: "dd/mm/yyyy"
            });
        });
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
	<script>
		$('.owl-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		});

		 $('.js-slick-carousel').slick({
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 3,
					autoplaySpeed: 2000,
                    loop: true,
                    // autoHeight: true,
                    responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            centerMode: true,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            centerMode: true,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    ]
                });
		
	</script>
    <script type="text/javascript">
        window.onload = function() { clock(); }
       
            function clock() {
                var e = document.getElementById('clock'),
                d = new Date(), h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());
            
                e.innerHTML = h +':'+ m +':'+ s;
            
                setTimeout('clock()', 1000);
            }
      
            function set(e) {
                e = e < 10 ? '0'+ e : e;
                return e;
            }

			$('#logout').click(function() {
				Swal.fire({
                    icon: 'warning',
                    title: 'Logout',
                    text: "Apakah anda ingin keluar dari halaman ini, Yakin?",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Keluar',
                    cancelButtonText: 'Batalkan',
                    showLoaderOnConfirm: true,
                    reverseButtons: true,
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            Swal.fire({
                                icon: 'success',
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Anda Berhasil Logout, Terimakasih...',
                                showConfirmButton: false,
                                timer: 300000
                            });
                            window.location = '<?php echo base_url('Login/logout') ?>';
                        });
                    },
                    allowOutsideClick: false
                });
			});

        </script>
		<?php if ($this->session->flashdata('success')) : ?>
			<script>
				Swal.fire({
					title: "Congratulation",
					text: "<?= $this->session->flashdata('success') ?>",
					icon: "success",
					showConfirmButton: true,
					timer: 30000,
				});
			</script>
		<?php endif; ?>

		<?php if ($this->session->flashdata('update')) : ?>
			<script>
				Swal.fire({
					title: "Update",
					text: "<?= $this->session->flashdata('update') ?>",
					icon: "success",
					showConfirmButton: true,
					timer: 1000,
				});
			</script>
		<?php endif; ?>
</body>
</html>