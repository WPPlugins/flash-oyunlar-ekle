<?php
ob_start();
session_start();
/*
Plugin Name: Flash Oyunlar Ekle
Plugin URI: http://www.oyunsokagi.com/sitene-oyun-ekle.php
Description: Flash oyun eklentisi ile sitenize 40'a yakın kategoride yüzlerce oyun ekleyebilirsiniz. Sitenize kolaylıkla oyun ekleyebileceğiniz ve ziyaretçilerinizin sitenizde daha fazla kalmalarını sağlayacak bir eklentidir. Oyun kategorileri, satır ve sütun sayıları, yazı fontu ve boyutu gibi seçeneklerle neredeyse sınırsız sayıda opsiyonlarla sitenize oyun ekleyebilir ve hatta başlı başına bir oyun sitesi kurabilirsiniz.
Version: 1.1
Author: OyunSokagi.com
Author URI: http://www.oyunsokagi.com
*/
?>
<?php
add_action('wp_ajax_nopriv_flash_games_plugin_script',"flash_games_plugin_script");
add_action('wp_ajax_flash_games_plugin_script',"flash_games_plugin_script");

function flash_games_plugin_script(){
 $sort_array = array(
	'populer-oyunlar' => 'En Çok Oynanan Oyunlar',
	'yeni-oyunlar' => 'En Yeni Oyunlar',
	'begenilen-oyunlar' => 'En Çok Beğenilen Oyunlar',
	'3d-oyunlar' => '3d Oyunlar',
	'aksiyon-oyunlari' => 'Aksiyon Oyunları',
	'araba-oyunlari' => 'Araba Oyunları',
	'atari-oyunlari' => 'Atari Oyunları',
	'avatar-oyunlari' => 'Avatar Oyunları',
	'barbie-oyunlari' => 'Barbie Oyunları',
	'bebek-oyunlari' => 'Bebek Oyunları',
	'beceri-oyunlari' => 'Beceri Oyunları',
	'ben-10-oyunlari' => 'Ben 10 Oyunları',
	'ciftlik-oyunlari' => 'Çiftlik Oyunları',
	'cocuk-oyunlari' => 'Çocuk Oyunları',
	'dini-oyunlar' => 'Dini Oyunlar',
	'dovus-oyunlari' => 'Dövüş Oyunları',
	'futbol-oyunlari' => 'Futbol Oyunları',
	'giydirme-oyunlari' => 'Giydirme Oyunları',
	'komik-oyunlar' => 'Komik Oyunlar',
	'macera-oyunlari' => 'Macera Oyunları',
	'makyaj-oyunlari' => 'Makyaj Oyunları',
	'mario-oyunlari' => 'Mario Oyunları',
	'motor-oyunlari' => 'Motor Oyunları',
	'nisan-oyunlari' => 'Nisan Oyunları',
	'oda-oyunlari' => 'Oda Oyunları',
	'orumcek-adam-oyunlari' => 'Örümcek Adam Oyunları',
	'savas-oyunlari' => 'Savaş Oyunları',
	'spor-oyunlari' => 'Spor Oyunları',
	'sunger-bob-oyunlari' => 'Sünger Bob Oyunları',
	'tom-ve-jerry-oyunlari' => 'Tom ve Jerry Oyunları',
	'uzay-oyunlari' => 'Uzay Oyunları',
	'winx-oyunlari' => 'Winx Oyunları',
	'yapboz-oyunlari' => 'Yapboz Oyunları',
	'yaris-oyunlari' => 'Yarış Oyunları',
	'zeka-oyunlari' => 'Zeka Oyunları',
	'zombi-oyunlari' => 'Zombi Oyunları'
);
	$html = '<script type="text/javascript">';	
	$html .= 'var os_color = "'.$_POST['color'].'"; ';
	$html .= 'var os_bgcolor = "'.$_POST['bgcolor'].'"; ';
	$html .= 'var os_fontsize = "'.$_POST['os_fontsize'].'"; ';
	$html .= 'var os_fontfamily = "'.$_POST['fontfamily'].'"; ';
	$html .= 'var os_kategori = "'.$_POST['kategori'].'"; ';
	$html .= 'var os_satirsayisi = "'.$_POST['satirsayisi'].'"; ';
	$html .= 'var os_sutunsayisi = "'.$_POST['sutunsayisi'].'"; ';
	$html .= 'var os_sayfasayisi = "'.$_POST['sayfasayisi'].'"; ';
	$var = ($_POST['kategori']!='yeni-oyunlar') ? $_POST['kategori']."/" : '';
	$var = ($_POST['kategori']!='populer-oyunlar') ? $_POST['kategori']."/" : '';
	$var = ($_POST['kategori']!='begenilen-oyunlar') ? $_POST['kategori']."/" : '';
	
	$html .= '</script><div id="oyunsokagioyunlar'.$_POST['kategori'].'"><a href="http://www.oyunsokagi.com/'.$var.'">'.$sort_array[$_POST['kategori']].'</a></div><script src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunsokagi.oyunlar.v2.js" type="text/javascript"></script>';
	$sy = ($_POST['sayfasayisi']>1) ? 30 : 10;
	$iframe = '<iframe src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunlar.php?os_color='.$_POST['color'].'&os_bgcolor='.$_POST['bgcolor'].'&os_fontsize='.$_POST['os_fontsize'].'&os_fontfamily='.$_POST['fontfamily'].'&os_kategori='.$_POST['kategori'].'&os_satirsayisi='.$_POST['satirsayisi'].'&os_sutunsayisi='.$_POST['sutunsayisi'].'&os_sayfasayisi='.$_POST['sayfasayisi'].'&s=1" width="'.($_POST['sutunsayisi']*142+10).'" height="'.(ceil($_POST['satirsayisi'])*120+$sy).'" scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowTransparency="true" title="oyun" name="oyun"></iframe>';
	
	$result['ok'] = $iframe;
	$result['htmlscript'] = $html;
	
	echo json_encode($result);
	exit;
}

