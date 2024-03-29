@extends('front.layout.master')

@section('content')

<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="#">Cookies Policy</a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
<div class="row">
<div class="col-md-8"  style="color: black;">

<h1 class="red-color">Cookies Policy</h1>
<h6>Belive Master News Cookie Policy regarding whole website are listed below.</h6>

<h6><b>Last Updated April 6,2020</b></h6>

<h5>What’s a cookie?</h5>
<ol>
<li>A “cookie” is a piece of information that is stored on your computer’s hard drive 
and which records how you move your way around a website so that, when you revisit that website, 
it can present tailored options based on the information stored about your last visit. Cookies 
can also be used to analyse traffic and for advertising and marketing purposes.</li>
<li>Cookies are used by nearly all websites and do not harm your system.</li>
</ol>
<p>If you want to check or change what types of cookies you accept, this can usually be 
altered within your browser settings. You can block cookies at any time by activating the 
setting on your browser that allows you to refuse the setting of all or some cookies. However, 
if you use your browser settings to block all cookies (including essential cookies) you may not 
be able to access all or parts of our site and this may impact our ability to serve better free 
content in the future.</p>

<h5>How do we use cookies?</h5>
<ol>
<li>We use cookies to track your use of our website. This enables us to understand how you use 
the site and track any patterns with regards how you are using our website. This helps us to 
develop and improve our website and the free content we publish as well as products and / or 
services in response to what you might need or want.</li>
<li>Cookies are either:</li>
<br>
<p>– Session cookies: these are only stored on your computer during your web session and are 
automatically deleted when you close your browser – they usually store an anonymous session ID 
allowing you to browse a website without having to log in to each page but they do not collect 
any personal data from your computer; or</p> <br>
<p>– Persistent cookies: a persistent cookie is stored as a file on your computer and it remains 
there when you close your web browser. The cookie can be read by the website that created it when 
you visit that website again. [We use persistent cookies for Google Analytics, Clicky, Momently 
and other analytical tools.]</p>
<li>Cookies can also be categorised as follows:</li>
<p>– Strictly necessary cookies: These cookies are essential to enable you to use the website 
effectively, such as when buying a product and / or service, and therefore cannot be turned off. 
Without these cookies, the services available to you on our website cannot be provided. These 
cookies do not gather information about you that could be used for marketing or remembering where 
you have been on the internet.</p> <br>
<p>– Performance cookies: These cookies enable us to monitor and improve the performance of our website. 
For example, they allow us to count visits, identify traffic sources and see which parts of the site are most popular.</p> <br>
<p>– Functionality cookies: These cookies allow our website to remember choices you make and provide 
enhanced features. For instance, we may be able to provide you with news or updates relevant to the 
services you use. They may also be used to provide services you have requested such as viewing a video or 
commenting on a blog. The information these cookies collect is usually anonymised.</p>
</ol>
<p>Please note that third parties who advertise on our website (including, for example, advertising 
networks and providers of external services like web traffic analysis services) may also use cookies, 
over which we have no control. These cookies are likely to be analytical/performance cookies or targeting 
cookies such as Facebook’s tracking pixel or cookies for the purpose of affiliate marketing – these cookies 
support the operation of this site and we wouldn’t be able to invest in high quality content for you to consume (for free) without them.</p>

</div>
<!-- col-md-8 -->


<!-- Right Side + Videos -->
@include('front.layout.rightcontent')

@endsection
