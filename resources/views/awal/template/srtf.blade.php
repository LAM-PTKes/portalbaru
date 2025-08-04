<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en" style="height: 100%"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=5">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title> 

<style>
</style>

 <style>:root {
    --underline-text-color: #00bff3;
    --root-document-scale : 1.0;
}

.creatorTextElem {
    text-decoration: inherit;
    text-decoration-color: inherit;
}

.creatorTextElem:hover {
    text-decoration: underline;
    text-decoration-color: #00bff3;
}

.websiteBody {
  margin: 0;
}

.toolboxIcon {
    opacity: 0.8;
    margin-left: -4px;
    width: 24px;
    height: 25px;
}

.toolboxIcon:hover {
    opacity: 1;
    /* border: 1px solid grey;
    border-radius: 3px; */
}

[contenteditable] {
    outline: 3px solid #00bff3;
    user-select: text;
    -webkit-user-select: text;
  }

/* .creatorTextElem > a {
    cursor: pointer;
    color: unset;
} */

a {
    cursor: pointer;
    color: unset;
}</style> 
</head>

 @yield('content')

</body></html>