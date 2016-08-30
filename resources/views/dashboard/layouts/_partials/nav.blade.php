<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand pull-right" href="{{ url('dashboard') }}">Outline Roofing</a>
            </div>

            @include('dashboard.layouts._partials.topNav')
            <!-- /.navbar-top-links -->
            @include('dashboard.layouts._partials.sideNav')
            <!-- /.navbar-static-side -->
        </nav>