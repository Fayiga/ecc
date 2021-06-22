@extends('admin.app')
@section('title') 
{{ $pageTitle }}
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span> {{ $subTitle }} </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
        @include('admin.partials.flashmessages')
 
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12" style="margin-bottom: 30px">
                  <ul class="nav nav-pills nav-pills-vertical nav-pills-info" aria-orientation="vertical" role="tablist">
                    
                    <li class="nav-item">
                      <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general-2" role="tab" aria-controls="general" aria-selected="false"> 
                        General
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="site-tab" data-toggle="tab" href="#site-2" role="tab" aria-controls="site" aria-selected="false">
                         Site Logo
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="footer-tab" data-toggle="tab" href="#footer-2" role="tab" aria-controls="footer" aria-selected="true">
                        Footer &amp; SEO
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="social-tab" data-toggle="tab" href="#social-2" role="tab" aria-controls="social" aria-selected="true">
                        Social Links
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="analytics-tab" data-toggle="tab" href="#analytics-2" role="tab" aria-controls="analytics" aria-selected="true">
                        Analytics
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment-2" role="tab" aria-controls="payment" aria-selected="true">
                        Payments
                      </a>
                    </li>
                  </ul>
                </div><hr>
                <div class="col-12">
                  <div class="tab-content tab-content-vertical">
                    <div class="tab-pane fade  active show" id="general-2" role="tabpanel" aria-labelledby="general-tab">
                      @include('admin.settings.includes.general')
                    </div>
                    <div class="tab-pane fade" id="site-2" role="tabpanel" aria-labelledby="site-tab">
                      @include('admin.settings.includes.logo')
                    </div>
                    <div class="tab-pane fade" id="footer-2" role="tabpanel" aria-labelledby="footer-tab">
                      @include('admin.settings.includes.footer_seo')
                    </div>
                    <div class="tab-pane fade" id="social-2" role="tabpanel" aria-labelledby="social-tab">
                      @include('admin.settings.includes.social_links')
                    </div>
                    <div class="tab-pane fade" id="analytics-2" role="tabpanel" aria-labelledby="analytics-tab">
                      @include('admin.settings.includes.analytics')
                    </div>
                    <div class="tab-pane fade" id="payment-2" role="tabpanel" aria-labelledby="payment-tab">
                      @include('admin.settings.includes.payments')
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
@endsection