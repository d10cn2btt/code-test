<div class="user-panel">
    @if (Auth::check() && Auth::user()->avatar)
        <div class="pull-left image">
            <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    @else
            <div class="pull-left image">
                <img src="{{url('/images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
    @endif
</div>