add_action('wp_ajax_nopriv_flash_games_plugin_script_shortcode',"flash_games_plugin_script_shortcode");
add_action('wp_ajax_flash_games_plugin_script_shortcode',"flash_games_plugin_script_shortcode");

function flash_games_plugin_script_shortcode(){
 $sort_array = array(
'populer-oyunlar' => 'En Çok Oynanan Oyunlar',
	'yeni-oyunlar' => 'En Yeni Oyunlar',
	'begenilen-oyunlar' => 'En Çok Beğenilen Oyunlar',
	'3d-oyunlar' => '3d Oyunlar',
	'aksiyon-oyunlari' => 'Aksiyon Oyunları',
	'araba-oyunlari' => 'Araba Oyunları',
	'atari-oyunlari' => 'Atari Oyunları',
	'avatar-oyunlari' => 'Avatar Oyunları',
	'barbie-oyunlari' => 'Barbie Oyunları',
	'bebek-oyunlari' => 'Bebek Oyunları',
	'beceri-oyunlari' => 'Beceri Oyunları',
	'ben-10-oyunlari' => 'Ben 10 Oyunları',
	'ciftlik-oyunlari' => 'Çiftlik Oyunları',
	'cocuk-oyunlari' => 'Çocuk Oyunları',
	'dini-oyunlar' => 'Dini Oyunlar',
	'dovus-oyunlari' => 'Dövüş Oyunları',
	'futbol-oyunlari' => 'Futbol Oyunları',
	'giydirme-oyunlari' => 'Giydirme Oyunları',
	'komik-oyunlar' => 'Komik Oyunlar',
	'macera-oyunlari' => 'Macera Oyunları',
	'makyaj-oyunlari' => 'Makyaj Oyunları',
	'mario-oyunlari' => 'Mario Oyunları',
	'motor-oyunlari' => 'Motor Oyunları',
	'nisan-oyunlari' => 'Nisan Oyunları',
	'oda-oyunlari' => 'Oda Oyunları',
	'orumcek-adam-oyunlari' => 'Örümcek Adam Oyunları',
	'savas-oyunlari' => 'Savaş Oyunları',
	'spor-oyunlari' => 'Spor Oyunları',
	'sunger-bob-oyunlari' => 'Sünger Bob Oyunları',
	'tom-ve-jerry-oyunlari' => 'Tom ve Jerry Oyunları',
	'uzay-oyunlari' => 'Uzay Oyunları',
	'winx-oyunlari' => 'Winx Oyunları',
	'yapboz-oyunlari' => 'Yapboz Oyunları',
	'yaris-oyunlari' => 'Yarış Oyunları',
	'zeka-oyunlari' => 'Zeka Oyunları',
	'zombi-oyunlari' => 'Zombi Oyunları'
);
	$html = '<script type="text/javascript">';	
	$html .= 'var os_color = "'.$_POST['color'].'"; ';
	$html .= 'var os_bgcolor = "'.$_POST['bgcolor'].'"; ';
	$html .= 'var os_fontsize = "'.$_POST['os_fontsize'].'"; ';
	$html .= 'var os_fontfamily = "'.$_POST['fontfamily'].'"; ';
	$html .= 'var os_kategori = "'.$_POST['kategori'].'"; ';
	$html .= 'var os_satirsayisi = "'.$_POST['satirsayisi'].'"; ';
	$html .= 'var os_sutunsayisi = "'.$_POST['sutunsayisi'].'"; ';
	$html .= 'var os_sayfasayisi = "'.$_POST['sayfasayisi'].'"; ';
	$var = ($_POST['kategori']!='yeni-oyunlar') ? $_POST['kategori']."/" : '';
	$var = ($_POST['kategori']!='populer-oyunlar') ? $_POST['kategori']."/" : '';
	$var = ($_POST['kategori']!='begenilen-oyunlar') ? $_POST['kategori']."/" : '';
	$html .= '</script><div id="oyunsokagioyunlar'.$_POST['kategori'].'"><a href="http://www.oyunsokagi.com/'.$var.'">'.$sort_array[$_POST['kategori']].'</a></div><script src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunsokagi.oyunlar.v2.js" type="text/javascript"></script>';
	$sy = ($_POST['sayfasayisi']>1) ? 30 : 10;
	$iframe = '<iframe src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunlar.php?os_color='.$_POST['color'].'&os_bgcolor='.$_POST['bgcolor'].'&os_fontsize='.$_POST['os_fontsize'].'&os_fontfamily='.$_POST['fontfamily'].'&os_kategori='.$_POST['kategori'].'&os_satirsayisi='.$_POST['satirsayisi'].'&os_sutunsayisi='.$_POST['sutunsayisi'].'&os_sayfasayisi='.$_POST['sayfasayisi'].'&s=1" width="'.($_POST['sutunsayisi']*142+10).'" height="'.(ceil($_POST['satirsayisi'])*120+$sy).'" scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowTransparency="true" title="oyun" name="oyun"></iframe>';
	global $wpdb;
	
	mysql_query("DELETE FROM $wpdb->postmeta WHERE meta_key='flash_game_post_shortcode_key' AND post_id='{$_POST['postId']}'");
	add_post_meta($_POST['postId'], 'flash_game_post_shortcode_key', $html);

	
	$result['ok'] = $iframe;
	$result['html'] = $html;
	
	echo json_encode($result);
	exit;
}

