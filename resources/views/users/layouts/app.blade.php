<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

	<link rel="canonical" href="pages-blank.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    @stack('page-css')
	<!-- Choose your prefered color scheme -->
	<link href="{{ asset('assets/css/light.css') }}" rel="stylesheet">
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	{{-- <!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	<script src="js/settings.js"></script>
	<!-- END SETTINGS --> --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"/>
            <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"/>
            <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"/>
          </svg>

          <span class="align-middle me-3">AppStack</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
              <span class="badge badge-sidebar-primary">5</span>
            </a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-default.html">Default</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics.html">Analytics</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-saas.html">SaaS</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-social.html">Social</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-crypto.html">Crypto</a></li>
						</ul>
					</li>
					<li class="sidebar-item active">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link">
              <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
            </a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-profile.html">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-settings.html">Settings</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-clients.html">Clients</a></li>
							<li class="sidebar-item">
								<a data-bs-target="#projects" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  Projects
                </a>
								<ul id="projects" class="sidebar-dropdown list-unstyled collapse ">
									<li class="sidebar-item">
										<a class="sidebar-link" href="pages-projects-list.html">List</a>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link" href="pages-projects-detail.html">Detail <span class="badge badge-sidebar-primary">New</span></a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-invoice.html">Invoice</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-pricing.html">Pricing</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-tasks.html">Tasks</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-chat.html">Chat <span class="badge badge-sidebar-primary">New</span></a></li>
							<li class="sidebar-item active"><a class="sidebar-link" href="pages-blank.html">Blank Page</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
              <span class="badge badge-sidebar-secondary">Special</span>
            </a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-reset-password.html">Reset Password</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-404.html">404 Page</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-500.html">500 Page</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#documentation" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Documentation</span>
            </a>
						<ul id="documentation" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="docs-introduction.html">Introduction</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-installation.html">Getting Started</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-customization.html">Customization</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-plugins.html">Plugins</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-changelog.html">Changelog</a></li>
						</ul>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">UI Elements</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-carousel.html">Carousel</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-embed-video.html">Embed Video</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General <span class="badge badge-sidebar-primary">10+</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-offcanvas.html">Offcanvas</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-placeholders.html">Placeholders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-tabs.html">Tabs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#icons" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Icons</span>
              <span class="badge badge-sidebar-primary">1500+</span>
            </a>
						<ul id="icons" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="icons-feather.html">Feather</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="icons-font-awesome.html">Font Awesome</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic Inputs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-input-groups.html">Input Groups</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-floating-labels.html">Floating Labels</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="tables-bootstrap.html">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#form-plugins" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Form Plugins</span>
            </a>
						<ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-inputs.html">Advanced Inputs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#datatables" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">DataTables</span>
            </a>
						<ul id="datatables" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-responsive.html">Responsive Table</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-buttons.html">Table with Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-column-search.html">Column Search</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-fixed-header.html">Fixed Header</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-multi.html">Multi Selection</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-ajax.html">Ajax Sourced Data</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Charts</span>
              <span class="badge badge-sidebar-primary">New</span>
            </a>
						<ul id="charts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span class="badge badge-sidebar-primary">New</span></a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="notifications.html">
              <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Notifications</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#maps" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Maps</span>
            </a>
						<ul id="maps" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="maps-google.html">Google Maps</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="maps-vector.html">Vector Maps</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="calendar.html">
              <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Calendar</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi Level</span>
            </a>
						<ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
							<li class="sidebar-item">
								<a data-bs-target="#multi-2" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  Two Levels
                </a>
								<ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a class="sidebar-link" data-bs-target="#">Item 1</a>
										<a class="sidebar-link" data-bs-target="#">Item 2</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a data-bs-target="#multi-3" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  Three Levels
                </a>
								<ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a data-bs-target="#multi-3-1" data-bs-toggle="collapse" class="sidebar-link collapsed">
                      Item 1
                    </a>
										<ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
											<li class="sidebar-item">
												<a class="sidebar-link" data-bs-target="#">Item 1</a>
												<a class="sidebar-link" data-bs-target="#">Item 2</a>
											</li>
										</ul>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link" data-bs-target="#">Item 2</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Monthly Sales Report</strong>
						<div class="mb-3 text-sm">
							Your monthly sales report is ready for download!
						</div>

						<div class="d-grid">
							<a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/" class="btn btn-primary" target="_blank">Download</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>


				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->fullname }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
								<a class="dropdown-item" href="#">Help</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">


                @yield('content')


			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-end">
							<p class="mb-0">
								&copy; 2023 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('page-scripts')
</body>
</html>
