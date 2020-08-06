<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<?php
		$attributes = array('class' => 'form-horizonatal', 'id' => 'defaultForm','name' => 'defaultForm');
		echo form_open('console/getStibee',$attributes);
		?>

		<div class="card">
			<div class="card-header">
<!--				<button type="button" class="btn btn-danger deleteUser">사용자 삭제</button>-->

				<blockquote class="quote-primary">
					<h5 class="text-gray-dark">
					</h5>
				</blockquote>
<!--				<div class="form-group row">-->
<!--					<label class="col-form-label col-2">주소록 리스트 ID</label>-->
<!--					<div class="col-2">-->
<!--						<input type="text" name="listId" class="form-control" value="72186">-->
<!--					</div>-->
<!--					<div class="col-8">-->
<!--						<button type="button" class="btn btn-default getStibee"><i class="fas fa-sync-alt"></i> 스티비 주소록 동기화</button>-->
<!--						<button type="button" class="btn btn-info ml-4" data-toggle="modal" data-target="#modal-fom-subscribers"><i class="fas fa-user-plus"></i> </button>-->
<!--						<button type="button" class="btn btn-danger ml-1" id="unSubscribe" ><i class="fas fa-stop-circle"></i> </button>-->
<!--						<button type="button" class="btn btn-default ml-1" id="deleteSubscribers"><i class="fas fa-trash"></i> </button>-->
<!--					</div>-->
<!--				</div>-->
				<div class="form-group row">

				</div>

			</div>

			<div class="card-body table-responsive">

				<table class="table table-hover table-striped">
					<thead>
					<tr>
<!--						<th class="text-center w-5">-->
<!--							<div class="icheck-primary d-inline">-->
<!--								<input type="checkbox" id="checkAll_fmode" name='checkAll' value="list_chk">-->
<!--								<label for="checkAll_fmode">-->
<!--								</label>-->
<!--							</div>-->
<!--						</th>-->
						<th>이메일</th>
						<th>이름</th>
						<th>구독상태</th>
						<th>구독일</th>
						<th>마지막 업데이트 </th>
						<th>결재금액</th>
						<th>결재일</th>
					</tr>
					</thead>
					<tbody>
					<?php if(@$list) {
						foreach ($list as $key=>$row) {
							?>
							<tr>
<!--								<td class="text-center">-->
<!--									<div class="icheck-primary d-inline">-->
<!--										<input type="checkbox" id="chk_--><?php //echo $key; ?><!--" name="chk[]" value="--><?php //echo $row->email; ?><!--" class="list_chk">-->
<!--										<label for="chk_--><?php //echo $key; ?><!--">-->
<!--										</label>-->
<!--									</div>-->
<!--								</td>-->
								<td><?php echo $row->email; ?></td>
								<td><?php echo $row->name; ?></td>
								<td><?php echo $row->status_name; ?></td>
								<td><?php echo date('Y-m-d H:i',strtotime($row->createdTime)); ?></td>
								<td><?php echo date('Y-m-d H:i',strtotime($row->modifiedTime)); ?></td>
								<td>

								</td>
								<td>

								</td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
				</table>

			</div>
			<div class="card-footer">
				<?php echo $pagination?>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>