function flash_games_register_options_page() {
	add_options_page('Flash Oyunlar Opsiyonlar', 'Flash Oyunlar', 'manage_options', 'flash_games-options', 'flash_games_options_page');
}
add_action('admin_menu', 'flash_games_register_options_page');
 
function flash_games_options_page() {
	$msg = '';
	if(isset($_POST['submit'])) {
		if($_POST['flash-games-editor']!=''){
			if(get_option('flas_game_option',true)){
				update_option( 'flas_game_option', ''.$_POST['flash-games-editor'].'' );
				$msg = "<p style='background-color:#737838;color:white;padding:10px;'>Widget başarıyla kaydedildi</p>";
			}else{
				add_option( 'flas_game_option', ''.$_POST['flash-games-editor'].'', '', 'no' );
				$msg = "<p style='background-color:#737838;color:white;padding:10px;'>Widget başarıyla eklendi</p>";
			}		
		}else	
			$msg = "";
	}
?>
<script type="text/javascript" src="<?php echo plugins_url( 'jquery.form.js' , __FILE__ ); ?>"></script>
<script>
	function kodguncelle(){
		jQuery('.flash_games_ajax_right').html('<img src="<?php echo plugins_url( 'images/loading_332.gif' , __FILE__ ); ?>" />');
		jQuery("#os").ajaxForm({
			dataType: 'json',
			success: function(res){
				jQuery('.flash_games_ajax_right').html(res.ok);
				jQuery('#kod').val(res.htmlscript);
			}
		}).submit();
	}
</script>
<style>
select {width:55px;}
</style>
<script type="text/javascript" src="<?php echo plugins_url();?>/flash-oyunlar/jscolor.js"></script>
<div class="wrap rm_wrap">
	<h2>Sitene Oyun Ekle (Bileşen Ayarları)</h2>	 
		<div class="rm_opts">
		
		<?php
						if($msg!='')
						
						$_SESSION['msg']=$msg;
							echo $_SESSION['msg'];
						unset($_SESSION['msg']);	
					?>
					
			<div style="float:left;" width="369px;margin-right:200px;">
				<form id="os" name="os" action="<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php" method="post">
					<input type="hidden" name="action" value="flash_games_plugin_script">
				<table width="300" style="border:1px solid;padding-top:0px;margin-right:50px;">
				<tbody><tr><td colspan="2" style="background-color:#32475A;color:white;padding-left:25px;"><br>Aşağıdan sitenize uygun görünüm ayarlarını ve göstermek istediğiniz oyun kategorisini seçiniz, sağ bölümde de sitenizde nasıl gözükeceğini hemen görebilirsiniz.<br><br></td></tr>
				<tr><td>Yazı Rengi</td><td><input onchange="kodguncelle()" name="color" id="color" style="width: 65px; background-image: none; background-color: rgb(255, 145, 36); color: rgb(0, 0, 0);" value="000000" class="color"></td></tr>
				<tr><td>Arka Plan</td><td><input onchange="kodguncelle()" id="bgcolor" name="bgcolor" style="width: 65px; background-image: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" value="FFFFFF" class="color" autocomplete="off"></td></tr>
				<tr><td>Yazı Boyutu</td><td>
				<select onchange="kodguncelle()" id="fontsize" name="os_fontsize">
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option selected="" value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				</select></td></tr>
				<tr><td>Yazı Fontu</td><td>
				<select onchange="kodguncelle()" style="width:150px;" id="fontfamily" name="fontfamily">
				<option value="Times New Roman">Times New Roman</option>
				<option selected="" value="Arial">Arial</option>
				<option value="Arial Black">Arial Black</option>
				<option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
				<option value="Tahoma">Tahoma</option>
				<option value="Verdana">Verdana</option>
			
				</select></td></tr>
				
				
				<tr><td>Gösterilecek Oyunlar</td><td>
				<select onchange="kodguncelle()" style="width:150px;" id="kategori" name="kategori">
				<option value="yeni-oyunlar">En Yeni Oyunlar</option>
				<option value="populer-oyunlar">En Çok Oynanan Oyunlar</option>
				<option value="begenilen-oyunlar">En Çok Beğenilen Oyunlar</option>
				<option disabled="" value="">--- Oyun Kategorileri ---</option>
								<option value="3d-oyunlar">3d Oyunlar (41)</option>
			
								<option value="aksiyon-oyunlari">Aksiyon Oyunları (123)</option>
			
								<option value="araba-oyunlari">Araba Oyunları (202)</option>
			
								<option value="atari-oyunlari">Atari Oyunları (36)</option>
			
								<option value="avatar-oyunlari">Avatar Oyunları (7)</option>
			
								<option value="barbie-oyunlari">Barbie Oyunları (34)</option>
			
								<option value="bebek-oyunlari">Bebek Oyunları (12)</option>
			
								<option value="beceri-oyunlari">Beceri Oyunları (195)</option>
			
								<option value="ben-10-oyunlari">Ben 10 Oyunları (42)</option>
			
								<option value="boyama-oyunlari">Boyama Oyunları (20)</option>
			
								<option value="ciftlik-oyunlari">Çiftlik Oyunları (26)</option>
			
								<option value="cocuk-oyunlari">Çocuk Oyunları (144)</option>
			
								<option value="dini-oyunlar">Dini Oyunlar (6)</option>
			
								<option value="dovus-oyunlari">Dövüş Oyunları (104)</option>
			
								<option value="futbol-oyunlari">Futbol Oyunları (57)</option>
			
								<option value="giydirme-oyunlari">Giydirme Oyunları (106)</option>
			
								<option value="komik-oyunlar">Komik Oyunlar (35)</option>
			
								<option value="macera-oyunlari">Macera Oyunları (121)</option>
			
								<option value="makyaj-oyunlari">Makyaj Oyunları (17)</option>
			
								<option value="mario-oyunlari">Mario Oyunları (37)</option>
			
								<option value="motor-oyunlari">Motor Oyunları (53)</option>
			
								<option value="nisan-oyunlari">Nisan Oyunları (85)</option>
			
								<option value="oda-oyunlari">Oda Oyunları (22)</option>
			
								<option value="orumcek-adam-oyunlari">Örümcek Adam Oyunları (8)</option>
			
								<option value="savas-oyunlari">Savaş Oyunları (243)</option>
			
								<option value="spor-oyunlari">Spor Oyunları (79)</option>
			
								<option value="sunger-bob-oyunlari">Sünger Bob Oyunları (15)</option>
			
								<option value="tom-ve-jerry-oyunlari">Tom ve Jerry Oyunları (6)</option>
			
								<option value="uzay-oyunlari">Uzay Oyunları (16)</option>
			
								<option value="winx-oyunlari">Winx Oyunları (9)</option>
			
								<option value="yapboz-oyunlari">Yapboz Oyunları (18)</option>
			
								<option value="yaris-oyunlari">Yarış Oyunları (41)</option>
			
								<option value="zeka-oyunlari">Zeka Oyunları (74)</option>
			
								<option value="zombi-oyunlari">Zombi Oyunları (57)</option>
			
								</select>
				</td></tr>
				<tr><td>Satır Sayısı</td><td>
				<select onchange="kodguncelle()" id="satirsayisi" name="satirsayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option selected="" value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				
				</select>
				</td></tr>
				<tr><td>Sütun Sayısı</td><td>
				<select onchange="kodguncelle()" id="sutunsayisi" name="sutunsayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option selected="" value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				</select>
				</td></tr>
				<tr><td>Maximum Sayfa Sayısı</td><td>
				<select onchange="kodguncelle()" id="sayfasayisi" name="sayfasayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option selected="" value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				</select>
				</td></tr>
				</form>
				<form name="saveOptions" action="" method="post">
				<tr><td colspan="2">
				<hr/>
				<p>İstediğiniz görünümü elde ettikten sonra aşağıdaki butona basıp kaydediniz ve bileşen (widget) özelliğini kullanınız. </p>
				<textarea onclick="select_all();" id="kod" name="flash-games-editor" readonly="readonly" scrolling="no" rows="10" style="width:260px;overflow:hidden;margin:0px;padding:0px;"></textarea></td></tr>
				<tr><td colspan="2"><input type="submit" name="submit" onclick="saveValue()" value="Widget Ayarlarını Kaydet"></td></tr>				
							
				</tbody></table>
				
				</form>
			</div>
			<div style="_margin-top:100px;" class="flash_games_ajax_right">			
				<script type="text/javascript"> var os_color = "FF9124"; var os_bgcolor = "FFFFFF"; var os_fontsize = "12"; var os_fontfamily = "Arial"; var os_kategori = "yeni-oyunlar"; var os_satirsayisi = "4"; var os_sutunsayisi = "3"; var os_sayfasayisi = "5";</script><div id="oyunsokagioyunlaryeni-oyunlar"><a href="http://www.oyunsokagi.com/">En Yeni Oyunlar</a></div><script src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunsokagi.oyunlar.v2.js" type="text/javascript"></script>
			</div>
		<br />
		</div>

</div>

<?php
}

