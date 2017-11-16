
				<!-- Nav -->
					<nav id="nav">
						<ul>
						<?php

						if (!isset($_GET['module'])) {
							?>
							<li  class="current"><a href="index.php?module=homepage">Home</a></li>

							<li ><a href="index.php?module=photos_backend&view=create_photos">Formulario</a></li>

							<li ><a href="index.php?module=photos_frontend&view=list_photos">List</a></li>

<?php
						} else {
							if ($_GET['module']==="homepage"){
									?>
										<li  class="current"><a href="index.php?module=homepage">Home</a></li>

										<li ><a href="index.php?module=photos_backend&view=create_photos">Formulario</a></li>

										<li ><a href="index.php?module=photos_frontend&view=list_photos">List</a></li>



									<?php
								}elseif ($_GET['module']==="photos_backend"){
									?>
										<li ><a href="index.php?module=homepage">Home</a></li>

										<li class="current" ><a href="index.php?module=photos_backend&view=create_photos">Formulario</a></li>

										<li ><a href="index.php?module=photos_frontend&view=list_photos">List</a></li>

									<?php
								} elseif ($_GET['module']==="photos_frontend") {
									?>
										<li  ><a href="index.php?module=homepage">Home</a></li>

										<li><a href="index.php?module=photos_backend&view=create_photos">Formulario</a></li>

										<li class="current"><a href="index.php?module=photos_frontend&view=list_photos">List</a></li>

									<?php

								}
						}
0
						?>
						</ul>
					</nav>

			</div>
