<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">


    <title>Philcafe</title>

    <style>
        /* --------- UNIVERSAL CODE ------------*/
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html, body {
            background-color: #F5F5F5 !important;
            color: #000;
            font-family: 'Open Sans', sans-serif;
            text-rendering: optimizeLegibility;
            overflow-x: hidden; /* when media 500px or less, text overflows screen */
        }
        /* Clearfix hack
           ===================================================*/
        .clearfix{ zoom: 1 }
        .clearfix:after {
            content: ".";
            clear: both;
            display: block;
            height: 0;
            visibility: hidden;
        }

        section {
            margin: 30px auto;
        }

        h1 {
            font-size: 240%;
            color: #000;
            word-spacing: 3px;
            letter-spacing: 1px;
            vertical-align: middle;
        }

        h2 {
            letter-spacing: 1px;
            word-spacing: 2px;
            text-align: center;
            color: #585858;
            font-size: 140%;
        }

        h3 {
            display: inline;
            font-size: 80%;
            margin: 10px 10px;
        }

        p {
            font-size: 70%;
            margin-top: 10px;
        }

        small {
            font-size: 12px;
        }

        /* ------------ NAVIGATION BAR  --------------*/
        div#search {
            padding-right: 8px;
            padding-left: 8px;
        }

        @media only screen and (max-width: 1081px) and (min-width: 631px)  {
            a.nav-item.nav-link.top {
                font-size: 14px;
                display: block;
            }
        }

        @media only screen and (min-width: 1081px){
            a.nav-item.nav-link.top {
                display: none;
            }

        }

        @media only screen and (max-width: 649px){
            a.nav-item.nav-link.top {
                display: none;
            }
        }


        div#Signup_login {
            font-weight: bold;
            font-size: 12px;
            padding-bottom: 5px;
        }
        /* .color{
            color: #7c7c7d;;
        } */



        a#login:link,
        a#login:visited {
            padding: 10px;
            border-radius: 2px;
            background-color: #f6d535;
            margin-bottom: 3px;
            margin-right: 5px;
            width: 70px;
            color: #7c7c7d;
            text-decoration-line: none;
        }

        a#login:active,
        a#login:hover{
            color: white;
        }

        a#signup:link,
        a#signup:visited {
            padding: 10px;
            border-radius: 2px;
            background-color: #f6d535;
            margin-bottom: 3px;
            margin-right: 5px;
            width: 70px;
            color: #7c7c7d;
            text-decoration-line: none;
        }

        a#signup:active,
        a#signup:hover{
            color: white;
        }
        .fa-search:before {
            color: #f6d535;
            content: "\f002";
        }
        @media (min-width: 450px){
            nav#main-four-nav {
                font-size: 14px;
            }
        }
        @media (max-width: 450px){
            nav#main-four-nav {
                font-size: 9px;
            }
        }

        img.img-logo {
            padding: 7px;
        }
        /* nav#main-four-nav {
            font-size: 9px;
        } */
        a.navbar-brand {
            padding: 0;
        }
        nav.navbar.navbar-expand-xl.navbar-light.bg-light {
            padding: 0;
        }
        .navbar {
            font-size: 60%;
        }

        .img-logo{
            display: inline-block;
            width: 150px;
        }
        .navbar li {
            margin: 5px 5px;
            padding: 0 auto;
            text-align: center;
            display: inline-block;
            white-space: nowrap;
        }

        .cat-nav a:link,
        .cat-nav a:visited {
            font-weight: bold;
            white-space: nowrap;
            padding: 5px 20px;
            -webkit-transition: background-color .2s, color .2s, font-weight .2s;
            transition: background-color .2s, color .2s, font-weight .2s;
        }

        .cat-nav a:hover,
        .cat-nav a:active {
            color: #fff !important;
            background-color: #F5CC00;
            font-weight: bold;
        }

        .xs-nav a:hover,
        .xs-nav a:active {
            color: #fff !important;
        }

        .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
            color: #fff ;
            font-weight: bold;
        }

        .sub-name {
            display: block;
        }

        .nav-link:link i,
        .nav-link:visited i {
            margin: 0 5px;
            z-index: 1000;
            color: #F5CC00;
        }

        .nav-btn:link,
        .nav-btn:visited {
            display: inline-block;
            padding: 10px 30px;
            color: #F5CC00;
            background-color: #fff;
            text-decoration: none;
            border: #F5CC00 1px solid;
            -webkit-transition: background-color .2s, color .2s, border .2s;
            transition: background-color .2s, color .2s, border .2s;
        }
        /*
        span.sub-name {
            color: #00000080;
        } */

        .nav-btn:hover,
        .nav-btn:active {
            color: #fff;
        }

        @media (min-width: 1081px){
            .navbar-expand-custom {
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: flex-start;
            }
            .navbar-expand-custom .navbar-nav {
                flex-direction: row;
            }
            .navbar-expand-custom .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem;
            }
            .navbar-expand-custom .navbar-collapse {
                display: flex!important;
            }
            .navbar-expand-custom .navbar-toggler {
                display: none;
            }
            nav#main-four-nav{
                display: none;
            }
        }/* hamburger menu */

        @media (min-width: 1081px){
            /* ul.nav.nav-pills.nav-fill{
              display: block;
            } */
            ul#mobile-view{
                display: none;
            }
        }
        @media (max-width: 1080px){
            ul.nav.nav-pills.nav-fill{
                display: none;
            }

            /* ul.nav.nav-pills.nav-fill.d-none.d-lg-block{
                display: none;
            } */
        }

        @media only screen and (min-width: 650px){
            nav#main-four-nav {
                visibility: hidden;
                margin-bottom: 0px ;
            }
        }
        @media only screen and (max-width: 650px){

        }

        /* PC menu */


        /* -----------  Main Page(Hero)  ---------------*/
        .hero-area {
            padding: 100px 0 0;
            background: #56CCF2; /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #2F80ED, #56CCF2); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            -webkit-box-shadow: 0px 3px 15px 0px rgba(50, 50, 50, 0.75);
            -moz-box-shadow: 0px 3px 15px 0px rgba(50, 50, 50, 0.75);
            box-shadow: 0px 3px 15px 0px rgba(50, 50, 50, 0.75);
        }

        .hero-area .content-block {
            padding-bottom: 60px;
        }

        .hero-area .content-block h1, .hero-area-2 .content-block h1 {
            color: #fff;
            font-weight: bold;
            letter-spacing: 0.05em;
            margin-bottom: 15px;
        }

        .sidecategories {
            width: 100%;
            height: 500px;
            background-color: red;
        }


        /* -----------  Product Main  ---------------*/
        .card {
            margin-top: 20px;
        }

        .card-body {
            padding: 10px;
            border-radius: 5px;
            -webkit-box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
            -moz-box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
            box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
        }

        .card-title {
            font-size: 13px;
            color: #000;
            font-weight: bold;
        }

        .card-body a:link,
        .card-body a:visited {
            font-size: 13px;
            text-decoration: none;
        }

        .card-body a:hover,
        .card-body a:active {
            color: #F5CC00;
        }

        .card-title:link,
        .card-title:active {
            color: #000;
            text-decoration: none;
        }

        .user-product:link,
        .user-product:visited {
            color: #2F80ED;
        }

        .col {
            padding-left: 10px !important;
            padding-right: 10px;
        }

        .card-price {
            color: #F5CC00;
        }

        .box {
            background-color: #fff;
            border-radius: 5px;
            width: 90%;
            margin-left: 5%;
            display: block;
            border-radius: 5px;
            -webkit-box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
            -moz-box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
            box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
        }

        .box div {
            padding: 15px;
            border-bottom: 1px solid #efefef;
        }

        .title-news {
            margin-top: 12px;
            padding: 10px;
            font-weight: bold;
            background-color: #C94941;
            color: #FFF;
            border-radius: 5px 5px 0 0;
        }

        .news-text:link,
        .news-text:visited {
            font-size: 80%;
            display: block;
            text-decoration: none;
            color: #000;
            -webkit-transition: color .2s, font-size .2s;
            transition: color .2s, font-size .2s;
        }

        .news-text:active,
        .news-text:hover {
            font-size: 100%;
            color: #C94941 !important;
        }

        .news-main-text:link,
        .news-main-text:visited {
            font-size: 75%;
            display: block;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #000;
        }

        .news-main-text:active,
        .news-main-text:hover {
            color: #000 !important;
        }
        .img-news{
            text-align: center;
            width: 100%;
            height: 100%;
        }
        .img-news img{
            max-width:100%;
            max-height:100%;
        }

        /* -    ---------                            ---------------*/
        .row-bottom-space {
            border: 1px solid #efefef;
        }

        .row.text-light.body-data-header {
            background-color: #c94941;
        }

        .fa-folder:before {
            font-size: 170%;
            padding-right: 10px;
            color: #f6d535;
            content: "\f07b";
        }

        .col-sm-12.row-bottom-space {
            background-color: #fff;
            padding: 10px 20px;
        }

        .col-sm-12.row-bottom-space:hover{
            background-color: #FBFBFB;
        }

        .col-sm-12.row-bottom-space:last-child {
            border-radius: 5px;
        }

        .cat-content {
            border-radius: 5px;
            -webkit-box-shadow: 0px 1px 2px 0px rgba(50, 50, 50, 0.50);
            -moz-box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
            box-shadow: 0px 1px 5px 0px rgba(50, 50, 50, 0.50);
        }

        .row.text-light.body-data-header {
            margin-top: 6px;
        }

        .header-text-column {
            margin-top: 10px;
        }

        .header-text-column:link,
        .header-text-column:visited {
            color: #e64141;
            font-size: 100%;
            font-weight: 600;
            text-decoration: none;
        }
        .header-text-column:active,
        .header-text-column:hover {
            color: rgba(230, 65, 65, 0.8);
            text-decoration: none;
        }

        .header-text-title:link,
        .header-text-title:visited {
            color: #000;
            font-size: 70%;
            font-weight: 600;
            text-decoration: none;
        }

        .col-sm-1.body-data-row {
            padding-top: 4px;
        }

        .col-sm-7.body-data-row {
            padding-top: 5px;
        }

        p#file-and-caption {
            padding-left: 32px;
        }

        .col-sm-12.body-data-header {
            /* border-radius: 4px; */
            background-color: #c94941;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        /* THREAD SECTION */
        img#user-img-thread {
            height: 130px !important;
            padding: 10px;
            width: 130px !important;
            margin: 0 auto;
            border-radius: 50px;
        }

        div#first-row {
            background-color: #e5e9ec;
        }

        div#thread-container {
            border-top: 2px solid #e5e9ec;
            border-right: 2px solid #e5e9ec;
            border-bottom: 2px solid #e5e9ec;
        }

        p#thread-username {
            color: #007bff;
            margin-top: 0px;
            margin-bottom: 0px;
            border-bottom: 1px solid #d2d1d1;
            font-size: 16px;
        }

        p#thread-title.text-center.my-0 {
            line-height: 10px;
            font-size: 12px;
        }

        div#main-content {
            background-color: #ffff;
        }

        .col-sm-12.position-absolute.fixed-bottom.px-4 {
            border-top: 1px solid #e0e0e0;
            padding-top: 5px;
        }

        i.fas.fa-envelope-square.fa-2x {
            padding-top: 1px;
        }

        hr#thread-hr {
            margin: 5px 0px 5px 0px;
        }

        p#reply {
            margin: 0;
            margin-bottom: 5px;
        }

        p#established {
            border-bottom: 1px solid #d2d1d1;
        }

        span.badge.reaction-count {
            color: #a5a5a5;
            padding-left: 2px;
        }

        div#thread-main-content {
            margin-top: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        span.nick-name {
            margin-right: 10px;
        }
        .withmargin{
            margin-bottom: 10px;
        }

        footer{
            margin-top: 30px;
            width:100%;

            background-color: #2c2c2c;
        }
        /* footer style */
        #footer-container {
            bottom: 0 !important;
        }

        .footer-text {
            color: #9a9a9a;
            font-size: 14px;
        }

        .footer-title {
            color: #e2e0e0;
            font-weight: bold
        }

        /* NEWS STYLE */
        span#news-title {
            border-bottom: 2px solid #929191;
            font-size: 30px;
        }

        /* img */

        p.news-img-caption {
            line-height: 14px;
            margin-top: 4px;
        }

        .content{
            flex: .70;
        }
        /* THREAD SECTION */
        img#user-img-thread {
            height: 130px;
            padding: 10px;
            width: 130px;
            margin: 0 auto;
        }

        div#thread-container {
            border-top: 2px solid #e5e9ec;
            border-right: 2px solid #e5e9ec;
            border-bottom: 2px solid #e5e9ec;
        }


        p#thread-title.text-center.my-0 {
            line-height: 10px;
            font-size: 12px;
        }

        div#main-content {
            background-color: #ffff;
        }

        .col-sm-12.position-absolute.fixed-bottom.px-4 {
            border-top: 1px solid #e0e0e0;
            padding-top: 5px;
        }

        i.fas.fa-envelope-square.fa-2x {
            padding-top: 1px;
        }

        hr#thread-hr {
            margin: 5px 0px 5px 0px;
        }

        p#reply {
            margin: 0;
            margin-bottom: 5px;
        }

        p#established {
            border-bottom: 1px solid #d2d1d1;
        }

        span.badge.reaction-count {
            color: #a5a5a5;
            padding-left: 2px;
        }

        div#thread-main-content {
            margin: 0;
        }

        div#thread-main-content {
            min-height: 150px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto !important;
        }
        .last-msg{
            display: block;
            float: right;
        }
        .cat-head{
            background-color: #eee;
            padding: 10px 20px 10px 20px;
            border-radius: 5px;
            display: block;
        }
        .cat-cat{
            display: block;
            padding: 10px;
        }
        .btn-new:link,
        .btn-new:visited{
            display: inline;
            font-size: 12px;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            float: right;
            background-color: #00bcd4;
        }
        .title-cat{
            font-size: 16px;
            display: inline-block;
        }
        .cat_page{
            display: inline;
            float: right;
        }
        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #222;
            background-color: #fff;
            border: 1px solid #F5CC00;
        }

        .page-item.disabled .page-link {
            color: #868e96;
            pointer-events: none;
            cursor: auto;
            background-color: #eee;
            border-color: #F5CC00;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #F5CC00;
            border-color: #F5CC00;
        }

        .page-link:focus, .page-link:hover {
            color: #fff;
            text-decoration: none;
            background-color: #F5CC00;
            border-radius: 0;
        }
        .page-item:first-child .page-link{
            border-radius: 0;
        }
        .page-item:last-child .page-link{
            border-radius: 0;
        }


        a#navbarDropdown:link,
        a#navbarDropdown:visited {
            border-radius: 2px;
            display: inline-block;
            padding: 10px 30px;
            background-color: #F5CC00;
            text-decoration: none;
            /* border: #F5CC00 1px solid; */
            -webkit-transition: background-color .2s, color .2s, border .2s;
            transition: background-color .2s, color .2s, border .2s;
        }
        a#navbarDropdown:active,
        a#navbarDropdown:hover {
            color: #F5CC00;
            border-radius: 2px;
        }

        .dropdown-menu.dropdown-menu-right.show {
            position: absolute;
            float: none;
        }
        div#row-nav {
            background-color: white;
        }

        a.nav-item.nav-link.new {
            font-size: 12px;
            color: #000;
        }

        a.nav-item.nav-link:hover {
            color: #F5CC00;
        }
        a.dropdown-item:link,
        a.dropdown-item:visited{
            border-bottom: 1px solid #eee;
            margin: 0;
        }
        a.dropdown-item:hover {
            color: #F5CC00;
            background-color: transparent;
        }

        .dropdown-menu.dropdown-menu-right.show {
            HEIGHT: 44PX;
        }

        .dropdown-menu.dropdown-menu-right.show {
            padding-top: 2px;
        }

        a#navbarDropdown {
            /* margin-right: 26px; */
        }

        div#search{
            padding-right: 29px;
        }
        div#Signup_login {
            padding-right: 22px;
        }
        .nav-login{
            margin-top: 30px;
        }

        .nav-login a:link,
        .nav-login a:visited{
            font-size: 13px;
            display: inline;
            color: #000;
            padding-left: 30px;
            text-decoration: none !important;
            float: right;
        }
        .nav-login a:active,
        .nav-login a:hover{
            color: #F5CC00;
        }
        .list-inline-item{
            width: 30%;
            float: left;
            display: inline;
            white-space: nowrap;
            overflow: hidden;
            text-align: center;
        }
        .img-product{
            border: 0 none;
            max-width: 100%;
            display: inline-block;
            height: 100px;
            color: #000;
            vertical-align: middle;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
        }
        .img-product:hover{
            -webkit-transform: scale(1.1);
            transform: scale(1.1); /* back to normal*/
        }
        .title-product{
            color: #000;
        }
        .bns-title{
            color: #fff;
        }


        .form-group.col-sm-12 {
            margin-bottom: 0;
        }

        .fileContainer {
            overflow: hidden;
            position: relative;
        }

        .fileContainer [type=file] {
            cursor: inherit;
            display: block;
            font-size: 999px;
            filter: alpha(opacity=0);
            min-height: 100%;
            min-width: 100%;
            opacity: 0;
            position: absolute;
            right: 0;
            text-align: right;
            top: 0;
        }

       img#document_image {
            max-width: 888px;
            margin-top: 29px;
        }


         #up{
            display: none;
        }

        input#show_hide {
            margin-top: 5px;
            background: none;
            /* border: none; */
            background-color: #e5e9ec;
            /* border-radius: 4px; */
            float: right;
            margin-right: -63px;
            margin-top: 0px;
            border-bottom-left-radius: 7px;
            border-bottom-right-radius: 3px;
        }



    </style>

</head>

<body>
@include('layouts.navbar')

<section class="content">
@yield('content')
</section>

@include('layouts.footer')
