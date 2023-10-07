<?php
   include_once('pge_plane_catalog_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil']          = "";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_prod']       = "/scriptcase/prod";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_conf']       = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/conf";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imagens']    = "/scriptcase/file/img";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp']  = "/scriptcase/tmp";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_cache']      = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/file/cache";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_doc']        = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/file/doc";
   $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']         = "nila";
    //check publication with the prod
    $NM_dir_atual = getcwd();
    if (empty($NM_dir_atual))
    {
        $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
        $str_path_sys          = str_replace("\\", '/', $str_path_sys);
    }
    else
    {
        $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
        $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
    }
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class pge_plane_catalog_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $Qtd_reg_ajax_grid;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_ibase;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = true;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            $_SESSION['scriptcase']['proc_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['TIS-620'] = 'tis-620';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "pge_plane_catalog"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "nila"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "pe_bronze"; 
      $this->nm_dt_criacao   = "20230903"; 
      $this->nm_hr_criacao   = "165957"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20231007"; 
      $this->nm_hr_ult_alt   = "032108"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "es";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "es_ar";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      if (!isset($_SESSION['scriptcase']['pge_plane_catalog']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['pge_plane_catalog']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['pge_plane_catalog']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "nila/nila";
      if (isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['sub_cons_schema_all']))
      { 
         $this->str_schema_all    = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['sub_cons_schema_all'];
         $this->str_schema_filter = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['sub_cons_schema_filter'];
      } 
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/pge_plane_catalog';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['pge_plane_catalog']['actual_lang']) || $_SESSION['scriptcase']['pge_plane_catalog']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['pge_plane_catalog']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_nila',$this->str_lang,'0','/');
      }
      $_SESSION['scriptcase']['fusioncharts_new'] = true;
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("pge_plane_catalog_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
    copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
    echo $orig_img . '_@@NM@@_';
    if(file_exists($out1_img_cache)){
        echo $out1_img_cache;
        exit;
    }

         include_once("../_lib/lib/php/nm_trata_img.php");
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["pge_plane_catalog"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["pge_plane_catalog"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
        global $link_compact_mode, $link_remove_margin, $link_remove_border;
        if (isset($link_compact_mode) && 'ok' == $link_compact_mode) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['link_info']['remove_border'] = true;
        }

      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart'] = array(
              'enabled' => false,
              'active'  => false,
          );
      }
      if ($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart']['enabled'])
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart']['active'] = true;
      }
      elseif ($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['dashboard_info']['maximized'])
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart']['active'] = true;
      }
      else
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['responsive_chart']['active'] = false;
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
         $str_message = "<html>

<head>
    <title>{var_str_title}</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
            min-width: 320px;
            background: #FFFFFF;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            font-smoothing: antialiased;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        user agent stylesheet body {
            display: block;
            margin: 8px;
        }

        html {
            font-size: 14px;
        }

        html {
            line-height: 1.15;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        ::selection {
            background-color: #CCE2FF;
            color: rgba(0, 0, 0, 0.87);
        }

        .ui.container {
            width: 933px;
            min-width: 992px;
            max-width: 1199px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .ui.container {
            display: block;
            max-width: 100% !important;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message:last-child {
            margin-bottom: 0em;
        }

        .ui.message:first-child {
            margin-top: 0em;
        }

        .ui.message {
            font-size: 1em;
        }

        .ui.message {
            position: relative;
            min-height: 1em;
            margin: 1em 0em;
            background: #F8F8F9;
            padding: 1em 1.5em;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, box-shadow 0.1s ease;
            border-radius: 0.28571429rem;
            box-shadow: 0px 0px 0px 1px rgba(34, 36, 38, 0.22) inset, 0px 0px 0px 0px rgba(0, 0, 0, 0);
        }

        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message> :last-child {
            margin-bottom: 0em;
        }

        .ui.message> :first-child {
            margin-top: 0em;
        }

        .ui.message .header+p {
            margin-top: 0.25em;
        }

        .ui.message p {
            opacity: 0.85;
            margin: 0.75em 0em;
        }

        p {
            margin: 0em 0em 1em;
            line-height: 1.4285em;
        }

        .ui.message .header:not(.ui) {
            font-size: 1.14285714em;
        }

        .ui.message .header {
            display: block;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-weight: bold;
            margin: -0.14285714em 0em 1.2rem 0em;
        }

        .ui.button {
            cursor: pointer;
            display: inline-block;
            min-height: 1em;
            outline: 0;
            border: none;
            vertical-align: baseline;
            background: #e0e1e2 none;
            color: rgba(0, 0, 0, .6);
            font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
            margin: 0 .25em 0 0;
            padding: .78571429em 1.5em .78571429em;
            text-transform: none;
            text-shadow: none;
            font-weight: 700;
            line-height: 1em;
            font-style: normal;
            text-align: center;
            text-decoration: none;
            border-radius: .28571429rem;
            box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgba(34, 36, 38, .15) inset;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, box-shadow .1s ease, background .1s ease;
            will-change: '';
            -webkit-tap-highlight-color: transparent;
        }
        
        .ui.button,
        .ui.buttons .button,
        .ui.buttons .or {
            font-size: 1rem;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
            display: flex;
        }
        
        .ui.primary.button,
        .ui.primary.buttons .button {
            background-color: #2185d0;
            color: #fff;
            text-shadow: none;
            background-image: none;
        }
        
        .ui.primary.button {
            box-shadow: 0 0 0 0 rgba(34, 36, 38, .15) inset;
        }

        [type=reset], [type=submit], button, html [type=button] {
            -webkit-appearance: button;
        }

        .icon{
            position: relative;
            width: 1.2rem;
            height: 1.2rem;
            display: block;
            color: inherit;
            background-repeat: no-repeat;
        }

        .icon.database{
            background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" fill=\"%23FFFFFF\"><path d=\"M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z\"/></svg>');
        }
    </style>
</head>

<body>
    <div class='ui container' style='padding-top:2rem'>
        <section class='ui message'>
            <div class='content'>
                <div class='header'>
                    <h1 class='ui header'>{var_str_title}</h1>
                </div>
                <p>{var_str_message}</p>
                <p>{var_str_message_conn}</p>
                {v_str_btn_inside}
            </div>
        </section>
    </div>";
         $str_message_end = "</body>
</html>";
         $str_message = str_replace('{var_str_title}', $this->Nm_lang['lang_errm_cmlb_nfndtitle'], $str_message);
         $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_cmlb_nfnd'], $str_message);
          $str_message = str_replace('{var_str_message_conn}','', $str_message);
         $str_message = str_replace('{v_str_btn_inside}', '', $str_message);
         echo $str_message;
          if (!$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          echo $str_message_end;
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "pge_plane_catalog_erro.class.php"); 
      $this->Erro = new pge_plane_catalog_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('pge_plane_catalog'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      if (is_file("../_lib/css/" . $this->str_schema_all . "_grid.php")) {
          include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      } else {
          $str_tree_col = "";
          $str_tree_exp = "";
          $str_button   = "";
      }
      $this->Color_bg_ajax = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))       ? "#000" : $str_ajax_bg;
      $this->Border_c_ajax = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c)) ? ""     : $str_ajax_border_c;
      $this->Border_s_ajax = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s)) ? ""     : $str_ajax_border_s;
      $this->Border_w_ajax = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w)) ? ""     : $str_ajax_border_w;
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $this->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      if (is_file($this->path_btn . $this->Str_btn_grid)) {
          include($this->path_btn . $this->Str_btn_grid);
      }
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/grp__NM__ico__NM__nila-logo.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir'] . "');\r\n";
          }
          $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
          $SS_cod_html .= "      {\r\n";
          $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "         else\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.close();\r\n";
          $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "             else\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.location = url_redir;\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "      }\r\n";
          $SS_cod_html .= "    </script>\r\n";
          $SS_cod_html .= " </body>\r\n";
          $SS_cod_html .= "</HTML>\r\n";
          unset($_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array();
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array();
      $this->nm_bases_mssql      = array();
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array();
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_ibase, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcXGDuBqHAN7D5F7DMBYVIFCDuFGDoXGHQBsZSBOHIBOD5XGHgBYHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQBiZkFGHIveD5JwHgvsHEJqH5FGVoFGHQXsDQB/DSN7HuraDMBYZSNiDurGDoXGHQBiZ1X7HINKZMXGDMveVkJqDuXKVoFGHQXsDuBqHAN7HuBqDMrYVcB/HEBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DurmZuJsDcBiH9BiHIrwHurqDMBODkBsH5XKDoXGHQNmH9BqHIveHQFGHgvsVkJqHEB3VoFGDcBiDQFUD1BOV5BOHgrwVcFeV5X/DoXGHQBiZ1BOHAN7HuXGHgvsHErCDuXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiDcNmZ1X7HANOHuBOHgBOZSJ3DuX/VoFGHQFYDQB/HArYHQF7HgvOVcFeDurGDoXGHQXGVIJsDSvOD5JeDMveHArCDWrGVoFGHQXODQFaZ1BYHQFaDMBYVcB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQJmVIJsDSvmD5FaHgNOHEBUDWr/DoB/DcBwZSFGHANOV5FUHuNOV9FiDWXCHMFaD9JmZ1B/HIrwV5FaDErKDkBsV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9FaHAvmZMJeHgvCHEJGDWF/VoJeD9NwDQBqHIvsV5XGDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQNmDQFaHArYHQFaHgrwVcFeV5X7HIBiHQFYZkFGHIBeHQFaHgrKHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMzGVcBUH5XCHIBiHQJmVINUHIveHQFaHgrKVkJqDWX7DoFUHQFYZSFGD1BeHQXGDMNODkBOHEF/HMX7D9XGZkFGHArKV5FUDMrYZSXeV5FqHIJsHQXGZSFGHAveD5XGHgrKVcB/V5X7VorqD9BsZ1F7HABYV5FUDMzGHEJqV5FaDoF7DcJeDQFGD1veV5FUHuNOVcFKV5X7DoF7HQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVcFKV5BmVoBqD9BsZkFGHAvsZMFaDMzGZSJ3DuJeHIX7DcXGH9FUHANKV5BqHuvmVIBODWFaHIFGD9JmH9FaHArYD5JeDEvsVkXeH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcrsDWXCDoraDcNwH9B/HAN7D5XGDEBOZSXeV5XCZuJsDcBwDuFaHAveD5NUHgNKDkBOV5FYHMBiHQNmVINUHAvsD5XGHgveDkB/DWFGDoBOHQBiDQBqHIrwHuFaHuNOZSrCH5FqDoXGHQJmZ1X7HIBeV5XGDMvCHENiHEXCDoF7HQXsDQFUDSN7D5NUHgvsVIBOH5FqHMBiD9BsVIraD1rwV5X7HgBeHErCDWXCHIJwHQNmH9BiD1BeHuX7DMzGV9FeV5F/HMBqDcBwZ1X7D1rKHQrqHgBeHEFiV5B3DoF7D9XsDuFaHANKVWBqDMrwZSNiDWB3VEB/";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Lemon_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Lemon_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
      $this->Nm_accent_access    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_ibase     = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_mysql     = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_postgres  = array('cmp_i'=>"unaccent(",'cmp_f'=>")",'cmp_apos'=>"",'arg_i'=>"' || unaccent('",'arg_f'=>"') || '",'arg_apos'=>"");
      $this->Nm_accent_sqlite    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_sybase    = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_vfp       = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_odbc      = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");
      $this->Nm_accent_progress  = array('cmp_i'=>"",'cmp_f'=>"",'cmp_apos'=>"",'arg_i'=>"",'arg_f'=>"",'arg_apos'=>"");

      $this->Nm_accent_no = array('cmp_i'=>'','cmp_f'=>'','cmp_apos'=>'','arg_i'=>'','arg_f'=>'','arg_apos'=>'');
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
          $this->Nm_accent_yes = $this->Nm_accent_access;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
          $this->Nm_accent_yes = $this->Nm_accent_ibase;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
          $this->Nm_accent_yes = $this->Nm_accent_mysql;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
          $this->Nm_accent_yes = $this->Nm_accent_postgres;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
          $this->Nm_accent_yes = $this->Nm_accent_sqlite;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
          $this->Nm_accent_yes = $this->Nm_accent_sybase;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_vfp)) {
          $this->Nm_accent_yes = $this->Nm_accent_vfp;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_odbc)) {
          $this->Nm_accent_yes = $this->Nm_accent_odbc;
      }
      elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
          $this->Nm_accent_yes = $this->Nm_accent_progress;
      }
      else {
          $this->Nm_accent_yes = $this->Nm_accent_no;
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']) && $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil']) && $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['pge_plane_catalog']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']))
      {
          if (!isset($_GET['nmgp_opcao']) || ('pdf' != $_GET['nmgp_opcao'] && 'pdf_res' != $_GET['nmgp_opcao'])) {
              ob_start();
          } else {
              @ini_set('zlib.output_compression',0);
              $bufferSize = @ini_get('output_buffering');
              if ('' != $bufferSize) {
                  $bufferSize = min($bufferSize * 10, 65536);
                  echo str_repeat('&nbsp;', $bufferSize);
              }
              
          }
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'nila', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida_init']) 
      {
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
         $str_message = "<html>

<head>
    <title>{var_str_title}</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;
            min-width: 320px;
            background: #FFFFFF;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            font-smoothing: antialiased;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        user agent stylesheet body {
            display: block;
            margin: 8px;
        }

        html {
            font-size: 14px;
        }

        html {
            line-height: 1.15;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        ::selection {
            background-color: #CCE2FF;
            color: rgba(0, 0, 0, 0.87);
        }

        .ui.container {
            width: 933px;
            min-width: 992px;
            max-width: 1199px;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .ui.container {
            display: block;
            max-width: 100% !important;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message:last-child {
            margin-bottom: 0em;
        }

        .ui.message:first-child {
            margin-top: 0em;
        }

        .ui.message {
            font-size: 1em;
        }

        .ui.message {
            position: relative;
            min-height: 1em;
            margin: 1em 0em;
            background: #F8F8F9;
            padding: 1em 1.5em;
            line-height: 1.4285em;
            color: rgba(0, 0, 0, 0.87);
            transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, box-shadow 0.1s ease;
            border-radius: 0.28571429rem;
            box-shadow: 0px 0px 0px 1px rgba(34, 36, 38, 0.22) inset, 0px 0px 0px 0px rgba(0, 0, 0, 0);
        }

        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .ui.message> :last-child {
            margin-bottom: 0em;
        }

        .ui.message> :first-child {
            margin-top: 0em;
        }

        .ui.message .header+p {
            margin-top: 0.25em;
        }

        .ui.message p {
            opacity: 0.85;
            margin: 0.75em 0em;
        }

        p {
            margin: 0em 0em 1em;
            line-height: 1.4285em;
        }

        .ui.message .header:not(.ui) {
            font-size: 1.14285714em;
        }

        .ui.message .header {
            display: block;
            font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-weight: bold;
            margin: -0.14285714em 0em 1.2rem 0em;
        }

        .ui.button {
            cursor: pointer;
            display: inline-block;
            min-height: 1em;
            outline: 0;
            border: none;
            vertical-align: baseline;
            background: #e0e1e2 none;
            color: rgba(0, 0, 0, .6);
            font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
            margin: 0 .25em 0 0;
            padding: .78571429em 1.5em .78571429em;
            text-transform: none;
            text-shadow: none;
            font-weight: 700;
            line-height: 1em;
            font-style: normal;
            text-align: center;
            text-decoration: none;
            border-radius: .28571429rem;
            box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgba(34, 36, 38, .15) inset;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, box-shadow .1s ease, background .1s ease;
            will-change: '';
            -webkit-tap-highlight-color: transparent;
        }
        
        .ui.button,
        .ui.buttons .button,
        .ui.buttons .or {
            font-size: 1rem;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
            display: flex;
        }
        
        .ui.primary.button,
        .ui.primary.buttons .button {
            background-color: #2185d0;
            color: #fff;
            text-shadow: none;
            background-image: none;
        }
        
        .ui.primary.button {
            box-shadow: 0 0 0 0 rgba(34, 36, 38, .15) inset;
        }

        [type=reset], [type=submit], button, html [type=button] {
            -webkit-appearance: button;
        }

        .icon{
            position: relative;
            width: 1.2rem;
            height: 1.2rem;
            display: block;
            color: inherit;
            background-repeat: no-repeat;
        }

        .icon.database{
            background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" fill=\"%23FFFFFF\"><path d=\"M448 80v48c0 44.2-100.3 80-224 80S0 172.2 0 128V80C0 35.8 100.3 0 224 0S448 35.8 448 80zM393.2 214.7c20.8-7.4 39.9-16.9 54.8-28.6V288c0 44.2-100.3 80-224 80S0 332.2 0 288V186.1c14.9 11.8 34 21.2 54.8 28.6C99.7 230.7 159.5 240 224 240s124.3-9.3 169.2-25.3zM0 346.1c14.9 11.8 34 21.2 54.8 28.6C99.7 390.7 159.5 400 224 400s124.3-9.3 169.2-25.3c20.8-7.4 39.9-16.9 54.8-28.6V432c0 44.2-100.3 80-224 80S0 476.2 0 432V346.1z\"/></svg>');
        }
    </style>
</head>

<body>
    <div class='ui container' style='padding-top:2rem'>
        <section class='ui message'>
            <div class='content'>
                <div class='header'>
                    <h1 class='ui header'>{var_str_title}</h1>
                </div>
                <p>{var_str_message}</p>
                <p>{var_str_message_conn}</p>
                {v_str_btn_inside}
            </div>
        </section>
    </div>";
         $str_message_end = "</body>
</html>";
         $str_message = str_replace('{var_str_title}', $this->Nm_lang['lang_errm_dbcn_create'], $str_message);
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_glob'] . $this->nm_falta_var, $str_message);
                  $str_message = str_replace('{var_str_message_conn}','', $str_message);
              }
              elseif ($nm_crit_perfil)
              {
                  $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_dbcn_nfnd'], $str_message);
                  $str_message = str_replace('{var_str_message_conn}', $this->Nm_lang['lang_errm_dbcn_conn_nfnd'] . ' ' . $perfil_trab, $str_message);
                  $str_message = str_replace('{v_str_btn_inside}', "<button class='ui button primary' style='font-size: 16px !important;'><a href='" . $this->path_prod . "' style='color: white;text-decoration:none'><i class='icon database' style='float: left;padding-right: .5rem;'></i>". $this->Nm_lang['lang_errm_dbcn_create'] ."</a></button>", $str_message);
              }
          }
          else
          {
                  $str_message = str_replace('{var_str_message}', $this->Nm_lang['lang_errm_dbcn_data'], $str_message);
          }
         $str_message = str_replace('{var_str_message_conn}','', $str_message);
         $str_message = str_replace('{v_str_btn_inside}', '', $str_message);
          echo $str_message;
          if (!$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              elseif(!empty($nm_url_saida)) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          echo $str_message_end;
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_conexao'], $this->root . $this->path_prod, 'nila', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
          }
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "nila")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['pge_plane_catalog']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class pge_plane_catalog_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new pge_plane_catalog_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pge_plane_catalog']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['pge_plane_catalog']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pge_plane_catalog']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pge_plane_catalog'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_plane_catalog']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_plane_catalog']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('pge_plane_catalog') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_plane_catalog']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "pge_plane_catalog")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pge_plane_catalog']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['pge_plane_catalog']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['pge_plane_catalog']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("es");
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "pge_plane_catalog_erro.class.php"); 
      $this->Erro      = new pge_plane_catalog_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['pge_plane_catalog']['contr_erro'] = 'on';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta name="viewport" content="width=device-width"/>
    <meta charSet="utf-8"/>
    <style>.async-hide { opacity: 0 !important; }</style>
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KCZDMFS"></script>
    <style>.async-hide { opacity: 0 !important; }</style>
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-WDN3NGR"></script>
    <link rel="canonical" href="https://descomplica.com.br/vestibulares/enem/"/>
    <title>Cursinho Pré-vestibular da Descomplica | Invista no seu futuro</title>
    <meta name="twitter:title" content="Cursinho Pré-vestibular da Descomplica | Invista no seu futuro"/>
    <meta name="twitter:description" content="Só conhecendo o cursinho Pré-vestibular da Descomplica para entender por que somos considerados o melhor cursinho Enem do Brasil. Confira e saiba mais!"/>
    <meta name="twitter:image"/><meta property="og:url" content="https://descomplica.com.br/vestibulares/enem"/>
    <meta name="description" content="Só conhecendo o cursinho Pré-vestibular da Descomplica para entender por que somos considerados o melhor cursinho Enem do Brasil. Confira e saiba mais!"/>
    <meta name="twitter:image" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/thumb.png"/>
    <meta itemProp="image" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/thumb.png"/>
    <meta name="robots" content="index, follow"/>
    <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "CollegeOrUniversity",
            "name": "Nila Apuntes",
            "url": "https://apuntesnila.com/",
            "logo": "https://d3awytnmmfk53d.cloudfront.net/landings/static/images/core/logo_verde.svg",
            "founder": {
              "@type": "Person",
              "givenName": "Marco",
              "familyName": "Fisbhen",
              "jobTitle": "CEO"
            },
            "sameAs": [
              "https://www.facebook.com/descomplica.vestibulares/",
              "https://twitter.com/descomplica",
              "https://www.youtube.com/c/descomplica",
              "https://www.instagram.com/descomplica/",
              "https://pt.wikipedia.org/wiki/Descomplica",
              "https://www.linkedin.com/school/descomplica",
              "https://descomplica.com.br/",
              "https://apps.apple.com/br/app/descomplica-foco-no-enem-2016/id1068977518",
              "https://play.google.com/store/apps/details?id=br.com.descomplica.vod&hl=pt_BR"
            ]
          }
        </script><script type="application/ld+json">
          {
            "@context": "https://schema.org/",
            "@type": "ItemList",
            "itemListElement": [{"@type":"ListItem","position":1,"item":{"@type":"Course","name":"Descomplica Enem e Vestibulares","description":"Acesso às turmas ao vivo de 2023, 4 correções de redação por mês, Guia do Estudo Perfeito (GEP), Comunidade no Telegram, Avaliações e teste","provider":{"@type":"Organization","name":"Descomplica","sameAs":"https://descomplica.com.br/vestibulares/enem/"},"audience":{"@type":"EducationalAudience"},"publisher":{"@type":"EducationalOrganization"}}},{"@type":"ListItem","position":2,"item":{"@type":"Course","name":"Descomplica Top","description":"Acesso às turmas ao vivo de 2023, 6 correções de redação por mês, Guia do Estudo Perfeito (GEP), Comunidade no Telegram, Avaliações e teste, Resenha de obras literárias, Raio-X de provas da Fuvest, Unicamp e Uerj","provider":{"@type":"Organization","name":"Descomplica","sameAs":"https://descomplica.com.br/vestibulares/enem/"},"audience":{"@type":"EducationalAudience"},"publisher":{"@type":"EducationalOrganization"}}},{"@type":"ListItem","position":3,"item":{"@type":"Course","name":"Descomplica Top Medicina","description":"Acesso às turmas ao vivo de 2023, 10 correções de redação por mês, Guia do Estudo Perfeito (GEP), Comunidade no Telegram, Avaliações e teste, Resenha de obras literárias, Raio-X de provas da Fuvest, Unicamp e Uerj, Tira-dúvidas extra (Red, Bio, Quím e Fís), Oficinas de aprendizagem no Telegram, Trilha de Especialidades Médicas","provider":{"@type":"Organization","name":"Descomplica","sameAs":"https://descomplica.com.br/vestibulares/enem/"},"audience":{"@type":"EducationalAudience"},"publisher":{"@type":"EducationalOrganization"}}}]
          }
        </script><script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '624803474222039'); fbq('track', 'PageView');</script><script id="dataLayerScript" type="text/javascript">
          var dataLayer = dataLayer || [];
          dataLayer.push({
            'event': 'AllPages',
            'userId': '',
            'pageCategory': 'vestibulares',
            'virtualPageView': '',
            'google_tag_params': {
              'ecomm_prodid': [ undefined],
              'ecomm_pagetype': 'vestibulares',
              'ecomm_totalvalue': undefined,
              'ecomm_coursename': 'no-course',
              'ecomm_coursecategory': 'no-course',
              'ecomm_coursefullprice': 0
            }
          });
        </script><script src="//cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js"></script><script async="" src="https://dnnsjdj5swfc3.cloudfront.net/web-components/web-components-3.0.1.js"></script><meta name="next-head-count" content="23"/><link rel="preconnect" href="https://d3awytnmmfk53d.cloudfront.net"/><link rel="preconnect" href="https://cdnjs.cloudflare.com"/><link rel="preconnect" href="https://dnnsjdj5swfc3.cloudfront.net"/><meta charSet="utf-8"/><meta http-equiv="Content-Language" content="pt-br"/><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/><meta name="google-site-verification" content="GrAzToPwW2Yy9t7OwAue4p405nD4jcKGxZyJlFVPRc8"/><meta name="google-site-verification" content="NohmsFMPzwPVX63DFNP-yBhnIuBGeV017Lq50qjoRgg"/><meta name="google-site-verification" content="M9lP2wjgLeEzfILe8l8zM-MMzDr70eo0pvpWZ0BzrHM"/><meta property="og:image:height" content="250"/><meta property="og:image:type" content="image/png"/><meta property="og:image:width" content="250"/><meta property="og:locale:alternate" content="pt"/><meta property="og:locale" content="pt_BR"/><meta property="og:site_name" content="Descomplica"/><meta property="og:type" content="website"/><meta property="fb:admins" content="163027370378546"/><meta property="fb:app_id" content="149434698461737"/><meta name="twitter:creator" content="@descomplica"/><meta name="twitter:site" content="@descomplica"/><meta name="twitter:app:name:iphone" content="Descomplica - Aulas e Cursinho Preparatório Enem"/><meta name="twitter:app:id:iphone" content="1068977518"/><meta name="twitter:app:url:iphone" content=""/><meta name="twitter:app:name:googleplay" content="Descomplica - Cursinho Enem 2017 &amp; Vestibulares"/><meta name="twitter:app:id:googleplay" content="br.com.descomplica.vod"/><meta name="twitter:app:url:googleplay" content="https://play.google.com/store/apps/details?id=br.com.descomplica.vod&amp;hl=pt"/><link rel="author" href="//plus.google.com/+descomplica/posts"/><link rel="publisher" href="//plus.google.com/+descomplica"/><link rel="apple-touch-icon" sizes="152x152" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-152x152.png"/><link rel="apple-touch-icon" sizes="144x144" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-144x144.png"/><link rel="apple-touch-icon" sizes="120x120" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-120x120.png"/><link rel="apple-touch-icon" sizes="114x114" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-114x114.png"/><link rel="apple-touch-icon" sizes="76x76" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-76x76.png"/><link rel="apple-touch-icon" sizes="72x72" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-72x72.png"/><link rel="apple-touch-icon" sizes="60x60" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-60x60.png"/><link rel="apple-touch-icon" sizes="57x57" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-57x57.png"/><link rel="apple-touch-icon" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon.png"/><link rel="stylesheet" href="https://video-react.js.org/assets/video-react.css"/><meta name="msapplication-TileColor" content="#fff"/><meta name="msapplication-TileImage" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/ms-icon-144x144.png"/><meta name="facebook-domain-verification" content="4qcolhfstx5iblydrzgmt77d5ihrap"/><link rel="shortcut icon" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/favicon.png?"/><script type="text/javascript" src="https://app.viral-loops.com/widgetsV2/core/loader.js"></script><noscript data-n-css=""></noscript><script defer="" nomodule="" src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/polyfills-5cd94c89d3acac5f.js"></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/webpack-13f1e3ba960f9b84.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/framework-acb0798a477cdb8c.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/main-1a9cf7488d6c997b.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/pages/_app-bc46322325e05c63.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/237-2c6e85a71a0d1c6f.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8747-c3f35598acef851e.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/5301-0540a670c313ef44.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9278-85812cf2658f2995.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/7254-de350c6f17b788b3.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9975-3f271d957e8208f8.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/6228-30140dcf5b5b2684.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8875-c2dc47592c1cf0e7.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/3986-98ad35a6dbdbc95c.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/2347-6eae7cbdf9123e71.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8106-0ddcd592362dce59.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/1765-78f60173dfe13dd1.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/131-66dbd14063ed0c33.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9709-3e1b9f9b7d49ca6d.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9310-fd8f69a06a51fda3.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/6870-1f2edbc0a714da24.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9700-bfbb9bcb29e3982f.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8780-fd33aae5a94fd6f5.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/2004-13b55dbe08174d39.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/pages/landings/templates/Blackfriday2020-b1c350305c56d4b4.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_buildManifest.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_ssgManifest.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_middlewareManifest.js" defer=""></script><style data-styled="JEsFc   hlthYH lmfqhw hHunVH cKtBQy lcOgef daXjbU kaktql kJaZQv gRCxjT cHRqMO fsmORr qiWbN cgWfxY geoiXC gWMBXt dVxSVl fqhdFb jJZNff hijkUB eaUAjK sKACb ezlVjK dPqKtA cwkUdT dtJMnR cFZaia fyfbzv fFsqid lCRoP bUXezz kvlNjl jExfKJ buddts fsZiKq faztSz fdagEg fpohzA fMRMGk eGazVz hFHGmz eLZoLX iraxnk bcFbAT jYVVsv hDuAiQ lnoDUb hWbxZ ekjbjf kJqMZJ dhXrjs dzBXTd hTzEyo fkyWWs eNBPat hMknLR dPnOCs dRSbSA jWWZbe gBvzea kknOBX dRQuDh bhbCFT jeqpvK eHiixI jnxBXG isqVeJ fDTGOl hNQpgQ bGaWUs hzEWqv kZKtJJ eGAwpG gEzLVE hUyLVo gOroEk eHJUEq eLTPNc dyTeQu FsCWK cljokz ioFHxz ijcynH cnfsLK Smyde cfkQFD bCMqve brQWXw cBhape eSdaiX WRNyW cAigkM pjmGL bJdeAz hZMeio eNRLcz kWusfg gwPCda iOZGJx clnbmn ghHoVv cSgDV hswhgM XjefE cAxxmG cOOUO jjbcAn bxhUVu kWFLat jZTNXK fpxJPC duVNTl EWztw czYjpW iDDyqz iLaiDY bjFwnM byovHs iXOzQw fQKnQb cwwjnH jXYoyY bsSYmi iieRqM gILVRA bkmIug ixpQzo WFmwN kyKmzI dvKbdi bEhNRI bdhLcP gGzOhs bToZjp cZYsgQ GaaNG kslFZL drSMye dvUBWS" data-styled-version="4.4.1">

