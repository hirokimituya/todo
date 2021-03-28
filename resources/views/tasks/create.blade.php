@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection
</head>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">タスクを追加する</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form name="Form" action="{{ route('tasks.create', ['folder' => $folder_id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label for="due_date">期限</label>
                                <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
                            </div>
                        </form>
                        <div style="float:left;">
							<button class="btn btn-secondary" onclick="history.back();">戻る</button>
						</div>
						<div style="float:right">
							<button id="submit" class="btn btn-primary">送信</button>
						</div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
    @include('share.form.form')
@endsection
