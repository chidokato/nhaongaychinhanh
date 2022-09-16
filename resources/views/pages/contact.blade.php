@extends('layout.index')

@section('title')
<?php if ( $category['title'] == '' ) echo $category['name']; else echo $category['title']; ?>
@endsection
@section('description')
<?php echo $category['desc']; ?>
@endsection
@section('keywords')
<?php echo $category['key']; ?>
@endsection
@section('robots')
<?php if ( $category['robot'] == 0 ) echo "index, follow";  elseif ( $category['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset('').$category['slug']; ?>
@endsection

@section('content')
<div class="breadcrumb_container " data-depth="2">
<div class="container">
<nav data-depth="2" class="breadcrumb">
<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a itemprop="item" href="http://demo2.posthemes.com/pos_rozer/en/">
<span itemprop="name">Home</span>
</a>
<meta itemprop="position" content="1">
</li>
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a itemprop="item" href="http://demo2.posthemes.com/pos_rozer/en/contact-us">
<span itemprop="name">Contact us</span>
</a>
<meta itemprop="position" content="2">
</li>
</ol>
</nav>
</div>
</div>


<div id="wrapper">
<div class="container">
<div class="row">
<div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
<div class="contact-rich">
<h4>Store information</h4>
<div class="block">
<div class="icon"><i class="material-icons"></i></div>
<div class="data">Rozer Responsive Prestashop Theme<br>United States</div>
</div>
<hr>
<div class="block">
<div class="icon"><i class="material-icons"></i></div>
<div class="data">
Call us:<br>
<a href="tel:(+123)8889999">(+123)8889999</a>
</div>
</div>
<hr>
<div class="block">
<div class="icon"><i class="material-icons"></i></div>
<div class="data email">
Email us:<br>
</div>
<a href="mailto:demo@posthemes.com">demo@posthemes.com</a>
</div>
</div>
</div>
<div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">
<section id="main">
<section id="content" class="page-content card card-block">
<section class="contact-form">
<form action="http://demo2.posthemes.com/pos_rozer/en/contact-us" method="post" enctype="multipart/form-data">
<section class="form-fields">
<div class="form-group row">
<div class="col-md-9 col-md-offset-3">
<h3>Contact us</h3>
</div>
</div>
<div class="form-group row">
<label class="col-md-3 form-control-label">Subject</label>
<div class="col-md-6">
<select name="id_contact" class="form-control form-control-select">
<option value="2">Customer service</option>
<option value="1">Webmaster</option>
</select>
</div>
</div>
<div class="form-group row">
<label class="col-md-3 form-control-label">Email address</label>
<div class="col-md-6">
<input class="form-control" name="from" type="email" value="" placeholder="your@email.com">
</div>
</div>

<div class="form-group row">
<label class="col-md-3 form-control-label">Message</label>
<div class="col-md-9">
<textarea class="form-control" name="message" placeholder="How can we help?" rows="3"></textarea>
</div>
</div>
<div class="form-group row">
<div class="offset-md-3">
</div>
</div>
</section>
<footer class="form-footer text-sm-right">

<input type="text" name="url" value="">
<input type="hidden" name="token" value="08807d8b83be76d7159043fe0bd354d2">
<input class="btn btn-primary" type="submit" name="submitMessage" value="Send">
</footer>
</form>
</section>
</section>
<footer class="page-footer">

</footer>
</section>
</div>
</div>
</div>
</div>

@endsection