// Creating the widget 
class flash_games_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'flash_games_widget', 

// Widget name will appear in UI
__('Flash Oyunlar Bileşeni', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Flash oyunları listelemek için bileşen', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
	// This is where you run the code and display the output
	if(get_option('flas_game_option',true)){
		echo stripcslashes(get_option('flas_game_option'));
	}
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class flash_games_widget ends here

// Register and load the widget
function flash_games_load_widget() {
	register_widget( 'flash_games_widget' );
}
add_action( 'widgets_init', 'flash_games_load_widget' );



// Adding Cutomized Button in TINY MICE Editor

//add a button to the content editor, next to the media button
//this button will show a popup that contains inline content
add_action('media_buttons_context', 'add_my_custom_button');

//add some content to the bottom of the page 
//This will be shown in the inline modal
add_action('admin_footer', 'add_inline_popup_content');

//action to add a custom button to the content editor
function add_my_custom_button($context) {
  
  //path to my icon
  $img = plugins_url( 'penguin.png' , __FILE__ );
  
  //the id of the container I want to show in the popup
  $container_id = 'popup_container';
  
  //our popup's title
  $title = 'Sitene Oyun Ekle!';

  //append the icon
  $context .= "<a class='thickbox' style='padding-left: 0.4em;margin-right: 5px;background: linear-gradient(to bottom, #FEFEFE, #F4F4F4) repeat scroll 0 0 #F3F3F3;
    border-color: #BBBBBB;
    color: #009C58;
    text-shadow: 0 1px 0 #FFFFFF; -moz-box-sizing: border-box;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    height: 25px;
    line-height: 23px;
    margin: 0;
    padding: 0 10px 1px;
    text-decoration: none;
    white-space: nowrap;' title='{$title}'
    href='#TB_inline?width=1200&inlineId={$container_id}'>
    Oyun Ekle</a>";
  
  return $context;
}

function add_inline_popup_content() {
global $post;
?>
<script type="text/javascript" src="<?php echo plugins_url( 'jquery.form.js' , __FILE__ ); ?>"></script>
<script>
	function kodguncelle_short(){
		jQuery('.flash_games_ajax_right').html('<img src="<?php echo plugins_url( 'images/loading_332.gif' , __FILE__ ); ?>" />');
		jQuery("#os").ajaxForm({
			dataType: 'json',
			success: function(res){
				jQuery('.flash_games_ajax_right').html(res.ok);
			}
		}).submit();
	}
</script>
<script type="text/javascript">
	//we use unbind to prevent the click event to fire multiple times
jQuery('.insert_shortcode').unbind('click').live("click",function() {
	//prepare shortcode variabel
	var shortcode = '';
	shortcode = '[flash-oyunlar]<?php echo $post->ID;  ?>[/flash-oyunlar]';
	//check if visual editor is active or not
	is_tinyMCE_active = false;
	if (typeof(tinyMCE) != "undefined") {
	if (tinyMCE.activeEditor != null) {
	is_tinyMCE_active = true;
	}
	}
	//append shortcode to the content of the editor
	if ( is_tinyMCE_active ) {
	tinymce.execCommand('mceInsertContent', false, shortcode);
	} else {
	var wpEditor = jQuery('.wp-editor-area');
	wpEditor.append(shortcode);
	tb_remove();
	}
	return false;
});
</script>
<style>
#TB_window{
	width: 1200px !important;	
	margin-left:-552px !important;
}
#TB_ajaxContent{
	width: 1145px !important;
	height: 903px !important;
}
select {width:55px;}
</style>
<script type="text/javascript" src="<?php echo plugins_url();?>/flash-oyunlar/jscolor.js"></script>
<div id="popup_container" style="display:none;">
			<div style="float:left;" width="30%;margin-right:20px;font-size:13px;">
				<form id="os" name="os" action="<?php bloginfo('url'); ?>/wp-admin/admin-ajax.php" method="post">
					<input type="hidden" name="action" value="flash_games_plugin_script_shortcode">
					<input type="hidden" name="postId" value="<?php echo $post->ID;  ?>">
				<table width="300" style="border:1px solid;padding-top:0px;margin-right:20px;">
				<tbody><tr><td colspan="2" style="background-color:#32475A;color:white;padding-left:25px;font-size:13px;"><br>Aşağıdan sitenize uygun görünüm ayarlarını ve göstermek istediğiniz oyun kategorisini seçiniz, sağ bölümde de sitenizde nasıl gözükeceğini hemen görebilirsiniz.<br><br></td></tr>
				<tr><td>Yazı Rengi</td><td><input onchange="kodguncelle_short()" name="color" id="color" style="width: 65px; background-image: none; background-color: rgb(255, 145, 36); color: rgb(0, 0, 0);" value="000000" class="color" autocomplete="off"></td></tr>
				<tr><td>Arka Plan</td><td><input onchange="kodguncelle_short()" id="bgcolor" name="bgcolor" style="width: 65px; background-image: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" value="FFFFFF" class="color" autocomplete="off"></td></tr>
				<tr><td>Yazı Boyutu</td><td>
				<select onchange="kodguncelle_short()" id="fontsize" name="os_fontsize">
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option selected="" value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				</select></td></tr>
				<tr><td>Yazı Fontu</td><td>
				<select onchange="kodguncelle_short()" style="width:150px;" id="fontfamily" name="fontfamily">
				<option value="Times New Roman">Times New Roman</option>
				<option selected="" value="Arial">Arial</option>
				<option value="Arial Black">Arial Black</option>
				<option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
				<option value="Tahoma">Tahoma</option>
				<option value="Verdana">Verdana</option>
			
				</select></td></tr>
				
				
				<tr><td>Gösterilecek Oyunlar</td><td>
				<select onchange="kodguncelle()" style="width:150px;" id="kategori" name="kategori">
				<option value="yeni-oyunlar">En Yeni Oyunlar</option>
				<option value="populer-oyunlar">En Çok Oynanan Oyunlar</option>
				<option value="begenilen-oyunlar">En Çok Beğenilen Oyunlar</option>
				<option disabled="" value="">--- Oyun Kategorileri ---</option>
								<option value="3d-oyunlar">3d Oyunlar (41)</option>
			
								<option value="aksiyon-oyunlari">Aksiyon Oyunları (123)</option>
			
								<option value="araba-oyunlari">Araba Oyunları (202)</option>
			
								<option value="atari-oyunlari">Atari Oyunları (36)</option>
			
								<option value="avatar-oyunlari">Avatar Oyunları (7)</option>
			
								<option value="barbie-oyunlari">Barbie Oyunları (34)</option>
			
								<option value="bebek-oyunlari">Bebek Oyunları (12)</option>
			
								<option value="beceri-oyunlari">Beceri Oyunları (195)</option>
			
								<option value="ben-10-oyunlari">Ben 10 Oyunları (42)</option>
			
								<option value="boyama-oyunlari">Boyama Oyunları (20)</option>
			
								<option value="ciftlik-oyunlari">Çiftlik Oyunları (26)</option>
			
								<option value="cocuk-oyunlari">Çocuk Oyunları (144)</option>
			
								<option value="dini-oyunlar">Dini Oyunlar (6)</option>
			
								<option value="dovus-oyunlari">Dövüş Oyunları (104)</option>
			
								<option value="futbol-oyunlari">Futbol Oyunları (57)</option>
			
								<option value="giydirme-oyunlari">Giydirme Oyunları (106)</option>
			
								<option value="komik-oyunlar">Komik Oyunlar (35)</option>
			
								<option value="macera-oyunlari">Macera Oyunları (121)</option>
			
								<option value="makyaj-oyunlari">Makyaj Oyunları (17)</option>
			
								<option value="mario-oyunlari">Mario Oyunları (37)</option>
			
								<option value="motor-oyunlari">Motor Oyunları (53)</option>
			
								<option value="nisan-oyunlari">Nisan Oyunları (85)</option>
			
								<option value="oda-oyunlari">Oda Oyunları (22)</option>
			
								<option value="orumcek-adam-oyunlari">Örümcek Adam Oyunları (8)</option>
			
								<option value="savas-oyunlari">Savaş Oyunları (243)</option>
			
								<option value="spor-oyunlari">Spor Oyunları (79)</option>
			
								<option value="sunger-bob-oyunlari">Sünger Bob Oyunları (15)</option>
			
								<option value="tom-ve-jerry-oyunlari">Tom ve Jerry Oyunları (6)</option>
			
								<option value="uzay-oyunlari">Uzay Oyunları (16)</option>
			
								<option value="winx-oyunlari">Winx Oyunları (9)</option>
			
								<option value="yapboz-oyunlari">Yapboz Oyunları (18)</option>
			
								<option value="yaris-oyunlari">Yarış Oyunları (41)</option>
			
								<option value="zeka-oyunlari">Zeka Oyunları (74)</option>
			
								<option value="zombi-oyunlari">Zombi Oyunları (57)</option>
			
								</select>
				</td></tr>
				<tr><td>Satır Sayısı</td><td>
				<select onchange="kodguncelle_short()" id="satirsayisi" name="satirsayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option selected="" value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				
				</select>
				</td></tr>
				<tr><td>Sütun Sayisi</td><td>
				<select onchange="kodguncelle_short()" id="sutunsayisi" name="sutunsayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option selected="" value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				</select>
				</td></tr>
				<tr><td>Maximum Sayfa Sayısı</td><td>
				<select onchange="kodguncelle_short()" id="sayfasayisi" name="sayfasayisi">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option selected="" value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				</select>
				</td></tr>
				</form>
				<tr><td colspan="2""><br /></br /><a style="cursor:pointer;font-size:16px;font-weight:bold;" class='insert_shortcode' id='test1'>Oyun Ekle</a></td></tr>								
				</tbody></table>
			</div>
			<div style="float:right;" class="flash_games_ajax_right">			
				<iframe src="http://www.oyunsokagi.com/sitene-oyun-ekle/oyunlar.php?os_color=000000&os_bgcolor=FFFFFF&os_fontsize=12&os_fontfamily=Arial&os_kategori=yeni-oyunlar&os_satirsayisi=4&os_sutunsayisi=3&os_sayfasayisi=5&s=1" width="436" height="510" scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowTransparency="true" title="oyun" name="oyun"></iframe>
			</div>
</div>

<?php
}

function flash_game_short_func( $atts, $content="" ) {
	if(get_post_meta( $content, 'flash_game_post_shortcode_key', true )){
		return stripcslashes(get_post_meta( $content, 'flash_game_post_shortcode_key', true ));
	}else{
		return "";
	}	
}
add_shortcode( 'flash-oyunlar', 'flash_game_short_func' );