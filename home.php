<?php
include("headerloggedIn.php");
include("getCookie.php");
include("dbconn.php");

if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
}

$userID = $_SESSION['id'];
?>
<head>
    <!-- YOUR CUSTOM CSS -->
<link href="css/custom.css" rel="stylesheet">

<!-- REVOLUTION SLIDER CUSTOM CSS -->
<style type="text/css">
    .tiny_bullet_slider .tp-bullet:before {
        content: " ";
        position: absolute;
        width: 100%;
        height: 25px;
        top: -12px;
        left: 0px;
        background: transparent
    }
    .bullet-bar.tp-bullets:before {
        content: " ";
        position: absolute;
        width: 100%;
        height: 100%;
        background: transparent;
        padding: 10px;
        margin-left: -10px;
        margin-top: -10px;
        box-sizing: content-box
    }
    .bullet-bar .tp-bullet {
        width: 60px;
        height: 3px;
        position: absolute;
        background: #aaa;
        background: rgba(204, 204, 204, 0.5);
        cursor: pointer;
        box-sizing: content-box
    }
    .bullet-bar .tp-bullet:hover,
    .bullet-bar .tp-bullet.selected {
        background: rgba(204, 204, 204, 1)
    }
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6XS6MQJJTJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6XS6MQJJTJ');
</script>
</head>
    <main>
       <!-- START SLIDER -->
        <div id="rev_slider_45_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="website-intro" data-source="gallery" style="background:#000000;padding:0px;">
            <div id="rev_slider_45_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;" data-version="5.4.8">
                <ul>
                    <li data-index="rs-67" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="600" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
                        <!-- main image -->
                        <img src="./img/BurgerLarge.jpg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-9" data-x="['center','center','center','center']" data-hoffset="['-112','-43','-81','44']" data-y="['middle','middle','middle','middle']" data-voffset="['-219','-184','-185','182']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3700","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-10" data-x="['center','center','center','center']" data-hoffset="['151','228','224','117']" data-y="['middle','middle','middle','middle']" data-voffset="['-212','-159','71','-222']" data-width="['150','150','100','100']" data-height="['200','150','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":350,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3650","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-29" data-x="['center','center','center','center']" data-hoffset="['339','-442','104','-159']" data-y="['middle','middle','middle','middle']" data-voffset="['2','165','-172','219']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-12" data-x="['center','center','center','center']" data-hoffset="['162','216','-239','193']" data-y="['middle','middle','middle','middle']" data-voffset="['195','245','6','146']" data-width="['250','250','100','100']" data-height="150" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":450,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3550","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-34" data-x="['center','center','center','center']" data-hoffset="['-186','-119','273','-223']" data-y="['middle','middle','middle','middle']" data-voffset="['269','217','-121','69']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3500","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-11" data-x="['center','center','center','center']" data-hoffset="['-325','292','162','-34']" data-y="['middle','middle','middle','middle']" data-voffset="['3','55','-275','-174']" data-width="150" data-height="['250','150','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":550,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3450","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-27" data-x="['center','center','center','center']" data-hoffset="['-429','523','-190','-306']" data-y="['middle','middle','middle','middle']" data-voffset="['-327','173','181','480']" data-width="['250','250','150','150']" data-height="['300','300','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":320,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3680","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-28" data-x="['center','center','center','center']" data-hoffset="['422','-409','208','225']" data-y="['middle','middle','middle','middle']" data-voffset="['-245','-72','294','-14']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":360,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3640","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-30" data-x="['center','center','center','center']" data-hoffset="['549','-445','28','58']" data-y="['middle','middle','middle','middle']" data-voffset="['236','400','316','287']" data-width="['300','300','150','200']" data-height="['250','250','150','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-31" data-x="['center','center','center','center']" data-hoffset="['-522','492','-151','262']" data-y="['middle','middle','middle','middle']" data-voffset="['339','-180','330','-141']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":440,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3560","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-32" data-x="['center','center','center','center']" data-hoffset="['-588','-375','-253','-207']" data-y="['middle','middle','middle','middle']" data-voffset="['72','-328','-172','-111']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":480,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3520","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-33" data-x="['center','center','center','center']" data-hoffset="['-37','73','-76','-100']" data-y="['middle','middle','middle','middle']" data-voffset="['-401','-340','-293','-246']" data-width="['450','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":310,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3690","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-35" data-x="['center','center','center','center']" data-hoffset="['186','38','116','17']" data-y="['middle','middle','middle','middle']" data-voffset="['363','402','190','395']" data-width="['350','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":340,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3660","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-67-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":10,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-resizeme" id="slide-67-layer-2" data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']" data-fontsize="['90','90','70','50']" data-lineheight="['90','90','70','50']" data-width="['none','none','481','360']" data-height="none" data-whitespace="['nowrap','nowrap','normal','normal']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -2px;font-family: 'Poppins', Helvetica, sans-serif;"><h1 style="white-space: nowrap; font-size: 40px; line-height: 40px; font-weight: 400; color: #FF5A5F; letter-spacing: -2px;font-family: 'Poppins', Helvetica, sans-serif;"><?php if(isset($_SESSION['id'])) {echo'Welcome ' .$_SESSION['fullname'];} ?> </h1>Discover<br />
                           great food</div>
                        <div class="tp-caption tp-resizeme btn_1" data-actions='[{"event":"click","action":"scrollbelow","offset":"-49px","delay":"","speed":"300","ease":"Linear.easeNone"}]' id="slide-67-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['200','200','160','120']" data-width="250" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,50,50]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,50,50]" style="z-index: 23; min-width: 250px; max-width: 250px; white-space: nowrap; font-size: 18px; line-height: 55px; font-weight: 500; border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none; font-family: 'Poppins', Helvetica, sans-serif;">GET STARTED</div>
                    </li>
                    <li data-index="rs-66" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="600" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
                        <img src="./img/Pizza.jpeg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-9" data-x="['center','center','center','center']" data-hoffset="['-112','-43','-81','44']" data-y="['middle','middle','middle','middle']" data-voffset="['-219','-184','-185','182']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3700","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-10" data-x="['center','center','center','center']" data-hoffset="['151','228','224','117']" data-y="['middle','middle','middle','middle']" data-voffset="['-212','-159','71','-222']" data-width="['150','150','100','100']" data-height="['200','150','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":350,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3650","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-29" data-x="['center','center','center','center']" data-hoffset="['339','-442','104','-159']" data-y="['middle','middle','middle','middle']" data-voffset="['2','165','-172','219']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-12" data-x="['center','center','center','center']" data-hoffset="['162','216','-239','193']" data-y="['middle','middle','middle','middle']" data-voffset="['195','245','6','146']" data-width="['250','250','100','100']" data-height="150" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":450,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3550","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-34" data-x="['center','center','center','center']" data-hoffset="['-186','-119','273','-223']" data-y="['middle','middle','middle','middle']" data-voffset="['269','217','-121','69']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3500","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-11" data-x="['center','center','center','center']" data-hoffset="['-325','292','162','-34']" data-y="['middle','middle','middle','middle']" data-voffset="['3','55','-275','-174']" data-width="150" data-height="['250','150','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":550,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3450","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-27" data-x="['center','center','center','center']" data-hoffset="['-429','523','-190','-306']" data-y="['middle','middle','middle','middle']" data-voffset="['-327','173','181','480']" data-width="['250','250','150','150']" data-height="['300','300','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":320,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3680","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-28" data-x="['center','center','center','center']" data-hoffset="['422','-409','208','225']" data-y="['middle','middle','middle','middle']" data-voffset="['-245','-72','294','-14']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":360,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3640","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-30" data-x="['center','center','center','center']" data-hoffset="['549','-445','28','58']" data-y="['middle','middle','middle','middle']" data-voffset="['236','400','316','287']" data-width="['300','300','150','200']" data-height="['250','250','150','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-31" data-x="['center','center','center','center']" data-hoffset="['-522','492','-151','262']" data-y="['middle','middle','middle','middle']" data-voffset="['339','-180','330','-141']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":440,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3560","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-32" data-x="['center','center','center','center']" data-hoffset="['-588','-375','-253','-207']" data-y="['middle','middle','middle','middle']" data-voffset="['72','-328','-172','-111']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":480,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3520","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-33" data-x="['center','center','center','center']" data-hoffset="['-37','73','-76','-100']" data-y="['middle','middle','middle','middle']" data-voffset="['-401','-340','-293','-246']" data-width="['450','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":310,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3690","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-66-layer-35" data-x="['center','center','center','center']" data-hoffset="['186','38','116','17']" data-y="['middle','middle','middle','middle']" data-voffset="['363','402','190','395']" data-width="['350','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":340,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3660","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-66-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":10,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption   tp-resizeme" id="slide-66-layer-2" data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']" data-fontsize="['90','90','70','50']" data-lineheight="['90','90','70','50']" data-width="['none','none','481','360']" data-height="none" data-whitespace="['nowrap','nowrap','normal','normal']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -2px;font-family: 'Poppins', Helvetica, sans-serif;">Catering available <br> from all our restaurants</div>
                        <div class="tp-caption   tp-resizeme" id="slide-66-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['90','90','60','30']" data-fontsize="['25','25','25','20']" data-lineheight="['35','35','35','30']" data-width="['480','480','480','360']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 20; min-width: 480px; max-width: 480px; white-space: normal; font-size: 25px; line-height: 35px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family: 'Poppins', Helvetica, sans-serif;">Please contact us</div>
                        <div class="tp-caption tp-resizeme btn_1" data-actions='[{"event":"click","action":"scrollbelow","offset":"-49px","delay":"","speed":"300","ease":"Linear.easeNone"}]' id="slide-66-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['200','200','160','120']" data-width="250" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,50,50]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,50,50]" style="z-index: 21; min-width: 250px; max-width: 250px; white-space: nowrap; font-size: 18px; line-height: 55px; font-weight: 500; border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none; font-family: 'Poppins', Helvetica, sans-serif;">GET STARTED</div>
                    </li>
                    <li data-index="rs-68" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="600" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
                        <img src="./img/Steak.jpeg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-9" data-x="['center','center','center','center']" data-hoffset="['-112','-43','-81','44']" data-y="['middle','middle','middle','middle']" data-voffset="['-219','-184','-185','182']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3700","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-10" data-x="['center','center','center','center']" data-hoffset="['151','228','224','117']" data-y="['middle','middle','middle','middle']" data-voffset="['-212','-159','71','-222']" data-width="['150','150','100','100']" data-height="['200','150','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":350,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3650","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-29" data-x="['center','center','center','center']" data-hoffset="['339','-442','104','-159']" data-y="['middle','middle','middle','middle']" data-voffset="['2','165','-172','219']" data-width="['250','250','150','150']" data-height="['150','150','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-12" data-x="['center','center','center','center']" data-hoffset="['162','216','-239','193']" data-y="['middle','middle','middle','middle']" data-voffset="['195','245','6','146']" data-width="['250','250','100','100']" data-height="150" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":450,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3550","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-34" data-x="['center','center','center','center']" data-hoffset="['-186','-119','273','-223']" data-y="['middle','middle','middle','middle']" data-voffset="['269','217','-121','69']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3500","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-11" data-x="['center','center','center','center']" data-hoffset="['-325','292','162','-34']" data-y="['middle','middle','middle','middle']" data-voffset="['3','55','-275','-174']" data-width="150" data-height="['250','150','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":550,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3450","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-27" data-x="['center','center','center','center']" data-hoffset="['-429','523','-190','-306']" data-y="['middle','middle','middle','middle']" data-voffset="['-327','173','181','480']" data-width="['250','250','150','150']" data-height="['300','300','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":320,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3680","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-28" data-x="['center','center','center','center']" data-hoffset="['422','-409','208','225']" data-y="['middle','middle','middle','middle']" data-voffset="['-245','-72','294','-14']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":360,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3640","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-30" data-x="['center','center','center','center']" data-hoffset="['549','-445','28','58']" data-y="['middle','middle','middle','middle']" data-voffset="['236','400','316','287']" data-width="['300','300','150','200']" data-height="['250','250','150','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-31" data-x="['center','center','center','center']" data-hoffset="['-522','492','-151','262']" data-y="['middle','middle','middle','middle']" data-voffset="['339','-180','330','-141']" data-width="['300','300','150','150']" data-height="['250','250','100','100']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":440,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3560","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-32" data-x="['center','center','center','center']" data-hoffset="['-588','-375','-253','-207']" data-y="['middle','middle','middle','middle']" data-voffset="['72','-328','-172','-111']" data-width="['300','300','150','150']" data-height="['200','200','150','150']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="300" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":480,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3520","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-33" data-x="['center','center','center','center']" data-hoffset="['-37','73','-76','-100']" data-y="['middle','middle','middle','middle']" data-voffset="['-401','-340','-293','-246']" data-width="['450','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":310,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3690","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-68-layer-35" data-x="['center','center','center','center']" data-hoffset="['186','38','116','17']" data-y="['middle','middle','middle','middle']" data-voffset="['363','402','190','395']" data-width="['350','400','250','250']" data-height="['100','100','50','50']" data-whitespace="nowrap" data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on" data-frames='[{"delay":340,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3660","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-68-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":10,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;background-color:rgba(0, 0, 0, 0.5);"> </div>
                        <div class="tp-caption   tp-resizeme" id="slide-68-layer-2" data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']" data-fontsize="['90','90','70','50']" data-lineheight="['90','90','70','50']" data-width="['none','none','481','360']" data-height="none" data-whitespace="['nowrap','nowrap','normal','normal']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -2px;font-family: 'Poppins', Helvetica, sans-serif;">Indulge in great food</div>
                        <div class="tp-caption tp-resizeme btn_1" data-actions='[{"event":"click","action":"scrollbelow","offset":"-49px","delay":"","speed":"300","ease":"Linear.easeNone"}]' id="slide-68-layer-7" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['200','200','160','120']" data-width="250" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,50,50]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,50,50]" style="z-index: 21; min-width: 250px; max-width: 250px; white-space: nowrap; font-size: 18px; line-height: 55px; font-weight: 500; border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none; font-family: 'Poppins', Helvetica, sans-serif;">GET STARTED</div>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="height: 5px; background:#cd1431;"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
       <!-- error_reporting(E_ERROR | E_PARSE); -->
       <?php 
if (!empty ($_SESSION['id'])) {
        $resturant= mysqli_query($conn,"SELECT * FROM orders WHERE userID = '".$userID."' ORDER BY id DESC LIMIT 1");
        while ($row=mysqli_fetch_array($resturant)) {
         $selRest =  $row["rest"];
$rest= mysqli_query($conn,"SELECT * FROM restaraunt WHERE name = '".$selRest."' ");
if (!empty($rest)) { 
while ($row=mysqli_fetch_array($rest)) {
	$restID = $row["id"];

?>
                       <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="container margin_30_60">
                    <div class="main_title center">
                        <span><em></em></span>
                        <h2>Order Again</h2>
                    </div>
                    <div class="col-lg-20">
                        <div class="list_home">
                            <ul>
                            <li><div class="strip">
                                    <a href="resturant.php?restId=<?php echo $row["id"]; ?>">
                                        <figure>
                                        <img src="<?php echo $row["image"]; ?>" class="img-fluid lazy" alt="">
                                    </figure>
                                        <div class="score"></div>
                                        <!-- <em>Mexican</em> -->
                                        <h3><?php echo $row["name"]; ?></h3>
                                        <small><?php echo $row["address"]; ?></small>
                                     
                                    </a>
                                    </div>
                                </li>
        </ul>
                        </div>
                </div>
                </div>
            </div>
 </div>
                    <?php
		}
	}  
}
}
	?>

 
        
        <!-- /bg_gray -->

            <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="container margin_30_60">
                    <div class="main_title center">
                        <span><em></em></span>
                        <h2>Our Restaurants </h2>
                        <?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>
                        <form method="post" action="restaurants.php">
                            <div class="row no-gutters custom-search-input">
                            <form class='searchbox'>
                                <div class="col-lg-10">
                               
                                    <div class="form-group">
                                        
                                        <input class="form-control no_border_r" type="text" placeholder="Restaurants" name="search" id="search">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn_1 gradient" type="submit">Search</button>
                                </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <!-- /main_title -->
                <div class="row add_bottom_25">
                <?php
$rest= mysqli_query($conn,"SELECT * FROM restaraunt");
if (!empty($rest)) { 
while ($row=mysqli_fetch_array($rest)) {
	$restID = $row["id"];

?>
                    
                    <div class="col-lg-6">
                        <div class="list_home">
                       
                            <ul>
                              
                                <li><div class="strip">
                                    <a href="resturant.php?restId=<?php echo $row["id"]; ?>">
                                        <figure>
                                        <img src="<?php echo $row["image"]; ?>" class="img-fluid lazy" alt="">
                                    </figure>
                                        <div class="score"></div>
                                        <!-- <em>Mexican</em> -->
                                        <h3><?php echo $row["name"]; ?></h3>
                                        <small><?php echo $row["address"]; ?></small>
                                        <?php
	$product= mysqli_query($conn,"SELECT * FROM products WHERE restID = '".$restID."' ");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
	        <h3 hidden><?php echo $row["name"]; ?></h3>

			<?php
		}
	}  
	?>	
                                    </a>
                                    </div>
                                </li>
                           	
                            </ul>
                            
                        </div>
                    </div>
                    <?php
		}
	}  
	?>
                </div>
                <!-- /row -->
                <div class="banner lazy" data-bg="url(./revolution-slider/images/tpcolorpicker/Pizza.jpeg)">
                    <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                        <div>
                            <small>EAt@United Restaurants</small>
                            <?php
	$product= mysqli_query($conn,"SELECT * FROM banner WHERE status = 'active' && id != '6' LIMIT 1");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>

	            <h3><?php echo $row["full_description"]; ?></h3>
                <br>


			<?php
		}
	}  
	?>
                        <br>
                            <a href="restaurants.php" class="btn_1 gradient">Start Now!</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner -->
            </div>
        </div>
        <!-- /bg_gray -->

        <div class="shape_element_2">
            <div class="container margin_60_0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_1.svg" alt="" width="150" height="167" class="lazy"></figure>
                                    <h3>Easily Order</h3>
                                    <p>Choose your order in 3 easy steps</p>
                                </div>
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_2.svg" alt="" width="130" height="145" class="lazy"></figure>
                                    <h3>Quick Delivery</h3>
                                    <p>Our drivers are dedicated to getting your food to you as quickly as possible</p>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="box_how">
                                    <figure><img src="img/lazy-placeholder-100-100-white.png" data-src="img/how_3.svg" alt="" width="150" height="132" class="lazy"></figure>
                                    <h3>Support Local</h3>
                                    <p>Not only do you get yummy food, but you will have the best of what Namibia has to offer.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-center mt-3 d-block d-lg-none"><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
                    </div>
                    
                    <?php if (!empty ($userID)){ ?>
                        
                        <div class="col-lg-5 offset-lg-1 align-self-center">
                            <div class="intro_txt">
                                <div class="main_title">
                                    <span><em></em></span>
                                    <h2>Hi <?php echo $_SESSION['fullname']; ?> !</h2>
                                    <p>Order now from top class Namibian Restaurants</p>
                                </div>
                                <p><a href="restaurants.php" class="btn_1 medium gradient pulse_bt mt-2">Restaurants</a></p>
                            </div>
                        </div>
                        <?php
            
                        }  else {
                        ?>
                        
                        <div class="col-lg-5 offset-lg-1 align-self-center">
                            <div class="intro_txt">
                                <div class="main_title">
                                    <span><em></em></span>
                                    <h2>Start Ordering Now</h2>
                                </div>
                                <p><a href="register.php" class="btn_1 medium gradient pulse_bt mt-2">Register</a></p>
                            </div>
                        </div>
    
                        <?php 
        }  
        ?>

                </div>
            </div>
        </div>
        <!-- /shape_element_2 -->

    </main>
    <!-- /main -->

    <footer>
        <div class="wave footer"></div>
        <div class="container margin_60_40 fix_mobile">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_1">Quick Links</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul><li>
							<a href="home.php" >Home</a>                        
						</li>					
						<li><a href="restaurants.php">Our Restaurants</a></li>  
						<li><a href="contacts.php">Contact Us</a></li>                          
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_2">Choose a location</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="resturant.php?restId=3005">Katima Mulilo</a></li>
                            <li><a href="resturant.php?restId=3004">Ondangwa</a></li>
                            <li><a href="resturant.php?restId=3003">Walvis Bay</a></li>
                            <li><a href="resturant.php?restId=3001">Windhoek</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_4">Contacts</h3>
                        <div class="follow_us">
                            <ul>
                                <li><a href="https://facebook.com/eatatunitedrestaurants"><img src="img/twitter.png" alt="" class="lazy"></a></li>
                                <li><a href="https://www.instagram.com/eatatunitedrestaurants/"><img src="img/instagram.png"  alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_mobile"></i>+264 (61) 209 0300</li>
                            <li><i class="icon_mail_alt"></i><a href="mailto:info@eatatunited.com.na">info@eatatunited.com.na</a></li>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <ul class="footer-selector clearfix">
                        
                        <li><img src="img/visa_logo.jpg"  alt="" width="80" height="30" class="lazy"></li>
						<li><img src="img/master card.png" alt="" width="65" height="30" class="lazy"></li>
						<li><img src="img/PayPoint-logo.jpg"  alt="" width="60" height="30" class="lazy"></li>
                   
					</ul>
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <li><a href="termsandconditions.php">Terms and conditions</a></li>
                        <li><a href="privacy.php">Privacy</a></li>
                        <li><span>© Eat@United</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
	<!--/footer-->
    

    <div id="toTop"></div><!-- Back to top button -->
    


