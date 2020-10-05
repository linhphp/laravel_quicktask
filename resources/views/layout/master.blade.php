<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
            <!-- Navbar Contents -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}"> @lang('language.tasks_list') </a>
                    </li>
                    @if(Route::currentRouteName() != 'tasks.create')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.create') }}"> @lang('language.add_new_task') </a>
                        </li>
                    @endif
                    <div class="dropdown">
                        <button class="btn dropdown-toggle"
                            type="button" id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                                @lang('language.language')
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="nav-link dropdown-item" href="{{ route('changeLanguage', ['en']) }}"> @lang('language.english') </a>
                            <a class="nav-link " href="{{ route('changeLanguage', ['vi']) }}"> @lang('language.viet_nam') </a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
        @section('content')
        @show
    </body>
</html>
