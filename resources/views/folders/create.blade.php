@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダを追加する</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form name="Form" action="{{ route('folders.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">フォルダ名</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"/>
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
    @include('share.form.form')
@endsection
