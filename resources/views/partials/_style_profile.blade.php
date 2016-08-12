<style type="text/css">
    @media (max-width: 480px) {
        .jumbotron > .cover {
            height: 160px;
            min-height: 160px
        }
        .jumbotron > .cover > h2 {
            display: none;
        }
        .jumbotron > .navbar .dp > .wrapper {
            width: 116px;
            height: 116px;
            margin: -60px auto 0 auto;
        }
        .jumbotron > .navbar h2.u-n {
            display: block;
        }
        .jumbotron > .tb ul {
            margin: 0 auto 0 auto;
            padding: 0;
        }
        .jumbotron > .tb ul > li {
            float: left;
            width: 25%;
        }
        .jumbotron > .tb ul > li:last-child > a {
            border: none;
        }
        .jumbotron > .tb ul > li > a > .glyphicon {
            display: block;
        }
        .jumbotron > .tb ul > li > a > .a-x {
            display: none;
        }
    }
    @media (min-width: 480px) {
        .jumbotron > .cover {
            height: 250px;
        }
        .jumbotron > .cover > h2 {
            display: none;
        }
        .jumbotron > .navbar .dp > .wrapper {
            width: 191.75px;
            height: 191.75px;
            margin: -105px auto 0 auto;
        }
        .jumbotron > .navbar h2.u-n {
            display: block;
        }
        .jumbotron > .tb ul {
            margin: 0 auto 0 auto;
            padding: 0;
        }
        .jumbotron > .tb ul > li {
            float: left;
            width: 25%;
        }
        .jumbotron > .tb ul > li:last-child > a {
            border: none;
        }
        .jumbotron > .tb ul > li > a > .glyphicon {
            display: block;
        }
        .jumbotron > .tb ul > li > a > .a-x {
            display: none;
        }
    }
    @media (min-width: 768px) {
        .jumbotron > .cover {
            height: 250px;
        }
        .jumbotron > .cover > h2 {
            left: 30%;
            bottom: 130px;
            display: block;
        }
        .jumbotron > .navbar .dp > .wrapper {
            width: 100%;
            height: 180px;
            margin: -145px 0 0 0;
        }
        .jumbotron > .navbar h2.u-n {
            display: none;
        }
        .jumbotron > .tb ul {
            padding-left: 15px;
        }
        .jumbotron > .tb ul > li:first-child > a {
            border-left: 1px solid #e9eaed;
        }
        .jumbotron > .tb ul > li > a > .glyphicon {
            display: none;
        }
        .jumbotron > .tb ul > li > a > .a-x {
            display: block;
        }
    }
    @media (min-width: 992px) {
        .jumbotron > .cover {
            height: 323.3333333333px;
            
        }
        .jumbotron > .cover > h2 {
            left: 20%;
            bottom: 120px;
            display: block;
        }
        .jumbotron > .navbar .dp > .wrapper {
            width: 100%;
            height: 156.6666666666px;
            margin: -120px 0 0 0;
        }
        .jumbotron > .navbar h2.u-n {
            display: none;
        }
        .jumbotron > .tb ul > li > a > .glyphicon {
            display: none;
        }
        .jumbotron > .tb ul > li > a > .a-x {
            display: block;
        }
    }
    @media (min-width: 1200px) {
        .jumbotron > .cover {
            height: 390px;
            
        }
        .jumbotron > .cover > h2 {
            left: 20%;
            bottom: 140px;
            display: block;
        }
        .jumbotron > .navbar .dp > .wrapper {
            width: 100%;
            height: 190px;
            margin: -155px 0 0 0;
        }
        .jumbotron > .navbar h2.u-n {
            display: none;
        }
        .jumbotron > .tb ul > li > a > .glyphicon {
            display: none;
        }
        .jumbotron > .tb ul > li > a > .a-x {
            display: block;
        }
    }
    .jumbotron {
        margin-top: -20px;
        padding: 0 !important;
    }
    .jumbotron > .cover {
        background-color: #1d2129;
        @if (Storage::exists('public/images/cover/' . $user->id . '.jpg'))
            background-image: url('{{ url('images/cover/' . $user->id) }}');
        @else
            background-image: none;
        @endif
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    .jumbotron > .cover > h2 {
        position: absolute;
        color: #fff;
        text-shadow: 0 0 3px rgba(0,0,0,.8);
    }
    .jumbotron > .cover > a.camera {
        top: -10px;
        left: 30px;
        position: absolute;
        text-shadow: #000 .5px .5px .5px;
        color: rgba(255, 255, 255, .5);
        font-size: x-large;
    }
    .jumbotron > .navbar h2.u-n {
        position: relative;
        color: #4b4f56;
    }
    .jumbotron > .navbar .dp {
        padding: 0;
        background-color: #fff;
    }
    .jumbotron > .navbar .dp > .wrapper {
        border: 2px solid #fff;
        padding: 0;
        background-color: #e5e5e5;
        @if (Storage::exists('public/images/avatar/' . $user->id . '.jpg'))
            background-image: url('{{ url('images/avatar/' . $user->id) }}');
        @else
            background-image: url('{{ url('images/avatar/default') }}');
        @endif
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
    .jumbotron > .navbar .dp > .wrapper > a.camera {
        bottom: 0;
        left: 10px;
        position: absolute;
        text-shadow: #000 .5px .5px .5px;
        color: rgba(233, 235, 238, .5);
        font-size: x-large;
    }
    .jumbotron > .tb {
        border-bottom: none;
        background-color: #fff;
        color: #4b4f56;
        font-weight: bold;
    }
    .jumbotron > .tb ul > li > a:hover,
    .jumbotron > .tb ul > li > a:focus {
        background-color: #f6f7f9;
    }
    .jumbotron > .tb ul > li > .down {
        width: 50%;
        top: 4px;
        margin: -14px 25% 0 25%;
        float: inherit;
        color: #e9ebee;
    }
    .jumbotron > .tb ul > li > .a-a {
        background-color: #fff;
        color: #4b4f56;
        cursor: default;
    }
    .jumbotron > nav .dp > .wrapper {
        position: relative;
    }
    .jumbotron > .tb ul > li > a {
        border-right: 1px solid #e9eaed;
        color: #365899;
    }
    .modal.upload .u-box {
        width: 100%;
        height: 50px;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        background: url({{ url('img/plus.png') }}) no-repeat;
        background-position: 50%;
        background-size: 25px;
    }
    .modal.upload .u-box > .u-up {
        width: 100%;
        height: 100%;
        display: block;
        opacity: 0;
        cursor: pointer;
    }
    .modal.upload div > .i-u {
        display: none;
        max-width: 100%;
    }
</style>