<!doctype html>
<html {!! get_language_attributes() !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="{{ get_theme_file_uri('/assets/imgs/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ get_theme_file_uri('/assets/imgs/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ get_theme_file_uri('/assets/imgs/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ get_theme_file_uri('/assets/imgs/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="150x150" href="{{ get_theme_file_uri('/assets/imgs/mstile-150x150.png') }}">
    <link rel="manifest" href="{{ get_theme_file_uri('/assets/imgs/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script>
      (function(d) {
        var config = {
            kitId: 'pfp1oyj',
            scriptTimeout: 3000,
            async: true
          },
          h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f%7C%7Ca&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
    @head
</head>
<body @php(body_class())>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
@footer
</body>
</html>