<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.min.js"></script>
<script src="js/common_func.js"></script>
<script src="assets/validate.js"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script src="revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
<script src="revolution-slider/js/extensions/revolution.addon.slicey.min.js"></script>
<?php
if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $_SESSION['currentUser'] = $uid;
    $_SESSION['id'] = $uid;
    echo '<script>
		var tid = setInterval(function () {
		if (document.readyState !== "complete") return;
		clearInterval(tid);
		if(getCookie("PHPSESSID")){
			document.cookie = "currentUser = "'.$uid.';
		}
	}, 10000 );
    </script>
    ';
}
?>
<script>
var tpj = jQuery;
var revapi45;
tpj(document).ready(function() {
    if (tpj("#rev_slider_45_1").revolution == undefined) {
        revslider_showDoubleJqueryError("#rev_slider_45_1");
    } else {
        revapi45 = tpj("#rev_slider_45_1").show().revolution({
            sliderType: "standard",
            jsFileLocation: "revolution/js/",
            sliderLayout: "fullscreen",
            dottedOverlay: "none",
            delay: 9000,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "off",
                bullets: {
                    enable: true,
                    hide_onmobile: false,
                    style: "bullet-bar",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 50,
                    space: 5,
                    tmp: ''
                }
            },
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [868, 768, 960, 720],
            lazyType: "none",
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            fullScreenAutoWidth: "off",
            fullScreenAlignForce: "off",
            fullScreenOffsetContainer: "",
            fullScreenOffset: "0px",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
            }
        });
    }
    if (revapi45) revapi45.revSliderSlicey();
});
</script>

<!-- Autocomplete -->
<script>
    function initMap() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
    
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
    
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ0tSqIjHXqF69_UczefPbSiiZA7BuEk0&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cA"></script>
    

    <script src="js/search.js"></script>
    

</body>
</html>