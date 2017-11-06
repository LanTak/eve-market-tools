<div class="layout-options">
	<button type="button" class="btn btn-primary action-toggle-layout-options" data-toggle="tooltip" data-placement="left" title="Show/Hide Layout settings"><i class="fa fa-gear"></i></button>
	<button type="button" class="btn btn-primary action-toggle-layout-options disabled" data-toggle="tooltip" data-placement="left" title="Layout settings disabled on this page"><i class="fa fa-gear"></i></button>

	<div class="panel panel-default">

		<div class="panel-body">
			<!-- START Tabs: Options | Skins -->
			<ul class="nav nav-tabs nav-justified tab-color-panel-bg">
				<li role="presentation" class="active">
					<a aria-expanded="true" data-toggle="tab" href="#tab-options" role="tab">Options</a>
				</li>
				<li role="presentation">
					<a aria-expanded="true" data-toggle="tab" href="#tab-skins" role="tab">Skins</a>
				</li>
			</ul>
			<!-- END Tabs: Options | Skins -->

			<!-- START Tabs Content: Options & Skins -->
			<div class="tab-content p-t-2">
				<!-- START Tab Options -->
				<div class="tab-pane fade in active p-r-1" id="tab-options" role="tabpanel">
					<!-- START: Navbar options v2-->
				   

						<p class="small text-uppercase"><strong>Navbar Options</strong></p>
						   
							<label class="checkbox-inline">
								<input type="checkbox" id="layout-navbar-enabled" class="group-switch" checked data-target-body-class="navbar-disabled" data-direction="disabled"> Show/Hide
							</label>

							<label class="checkbox-inline">
								<input type="checkbox" id="layout-navbar-fixed" data-target-body-class="navbar-fixed" data-direction="enabled"> Fixed
							</label>
							
			 
					<!-- END: Navbar options v2-->

					<!-- START: SubNavbar options -->
					<div class="input-group">
						<p class="small text-uppercase m-t-2">
							<strong>Header Layout</strong>
						</p>

						<div class="checkbox">
							<label>
								<input type="checkbox" id="layout-subnavbar-enabled" class="group-switch" checked data-target-body-class="sub-navbar-disabled" data-direction="disabled"> Show/Hide
							</label>
						</div>
					</div>
					<select class="form-control m-b-1" id="layout-subnavbar-style">
						<option selected value="">Header 1</option>
						<option value="sub-navbar-header-only">Header 2</option>
					</select>
					<!-- END: SubNavbar options -->

					<!-- START: Sidebar options -->
					<div class="input-group">

						<p class="small text-uppercase m-t-2"><strong>Sidebar Options</strong></p>

						<div class="checkbox">
							<label>
								<input type="checkbox" id="layout-sidebar-enabled" class="group-switch" checked data-target-body-class="sidebar-disabled" data-direction="disabled"> Show/Hide
							</label>
						</div>

						<select class="form-control" id="layout-sidebar-style">
							<option selected value="">Default Sidebar</option>
							<option value="sidebar-slim">Slim Sidebar</option>
							<option value="sidebar-big-icons">Big Icons Sidebar</option>
							<option value="sidebar-big-icons sidebar-with-avatar">Big Icons with Avatar</option>
						</select>

						<div class="input-group p-t-1">
								<label for="layout-sidebar-fixed" class="checkbox-inline">
									<input type="checkbox" id="layout-sidebar-fixed" data-target-body-class="sidebar-fixed" data-direction="enabled"> Fixed
								</label>
					
								<label for="layout-sidebar-full-height" class="checkbox-inline">
									<input type="checkbox" id="layout-sidebar-full-height" data-target-body-class="sidebar-full-height" data-direction="enabled"> Aside
								</label>        
						</div>
							
					</div>
					<!-- END: Sidebar options -->

					<!-- START: Content View -->
					<p class="small text-uppercase m-t-2"><strong>Content View</strong></p>
					<select class="form-control" id="layout-content-view">
						<option selected value="container">Container</option>
						<option value="container-fluid">Container Fluid</option>
						<option value="boxed-layout">Boxed</option>
					</select>
					<!-- END: Content View -->

					<!-- START: Footer Options -->
					<div class="input-group">
						<p class="small text-uppercase m-t-3"><strong>Footer Options</strong></p>

							<label for="layout-footer-enabled" class="checkbox-inline">
								<input type="checkbox" id="layout-footer-enabled" class="group-switch" checked data-target-body-class="footer-disabled" data-direction="disabled"> Show/Hide
							</label>

							<label for="layout-footer-fixed" class="checkbox-inline">
								<input type="checkbox" id="layout-footer-fixed" data-target-body-class="footer-fixed" data-direction="enabled"> Fixed
							</label>
					</div>
					<!-- END: Footer Options -->
				</div>
				<!-- END Tab Options -->

				<!-- START Tab Skins -->
				<div class="tab-pane fade in p-r-1" id="tab-skins" role="tabpanel">
					<p class="small text-uppercase"><strong>Main Color</strong></p>

					<div class="radio">
						<label>
							<input type="radio" name="mainColor" id="main-color-primary" value="primary" checked>
							Primary 
						</label>
						<i class="fa fa-circle pull-right text-primary"></i>
					</div>
					<div class="radio">
						  <label>
							<input type="radio" name="mainColor" id="main-color-info" value="info">
							Info 
						</label>
						<i class="fa fa-circle pull-right text-info"></i>
					</div>
					<div class="radio">
						  <label>
							<input type="radio" name="mainColor" id="main-color-success" value="success">
							Success 
						</label>
						<i class="fa fa-circle pull-right text-success"></i>
					</div>
					<div class="radio">
						  <label>
							<input type="radio" name="mainColor" id="main-color-warning" value="warning">
							Warning 
						</label>
						<i class="fa fa-circle pull-right text-warning"></i>
					</div>
					<div class="radio">
						  <label>
							<input type="radio" name="mainColor" id="main-color-danger" value="danger">
							Danger 
						</label>
						<i class="fa fa-circle pull-right text-danger"></i>
					</div>

					<!-- Single button -->
		  <!--          <div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-circle text-primary"></i> Primary <span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
					<li class="active"><a href="#"><i class="fa fa-circle text-primary"></i> Primary </a></li>
					<li><a href="#"><i class="fa fa-circle text-info"></i> Info </a></li>
					<li><a href="#"><i class="fa fa-circle text-success"></i> Success </a></li>
					<li><a href="#"><i class="fa fa-circle text-warning"></i> Warning </a></li>
					<li><a href="#"><i class="fa fa-circle text-danger"></i> Danger </a></li>
					<li><a href="#"><i class="fa fa-circle text-soft-purple"></i> Soft Purple </a></li>
					<li><a href="#"><i class="fa fa-circle text-lighting-yellow"></i> Lighting Yellow </a></li>
					</ul>
					</div>-->

					<p class="small text-uppercase m-t-2"><strong>Navbar</strong></p>

					<div class="radio">
						<label>
							<input type="radio" name="navbarStyle" id="navbar-style-dark" value="inverse" checked>
							Dark
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="navbarStyle" id="navbar-style-light" value="default">
							Light
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="navbarStyle" id="navbar-style-color" value="color">
							Like Main Color
						</label>
					</div>

					<p class="small text-uppercase m-t-2"><strong>Sidebar</strong></p>
					<div class="radio">
						<label>
							<input type="radio" name="sidebarStyle" id="sidebar-style-dark" value="dark" checked>
							Dark
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="sidebarStyle" id="sidebar-style-light" value="light">
							Light
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="sidebarStyle" id="sidebar-style-color" value="color">
							Like Main Color
						</label>
					</div>
				</div>
				<!-- END Tab Skins -->

			</div>
		</div>
		<div class="panel-footer">
			<button type="button" class="btn btn-default btn-block action-reset-layout-options">Reset Options</button>
		</div>
	</div>
</div>