@font-face{font-family:AprovaSans;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Regular.woff2') format('woff2'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Regular.woff') format('woff'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Regular.otf') format('opentype'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Regular.ttf') format('truetype');font-style:normal;} @font-face{font-family:AprovaSansBold;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Bold.woff2') format('woff2'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Bold.woff') format('woff'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Bold.otf') format('opentype'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Bold.ttf') format('truetype');font-weight:800;font-style:normal;} @font-face{font-family:AprovaSansBlack;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Black.woff2') format('woff2'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Black.woff') format('woff'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Black.otf') format('opentype'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/aprova-sans/Aprova-Black.ttf') format('truetype');font-weight:900;font-style:normal;} @font-face{font-family:Descomplica;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/Descomplica-Medium.otf') format('opentype');font-weight:500;font-style:normal;} @font-face{font-family:InterUI;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/inter-ui/Inter-UI-Regular.woff2') format('woff2'), url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/inter-ui/Inter-UI-Regular.woff') format('woff');font-weight:normal;font-style:normal;} @font-face{font-family:Pixellari;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/Pixellari.ttf') format('truetype');font-weight:500;font-style:normal;} @font-face{font-family:VanguardCF;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/vanguard/Vanguard-CF-Bold.otf') format('opentype');font-style:normal;} @font-face{font-family:'slick';font-weight:normal;font-style:normal;src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/slick.eot');src:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/slick.eot?#iefix') format('embedded-opentype'),url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/slick.woff') format('woff'),url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/slick.ttf') format('truetype'),url('https://d3awytnmmfk53d.cloudfront.net/landings/static/fonts/slick.svg#slick') format('svg');} .hide-d{display:none;} @media (max-width:600px){.hide-d{display:block;}} .hide-m{display:block;} @media (max-width:600px){.hide-m{display:none;}} .hide-mt{display:block;} @media (max-width:992px){.hide-mt{display:none;}} html{overflow-x:hidden;overflow-y:auto;width:100%;-webkit-scroll-behavior:smooth;-moz-scroll-behavior:smooth;-ms-scroll-behavior:smooth;scroll-behavior:smooth;font-size:18px;font-size:1.318vw;} @media (max-width:600px){html{font-size:5vw;}} @media (min-width:601px) and (max-width:992px){html{font-size:2.344vw;}} body{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-size:16px;margin:0;overflow:hidden;width:100%;} html.no-scroll-fixed,body.no-scroll-fixed{overflow-y:hidden;} @media (max-width:680px){html.no-scroll-fixed,body.no-scroll-fixed{position:fixed;}} html.no-scroll,body.no-scroll{overflow-y:hidden;} *{min-height:0;min-width:0;} *,*:before,*:after{box-sizing:border-box;} a{-webkit-text-decoration:none;text-decoration:none;} .index_promo .banner #plans-link-forward,.index_promo .banner #plans-link-back{border-bottom-color:#ffffff !important;border-left-color:#ffffff !important;} .benefits-index_promo{background:#ffffff !important;box-shadow:none !important;padding-top:20px !important;} .benefits-index_promo h1{max-width:100%;} .benefits-index_promo .benefits-container > section{margin:0;padding:27.2px 16px;} .benefits-index_promo .benefits-container > section h3{margin-top:10px;} .benefits-index_promo .benefits-container > section:nth-last-child(2),.benefits-index_promo .benefits-container > section:nth-last-child(3){background:#00daa6;} .benefits-index_promo .benefits-container > section:nth-last-child(2) a,.benefits-index_promo .benefits-container > section:nth-last-child(3) a{display:none;} .benefits-index_promo .benefits-container > section:nth-last-child(2) h3,.benefits-index_promo .benefits-container > section:nth-last-child(3) h3,.benefits-index_promo .benefits-container > section:nth-last-child(2) p,.benefits-index_promo .benefits-container > section:nth-last-child(3) p{color:#ffffff;} .benefits-index_promo .benefits-container > section:nth-child(n + 4){margin-top:0;} .benefits-index_promo .benefits-container > section:last-child a{background-color:#34474c;color:#ffffff;margin-top:10px;} .benefits-index_promo .benefits-container > section:last-child h3{font-family:Descomplica;-webkit-letter-spacing:1px;-moz-letter-spacing:1px;-ms-letter-spacing:1px;letter-spacing:1px;font-size:29px;text-transform:uppercase;color:#00daa6;font-weight:normal;} .benefits-index_promo .benefits-container > section:last-child h3:after{content:"";background:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/icon_power.svg');width:12px;height:21px;position:absolute;margin:5px;} .benefits-index_promo .benefits-container > section img{height:30px !important;} .ds-modal-close{fill:#000000 !important;} @media (max-width:680px){.ds-modal-close{fill:#ffffff !important;}} .ds-login-signup-title,.ds-login-signup-description{font-family:AprovaSans !important;} .ds-login-signup-description{font-weight:300 !important;} .modal-container{position:relative;z-index:100000;} #payment{z-index:999999999 !important;} .ds-payment .ds-payment-header.themed-upsell .ds-payment-nav{left:0;} .ds-payment-informations .ds-payment-title{width:150px;} .slick-slider{position:relative;display:block;box-sizing:border-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-touch-callout:none;-khtml-user-select:none;-ms-touch-action:pan-y;touch-action:pan-y;-webkit-tap-highlight-color:transparent;} .slick-list{position:relative;display:block;overflow:hidden;margin:0;padding:0;} .slick-list:focus{outline:none;} .slick-list.dragging{cursor:pointer;cursor:hand;} .slick-slider .slick-track,.slick-slider .slick-list{-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);-webkit-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);transform:translate3d(0,0,0);} .slick-track{position:relative;top:0;left:0;display:block;} .slick-track:before,.slick-track:after{display:table;content:'';} .slick-track:after{clear:both;} .slick-loading .slick-track{visibility:hidden;} .slick-slide{display:none;float:left;height:100%;min-height:1px;} [dir='rtl'] .slick-slide{float:right;} .slick-slide img{display:block;} .slick-slide.slick-loading img{display:none;} .slick-slide.dragging img{pointer-events:none;} .slick-initialized .slick-slide{display:block;} .slick-loading .slick-slide{visibility:hidden;} .slick-vertical .slick-slide{display:block;height:auto;border:1px solid transparent;} .slick-arrow.slick-hidden{display:none;} .slick-loading .slick-list{background:#ffffff url('./ajax-loader.gif') center center no-repeat;} .slick-prev,.slick-next{font-size:0;line-height:0;position:absolute;top:50%;display:block;width:20px;height:20px;padding:0;-webkit-transform:translate(0,-50%);-ms-transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-ms-transform:translate(0,-50%);transform:translate(0,-50%);cursor:pointer;color:transparent;border:none;outline:none;background:transparent;} .slick-prev:hover,.slick-prev:focus,.slick-next:hover,.slick-next:focus{color:transparent;outline:none;background:transparent;} .slick-prev:hover:before,.slick-prev:focus:before,.slick-next:hover:before,.slick-next:focus:before{opacity:1;} .slick-prev.slick-disabled:before,.slick-next.slick-disabled:before{opacity:.25;} .slick-prev:before,.slick-next:before{font-family:'slick';font-size:20px;line-height:1;opacity:.75;color:white;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;} .slick-prev{left:-25px;} [dir='rtl'] .slick-prev{right:-25px;left:auto;} .slick-prev:before{content:'â†';} [dir='rtl'] .slick-prev:before{content:'â†’';} .slick-next{right:-25px;} [dir='rtl'] .slick-next{right:auto;left:-25px;} .slick-next:before{content:'â†’';} [dir='rtl'] .slick-next:before{content:'â†';} .slick-dotted.slick-slider{margin-bottom:30px;} .slick-dots{position:absolute;bottom:-25px;display:block;width:100%;padding:0;margin:0;list-style:none;text-align:center;} .slick-dots li{position:relative;display:inline-block;width:20px;height:20px;margin:0 5px;padding:0;cursor:pointer;} .slick-dots li button{font-size:0;line-height:0;display:block;width:20px;height:20px;padding:5px;cursor:pointer;color:transparent;border:0;outline:none;background:transparent;} .slick-dots li button:hover,.slick-dots li button:focus{outline:none;} .slick-dots li button:hover:before,.slick-dots li button:focus:before{opacity:1;} .slick-dots li button:before{font-family:'slick';font-size:6px;line-height:20px;position:absolute;top:0;left:0;width:20px;height:20px;content:'â€¢';text-align:center;opacity:.25;color:black;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;} .slick-dots li.slick-active button:before{opacity:.75;color:black;}

