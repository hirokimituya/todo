@extends('layout')

@section('styles')
	@include('share.flatpickr.styles')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col col-md-offset-3 col-md-6">
				<nav class="panel panel-default">
					<div class="panel-heading">タスクを削除する</div>
					<div class="panel-body">
						<table class="table">
							<tr>
								<th scope="row">タイトル</th>
								<td>{{ $task->title }}</td>
							</tr>
							<tr>
								<th scope="row">状態</th>
								<td>{{ \App\Models\Task::STATUS[$task->status]['label'] }}</td>
							</tr>
							<tr>
								<th scope="row">期限</th>
								<td>{{ $task->formatted_due_date }}</td>
							</tr>
						</table>
						<div style="float:right">
							<form name="daleteForm" action="{{ route('tasks.delete', ['folder' => $task->folder_id, 'task' => $task->id]) }}" method="post">
							   @csrf
							</form>
						</div>
						<div style="float:left;">
							<button class="btn btn-secondary" onclick="history.back();">戻る</button>
						</div>
						<div style="float:right">
								<button id="submit-delete" class="btn btn-danger">削除</button>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@include('share.flatpickr.scripts')
	<script>
		document.getElementById('submit-delete').addEventListener('click', function(event) {
			event.preventDefault();
			if (!confirm('削除してもよろしいですか？')) {
				return false;
			}
			document.daleteForm.submit();
		});
	</script>
@endsection
