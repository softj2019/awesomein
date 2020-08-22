<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="kr" style="height: auto;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta property="og:image" content="/assets/img/ci/kogas_ci.png">
	<title>주식회사 어썸인</title>
<!--	<link rel="shortcut icon" type="image⁄x-icon" href="/assets/dist/img/ci/kogas_ci.ico">-->
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;200;500;900&display=swap" rel="stylesheet">

	<!-- Select2 -->
	<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/assets/plugins/daterangepicker/daterangepicker.css">
	<!-- Toast -->
	<link rel="stylesheet" href="/assets/plugins/toast/jquery.toast.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<!-- Google Font: Source Sans Pro -->
	<!--	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
	<!-- summernote -->
	<link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css">

	<link rel="stylesheet" href="/assets/dist/css/common.css">
	<script>
		var base_url ='http://awesomein.net/';
	</script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body class="layout-top-nav" style="height: auto;">
<div class="right-btn">
	<a href="" class="top-btn">top</a>
	<a href="/product" class="sub-btn">구독하기</a>
</div>
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<div class="container">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link nav-logo" href="/" role="button"><i class="logo-i"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto user-menu">
				<!-- Messages Dropdown Menu -->
				<?php if(@$this->session->userdata('is_admin')) {?>
					<li class="nav-item">
						<a href="/console/stibee" class="nav-link" d>
							<p>
								구독자 관리
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link" data-toggle="modal" data-target="#modal-user">
							<p>
								<?=@$this->session->userdata('name')?>
								<span class="badge badge-info right">
									<i class="fas fa-user"></i> &nbsp;MyPage
								</span>
							</p>
						</a>
					</li>
				<?php }?>
				<li class="nav-item">
					<a href="/main/about" class="nav-link <?=$menu_code=='016'?'active':''?>">
						<!--						<i class="nav-icon fas fa-mail-bulk"></i>-->
						<p>
							회사소개
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/product" class="nav-link <?=$menu_code=='015'?'active':''?>">
<!--						<i class="nav-icon fas fa-mail-bulk"></i>-->
						<p>
							구독신청
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/mypage/mystibee" class="nav-link <?=$menu_code=='014'?'active':''?>">
<!--						<i class="nav-icon fas fa-envelope-open-text"></i>-->
						<p>
							내구독정보
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/board/boardlist?board_type=A" class="nav-link <?=$menu_code=='010'?'active':''?>">
<!--						<i class="nav-icon fab fa-hire-a-helper"></i>-->
						<p>
							지난레터보기
							<!--								<span class="right badge badge-danger">New</span>-->
						</p>
					</a>
				</li>
<!--				<li class="nav-item">-->
<!--					<a href="index3.html" class="nav-link">관리자</a>-->
<!--				</li>-->
				<?php if(@$this->session->userdata('logged_in')) {?>
				<li class="nav-item">
					<a class="nav-link" href="https://kauth.kakao.com/oauth/logout?client_id=a0c10d1fa237662ef92188216ee55180&amp;logout_redirect_uri=<?=base_url('/member/logout')?>">
						<i class="fas fa-power-off mr-8"></i>로그아웃
					</a>
				</li>
				<?php }else{?>
				<li class="nav-item">
					<a class="nav-link " id="kko-login-btn" href="javascript:void(0);">
						<i class="fas fa-power-off mr-8"></i>로그인
					</a>
				</li>
				<?php }?>
			</ul>
		</div>

	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

