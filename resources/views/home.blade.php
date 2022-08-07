@extends('layouts.master')

@section('content')
    <!-- Page header-->
    <header class="masthead bg-dark">
        <div class="container-xl px-5">
            <div class="row justify-content-center gx-5">
                <div class="col-md-8 col-lg-6">
                    <div class="text-center py-10">
                        <!-- Example brand image (inline SVG image)-->
                        <svg class="mb-3" viewBox="0 0 527 527" style="enable-background: new 0 0 527 527; height: 2.5rem; width: 2.5rem" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                    stroke: currentColor;
                                    stroke-width: 15;
                                    stroke-miterlimit: 10;
                                    enable-background: new;
                                }
                            </style>
                            <rect class="st0" x="7.5" y="7.5" width="512" height="512"></rect>
                            <g>
                                <polygon class="st0" points="317.5,207.6 317.5,430.3 428.5,430.3 428.5,96.7"></polygon>
                                <polygon class="st0" points="209.5,207.6 209.5,430.3 98.5,430.3 98.5,96.7"></polygon>
                            </g>
                        </svg>
                        <!-- Masthead content-->
                        <h1 class="masthead-heading mb-3 display-5">Build beautiful products, fast.</h1>
                        <p>Build high-quality digital experiences with the world's most intuitive union between Bootstrap 5 and Material Design.</p>
                        <a class="btn btn-masthead" href="#scrollTarget">Explore Demos</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl p-5">
        <div id="scrollTarget"></div>
        <!-- Dashboard demos-->
        <h2 class="display-6 mb-0">Dashboards</h2>
        <p class="small text-muted">Six pre-built, customizable dashboard demos</p>
        <hr class="mb-5 mt-0" />
        <div class="row gx-5">
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-default.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/default.png" alt="..." /></a>
                <div class="small font-monospace text-center">Default Dashboard</div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-minimal.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/minimal.png" alt="..." /></a>
                <div class="small font-monospace text-center">Minimal Dashboard</div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-analytics.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/analytics.png" alt="..." /></a>
                <div class="small font-monospace text-center">Analytics Dashboard</div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-accounting.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/accounting.png" alt="..." /></a>
                <div class="small font-monospace text-center">Accounting Dashboard</div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-orders.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/orders.png" alt="..." /></a>
                <div class="small font-monospace text-center">Orders Dashboard</div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-dashboard-projects.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/dashboards/projects.png" alt="..." /></a>
                <div class="small font-monospace text-center">Projects Dashboard</div>
            </div>
        </div>
        <!-- Page demos-->
        <h2 class="display-6 mb-0 mt-5">Pages</h2>
        <p class="small text-muted">Custom made, fully responsive pages to get you started</p>
        <hr class="mb-5 mt-0" />
        <div class="row gx-5">
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-auth-login-basic.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/auth-login-1.png" alt="..." /></a>
                <div class="small font-monospace text-center">Auth - Login 1</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-auth-login-styled-1.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/auth-login-2.png" alt="..." /></a>
                <div class="small font-monospace text-center">Auth - Login 2</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-auth-login-styled-2.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/auth-login-3.png" alt="..." /></a>
                <div class="small font-monospace text-center">Auth - Login 3</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-auth-register-basic.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/auth-register.png" alt="..." /></a>
                <div class="small font-monospace text-center">Auth - Register</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-auth-password-basic.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/auth-password.png" alt="..." /></a>
                <div class="small font-monospace text-center">Auth - Forgot Password</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-account-billing.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/account-billing.png" alt="..." /></a>
                <div class="small font-monospace text-center">Account - Billing</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-account-notifications.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/account-notifications.png" alt="..." /></a>
                <div class="small font-monospace text-center">Account - Notifications</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-account-profile.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/account-profile.png" alt="..." /></a>
                <div class="small font-monospace text-center">Account - Profile</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-account-security.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/account-security.png" alt="..." /></a>
                <div class="small font-monospace text-center">Account - Security</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-invoice.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/invoice.png" alt="..." /></a>
                <div class="small font-monospace text-center">Invoice</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-knowledgebase-home.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/knowledgebase-home.png" alt="..." /></a>
                <div class="small font-monospace text-center">Knowledgebase - Home</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-knowledgebase-categories.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/knowledgebase-categories.png" alt="..." /></a>
                <div class="small font-monospace text-center">Knowledgebase - Categories</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-knowledgebase-article.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/knowledgebase-article.png" alt="..." /></a>
                <div class="small font-monospace text-center">Knowledgebase - Article</div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <a class="d-block ripple-gray rounded shadow-3 overflow-hidden mb-2" href="app-pricing.html"><img class="img-fluid" src="https://assets.startbootstrap.com/img/screenshots-product-pages/material-admin-pro/pages/pricing.png" alt="..." /></a>
                <div class="small font-monospace text-center">Pricing</div>
            </div>
        </div>
        <!-- Error page demos-->
        <h2 class="display-6 mb-0 mt-5">Error Pages</h2>
        <p class="small text-muted">Illustrated pages to cover common errors</p>
        <hr class="mb-5 mt-0" />
        <div class="row gx-5">
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-400.html">400 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-401.html">401 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-403.html">403 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-404.html">404 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-429.html">429 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-500.html">500 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-503.html">503 Error</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-5">
                <div class="card card-raised ripple-gray">
                    <div class="card-body text-center"><a class="stretched-link text-decoration-none font-monospace" href="app-error-504.html">504 Error</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
