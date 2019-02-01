@extends('layouts.app')

@section('content')
    @include('admin.tickets._nav')

    <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="subject" class="col-form-label">Тема</label>
            <input id="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject', $ticket->subject) }}" required>
            @if ($errors->has('subject'))
                <span class="invalid-feedback"><strong>{{ $errors->first('subject') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="content" class="col-form-label">Сообщение</label>
            <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="10" required>{{ old('content', $ticket->content) }}</textarea>
            @if ($errors->has('content'))
                <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>

@endsection