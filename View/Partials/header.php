<header class="pc-header ">
	<div class="header-wrapper">
		<div class="ml-auto">
			<ul class="list-unstyled">
				<?php
				if (isset($_SESSION['auth'])) {

				?>
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?></span>
								<span class="user-desc"><?php echo $_SESSION['rol']?></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">

							<a href="<?php echo getUrl("Auth","Auth","cerrarSesion",false,"ajax")?>" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Cerrar Sesión</span>
							</a>
						</div>
					</li>
				<?php
				}
				?>
			</ul>
		</div>

	</div>
</header>