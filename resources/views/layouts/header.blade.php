<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="{{ url('/') }}">
						<img src="{{ asset('/storage/logo.png') }}" alt="logo" >
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
                    </button>

                    @if(!Auth::check())
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" href="/login">Login</a>
							</li>
						</ul>
                    </div>
                    @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mt-10">

							<li class="nav-item">
                                <a class="nav-link login-button" href="/logout">Close Sesion</a>
							</li>		
							
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="/user/configure"><i class="fa fa-plus-circle"></i> Configure</a>
							</li>
						</ul>
                    </div>
                    @endif
                </nav>


			</div>
		</div>
	</div>
</section>
