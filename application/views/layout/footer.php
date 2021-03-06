<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
		</div>
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="float-right d-none d-sm-inline">
<!--			123-->
		</div>
		<!-- Default to the left -->
<!--		<strong>주식회사 어썸인 <span class="mobile-hide">|</span>  사업자등록번호:585-87-01608 <span class="mobile-hide">|</span> 고객센터 : 010-3484-3477</strong>-->
		<ul>
			<li>상호 : 주식회사 어썸인 / 대표 : 성선화/ 전화번호 : 010-3484-3477</li>
			<li>사업자등록번호 : [585-87-01608]</li>
<!--			<li>통신판매업신고 2019-서울서초-0844 <a href="javascript:void(0)" onclick="window.open('http://www.ftc.go.kr/bizCommPop.do?wrkr_no=4878801223','_blank','width=750, height=900');">[사업자정보확인]</a></li>-->
			<li>주소 : 서울특별시 서초구 강남대로 51길 10, 비1층 106-218</li>
			<li>개인정보관리책임자 : <a href="mailto:alloga@naver.com">성선화 < alloga@naver.com ></a></li>

		</ul>
	</footer>
</div>
<div class="modal fade" id="modal-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">비밀번호변경</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
				$attributes = array('class' => 'form-horizonatal', 'id' => 'passwordChange','name' => 'passwordChange');
				echo form_open('',$attributes);
				?>
				<input type="hidden" name="user_id" value="<?php echo @$this->session->userdata('user_id') ?>">
				<div class="form-group">
					<div>
						<input type="password" name="password" placeholder="기존 비밀번호" class="form-control">
					</div>
					<p class="text-danger password">
						&nbsp;
					</p>
				</div>
				<div class="form-group">
					<div>
						<input type="password" name="new_password" placeholder="신규 비밀번호" class="form-control">
					</div>
					<p class="text-danger new_password">
						&nbsp;
					</p>

				</div>
				<div class="form-group">
					<div>
						<input type="password" name="new_password_proc" placeholder="신규 비밀번호 확인" class="form-control">
					</div>
					<p class="text-danger new_password_proc">
						&nbsp;
					</p>
				</div>
				<?php echo form_close();?>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary passwordChange">변경 요청</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-fom-subscribers">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">구독 주소록 추가</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
				$attributes = array('class' => 'form-horizonatal', 'id' => 'addFormSubscribers','name' => 'addFormSubscribers');
				echo form_open('',$attributes);
				?>

				<div class="form-group">
					<div>
						<input type="text" name="email" placeholder="email" class="form-control">
					</div>
					<p class="text-danger password">
						&nbsp;
					</p>
				</div>
				<div class="form-group">
					<div>
						<input type="text" name="name" placeholder="구독자이름" class="form-control">
					</div>
					<p class="text-danger new_password">
						&nbsp;
					</p>

				</div>
				<?php echo form_close();?>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary addBtnSubscribers">등록 요청</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- PAGE SCRIPTS -->
<div class="loading-bar-wrap hidden">
	<div class="loading-bar"></div>
</div>
<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript" src="/assets/plugins/moment/moment.min.js"></script>
<script type="text/javascript" src="/assets/plugins/moment/locale/ko.js"></script>
<script type="text/javascript" src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/dist/js/jquery.inputmask.min.js"></script><!--inputmask 사용 시 포함-->

<script src="/assets/plugins/summernote/summernote-bs4.js"></script>
<script src="/assets/dist/js/summernote-ko-KR.js"></script>

<!-- Toast -->
<script src="/assets/plugins/toast/jquery.toast.min.js"></script>

<script type="text/javascript" src="/assets/dist/js/printThis.js"></script>


<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="/assets/dist/js/demo.js"></script>

<script src="/assets/dist/js/common.js"></script>
<?php
if(@$footerScript){
	?>
	<script src="<?=$footerScript?>"></script>
	<?php
}
?>
<script>
		//sweet toast init https://sweetalert2.github.io/
		// const Toast = Swal.mixin({
		// 	toast: true,
		// 	position: 'top-end',
		// 	showConfirmButton: false,
		// 	timer: 3000
		// });
		//toastr https://codeseven.github.io/toastr/demo.html
		// toastr.options = {
		// 	// "closeButton": false,
		// 	// "debug": false,
		// 	// "newestOnTop": false,
		// 	"progressBar": true,
		// 	"positionClass": "toast-top-right",
		// 	// "preventDuplicates": false,
		// 	// "onclick": null,
		// 	// "showDuration": "300",
		// 	// "hideDuration": "1000",
		// 	// "timeOut": "5000",
		// 	// "extendedTimeOut": "1000",
		// 	// "showEasing": "swing",
		// 	// "hideEasing": "linear",
		// 	// "showMethod": "fadeIn",
		// 	// "hideMethod": "fadeOut"
		// }
		$.toast.option={
			showHideTransition: 'fade', // fade, slide or plain
			allowToastClose: true, // Boolean value true or false
			hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
			stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
			position: 'top-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
			textAlign: 'left',  // Text alignment i.e. left, right or center
			loader: true,  // Whether to show loader or not. True by default
			loaderBg: '#ffffff',  // Background color of the toast loader
			beforeShow: function () {}, // will be triggered before the toast is shown
			afterShown: function () {}, // will be triggered after the toat has been shown
			beforeHide: function () {}, // will be triggered before the toast gets hidden
			afterHidden: function () {}  // will be triggered after the toast has been hidden
		};
	<?php
	if(@$insertEditorCode){
		echo $insertEditorCode;
	}
	?>
</script>

</body>
</html>
