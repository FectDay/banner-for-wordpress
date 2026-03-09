<?php
/*
Plugin Name: Vertical Full Height Banner by FectDay
Version: 3.0
*/

if (!defined('ABSPATH')) exit;

add_action('wp_footer', function(){

$slug="PLEASE INSERT YOUR URL";
$text="TEXT ON BANNER";

$home=esc_url(home_url('/'));
$target=esc_url(home_url("/$slug/"));

$is_target = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/') === $slug;

$link = $is_target ? $home : $target;
$side = $is_target ? "left" : "right";
?>

<style>

/* overlay */
#march8-overlay{
position:fixed;
inset:0;
background:rgba(0,0,0,.45);
opacity:0;
pointer-events:none;
transition:.3s;
z-index:9998;
}

/* full-height banner */
#march8-banner{
position:fixed;
top:0;
bottom:0;
width:130px;
z-index:9999;
display:flex;
align-items:center;
justify-content:center;
transition:.35s;
}

#march8-banner.right{ right:0; }
#march8-banner.left{ left:0; }

/* clickable content */
#march8-banner a{
display:flex;
align-items:center;
justify-content:center;
flex-direction:column;
width:100%;
height:100%;
padding:30px 14px;
text-align:center;
font-size:18px;
font-weight:600;
text-decoration:none;
color:#fff;
background:linear-gradient(180deg,#ff78b7,#ff3a8f);
box-shadow:0 0 40px rgba(0,0,0,.25);
transition:.3s;
}

/* hover shift */
#march8-banner.right a:hover{ transform:translateX(-6px); }
#march8-banner.left a:hover{ transform:translateX(6px); }

/* dim site on hover */
@media (hover:hover){
#march8-banner:hover ~ #march8-overlay{
opacity:1;
}
}

/* MOBILE MODE */
@media (max-width:768px){

#march8-banner{
top:auto;
bottom:0;
left:0!important;
right:0!important;
height:70px;
width:auto;
}

#march8-banner a{
flex-direction:row;
font-size:17px;
padding:10px 20px;
}

}

</style>

<div id="march8-banner" class="<?php echo $side ?>">
<a href="<?php echo $link ?>"><?php echo esc_html($text) ?></a>
</div>

<div id="march8-overlay"></div>

<?php
});
