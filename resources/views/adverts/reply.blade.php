<div class="card">
  <div class="card-header">
    <a href="https://{{ $reply->user_id}}.{{env('APP_DOMAIN')}}">{{ $reply->owner->name }}</a> said <span>{{ $reply->created_at->diffForHumans() }}</span>
  </div>
  <div class="card-body">
    {{--<h5 class="card-title">Special title treatment</h5>--}}
    <p class="card-text">{{ $reply->body }}</p>
  </div>
</div>
<br>