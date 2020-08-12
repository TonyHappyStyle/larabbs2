<?php
//dd($replies);
//?>
@if(count($replies)>0)
<ul class="list-unstyled">
  @foreach($replies as $index=>$reply)
  <li class=" media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
    <div class="media-left">
      <a href="{{ route('users.show',$reply->user->id) }}">
        <img class="media-object img-thumbnail mr-3" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" style="width:48px;height:48px;">
      </a>
    </div>

    <div class="media-body">
      <div class="media-heading mt-0 mb-1 text-secondary">
        <a href="{{ route('users.show',$reply->user->id) }}" title="{{ $reply->user->name }}">
          {{ $reply->user->name }}
        </a>
        <span class="text-secondary"> • </span>
        <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

        <span class="meta float-right ">
            <a title="删除回复">
              <i class="far fa-trash-alt"></i>
            </a>
          </span>
      </div>
      <div class="reply-content text-secondary">
        {!! $reply->content !!}
      </div>
    </div>
  </li>
    @if(!$loop->last)<hr/>@else <br/>@endif
@endforeach

{!! $replies->appends(Request::except('page'))->render() !!}

</ul>
@else
  <div class="empty-block">暂无数据^_^</div>
@endif
