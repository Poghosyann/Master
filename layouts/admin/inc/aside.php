<aside class="sidebar">
    <div class="scrollbar-inner">
        <ul class="navigation">
            <li class="<?php if(!isset($url->DIR[1]) && $url->PAGE=="default"){?>navigation__active<?php }?>">
                <a href="/admin/"><i class="fa fa-pencil-square"></i>Բաժինների խմբագրում</a>
            </li>

            <li <?php if(!isset($url->DIR[1]) && $url->PAGE=="services") {?>class="navigation__active"<?php }?>><a href="/admin/services"><i class="fa fa-clone"></i> Ծառայություններ</a></li>
        <li <?php if(!isset($url->DIR[1]) && $url->PAGE=="suggestion"){?>class="navigation__active"<?php }?>><a href="/admin/suggestion"><i class="fa fa-handshake-o"></i>Առաջարկներ</a></li>
        <li <?php if(!isset($url->DIR[1]) && $url->PAGE=="materials"){?>class="navigation__active"<?php }?>><a href="/admin/materials"><i class="fa fa-adjust"></i>Մատերիալներ</a></li>
        <li <?php if(!isset($url->DIR[1]) && $url->PAGE=="brands"){?>class="navigation__active"<?php }?>><a href="/admin/brands"><i class="fa fa-bullseye"></i>Բրենդներ</a></li>
        <li <?php if(!isset($url->DIR[1]) && $url->PAGE=="gallery"){?>class="navigation__active"<?php }?>><a href="/admin/gallery"><i class="fa fa-photo"></i> Պատկերասրահ</a></li>
            <hr>
            <li>
                <a href="?cmd=logOut"><i class="zmdi zmdi-sign-in"></i> Ելք</a>
            </li>
        </ul>
    </div>
</aside>


<aside class="chat aside-content">
    <div class="page-loader">
        <div class="page-loader__spinner">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <span class="zmdi zmdi-close hidden-sm-down" data-ma-action="aside-close" data-ma-target=".aside-content"></span>
    <div class="chat__header">
        <span class="zmdi zmdi-arrow-right" data-ma-action="aside-close" data-ma-target=".aside-content"></span>
        <a href="" target="_blank" class="chat__title">Դիտել հղումը <i class="zmdi zmdi-share"></i></a>
    </div>
    <div class="scrollbar-main content-box"></div>
</aside>