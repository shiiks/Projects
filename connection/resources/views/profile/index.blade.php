@extends('templates.default')

@section('content')
   <div class="row">
   		<div class="col-lg-5">
   			@include('user.partials.userblock')
   			<hr>
               @if (!$statuses->count())
                   <p>{{ $user->getNameOrUsername() }} Hasn't Posted Anything,Yet.</p>
               @else
                   @foreach ($statuses as $status)
                      <div class="media">
                          <a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                              <img class="media-object" src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}">
                          </a>
                          <div class="media-body">
                              <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
                              <p>{{ $status->body }}</p>
                              <ul class="list-inline">
                                  <li>{{ $status->created_at->diffForHumans() }}</li>
                                  @if ($status->user->id !== Auth::user()->id)
                                      <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a></li>
                                  @endif
                                      <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
                              </ul>

                              @foreach ($status->replies as $reply)
                                  <div class="media">
                                      <a class="pull-left" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                                          <img class="media-object" src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}">
                                      </a>
                                      <div class="media-body">
                                          <h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
                                          <p>{{ $reply->body }}</p>
                                          <ul class="list-inline">
                                              <li>{{ $reply->created_at->diffForHumans() }}</li>
                                              @if ($reply->user->id !== Auth::user()->id)
                                                  <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
                                              @endif
                                                  <li>{{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}</li>
                                          </ul>
                                      </div>
                                  </div>
                              @endforeach

                              @if ($authUserIsFriend || Auth::user()->id === $status->user->id)
                                 <form role="form" action="{{ route('status.reply',
                                  ['statusId' => $status->id]) }}" method="post">
                                     <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error' : '' }}">
                                         <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply To The Status"></textarea>
                                         @if ($errors->has("reply-{$status->id}"))
                                             <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                         @endif
                                     </div>
                                     <input type="submit" value="Reply" class-"btn btn-default btn-sm"></input>
                                     <input type="hidden" name="_token" value="{{ Session::token() }}">
                                 </form>
                              @endif
                          </div>
                      </div>
                   @endforeach
               @endif
   		</div>
   		<div class="col-lg-4 col-lg-offset-3">
               @if (Auth::user()->hasFriendRequestPending($user))
                  <p>Waiting for {{ $user->getNameOrUsername() }} To Accept Your Request.</p>
               @elseif (Auth::user()->hasFriendRequestReceived($user))
                  <a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept Connection Request</a>
               @elseif (Auth::user()->isFriendsWith($user))
                  <p>You And {{ $user->getNameOrUsername() }} Are Connected.</p>
                  <form action="{{ route('friends.delete', ['username' => $user->username]) }}" method="post">
                    <input type="submit" value="Delete Connection" class="btn btn-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </form>
               @elseif (Auth::user()->id != $user->id)
                  <a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">Add As A Connection</a>
               @endif
   			<h4>{{ $user->getFirstNameOrUsername() }}'s Connections...</h4>
   			@if (!$user->friends()->count())
   				<p>{{ $user->getFirstNameOrUsername() }} Has No Connections.</p>
   			@else
   				@foreach ($user->friends() as $user)
   					@include('user.partials.userblock')
   				@endforeach
   			@endif
   		</div>
   </div>
@stop