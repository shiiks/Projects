<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">The Connection</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      @if (Auth::check())
      <ul class="nav navbar-nav">
        <li><a href="{{ route('home') }}">Timeline</a></li>
        <li><a href="{{ route('friends.index') }}">Connections</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
        <div class="form-group">
          <input type="text" class="form-control" name="query" placeholder="Find People">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      @endif
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
          <li><a href="{{ route('profile.edit') }}">Update Profile</a></li>
          <li><a href="{{ route('auth.signout') }}">Sign Out</a></li>
        @else
          <li><a href="{{ route('auth.signup') }}">Sign Up</a></li>
          <li><a href="{{ route('auth.signin') }}">Sign In</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>