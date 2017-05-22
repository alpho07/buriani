<!DOCTYPE html>

<html>

    <head>
        <title><?php echo $info[0]->title; ?></title>
        <?php $this->load->view('partials/header'); ?>
        <style type="text/css">
            .error{
                padding: 0em !important;
                margin: 0px !important;
                color:red !important;
                font-weight: normal !important;
                border: red !important;
                -webkit-border: red !important;
            }
            div.error{
                display:none !important;
            }
            input.error,select.error,textArea.error {
                border: 1px solid red !important ;
            }


            .card {
                /* Add shadows to create the "card" effect */
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
            }

            /* On mouse-over, add a deeper shadow */
            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

            .product-image img { 
                background-position: 50% 50%;
                background-repeat:   no-repeat;
                background-size:     cover;
            }
            ul{
                list-style: none outside none;
                padding-left: 0;
                margin: 0;
            }
            .demo .item{
                margin-bottom: 60px;
            }
            .content-slider li{
                background-color: #ed3020;
                text-align: center;
                color: #FFF;
            }
            .content-slider h3 {
                margin: 0;
                padding: 70px 0;
            }
            .demo{
                width: 800px;
            }

            .product-image{
                display:flex;
                align-items:center;
                justify-content:center;
            }

            .lSGallery {
                height: 100px !important; 
                display:flex;
                align-items:center;
                justify-content:center;
            }


            .container1 img { 
                width: 98%; 
                height: 450px; 
                object-fit: contain; 
                position: relative; 
                display:block;
            }
        </style>

    </head>


    <body>

        <!-- Container -->
        <div class="container" style="width:100% !important;">

            <!-- Header -->
            <?php $this->load->view('partials/top-header'); ?>

            <!-- /Header -->


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p>
                            <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>

                                <a href="<?php echo base_url(); ?>admin/ads/" >   

                                    &Lt; Back to Ads Dashboard
                                </a> | 

                                <?php
                            } else {
                                echo '';
                            };
                            ?>

                           <a href="<?php echo $listing; ?>">Back</a> | <a href="<?php echo base_url(); ?>">Home</a>  <i class="icons icon-right-dir"></i> <?php echo $info[0]->name; ?><i class="icons icon-right-dir"></i> <?php echo $info[0]->title; ?></p>
                    </div>


                </div>
                <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; padding: 5px;">




                    <!--div class="col-lg-8 col-md-8 col-sm-8 col-lg-push-2 col-md-push-2 col-sm-push-2" style="margin-bottom: 10px !important;">
                     <a data-original-click-url="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;num=1&amp;cid=CAASEuRo5OQ6BiHr5yDUS6r90IKigQ&amp;sig=AOD64_2kz2bckdoZQ4w5r2KAXu_IPxNoqw&amp;client=ca-pub-6015029249936488&amp;adurl=http://www.kefidchina.com/v3/Grinding-Mill/High-Pressure-Mill.html%3Fgoogle-gdn-en-mill-icmzt-ray%26ID%3D51534271770%26plc%3Da9fc1e99edecb28f.anonymous.google%26k%3D%26tid%3D" id="aw0" target="_blank" href="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;num=1&amp;cid=CAASEuRo5OQ6BiHr5yDUS6r90IKigQ&amp;sig=AOD64_2kz2bckdoZQ4w5r2KAXu_IPxNoqw&amp;client=ca-pub-6015029249936488&amp;adurl=http://www.kefidchina.com/v3/Grinding-Mill/High-Pressure-Mill.html%3Fgoogle-gdn-en-mill-icmzt-ray%26ID%3D51534271770%26plc%3Da9fc1e99edecb28f.anonymous.google%26k%3D%26tid%3D"><img src="https://tpc.googlesyndication.com/simgad/13758949172529847097" alt="" class="img_ad" border="0" height="90" width="970"></a><style>div,ul,li{margin:0;padding:0;}.abgc{height:15px;position:absolute;right:16px;top:0px;text-rendering:geometricPrecision;width:15px;z-index:9020;}.abgb{height:15px;width:15px;}.abgc img{display:block;}.abgc svg{display:block;}.abgs{display:none;height:100%;}.abgl{text-decoration:none;}.abgi{fill-opacity:1.0;fill:#00aecd;stroke:none;}.abgbg{fill-opacity:1.0;fill:#cdcccc;stroke:none;}.abgtxt{fill:black;font-family:'Arial';font-size:100px;overflow:visible;stroke:none;}</style><div id="abgc" class="abgc" dir="ltr"><div id="abgb" class="abgb"><svg height="100%" width="100%"><rect height="100%" width="100%" class="abgbg"></rect><svg x="0px" class="abgi"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></div><div id="abgs" class="abgs"><a id="abgl" class="abgl" href="https://www.google.com/url?ct=abg&amp;q=https://www.google.com/adsense/support/bin/request.py%3Fcontact%3Dabg_afc%26url%3Dhttps://www.olx.co.ke/%26gl%3DKE%26hl%3Den%26client%3Dca-pub-6015029249936488%26ai0%3DCvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;usg=AFQjCNE7bB9aHdAkGP1Rm-lhEFBt5CqPXw" target="_blank"><svg height="100%" width="100%"><path d="M0,0L96,0L96,15L4,15s-4,0,-4,-4z" class="abgbg"></path><svg width="34px" y="11px" x="5px" class="abgtxt"><text>Ads by</text></svg><svg width="38px" y="11px" x="41px" class="abgtxt"><text>Google</text></svg><svg x="81px" class="abgi"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></a></div></div><script>var abgp={elp:document.getElementById('abgcp'),el:document.getElementById('abgc'),ael:document.getElementById('abgs'),iel:document.getElementById('abgb'),hw:15,sw:96,hh:15,sh:15,himg:'https://tpc.googlesyndication.com'+'/pagead/images/abg/icon.png',simg:'https://tpc.googlesyndication.com/pagead/images/abg/en.png',alt:'Ads by Google',t:'Ads by',tw:34,t2:'Google',t2w:38,tbo:0,att:'adsbygoogle',ff:'',halign:'right',fe:false,iba:false,lttp:true,umd:false,uic:false,uit:false,ict:document.getElementById('cbb'),ci:'',icd:undefined,uaal:true,opi: false};</script><script src="https://tpc.googlesyndication.com/pagead/js/r20161205/r20110914/abg.js"></script><style>.cbc{background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_blue2.svg');background-position: right top;background-repeat: no-repeat;cursor:pointer;height:15px;right:0;top:0;margin:0;overflow:hidden;padding:0;position:absolute;transform: scaleX(1);width:16px;z-index:9010;}.cbc.cbc-hover {background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_dark.svg');}.cbc > .cb-x{height: 15px;position:absolute;width: 16px;right:0;top:0;}.cb-x > .cb-x-svg{background-color: lightgray;position:absolute;}.cbc.cbc-hover > .cb-x > .cb-x-svg{background-color: #58585a;}.cb-x > .cb-x-svg > .cb-x-svg-path{fill : #00aecd;}.cbc.cbc-hover > .cb-x > .cb-x-svg > .cb-x-svg-path{fill : white;}.cb-x > .cb-x-svg > .cb-x-svg-s-path{fill : white;}</style><div id="cbc" class="cbc"><div id="cb-x" class="cb-x"></div> </div> <style>.ddmc{background:#ccc;color:#000;padding:0;position:absolute;z-index:9020;max-width:100%;box-shadow:2px 2px 3px #aaaaaa;}.ddmc.left{margin-right:0;left:0px;}.ddmc.right{margin-left:0;right:0px;}.ddmc.top{bottom:20px;}.ddmc.bottom{top:20px;}.ddmc .tip{border-left:4px solid transparent;border-right:4px solid transparent;height:0;position:absolute;width:0;font-size:0;line-height:0;}.ddmc.bottom .tip{border-bottom:4px solid #ccc;top:-4px;}.ddmc.top .tip{border-top:4px solid #ccc;bottom:-4px;}.ddmc.right .tip{right:3px;}.ddmc.left .tip{left:3px;}.ddmc .dropdown-content{display:block;}.dropdown-content{display:none;border-collapse:collapse;}.dropdown-item{font:12px Arial,sans-serif;cursor:pointer;padding:3px 7px;vertical-align:middle;}.dropdown-item-hover, a.dropdown-item.dropdown-item-hover {background:#58585a;color:#fff;}.dropdown-content > table{border-collapse:collapse;border-spacing:0;}.dropdown-content > table > tbody > tr > td{padding:0;}a.dropdown-item {color: inherit;cursor: inherit;display: block;text-decoration: inherit;}</style><div class="ddmc right bottom" id="ddmc" style="display:none"><div class="tip"></div><div class="dropdown-content"><table><tbody><tr><td><div id="pubmute" style="border-bottom:1px solid #999;" class="dropdown-item"><span>Ad covers the page</span></div></td></tr><tr><td><div id="admute" class="dropdown-item"><span>Stop seeing this ad</span></div></td></tr></tbody></table></div></div><script>(function(){var k,l=this,m=function(a,b){a=a.split(".");var c=l;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var d;a.length&&(d=a.shift());)a.length||void 0===b?c[d]?c=c[d]:c=c[d]={}:c[d]=b},ba=function(a,b,c){return a.call.apply(a.bind,arguments)},ca=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},n=function(a,b,c){n=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?ba:ca;return n.apply(null,arguments)};var p="undefined"!=typeof DOMTokenList,q=function(a,b){if(p)a=a.classList,0==a.contains(b)&&a.toggle(b);else{var c=a.className;if(c){for(var c=c.split(/\s+/),d=!1,f=0;f<c.length&&!d;++f)d=c[f]==b;d||(c.push(b),a.className=c.join(" "))}else a.className=b}},r=function(a,b){if(p)a=a.classList,1==a.contains(b)&&a.toggle(b);else{var c=a.className;if(c&&!(0>c.indexOf(b))){for(var c=c.split(/\s+/),d=0;d<c.length;++d)c[d]==b&&c.splice(d--,1);a.className=c.join(" ")}}};var da=function(){var a=!1;try{var b=Object.defineProperty({},"passive",{get:function(){a=!0}});window.addEventListener("test",null,b)}catch(c){}return a}(),t=function(a,b,c){a.addEventListener?a.addEventListener(b,c,da?void 0:!1):a.attachEvent&&a.attachEvent("on"+b,c)};var w=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},x=function(a,b){return a<b?-1:a>b?1:0};var y;a:{var z=l.navigator;if(z){var A=z.userAgent;if(A){y=A;break a}}y=""};var fa=function(a,b){var c=ea;Object.prototype.hasOwnProperty.call(c,a)||(c[a]=b(a))};var ga=-1!=y.indexOf("Opera"),B=-1!=y.indexOf("Trident")||-1!=y.indexOf("MSIE"),ha=-1!=y.indexOf("Edge"),C=-1!=y.indexOf("Gecko")&&!(-1!=y.toLowerCase().indexOf("webkit")&&-1==y.indexOf("Edge"))&&!(-1!=y.indexOf("Trident")||-1!=y.indexOf("MSIE"))&&-1==y.indexOf("Edge"),ia=-1!=y.toLowerCase().indexOf("webkit")&&-1==y.indexOf("Edge"),D=function(){var a=l.document;return a?a.documentMode:void 0},E;a:{var F="",G=function(){var a=y;if(C)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ha)return/Edge\/([\d\.]+)/.exec(a);if(B)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ia)return/WebKit\/(\S+)/.exec(a);if(ga)return/(?:Version)[ \/]?(\S+)/.exec(a)}();G&&(F=G?G[1]:"");if(B){var H=D();if(null!=H&&H>parseFloat(F)){E=String(H);break a}}E=F}var I=E,ea={},J=function(a){fa(a,function(){for(var b=0,c=w(String(I)).split("."),d=w(String(a)).split("."),f=Math.max(c.length,d.length),e=0;0==b&&e<f;e++){var h=c[e]||"",g=d[e]||"";do{h=/(\d*)(\D*)(.*)/.exec(h)||["","","",""];g=/(\d*)(\D*)(.*)/.exec(g)||["","","",""];if(0==h[0].length&&0==g[0].length)break;b=x(0==h[1].length?0:parseInt(h[1],10),0==g[1].length?0:parseInt(g[1],10))||x(0==h[2].length,0==g[2].length)||x(h[2],g[2]);h=h[3];g=g[3]}while(0==b)}return 0<=b})},K;var L=l.document;K=L&&B?D()||("CSS1Compat"==L.compatMode?parseInt(I,10):5):void 0;var M;if(!(M=!C&&!B)){var N;if(N=B)N=9<=Number(K);M=N}M||C&&J("1.9.1");B&&J("9");var ka=function(a,b){if(!a||!b)return!1;if(a.contains&&1==b.nodeType)return a==b||a.contains(b);if("undefined"!=typeof a.compareDocumentPosition)return a==b||!!(a.compareDocumentPosition(b)&16);for(;b&&a!=b;)b=b.parentNode;return b==a};var la=function(a,b,c){var d="mouseenter_custom"==b,f=O(b);return function(e){e||(e=window.event);if(e.type==f){if("mouseenter_custom"==b||"mouseleave_custom"==b){var h;if(h=d?e.relatedTarget||e.fromElement:e.relatedTarget||e.toElement)for(var g=0;g<a.length;g++)if(ka(a[g],h))return}c(e)}}},O=function(a){return"mouseenter_custom"==a?"mouseover":"mouseleave_custom"==a?"mouseout":a};var Q=function(a,b,c,d,f,e,h,g,u,v){this.j=a;this.O=b;this.H=c;this.M=d;this.u=f;this.s=e;this.l=null;this.G=!1;this.o=v;this.I=u;this.h=document.getElementById("pubmute"+g);this.g=document.getElementById("admute"+g);this.i=document.getElementById("wta"+g);this.J=parseInt(g,10)||0;P(this.j,"mouseenter_custom",this,this.m);P(this.j,"mouseleave_custom",this,this.C);this.h&&(P(this.h,"mouseenter_custom",this,this.V),P(this.h,"mouseleave_custom",this,this.A),t(this.h,"click",n(this.N,this)));this.g&&(P(this.g,"mouseenter_custom",this,this.P),P(this.g,"mouseleave_custom",this,this.v),t(this.g,"click",n(this.L,this)));this.i&&(P(this.i,"mouseenter_custom",this,this.W),P(this.i,"mouseleave_custom",this,this.B),t(this.i,"click",n(this.K,this)));this.j.className=["ddmc",h&1?"left":"right",h&2?"top":"bottom"].join(" ")},P=function(a,b,c,d){d=la([a],b,n(d,c));t(a,O(b),n(d,c))};Q.prototype.N=function(){R(this);S(this,0);var a=this.H;null!=a&&a();T(this,"user_feedback_menu_option","3",!0)};Q.prototype.L=function(){R(this);S(this,1);var a=this.H;null!=a&&a();T(this,"user_feedback_menu_option","1",!0)};var S=function(a,b){b={type:b,close_button_token:a.s,creative_conversion_url:a.u,ablation_config:a.I,undo_callback:a.M,creative_index:a.J};if(a.o)a.o.fireOnObject("mute_option_selected",b);else{a:{a=["muteSurvey"];for(var c=l,d;d=a.shift();)if(null!=c[d])c=c[d];else{a=null;break a}a=c}a&&a.setupSurveyPage(b)}};Q.prototype.K=function(){R(this);T(this,"closebutton_whythisad_click","1",!1)};var U=function(a,b){a.j.style.display=b?"":"none"};Q.prototype.C=function(){this.l=l.setTimeout(n(function(){R(this);this.l=null},this),500)};Q.prototype.m=function(){null!=this.l&&(l.clearTimeout(this.l),this.l=null)};var R=function(a){var b=a.O;null!=b&&b();V(a)&&U(a,!1)};k=Q.prototype;k.V=function(){this.h&&q(this.h,"dropdown-item-hover");this.v();this.B()};k.A=function(){this.h&&r(this.h,"dropdown-item-hover")};k.P=function(){this.g&&q(this.g,"dropdown-item-hover");this.A();this.B()};k.v=function(){this.g&&r(this.g,"dropdown-item-hover")};k.W=function(){this.i&&q(this.i,"dropdown-item-hover");this.v();this.A()};k.B=function(){this.i&&r(this.i,"dropdown-item-hover")};var V=function(a){return"none"!==a.j.style.display},T=function(a,b,c,d){a=a.u+"&label="+b+(c?"&label_instance="+c:"")+(d?"&cbt="+a.s:"");b=window;b.google_image_requests||(b.google_image_requests=[]);c=b.document.createElement("img");c.src=a;b.google_image_requests.push(c)};var W=null,pa=function(a,b,c,d,f,e,h,g,u,v,Z,na,aa){this.u=f;this.s=e;this.o=document.getElementById("cb-x"+Z);f=n(this.w,this);e=n(this.D,this);var oa=n(this.F,this);d?(g=g?1:0,u&&(g|=2),d=new Q(d,f,e,oa,this.u,this.s,g,Z,na,aa)):d=null;this.h=d;this.l=document.getElementById("pbc");this.g=a;this.m=b;this.j=c;this.i=aa;"undefined"!=typeof SVGElement&&"undefined"!=typeof document.createElementNS&&v&&(this.g.style.backgroundImage="none",this.o.appendChild(ma(h)));t(this.g,"click",n(this.R,this));t(this.g,"mouseover",n(this.U,this));t(this.g,"mouseout",n(this.T,this))},ma=function(a){var b=document.createElementNS("//www.w3.org/2000/svg","svg"),c=document.createElementNS("//www.w3.org/2000/svg","path"),d=document.createElementNS("//www.w3.org/2000/svg","path"),f=1.15/Math.sqrt(2),e=.2*a,f="M"+(e+f+1)+","+e+"L"+(a/2+1)+","+(a/2-f)+"L"+(a-e-f+1)+","+e+"L"+(a-e+1)+","+(e+f)+"L"+(a/2+f+1)+","+a/2+"L"+(a-e+1)+","+(a-e-f)+"L"+(a-e-f+1)+","+(a-e)+"L"+(a/2+1)+","+(a/2+f)+"L"+(e+f+1)+","+(a-e)+"L"+(e+1)+","+(a-e-f)+"L"+(a/2-f+1)+","+a/2+"L"+(e+1)+","+(e+f)+"Z",e="M0,0L1,0L1,"+a+"L0,"+a+"Z";b.setAttribute("class","cb-x-svg");b.setAttribute("width",a+1);b.setAttribute("height",a);b.appendChild(c);b.appendChild(d);c.setAttribute("d",f);c.setAttribute("class","cb-x-svg-path");d.setAttribute("d",e);d.setAttribute("class","cb-x-svg-s-path");return b},X=function(a){a&&(a.style.display="block")},Y=function(a){a&&(a.style.display="none")};k=pa.prototype;k.R=function(){if(this.h){this.h.m();var a=this.h;V(a)?V(a)&&U(a,!1):(U(a,!0),a.G||(a.G=!0,T(a,"user_feedback_menu_interaction")))}};k.U=function(){this.h&&this.h.m();null!==this.g&&q(this.g,"cbc-hover")};k.T=function(){this.h&&V(this.h)?this.h.C():this.w()};k.w=function(){null!==this.g&&r(this.g,"cbc-hover")};k.D=function(){this.w();this.i?this.i.showOnly(0):(Y(this.g),Y(this.j),Y(this.l),X(this.m))};k.F=function(){this.i?this.i.resetAll():(X(this.g),X(this.j),X(this.l),Y(this.m))};m("cbb",function(a,b,c,d,f,e,h,g,u,v){t(window,"load",function(){a&&(W=new pa(a,document.getElementById("cbtf"),b,c,d,f,15,h,g,u,v,e,window.adSlot))})});m("cbbha",function(){W.D()});m("cbbsa",function(){W.F()});}).call(this);document.write('\n\x3cscript\x3ecbb(document.getElementById(\'cbc\'),document.getElementById(\'google_image_div\'),document.getElementById(\'ddmc\'),\'https://googleads.g.doubleclick.net/pagead/conversion/?ai\x3dCvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB\x26sigh\x3dBZh1mJnUZ3g\',\'eqZze3NZ_hQI-pCf1b8BEK_EyJ4CGJKmlCciEnd3dy5rZWZpZGNoaW5hLmNvbTIICAUTGIfjBhRCF2NhLXB1Yi02MDE1MDI5MjQ5OTM2NDg4SA9YA3AB\',\'{\x22key_value\x22:[],\x22googMsgType\x22:\x22sth\x22}\',false,false,false,\'\');\x3c/script\x3e');</script>
    <script>cbb(document.getElementById('cbc'),document.getElementById('google_image_div'),document.getElementById('ddmc'),'https://googleads.g.doubleclick.net/pagead/conversion/?ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&sigh=BZh1mJnUZ3g','eqZze3NZ_hQI-pCf1b8BEK_EyJ4CGJKmlCciEnd3dy5rZWZpZGNoaW5hLmNvbTIICAUTGIfjBhRCF2NhLXB1Yi02MDE1MDI5MjQ5OTM2NDg4SA9YA3AB','{"key_value":[],"googMsgType":"sth"}',false,false,false,'');</script>
                    </div-->

                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12" style="
                         margin-top: 10px; color:#9e1461">


                    <div class="row">

                        <div class="col-lg-7 col-md-7 col-sm-7 ">

                            <div class="carousel-heading no-margin">
                                <h4><?php echo $info[0]->title; ?> <?php
                                    if ((int) $info[0]->price > 0) {
                                        //echo ' &#187 KSH. ' . number_format($info[0]->price, 2);
                                    } else {
                                        
                                    };
                                    ?></h4>
                            </div>

                            <div class="page-content contact-info card">
                                <div class="item">            
                                    <div class="clearfix">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <?php
                                            $img = explode(",", $info[0]->image_path);
                                            foreach ($img as $im) {
                                                ?>

                                                <li data-thumb="<?php echo base_url() . $im; ?>" > 
                                                    <div class="container1" style="width: 100%;">
                                                        <img style=""  src="<?php echo base_url() . $im; ?>"  />
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                    <span class="well " style="border-bottom: none;"><?php echo '<strong>' . $info[0]->region . '</strong>'; ?> &#187 <?php
                                        $date = new DateTime($info[0]->date_posted);
                                        echo $date->format('jS F Y  ');
                                        ?> &#187 <?php echo '<strong>Listing ID</strong>: ' . $info[0]->id; ?></span>
                                    <div class="well col-lg-12" style="border-top: none;">
                                        <?php echo $info[0]->description; ?>
                                    </div>
                                </div>


                            </div>

                        </div>




                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="middle-banner banner-item " style="background: #000; color: #fff;">
                                <h4>  <?php echo 'KES. ' . number_format($info[0]->price, 2); ?></h4>
                                <p><?php
                                    if ($info[0]->nego === 'yes') {
                                        echo ' &#187 Negotiable';
                                    } else {
                                        
                                    };
                                    ?></p>
                            </div>
                            <div class="left-side-banner banner-item icon-on-right gray">
                                <span class="button show_mobile">SHOW NUMBER</span>
                                <h4 id="mobile_placeholder">07xx xxx xxx</h4>
                                <h4 id="mobile" style="display:none;"><?php echo $info[0]->phone; ?></h4>
                                <p>Mobile Number</p>
                                <i class="icons icon-phone-outline"></i>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 success-message" style="display:none;">
                            <div class=" alert-success" style="padding: 10px; border: 1px solid; border-radius: 2px;"><i class="fa fa-info-circle" ></i> Message received, thank you!</div> 
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                            <a href="#sendMessage" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" style="background: #9e1461; border: 1px solid white;">Send Messsage</a>
                        </div>         

                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                            <?php $this->load->view('partials/placemap'); ?>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5" style="margin-top:10px;">
                            <div class="middle-banner banner-item icon icon-on-left " style="background: #cf8eb3; color: #fff;">
                                <h4><?php echo @$info[0]->user; ?></h4>
                                <p><?php echo $info[0]->biz_type; ?></p>
                                <i class="icons icon-user-3"></i>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5" style="margin-top:10px;">
                            <div class="middle-banner banner-item icon  " >
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="<?php echo base_url().'home/user/'.$info[0]->user_id.'/?view=list&page='?>"><i class="fa fa-file-text-o"></i> Other listings by <?php echo @$info[0]->user; ?></a></li>
                                    <li class="list-group-item"><a href="#Favourite"><i class="fa fa-heart-o"></i> Favourite listing</a></li>
                                    <li class="list-group-item"><a href="#print"><i class="fa fa-print"></i> Print</a></li>
                                    <li class="list-group-item"> <i class="fa fa-eye"></i> <?php echo $views; ?> Views</li>
                                    <li class="list-group-item"> <i class="fa fa-bullhorn"></i> <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#myModalRepor" > Report Listing</button></li>
                                    <li class="list-group-item"> <?php if ($this->session->userdata('user_id') == TRUE && $ver > 0) { ?>
                                            <a href="<?php echo base_url() . 'home/edits/' . $info[0]->id . '/' . str_replace(" ", "-", $info[0]->title); ?>" class="btn btn-success" style="margin: 20px;"><i class="fa fa-edit"></i> Edit
                                                <?php
                                            } else {
                                                echo '';
                                            }
                                            ?>  </a> </li>
                                </ul> 
                            </div>
                        </div>






                    </div>

                </section>
                <!-- /Main Content -->
                <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; padding: 5px;">




                    <!--div class="col-lg-8 col-md-8 col-sm-8 col-lg-push-2 col-md-push-2 col-sm-push-2" style="margin-bottom: 10px !important;">
                     <a data-original-click-url="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;num=1&amp;cid=CAASEuRo5OQ6BiHr5yDUS6r90IKigQ&amp;sig=AOD64_2kz2bckdoZQ4w5r2KAXu_IPxNoqw&amp;client=ca-pub-6015029249936488&amp;adurl=http://www.kefidchina.com/v3/Grinding-Mill/High-Pressure-Mill.html%3Fgoogle-gdn-en-mill-icmzt-ray%26ID%3D51534271770%26plc%3Da9fc1e99edecb28f.anonymous.google%26k%3D%26tid%3D" id="aw0" target="_blank" href="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;num=1&amp;cid=CAASEuRo5OQ6BiHr5yDUS6r90IKigQ&amp;sig=AOD64_2kz2bckdoZQ4w5r2KAXu_IPxNoqw&amp;client=ca-pub-6015029249936488&amp;adurl=http://www.kefidchina.com/v3/Grinding-Mill/High-Pressure-Mill.html%3Fgoogle-gdn-en-mill-icmzt-ray%26ID%3D51534271770%26plc%3Da9fc1e99edecb28f.anonymous.google%26k%3D%26tid%3D"><img src="https://tpc.googlesyndication.com/simgad/13758949172529847097" alt="" class="img_ad" border="0" height="90" width="970"></a><style>div,ul,li{margin:0;padding:0;}.abgc{height:15px;position:absolute;right:16px;top:0px;text-rendering:geometricPrecision;width:15px;z-index:9020;}.abgb{height:15px;width:15px;}.abgc img{display:block;}.abgc svg{display:block;}.abgs{display:none;height:100%;}.abgl{text-decoration:none;}.abgi{fill-opacity:1.0;fill:#00aecd;stroke:none;}.abgbg{fill-opacity:1.0;fill:#cdcccc;stroke:none;}.abgtxt{fill:black;font-family:'Arial';font-size:100px;overflow:visible;stroke:none;}</style><div id="abgc" class="abgc" dir="ltr"><div id="abgb" class="abgb"><svg height="100%" width="100%"><rect height="100%" width="100%" class="abgbg"></rect><svg x="0px" class="abgi"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></div><div id="abgs" class="abgs"><a id="abgl" class="abgl" href="https://www.google.com/url?ct=abg&amp;q=https://www.google.com/adsense/support/bin/request.py%3Fcontact%3Dabg_afc%26url%3Dhttps://www.olx.co.ke/%26gl%3DKE%26hl%3Den%26client%3Dca-pub-6015029249936488%26ai0%3DCvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&amp;usg=AFQjCNE7bB9aHdAkGP1Rm-lhEFBt5CqPXw" target="_blank"><svg height="100%" width="100%"><path d="M0,0L96,0L96,15L4,15s-4,0,-4,-4z" class="abgbg"></path><svg width="34px" y="11px" x="5px" class="abgtxt"><text>Ads by</text></svg><svg width="38px" y="11px" x="41px" class="abgtxt"><text>Google</text></svg><svg x="81px" class="abgi"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></a></div></div><script>var abgp={elp:document.getElementById('abgcp'),el:document.getElementById('abgc'),ael:document.getElementById('abgs'),iel:document.getElementById('abgb'),hw:15,sw:96,hh:15,sh:15,himg:'https://tpc.googlesyndication.com'+'/pagead/images/abg/icon.png',simg:'https://tpc.googlesyndication.com/pagead/images/abg/en.png',alt:'Ads by Google',t:'Ads by',tw:34,t2:'Google',t2w:38,tbo:0,att:'adsbygoogle',ff:'',halign:'right',fe:false,iba:false,lttp:true,umd:false,uic:false,uit:false,ict:document.getElementById('cbb'),ci:'',icd:undefined,uaal:true,opi: false};</script><script src="https://tpc.googlesyndication.com/pagead/js/r20161205/r20110914/abg.js"></script><style>.cbc{background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_blue2.svg');background-position: right top;background-repeat: no-repeat;cursor:pointer;height:15px;right:0;top:0;margin:0;overflow:hidden;padding:0;position:absolute;transform: scaleX(1);width:16px;z-index:9010;}.cbc.cbc-hover {background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_dark.svg');}.cbc > .cb-x{height: 15px;position:absolute;width: 16px;right:0;top:0;}.cb-x > .cb-x-svg{background-color: lightgray;position:absolute;}.cbc.cbc-hover > .cb-x > .cb-x-svg{background-color: #58585a;}.cb-x > .cb-x-svg > .cb-x-svg-path{fill : #00aecd;}.cbc.cbc-hover > .cb-x > .cb-x-svg > .cb-x-svg-path{fill : white;}.cb-x > .cb-x-svg > .cb-x-svg-s-path{fill : white;}</style><div id="cbc" class="cbc"><div id="cb-x" class="cb-x"></div> </div> <style>.ddmc{background:#ccc;color:#000;padding:0;position:absolute;z-index:9020;max-width:100%;box-shadow:2px 2px 3px #aaaaaa;}.ddmc.left{margin-right:0;left:0px;}.ddmc.right{margin-left:0;right:0px;}.ddmc.top{bottom:20px;}.ddmc.bottom{top:20px;}.ddmc .tip{border-left:4px solid transparent;border-right:4px solid transparent;height:0;position:absolute;width:0;font-size:0;line-height:0;}.ddmc.bottom .tip{border-bottom:4px solid #ccc;top:-4px;}.ddmc.top .tip{border-top:4px solid #ccc;bottom:-4px;}.ddmc.right .tip{right:3px;}.ddmc.left .tip{left:3px;}.ddmc .dropdown-content{display:block;}.dropdown-content{display:none;border-collapse:collapse;}.dropdown-item{font:12px Arial,sans-serif;cursor:pointer;padding:3px 7px;vertical-align:middle;}.dropdown-item-hover, a.dropdown-item.dropdown-item-hover {background:#58585a;color:#fff;}.dropdown-content > table{border-collapse:collapse;border-spacing:0;}.dropdown-content > table > tbody > tr > td{padding:0;}a.dropdown-item {color: inherit;cursor: inherit;display: block;text-decoration: inherit;}</style><div class="ddmc right bottom" id="ddmc" style="display:none"><div class="tip"></div><div class="dropdown-content"><table><tbody><tr><td><div id="pubmute" style="border-bottom:1px solid #999;" class="dropdown-item"><span>Ad covers the page</span></div></td></tr><tr><td><div id="admute" class="dropdown-item"><span>Stop seeing this ad</span></div></td></tr></tbody></table></div></div><script>(function(){var k,l=this,m=function(a,b){a=a.split(".");var c=l;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var d;a.length&&(d=a.shift());)a.length||void 0===b?c[d]?c=c[d]:c=c[d]={}:c[d]=b},ba=function(a,b,c){return a.call.apply(a.bind,arguments)},ca=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},n=function(a,b,c){n=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?ba:ca;return n.apply(null,arguments)};var p="undefined"!=typeof DOMTokenList,q=function(a,b){if(p)a=a.classList,0==a.contains(b)&&a.toggle(b);else{var c=a.className;if(c){for(var c=c.split(/\s+/),d=!1,f=0;f<c.length&&!d;++f)d=c[f]==b;d||(c.push(b),a.className=c.join(" "))}else a.className=b}},r=function(a,b){if(p)a=a.classList,1==a.contains(b)&&a.toggle(b);else{var c=a.className;if(c&&!(0>c.indexOf(b))){for(var c=c.split(/\s+/),d=0;d<c.length;++d)c[d]==b&&c.splice(d--,1);a.className=c.join(" ")}}};var da=function(){var a=!1;try{var b=Object.defineProperty({},"passive",{get:function(){a=!0}});window.addEventListener("test",null,b)}catch(c){}return a}(),t=function(a,b,c){a.addEventListener?a.addEventListener(b,c,da?void 0:!1):a.attachEvent&&a.attachEvent("on"+b,c)};var w=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},x=function(a,b){return a<b?-1:a>b?1:0};var y;a:{var z=l.navigator;if(z){var A=z.userAgent;if(A){y=A;break a}}y=""};var fa=function(a,b){var c=ea;Object.prototype.hasOwnProperty.call(c,a)||(c[a]=b(a))};var ga=-1!=y.indexOf("Opera"),B=-1!=y.indexOf("Trident")||-1!=y.indexOf("MSIE"),ha=-1!=y.indexOf("Edge"),C=-1!=y.indexOf("Gecko")&&!(-1!=y.toLowerCase().indexOf("webkit")&&-1==y.indexOf("Edge"))&&!(-1!=y.indexOf("Trident")||-1!=y.indexOf("MSIE"))&&-1==y.indexOf("Edge"),ia=-1!=y.toLowerCase().indexOf("webkit")&&-1==y.indexOf("Edge"),D=function(){var a=l.document;return a?a.documentMode:void 0},E;a:{var F="",G=function(){var a=y;if(C)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ha)return/Edge\/([\d\.]+)/.exec(a);if(B)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ia)return/WebKit\/(\S+)/.exec(a);if(ga)return/(?:Version)[ \/]?(\S+)/.exec(a)}();G&&(F=G?G[1]:"");if(B){var H=D();if(null!=H&&H>parseFloat(F)){E=String(H);break a}}E=F}var I=E,ea={},J=function(a){fa(a,function(){for(var b=0,c=w(String(I)).split("."),d=w(String(a)).split("."),f=Math.max(c.length,d.length),e=0;0==b&&e<f;e++){var h=c[e]||"",g=d[e]||"";do{h=/(\d*)(\D*)(.*)/.exec(h)||["","","",""];g=/(\d*)(\D*)(.*)/.exec(g)||["","","",""];if(0==h[0].length&&0==g[0].length)break;b=x(0==h[1].length?0:parseInt(h[1],10),0==g[1].length?0:parseInt(g[1],10))||x(0==h[2].length,0==g[2].length)||x(h[2],g[2]);h=h[3];g=g[3]}while(0==b)}return 0<=b})},K;var L=l.document;K=L&&B?D()||("CSS1Compat"==L.compatMode?parseInt(I,10):5):void 0;var M;if(!(M=!C&&!B)){var N;if(N=B)N=9<=Number(K);M=N}M||C&&J("1.9.1");B&&J("9");var ka=function(a,b){if(!a||!b)return!1;if(a.contains&&1==b.nodeType)return a==b||a.contains(b);if("undefined"!=typeof a.compareDocumentPosition)return a==b||!!(a.compareDocumentPosition(b)&16);for(;b&&a!=b;)b=b.parentNode;return b==a};var la=function(a,b,c){var d="mouseenter_custom"==b,f=O(b);return function(e){e||(e=window.event);if(e.type==f){if("mouseenter_custom"==b||"mouseleave_custom"==b){var h;if(h=d?e.relatedTarget||e.fromElement:e.relatedTarget||e.toElement)for(var g=0;g<a.length;g++)if(ka(a[g],h))return}c(e)}}},O=function(a){return"mouseenter_custom"==a?"mouseover":"mouseleave_custom"==a?"mouseout":a};var Q=function(a,b,c,d,f,e,h,g,u,v){this.j=a;this.O=b;this.H=c;this.M=d;this.u=f;this.s=e;this.l=null;this.G=!1;this.o=v;this.I=u;this.h=document.getElementById("pubmute"+g);this.g=document.getElementById("admute"+g);this.i=document.getElementById("wta"+g);this.J=parseInt(g,10)||0;P(this.j,"mouseenter_custom",this,this.m);P(this.j,"mouseleave_custom",this,this.C);this.h&&(P(this.h,"mouseenter_custom",this,this.V),P(this.h,"mouseleave_custom",this,this.A),t(this.h,"click",n(this.N,this)));this.g&&(P(this.g,"mouseenter_custom",this,this.P),P(this.g,"mouseleave_custom",this,this.v),t(this.g,"click",n(this.L,this)));this.i&&(P(this.i,"mouseenter_custom",this,this.W),P(this.i,"mouseleave_custom",this,this.B),t(this.i,"click",n(this.K,this)));this.j.className=["ddmc",h&1?"left":"right",h&2?"top":"bottom"].join(" ")},P=function(a,b,c,d){d=la([a],b,n(d,c));t(a,O(b),n(d,c))};Q.prototype.N=function(){R(this);S(this,0);var a=this.H;null!=a&&a();T(this,"user_feedback_menu_option","3",!0)};Q.prototype.L=function(){R(this);S(this,1);var a=this.H;null!=a&&a();T(this,"user_feedback_menu_option","1",!0)};var S=function(a,b){b={type:b,close_button_token:a.s,creative_conversion_url:a.u,ablation_config:a.I,undo_callback:a.M,creative_index:a.J};if(a.o)a.o.fireOnObject("mute_option_selected",b);else{a:{a=["muteSurvey"];for(var c=l,d;d=a.shift();)if(null!=c[d])c=c[d];else{a=null;break a}a=c}a&&a.setupSurveyPage(b)}};Q.prototype.K=function(){R(this);T(this,"closebutton_whythisad_click","1",!1)};var U=function(a,b){a.j.style.display=b?"":"none"};Q.prototype.C=function(){this.l=l.setTimeout(n(function(){R(this);this.l=null},this),500)};Q.prototype.m=function(){null!=this.l&&(l.clearTimeout(this.l),this.l=null)};var R=function(a){var b=a.O;null!=b&&b();V(a)&&U(a,!1)};k=Q.prototype;k.V=function(){this.h&&q(this.h,"dropdown-item-hover");this.v();this.B()};k.A=function(){this.h&&r(this.h,"dropdown-item-hover")};k.P=function(){this.g&&q(this.g,"dropdown-item-hover");this.A();this.B()};k.v=function(){this.g&&r(this.g,"dropdown-item-hover")};k.W=function(){this.i&&q(this.i,"dropdown-item-hover");this.v();this.A()};k.B=function(){this.i&&r(this.i,"dropdown-item-hover")};var V=function(a){return"none"!==a.j.style.display},T=function(a,b,c,d){a=a.u+"&label="+b+(c?"&label_instance="+c:"")+(d?"&cbt="+a.s:"");b=window;b.google_image_requests||(b.google_image_requests=[]);c=b.document.createElement("img");c.src=a;b.google_image_requests.push(c)};var W=null,pa=function(a,b,c,d,f,e,h,g,u,v,Z,na,aa){this.u=f;this.s=e;this.o=document.getElementById("cb-x"+Z);f=n(this.w,this);e=n(this.D,this);var oa=n(this.F,this);d?(g=g?1:0,u&&(g|=2),d=new Q(d,f,e,oa,this.u,this.s,g,Z,na,aa)):d=null;this.h=d;this.l=document.getElementById("pbc");this.g=a;this.m=b;this.j=c;this.i=aa;"undefined"!=typeof SVGElement&&"undefined"!=typeof document.createElementNS&&v&&(this.g.style.backgroundImage="none",this.o.appendChild(ma(h)));t(this.g,"click",n(this.R,this));t(this.g,"mouseover",n(this.U,this));t(this.g,"mouseout",n(this.T,this))},ma=function(a){var b=document.createElementNS("//www.w3.org/2000/svg","svg"),c=document.createElementNS("//www.w3.org/2000/svg","path"),d=document.createElementNS("//www.w3.org/2000/svg","path"),f=1.15/Math.sqrt(2),e=.2*a,f="M"+(e+f+1)+","+e+"L"+(a/2+1)+","+(a/2-f)+"L"+(a-e-f+1)+","+e+"L"+(a-e+1)+","+(e+f)+"L"+(a/2+f+1)+","+a/2+"L"+(a-e+1)+","+(a-e-f)+"L"+(a-e-f+1)+","+(a-e)+"L"+(a/2+1)+","+(a/2+f)+"L"+(e+f+1)+","+(a-e)+"L"+(e+1)+","+(a-e-f)+"L"+(a/2-f+1)+","+a/2+"L"+(e+1)+","+(e+f)+"Z",e="M0,0L1,0L1,"+a+"L0,"+a+"Z";b.setAttribute("class","cb-x-svg");b.setAttribute("width",a+1);b.setAttribute("height",a);b.appendChild(c);b.appendChild(d);c.setAttribute("d",f);c.setAttribute("class","cb-x-svg-path");d.setAttribute("d",e);d.setAttribute("class","cb-x-svg-s-path");return b},X=function(a){a&&(a.style.display="block")},Y=function(a){a&&(a.style.display="none")};k=pa.prototype;k.R=function(){if(this.h){this.h.m();var a=this.h;V(a)?V(a)&&U(a,!1):(U(a,!0),a.G||(a.G=!0,T(a,"user_feedback_menu_interaction")))}};k.U=function(){this.h&&this.h.m();null!==this.g&&q(this.g,"cbc-hover")};k.T=function(){this.h&&V(this.h)?this.h.C():this.w()};k.w=function(){null!==this.g&&r(this.g,"cbc-hover")};k.D=function(){this.w();this.i?this.i.showOnly(0):(Y(this.g),Y(this.j),Y(this.l),X(this.m))};k.F=function(){this.i?this.i.resetAll():(X(this.g),X(this.j),X(this.l),Y(this.m))};m("cbb",function(a,b,c,d,f,e,h,g,u,v){t(window,"load",function(){a&&(W=new pa(a,document.getElementById("cbtf"),b,c,d,f,15,h,g,u,v,e,window.adSlot))})});m("cbbha",function(){W.D()});m("cbbsa",function(){W.F()});}).call(this);document.write('\n\x3cscript\x3ecbb(document.getElementById(\'cbc\'),document.getElementById(\'google_image_div\'),document.getElementById(\'ddmc\'),\'https://googleads.g.doubleclick.net/pagead/conversion/?ai\x3dCvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB\x26sigh\x3dBZh1mJnUZ3g\',\'eqZze3NZ_hQI-pCf1b8BEK_EyJ4CGJKmlCciEnd3dy5rZWZpZGNoaW5hLmNvbTIICAUTGIfjBhRCF2NhLXB1Yi02MDE1MDI5MjQ5OTM2NDg4SA9YA3AB\',\'{\x22key_value\x22:[],\x22googMsgType\x22:\x22sth\x22}\',false,false,false,\'\');\x3c/script\x3e');</script>
    <script>cbb(document.getElementById('cbc'),document.getElementById('google_image_div'),document.getElementById('ddmc'),'https://googleads.g.doubleclick.net/pagead/conversion/?ai=CvGWs70pRWLuiHKeZtge6jqyIDaGcn-1G-pCf1b8B3431_QgQASDMnbMvYJWL5gSgAY6t1dkDyAEDqQK4Yw86KHKDPuACAKgDAcgDmQSqBJsBT9C7QSlN3s68W4XrWUpVqLjgaD0udnUOK-v9UeoQxgfaTg2Rx7tctABCcGQZtrPXSfAbTfoNWPbG56TuKz467nayUrlrGWo5FKNMK3_lonVl8lvzrbOfL-OrlyFu_afe4j5d05tXiqAXAdwg-HpaMNoyZyg-9VeyeDLfrcTFSBq_Zqn61Cmbf4KPAnIlZN37Dw8-0DavjvUGoc7gBAGIBgGgBgOAB9rSqiaoB6a-G9gHAdIIBQiAYRAB&sigh=BZh1mJnUZ3g','eqZze3NZ_hQI-pCf1b8BEK_EyJ4CGJKmlCciEnd3dy5rZWZpZGNoaW5hLmNvbTIICAUTGIfjBhRCF2NhLXB1Yi02MDE1MDI5MjQ5OTM2NDg4SA9YA3AB','{"key_value":[],"googMsgType":"sth"}',false,false,false,'');</script>
                    </div-->

                </div>


            </div>
            <!-- /Content -->
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">

                    <div class="carousel-heading no-margin">
                        <h4>Similar Listings</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 " style="margin-top:5px !important;">
                    <div class="row subcategories " style="margin-left: 2px !important;">
                        <?php
                        foreach ($similar as $ob):
                            $img = explode(",", $ob->image_path);
                            ?>

                            <!-- Subcategory -->
                            <div class="col-lg-fifth col-md-fifth col-sm-fifth subcategory" style="width:190px !important;" >

                                <a class="product-image" href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>">
                                    <img src="<?php echo base_url() . $img[0]; ?>" alt="<?php echo $ob->title; ?>"  style="height:160px !important;"  /></a>
                                <div class="product-info card">
                                    <h5><a style="color:black;" href="<?php echo base_url() . 'home/loadsingle/' . $ob->id . '/' . str_replace(" ", "-", $ob->title); ?>"><?php echo mb_strimwidth($ob->title, 0, 15, "..."); ?></a></h5>
                                    <span class="price" style="color: #9e1461"><?php echo 'KES. ' . number_format($ob->price, 2); ?></span>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 _message " id="_message" >

                                <div class="carousel-heading no-margin">
                                    <h4>Send Message</h4>
                                </div>

                                <div class="page-content contact-form card">

                                    <form id="smart-form-message">


                                        <input name="name" type="text" id="name" required placeholder="Name">
                                        <input name="ad_id" type="hidden" value="<?php echo $info[0]->id; ?>">


                                        <input name="email" id="email" type="email" placeholder="Email" required>

                                        <label>Subject</label>
                                        <input name="subject" type="text"  id="subject" readonly value="<?php echo $info[0]->title; ?>">


                                        <textarea name="message" id="message" required placeholder="Type Message here..."></textarea>

                                        <input class="big" type="submit" value="Send Message">

                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>


                <!-- Lower Footer -->
                <?php $this->load->view('partials/top-footer'); ?>
                <!-- Footer -->


                <div id="back-to-top">
                    <i class="icon-up-dir"></i>
                </div>

            </div>


            <div class="modal fade" id="myModalRepor" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">

                            <div class="col-lg-12 col-md-12 col-sm-12 add_report ">

                                <div class="carousel-heading no-margin">
                                    <h4>Report Listing</h4>
                                </div>


                                <div class="page-content contact-form card">

                                    <br>
                                    <p><a class="btn btn-success btn-block" href="" ><i class="fa fa-exclamation-triangle"></i> My Safety Precautions</a></a></p>

                                    <form id="smart-form-report">


                                        <input name="rname" id="rname" type="text" required placeholder="Name">
                                        <input name="ad_id" type="hidden" value="<?php echo $info[0]->id; ?>">
                                        <br>



                                        <input name="remail" id="remail" type="email" placeholder="Email" required>
                                        <br>
                                        <br>



                                        <input name="rphone" id="rphone" type="text" placeholder="Phone" required>

                                        <label></label>
                                        <select name="rsubject" id="rsubject">
                                            <option value="Wrong category placement">Listing in wrong category placement</option>
                                            <option value="Listing is a scam">Listing is a scam</option>
                                            <option value="Listing is a spam">Listing is a spam</option>
                                        </select>
                                        <br>
                                        <br>



                                        <textarea name="rmessage" id="rmessage" required placeholder="Type Message here..."></textarea>

                                        <button class="btn btn-danger btn-lg btn-block " id="Reporter" style="margin-bottom: 20px;"><i class="fa fa-bullhorn"></i> Report </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>


                <!-- Lower Footer -->
                <?php $this->load->view('partials/top-footer'); ?>
                <!-- Footer -->


                <div id="back-to-top">
                    <i class="icon-up-dir"></i>
                </div>

            </div>
            <!-- Container -->
            <script>
                $(document).ready(function () {

                    $(".imgLiquid").imgLiquid();

                });
                $(function () {
                    base_url = "<?php echo base_url(); ?>";
                    $('.show_mobile').click(function () {
                        $(this).hide();
                        $('#mobile_placeholder').remove();
                        $('#mobile').show();
                    });

                    $('.reporterButton').click(function () {
                        $(this).hide();
                        $('._message').slideUp();
                        $('.add_report').slideDown();
                    });

                    $("#smart-form-report").on("submit", function (e) {
                        e.preventDefault();
                        $report;
                    });
                    $("#smart-form-message").on("submit", function (e) {
                        e.preventDefault();
                        $message;
                    });

                    var $report = $("#smart-form-report").validate({
                        errorElement: 'div',
                        error: function (label) {
                            $(this).addClass("error");
                        },
                        rules: {
                            remail: {
                                required: true,
                                email: true
                            },
                            rname: {
                                required: true
                            },
                            rmessage: {
                                required: true
                            },
                            rphone: {
                                required: true,
                                minlength: 10,
                                maxlength: 10,
                                number: true

                            },
                            password: {
                                required: true,
                                minlength: 3,
                                maxlength: 20
                            },
                            //                },
                            //                passwordConfirm: {
                            //                    required: true,
                            //                    minlength: 3,
                            //                    maxlength: 20,
                            //                    equalTo: '#password'
                            //                },
                        },
                        // Messages for form validation
                        messages: {
                            email: {
                                required: 'Please enter your email address',
                                email: 'Please enter a VALID email address'
                            },
                            phone: {
                                required: 'Your phone number is required'
                            },
                            description: {
                                required: 'Please describe your Ad'
                            },
                            fullname: {
                                required: 'Your full name is required'
                            },
                            password: {
                                required: 'Your password is required'
                            },
                            dob: {
                                required: 'Date of Birth is required'
                            },
                            dod: {
                                required: 'Date of Passing On is required'
                            },
                        },
                        submitHandler: function (form) {
                            $.post(base_url + 'home/report/', $('#smart-form-report').serialize(), function () {
                                $('.add_report').slideUp();
                                $('.success-message').show();
                            }).fail(function () {

                            });

                        },
                        // Do not change code below
                        errorPlacement: function (error, element) {
                            error.insertAfter(element.parent());

                        }
                    });

                    var $message = $("#smart-form-message").validate({
                        errorElement: 'div',
                        error: function (label) {
                            $(this).addClass("error");
                        },
                        rules: {
                            email: {
                                required: true,
                                email: true
                            },
                            name: {
                                required: true
                            },
                            message: {
                                required: true
                            },
                            phone: {
                                required: true,
                                minlength: 10,
                                maxlength: 10,
                                number: true

                            },
                            password: {
                                required: true,
                                minlength: 3,
                                maxlength: 20
                            },
                            //                },
                            //                passwordConfirm: {
                            //                    required: true,
                            //                    minlength: 3,
                            //                    maxlength: 20,
                            //                    equalTo: '#password'
                            //                },
                        },
                        // Messages for form validation
                        messages: {
                            email: {
                                required: 'Please enter your email address',
                                email: 'Please enter a VALID email address'
                            },
                            phone: {
                                required: 'Your phone number is required'
                            },
                            description: {
                                required: 'Please describe your Ad'
                            },
                            fullname: {
                                required: 'Your full name is required'
                            },
                            password: {
                                required: 'Your password is required'
                            },
                            dob: {
                                required: 'Date of Birth is required'
                            },
                            dod: {
                                required: 'Date of Passing On is required'
                            },
                        },
                        submitHandler: function (form) {
                            $.post(base_url + 'home/message/', $('#smart-form-message').serialize(), function () {
                                $('._message').slideUp();
                                $('.success-message').show();
                            }).fail(function () {

                            });

                        },
                        // Do not change code below
                        errorPlacement: function (error, element) {
                            error.insertAfter(element.parent());

                        }
                    });


                });
            </script>

            <?php $this->load->view('partials/footer'); ?>

            <script>
                $(document).ready(function () {
                    $('#image-gallery').lightSlider({
                        gallery: true,
                        item: 1,
                        thumbItem: 9,
                        slideMargin: 0,
                        speed: 500,
                        auto: false,
                        vThumbWidth: 200,
                        loop: false,
                        responsive: [],
                        verticalHeight: 700,
                        onSliderLoad: function () {
                            $('#image-gallery').removeClass('cS-hidden');
                        }
                    });

                });
            </script>
    </body>

</html>