*{margin:0;padding:0;border:0;} article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;} body{margin:0;padding:0;font-family:AprovaSans;-webkit-font-smoothing:antialiased;} button{background-color:transparent;border:none;outline:0;padding:0;border-radius:0;color:inherit;cursor:pointer;} blockquote,q{quotes:none;} blockquote:after,blockquote:before,q:after,q:before{content:'';content:none;} table{border-collapse:collapse;border-spacing:0;} ol,ul{list-style:none;padding:0;margin:0;} a{-webkit-text-decoration:none;text-decoration:none;color:#000;} h1,h2,h3,h4,h5,h6{margin:0;padding:0;} p{margin:0;padding:0;}

.JEsFc{color:inherit;}

.bxhUVu{display:none;background-color:#ffffff;} @media (max-width:768px){.bxhUVu{display:block;height:100%;padding:0 30px 0 calc(7.143vw + -2.9px);box-sizing:border-box;border:1px solid #e0e0e0;}}

.kWFLat svg{max-width:110px;margin-bottom:10px;margin-top:30px;}

.jZTNXK{border-bottom:1px solid #e0e0e0;}

.fpxJPC{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-top:10px;height:45px;font-size:4.5vmin;font-family:AprovaSansBold;-webkit-transition:-webkit-transform 200ms ease-in-out;-webkit-transition:transform 200ms ease-in-out;transition:transform 200ms ease-in-out;color:#000000;} .fpxJPC .arrow-up{-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg);}

.duVNTl{display:none;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;margin-bottom:30px;height:0px;color:#616161;font-size:3.3vmin;font-family:InterUI;-webkit-transition:all 600ms cubic-bezier(0.19,1,0.22,1);transition:all 600ms cubic-bezier(0.19,1,0.22,1);}

.EWztw{height:30px;cursor:pointer;}

.iDDyqz{font-size:4.5vmin;font-family:AprovaSansBold;color:#000000;}

.czYjpW{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;height:90px;margin-top:20px;}

.iLaiDY{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;width:90%;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;}

.bjFwnM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;width:90%;height:90px;margin-top:20px;color:#616161;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;} .bjFwnM div{cursor:pointer;}

.fQKnQb{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:70px;border-top:1px solid #e0e0e0;} .fQKnQb img{cursor:pointer;}

.byovHs{width:50%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;font-family:InterUI;color:#111111;font-size:14px;padding:5px;} .byovHs div{line-height:120%;margin-bottom:10px;}

.iXOzQw{width:50%;padding:5px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;font-family:InterUI;color:#111111;font-size:14px;} .iXOzQw div{margin-bottom:10px;line-height:120%;}

.cwwjnH{min-height:10px;cursor:pointer;}

.jXYoyY{clear:both;height:100%;padding:30px 5vw 0 5vw;box-sizing:border-box;border-top:solid 1px #e0e0e0 !important;background:#ffffff;} @media (max-width:768px){.jXYoyY{display:none;}}

.iieRqM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;height:100%;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;gap:32px;}

.bsSYmi svg{max-width:110px;margin-bottom:40px;margin-top:30px;}

.gILVRA{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;}

.bkmIug{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-top:10px;height:50px;font-size:16px;font-family:AprovaSans;}

.ixpQzo{color:#111111;}.WFmwN{cursor:pointer;color:#111111;}

.dvKbdi{cursor:pointer;color:#616161;min-height:25px;} .dvKbdi:hover{-webkit-text-decoration:underline;text-decoration:underline;} .dvKbdi span{color:#111111;}.bEhNRI{cursor:pointer;color:#616161;} .bEhNRI:hover{-webkit-text-decoration:underline;text-decoration:underline;} .bEhNRI span{color:#111111;}

.kyKmzI{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;margin-bottom:30px;color:#616161;font-size:12px;font-family:InterUI;-webkit-transition:all 600ms cubic-bezier(0.19,1,0.22,1);transition:all 600ms cubic-bezier(0.19,1,0.22,1);}

.gGzOhs{font-size:16px;font-family:AprovaSans;color:#111111;margin-bottom:20px;}

.bdhLcP{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;height:170px;margin-top:20px;} .bdhLcP img{margin-bottom:5px;}

.bToZjp{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;height:140px;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;} .bToZjp img{cursor:pointer;} .bToZjp .footer-app-android{margin-left:-2px;}

.drSMye{color:#111111;font-size:14px;font-family:InterUI;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:700px;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;} .drSMye div{cursor:pointer;}

.dvUBWS{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:50px;width:300px;} .dvUBWS a{cursor:pointer;} .dvUBWS img{cursor:pointer;}

.cZYsgQ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:50px;border-top:solid 1px #e0e0e0;padding-top:10px;}

.GaaNG{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}

.kslFZL{min-height:10px;margin-right:30px;cursor:pointer;}

.isqVeJ{background-color:#ffffff;padding:60px 0 0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;} @media(max-width:768px){.isqVeJ{padding:42px 16px 0;}}

.fDTGOl{background-color:#004691;position:relative;overflow:visible;padding:47px 75px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;gap:54px;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;min-height:160px;max-width:1162px;border-radius:20px;} @media(max-width:768px){.fDTGOl{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;min-height:290px;gap:0;min-width:96%;padding:36px 24px;border-radius:16px;}}

.hNQpgQ{width:207px;height:35px;}

.bGaWUs{color:#ffffff;font-family:AprovaSans;font-weight:400;font-size:24px;line-height:120%;width:529px;height:66px;} .bGaWUs span{font-family:AprovaSansBlack;} @media(max-width:768px){.bGaWUs{text-align:center;}} @media(max-width:680px){.bGaWUs{width:250px;height:81px;font-size:16px;line-height:150%;}}

.hzEWqv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:AprovaSansBold,sans-serif;font-weight:bold;width:169px;height:58px;background-color:#00E88F;color:#004691;border-radius:28px;-webkit-transition:all .25s;transition:all .25s;cursor:pointer;font-size:18px;} .hzEWqv:hover{background-color:#00fa9a;}

.hlthYH{display:none;}

.fFsqid{background-color:#ffffff;width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;} @media (max-width:680px){.fFsqid{background-size:auto 140px;}}

.lCRoP{max-width:1184px;padding:70px 0 100px;border-radius:28px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;} @media (max-width:680px){.lCRoP{padding:50px 0;}}

.bUXezz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;gap:42px;margin-bottom:56px;width:100%;} @media (max-width:768px){.bUXezz{gap:14px;}} @media (max-width:680px){.bUXezz{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;margin-bottom:24px;}}

.jExfKJ{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;gap:24px;padding:44px 54px;border-radius:20px;width:713px;border:2px solid #00E88F;} .jExfKJ:after{content:'';position:absolute;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/differentials/hand-illustration.png');background-repeat:no-repeat;background-size:contain;width:80px;height:98px;right:-21px;bottom:30px;z-index:10;} @media (max-width:768px){.jExfKJ{width:448px;gap:9px;padding:38px 40px;}.jExfKJ:after{width:62px;height:76px;right:-19px;bottom:21px;}} @media (max-width:680px){.jExfKJ{padding:26px 18px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:293px;}.jExfKJ:after{width:42px;height:50px;right:26px;bottom:-18px;}}

.kvlNjl{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;} @media (max-width:768px){.kvlNjl{width:232px;}}

.buddts{font-family:AprovaSansBlack,sans-serif;font-weight:900;font-size:36px;line-height:120%;color:#000000;width:600px;} @media (max-width:768px){.buddts{font-size:28px;width:352px;}} @media (max-width:680px){.buddts{width:248px;font-size:20px;text-align:center;}}

.fsZiKq{font-family:AprovaSans,sans-serif;font-size:16px;line-height:150%;width:530px;} @media (max-width:768px){.fsZiKq{font-size:15px;width:352px;line-height:120%;}} @media (max-width:680px){.fsZiKq{width:248px;text-align:center;}}

.faztSz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;gap:15px;}

.fdagEg{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;background-color:#F5F5F5;font-family:AprovaSans,sans-serif;border-radius:14px;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:35px;height:200px;} @media (max-width:768px){.fdagEg{padding:32px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;}} @media (max-width:680px){.fdagEg{width:275px;padding:18px;}}

.fpohzA{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;color:#000000;height:100%;width:310px;} @media (max-width:768px){.fpohzA{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:620px;}} @media (max-width:680px){.fpohzA{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:242px;}}

.fMRMGk{font-family:AprovaSansBold,sans-serif;font-size:24px;margin-bottom:12px;line-height:120%;width:270px;} @media (max-width:680px){.fMRMGk{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;font-size:20px;text-align:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;}}

.eGazVz{font-size:16px;line-height:120%;-webkit-letter-spacing:-0.3px;-moz-letter-spacing:-0.3px;-ms-letter-spacing:-0.3px;letter-spacing:-0.3px;} .eGazVz li{position:relative;padding-left:18px;margin-bottom:5px;list-style:none;} .eGazVz li p{text-align:left;} .eGazVz li:before{position:absolute;content:'';background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/new-normal/PlansSection/black-check.svg');background-repeat:no-repeat;background-size:contain;width:12px;height:12px;top:2px;left:0;} @media (max-width:768px){.eGazVz{width:274px;}} @media (max-width:680px){.eGazVz{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;font-size:16px;text-align:center;}}

.cwkUdT{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:gray;width:100%;padding:2vh 5%;border-radius:60px;} .cwkUdT:hover{cursor:pointer;}

.dtJMnR{font-size:calc(0.382vw + 18.8px);font-family:AprovaSansBold;color:white;}

.hHunVH{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:100%;padding:16px 0;margin:0 auto;background-color:#333333;z-index:9;} @media (max-width:1256px){.hHunVH{padding:32px 16px;}} @media(max-width:768px){.hHunVH{padding:16px;margin-bottom:0;}}

.cKtBQy{width:100%;max-width:1340px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;z-index:1000;}

.lcOgef{background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/small-descomplica-icon.svg');background-repeat:no-repeat;background-size:contain;background-position:left center;width:32px;height:32px;z-index:1000;}

.daXjbU{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:70%;} @media (max-width:1256px){.daXjbU{width:90%;}}

.kaktql{cursor:pointer;list-style:none;} @media (max-width:680px){.kaktql{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:100%;padding:16px 0;border-bottom:1px solid #666666;}}

.kJaZQv{font-family:AprovaSans,sans-serif;font-size:16px;line-height:1.2;color:#ffffff;position:relative;-webkit-transition:color 0.1s,background-color 0.1s;transition:color 0.1s,background-color 0.1s;margin-right:16px;} .kJaZQv.actual-page{color:#00E88F !important;pointer-events:none;} .kJaZQv.cta-login{font-family:AprovaSans,sans-serif;border:2px solid #ffffff;border-radius:50px;padding:8px 16px;font-weight:bold;-webkit-transition:all .3s ease-in;transition:all .3s ease-in;z-index:1000;margin:0;} .kJaZQv.cta-login:hover{background-color:#ffffff;color:#333333;} .kJaZQv.cta-scroll:before{content:'';display:block;position:absolute;top:100%;height:2px;width:100%;background-color:#ffffff;-webkit-transform-origin:center top;-ms-transform-origin:center top;transform-origin:center top;-webkit-transform:scale(0,1);-ms-transform:scale(0,1);transform:scale(0,1);-webkit-transition:color 0.1s,-webkit-transform 0.2s ease-out;-webkit-transition:color 0.1s,transform 0.2s ease-out;transition:color 0.1s,transform 0.2s ease-out;} .kJaZQv.cta-scroll:active::before{background-color:#ffffff;} .kJaZQv.cta-scroll:hover::before,.kJaZQv.cta-scroll:focus::before{-webkit-transform-origin:center top;-ms-transform-origin:center top;transform-origin:center top;-webkit-transform:scale(1,1);-ms-transform:scale(1,1);transform:scale(1,1);} @media (min-width:768px) and (max-width:1000px){.kJaZQv{font-size:14px;margin-right:8px;}} @media (max-width:680px){.kJaZQv{font-size:18px;text-align:center;}}

.gRCxjT{display:none;} @media (max-width:680px){.gRCxjT{display:block;width:100%;color:#ffffff;padding:16px;text-align:center;background-color:#1A1A1A;z-index:4;}}

.hWbxZ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:#ffffff;padding:30px 22px;border-radius:24px;width:320px;margin:8px;} @media (max-width:680px){.hWbxZ{padding:24px 15px;margin:8px 0px 20px;width:282px;overflow:visible;}}

.ekjbjf{width:280px;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;font-family:AprovaSansBlack;font-size:28px;line-height:1;color:#111111;text-align:start;margin:10px 0;} @media(max-width:680px){.ekjbjf{font-size:24px;margin:0;width:100%;}}.kJqMZJ{width:280px;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;font-family:AprovaSansBlack;font-size:28px;line-height:1;color:#111111;text-align:center;margin:10px 0;} @media(max-width:680px){.kJqMZJ{font-size:24px;margin:0;width:100%;}}

.dhXrjs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}

.hTzEyo{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;position:relative;}.fkyWWs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;position:relative;}

.eNBPat{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;}

.hMknLR{font-family:AprovaSans;font-size:13px;line-height:18px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;color:#333333;margin-bottom:8px;} .hMknLR span{font-weight:bold;} @media (max-width:680px){.hMknLR{margin-bottom:0;font-size:12px;}}

.dPnOCs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;font-family:AprovaSansBlack;font-size:38px;line-height:0.95;-webkit-letter-spacing:0.5px;-moz-letter-spacing:0.5px;-ms-letter-spacing:0.5px;letter-spacing:0.5px;color:#000000;} .dPnOCs span{top:0;font-size:20px;margin-right:5px;} @media (max-width:1000px){.dPnOCs{line-height:1.14;-webkit-letter-spacing:-1px;-moz-letter-spacing:-1px;-ms-letter-spacing:-1px;letter-spacing:-1px;}}

.dRSbSA{position:absolute;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:transparent;border:1px solid #000000;border-radius:6px;width:84px;height:28px;top:30px;left:200px;} .dRSbSA p{font-family:AprovaSansBold,sans-serif;font-size:16px;color:#000000;text-align:center;font-weight:bold;line-height:0.96;} @media (max-width:768px){.dRSbSA{left:190px;width:82px;height:28px;}} @media (max-width:680px){.dRSbSA{top:20px;left:180px;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;padding:6px;}.dRSbSA p{font-size:13px;width:-webkit-max-content;width:-moz-max-content;width:max-content;}}

.dzBXTd{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}

.gBvzea{text-align:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;position:relative;padding:0 6px;border:1px solid #000000;border-radius:4px;margin-bottom:10px;} .gBvzea span{text-transform:uppercase;font-family:AprovaSans;color:#000000;font-size:12px;line-height:1.2;} @media(max-width:680px){.gBvzea span{font-size:10px;}}

.jWWZbe{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;margin:10px 0 10px;} .jWWZbe .buy-button{background-color:#FED500;text-align:center;border-radius:28px;width:100%;padding:17px 0;margin-bottom:10px;-webkit-transition:background-color 0.4s;transition:background-color 0.4s;} .jWWZbe .buy-button:hover{background-color:#FFE352;} .jWWZbe .buy-button-text{color:#111111;font-family:AprovaSansBold;font-size:18px;line-height:1;-webkit-letter-spacing:-0.5px;-moz-letter-spacing:-0.5px;-ms-letter-spacing:-0.5px;letter-spacing:-0.5px;} @media (max-width:680px){.jWWZbe .buy-button-text{font-size:16px;}}

.kknOBX{font-size:13px;line-height:1;margin:8px 0;display:none;} .kknOBX p:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/black-check.svg);} .kknOBX span{color:#c4c4c4;} .kknOBX span:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/grey-check.svg);} .kknOBX strong{font-family:AprovaSansBold;background-color:#76C5FF;font-size:10px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;padding:2px 10px;border-radius:4px;margin-left:10px;text-transform:uppercase;} @media (max-width:680px){.kknOBX p,.kknOBX span{font-size:12px;}.kknOBX p:before,.kknOBX span:before{margin-right:2px;}}.dRQuDh{font-size:13px;line-height:1;margin:8px 0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;} .dRQuDh p:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/black-check.svg);} .dRQuDh span{color:#c4c4c4;} .dRQuDh span:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/grey-check.svg);} .dRQuDh strong{font-family:AprovaSansBold;background-color:#76C5FF;font-size:10px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;padding:2px 10px;border-radius:4px;margin-left:10px;text-transform:uppercase;} @media (max-width:680px){.dRQuDh p,.dRQuDh span{font-size:12px;}.dRQuDh p:before,.dRQuDh span:before{margin-right:2px;}}

.jnxBXG{position:absolute;width:90px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;padding:8px;background-color:#fc9700;top:-14px;left:200px;border-radius:8px;text-align:start;font-size:12px;text-transform:uppercase;font-family:AprovaSansBold,sans-serif;font-weight:bold;color:#000000;} @media (max-width:768px){.jnxBXG{width:-webkit-min-content;width:-moz-min-content;width:min-content;left:210px;}} @media (max-width:680px){.jnxBXG{font-size:10px;left:68%;}}

.bhbCFT{border:2px solid #00E88F;padding:10px 14px;margin:5px auto 8px;border-radius:10px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;cursor:pointer;position:relative;} .bhbCFT span{padding:12px 10px;color:#ffffff;font-size:14px;font-family:AprovaSans;margin:0 auto;line-height:100%;text-align:center;position:absolute;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/HeroDescontos/info.svg');background-repeat:no-repeat;background-size:contain;display:none;height:98px;width:118px;bottom:30px;right:34px;z-index:10;} .bhbCFT img:hover+span{display:block;} .bhbCFT img:onclick+span{display:block;} @media(max-width:680px){.bhbCFT{padding:8px 10px;}.bhbCFT span{right:18px;}}

.jeqpvK{margin:0 10px;font-family:AprovaSans;color:#000000;-webkit-transition:color ease-in .2s;transition:color ease-in .2s;font-size:13px;width:108px;} @media(max-width:680px){.jeqpvK{font-size:12px;width:104px;margin:0 4px;}}

.eHiixI{margin-left:8px;font-family:AprovaSans;color:#666666;-webkit-transition:color ease-in .2s;transition:color ease-in .2s;font-size:15px;width:60px;text-align:right;line-height:12px;} .eHiixI small{font-size:11px;} @media(max-width:680px){.eHiixI{font-size:13px;width:52px;margin-left:4px;}}

.hFHGmz{position:relative;} @media (max-width:768px){.hFHGmz{padding:0;}}

.eLZoLX{background-color:#00E88F;} @media (max-width:768px){.eLZoLX{border-radius:0;}} @media (max-width:680px){.eLZoLX{border-radius:0;background-size:auto 286px;}}

.iraxnk{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0 auto;max-width:1184px;padding:70px 0;position:relative;width:100%;} @media (max-width:768px){.iraxnk{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;padding:48px 0 30px;}}

.bcFbAT{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-bottom:40px;} @media (max-width:768px){.bcFbAT{width:100%;margin-bottom:24px;}} @media (max-width:768px){.bcFbAT{margin-bottom:0;}}

.jYVVsv{position:relative;font-family:AprovaSansBlack,sans-serif;font-size:42px;line-height:110%;-webkit-letter-spacing:-1px;-moz-letter-spacing:-1px;-ms-letter-spacing:-1px;letter-spacing:-1px;color:#000000;margin-bottom:12px;text-align:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;width:1000px;} @media (max-width:768px){.jYVVsv{font-size:38px;width:800px;margin-bottom:20px;}} @media (max-width:680px){.jYVVsv{width:270px;font-size:24px;margin-bottom:10px;}}

.hDuAiQ{font-family:AprovaSans;width:880px;font-size:20px;font-weight:normal;line-height:1.2;-webkit-letter-spacing:normal;-moz-letter-spacing:normal;-ms-letter-spacing:normal;letter-spacing:normal;color:#000000;text-align:center;} .hDuAiQ a{-webkit-text-decoration:underline;text-decoration:underline;cursor:pointer;} @media (max-width:768px){.hDuAiQ{text-align:center;font-size:20px;line-height:1.33;margin:0 auto 24px;width:540px;}} @media (max-width:680px){.hDuAiQ{width:280px;font-size:14px;}}

.lnoDUb{width:58%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;} @media (max-width:768px){.lnoDUb{width:50%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-direction:column-reverse;-ms-flex-direction:column-reverse;flex-direction:column-reverse;}} @media (max-width:680px){.lnoDUb{width:100%;}}

.bCMqve{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin:2vh auto;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;position:relative;} @media (max-width:768px){.bCMqve:last-child{margin-top:80px;}} @media (max-width:680px){.bCMqve{margin-top:80px;}}

.brQWXw{width:300px;min-height:auto;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#ffffff;-webkit-transition:all ease-in-out 0.7s;transition:all ease-in-out 0.7s;margin:0 20px;border-radius:14px;position:relative;padding-top:60px;box-shadow:none;} @media(max-width:1040px){.brQWXw{width:300px;}} @media (max-width:680px){.brQWXw{width:274px;}}

.cBhape{position:absolute;top:-50px;width:110px;height:110px;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg');background-size:cover;background-repeat:no-repeat;margin-bottom:30px;border-radius:100px;}.eSdaiX{position:absolute;top:-50px;width:110px;height:110px;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg');background-size:cover;background-repeat:no-repeat;margin-bottom:30px;border-radius:100px;}.WRNyW{position:absolute;top:-50px;width:110px;height:110px;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg');background-size:cover;background-repeat:no-repeat;margin-bottom:30px;border-radius:100px;}

.cAigkM{padding:0 24px 35px;}

.hZMeio{width:100%;font-family:AprovaSans,sans-serif;color:#000000;font-size:14px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:1.5;-webkit-letter-spacing:normal;-moz-letter-spacing:normal;-ms-letter-spacing:normal;letter-spacing:normal;text-align:left;overflow:hidden;height:210px;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out;margin-bottom:50px;} @media (max-width:680px){.hZMeio{width:230px;}}

.pjmGL{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;margin:10px 0px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}

.bJdeAz{font-family:AprovaSansBold,sans-serif;font-size:16px;font-weight:bold;font-stretch:normal;font-style:normal;line-height:1;-webkit-letter-spacing:normal;-moz-letter-spacing:normal;-ms-letter-spacing:normal;letter-spacing:normal;text-align:center;color:#000000;margin-bottom:2px;width:72%;}

.eNRLcz{color:#000000;font-size:14px;font-family:AprovaSans;cursor:pointer;-webkit-text-decoration:underline;text-decoration:underline;} .eNRLcz:hover{font-family:AprovaSansBold;}

.kWusfg{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:AprovaSansBold;font-size:18px;-webkit-letter-spacing:-0.3px;-moz-letter-spacing:-0.3px;-ms-letter-spacing:-0.3px;letter-spacing:-0.3px;line-height:1.2;width:284px;height:56px;background-color:#FFCC00;color:#000000;border-radius:28px;margin-bottom:83px;-webkit-transition:all .25s;transition:all .25s;cursor:pointer;}

.ijcynH{background-color:#00E88F;position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;min-width:100vw;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;} @media(max-width:768px){.ijcynH{padding-bottom:40px;}}

.cnfsLK{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1400px;padding:60px 0 1.5vh;margin-bottom:80px;} @media(max-width:768px){.cnfsLK{padding:60px 0 1.5vh;margin-bottom:10px;}} @media(max-width:680px){.cnfsLK{padding:30px 0 0;margin-bottom:0;}}

.Smyde{color:#000000;font-family:AprovaSansBlack,sans-serif;font-size:40px;-webkit-letter-spacing:-1;-moz-letter-spacing:-1;-ms-letter-spacing:-1;letter-spacing:-1;width:774px;line-height:1.2;text-align:center;position:relative;} @media(max-width:768px){.Smyde{width:58%;margin-bottom:80px;font-size:32px;text-align:center;}} @media(max-width:680px){.Smyde{width:280px;font-size:20px;padding:auto;margin:auto;}}

.cfkQFD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;margin-bottom:54px;} @media(max-width:768px){.cfkQFD{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;}}

.cSgDV{width:100%;position:relative;cursor:pointer;border-bottom:1px solid #666666;}

.hswhgM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:100%;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out;padding:16px 0;}

.cAxxmG{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);-webkit-transition:all 0.5s ease;transition:all 0.5s ease;}

.XjefE{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:80%;height:80px;font-family:AprovaSans,sans-serif;font-size:20px;line-height:1.2;-webkit-letter-spacing:-0.6px;-moz-letter-spacing:-0.6px;-ms-letter-spacing:-0.6px;letter-spacing:-0.6px;color:#000000;}

.cOOUO{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:left;-webkit-box-align:left;-ms-flex-align:left;align-items:left;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out;width:100%;height:auto;max-height:0px;overflow:hidden;} @media(max-width:680px){.cOOUO{max-height:0px;word-break:break-word;}}

.jjbcAn{width:100%;height:auto;margin:10px 0 40px;font-family:AprovaSans;line-height:1.2;-webkit-letter-spacing:-0.4px;-moz-letter-spacing:-0.4px;-ms-letter-spacing:-0.4px;letter-spacing:-0.4px;font-size:18px;color:#000000;opacity:0.8;} .jjbcAn span,.jjbcAn p,.jjbcAn li{font-size:14px;-webkit-letter-spacing:-.2px;-moz-letter-spacing:-.2px;-ms-letter-spacing:-.2px;letter-spacing:-.2px;line-height:1.43;} @media (max-width:680px){.jjbcAn span,.jjbcAn p,.jjbcAn li{font-size:16px;-webkit-letter-spacing:-.2px;-moz-letter-spacing:-.2px;-ms-letter-spacing:-.2px;letter-spacing:-.2px;line-height:1.5;max-width:872px;}} .jjbcAn ul,.jjbcAn p{margin-bottom:16px;} @media (max-width:680px){.jjbcAn ul,.jjbcAn p{margin-bottom:24px;}} .jjbcAn ul:last-child,.jjbcAn p:last-child{margin-bottom:0;} .jjbcAn ul{padding-left:28px;} @media (max-width:680px){.jjbcAn ul{padding-left:32px;}} .jjbcAn ul li{list-style-type:disc;margin-bottom:16px;} .jjbcAn ul li:last-child{margin-bottom:0;} .jjbcAn a{color:#00C974;cursor:pointer;}

.gwPCda{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;background-color:#ffffff;padding:80px 0 0;} @media (max-width:768px){.gwPCda{padding:80px 24px 0;}}

.iOZGJx{width:100%;max-width:1184px;margin:0 auto;} @media (max-width:768px){.iOZGJx{padding:24px;}} @media (max-width:768px){.iOZGJx{padding:24px 16px;}}

.clnbmn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;text-align:left;font-family:AprovaSansBold,sans-serif;font-size:32px;line-height:1.2;-webkit-letter-spacing:-0.6px;-moz-letter-spacing:-0.6px;-ms-letter-spacing:-0.6px;letter-spacing:-0.6px;color:#000000;margin-bottom:48px;}

.ghHoVv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;height:auto;}

.lmfqhw{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;background:#00e88f;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;z-index:4;overflow:hidden;width:100%;} @media (max-width:680px){.lmfqhw:after{content:'';background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/25446807-262c-4fcd-bc70-c261c5e8f2df-mobile-Imagem-Hero-UEE.png');background-repeat:no-repeat;background-size:contain;background-position:bottom center;width:269px;height:293px;z-index:1;margin-bottom:40px;}}

.cHRqMO{position:relative;width:1280px;height:620px;max-width:1280px;overflow:hidden;} .cHRqMO:after{content:'';position:absolute;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/823f3ddd-d002-4dae-8312-6b02c1bc6ece-desktop-Imagem-Hero-UEE.png');background-repeat:no-repeat;background-size:contain;background-position:bottom center;width:360px;height:398px;bottom:53%;left:512px;-webkit-transform:translate(0,50%);-ms-transform:translate(0,50%);transform:translate(0,50%);z-index:1;} @media(max-width:768px){.cHRqMO{height:820px;width:100%;}.cHRqMO:after{width:320px;height:402px;left:63px;bottom:270px;}.cHRqMO:before{width:172px;height:76px;left:132px;bottom:378px;}} @media(max-width:680px){.cHRqMO{padding:20px 0;height:740px;}.cHRqMO:after{display:none;}.cHRqMO:before{display:none;}}

.fsmORr{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;position:relative;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;margin:66px 52px 0px 72px;} @media(max-width:768px){.fsmORr{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;margin:40px 0 0;}} @media(max-width:680px){.fsmORr{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:20px 0 0;}}

.qiWbN{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;color:#000000;margin-bottom:12px;z-index:3;position:relative;opacity:1;-webkit-transition:opacity ease-in .4s;transition:opacity ease-in .4s;} @media(max-width:768px){.qiWbN{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;margin-bottom:30px;}} @media(max-width:680px){.qiWbN{width:100%;padding:0 5px;margin-bottom:20px;}}

.cgWfxY{font-family:AprovaSansBlack,sans-serif;font-size:22px;margin:0 0 28px;} @media (max-width:768px){.cgWfxY{margin:0 0 5px;font-size:18px;}} @media (max-width:680px){.cgWfxY{font-size:16px;}}

.geoiXC{font-family:VanguardCF,sans-serif;font-weight:black;line-height:1;color:#000000;font-size:58px;width:400px;text-transform:uppercase;position:relative;} @media(max-width:768px){.geoiXC{font-size:48px;text-align:center;width:550px;}} @media(max-width:680px){.geoiXC{width:300px;font-size:28px;}}

.gWMBXt{font-family:AprovaSans,sans-serif;font-size:20px;line-height:120%;width:360px;margin:34px 0 58px;} .gWMBXt strong{font-family:AprovaSansBlack,sans-serif;} @media(max-width:768px){.gWMBXt{margin:10px 0 10px;text-align:center;}} @media(max-width:680px){.gWMBXt{width:290px;margin:12px 0 10px;font-size:16px;}.gWMBXt span{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;}}

.hijkUB{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;} @media (max-width:768px){.hijkUB{margin-right:56px;}} @media (max-width:680px){.hijkUB{padding:0;margin-right:0;}}

.eaUAjK{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;position:relative;width:100%;}

.sKACb{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#ffffff;padding:30px 20px;border-radius:24px;width:319px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;box-shadow:0 1px 6px 0 rgba(0,0,0,0.15);z-index:4;} .sKACb span{font-size:14px;line-height:1.3;font-family:AprovaSans,sans-serif;margin:14px 0;} @media(max-width:768px){.sKACb span{font-size:12px;margin:10px 0;}} @media(max-width:680px){.sKACb span{margin:7px 0;}} @media(max-width:768px){.sKACb{padding:25px 20px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;}} @media(max-width:680px){.sKACb{margin:0;margin-bottom:24px;padding:24px 18px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;width:282px;}}

.ezlVjK{font-family:AprovaSansBlack,sans-serif;width:270px;font-size:28px;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;line-height:110%;color:#000000;text-align:start;} @media (max-width:768px){.ezlVjK{font-size:26px;width:250px;}} @media (max-width:680px){.ezlVjK{font-size:24px;}}

.fyfbzv{padding-top:8px;width:100%;} .fyfbzv span{font-family:AprovaSansBlack;font-size:14px;margin:25px;}

.dPqKtA{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;} .dPqKtA .buy-button{background-color:#FED500;text-align:center;-webkit-transition:background-color .4s;transition:background-color .4s;padding:6px 0 !important;} .dPqKtA .buy-button:hover{background-color:#FFE352;} .dPqKtA .buy-button span{font-family:AprovaSansBold;} @media (max-width:768px){.dPqKtA .buy-button span{margin:7px 0;}} @media (max-width:680px){.dPqKtA .buy-button span{margin:6px 0;}} .dPqKtA .buy-button-text{color:#111111;font-family:AprovaSansBold;font-size:18px;line-height:1;-webkit-letter-spacing:-0.5px;-moz-letter-spacing:-0.5px;-ms-letter-spacing:-0.5px;letter-spacing:-0.5px;} @media (max-width:768px){.dPqKtA .buy-button-text{font-size:16px;}} @media (max-width:768px){.dPqKtA{width:270px;}} @media (max-width:680px){.dPqKtA{width:244px;}}

.cFZaia{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;padding:4px;border:1px solid #000000;border-radius:4px;} .cFZaia span{text-transform:uppercase;font-family:AprovaSans;color:#000000;font-size:12px;line-height:1.2;text-align:center;margin:0;} @media(max-width:768px){.cFZaia span{font-size:10px;}} @media(max-width:680px){.cFZaia span{font-size:11px;}} @media(max-width:768px){.cFZaia{padding:5px;}}

.dVxSVl{width:310px;height:36px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;border:2px solid #000000;border-radius:8px;background-color:transparent;z-index:2;} @media(max-width:768px){.dVxSVl{width:294px;}} @media(max-width:680px){.dVxSVl{width:290px;height:33px;}}

.fqhdFb{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;gap:6px;color:#000000;font-size:16px;font-variant-numeric:tabular-nums;font-family:AprovaSansBold;} .fqhdFb .info{font-size:18px;text-align:center;vertical-align:middle;line-height:1.5;} .fqhdFb img{width:14px;height:16px;object-fit:contain;} @media(max-width:680px){.fqhdFb{padding:0 20px;}.fqhdFb .info{font-size:16px;}}

.jJZNff{font-size:16px;line-height:1.2;text-align:center;color:#000000;} @media(max-width:680px){.jJZNff{font-size:14px;}}

.kZKtJJ{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;background-color:#ffffff;width:100%;height:866px;padding-top:100px;} @media(max-width:768px){.kZKtJJ{padding-top:100px;height:800px;}} @media(max-width:680px){.kZKtJJ{padding-top:20px;height:860px;}}

.eGAwpG{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;margin-bottom:114px;gap:24px;} @media(max-width:680px){.eGAwpG{margin:60px 0 30px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;gap:9px;}}

.gEzLVE{font-family:AprovaSansBlack,sans-serif;font-size:42px;line-height:120%;color:#000000;width:520px;text-align:center;} @media(max-width:680px){.gEzLVE{font-size:24px;width:300px;}}

.hUyLVo{font-family:AprovaSans,sans-serif;font-size:16px;line-height:150%;width:530px;color:#000000;text-align:center;} @media (max-width:768px){.hUyLVo{font-size:15px;width:352px;line-height:120%;}} @media (max-width:680px){.hUyLVo{width:248px;}}

.gOroEk{width:108%;padding-left:130px;} .gOroEk .slick-arrow{background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/AboutOurTeachers/teachers-arrow.png');background-position:center;background-repeat:no-repeat;opacity:1;background-color:#333333;position:absolute;width:48px;height:48px;border-radius:50%;} .gOroEk .slick-arrow:before{content:'';} .gOroEk .slick-arrow.slick-prev{top:-50px;left:82%;} .gOroEk .slick-arrow.slick-next{top:-74px;left:86%;-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg);} @media(max-width:768px){.gOroEk{padding-left:70px;}.gOroEk .slick-arrow{width:38px;height:38px;}.gOroEk .slick-arrow.slick-next{top:-69px;left:88%;}}

.eHJUEq{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}

.eLTPNc{width:174px;height:180px;border-radius:16px;}

.dyTeQu{font-size:12px;font-family:AprovaSans;line-height:120%;-webkit-letter-spacing:-0.8px;-moz-letter-spacing:-0.8px;-ms-letter-spacing:-0.8px;letter-spacing:-0.8px;width:59px;height:14px;text-transform:uppercase;color:#000000;margin-top:16px;}

.FsCWK{font-family:AprovaSansBlack;font-size:20px;line-height:120%;vertical-align:middle;width:175px;height:24px;color:#000000;margin:8px 0;}

.cljokz{font-family:AprovaSans;font-size:14px;line-height:120%;width:184px;height:102px;color:#000000;} @media(max-width:768px){.cljokz{font-size:12px;}}

.ioFHxz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-family:AprovaSansBold,sans-serif;font-weight:bold;width:284px;height:56px;background-color:#FFCC00;color:#000000;border-radius:28px;margin:80px 0;-webkit-transition:all .25s;transition:all .25s;cursor:pointer;} @media (max-width:680px){.ioFHxz{margin:80px 0 0;}}</style></head><body><div id="__next" data-reactroot=""><div class="sc-iwsKbI JEsFc"><div id="tracking-hero-estudante" class="sc-jbKcbu hlthYH"></div><div class="sc-AnqlK lmfqhw hero-container" id="hero-container"><header class="sc-giadOv hHunVH"><div class="sc-fONwsr cKtBQy"><a tabindex="1" href="https://descomplica.com.br" class="sc-VJcYb lcOgef"></a><ul class="sc-qrIAp daXjbU"><li tabindex="2" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll " id="cta-gabarito-enem" alt="Clique para descer a página para Gabarito Enem" href="/gabarito-enem/">Gabarito Enem</a></li><li tabindex="3" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll actual-page" id="cta-enem-e-vestibular" alt="Clique para descer a página para Enem e Vestibular" href="/vestibulares/enem/">Enem e Vestibular</a></li><li tabindex="4" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll " id="cta-header-graduacao" alt="Clique para descer a página para Graduação" href="/faculdade/">Graduação</a></li><li tabindex="5" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll " id="cta-header-pos" alt="Clique para descer a página para Pós" href="/pos-graduacao/">Pós</a></li><li tabindex="6" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll " id="cta-header-nosso-metodo" alt="Clique para descer a página para Nosso método" href="/metodo-hyperlink/">Nosso método</a></li><li tabindex="7" class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-scroll " id="cta-header-cursos-livres" alt="Clique para descer a página para Cursos livres" href="https://cursos-livres.descomplica.com.br/">Cursos livres</a></li><li class="sc-iqzUVk kaktql"><a class="sc-ipZHIp kJaZQv cta-login" id="cta-login">Já sou aluno</a></li></ul></div></header><div class="sc-iGrrsa gRCxjT">Enem e Vestibular</div><div class="sc-keFjpB cHRqMO"><div class="sc-jWojfa fsmORr"><div class="sc-kVrTmx qiWbN"><h1 class="sc-ekkqgF cgWfxY">Cursinho e Pré-vestibular Enem</h1><h2 class="sc-fKGOjr geoiXC">Bora treinar? Preparação para o Enem 2023 e 2024</h2><p class="sc-jvEmr gWMBXt">Comprando o <strong>Desco Top ou Desco Top Medicina + Intensivo</strong> você leva mais 3 meses de acesso grátis</p><div class="sc-ccLTTT dVxSVl"><div class="sc-hlILIN fqhdFb"><p class="sc-jQMNup jJZNff">Aproveite a oferta!</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/HeroDescontos/clock.webp"/><div class="info"><span class="info">00<!-- -->h</span></div><div class="info"><span class="info">00<!-- -->m</span></div><div class="info"><span class="info">00<!-- -->s</span></div></div></div></div><div class="sc-hycgNl hijkUB"><div class="sc-chAAoq eaUAjK"><div class="sc-dTLGrV sKACb"><h3 class="sc-ivVeuv ezlVjK"></h3><div class="sc-cgHJcJ dPqKtA button-wrapper"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-hero-checkout" data-plan-id="12345"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-hero-checkout-text">Começar a estudar</span></button></div><span>7 dias para cancelar</span><div class="sc-hizQCF cFZaia"><span></span></div><div class="sc-bNQFlB fyfbzv"><span>E muito mais!</span></div></div></div></div></div></div></div><div class="sc-feJyhm fFsqid"><section id="differentials" class="sc-iELTvK lCRoP differentials-container"><div class="sc-cmTdod bUXezz"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/e2613934-2601-44a0-bd35-e59b68b890a2-Imagem-apostila---desktop.png" class="sc-btzYZH kvlNjl"/><div class="sc-jwKygS jExfKJ"><h2 class="sc-lhVmIH buddts">Bora treinar com a apostila Direto ao Ponto</h2><p class="sc-bYSBpT fsZiKq">Estude os top 5 conteúdos, por disciplina, que mais caíram no Enem, com o nível médio de dificuldade das questões e seus respectivos gabaritos comentados.</br>*Inclusa apenas no plano Intensivão 3 meses para o Enem.</p></div></div><div class="sc-elJkPf faztSz"><div class="sc-jtRfpW fdagEg"><div class="sc-kTUwUJ fpohzA"><p class="sc-dqBHgY fMRMGk">Incluso nos outros planos:</p><ul class="sc-gxMtzJ eGazVz"><li>Tira-dúvidas ilimitado ao vivo</li><li>Acesso à biblioteca com +15mil vídeos</li><li>Exercícios e material de apoio</li><li>Apoio pro bem-estar e saúde mental</li></ul></div></div><div class="sc-jtRfpW fdagEg"><div class="sc-kTUwUJ fpohzA"><p class="sc-dqBHgY fMRMGk">Plano de estudos no seu tempo e do seu jeito</p><ul class="sc-gxMtzJ eGazVz">Assista às superaulas onde e quando quiser, a Desco se adapta à sua rotina.</ul></div></div><div class="sc-jtRfpW fdagEg"><div class="sc-kTUwUJ fpohzA"><p class="sc-dqBHgY fMRMGk">Incluso: Guia do</br>Estudo Perfeito</p><ul class="sc-gxMtzJ eGazVz">Nada de ficar perdido ou atrasar, use o nosso Guia pra te ajudar a organizar e planejar seus estudos.</ul></div></div></div></section></div><div id="planos" class="sc-gbOuXE hFHGmz"><div class="sc-dRFtgE eLZoLX"><div class="sc-gkFcWv iraxnk"><div class="sc-hUfwpO bcFbAT"><h2 class="sc-imABML jYVVsv">Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares</h2><h3 class="sc-cjHlYL hDuAiQ">Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara</h3></div><div class="sc-dRaagA lnoDUb"><div class="sc-cBdUnI hWbxZ"><h3 class="sc-exkUMo ekjbjf">Intensivão 3 meses para o Enem</h3><div class="sc-kcDeIU dhXrjs"><div class="sc-gRnDUn dzBXTd"><div class="sc-BngTV hTzEyo"><div class="sc-bFADNz eNBPat"><p class="sc-hBbWxd hMknLR">De <s>12x R$21,90</s> por até</p><p class="sc-dyGzUR dPnOCs"><span>12x</span>R$17,90</p></div><div class="sc-drKuOJ dRSbSA"><p>18% OFF</p></div></div><div class="sc-cHSUfg jWWZbe"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-intensiv-o-3-meses-para-o-enem" data-plan-id="100032"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-intensiv-o-3-meses-para-o-enem-text">Assinar Intensivão</span></button></div><div class="sc-iYUSvU gBvzea"><span>6 meses de acesso</span></div></div><div class="sc-cTjmhe kknOBX"><p>(adicionar caso tenha toggle)</p></div><div class="sc-cTjmhe dRQuDh"><p>Apostila digital Direto ao Ponto</p></div><div class="sc-cTjmhe dRQuDh"><p>2 correções de redação por mês</p></div><div class="sc-cTjmhe dRQuDh"><p>Plano de Estudos fixo personalizado</br>para a reta final</p></div><div class="sc-cTjmhe dRQuDh"><p>Exercícios online</p></div><div class="sc-cTjmhe dRQuDh"><p>Aulas ao vivo de Atualidades</p></div><div class="sc-cTjmhe dRQuDh"><p>Material de apoio</p></div><div class="sc-cTjmhe dRQuDh"><p>Testes de verificação</p></div><div class="sc-cTjmhe dRQuDh"><p>Simulados</p></div></div></div><div class="sc-cBdUnI hWbxZ"><h3 class="sc-exkUMo kJqMZJ">Descomplica</br>Top</h3><div class="sc-kcDeIU dhXrjs"><div class="sc-gRnDUn dzBXTd"><div class="sc-iNhVCk bhbCFT"><div style="position:relative;display:inline-block;text-align:left;opacity:1;direction:ltr;border-radius:9px;-webkit-transition:opacity 0.25s;-moz-transition:opacity 0.25s;transition:opacity 0.25s;touch-action:none;-webkit-tap-highlight-color:rgba(0, 0, 0, 0);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none"><div class="react-switch-bg" style="height:18px;width:32px;margin:0;position:relative;background:#DDDDDD;border-radius:9px;cursor:pointer;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;transition:background 0.25s"></div><div class="react-switch-handle" style="height:14px;width:14px;background:#999999;display:inline-block;cursor:pointer;border-radius:50%;position:absolute;transform:translateX(2px);top:2px;outline:0;border:0;-webkit-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;-moz-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s"></div><input type="checkbox" role="switch" aria-checked="false" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px"/></div><p class="sc-eAKXzc jeqpvK semestral">+ Intensivo Enem</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/info-icon.svg"/><span>Plano intensivo Direto ao Ponto: 3 meses para o Enem</span><p class="sc-bfYoXt eHiixI">+12x R$7</p></div><div class="sc-BngTV fkyWWs"><div class="sc-bFADNz eNBPat"><p class="sc-hBbWxd hMknLR">De <s>12x R$49,80</s> por até</p><p class="sc-dyGzUR dPnOCs"><span>12x</span>R$22,90</p></div></div><div class="sc-cHSUfg jWWZbe"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-descomplica-br-top" data-plan-id="101568"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-text">Assinar Desco Top</span></button></div><div class="sc-iYUSvU gBvzea"><span>12 meses de acesso</span></div></div><div class="sc-cTjmhe kknOBX"><p><b>Plano Intensivo + 3 meses de acesso grátis</b></p></div><div class="sc-cTjmhe dRQuDh"><p>Acesso às turmas 2023 e 2024</p></div><div class="sc-cTjmhe dRQuDh"><p>6 correções de redação por mês</p></div><div class="sc-cTjmhe dRQuDh"><p>Guia do Estudo Perfeito (GEP)</p></div><div class="sc-cTjmhe dRQuDh"><p>Oficinas de aprendizagem no Telegram</p></div><div class="sc-cTjmhe dRQuDh"><p>Avaliações e teste</p></div><div class="sc-cTjmhe dRQuDh"><p>Resenha de obras literárias</p></div><div class="sc-cTjmhe dRQuDh"><p>Raio-X de provas da Fuvest, Unicamp e Uerj</p></div><div class="sc-cTjmhe dRQuDh"><span>Tira-dúvidas extra (Red, Bio, Quím e Fís)</span></div><div class="sc-cTjmhe dRQuDh"><span>Trilha de Especialidades Médicas</span></div></div></div><div class="sc-cBdUnI hWbxZ"><div class="sc-fnwBNb jnxBXG">o mais completo</div><h3 class="sc-exkUMo kJqMZJ">Descomplica</br>Top Medicina</h3><div class="sc-kcDeIU dhXrjs"><div class="sc-gRnDUn dzBXTd"><div class="sc-iNhVCk bhbCFT"><div style="position:relative;display:inline-block;text-align:left;opacity:1;direction:ltr;border-radius:9px;-webkit-transition:opacity 0.25s;-moz-transition:opacity 0.25s;transition:opacity 0.25s;touch-action:none;-webkit-tap-highlight-color:rgba(0, 0, 0, 0);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none"><div class="react-switch-bg" style="height:18px;width:32px;margin:0;position:relative;background:#DDDDDD;border-radius:9px;cursor:pointer;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;transition:background 0.25s"></div><div class="react-switch-handle" style="height:14px;width:14px;background:#999999;display:inline-block;cursor:pointer;border-radius:50%;position:absolute;transform:translateX(2px);top:2px;outline:0;border:0;-webkit-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;-moz-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s"></div><input type="checkbox" role="switch" aria-checked="false" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px"/></div><p class="sc-eAKXzc jeqpvK semestral">+ Intensivo Enem</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/info-icon.svg"/><span>Plano intensivo Direto ao Ponto: 3 meses para o Enem</span><p class="sc-bfYoXt eHiixI">+12x R$7</p></div><div class="sc-BngTV fkyWWs"><div class="sc-bFADNz eNBPat"><p class="sc-hBbWxd hMknLR">De <s>12x R$59,80</s> por até</p><p class="sc-dyGzUR dPnOCs"><span>12x</span>R$27,90</p></div></div><div class="sc-cHSUfg jWWZbe"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-medicina" data-plan-id="101958"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-medicina-text">Assinar Desco Top Medicina</span></button></div><div class="sc-iYUSvU gBvzea"><span>12 meses de acesso</span></div></div><div class="sc-cTjmhe kknOBX"><p><b>Plano Intensivo + 3 meses de acesso grátis</b></p></div><div class="sc-cTjmhe dRQuDh"><p>Acesso às turmas 2023 e 2024</p></div><div class="sc-cTjmhe dRQuDh"><p>10 correções de redação por mês</p></div><div class="sc-cTjmhe dRQuDh"><p>Guia do Estudo Perfeito (GEP)</p></div><div class="sc-cTjmhe dRQuDh"><p>Oficinas de aprendizagem no Telegram</p></div><div class="sc-cTjmhe dRQuDh"><p>Avaliações e teste</p></div><div class="sc-cTjmhe dRQuDh"><p>Resenha de obras literárias</p></div><div class="sc-cTjmhe dRQuDh"><p>Raio-X de provas da Fuvest, Unicamp e Uerj</p></div><div class="sc-cTjmhe dRQuDh"><p>Tira-dúvidas extra (Red, Bio, Quím e Fís)</p></div><div class="sc-cTjmhe dRQuDh"><p>Trilha de Especialidades Médicas</p></div></div></div></div></div></div></div><div id="banner" class="sc-jhAzac isqVeJ banner-container"><div class="sc-fBuWsC fDTGOl inner-container"><img class="sc-fMiknA hNQpgQ banner-figure" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/logo-desco-tim.svg"/><h3 class="sc-dVhcbM bGaWUs banner-title"><strong>É cliente TIM?</strong> Escolha um plano e estude para o Enem sem gastar sua internet.</h3><a id="banner-button" class="sc-eqIVtm hzEWqv banner-button" href="https://descomplica.com.br/cursinho-gratuito-tim/" target="_blank">Ver planos</a></div></div><div class="sc-hcnlBt kZKtJJ"><div class="sc-hkbPbT eGAwpG"><h2 class="sc-jRhVzh gEzLVE">Nossos superprofessores a um play de distância</h2><p class="sc-iHhHRJ hUyLVo"></p></div><div class="slick-slider sc-kqlzXE gOroEk slick-initialized" dir="ltr"><button type="button" data-role="none" class="slick-arrow slick-prev" style="display:block"> <!-- -->Previous</button><div class="slick-list" style="padding:0px 50px"><div class="slick-track" style="width:349.1694352159468%;left:-128.07308970099666%"><div data-index="-7" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/616bd530-1873-4d49-ab14-76f2fef3a426-prof-1.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Biologia</p><p class="sc-cPuPxo FsCWK">Rubens Oda</p><p class="sc-hvvHee cljokz">Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.</p></li></div></div><div data-index="-6" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/fc42da87-07cf-4d42-8f2d-9f36b6f90d53-prof-2.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Filosofia</p><p class="sc-cPuPxo FsCWK">Lara Rocha</p><p class="sc-hvvHee cljokz">Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!</p></li></div></div><div data-index="-5" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/53d6d84f-6991-40f4-8b48-5c5911e60e39-prof-3.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Renato Pellizzari</p><p class="sc-hvvHee cljokz">Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v.</p></li></div></div><div data-index="-4" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/b6d54638-f323-4df2-8128-f25ab9fcb80a-prof-4.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Geografia</p><p class="sc-cPuPxo FsCWK">Claudio Hansen</p><p class="sc-hvvHee cljokz">Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem.</p></li></div></div><div data-index="-3" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2736c6ec-a23a-4dd4-8806-2d90f9bc0acc-prof-5.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Natasha Piedras</p><p class="sc-hvvHee cljokz">A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF).</p></li></div></div><div data-index="-2" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6c2dd5dd-7da0-42cc-9edd-ac38d5c95167-prof-6.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Literatura</p><p class="sc-cPuPxo FsCWK">Amara Moira</p><p class="sc-hvvHee cljokz">Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.</p></li></div></div><div data-index="-1" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/1c900857-0ae4-4b78-a6e7-52c9fcb1191b-prof-8.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Sociologia</p><p class="sc-cPuPxo FsCWK">Débora Andrade</p><p class="sc-hvvHee cljokz">Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia.</p></li></div></div><div data-index="0" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/616bd530-1873-4d49-ab14-76f2fef3a426-prof-1.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Biologia</p><p class="sc-cPuPxo FsCWK">Rubens Oda</p><p class="sc-hvvHee cljokz">Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.</p></li></div></div><div data-index="1" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/fc42da87-07cf-4d42-8f2d-9f36b6f90d53-prof-2.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Filosofia</p><p class="sc-cPuPxo FsCWK">Lara Rocha</p><p class="sc-hvvHee cljokz">Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!</p></li></div></div><div data-index="2" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/53d6d84f-6991-40f4-8b48-5c5911e60e39-prof-3.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Renato Pellizzari</p><p class="sc-hvvHee cljokz">Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v.</p></li></div></div><div data-index="3" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/b6d54638-f323-4df2-8128-f25ab9fcb80a-prof-4.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Geografia</p><p class="sc-cPuPxo FsCWK">Claudio Hansen</p><p class="sc-hvvHee cljokz">Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem.</p></li></div></div><div data-index="4" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2736c6ec-a23a-4dd4-8806-2d90f9bc0acc-prof-5.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Natasha Piedras</p><p class="sc-hvvHee cljokz">A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF).</p></li></div></div><div data-index="5" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6c2dd5dd-7da0-42cc-9edd-ac38d5c95167-prof-6.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Literatura</p><p class="sc-cPuPxo FsCWK">Amara Moira</p><p class="sc-hvvHee cljokz">Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.</p></li></div></div><div data-index="6" class="slick-slide slick-active" tabindex="-1" aria-hidden="false" style="outline:none;width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/1c900857-0ae4-4b78-a6e7-52c9fcb1191b-prof-8.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Sociologia</p><p class="sc-cPuPxo FsCWK">Débora Andrade</p><p class="sc-hvvHee cljokz">Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia.</p></li></div></div><div data-index="7" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/616bd530-1873-4d49-ab14-76f2fef3a426-prof-1.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Biologia</p><p class="sc-cPuPxo FsCWK">Rubens Oda</p><p class="sc-hvvHee cljokz">Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.</p></li></div></div><div data-index="8" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/fc42da87-07cf-4d42-8f2d-9f36b6f90d53-prof-2.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Filosofia</p><p class="sc-cPuPxo FsCWK">Lara Rocha</p><p class="sc-hvvHee cljokz">Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!</p></li></div></div><div data-index="9" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/53d6d84f-6991-40f4-8b48-5c5911e60e39-prof-3.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Renato Pellizzari</p><p class="sc-hvvHee cljokz">Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v.</p></li></div></div><div data-index="10" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/b6d54638-f323-4df2-8128-f25ab9fcb80a-prof-4.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Geografia</p><p class="sc-cPuPxo FsCWK">Claudio Hansen</p><p class="sc-hvvHee cljokz">Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem.</p></li></div></div><div data-index="11" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2736c6ec-a23a-4dd4-8806-2d90f9bc0acc-prof-5.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">História</p><p class="sc-cPuPxo FsCWK">Natasha Piedras</p><p class="sc-hvvHee cljokz">A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF).</p></li></div></div><div data-index="12" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6c2dd5dd-7da0-42cc-9edd-ac38d5c95167-prof-6.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Literatura</p><p class="sc-cPuPxo FsCWK">Amara Moira</p><p class="sc-hvvHee cljokz">Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.</p></li></div></div><div data-index="13" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true" style="width:4.757373929590866%"><div><li draggable="true" tabindex="-1" style="width:100%;display:inline-block" class="sc-OxbzP eHJUEq"><img src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/1c900857-0ae4-4b78-a6e7-52c9fcb1191b-prof-8.png" class="sc-lnrBVv eLTPNc"/><p class="sc-bYnzgO dyTeQu">Sociologia</p><p class="sc-cPuPxo FsCWK">Débora Andrade</p><p class="sc-hvvHee cljokz">Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia.</p></li></div></div></div></div><button type="button" data-role="none" class="slick-arrow slick-next" style="display:block"> <!-- -->Next</button></div><a id="cta-scroll-aboutourteacher" class="sc-fvLVrH ioFHxz">Quero ficar pronto</a></div><div id="testimonials" class="sc-cqPOvA ijcynH new-testimonials-container"><div class="sc-gNJABI cnfsLK new-testimonials-content-container"><h3 class="sc-yZwTr Smyde new-testimonials-title">Olha só quem já passou com a gente</h3></div><div class="sc-hwcHae cfkQFD"><div class="sc-eopZyb bCMqve new-testimonials-card-container"><div class="sc-eNNmBn brQWXw new-testimonials-aux-card-container"><div src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg" alt="Foto de Denivaldo Guedes Vulcão" class="sc-eEieub cBhape new-testimonials-card-photo"></div><div class="sc-RbTVP cAigkM new-testimonials-card-content-container"><div class="sc-bIqbHp pjmGL new-testimonials-card-person-profile"><span class="sc-jxGEyO bJdeAz new-testimonials-card-person-name">Denivaldo Guedes Vulcão</span></div><p class="sc-hMrMfs hZMeio new-testimonials-card-testimony">Estudei usando a plataforma do Descomplica durante dois anos.<br/><br/>Lembro-me com muito carinho de todos os professores que me ajudaram, mesmo sabendo que eu era um completo desconhecido para eles rs.<br /><br />Enfim, não logrei êxito facilmente, mas graças às aulas dos queridíssimos professores pude passar em Medicina tanto na UFPA quanto na UEPA. Sinto-me na obrigação de agradecer, de forma sincera, por todo o apoio e por todo carinho transmitido por vcs a nós estudantes. <br /><br />Seguirei essa nova caminhada em minha vida, mas guardarei na memória as brincadeiras, as aulas e todo o incentivo dado por vcs. Essa é uma parte feliz da minha história, da qual o Descomplica faz parte. Amo-os.</p><span class="sc-gacfCG eNRLcz">Ler todo o depoimento</span></div></div></div><div class="sc-eopZyb bCMqve new-testimonials-card-container"><div class="sc-eNNmBn brQWXw new-testimonials-aux-card-container"><div src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg" alt="Foto de Samyra e Sarah Silva Aramuni Gonçalves" class="sc-eEieub eSdaiX new-testimonials-card-photo"></div><div class="sc-RbTVP cAigkM new-testimonials-card-content-container"><div class="sc-bIqbHp pjmGL new-testimonials-card-person-profile"><span class="sc-jxGEyO bJdeAz new-testimonials-card-person-name">Samyra e Sarah Silva Aramuni Gonçalves</span></div><p class="sc-hMrMfs hZMeio new-testimonials-card-testimony">Usamos apenas a plataforma Descomplica e conseguimos nossa aprovação em Medicina na UFRJ!<br/><br/> Na Descomplica você aprende muito mais do que conteúdo, você aprende a pensar! <br/><br/>Aulas (nada) a distância.</p></div></div></div><div class="sc-eopZyb bCMqve new-testimonials-card-container"><div class="sc-eNNmBn brQWXw new-testimonials-aux-card-container"><div src="https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg" alt="Foto de Paulo J. Praxedes de Oliveira" class="sc-eEieub WRNyW new-testimonials-card-photo"></div><div class="sc-RbTVP cAigkM new-testimonials-card-content-container"><div class="sc-bIqbHp pjmGL new-testimonials-card-person-profile"><span class="sc-jxGEyO bJdeAz new-testimonials-card-person-name">Paulo J. Praxedes de Oliveira</span></div><p class="sc-hMrMfs hZMeio new-testimonials-card-testimony">Sou do interior do RN (Caraúbas). De Escola Pública. Ex-aluno do IFRN Apodi. Minha mãe é doméstica e meu pai churrasqueiro. <br/><br/>Eu estudei na Descomplica desde 2019. Em 2021 tive que ir trabalhar como garçom pra pagar meu cursinho e ajudar na internet pq as coisas apertaram lá em casa.<br /><br />Me levantava às 7, estudava das 8:00 às 22:00, de março a novembro, e trabalhava sexta, sábado e domingo como garçom das 3 da tarde às 10 da noite. Nesses dias, quando eu chegava, estudava das 8 da manhã às 3 da tarde. E das 10 da noite às 12:00.<br /><br />Desde 2017, quando saí do IFRN, eu admirava a profissão de médico e a possibilidade de ajudar as pessoas através da medicina. Mas eu achava um sonho impossível, então eu nem cogitei. Nessa época passei pra arquitetura na UFERSA Pau dos Ferros. Cursei um ano e meio. Mas vi que não era aquilo que eu queria. <br /><br />Então em 2019 eu voltei pra casa e comecei a estudar pra Medicina. Escolhi medicina pq vejo nessa profissão uma possibilidade de ajudar as pessoas, minha família.</p><span class="sc-gacfCG eNRLcz">Ler todo o depoimento</span></div></div></div></div><button id="testimony-button" class="sc-dEfkYy kWusfg">Quero ficar pronto</button></div><div class="sc-fihHvN gwPCda"><div class="sc-ghsgMZ iOZGJx"><h2 class="sc-dznXNo clnbmn faq-title">Perguntas Frequentes</h2><div itemscope="" itemProp="mainEntity" itemType="https://schema.org/FAQPage" class="sc-ekulBa ghHoVv"><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">O que é o Enem e para que serve?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>O Exame Nacional do Ensino Médio (Enem) tem o objetivo de avaliar o desempenho de um estudante ao fim da escolaridade básica (Ensino Médio).</p><p>A nota tirada no Enem é utilizada como critério de seleção para os estudantes que pretendem concorrer a uma bolsa no Programa Universidade para Todos (<a href="https://descomplica.com.br/tudo-sobre-enem/prouni/o-que-e-o-prouni/" target="_blank">ProUni</a>) ou no Sistema de Seleção Unificada (<a href="https://descomplica.com.br/sisu/" target="_blank">SiSU</a>).</p> <p> Cerca de 500 universidades já usam o resultado do exame como critério de seleção para o ingresso no Ensino Superior, complementando ou substituindo o vestibular.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Como funciona o Enem?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>O Enem funciona da seguinte maneira:</p><p>Podem se inscrever no Enem todos os alunos que estejam cursando o Ensino Médio ou já o tenham concluído. Basta apenas se inscrever, pagar a taxa (caso não seja isento), comparecer ao local indicado no dia da prova e fazer o exame.</p><p>A prova do Enem é aplicada em <strong>dois domingos consecutivos</strong>, geralmente nos meses de outubro e novembro. Ela aborda quatro áreas do conhecimento:</p><ul><li>Ciências Humanas e suas Tecnologias (História, Geografia, Filosofia e Sociologia)</li><li>Ciências da Natureza e suas Tecnologias (Química, Física e Biologia)</li><li>Linguagens, Códigos e suas Tecnologias (Língua Portuguesa, Literatura, Língua Estrangeira – Inglês ou Espanhol – e Artes)</li><li>Matemática e suas Tecnologias</li></ul><p>Cada uma dessas quatro áreas tem <strong>45 questões, totalizando 180</strong>. Há, ainda, uma redação, que deve ser do tipo dissertativo-argumentativa.</p> <p>O Enem usa um sistema de correção de prova chamado Teoria de Resposta ao Item (TRI), que leva em conta o nível de dificuldade de cada questão e o padrão de acertos de cada participante.</p> <p>A <strong>redação é corrigida manualmente</strong>, uma a uma, por avaliadores certificados. Cada texto é submetido a dois especialistas diferentes, que não têm contato um com o outro.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">O que é TRI - Teoria da Resposta ao Item - e como ela funciona?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>Você provavelmente já viu casos em que dois candidatos acertaram o mesmo número de questões do Enem e tiveram notas diferentes, certo? Isso acontece devido ao TRI, o algoritmo escolhido pelo Enem para corrigir e dar a nota final da prova de múltipla escolha.</p><p>Em todas as edições do Enem, as questões são pré-calibradas em níveis FÁCIL – MÉDIO – DIFÍCIL para que o algoritmo consiga ver pelo seu padrão de acertos se há coerência na questão.</p><p>Se ele identifica que um candidato acertou a questão difícil, mas errou a fácil e a média, automaticamente entende que a pessoa chutou e, por isso, receberá uma nota menor.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Terá Enem Digital em 2023?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>Não, a partir de 2023 haverá apenas a prova impressa.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Como entrar na página do participante do Enem?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>É muito fácil acessar a Página do Participante do Enem! Basta acessar <a href="https://enem.inep.gov.br/participante/#!/" target="_blank">https://enem.inep.gov.br/participante/#!/</a>.</p><p>Nesta página, o candidato pode verificar todas as suas informações referentes ao Enem, como dados cadastrais, data e local de prova, ficha de inscrição, gabarito e nota final. Por isso mesmo, é fundamental saber a sua senha de acesso, que deve ser digitada junto com o CPF.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">O que estudar para o Enem 2023?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>As provas do Enem são separadas por áreas de conhecimento. São elas:</p> <ul> <li>Ciências da Natureza: Biologia, Química e Física;</li> <li>Ciências Humanas: História, Geografia, Filosofia e Sociologia;</li> <li>Linguagens, Códigos e suas Tecnologias: Português, Literatura, Língua Estrangeira, Artes, Educação Física e Tecnologias da Informação e Comunicação;</li> <li>Matemática e suas tecnologias;</li> <li>Redação.</li> </ul> <p>Confira em nosso blog os <a href="https://descomplica.com.br/blog/assuntos-que-mais-caem-no-enem/" target="_blank">assuntos que mais caem no Enem</a> e se prepare para a prova!</div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Como estudar para o Enem 2023?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>Seja estudando sozinho ou com acompanhamento de um cursinho pré-vestibular, a preparação para o Enem exige foco e dedicação. Se você tem dúvidas sobre como estudar para o Enem 2023, vale a pena acompanhar essas dicas e se preparar!</p> <ul> <li>Monte um cronograma de estudos;</li> <li>Escolha um ambiente calmo para estudar;</li> <li>Faça simulados para o Enem;</li> <li>Pratique a redação: leia bastante e informe-se sobre temas atuais. Esse conhecimento é essencial para uma boa redação.</li> <li>Cuide da saúde: é preciso reservar um tempo para descansar e ter momentos de lazer.</li> </ul></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Como se preparar para o Enem?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>Vai fazer o Enem e não sabe como se preparar? O que acha de investir em um cursinho pré vestibular?</p><p>No cursinho preparatório da Descomplica você assiste aulas de professores incríveis e capacitados, participa de tira dúvidas ao vivo, tem suas redações corrigidas, recebe exercícios e resumão pra mandar bem na prova e muito mais.</p><p>Ah, além de tudo, você ainda pode criar um cronograma personalizado para estudar de acordo com a sua rotina!</p><p>Outra dica é fazer <a href="https://simulado.descomplica.com.br/" target="_blank">simulados do Enem</a>. Quando você faz provas antigas, entende a estrutura do exame e consegue dividir melhor o tempo no dia do exame</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Qual é o melhor curso preparatório para o Enem?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>O melhor cursinho para o Enem é aquele que dá flexibilidade para o aluno estudar de acordo com a sua rotina e objetivos, que conta com professores capacitados e que tenham aulas dinâmicas.</p><p>A Descomplica, por exemplo, tem planos super flexíveis de cursinho preparatório para o Enem. As aulas são online e podem ser acessadas a qualquer momento. Além disso, os professores são incríveis e você pode criar seu cronograma de estudos personalizado.</p><p>Quer mais? A Descomplica também conta com encontros ao vivo para os alunos tirarem dúvidas, conteúdo extra pra dar um gás, correção de redação, simulado enem e muito mais.</p></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Qual o cronograma do Enem 2023?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>É importante estar de olho nas datas do Enem. Confira o calendário de 2023 abaixo:</p><ul><li>Inscrições: 5 a 16 de junho;</li><li>Atendimento especializado e tratamento pelo nome social: 5 a 16 de junho;</li><li>Provas: 05 e 12 de novembro;</li><li>Gabaritos: 24 de novembro;</li><li>Resultados: 16 de janeiro de 2024.</li></ul></div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Quem pode fazer o Enem 2023?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>Qualquer pessoa que esteja no Ensino Médio ou já tenha concluído essa formação pode prestar o Enem 2023.</p><p>Pessoas com deficiência física e/ou mental podem fazer o Enem, com direito a solicitar atendimento especializado nos seguintes casos: <ul><li>Baixa visão</li><li>Cegueira</li><li>Visão monocular</li><li>Deficiência física</li><li>Deficiência auditiva</li><li>Surdez</li><li>Deficiência intelectual (mental)</li><li>Surdocegueira</li><li>Dislexia</li><li>Déficit de atenção</li><li>Autismo</li><li>Discalculia</li></ul><p>O candidato deve fazer o requerimento de atendimento especializado quando se inscrever, informando sua condição.</div></article></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-lnmtFM cSgDV"><div class="sc-erNlkL hswhgM"><p itemProp="name" class="sc-iuDHTM XjefE">Como funciona a correção das provas do ENEM?</p><div class="sc-FQuPU cAxxmG"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" class="sc-kEmuub cOOUO"><article itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-bbkauy jjbcAn"><div itemProp="text"><p>A correção das <a href="https://descomplica.com.br/gabarito-enem/" target="_blank">provas do Enem</a> é realizada através de um sistema chamado Teoria de Resposta ao Item (TRI). Esse método leva em consideração não apenas o número de respostas corretas, mas também a coerência das respostas em relação ao padrão de acertos esperado para cada questão. Dessa forma, o desempenho do candidato é avaliado de forma mais precisa e justa, considerando a dificuldade das questões e o nível de conhecimento demonstrado.</p></div></article></div></div></div></div></div><footer class="sc-gZMcBi bxhUVu footer-mobile-wrapper"><a href="/" class="sc-gqjmRU kWFLat"><svg version="1.1" id="Layer_1" x="0px" y="0px" width="100px" height="40px" viewBox="0 0 200 62"><g><g><path fill="#00E88F" class="st0" d="M48.9,0.9L6.6,8.8C3,9.5,0,13.1,0,17.3v26.8c0,4.4,3,7.8,6.6,8.5L49,61.1c5.3,1.1,9.8-3,9.8-8.7V10 C58.7,3.7,54.3-0.1,48.9,0.9z"></path></g><g><path d="M17,37.6C15.8,39,14,40,11.9,40c-4.7,0-8.1-3.8-8.1-9.1s3.5-9.1,8.1-9.1c1.8,0,3.4,0.7,4.6,1.8v-8.3h4.5v24.3h-3.7 L17,37.6z M8.3,30.9C8.3,34,10,36,12.4,36c2.7,0,4.1-2,4.1-5.1s-1.5-5.1-4.1-5.1C10,25.8,8.3,27.8,8.3,30.9z"></path><path d="M33,40c-5.1,0-9-3.8-9-9.1c0-5.5,3.5-9.1,8.6-9.1c5.3,0,8.3,3.6,8.3,8.4c0,0.7,0,1.5-0.2,2.2H28.6 c0.4,2.2,1.9,3.7,4.4,3.6c1.5,0,3.1-0.8,4.2-2.6l3.6,1.8C39,38.4,36.7,40,33,40z M28.8,28.9h7.6c-0.2-2.2-1.5-3.6-3.8-3.6 S29.1,26.6,28.8,28.9z"></path><path d="M42.7,27c0-3,2.4-5.4,6.6-5.4c2.8,0,4.9,1.4,6.1,3l-2.8,2.5c-0.6-0.9-1.8-1.7-3.6-1.7c-1.4,0-2.3,0.6-2.3,1.6 c0,0.9,0.4,1.5,3,2.1c3.6,0.9,5.8,2.1,5.8,5.4S52.6,40,48.8,40c-2.8,0-4.9-1.3-6.7-3.8l2.8-2.3c1.6,1.9,2.7,2.4,4.4,2.4 c1.2,0,2-0.6,2-1.5c0-1.2-1.2-1.7-4.2-2.4C44.4,31.7,42.7,30.2,42.7,27z"></path></g><g class="logo-content" fill="black"><path d="M70.2,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C76.7,38.6,73.9,40,70.2,40z"></path><path d="M97.5,30.9c0,5.3-3.7,9.1-9,9.1s-9-3.8-9-9.1s3.7-9.1,9-9.1S97.5,25.6,97.5,30.9z M92.8,30.9c0-3-1.6-5.1-4.5-5.1 c-2.7,0-4.5,2.1-4.5,5.1c0,3.1,1.6,5.1,4.5,5.1C91.2,35.9,92.8,33.9,92.8,30.9z"></path><path d="M104.9,27.4v12.2h-4.5V22.2h3.7l0.3,1.6c1.5-1.4,3.5-2.1,5.5-2.1c2.7,0,4.2,1,4.9,2.4c1.5-1.6,3.7-2.4,5.9-2.4 c5.1,0,5.8,3.6,5.8,7.2v10.6H122V28.8c0-2.4-0.7-3.1-2.4-3.1c-1.5,0-2.9,0.7-4,1.7c0,0.5,0,1,0,1.5v10.6H111V28.8 c0-2.4-0.7-3.1-2.4-3.1C107.5,25.7,106,26.4,104.9,27.4z"></path><path d="M135,38.2v7.5h-4.5V22.2h3.7l0.4,1.9c1.3-1.5,3-2.4,5.1-2.4c4.7,0,8.1,3.8,8.1,9.1s-3.5,9.1-8.1,9.1 C137.9,40,136.3,39.3,135,38.2z M143.3,30.9c0-3.1-1.6-5.1-4.1-5.1c-2.7,0-4.1,2-4.1,5.1c0,3.1,1.5,5.1,4.1,5.1 C141.6,35.9,143.3,34,143.3,30.9z"></path><path d="M156.3,39.6c-0.4,0-0.8,0.1-1.3,0.1c-3.1,0-4.9-1.6-4.9-5.3V15.2h4.5v18.2c0,1.5,0.5,1.9,1.7,1.9L156.3,39.6L156.3,39.6z"></path><path d="M161.4,14c1.6,0,2.8,1.3,2.8,2.9c0,1.5-1.3,2.8-2.8,2.8c-1.5,0-2.8-1.3-2.8-2.8C158.5,15.2,159.8,14,161.4,14z M159.1,39.5V22.1h4.5v17.4H159.1z"></path><path d="M175.5,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C181.9,38.6,179.1,40,175.5,40z"></path><path d="M196.3,38.1c-1.3,1.3-3.1,2-5,2c-3.5,0-6.6-2.5-6.6-5.9c0-3.7,3.1-5.9,6.8-5.9c1.8,0,3.1,0.7,4,1.5v-1.8 c0-1.5-1.4-2.4-3.3-2.4c-1.3,0-2.9,0.3-4.7,1.3l-1.3-3.3c2.2-1.2,4.2-1.7,6.8-1.7c4.6,0,7.1,2.6,7.1,7v10.8h-3.6L196.3,38.1z M192.4,36.4c1.6,0,2.7-0.9,2.8-2.3c0-1.4-1.1-2.3-2.8-2.3c-1.6,0-3,1-3,2.3C189.4,35.5,190.7,36.4,192.4,36.4z"></path></g></g></svg></a><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-enem-e-vestibulares">Enem e Vestibulares</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-enem-e-vestibulares-estude-para-encceja" target="_blank" href="https://descomplica.com.br/encceja/" class="sc-cSHVUG EWztw">Estude para Encceja</a><a id="footer-enem-e-vestibulares-cursinho-para-enem" target="_blank" href="https://descomplica.com.br/vestibulares/enem/" class="sc-cSHVUG EWztw">Cursinho para Enem</a><a id="footer-enem-e-vestibulares-cursinho-para-medicina" target="_blank" href="https://descomplica.com.br/vestibulares/medicina/" class="sc-cSHVUG EWztw">Cursinho para Medicina</a><a id="footer-enem-e-vestibulares-curso-enem-gratuito" target="_blank" href="https://descomplica.com.br/cursinho-gratuito/" class="sc-cSHVUG EWztw">Curso Enem Gratuito</a><a id="footer-enem-e-vestibulares-inscricoes-enem" target="_blank" href="https://cursinho.descomplica.com.br/vestibulares/enem/inscricao-enem" class="sc-cSHVUG EWztw">Inscrições Enem</a><a id="footer-enem-e-vestibulares-parceria-tim" target="_blank" href="https://descomplica.com.br/cursinho-gratuito-tim/" class="sc-cSHVUG EWztw">Parceria TIM</a><a id="footer-enem-e-vestibulares-questoes-do-enem" target="_blank" href="https://descomplica.com.br/gabarito-enem/questoes/" class="sc-cSHVUG EWztw">Questões do Enem</a><a id="footer-enem-e-vestibulares-simulador-sisu" target="_blank" href="https://descomplica.com.br/sisu/" class="sc-cSHVUG EWztw">Simulador SiSU</a><a id="footer-enem-e-vestibulares-simulado-enem" target="_blank" href="https://simulado.descomplica.com.br/" class="sc-cSHVUG EWztw">Simulado Enem</a><a id="footer-enem-e-vestibulares-aprovados-enem" target="_blank" href="https://descomplica.com.br/aprovados-enem/" class="sc-cSHVUG EWztw">Aprovados Enem</a><a id="footer-enem-e-vestibulares-livro-redacao-em-10-semanas" target="_blank" href="https://cursinho.descomplica.com.br/livro/redacao" class="sc-cSHVUG EWztw">Livro Redação em 10 semanas</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-graduacao">Graduação</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-graduacao-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/" class="sc-cSHVUG EWztw">Graduação</a><a id="footer-graduacao-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/diferenciais/" class="sc-cSHVUG EWztw">Graduação Descomplica</a><a id="footer-graduacao-faculdade-de-educacao" target="_blank" href="https://descomplica.com.br/faculdade/educacao/" class="sc-cSHVUG EWztw">Faculdade de Educação</a><a id="footer-graduacao-faculdade-de-engenharia" target="_blank" href="https://descomplica.com.br/faculdade/engenharia/" class="sc-cSHVUG EWztw">Faculdade de Engenharia</a><a id="footer-graduacao-faculdade-de-gestao" target="_blank" href="https://descomplica.com.br/faculdade/gestao/" class="sc-cSHVUG EWztw">Faculdade de Gestão</a><a id="footer-graduacao-faculdade-de-tecnologia" target="_blank" href="https://descomplica.com.br/faculdade/tecnologia/" class="sc-cSHVUG EWztw">Faculdade de Tecnologia</a><a id="footer-graduacao-vestibular-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/" class="sc-cSHVUG EWztw">Vestibular Descomplica</a><a id="footer-graduacao-segunda-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/segunda-graduacao/" class="sc-cSHVUG EWztw">Segunda Graduação</a><a id="footer-graduacao-transferencia-externa" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/transferencia/" class="sc-cSHVUG EWztw">Transferência Externa</a><a id="footer-graduacao-ingresso-via-enem" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/nota-enem/" class="sc-cSHVUG EWztw">Ingresso via Enem</a><a id="footer-graduacao-ingresso-via-prouni" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/prouni/" class="sc-cSHVUG EWztw">Ingresso via Prouni</a><a id="footer-graduacao-teste-vocacional-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/teste-vocacional/" class="sc-cSHVUG EWztw">Teste Vocacional Descomplica</a><a id="footer-graduacao-teste-faculdade-15-dias-gratis" target="_blank" href="https://descomplica.com.br/faculdade/teste-gratis/" class="sc-cSHVUG EWztw">Teste Faculdade 15 dias grátis</a><a id="footer-graduacao-guia-de-carreiras" target="_blank" href="https://descomplica.com.br/guia-de-carreiras/" class="sc-cSHVUG EWztw">Guia de Carreiras</a><a id="footer-graduacao-quanto-ganha-cada-profissao" target="_blank" href="https://descomplica.com.br/quanto-ganha/" class="sc-cSHVUG EWztw">Quanto Ganha cada Profissão</a><a id="footer-graduacao-comparador-de-faculdade" target="_blank" href="https://comparafacul.com.br/" class="sc-cSHVUG EWztw">Comparador de Faculdade</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-pos-graduacao">Pós-graduação</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-pos-graduacao-pos-graduacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/" class="sc-cSHVUG EWztw">Pós-graduação</a><a id="footer-pos-graduacao-pos-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/pos-graduacao/sobre-nos/" class="sc-cSHVUG EWztw">Pós-graduação Descomplica</a><a id="footer-pos-graduacao-pos-em-gestao" target="_blank" href="https://descomplica.com.br/pos-graduacao/gestao/" class="sc-cSHVUG EWztw">Pós em Gestão</a><a id="footer-pos-graduacao-pos-em-direito" target="_blank" href="https://descomplica.com.br/pos-graduacao/direito/" class="sc-cSHVUG EWztw">Pós em Direito</a><a id="footer-pos-graduacao-pos-em-educacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/educacao/" class="sc-cSHVUG EWztw">Pós em Educação</a><a id="footer-pos-graduacao-pos-em-tecnologia" target="_blank" href="https://descomplica.com.br/pos-graduacao/tecnologia/" class="sc-cSHVUG EWztw">Pós em Tecnologia</a><a id="footer-pos-graduacao-pos-em-marketing-e-comunicacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/marketing-e-comunicacao/" class="sc-cSHVUG EWztw">Pós em Marketing e Comunicação</a><a id="footer-pos-graduacao-pos-em-engenharia" target="_blank" href="https://descomplica.com.br/pos-graduacao/engenharia/" class="sc-cSHVUG EWztw">Pós em Engenharia</a><a id="footer-pos-graduacao-pos-em-saude" target="_blank" href="https://descomplica.com.br/pos-graduacao/saude/" class="sc-cSHVUG EWztw">Pós em Saúde</a><a id="footer-pos-graduacao-teste-pos-15-dias-gratis" target="_blank" href="https://descomplica.com.br/pos-graduacao/teste-gratis/" class="sc-cSHVUG EWztw">Teste Pós 15 dias grátis</a><a id="footer-pos-graduacao-monte-sua-pos" target="_blank" href="https://descomplica.com.br/pos-graduacao/monte-sua-pos/" class="sc-cSHVUG EWztw">Monte sua Pós</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-solucoes-corporativas">Soluções Corporativas</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-solucoes-corporativas-educacao-corporativa" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-cSHVUG EWztw">Educação corporativa</a><a id="footer-solucoes-corporativas-ifood-meu-diploma-e-m" target="_blank" href="https://parceiros.descomplica.com.br/ifood/meu-diploma" class="sc-cSHVUG EWztw">iFood: Meu Diploma E.M</a><a id="footer-solucoes-corporativas-loreal-formacao-em-cabelereiro-ead" target="_blank" href="https://ead.institutoloreal.com.br/" class="sc-cSHVUG EWztw">LOréal: Formação em Cabelereiro EAD</a><a id="footer-solucoes-corporativas-nubank-formacao-tech" target="_blank" href="https://parceiros.descomplica.com.br/nubank/nuvem" class="sc-cSHVUG EWztw">Nubank: Formação Tech</a><a id="footer-solucoes-corporativas-natura-desenvolvimento-educacional" target="_blank" href="https://parceiros.descomplica.com.br/natura-educacao/cursos-preparatorios" class="sc-cSHVUG EWztw">Natura: Desenvolvimento Educacional</a><a id="footer-solucoes-corporativas-serasa-trilha-financeira" target="_blank" href="https://parceiros.descomplica.com.br/curso-educacao-financeira-gratuito" class="sc-cSHVUG EWztw">Serasa: Trilha Financeira</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-mais-produtos">Mais Produtos</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-mais-produtos-blog-descomplica" target="_blank" href="https://descomplica.com.br/blog/" class="sc-cSHVUG EWztw">Blog Descomplica</a><a id="footer-mais-produtos-cursos-livres" target="_blank" href="https://cursos-livres.descomplica.com.br/" class="sc-cSHVUG EWztw">Cursos Livres</a></div></div><div class="sc-kgoBCf czYjpW"><div class="sc-chPdSV iDDyqz">Baixe o App Descomplica</div><div class="sc-kGXeez iLaiDY"><img alt="Apple Store" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/apple-store-icon2.svg"/><img alt="Google Play" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/google-play-icon.svg"/></div></div><div class="sc-kpOJdX bjFwnM"><div class="sc-ckVGcZ byovHs"><div> Central de Ajuda </div><div> Quem Somos </div><div> Política de Privacidade </div></div><div class="sc-jKJlTe iXOzQw"><div> Termos de Uso </div><div> Trabalhe conosco </div><div> Imprensa </div></div></div><div class="sc-dxgOiQ fQKnQb"><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/small-descomplica-icon.svg" class="sc-eNQAEJ cwwjnH"/><img alt="Facebook" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/fb-icon.svg"/><img alt="Twitter" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/twitter-icon.svg"/><img alt="YouTube" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/youtube-icon.svg"/><img alt="Instagram" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/instagram-icon.svg"/></div></footer><footer class="sc-kEYyzF jXYoyY footer-desktop-wrapper"><a href="https://descomplica.com.br" aria-label="Página inicial Descomplica" class="sc-iAyFgw bsSYmi"><svg version="1.1" id="Layer_1" x="0px" y="0px" width="100px" height="40px" viewBox="0 0 200 62"><g><g><path fill="#00E88F" class="st0" d="M48.9,0.9L6.6,8.8C3,9.5,0,13.1,0,17.3v26.8c0,4.4,3,7.8,6.6,8.5L49,61.1c5.3,1.1,9.8-3,9.8-8.7V10 C58.7,3.7,54.3-0.1,48.9,0.9z"></path></g><g><path d="M17,37.6C15.8,39,14,40,11.9,40c-4.7,0-8.1-3.8-8.1-9.1s3.5-9.1,8.1-9.1c1.8,0,3.4,0.7,4.6,1.8v-8.3h4.5v24.3h-3.7 L17,37.6z M8.3,30.9C8.3,34,10,36,12.4,36c2.7,0,4.1-2,4.1-5.1s-1.5-5.1-4.1-5.1C10,25.8,8.3,27.8,8.3,30.9z"></path><path d="M33,40c-5.1,0-9-3.8-9-9.1c0-5.5,3.5-9.1,8.6-9.1c5.3,0,8.3,3.6,8.3,8.4c0,0.7,0,1.5-0.2,2.2H28.6 c0.4,2.2,1.9,3.7,4.4,3.6c1.5,0,3.1-0.8,4.2-2.6l3.6,1.8C39,38.4,36.7,40,33,40z M28.8,28.9h7.6c-0.2-2.2-1.5-3.6-3.8-3.6 S29.1,26.6,28.8,28.9z"></path><path d="M42.7,27c0-3,2.4-5.4,6.6-5.4c2.8,0,4.9,1.4,6.1,3l-2.8,2.5c-0.6-0.9-1.8-1.7-3.6-1.7c-1.4,0-2.3,0.6-2.3,1.6 c0,0.9,0.4,1.5,3,2.1c3.6,0.9,5.8,2.1,5.8,5.4S52.6,40,48.8,40c-2.8,0-4.9-1.3-6.7-3.8l2.8-2.3c1.6,1.9,2.7,2.4,4.4,2.4 c1.2,0,2-0.6,2-1.5c0-1.2-1.2-1.7-4.2-2.4C44.4,31.7,42.7,30.2,42.7,27z"></path></g><g class="logo-content" fill="black"><path d="M70.2,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C76.7,38.6,73.9,40,70.2,40z"></path><path d="M97.5,30.9c0,5.3-3.7,9.1-9,9.1s-9-3.8-9-9.1s3.7-9.1,9-9.1S97.5,25.6,97.5,30.9z M92.8,30.9c0-3-1.6-5.1-4.5-5.1 c-2.7,0-4.5,2.1-4.5,5.1c0,3.1,1.6,5.1,4.5,5.1C91.2,35.9,92.8,33.9,92.8,30.9z"></path><path d="M104.9,27.4v12.2h-4.5V22.2h3.7l0.3,1.6c1.5-1.4,3.5-2.1,5.5-2.1c2.7,0,4.2,1,4.9,2.4c1.5-1.6,3.7-2.4,5.9-2.4 c5.1,0,5.8,3.6,5.8,7.2v10.6H122V28.8c0-2.4-0.7-3.1-2.4-3.1c-1.5,0-2.9,0.7-4,1.7c0,0.5,0,1,0,1.5v10.6H111V28.8 c0-2.4-0.7-3.1-2.4-3.1C107.5,25.7,106,26.4,104.9,27.4z"></path><path d="M135,38.2v7.5h-4.5V22.2h3.7l0.4,1.9c1.3-1.5,3-2.4,5.1-2.4c4.7,0,8.1,3.8,8.1,9.1s-3.5,9.1-8.1,9.1 C137.9,40,136.3,39.3,135,38.2z M143.3,30.9c0-3.1-1.6-5.1-4.1-5.1c-2.7,0-4.1,2-4.1,5.1c0,3.1,1.5,5.1,4.1,5.1 C141.6,35.9,143.3,34,143.3,30.9z"></path><path d="M156.3,39.6c-0.4,0-0.8,0.1-1.3,0.1c-3.1,0-4.9-1.6-4.9-5.3V15.2h4.5v18.2c0,1.5,0.5,1.9,1.7,1.9L156.3,39.6L156.3,39.6z"></path><path d="M161.4,14c1.6,0,2.8,1.3,2.8,2.9c0,1.5-1.3,2.8-2.8,2.8c-1.5,0-2.8-1.3-2.8-2.8C158.5,15.2,159.8,14,161.4,14z M159.1,39.5V22.1h4.5v17.4H159.1z"></path><path d="M175.5,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C181.9,38.6,179.1,40,175.5,40z"></path><path d="M196.3,38.1c-1.3,1.3-3.1,2-5,2c-3.5,0-6.6-2.5-6.6-5.9c0-3.7,3.1-5.9,6.8-5.9c1.8,0,3.1,0.7,4,1.5v-1.8 c0-1.5-1.4-2.4-3.3-2.4c-1.3,0-2.9,0.3-4.7,1.3l-1.3-3.3c2.2-1.2,4.2-1.7,6.8-1.7c4.6,0,7.1,2.6,7.1,7v10.8h-3.6L196.3,38.1z M192.4,36.4c1.6,0,2.7-0.9,2.8-2.3c0-1.4-1.1-2.3-2.8-2.3c-1.6,0-3,1-3,2.3C189.4,35.5,190.7,36.4,192.4,36.4z"></path></g></g></svg></a><div class="sc-kkGfuU iieRqM footer-content"><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-enem-e-vestibulares" target="_blank" class="sc-cvbbAY ixpQzo">Enem e Vestibulares</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-enem-e-vestibulares-estude-para-encceja" target="_blank" href="https://descomplica.com.br/encceja/" class="sc-brqgnP dvKbdi">Estude para Encceja</a><a id="footer-enem-e-vestibulares-cursinho-para-enem" target="_blank" href="https://descomplica.com.br/vestibulares/enem/" class="sc-brqgnP dvKbdi">Cursinho para Enem</a><a id="footer-enem-e-vestibulares-cursinho-para-medicina" target="_blank" href="https://descomplica.com.br/vestibulares/medicina/" class="sc-brqgnP dvKbdi">Cursinho para Medicina</a><a id="footer-enem-e-vestibulares-curso-enem-gratuito" target="_blank" href="https://descomplica.com.br/cursinho-gratuito/" class="sc-brqgnP dvKbdi">Curso Enem Gratuito</a><a id="footer-enem-e-vestibulares-inscricoes-enem" target="_blank" href="https://cursinho.descomplica.com.br/vestibulares/enem/inscricao-enem" class="sc-brqgnP dvKbdi">Inscrições Enem</a><a id="footer-enem-e-vestibulares-parceria-tim" target="_blank" href="https://descomplica.com.br/cursinho-gratuito-tim/" class="sc-brqgnP dvKbdi">Parceria TIM</a><a id="footer-enem-e-vestibulares-questoes-do-enem" target="_blank" href="https://descomplica.com.br/gabarito-enem/questoes/" class="sc-brqgnP dvKbdi">Questões do Enem</a><a id="footer-enem-e-vestibulares-simulador-sisu" target="_blank" href="https://descomplica.com.br/sisu/" class="sc-brqgnP dvKbdi">Simulador SiSU</a><a id="footer-enem-e-vestibulares-simulado-enem" target="_blank" href="https://simulado.descomplica.com.br/" class="sc-brqgnP dvKbdi">Simulado Enem</a><a id="footer-enem-e-vestibulares-aprovados-enem" target="_blank" href="https://descomplica.com.br/aprovados-enem/" class="sc-brqgnP dvKbdi">Aprovados Enem</a><a id="footer-enem-e-vestibulares-livro-redacao-em-10-semanas" target="_blank" href="https://cursinho.descomplica.com.br/livro/redacao" class="sc-brqgnP dvKbdi">Livro Redação em 10 semanas</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/" class="sc-cvbbAY WFmwN">Graduação</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-graduacao-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/diferenciais/" class="sc-brqgnP dvKbdi">Graduação Descomplica</a><a id="footer-graduacao-faculdade-de-educacao" target="_blank" href="https://descomplica.com.br/faculdade/educacao/" class="sc-brqgnP dvKbdi">Faculdade de Educação</a><a id="footer-graduacao-faculdade-de-engenharia" target="_blank" href="https://descomplica.com.br/faculdade/engenharia/" class="sc-brqgnP dvKbdi">Faculdade de Engenharia</a><a id="footer-graduacao-faculdade-de-gestao" target="_blank" href="https://descomplica.com.br/faculdade/gestao/" class="sc-brqgnP dvKbdi">Faculdade de Gestão</a><a id="footer-graduacao-faculdade-de-tecnologia" target="_blank" href="https://descomplica.com.br/faculdade/tecnologia/" class="sc-brqgnP dvKbdi">Faculdade de Tecnologia</a><a id="footer-graduacao-vestibular-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/" class="sc-brqgnP dvKbdi">Vestibular Descomplica</a><a id="footer-graduacao-segunda-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/segunda-graduacao/" class="sc-brqgnP dvKbdi">Segunda Graduação</a><a id="footer-graduacao-transferencia-externa" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/transferencia/" class="sc-brqgnP dvKbdi">Transferência Externa</a><a id="footer-graduacao-ingresso-via-enem" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/nota-enem/" class="sc-brqgnP dvKbdi">Ingresso via Enem</a><a id="footer-graduacao-ingresso-via-prouni" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/prouni/" class="sc-brqgnP dvKbdi">Ingresso via Prouni</a><a id="footer-graduacao-teste-vocacional-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/teste-vocacional/" class="sc-brqgnP dvKbdi">Teste Vocacional Descomplica</a><a id="footer-graduacao-teste-faculdade-15-dias-gratis" target="_blank" href="https://descomplica.com.br/faculdade/teste-gratis/" class="sc-brqgnP dvKbdi">Teste Faculdade 15 dias grátis</a><a id="footer-graduacao-guia-de-carreiras" target="_blank" href="https://descomplica.com.br/guia-de-carreiras/" class="sc-brqgnP dvKbdi">Guia de Carreiras</a><a id="footer-graduacao-quanto-ganha-cada-profissao" target="_blank" href="https://descomplica.com.br/quanto-ganha/" class="sc-brqgnP dvKbdi">Quanto Ganha cada Profissão</a><a id="footer-graduacao-comparador-de-faculdade" target="_blank" href="https://comparafacul.com.br/" class="sc-brqgnP dvKbdi">Comparador de Faculdade</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-pos-graduacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/" class="sc-cvbbAY WFmwN">Pós-graduação</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-pos-graduacao-pos-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/pos-graduacao/sobre-nos/" class="sc-brqgnP dvKbdi">Pós-graduação Descomplica</a><a id="footer-pos-graduacao-pos-em-gestao" target="_blank" href="https://descomplica.com.br/pos-graduacao/gestao/" class="sc-brqgnP dvKbdi">Pós em Gestão</a><a id="footer-pos-graduacao-pos-em-direito" target="_blank" href="https://descomplica.com.br/pos-graduacao/direito/" class="sc-brqgnP dvKbdi">Pós em Direito</a><a id="footer-pos-graduacao-pos-em-educacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/educacao/" class="sc-brqgnP dvKbdi">Pós em Educação</a><a id="footer-pos-graduacao-pos-em-tecnologia" target="_blank" href="https://descomplica.com.br/pos-graduacao/tecnologia/" class="sc-brqgnP dvKbdi">Pós em Tecnologia</a><a id="footer-pos-graduacao-pos-em-marketing-e-comunicacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/marketing-e-comunicacao/" class="sc-brqgnP dvKbdi">Pós em Marketing e Comunicação</a><a id="footer-pos-graduacao-pos-em-engenharia" target="_blank" href="https://descomplica.com.br/pos-graduacao/engenharia/" class="sc-brqgnP dvKbdi">Pós em Engenharia</a><a id="footer-pos-graduacao-pos-em-saude" target="_blank" href="https://descomplica.com.br/pos-graduacao/saude/" class="sc-brqgnP dvKbdi">Pós em Saúde</a><a id="footer-pos-graduacao-teste-pos-15-dias-gratis" target="_blank" href="https://descomplica.com.br/pos-graduacao/teste-gratis/" class="sc-brqgnP dvKbdi">Teste Pós 15 dias grátis</a><a id="footer-pos-graduacao-monte-sua-pos" target="_blank" href="https://descomplica.com.br/pos-graduacao/monte-sua-pos/" class="sc-brqgnP dvKbdi">Monte sua Pós</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-solucoes-corporativas" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-cvbbAY WFmwN">Soluções Corporativas</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-solucoes-corporativas-educacao-corporativa" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-brqgnP dvKbdi">Educação corporativa</a><a id="footer-solucoes-corporativas-ifood-meu-diploma-e-m" target="_blank" href="https://parceiros.descomplica.com.br/ifood/meu-diploma" class="sc-brqgnP dvKbdi">iFood: Meu Diploma E.M</a><a id="footer-solucoes-corporativas-loreal-formacao-em-cabelereiro-ead" target="_blank" href="https://ead.institutoloreal.com.br/" class="sc-brqgnP dvKbdi">LOréal: Formação em Cabelereiro EAD</a><a id="footer-solucoes-corporativas-nubank-formacao-tech" target="_blank" href="https://parceiros.descomplica.com.br/nubank/nuvem" class="sc-brqgnP dvKbdi">Nubank: Formação Tech</a><a id="footer-solucoes-corporativas-natura-desenvolvimento-educacional" target="_blank" href="https://parceiros.descomplica.com.br/natura-educacao/cursos-preparatorios" class="sc-brqgnP dvKbdi">Natura: Desenvolvimento Educacional</a><a id="footer-solucoes-corporativas-serasa-trilha-financeira" target="_blank" href="https://parceiros.descomplica.com.br/curso-educacao-financeira-gratuito" class="sc-brqgnP dvKbdi">Serasa: Trilha Financeira</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-mais-produtos" target="_blank" class="sc-cvbbAY ixpQzo">Mais Produtos</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-mais-produtos-blog-descomplica" target="_blank" href="https://descomplica.com.br/blog/" class="sc-brqgnP dvKbdi">Blog Descomplica</a><a id="footer-mais-produtos-cursos-livres" target="_blank" href="https://cursos-livres.descomplica.com.br/" class="sc-brqgnP dvKbdi">Cursos Livres</a></div></div><div class="sc-gPEVay bdhLcP"><div class="sc-jDwBTQ gGzOhs">Baixe o<br/>App Descomplica</div><div class="sc-iRbamj bToZjp"><img tabindex="0" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/apple-store-icon2.svg" class="footer-app-ios" alt="Apple Store"/><img tabindex="0" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/google-play-icon.svg" class="footer-app-android" alt="Google Play"/></div></div></div><div class="sc-csuQGl cZYsgQ footer-last-section"><div class="sc-Rmtcm GaaNG"><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/small-descomplica-icon.svg" alt="Descomplica" class="sc-bRBYWo kslFZL"/><div class="sc-jlyJG drSMye"><a href="https://atendimento.descomplica.com.br/hc/pt-br" class="sc-brqgnP bEhNRI"><span>Central de Ajuda</span></a><a href="https://descomplica.com.br/sobre/quem-somos/" class="sc-brqgnP bEhNRI"><span>Quem Somos</span></a><a href="https://descomplica.com.br/sobre/politica-de-privacidade/" class="sc-brqgnP bEhNRI"><span>Política de Privacidade</span></a><a href="https://descomplica.com.br/sobre/termos-de-uso/" class="sc-brqgnP bEhNRI"><span>Termos de Uso</span></a><a href="https://boards.greenhouse.io/descomplica" class="sc-brqgnP bEhNRI"><span>Trabalhe conosco</span></a><a href="https://descomplica.com.br/imprensa/" class="sc-brqgnP bEhNRI"><span>Imprensa</span></a></div></div><div><div class="sc-gipzik dvUBWS"><img alt="Facebook" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/fb-icon.svg" tabindex="0"/><img alt="Twitter" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/twitter-icon.svg" tabindex="0"/><img alt="Youtube" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/youtube-icon.svg" tabindex="0"/><img alt="Instagram" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/instagram-icon.svg" tabindex="0"/></div></div></div></footer><script>window.__landingsProject = true</script><script>window.POCKET_ENV = {"mixpanel":"760dfcc19d45ca96a003a0643baf7f3a","gtm":"GTM-P3F4C85","hubspot":"1653949","enableHubspot":true}</script><script src="https://dnnsjdj5swfc3.cloudfront.net/front-end/libs/pocket.latest.js"></script></div></div><style></style><script id="__NEXT_DATA__" type="application/json">{"props":{"pageProps":{"landing":{"id":"2118","name":"Enem Raiz","url":"/vestibulares/enem/","category":"Vestibulares","template":"Blackfriday2020","isABTest":false,"published":true,"seo":{"canonical":"https://descomplica.com.br/vestibulares/enem","title":"Cursinho Pré-vestibular da Descomplica | Invista no seu futuro","description":"Só conhecendo o cursinho Pré-vestibular da Descomplica para entender por que somos considerados o melhor cursinho Enem do Brasil. Confira e saiba mais!"},"components":[{"order":6,"props":{"reactName":"Faq","isVariation":"","faqTitle":"","faqSubtitle":"","items":[{"order":0,"title":"O que é o Enem e para que serve?","lines":["\u003cp\u003eO Exame Nacional do Ensino Médio (Enem) tem o objetivo de avaliar o desempenho de um estudante ao fim da escolaridade básica (Ensino Médio).\u003c/p\u003e\u003cp\u003eA nota tirada no Enem é utilizada como critério de seleção para os estudantes que pretendem concorrer a uma bolsa no Programa Universidade para Todos (\u003ca href=\"https://descomplica.com.br/tudo-sobre-enem/prouni/o-que-e-o-prouni/\" target=\"_blank\"\u003eProUni\u003c/a\u003e) ou no Sistema de Seleção Unificada (\u003ca href=\"https://descomplica.com.br/sisu/\" target=\"_blank\"\u003eSiSU\u003c/a\u003e).\u003c/p\u003e \u003cp\u003e Cerca de 500 universidades já usam o resultado do exame como critério de seleção para o ingresso no Ensino Superior, complementando ou substituindo o vestibular.\u003c/p\u003e"]},{"order":1,"title":"Como funciona o Enem?","lines":["\u003cp\u003eO Enem funciona da seguinte maneira:\u003c/p\u003e\u003cp\u003ePodem se inscrever no Enem todos os alunos que estejam cursando o Ensino Médio ou já o tenham concluído. Basta apenas se inscrever, pagar a taxa (caso não seja isento), comparecer ao local indicado no dia da prova e fazer o exame.\u003c/p\u003e\u003cp\u003eA prova do Enem é aplicada em \u003cstrong\u003edois domingos consecutivos\u003c/strong\u003e, geralmente nos meses de outubro e novembro. Ela aborda quatro áreas do conhecimento:\u003c/p\u003e\u003cul\u003e\u003cli\u003eCiências Humanas e suas Tecnologias (História, Geografia, Filosofia e Sociologia)\u003c/li\u003e\u003cli\u003eCiências da Natureza e suas Tecnologias (Química, Física e Biologia)\u003c/li\u003e\u003cli\u003eLinguagens, Códigos e suas Tecnologias (Língua Portuguesa, Literatura, Língua Estrangeira – Inglês ou Espanhol – e Artes)\u003c/li\u003e\u003cli\u003eMatemática e suas Tecnologias\u003c/li\u003e\u003c/ul\u003e\u003cp\u003eCada uma dessas quatro áreas tem \u003cstrong\u003e45 questões, totalizando 180\u003c/strong\u003e. Há, ainda, uma redação, que deve ser do tipo dissertativo-argumentativa.\u003c/p\u003e \u003cp\u003eO Enem usa um sistema de correção de prova chamado Teoria de Resposta ao Item (TRI), que leva em conta o nível de dificuldade de cada questão e o padrão de acertos de cada participante.\u003c/p\u003e \u003cp\u003eA \u003cstrong\u003eredação é corrigida manualmente\u003c/strong\u003e, uma a uma, por avaliadores certificados. Cada texto é submetido a dois especialistas diferentes, que não têm contato um com o outro.\u003c/p\u003e"]},{"order":2,"title":"O que é TRI - Teoria da Resposta ao Item - e como ela funciona?","lines":["\u003cp\u003eVocê provavelmente já viu casos em que dois candidatos acertaram o mesmo número de questões do Enem e tiveram notas diferentes, certo? Isso acontece devido ao TRI, o algoritmo escolhido pelo Enem para corrigir e dar a nota final da prova de múltipla escolha.\u003c/p\u003e\u003cp\u003eEm todas as edições do Enem, as questões são pré-calibradas em níveis FÁCIL – MÉDIO – DIFÍCIL para que o algoritmo consiga ver pelo seu padrão de acertos se há coerência na questão.\u003c/p\u003e\u003cp\u003eSe ele identifica que um candidato acertou a questão difícil, mas errou a fácil e a média, automaticamente entende que a pessoa chutou e, por isso, receberá uma nota menor.\u003c/p\u003e"]},{"order":3,"title":"Terá Enem Digital em 2023?","lines":["\u003cp\u003eNão, a partir de 2023 haverá apenas a prova impressa.\u003c/p\u003e"]},{"order":4,"title":"Como entrar na página do participante do Enem?","lines":["\u003cp\u003eÉ muito fácil acessar a Página do Participante do Enem! Basta acessar \u003ca href=\"https://enem.inep.gov.br/participante/#!/\" target=\"_blank\"\u003ehttps://enem.inep.gov.br/participante/#!/\u003c/a\u003e.\u003c/p\u003e\u003cp\u003eNesta página, o candidato pode verificar todas as suas informações referentes ao Enem, como dados cadastrais, data e local de prova, ficha de inscrição, gabarito e nota final. Por isso mesmo, é fundamental saber a sua senha de acesso, que deve ser digitada junto com o CPF.\u003c/p\u003e"]},{"order":5,"title":"O que estudar para o Enem 2023?","lines":["\u003cp\u003eAs provas do Enem são separadas por áreas de conhecimento. São elas:\u003c/p\u003e \u003cul\u003e \u003cli\u003eCiências da Natureza: Biologia, Química e Física;\u003c/li\u003e \u003cli\u003eCiências Humanas: História, Geografia, Filosofia e Sociologia;\u003c/li\u003e \u003cli\u003eLinguagens, Códigos e suas Tecnologias: Português, Literatura, Língua Estrangeira, Artes, Educação Física e Tecnologias da Informação e Comunicação;\u003c/li\u003e \u003cli\u003eMatemática e suas tecnologias;\u003c/li\u003e \u003cli\u003eRedação.\u003c/li\u003e \u003c/ul\u003e \u003cp\u003eConfira em nosso blog os \u003ca href=\"https://descomplica.com.br/blog/assuntos-que-mais-caem-no-enem/\" target=\"_blank\"\u003eassuntos que mais caem no Enem\u003c/a\u003e e se prepare para a prova!"]},{"order":6,"title":"Como estudar para o Enem 2023?","lines":["\u003cp\u003eSeja estudando sozinho ou com acompanhamento de um cursinho pré-vestibular, a preparação para o Enem exige foco e dedicação. Se você tem dúvidas sobre como estudar para o Enem 2023, vale a pena acompanhar essas dicas e se preparar!\u003c/p\u003e \u003cul\u003e \u003cli\u003eMonte um cronograma de estudos;\u003c/li\u003e \u003cli\u003eEscolha um ambiente calmo para estudar;\u003c/li\u003e \u003cli\u003eFaça simulados para o Enem;\u003c/li\u003e \u003cli\u003ePratique a redação: leia bastante e informe-se sobre temas atuais. Esse conhecimento é essencial para uma boa redação.\u003c/li\u003e \u003cli\u003eCuide da saúde: é preciso reservar um tempo para descansar e ter momentos de lazer.\u003c/li\u003e \u003c/ul\u003e"]},{"order":7,"title":"Como se preparar para o Enem?","lines":["\u003cp\u003eVai fazer o Enem e não sabe como se preparar? O que acha de investir em um cursinho pré vestibular?\u003c/p\u003e\u003cp\u003eNo cursinho preparatório da Descomplica você assiste aulas de professores incríveis e capacitados, participa de tira dúvidas ao vivo, tem suas redações corrigidas, recebe exercícios e resumão pra mandar bem na prova e muito mais.\u003c/p\u003e\u003cp\u003eAh, além de tudo, você ainda pode criar um cronograma personalizado para estudar de acordo com a sua rotina!\u003c/p\u003e\u003cp\u003eOutra dica é fazer \u003ca href=\"https://simulado.descomplica.com.br/\" target=\"_blank\"\u003esimulados do Enem\u003c/a\u003e. Quando você faz provas antigas, entende a estrutura do exame e consegue dividir melhor o tempo no dia do exame\u003c/p\u003e"]},{"order":8,"title":"Qual é o melhor curso preparatório para o Enem?","lines":["\u003cp\u003eO melhor cursinho para o Enem é aquele que dá flexibilidade para o aluno estudar de acordo com a sua rotina e objetivos, que conta com professores capacitados e que tenham aulas dinâmicas.\u003c/p\u003e\u003cp\u003eA Descomplica, por exemplo, tem planos super flexíveis de cursinho preparatório para o Enem. As aulas são online e podem ser acessadas a qualquer momento. Além disso, os professores são incríveis e você pode criar seu cronograma de estudos personalizado.\u003c/p\u003e\u003cp\u003eQuer mais? A Descomplica também conta com encontros ao vivo para os alunos tirarem dúvidas, conteúdo extra pra dar um gás, correção de redação, simulado enem e muito mais.\u003c/p\u003e"]},{"order":9,"title":"Qual o cronograma do Enem 2023?","lines":["\u003cp\u003eÉ importante estar de olho nas datas do Enem. Confira o calendário de 2023 abaixo:\u003c/p\u003e\u003cul\u003e\u003cli\u003eInscrições: 5 a 16 de junho;\u003c/li\u003e\u003cli\u003eAtendimento especializado e tratamento pelo nome social: 5 a 16 de junho;\u003c/li\u003e\u003cli\u003eProvas: 05 e 12 de novembro;\u003c/li\u003e\u003cli\u003eGabaritos: 24 de novembro;\u003c/li\u003e\u003cli\u003eResultados: 16 de janeiro de 2024.\u003c/li\u003e\u003c/ul\u003e"]},{"order":10,"title":"Quem pode fazer o Enem 2023?","lines":["\u003cp\u003eQualquer pessoa que esteja no Ensino Médio ou já tenha concluído essa formação pode prestar o Enem 2023.\u003c/p\u003e\u003cp\u003ePessoas com deficiência física e/ou mental podem fazer o Enem, com direito a solicitar atendimento especializado nos seguintes casos: \u003cul\u003e\u003cli\u003eBaixa visão\u003c/li\u003e\u003cli\u003eCegueira\u003c/li\u003e\u003cli\u003eVisão monocular\u003c/li\u003e\u003cli\u003eDeficiência física\u003c/li\u003e\u003cli\u003eDeficiência auditiva\u003c/li\u003e\u003cli\u003eSurdez\u003c/li\u003e\u003cli\u003eDeficiência intelectual (mental)\u003c/li\u003e\u003cli\u003eSurdocegueira\u003c/li\u003e\u003cli\u003eDislexia\u003c/li\u003e\u003cli\u003eDéficit de atenção\u003c/li\u003e\u003cli\u003eAutismo\u003c/li\u003e\u003cli\u003eDiscalculia\u003c/li\u003e\u003c/ul\u003e\u003cp\u003eO candidato deve fazer o requerimento de atendimento especializado quando se inscrever, informando sua condição."]},{"order":11,"title":"Como funciona a correção das provas do ENEM?","lines":["\u003cp\u003eA correção das \u003ca href=\"https://descomplica.com.br/gabarito-enem/\" target=\"_blank\"\u003eprovas do Enem\u003c/a\u003e é realizada através de um sistema chamado Teoria de Resposta ao Item (TRI). Esse método leva em consideração não apenas o número de respostas corretas, mas também a coerência das respostas em relação ao padrão de acertos esperado para cada questão. Dessa forma, o desempenho do candidato é avaliado de forma mais precisa e justa, considerando a dificuldade das questões e o nível de conhecimento demonstrado.\u003c/p\u003e"]}]}},{"order":7,"props":{"reactName":"Footer","footerVariation":""}},{"order":5,"props":{"reactName":"TestimonialsV3","backgroundColor":"#00E88F","isMedVariation":true,"title":"Olha só quem já passou com a gente","subtitle":"","buttonLabel":"Quero ficar pronto","action":"#planos","buttonActionColor":"#FFCC00","buttonActionTextColor":"#000000","items":[{"order":0,"personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg","personName":"Denivaldo Guedes Vulcão","personCourse":"Medicina - UEPA e UFPA","testimony":"Estudei usando a plataforma do Descomplica durante dois anos.\u003cbr/\u003e\u003cbr/\u003eLembro-me com muito carinho de todos os professores que me ajudaram, mesmo sabendo que eu era um completo desconhecido para eles rs.\u003cbr /\u003e\u003cbr /\u003eEnfim, não logrei êxito facilmente, mas graças às aulas dos queridíssimos professores pude passar em Medicina tanto na UFPA quanto na UEPA. Sinto-me na obrigação de agradecer, de forma sincera, por todo o apoio e por todo carinho transmitido por vcs a nós estudantes. \u003cbr /\u003e\u003cbr /\u003eSeguirei essa nova caminhada em minha vida, mas guardarei na memória as brincadeiras, as aulas e todo o incentivo dado por vcs. Essa é uma parte feliz da minha história, da qual o Descomplica faz parte. Amo-os.","buttonText":"Ler mais"},{"order":1,"personCourse":"Medicina - UFRJ","personName":"Samyra e Sarah Silva Aramuni Gonçalves","testimony":"Usamos apenas a plataforma Descomplica e conseguimos nossa aprovação em Medicina na UFRJ!\u003cbr/\u003e\u003cbr/\u003e Na Descomplica você aprende muito mais do que conteúdo, você aprende a pensar! \u003cbr/\u003e\u003cbr/\u003eAulas (nada) a distância.","personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg"},{"order":2,"personName":"Paulo J. Praxedes de Oliveira","personCourse":"Medicina - UFS","testimony":"Sou do interior do RN (Caraúbas). De Escola Pública. Ex-aluno do IFRN Apodi. Minha mãe é doméstica e meu pai churrasqueiro. \u003cbr/\u003e\u003cbr/\u003eEu estudei na Descomplica desde 2019. Em 2021 tive que ir trabalhar como garçom pra pagar meu cursinho e ajudar na internet pq as coisas apertaram lá em casa.\u003cbr /\u003e\u003cbr /\u003eMe levantava às 7, estudava das 8:00 às 22:00, de março a novembro, e trabalhava sexta, sábado e domingo como garçom das 3 da tarde às 10 da noite. Nesses dias, quando eu chegava, estudava das 8 da manhã às 3 da tarde. E das 10 da noite às 12:00.\u003cbr /\u003e\u003cbr /\u003eDesde 2017, quando saí do IFRN, eu admirava a profissão de médico e a possibilidade de ajudar as pessoas através da medicina. Mas eu achava um sonho impossível, então eu nem cogitei. Nessa época passei pra arquitetura na UFERSA Pau dos Ferros. Cursei um ano e meio. Mas vi que não era aquilo que eu queria. \u003cbr /\u003e\u003cbr /\u003eEntão em 2019 eu voltei pra casa e comecei a estudar pra Medicina. Escolhi medicina pq vejo nessa profissão uma possibilidade de ajudar as pessoas, minha família.","buttonText":"Ler mais","personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg"}],"personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg"}},{"order":4,"props":{"reactName":"AboutOurTeachers","backgroundColor":"#ffffff","textColor":"#000000","title":"Nossos superprofessores a um play de distância","subtitle":"","buttonText":"Quero ficar pronto","buttonAction":"#planos","buttonColor":"#FFCC00","buttonTextColor":"#000000","firstBatch":"","scdBatch":"","thirdBatch":"","isMedicine":"","items":[{"order":0,"teacherSubject":"Biologia","teacherName":"Rubens Oda","teacherDescription":"Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/616bd530-1873-4d49-ab14-76f2fef3a426-prof-1.png"},{"order":1,"teacherSubject":"Filosofia","teacherDescription":"Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!","teacherName":"Lara Rocha","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/fc42da87-07cf-4d42-8f2d-9f36b6f90d53-prof-2.png"},{"order":2,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/53d6d84f-6991-40f4-8b48-5c5911e60e39-prof-3.png","teacherSubject":"História","teacherName":"Renato Pellizzari","teacherDescription":"Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v."},{"order":3,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/b6d54638-f323-4df2-8128-f25ab9fcb80a-prof-4.png","teacherSubject":"Geografia","teacherName":"Claudio Hansen","teacherDescription":"Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem."},{"order":4,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2736c6ec-a23a-4dd4-8806-2d90f9bc0acc-prof-5.png","teacherName":"Natasha Piedras","teacherSubject":"História","teacherDescription":"A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF)."},{"order":5,"teacherSubject":"Literatura","teacherName":"Amara Moira","teacherDescription":"Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6c2dd5dd-7da0-42cc-9edd-ac38d5c95167-prof-6.png"},{"order":6,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/1c900857-0ae4-4b78-a6e7-52c9fcb1191b-prof-8.png","teacherDescription":"Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia.","teacherSubject":"Sociologia","teacherName":"Débora Andrade"}],"teacherSubject":"Biologia,Filosofia,História,Geografia,História,Literatura,Sociologia","teacherName":"Rubens Oda,Lara Rocha,Renato Pellizzari,Claudio Hansen,Natasha Piedras,Amara Moira,Débora Andrade","teacherDescription":"Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.,Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!,Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v.,Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem.,A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF).,Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.,Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia."}},{"order":3,"props":{"reactName":"Banner","title":"\u003cstrong\u003eÉ cliente TIM?\u003c/strong\u003e Escolha um plano e estude para o Enem sem gastar sua internet.","subtitle":"","cta":"Ver planos","link":"https://descomplica.com.br/cursinho-gratuito-tim/","bannerImage":"","bannerMobileImage":""}},{"order":0,"props":{"reactName":"HeroDescontos","backgroundColor":"#00e88f","firstBatch":"","scdBatch":"","thirdBatch":"","sectionTitle":"Cursinho e Pré-vestibular Enem","auxiliarText":"","title":"Bora treinar? Preparação para o Enem 2023 e 2024","subtitle":"Comprando o \u003cstrong\u003eDesco Top ou Desco Top Medicina + Intensivo\u003c/strong\u003e você leva mais 3 meses de acesso grátis","promocodeText":"","couponsListTitle":"","textWhatsApp":"Aproveite a oferta!","textTwitter":"Nov 3, 2023 23:59:59","redirectText":"","redirectUrl":"","isMedicine":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/823f3ddd-d002-4dae-8312-6b02c1bc6ece-desktop-Imagem-Hero-UEE.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/25446807-262c-4fcd-bc70-c261c5e8f2df-mobile-Imagem-Hero-UEE.png","offers":[{"order":0,"_id":"5b898ecd6a68460dddd57466","name":"VESTIBULARES ENEM","slug":"vestibulares-enem-semanal","period":"1","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Raio-X de provas da Fuvest, Unicamp, Uerj e Uneb"],"pricingPlanId":"100033","__typename":"Plan","checkoutCupom":"MTQ2MzE4MDU0NDQ%3D\u0026channel=wcenem\u0026th=a","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica Top","checkouldOldPrice":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","subtitle":"","installmentPrice":"22.90","lastPrice":"49.80","linkLabel":"Assinar Desco Top","checkoutDiscPlan":"MTQ2MzI3NzMxNTY%3D\u0026channel=wcenem\u0026th=a","checkoutDiscPrice":"29,90","checkoutOldPrice":"+12x R$7"}]}},{"order":1,"props":{"reactName":"Differentials","backgroundColor":"","isRainbowDifferentials":"","isVariation":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/e2613934-2601-44a0-bd35-e59b68b890a2-Imagem-apostila---desktop.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/ad4ed7fe-0a76-42ab-bc19-f22103bbe985-Imagem-apostila---mobile.png","mainTitle":"Bora treinar com a apostila Direto ao Ponto","mainText":"Estude os top 5 conteúdos, por disciplina, que mais caíram no Enem, com o nível médio de dificuldade das questões e seus respectivos gabaritos comentados.\u003c/br\u003e*Inclusa apenas no plano Intensivão 3 meses para o Enem.","buttonText":"","buttonAction":"","buttonColor":"","buttonTextColor":"","items":[{"order":0,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"\u003cli\u003eTira-dúvidas ilimitado ao vivo\u003c/li\u003e\u003cli\u003eAcesso à biblioteca com +15mil vídeos\u003c/li\u003e\u003cli\u003eExercícios e material de apoio\u003c/li\u003e\u003cli\u003eApoio pro bem-estar e saúde mental\u003c/li\u003e","title":"Incluso nos outros planos:"},{"order":1,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"Assista às superaulas onde e quando quiser, a Desco se adapta à sua rotina.","title":"Plano de estudos no seu tempo e do seu jeito"},{"order":2,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"Nada de ficar perdido ou atrasar, use o nosso Guia pra te ajudar a organizar e planejar seus estudos.","title":"Incluso: Guia do\u003c/br\u003eEstudo Perfeito"}],"ranking":[],"photo":""}},{"order":2,"props":{"reactName":"OffersWithToggle","backgroundColor":"","title":"Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares","subtitle":"Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara","isHeroBigNumbers":"","hasCountdown":"","activeCountdownLabel":"","countdownLabel":"","hasBannerClaro":"","isVariation":"","isLPMedicine":"","isCroctEnabledOffers":"","offers":[{"order":0,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["(adicionar caso tenha toggle)","Apostila digital Direto ao Ponto","2 correções de redação por mês","Plano de Estudos fixo personalizado\u003c/br\u003epara a reta final","Exercícios online","Aulas ao vivo de Atualidades","Material de apoio","Testes de verificação","Simulados"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"6 meses de acesso","fullPrice":214.8,"discount":0.18,"title":"Intensivão 3 meses para o Enem","installmentPrice":"17.90","lastPrice":"21.90","btnLabel":"Assinar Intensivão","formerPriceWithoutPromo":"De \u003cs\u003e12x R$21,90\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzAzNTM5MzY%3D\u0026channel=wcenem\u0026th=a","isInstallmentToShowOffer":"","planContractWithPromo":"","checkoutFullPriceWithPromo":"","timeOfAccessWithPromo":""},{"order":1,"_id":"5de8f4ebb0eb62363be07d0a","name":"MEDICINA COMPLETO 2020","slug":"medicina-completo-2020","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","\u003cspan\u003eTira-dúvidas extra (Red, Bio, Quím e Fís)\u003c/span\u003e","\u003cspan\u003eTrilha de Especialidades Médicas\u003c/span\u003e"],"pricingPlanId":"101568","__typename":"Plan","promocode":"","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica\u003c/br\u003eTop","subtitle":"","installmentPrice":"22.90","lastPrice":"49.80","btnLabel":"Assinar Desco Top","formerPriceWithoutPromo":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","isInstallmentToShowOffer":"","isRecomended":"","checkoutPromocodeWithPromo":"?planId=MTQ2MzE4MDU0NDQ%3D\u0026channel=wcenem\u0026th=a","planContractWithPromo":"?planId=MTQ2MzI3NzMxNTY%3D\u0026channel=wcenem\u0026th=a","checkoutFullPriceWithPromo":"29,90","timeOfAccessWithPromo":"+12x R$7","link":""},{"order":2,"_id":"5e68cf1a1aae980008463e3d","name":"COMBO DESCOMPLICA TOP + RESUMÃO 2020","slug":"combo-descomplica-top-resumao-2020","period":"3","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","10 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","Tira-dúvidas extra (Red, Bio, Quím e Fís)","Trilha de Especialidades Médicas"],"pricingPlanId":"101958","__typename":"Plan","lastPrice":"59.80","fullPrice":334.8,"discount":0.53,"btnLabel":"Assinar Desco Top Medicina","installmentPrice":"27.90","checkoutPromocodeWithPromo":"?planId=MTQ2MzIyODkyOTY%3D\u0026channel=wcenem\u0026th=a","isRecomended":"o mais completo","timeOfAccessOffer":"12 meses de acesso","title":"Descomplica\u003c/br\u003eTop Medicina","formerPriceWithoutPromo":"De \u003cs\u003e12x R$59,80\u003c/s\u003e por até","isInstallmentToShowOffer":"","planContractWithPromo":"?planId=MTQ2MzMyNTcwMjQ%3D\u0026channel=wcenem\u0026th=a","checkoutFullPriceWithPromo":"34,90","timeOfAccessWithPromo":"+12x R$7","subtitle":"","link":""}],"logoCard":""}}]}}},"page":"/landings/templates/Blackfriday2020","query":{"landing":{"id":"2118","name":"Enem Raiz","url":"/vestibulares/enem/","category":"Vestibulares","template":"Blackfriday2020","isABTest":false,"published":true,"seo":{"canonical":"https://descomplica.com.br/vestibulares/enem","title":"Cursinho Pré-vestibular da Descomplica | Invista no seu futuro","description":"Só conhecendo o cursinho Pré-vestibular da Descomplica para entender por que somos considerados o melhor cursinho Enem do Brasil. Confira e saiba mais!"},"components":[{"order":6,"props":{"reactName":"Faq","isVariation":"","faqTitle":"","faqSubtitle":"","items":[{"order":0,"title":"O que é o Enem e para que serve?","lines":["\u003cp\u003eO Exame Nacional do Ensino Médio (Enem) tem o objetivo de avaliar o desempenho de um estudante ao fim da escolaridade básica (Ensino Médio).\u003c/p\u003e\u003cp\u003eA nota tirada no Enem é utilizada como critério de seleção para os estudantes que pretendem concorrer a uma bolsa no Programa Universidade para Todos (\u003ca href=\"https://descomplica.com.br/tudo-sobre-enem/prouni/o-que-e-o-prouni/\" target=\"_blank\"\u003eProUni\u003c/a\u003e) ou no Sistema de Seleção Unificada (\u003ca href=\"https://descomplica.com.br/sisu/\" target=\"_blank\"\u003eSiSU\u003c/a\u003e).\u003c/p\u003e \u003cp\u003e Cerca de 500 universidades já usam o resultado do exame como critério de seleção para o ingresso no Ensino Superior, complementando ou substituindo o vestibular.\u003c/p\u003e"]},{"order":1,"title":"Como funciona o Enem?","lines":["\u003cp\u003eO Enem funciona da seguinte maneira:\u003c/p\u003e\u003cp\u003ePodem se inscrever no Enem todos os alunos que estejam cursando o Ensino Médio ou já o tenham concluído. Basta apenas se inscrever, pagar a taxa (caso não seja isento), comparecer ao local indicado no dia da prova e fazer o exame.\u003c/p\u003e\u003cp\u003eA prova do Enem é aplicada em \u003cstrong\u003edois domingos consecutivos\u003c/strong\u003e, geralmente nos meses de outubro e novembro. Ela aborda quatro áreas do conhecimento:\u003c/p\u003e\u003cul\u003e\u003cli\u003eCiências Humanas e suas Tecnologias (História, Geografia, Filosofia e Sociologia)\u003c/li\u003e\u003cli\u003eCiências da Natureza e suas Tecnologias (Química, Física e Biologia)\u003c/li\u003e\u003cli\u003eLinguagens, Códigos e suas Tecnologias (Língua Portuguesa, Literatura, Língua Estrangeira – Inglês ou Espanhol – e Artes)\u003c/li\u003e\u003cli\u003eMatemática e suas Tecnologias\u003c/li\u003e\u003c/ul\u003e\u003cp\u003eCada uma dessas quatro áreas tem \u003cstrong\u003e45 questões, totalizando 180\u003c/strong\u003e. Há, ainda, uma redação, que deve ser do tipo dissertativo-argumentativa.\u003c/p\u003e \u003cp\u003eO Enem usa um sistema de correção de prova chamado Teoria de Resposta ao Item (TRI), que leva em conta o nível de dificuldade de cada questão e o padrão de acertos de cada participante.\u003c/p\u003e \u003cp\u003eA \u003cstrong\u003eredação é corrigida manualmente\u003c/strong\u003e, uma a uma, por avaliadores certificados. Cada texto é submetido a dois especialistas diferentes, que não têm contato um com o outro.\u003c/p\u003e"]},{"order":2,"title":"O que é TRI - Teoria da Resposta ao Item - e como ela funciona?","lines":["\u003cp\u003eVocê provavelmente já viu casos em que dois candidatos acertaram o mesmo número de questões do Enem e tiveram notas diferentes, certo? Isso acontece devido ao TRI, o algoritmo escolhido pelo Enem para corrigir e dar a nota final da prova de múltipla escolha.\u003c/p\u003e\u003cp\u003eEm todas as edições do Enem, as questões são pré-calibradas em níveis FÁCIL – MÉDIO – DIFÍCIL para que o algoritmo consiga ver pelo seu padrão de acertos se há coerência na questão.\u003c/p\u003e\u003cp\u003eSe ele identifica que um candidato acertou a questão difícil, mas errou a fácil e a média, automaticamente entende que a pessoa chutou e, por isso, receberá uma nota menor.\u003c/p\u003e"]},{"order":3,"title":"Terá Enem Digital em 2023?","lines":["\u003cp\u003eNão, a partir de 2023 haverá apenas a prova impressa.\u003c/p\u003e"]},{"order":4,"title":"Como entrar na página do participante do Enem?","lines":["\u003cp\u003eÉ muito fácil acessar a Página do Participante do Enem! Basta acessar \u003ca href=\"https://enem.inep.gov.br/participante/#!/\" target=\"_blank\"\u003ehttps://enem.inep.gov.br/participante/#!/\u003c/a\u003e.\u003c/p\u003e\u003cp\u003eNesta página, o candidato pode verificar todas as suas informações referentes ao Enem, como dados cadastrais, data e local de prova, ficha de inscrição, gabarito e nota final. Por isso mesmo, é fundamental saber a sua senha de acesso, que deve ser digitada junto com o CPF.\u003c/p\u003e"]},{"order":5,"title":"O que estudar para o Enem 2023?","lines":["\u003cp\u003eAs provas do Enem são separadas por áreas de conhecimento. São elas:\u003c/p\u003e \u003cul\u003e \u003cli\u003eCiências da Natureza: Biologia, Química e Física;\u003c/li\u003e \u003cli\u003eCiências Humanas: História, Geografia, Filosofia e Sociologia;\u003c/li\u003e \u003cli\u003eLinguagens, Códigos e suas Tecnologias: Português, Literatura, Língua Estrangeira, Artes, Educação Física e Tecnologias da Informação e Comunicação;\u003c/li\u003e \u003cli\u003eMatemática e suas tecnologias;\u003c/li\u003e \u003cli\u003eRedação.\u003c/li\u003e \u003c/ul\u003e \u003cp\u003eConfira em nosso blog os \u003ca href=\"https://descomplica.com.br/blog/assuntos-que-mais-caem-no-enem/\" target=\"_blank\"\u003eassuntos que mais caem no Enem\u003c/a\u003e e se prepare para a prova!"]},{"order":6,"title":"Como estudar para o Enem 2023?","lines":["\u003cp\u003eSeja estudando sozinho ou com acompanhamento de um cursinho pré-vestibular, a preparação para o Enem exige foco e dedicação. Se você tem dúvidas sobre como estudar para o Enem 2023, vale a pena acompanhar essas dicas e se preparar!\u003c/p\u003e \u003cul\u003e \u003cli\u003eMonte um cronograma de estudos;\u003c/li\u003e \u003cli\u003eEscolha um ambiente calmo para estudar;\u003c/li\u003e \u003cli\u003eFaça simulados para o Enem;\u003c/li\u003e \u003cli\u003ePratique a redação: leia bastante e informe-se sobre temas atuais. Esse conhecimento é essencial para uma boa redação.\u003c/li\u003e \u003cli\u003eCuide da saúde: é preciso reservar um tempo para descansar e ter momentos de lazer.\u003c/li\u003e \u003c/ul\u003e"]},{"order":7,"title":"Como se preparar para o Enem?","lines":["\u003cp\u003eVai fazer o Enem e não sabe como se preparar? O que acha de investir em um cursinho pré vestibular?\u003c/p\u003e\u003cp\u003eNo cursinho preparatório da Descomplica você assiste aulas de professores incríveis e capacitados, participa de tira dúvidas ao vivo, tem suas redações corrigidas, recebe exercícios e resumão pra mandar bem na prova e muito mais.\u003c/p\u003e\u003cp\u003eAh, além de tudo, você ainda pode criar um cronograma personalizado para estudar de acordo com a sua rotina!\u003c/p\u003e\u003cp\u003eOutra dica é fazer \u003ca href=\"https://simulado.descomplica.com.br/\" target=\"_blank\"\u003esimulados do Enem\u003c/a\u003e. Quando você faz provas antigas, entende a estrutura do exame e consegue dividir melhor o tempo no dia do exame\u003c/p\u003e"]},{"order":8,"title":"Qual é o melhor curso preparatório para o Enem?","lines":["\u003cp\u003eO melhor cursinho para o Enem é aquele que dá flexibilidade para o aluno estudar de acordo com a sua rotina e objetivos, que conta com professores capacitados e que tenham aulas dinâmicas.\u003c/p\u003e\u003cp\u003eA Descomplica, por exemplo, tem planos super flexíveis de cursinho preparatório para o Enem. As aulas são online e podem ser acessadas a qualquer momento. Além disso, os professores são incríveis e você pode criar seu cronograma de estudos personalizado.\u003c/p\u003e\u003cp\u003eQuer mais? A Descomplica também conta com encontros ao vivo para os alunos tirarem dúvidas, conteúdo extra pra dar um gás, correção de redação, simulado enem e muito mais.\u003c/p\u003e"]},{"order":9,"title":"Qual o cronograma do Enem 2023?","lines":["\u003cp\u003eÉ importante estar de olho nas datas do Enem. Confira o calendário de 2023 abaixo:\u003c/p\u003e\u003cul\u003e\u003cli\u003eInscrições: 5 a 16 de junho;\u003c/li\u003e\u003cli\u003eAtendimento especializado e tratamento pelo nome social: 5 a 16 de junho;\u003c/li\u003e\u003cli\u003eProvas: 05 e 12 de novembro;\u003c/li\u003e\u003cli\u003eGabaritos: 24 de novembro;\u003c/li\u003e\u003cli\u003eResultados: 16 de janeiro de 2024.\u003c/li\u003e\u003c/ul\u003e"]},{"order":10,"title":"Quem pode fazer o Enem 2023?","lines":["\u003cp\u003eQualquer pessoa que esteja no Ensino Médio ou já tenha concluído essa formação pode prestar o Enem 2023.\u003c/p\u003e\u003cp\u003ePessoas com deficiência física e/ou mental podem fazer o Enem, com direito a solicitar atendimento especializado nos seguintes casos: \u003cul\u003e\u003cli\u003eBaixa visão\u003c/li\u003e\u003cli\u003eCegueira\u003c/li\u003e\u003cli\u003eVisão monocular\u003c/li\u003e\u003cli\u003eDeficiência física\u003c/li\u003e\u003cli\u003eDeficiência auditiva\u003c/li\u003e\u003cli\u003eSurdez\u003c/li\u003e\u003cli\u003eDeficiência intelectual (mental)\u003c/li\u003e\u003cli\u003eSurdocegueira\u003c/li\u003e\u003cli\u003eDislexia\u003c/li\u003e\u003cli\u003eDéficit de atenção\u003c/li\u003e\u003cli\u003eAutismo\u003c/li\u003e\u003cli\u003eDiscalculia\u003c/li\u003e\u003c/ul\u003e\u003cp\u003eO candidato deve fazer o requerimento de atendimento especializado quando se inscrever, informando sua condição."]},{"order":11,"title":"Como funciona a correção das provas do ENEM?","lines":["\u003cp\u003eA correção das \u003ca href=\"https://descomplica.com.br/gabarito-enem/\" target=\"_blank\"\u003eprovas do Enem\u003c/a\u003e é realizada através de um sistema chamado Teoria de Resposta ao Item (TRI). Esse método leva em consideração não apenas o número de respostas corretas, mas também a coerência das respostas em relação ao padrão de acertos esperado para cada questão. Dessa forma, o desempenho do candidato é avaliado de forma mais precisa e justa, considerando a dificuldade das questões e o nível de conhecimento demonstrado.\u003c/p\u003e"]}]}},{"order":7,"props":{"reactName":"Footer","footerVariation":""}},{"order":5,"props":{"reactName":"TestimonialsV3","backgroundColor":"#00E88F","isMedVariation":true,"title":"Olha só quem já passou com a gente","subtitle":"","buttonLabel":"Quero ficar pronto","action":"#planos","buttonActionColor":"#FFCC00","buttonActionTextColor":"#000000","items":[{"order":0,"personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg","personName":"Denivaldo Guedes Vulcão","personCourse":"Medicina - UEPA e UFPA","testimony":"Estudei usando a plataforma do Descomplica durante dois anos.\u003cbr/\u003e\u003cbr/\u003eLembro-me com muito carinho de todos os professores que me ajudaram, mesmo sabendo que eu era um completo desconhecido para eles rs.\u003cbr /\u003e\u003cbr /\u003eEnfim, não logrei êxito facilmente, mas graças às aulas dos queridíssimos professores pude passar em Medicina tanto na UFPA quanto na UEPA. Sinto-me na obrigação de agradecer, de forma sincera, por todo o apoio e por todo carinho transmitido por vcs a nós estudantes. \u003cbr /\u003e\u003cbr /\u003eSeguirei essa nova caminhada em minha vida, mas guardarei na memória as brincadeiras, as aulas e todo o incentivo dado por vcs. Essa é uma parte feliz da minha história, da qual o Descomplica faz parte. Amo-os.","buttonText":"Ler mais"},{"order":1,"personCourse":"Medicina - UFRJ","personName":"Samyra e Sarah Silva Aramuni Gonçalves","testimony":"Usamos apenas a plataforma Descomplica e conseguimos nossa aprovação em Medicina na UFRJ!\u003cbr/\u003e\u003cbr/\u003e Na Descomplica você aprende muito mais do que conteúdo, você aprende a pensar! \u003cbr/\u003e\u003cbr/\u003eAulas (nada) a distância.","personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg"},{"order":2,"personName":"Paulo J. Praxedes de Oliveira","personCourse":"Medicina - UFS","testimony":"Sou do interior do RN (Caraúbas). De Escola Pública. Ex-aluno do IFRN Apodi. Minha mãe é doméstica e meu pai churrasqueiro. \u003cbr/\u003e\u003cbr/\u003eEu estudei na Descomplica desde 2019. Em 2021 tive que ir trabalhar como garçom pra pagar meu cursinho e ajudar na internet pq as coisas apertaram lá em casa.\u003cbr /\u003e\u003cbr /\u003eMe levantava às 7, estudava das 8:00 às 22:00, de março a novembro, e trabalhava sexta, sábado e domingo como garçom das 3 da tarde às 10 da noite. Nesses dias, quando eu chegava, estudava das 8 da manhã às 3 da tarde. E das 10 da noite às 12:00.\u003cbr /\u003e\u003cbr /\u003eDesde 2017, quando saí do IFRN, eu admirava a profissão de médico e a possibilidade de ajudar as pessoas através da medicina. Mas eu achava um sonho impossível, então eu nem cogitei. Nessa época passei pra arquitetura na UFERSA Pau dos Ferros. Cursei um ano e meio. Mas vi que não era aquilo que eu queria. \u003cbr /\u003e\u003cbr /\u003eEntão em 2019 eu voltei pra casa e comecei a estudar pra Medicina. Escolhi medicina pq vejo nessa profissão uma possibilidade de ajudar as pessoas, minha família.","buttonText":"Ler mais","personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg"}],"personImage":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/74efccfd-3e37-4820-8d20-de7ca0cedc47-denis.jpg,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/680a1645-fe0c-4eb3-934c-5bc247bb30c7-samyra-sarah.jpg,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/464549c4-4a05-4fef-ad5a-de7cab22642e-paulo-josenberg.jpeg"}},{"order":4,"props":{"reactName":"AboutOurTeachers","backgroundColor":"#ffffff","textColor":"#000000","title":"Nossos superprofessores a um play de distância","subtitle":"","buttonText":"Quero ficar pronto","buttonAction":"#planos","buttonColor":"#FFCC00","buttonTextColor":"#000000","firstBatch":"","scdBatch":"","thirdBatch":"","isMedicine":"","items":[{"order":0,"teacherSubject":"Biologia","teacherName":"Rubens Oda","teacherDescription":"Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/616bd530-1873-4d49-ab14-76f2fef3a426-prof-1.png"},{"order":1,"teacherSubject":"Filosofia","teacherDescription":"Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!","teacherName":"Lara Rocha","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/fc42da87-07cf-4d42-8f2d-9f36b6f90d53-prof-2.png"},{"order":2,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/53d6d84f-6991-40f4-8b48-5c5911e60e39-prof-3.png","teacherSubject":"História","teacherName":"Renato Pellizzari","teacherDescription":"Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v."},{"order":3,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/b6d54638-f323-4df2-8128-f25ab9fcb80a-prof-4.png","teacherSubject":"Geografia","teacherName":"Claudio Hansen","teacherDescription":"Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem."},{"order":4,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2736c6ec-a23a-4dd4-8806-2d90f9bc0acc-prof-5.png","teacherName":"Natasha Piedras","teacherSubject":"História","teacherDescription":"A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF)."},{"order":5,"teacherSubject":"Literatura","teacherName":"Amara Moira","teacherDescription":"Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.","avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6c2dd5dd-7da0-42cc-9edd-ac38d5c95167-prof-6.png"},{"order":6,"avatar":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/1c900857-0ae4-4b78-a6e7-52c9fcb1191b-prof-8.png","teacherDescription":"Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia.","teacherSubject":"Sociologia","teacherName":"Débora Andrade"}],"teacherSubject":"Biologia,Filosofia,História,Geografia,História,Literatura,Sociologia","teacherName":"Rubens Oda,Lara Rocha,Renato Pellizzari,Claudio Hansen,Natasha Piedras,Amara Moira,Débora Andrade","teacherDescription":"Nosso querido Odinha é Licenciado em Biologia e Doutor em Ecologia (UFRJ). É o fundador oficial das olimpíadas brasileiras de Biologia e, não sei se tá na hora de te contar, mas ele VAI falar sobre cocô.,Apenas uma deusa com + de 10 anos de experiência na área da educação básica e cursos preparatórios. Profe de filosofia com metodologia própria. Por aqui, humanas é sinônimo de Lara Rocha!,Por falar em história, o Renato é o cara que viveu toda a nossa! Boatos de que foi o primeiro profe aqui da Desco, está há décadas em salas de aula e coordenando cursos preparatórios, sempre ligado no 220v.,Presidente do Brasil eleito pelos nossos alunos e autor do Hit “Sedimentos são”.   Não só é profe de Geografia e Atualidades na Desco, como também é nosso Gerente Pedagógico. Muitas qualidades para um homem.,A historiadora mais tatuada e com a voz mais serena que você vai conhecer, ela trabalha com ensino fundamental e emendou graduação, mestrado e douturado em História Social (UFF).,Impossível não amar! Amara é Doutora em Teoria Crítica e Literária (UNICAMP), palestrante, e autora de vários livros, em português e espanhol. Também escreve matérias incríveis para Buzzfeed e UOL.,Ela é a mamãe mais amada do Brasil! Graduada em Filosofia (UERJ). Ela vai fazer você entender tudinho de Filosofia e Sociologia."}},{"order":3,"props":{"reactName":"Banner","title":"\u003cstrong\u003eÉ cliente TIM?\u003c/strong\u003e Escolha um plano e estude para o Enem sem gastar sua internet.","subtitle":"","cta":"Ver planos","link":"https://descomplica.com.br/cursinho-gratuito-tim/","bannerImage":"","bannerMobileImage":""}},{"order":0,"props":{"reactName":"HeroDescontos","backgroundColor":"#00e88f","firstBatch":"","scdBatch":"","thirdBatch":"","sectionTitle":"Cursinho e Pré-vestibular Enem","auxiliarText":"","title":"Bora treinar? Preparação para o Enem 2023 e 2024","subtitle":"Comprando o \u003cstrong\u003eDesco Top ou Desco Top Medicina + Intensivo\u003c/strong\u003e você leva mais 3 meses de acesso grátis","promocodeText":"","couponsListTitle":"","textWhatsApp":"Aproveite a oferta!","textTwitter":"Nov 3, 2023 23:59:59","redirectText":"","redirectUrl":"","isMedicine":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/823f3ddd-d002-4dae-8312-6b02c1bc6ece-desktop-Imagem-Hero-UEE.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/25446807-262c-4fcd-bc70-c261c5e8f2df-mobile-Imagem-Hero-UEE.png","offers":[{"order":0,"_id":"5b898ecd6a68460dddd57466","name":"VESTIBULARES ENEM","slug":"vestibulares-enem-semanal","period":"1","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Raio-X de provas da Fuvest, Unicamp, Uerj e Uneb"],"pricingPlanId":"100033","__typename":"Plan","checkoutCupom":"MTQ2MzE4MDU0NDQ%3D\u0026channel=wcenem\u0026th=a","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica Top","checkouldOldPrice":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","subtitle":"","installmentPrice":"22.90","lastPrice":"49.80","linkLabel":"Assinar Desco Top","checkoutDiscPlan":"MTQ2MzI3NzMxNTY%3D\u0026channel=wcenem\u0026th=a","checkoutDiscPrice":"29,90","checkoutOldPrice":"+12x R$7"}]}},{"order":1,"props":{"reactName":"Differentials","backgroundColor":"","isRainbowDifferentials":"","isVariation":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/e2613934-2601-44a0-bd35-e59b68b890a2-Imagem-apostila---desktop.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/ad4ed7fe-0a76-42ab-bc19-f22103bbe985-Imagem-apostila---mobile.png","mainTitle":"Bora treinar com a apostila Direto ao Ponto","mainText":"Estude os top 5 conteúdos, por disciplina, que mais caíram no Enem, com o nível médio de dificuldade das questões e seus respectivos gabaritos comentados.\u003c/br\u003e*Inclusa apenas no plano Intensivão 3 meses para o Enem.","buttonText":"","buttonAction":"","buttonColor":"","buttonTextColor":"","items":[{"order":0,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"\u003cli\u003eTira-dúvidas ilimitado ao vivo\u003c/li\u003e\u003cli\u003eAcesso à biblioteca com +15mil vídeos\u003c/li\u003e\u003cli\u003eExercícios e material de apoio\u003c/li\u003e\u003cli\u003eApoio pro bem-estar e saúde mental\u003c/li\u003e","title":"Incluso nos outros planos:"},{"order":1,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"Assista às superaulas onde e quando quiser, a Desco se adapta à sua rotina.","title":"Plano de estudos no seu tempo e do seu jeito"},{"order":2,"fontColor":"#000000","backgroundColor":"#F5F5F5","subtitle":"Nada de ficar perdido ou atrasar, use o nosso Guia pra te ajudar a organizar e planejar seus estudos.","title":"Incluso: Guia do\u003c/br\u003eEstudo Perfeito"}],"ranking":[],"photo":""}},{"order":2,"props":{"reactName":"OffersWithToggle","backgroundColor":"","title":"Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares","subtitle":"Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara","isHeroBigNumbers":"","hasCountdown":"","activeCountdownLabel":"","countdownLabel":"","hasBannerClaro":"","isVariation":"","isLPMedicine":"","isCroctEnabledOffers":"","offers":[{"order":0,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["(adicionar caso tenha toggle)","Apostila digital Direto ao Ponto","2 correções de redação por mês","Plano de Estudos fixo personalizado\u003c/br\u003epara a reta final","Exercícios online","Aulas ao vivo de Atualidades","Material de apoio","Testes de verificação","Simulados"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"6 meses de acesso","fullPrice":214.8,"discount":0.18,"title":"Intensivão 3 meses para o Enem","installmentPrice":"17.90","lastPrice":"21.90","btnLabel":"Assinar Intensivão","formerPriceWithoutPromo":"De \u003cs\u003e12x R$21,90\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzAzNTM5MzY%3D\u0026channel=wcenem\u0026th=a","isInstallmentToShowOffer":"","planContractWithPromo":"","checkoutFullPriceWithPromo":"","timeOfAccessWithPromo":""},{"order":1,"_id":"5de8f4ebb0eb62363be07d0a","name":"MEDICINA COMPLETO 2020","slug":"medicina-completo-2020","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","\u003cspan\u003eTira-dúvidas extra (Red, Bio, Quím e Fís)\u003c/span\u003e","\u003cspan\u003eTrilha de Especialidades Médicas\u003c/span\u003e"],"pricingPlanId":"101568","__typename":"Plan","promocode":"","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica\u003c/br\u003eTop","subtitle":"","installmentPrice":"22.90","lastPrice":"49.80","btnLabel":"Assinar Desco Top","formerPriceWithoutPromo":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","isInstallmentToShowOffer":"","isRecomended":"","checkoutPromocodeWithPromo":"?planId=MTQ2MzE4MDU0NDQ%3D\u0026channel=wcenem\u0026th=a","planContractWithPromo":"?planId=MTQ2MzI3NzMxNTY%3D\u0026channel=wcenem\u0026th=a","checkoutFullPriceWithPromo":"29,90","timeOfAccessWithPromo":"+12x R$7","link":""},{"order":2,"_id":"5e68cf1a1aae980008463e3d","name":"COMBO DESCOMPLICA TOP + RESUMÃO 2020","slug":"combo-descomplica-top-resumao-2020","period":"3","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","10 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","Tira-dúvidas extra (Red, Bio, Quím e Fís)","Trilha de Especialidades Médicas"],"pricingPlanId":"101958","__typename":"Plan","lastPrice":"59.80","fullPrice":334.8,"discount":0.53,"btnLabel":"Assinar Desco Top Medicina","installmentPrice":"27.90","checkoutPromocodeWithPromo":"?planId=MTQ2MzIyODkyOTY%3D\u0026channel=wcenem\u0026th=a","isRecomended":"o mais completo","timeOfAccessOffer":"12 meses de acesso","title":"Descomplica\u003c/br\u003eTop Medicina","formerPriceWithoutPromo":"De \u003cs\u003e12x R$59,80\u003c/s\u003e por até","isInstallmentToShowOffer":"","planContractWithPromo":"?planId=MTQ2MzMyNTcwMjQ%3D\u0026channel=wcenem\u0026th=a","checkoutFullPriceWithPromo":"34,90","timeOfAccessWithPromo":"+12x R$7","subtitle":"","link":""}],"logoCard":""}}]}},"buildId":"i4yoEcc3anQQ-CmKePrcr","assetPrefix":"https://d3awytnmmfk53d.cloudfront.net/landings","isFallback":false,"customServer":true,"gip":true,"scriptLoader":[]}</script><noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-P3F4C85' height='0' width='0' style='display:none;visibility:hidden' /></noscript><script>window.fbAsyncInit = function() {
              FB.init({
                appId            : '149434698461737',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.10'
              });
              FB.AppEvents.logPageView();
            };
            (function(d, s, id){
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) {return;}
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/static/libs/jquery.min.js"></script><script charSet="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/v2.js"></script><script type="text/javascript" src="https://a.opmnstr.com/app/js/api.min.js" data-account="50142" data-user="43470" async=""></script><script> function clickGAEvent(category, action, label) {
                ga( 'create', 'UA-6492218-1' )
                ga('send', 'event', {
                  eventCategory: category,
                  eventAction: action,
                  eventLabel: label
                })
              }</script><script>!function(){
              var a=window.VL=window.VL||{};
              return a.instances=a.instances||{},a.invoked?void(window.console&&console.error&&console.error("VL snippet loaded twice.")):(a.invoked=!0,void(a.load=function(b,c,d){var e={};
              e.publicToken=b,e.config=c||{};
              var f=document.createElement("script");
              f.type="text/javascript",f.id="vrlps-js",f.defer=!0,f.src="https://app.viral-loops.com/client/vl/vl.min.js";
              var g=document.getElementsByTagName("script")[0];
              return g.parentNode.insertBefore(f,g),f.onload=function(){a.setup(e),a.instances[ b]=e},e.identify=e.identify||function(a,b){e.afterLoad={identify:{userData:a,cb:b}}},e.pendingEvents=[],e.track=e.track||function(a,b){e.pendingEvents.push({event:a,cb:b})},e.pendingHooks=[],e.addHook=e.addHook||function(a,b){e.pendingHooks.push({name:a,cb:b})},e.$=e.$||function(a){e.pendingHooks.push({name:"ready",cb:a})},e}))}();
              var campaign=VL.load("GaA1EtDBvEDVy8KPzyOEzYasJPQ",{autoLoadWidgets:!0});</script><script>(function(h,o,t,j,a,r){
              h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
              h._hjSettings={hjid:1501375,hjsv:6};
              a=o.getElementsByTagName('head')[0];
              r=o.createElement('script');r.async=1;
              r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
              a.appendChild(r);
          })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script></body></html>
	<?
$_SESSION['scriptcase']['pge_plane_catalog']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
       if ($this->Change_Menu)
       {
           $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
           $Arr_rastro = array();
           if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
           {
               foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
               {
                  $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
               }
               $ult_apl = count($Arr_rastro) - 1;
               unset($Arr_rastro[$ult_apl]);
               $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
           }
           else
           {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
           }
       }
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
<?php
       } 
       exit;
   } 
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('nila');
   $_SESSION['scriptcase']['pge_plane_catalog']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
            {
                $nmgp_var = substr($nmgp_var, 11);
                $nmgp_val = $_SESSION[$nmgp_val];
            }
            if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
            {
                $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_pge_plane_catalog($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
            {
                $nmgp_var = substr($nmgp_var, 11);
                $nmgp_val = $_SESSION[$nmgp_val];
            }
            if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
            {
                $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_pge_plane_catalog($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
   {
       $Sem_Session = false;
   }
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual)) {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
   }
   else {
       $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   $str_path_web    = $_SERVER['PHP_SELF'];
   $str_path_web    = str_replace("\\", '/', $str_path_web);
   $str_path_web    = str_replace('//', '/', $str_path_web);
   $path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
   $path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
   $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
   if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
       if (isset($_COOKIE['sc_apl_default_nila'])) {
           $apl_def = explode(",", $_COOKIE['sc_apl_default_nila']);
       }
       elseif (is_file($root . $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp'] . "/sc_apl_default_nila.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['pge_plane_catalog']['glo_nm_path_imag_temp'] . "/sc_apl_default_nila.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "pge_plane_catalog") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_nila'])) {
               $_SESSION['scriptcase']['pge_plane_catalog']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_nila'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "pge_plane_catalog";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'pge_plane_catalog' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('pge_plane_catalog' == $sReferer || 'pge_plane_catalog_' == substr($sReferer, 0, 18))
       {
           $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'pge_plane_catalog')
   {
       $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['pge_plane_catalog']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/pge_plane_catalog_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
       $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
       $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
       $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
       $todo  = explode("?@?", $todox);
       $ix = 0;
       while (!empty($todo[$ix]))
       {
            $cadapar = explode("?#?", $todo[$ix]);
            if (1 < sizeof($cadapar))
            {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                nm_limpa_str_pge_plane_catalog($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_pge_plane_catalog = new pge_plane_catalog_apl();
   $contr_pge_plane_catalog->controle();
//
   function nm_limpa_str_pge_plane_catalog(&$str)
   {
   }
?>
