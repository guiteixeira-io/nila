<?php
   include_once('pge_home_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['pge_home']['glo_nm_perfil']          = "";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_prod']       = "/scriptcase/prod";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_conf']       = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/conf";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_imagens']    = "/scriptcase/file/img";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp']  = "/scriptcase/tmp";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_cache']      = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/file/cache";
   $_SESSION['scriptcase']['pge_home']['glo_nm_path_doc']        = "C:/Program Files/NetMake/v9-php81/wwwroot/scriptcase/file/doc";
   $_SESSION['scriptcase']['pge_home']['glo_nm_conexao']         = "nila";
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
    if(empty($_SESSION['scriptcase']['pge_home']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['pge_home']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['pge_home']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['pge_home']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['pge_home']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['pge_home']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['pge_home']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['pge_home']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class pge_home_ini
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
      $_SESSION['sc_session'][$this->sc_page]['pge_home']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "pge_home"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "nila"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "pe_bronze"; 
      $this->nm_dt_criacao   = "20230904"; 
      $this->nm_hr_criacao   = "215358"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20230912"; 
      $this->nm_hr_ult_alt   = "172137"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0";
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
      $this->path_prod       = $_SESSION['scriptcase']['pge_home']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['pge_home']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['pge_home']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['pge_home']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['pge_home']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['pge_home']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['pge_home']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['pge_home']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "nila/nila";
      if (isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['sub_cons_schema_all']))
      { 
         $this->str_schema_all    = $_SESSION['sc_session'][$this->sc_page]['pge_home']['sub_cons_schema_all'];
         $this->str_schema_filter = $_SESSION['sc_session'][$this->sc_page]['pge_home']['sub_cons_schema_filter'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/pge_home';
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
      $_SESSION['sc_session'][$this->sc_page]['pge_home']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
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
      if (isset($_SESSION['scriptcase']['pge_home']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['pge_home']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['pge_home']['actual_lang']) || $_SESSION['scriptcase']['pge_home']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['pge_home']['actual_lang'] = $this->str_lang;
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
          include_once("pge_home_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
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
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["pge_home"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["pge_home"] as $sTmpTargetLink => $sTmpTargetWidget)
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
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info']['compact_mode'] = true;
        }
        if (isset($link_remove_margin) && 'ok' == $link_remove_margin) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info']['remove_margin'] = true;
        }
        if (isset($link_remove_border) && 'ok' == $link_remove_border) {
            if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'])) {
                $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info'] = array();
            }
            $_SESSION['sc_session'][$this->sc_page]['pge_home']['link_info']['remove_border'] = true;
        }

      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart']))
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart'] = array(
              'enabled' => false,
              'active'  => false,
          );
      }
      if ($_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart']['enabled'])
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart']['active'] = true;
      }
      elseif ($_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->sc_page]['pge_home']['dashboard_info']['maximized'])
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart']['active'] = true;
      }
      else
      {
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['responsive_chart']['active'] = false;
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']);
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
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['pge_home']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['pge_home']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan'])) 
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
      include_once($this->path_aplicacao . "pge_home_erro.class.php"); 
      $this->Erro = new pge_home_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('pge_home'); 
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
      if (isset($_SESSION['scriptcase']['pge_home']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['pge_home']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['pge_home']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['pge_home']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['pge_home']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['pge_home']['session_timeout']);
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
      $_SESSION['sc_session'][$this->sc_page]['pge_home']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['pge_home']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBwZ9XGHIrwHQJsDMvODkB/HEFYHMF7HQBsZ1FaHABYHQraDErKVkJGDuJeHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHEBUH5F/DoB/HQNmZSFUHIvsV5BqHuvmVcFKDWF/HIXGDcNmZSB/Z1BeHQJwDEBODkFeH5FYVoFGHQJKDQJwHAveD5JwHgrYDkBODWJeVoX7D9BsH9B/Z1NOZMJwDMzGHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMrwDkFCDWXCDoF7DcJUZ1BOZ1BeV5XGDEBOZSXeV5FqVoB/HQXGH9FGHAveD5BOHuzGVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDMveHErCDWX7HMXGHQJKH9FUD1BeV5X7HuvmVcBUH5FqVoJwHQNmVIJsD1rKHQJwDEBODkFeH5FYVoFGHQJKDQFaZ1zGVWFaDMBYV9FeDur/VoBiHQBiZ1BOD1zGV5X7HgBOHENiHEXCHIFUHQNmZ9XGHIvsD5F7DMBYVcXKDurGVEX7DcNmZSBOHIBOV5X7HgBOHArsDWXCHIXGHQXODQFUDSvCV5FGHuNOVcFKHEFYVoBqDcBwH9BqHINKZMJwDMveVkJ3DuFaHIX7HQFYZSBiD1vOD5F7DMvODkBsDur/HMJeHQBiZSBODSvmV5X7DMveHEJqH5X/DoJeDcXGDQFaZ1zGD5F7DMBYVcB/DWJeHIX7HQBiZ1FGHIBOD5rqDEBOHEFiHEFqDoF7DcJUZSBiDSzGVWFaHgvOVcXKDWF/HIF7HQBsH9BqHINaV5X7HgNOHENiDWX7HMFGDcBiDQFaHIvsD5F7DMBOZSJqHEX/VoFGDcNmZkFGHAvCV5X7HgNKHErCV5FqHMJsHQNmDQFUDSzGV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSJGDWF/DoraD9NmDQJsHIrKV5raDMvmZSJqHEBmVoraHQXGZ1rqHAN7D5FaDMzGZSJGDWr/DoraD9XsDuBOHAveHuBiHuvmVcBODuFqDoraD9XOVIJwZ1BeHuXGDMzGHEJGH5F/HMBqDcJeDQX7DSrwD5JwDMrwDkFCDWBmVEFGHQFYZ1FaHArKV5XGDErKHErsDurmDoBqHQXGZSFGHIrwVWXGHuBYDkFCDWJeVoraD9BsH9FaD1vsD5FaDErKZSXeH5FYDoJeD9JKDQFGHAveVWJsHgvsDkBODWFaVoFGDcJUZkFUZ1BOD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkBODur/VoraD9XOH9FaD1rKD5BiHgvsHErCDWX7HMJsDcXGDQFaZ1rwHQFaDMrwV9FeDuX7HMraHQXOZkFGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOZSJqDWB3VEFGHQNmZkBiHAN7HQJwDEBODkFeH5FYVoFGHQJKDQBqDSzGVWBOHgrwVcBUHEFYVoB/D9BsZ1FGHIBeHQraHgvsHEFiH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeDWF/HMFUHQBiZSBqD1rwHQF7HgrKHArCV5XCHIF7DcJUDQB/D1veHuFGDMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
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
          if (!$_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan'])) 
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
              if (isset($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']) && $_SESSION['scriptcase']['pge_home']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['pge_home']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['pge_home']['glo_nm_perfil']) && $_SESSION['scriptcase']['pge_home']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['pge_home']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['pge_home']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['pge_home']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['pge_home']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['pge_home']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']))
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
      if (isset($_SESSION['scriptcase']['pge_home']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['pge_home']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['pge_home']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida_init']) 
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
          $_SESSION['sc_session'][$this->sc_page]['pge_home']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan'])) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['pge_home']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['pge_home']['glo_nm_conexao'], $this->root . $this->path_prod, 'nila', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida'])
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida']) || !$_SESSION['sc_session'][$this->sc_page]['pge_home']['embutida'])
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['pge_home']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class pge_home_apl
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

      $this->Ini = new pge_home_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pge_home']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['pge_home']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pge_home']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pge_home'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_home']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_home']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('pge_home') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pge_home']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "pge_home")
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pge_home']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['pge_home']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['pge_home']['exit'];
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
      include_once($this->Ini->path_aplicacao . "pge_home_erro.class.php"); 
      $this->Erro      = new pge_home_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['pge_home']['contr_erro'] = 'on';
 ?>

<!DOCTYPE html><html lang="pt-br"><head><meta name="viewport" content="width=device-width"/><meta charSet="utf-8"/><style>.async-hide { opacity: 0 !important; }</style><script src="https://www.googleoptimize.com/optimize.js?id=OPT-KCZDMFS"></script><style>.async-hide { opacity: 0 !important; }</style><script src="https://www.googleoptimize.com/optimize.js?id=OPT-WDN3NGR"></script><link rel="canonical" href="https://descomplica.com.br/"/><title>Descomplica: Cursinho para Enem, Faculdade e Pós Digital</title><meta name="twitter:title" content="Descomplica: Cursinho para Enem, Faculdade e Pós Digital"/><meta name="twitter:description" content="Conheça a Descomplica: somos cursinho preparatório para o Enem, faculdade digital e pós-graduação digital. Visite o site Descomplica e fique por dentro!"/><meta name="twitter:image"/><meta property="og:url" content="https://descomplica.com.br/"/><meta name="description" content="Conheça a Descomplica: somos cursinho preparatório para o Enem, faculdade digital e pós-graduação digital. Visite o site Descomplica e fique por dentro!"/><meta name="twitter:image" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/thumb.png"/><meta itemProp="image" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/thumb.png"/><meta name="robots" content="index, follow"/><script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "CollegeOrUniversity",
            "name": "Descomplica",
            "url": "https://descomplica.com.br/",
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
        </script><script src="//cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js"></script><script async="" src="https://dnnsjdj5swfc3.cloudfront.net/web-components/web-components-3.0.1.js"></script><meta name="next-head-count" content="22"/><link rel="preconnect" href="https://d3awytnmmfk53d.cloudfront.net"/><link rel="preconnect" href="https://cdnjs.cloudflare.com"/><link rel="preconnect" href="https://dnnsjdj5swfc3.cloudfront.net"/><meta charSet="utf-8"/><meta http-equiv="Content-Language" content="pt-br"/><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/><meta name="google-site-verification" content="GrAzToPwW2Yy9t7OwAue4p405nD4jcKGxZyJlFVPRc8"/><meta name="google-site-verification" content="NohmsFMPzwPVX63DFNP-yBhnIuBGeV017Lq50qjoRgg"/><meta name="google-site-verification" content="M9lP2wjgLeEzfILe8l8zM-MMzDr70eo0pvpWZ0BzrHM"/><meta property="og:image:height" content="250"/><meta property="og:image:type" content="image/png"/><meta property="og:image:width" content="250"/><meta property="og:locale:alternate" content="pt"/><meta property="og:locale" content="pt_BR"/><meta property="og:site_name" content="Descomplica"/><meta property="og:type" content="website"/><meta property="fb:admins" content="163027370378546"/><meta property="fb:app_id" content="149434698461737"/><meta name="twitter:creator" content="@descomplica"/><meta name="twitter:site" content="@descomplica"/><meta name="twitter:app:name:iphone" content="Descomplica - Aulas e Cursinho Preparatório Enem"/><meta name="twitter:app:id:iphone" content="1068977518"/><meta name="twitter:app:url:iphone" content=""/><meta name="twitter:app:name:googleplay" content="Descomplica - Cursinho Enem 2017 &amp; Vestibulares"/><meta name="twitter:app:id:googleplay" content="br.com.descomplica.vod"/><meta name="twitter:app:url:googleplay" content="https://play.google.com/store/apps/details?id=br.com.descomplica.vod&amp;hl=pt"/><link rel="author" href="//plus.google.com/+descomplica/posts"/><link rel="publisher" href="//plus.google.com/+descomplica"/><link rel="apple-touch-icon" sizes="152x152" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-152x152.png"/><link rel="apple-touch-icon" sizes="144x144" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-144x144.png"/><link rel="apple-touch-icon" sizes="120x120" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-120x120.png"/><link rel="apple-touch-icon" sizes="114x114" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-114x114.png"/><link rel="apple-touch-icon" sizes="76x76" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-76x76.png"/><link rel="apple-touch-icon" sizes="72x72" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-72x72.png"/><link rel="apple-touch-icon" sizes="60x60" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-60x60.png"/><link rel="apple-touch-icon" sizes="57x57" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon-57x57.png"/><link rel="apple-touch-icon" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/apple-touch-icon.png"/><link rel="stylesheet" href="https://video-react.js.org/assets/video-react.css"/><meta name="msapplication-TileColor" content="#fff"/><meta name="msapplication-TileImage" content="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/ms-icon-144x144.png"/><meta name="facebook-domain-verification" content="4qcolhfstx5iblydrzgmt77d5ihrap"/><link rel="shortcut icon" href="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/favicon/favicon.png?"/><script type="text/javascript" src="https://app.viral-loops.com/widgetsV2/core/loader.js"></script><noscript data-n-css=""></noscript><script defer="" nomodule="" src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/polyfills-5cd94c89d3acac5f.js"></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/webpack-13f1e3ba960f9b84.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/framework-acb0798a477cdb8c.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/main-1a9cf7488d6c997b.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/pages/_app-bc46322325e05c63.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/237-2c6e85a71a0d1c6f.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8747-c3f35598acef851e.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/5301-0540a670c313ef44.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9278-85812cf2658f2995.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/7254-de350c6f17b788b3.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/9975-3f271d957e8208f8.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8875-c2dc47592c1cf0e7.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/3233-2c869684adede664.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/3986-98ad35a6dbdbc95c.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/2347-6eae7cbdf9123e71.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/8106-0ddcd592362dce59.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/1765-78f60173dfe13dd1.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/131-66dbd14063ed0c33.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/6870-1f2edbc0a714da24.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/3030-17332f7abcf40aac.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/chunks/pages/landings/templates/Multicategory-cd94258780523ec3.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_buildManifest.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_ssgManifest.js" defer=""></script><script src="https://d3awytnmmfk53d.cloudfront.net/landings/_next/static/i4yoEcc3anQQ-CmKePrcr/_middlewareManifest.js" defer=""></script><style data-styled="JEsFc   fiGRHA jTlEHV fjXCdW iAHngH hlthYH jwfQqC bhhBlK iFVpMn lgPjea lmWBXb VDEkP cnadUP hvYUEW iYZgdn dgMjQE krRjNg hjobBI kugxUC gGUTZb eEqIvX gFqaPs bDpHMd ViFAl cwkUdT dtJMnR dzRxrC UeMC fyekDO cUwAjA iLtmyY kjcvqA eHQqYw hSbTtJ hAhbrT cPShKn kySPWa kXxoyS dZXdsg kXMeAy hfhAvM dfWuiO izmCKD lbpFGB eEQfSU iXxPeu fvIDFO lfBujc dVVaQD bpgIBs gMjyGT hhfMzR eRThlw fyZdif dBLIQG bYbglm cRwFbV DxeGj ujLpf gwwMOF zvPNV eOkbRN heGgdQ gZQIWx efxogg kTTSKd hQeVYd kkTfMw jxSWxj kbaFjn cQBwIL bPrxcO bxLegQ dfYtUc cOMQgu ejaqTa ihtyHJ kjLlBL epKYZh kXUCIF jjAyaJ eNLjJi hlyPJh bBidyU flEWOM cxfqrk dtpOdf hLHnQk chDtZY gTkUPR iQORSg cSaesX eqLfpU eCsOTs gIGBcT idWVXq cJyBvx hkOacS eMOXek bJkMFq jeaxQn ldWAsK dJHgre ktHlvc bxhUVu kWFLat jZTNXK fpxJPC duVNTl EWztw czYjpW iDDyqz iLaiDY bjFwnM byovHs iXOzQw fQKnQb cwwjnH jXYoyY bsSYmi iieRqM gILVRA bkmIug ixpQzo WFmwN kyKmzI dvKbdi bEhNRI bdhLcP gGzOhs bToZjp cZYsgQ GaaNG kslFZL drSMye dvUBWS" data-styled-version="4.4.1">

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

.hlthYH{display:none;}

.cwkUdT{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:gray;width:100%;padding:2vh 5%;border-radius:60px;} .cwkUdT:hover{cursor:pointer;}

.dtJMnR{font-size:calc(0.382vw + 18.8px);font-family:AprovaSansBold;color:white;}

.fiGRHA{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1216px;padding:20px 0;margin:0 auto;position:relative;} @media (max-width:1256px){.fiGRHA{padding:20px 16px;}} @media(max-width:768px){.fiGRHA{padding:16px;margin-bottom:0;}}

.jTlEHV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/core/logo_verde.svg');background-repeat:no-repeat;background-size:contain;background-position:left center;width:127px;height:37px;z-index:1000;} @media(max-width:768px){.jTlEHV{width:77px;}} @media (max-width:680px){.jTlEHV{width:90px;}}

.fjXCdW{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:80%;} @media (max-width:768px){.fjXCdW{width:85%;}}

.iAHngH{cursor:pointer;list-style:none;} .iAHngH a{font-family:AprovaSans,sans-serif;font-size:18px;line-height:1.2;color:#333333;position:relative;-webkit-transition:color 0.1s,background-color 0.1s;transition:color 0.1s,background-color 0.1s;} .iAHngH a.cta-login{font-family:AprovaSans,sans-serif;border:2px solid #333333;border-radius:50px;padding:8px 16px;font-weight:bold;-webkit-transition:all .3s ease-in;transition:all .3s ease-in;z-index:1000;} .iAHngH a.cta-login:hover,.iAHngH a.cta-login:focus{background-color:#333333;color:#ffffff;} .iAHngH a.cta-scroll:before{content:'';display:block;position:absolute;top:100%;height:2px;width:100%;background-color:#333333;-webkit-transform-origin:center top;-ms-transform-origin:center top;transform-origin:center top;-webkit-transform:scale(0,1);-ms-transform:scale(0,1);transform:scale(0,1);-webkit-transition:color 0.1s,-webkit-transform 0.2s ease-out;-webkit-transition:color 0.1s,transform 0.2s ease-out;transition:color 0.1s,transform 0.2s ease-out;} .iAHngH a.cta-scroll:active::before{background-color:#333333;} .iAHngH a.cta-scroll:hover::before,.iAHngH a.cta-scroll:focus::before{-webkit-transform-origin:center top;-ms-transform-origin:center top;transform-origin:center top;-webkit-transform:scale(1,1);-ms-transform:scale(1,1);transform:scale(1,1);} @media (max-width:768px){.iAHngH a{font-size:14px;}} @media (max-width:680px){.iAHngH{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:100%;padding:16px 0;border-bottom:1px solid #ededed;}.iAHngH a{font-size:18px;text-align:center;}.iAHngH:last-child{padding-bottom:24px;}}

.hQeVYd{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:100%;background-color:#FED500;padding:16px 14px;border-radius:28px;-webkit-transition:all ease .5s;transition:all ease .5s;font-family:AprovaSans,sans-serif;font-size:18px;font-weight:bold;color:#333333;} .hQeVYd:hover{background-color:#faef6b;} @media (max-width:768px){.hQeVYd{width:100%;padding:16px 14px;}} @media (max-width:680px){.hQeVYd{100%;font-size:16px;}}

.eMOXek{width:100%;position:relative;cursor:pointer;border-bottom:1px solid #666666;}

.bJkMFq{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:100%;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out;padding:16px 0;}

.ldWAsK{-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);-webkit-transition:all 0.5s ease;transition:all 0.5s ease;}

.jeaxQn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:80%;height:80px;font-family:AprovaSans,sans-serif;font-size:20px;line-height:1.2;-webkit-letter-spacing:-0.6px;-moz-letter-spacing:-0.6px;-ms-letter-spacing:-0.6px;letter-spacing:-0.6px;color:#000000;}

.dJHgre{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:left;-webkit-box-align:left;-ms-flex-align:left;align-items:left;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out;width:100%;height:auto;max-height:0px;overflow:hidden;} @media(max-width:680px){.dJHgre{max-height:0px;word-break:break-word;}}

.ktHlvc{width:100%;height:auto;margin:10px 0 40px;font-family:AprovaSans;line-height:1.2;-webkit-letter-spacing:-0.4px;-moz-letter-spacing:-0.4px;-ms-letter-spacing:-0.4px;letter-spacing:-0.4px;font-size:18px;color:#000000;opacity:0.8;} @media (max-width:680px){.ktHlvc{font-size:16px;}}

.gIGBcT{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;background-color:#ffffff;padding:80px 0 0;} @media (max-width:768px){.gIGBcT{padding:80px 24px 0;}}

.idWVXq{width:100%;max-width:1184px;margin:0 auto;} @media (max-width:768px){.idWVXq{padding:24px;}} @media (max-width:768px){.idWVXq{padding:24px 16px;}}

.cJyBvx{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;text-align:left;font-family:AprovaSansBold,sans-serif;font-size:32px;line-height:1.2;-webkit-letter-spacing:-0.6px;-moz-letter-spacing:-0.6px;-ms-letter-spacing:-0.6px;letter-spacing:-0.6px;color:#000000;margin-bottom:48px;}

.hkOacS{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:100%;height:auto;}

.ujLpf{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:16px 0;width:100%;} @media (max-width:768px){.ujLpf{padding:16px;}} @media (max-width:680px){.ujLpf{padding:8px;}}

.gwwMOF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;border:2px solid #00E88F;background:#000000;background-size:cover;background-repeat:no-repeat;padding:52px 64px;border:2px solid #00E88F;border-radius:28px;max-width:1216px;width:100%;overflow:hidden;} @media (max-width:768px){.gwwMOF{padding:40px 56px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}} @media (max-width:680px){.gwwMOF{padding:24px 12px 30px;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}}

.zvPNV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;width:60%;z-index:9;} @media (max-width:768px){.zvPNV{width:100%;}}

.eOkbRN{font-family:AprovaSans,sans-serif;font-size:22px;font-weight:400;color:#ffffff;margin-bottom:5px;margin-top:20px;} @media (max-width:768px){.eOkbRN{font-size:18px;margin-top:8px;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start;}}

.heGgdQ{font-family:VanguardCF,sans-serif;font-size:68px;line-height:1;text-transform:uppercase;color:#ffffff;margin-bottom:30px;width:570px;} .heGgdQ span{color:#00E88F;} @media (max-width:768px){.heGgdQ{font-size:52px;width:380px;margin-bottom:30px;}} @media (max-width:680px){.heGgdQ{width:90%;font-size:44px;margin-bottom:24px;}}

.gZQIWx{font-family:AprovaSans,sans-serif;font-size:24px;font-weight:700;color:#ffffff;margin-bottom:24px;-webkit-letter-spacing:-.5px;-moz-letter-spacing:-.5px;-ms-letter-spacing:-.5px;letter-spacing:-.5px;} .gZQIWx span{color:#00E88F;font-family:AprovaSansBlack,sans-serif;font-weight:900;width:100%;} @media (max-width:768px){.gZQIWx{font-size:24px;width:270px;margin-bottom:40px;}} @media (max-width:680px){.gZQIWx{font-size:18px;margin-bottom:16px;width:100%;}}

.efxogg{font-family:AprovaSans,sans-serif;font-size:20px;line-height:1.2;color:#ffffff;margin-bottom:24px;} .efxogg ul{list-style-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/check.svg');display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;} .efxogg ul li{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;} .efxogg ul li:not(:last-child){margin-bottom:12px;} .efxogg span{color:#00E88F;} @media (max-width:768px){.efxogg{width:320px;margin-bottom:24px;padding-left:24px;}} @media (max-width:680px){.efxogg{font-size:18px;width:100%;margin-bottom:16px;padding-left:0;}.efxogg ul{list-style:none;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;}}

.kTTSKd{width:360px;} @media (max-width:768px){.kTTSKd{width:268px;margin-bottom:30px;}} @media (max-width:680px){.kTTSKd{width:100%;margin-bottom:24px;}}

.kkTfMw{background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/aa6d0972-de22-40bf-893e-f038f0a3e0e0-PG-Megaoferta-desktop.png');background-repeat:no-repeat;background-position:center;background-size:contain;width:40%;position:relative;} @media (max-width:768px){.kkTfMw{width:100%;margin:160px auto 0;width:90%;}} @media (max-width:680px){.kkTfMw{background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/27ddea47-2e8f-4d46-90e7-9a83ebef8496-PG-Megaoferta-mobile.png');width:90%;background-position:center center;background-size:contain;margin:16px auto 16px;height:264px;position:relative;}}

.jxSWxj{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:16px 0;width:100%;} @media (max-width:768px){.jxSWxj{padding:16px;}} @media (max-width:680px){.jxSWxj{padding:8px;}}

.kbaFjn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;overflow:hidden;position:relative;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;padding:48px 64px;border:2px solid #00E88F;border-radius:28px;max-width:1216px;width:100%;background:#000000;} @media (max-width:768px){.kbaFjn{padding:48px 32px;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;}} @media (max-width:680px){.kbaFjn{padding:24px 12px 16px;-webkit-flex-direction:column-reverse;-ms-flex-direction:column-reverse;flex-direction:column-reverse;}}

.bPrxcO{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:60%;text-align:right;} @media (max-width:768px){.bPrxcO{width:60%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}} @media (max-width:680px){.bPrxcO{width:100%;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;text-align:left;}}

.bxLegQ{font-family:AprovaSans,sans-serif;font-size:22px;font-weight:400;color:#ffffff;margin-bottom:5px;} @media (max-width:768px){.bxLegQ{font-size:18px;}}

.dfYtUc{font-family:VanguardCF,sans-serif;font-size:72px;line-height:1;text-transform:uppercase;color:#ffffff;margin-bottom:18px;} .dfYtUc strike{position:relative;-webkit-text-decoration:none;text-decoration:none;} .dfYtUc strike::after{content:'';position:absolute;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/Glitch.svg');background-repeat:no-repeat;background-position:center;background-size:contain;width:100%;height:100%;top:50%;left:50%;-webkit-transform:translate(-50%,-40%);-ms-transform:translate(-50%,-40%);transform:translate(-50%,-40%);} .dfYtUc span{color:#00E88F;} @media (max-width:768px){.dfYtUc{font-size:60px;margin-bottom:24px;width:100%;}} @media (max-width:680px){.dfYtUc{font-size:44px;}}

.cOMQgu{font-family:AprovaSans,sans-serif;font-size:24px;font-weight:700;color:#ffffff;margin-bottom:24px;-webkit-letter-spacing:-.5px;-moz-letter-spacing:-.5px;-ms-letter-spacing:-.5px;letter-spacing:-.5px;} .cOMQgu span{color:#00E88F;font-family:AprovaSansBlack,sans-serif;font-weight:900;width:100%;} @media (max-width:768px){.cOMQgu{margin-bottom:40px;font-size:24px;}} @media (max-width:680px){.cOMQgu{font-size:18px;width:100%;margin-bottom:16px;}}

.ejaqTa{font-family:AprovaSans,sans-serif;font-size:20px;line-height:1.2;color:#ffffff;margin-bottom:24px;} .ejaqTa ul{list-style-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/check.svg');display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;} .ejaqTa ul li{width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;} .ejaqTa ul li:not(:last-child){margin-bottom:12px;} .ejaqTa span{color:#00E88F;} @media (max-width:768px){.ejaqTa{width:320px;margin-bottom:24px;padding-left:24px;}} @media (max-width:680px){.ejaqTa{font-size:18px;width:100%;margin-bottom:16px;padding-left:0;}.ejaqTa ul{list-style:none;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;}}

.ihtyHJ{width:360px;} @media (max-width:768px){.ihtyHJ{width:80%;}} @media (max-width:680px){.ihtyHJ{width:100%;}}

.cQBwIL{background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/cbc4befe-e272-42ba-8002-533ba0f861fe-IMG-UG-JA-0409-desktop.png');background-repeat:no-repeat;background-position:center;background-size:contain;width:38%;position:relative;} .cQBwIL:after{content:'';position:absolute;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/0d2e5949-00ff-47de-ae23-76de143d4c0a-2012-11-05-fundo-transparente.webp');background-repeat:no-repeat;background-size:contain;width:128px;height:128px;top:32px;left:0;} @media (max-width:1256px){.cQBwIL{background-repeat:no-repeat;width:45%;background-size:contain;background-position:left;margin-bottom:-50px;}.cQBwIL:after{top:88px;left:0px;}} @media (max-width:680px){.cQBwIL{background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/76c00e63-5966-49c6-896a-ffca74a8a027-IMG-UG-JA-0409-mobile.png');width:90%;background-position:center center;margin:16px auto 16px;height:264px;position:relative;}.cQBwIL:after{width:80px;height:80px;top:auto;bottom:172px;left:0px;}}

.kjLlBL{position:relative;width:100%;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;min-height:500px;display:none;background:linear-gradient(90deg,#FF5353 0%,#00E88F 13%, #B059F3 40%,#FFD033 67%,#FF9342 83%,#FF5353 94%);border-radius:28px;max-width:1216px;} @media (max-width:768px){.kjLlBL{min-height:600px;width:calc(100% - 32px);}} @media (max-width:680px){.kjLlBL{min-height:420px;width:calc(100% - 16px);}}

.epKYZh{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;overflow:hidden;position:absolute;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;padding:48px 64px;color:#FFF;border-radius:28px;width:calc(100% - 6px);height:calc(100% - 6px);background-color:#000000;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);} @media (max-width:768px){.epKYZh{padding:48px 32px;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;}} @media (max-width:680px){.epKYZh{padding:24px 8px 16px;-webkit-flex-direction:column-reverse;-ms-flex-direction:column-reverse;flex-direction:column-reverse;}}

.kXUCIF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;width:55%;text-align:left;} @media (max-width:768px){.kXUCIF{width:55%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}} @media (max-width:680px){.kXUCIF{width:100%;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;text-align:left;}}

.jjAyaJ{font-family:AprovaSans,sans-serif;font-size:22px;color:#ffffff;margin-bottom:16px;font-weight:400;} @media (max-width:768px){.jjAyaJ{font-size:18px;}}

.eNLjJi{font-family:VanguardCF,sans-serif;font-size:80px;line-height:1;text-transform:uppercase;color:#ffffff;margin-bottom:38px;} @media (min-width:1000px){.eNLjJi br.hide-d{display:none;}} .eNLjJi span{color:#00E88F;} @media (max-width:768px){.eNLjJi{font-size:60px;margin-bottom:24px;width:100%;}} @media (max-width:680px){.eNLjJi{font-size:44px;}}

.hlyPJh{font-family:AprovaSans,sans-serif;font-size:20px;color:#ffffff;margin-bottom:24px;-webkit-letter-spacing:-.5px;-moz-letter-spacing:-.5px;-ms-letter-spacing:-.5px;letter-spacing:-.5px;} @media (max-width:768px){.hlyPJh{width:325px;margin-bottom:40px;}} @media (max-width:680px){.hlyPJh{font-size:18px;width:100%;margin-bottom:32px;}}

.bBidyU{width:360px;} @media (max-width:768px){.bBidyU{width:100%;}}

.flEWOM{background-image:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/pos-mandala-img-new.png);background-repeat:no-repeat;background-position:right bottom;background-size:contain;width:45%;} @media (max-width:768px){.flEWOM{width:40%;background-size:contain;background-repeat:no-repeat;background-position:right center;}} @media (max-width:680px){.flEWOM{background-image:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/pos-mandala-img-new.png);}}

.dBLIQG{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:16px 0;width:100%;} @media (max-width:768px){.dBLIQG{padding:16px;}} @media (max-width:680px){.dBLIQG{padding:8px;}}

.bYbglm{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;position:relative;background-color:#000000;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:48px 32px;border-radius:24px;max-width:1216px;width:100%;} @media (max-width:768px){.bYbglm{padding:48px 0;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}} @media (max-width:680px){.bYbglm{padding:48px 0 8px;}}

.cRwFbV{width:100%;text-align:center;margin-bottom:24px;} .cRwFbV h1,.cRwFbV h2{color:#ffffff;font-family:VanguardCF,sans-serif;font-size:88px;line-height:1;text-transform:uppercase;} .cRwFbV h1 strike,.cRwFbV h2 strike{position:relative;-webkit-text-decoration:none;text-decoration:none;} .cRwFbV h1 strike:after,.cRwFbV h2 strike:after{content:'';position:absolute;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/BannerRegulados/striked.png');background-size:cover;background-repeat:no-repeat;width:100%;height:41px;top:50%;left:0;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);} .cRwFbV h1 strong,.cRwFbV h2 strong{color:#00E88F;} @media (max-width:768px){.cRwFbV{width:500px;}.cRwFbV h1,.cRwFbV h2{font-size:72px;}} @media (max-width:680px){.cRwFbV{width:300px;}.cRwFbV h1,.cRwFbV h2{font-size:52px;margin:0 auto;}}

.DxeGj{color:#ffffff;width:780px;font-size:20px;line-height:1.2;text-align:center;margin-bottom:48px;} @media (max-width:768px){.DxeGj{width:75%;font-size:18px;}} @media (max-width:680px){.DxeGj{width:85%;}}

.cxfqrk{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:16px 0;width:100%;} .cxfqrk .slick-dots{list-style:none;text-align:center;bottom:-44px;} .cxfqrk .slick-dots li{display:inline-block;margin:0 8px 0 0;height:8px;width:8px;} .cxfqrk .slick-dots li button{background:#96999C;border-radius:50%;padding:0;cursor:pointer;display:block;height:8px !important;width:8px !important;} .cxfqrk .slick-dots li button:before{content:'';display:none;} .cxfqrk .slick-dots .slick-active button{background:#00E88F;} .cxfqrk .slick-list .slick-slide > div{padding:0 8px !important;} @media (max-width:768px){.cxfqrk{padding:0;}.cxfqrk .slick-track > div:first-child > div{padding-left:0 !important;}} @media (max-width:680px){.cxfqrk .slick-list .slick-slide > div{padding-right:0 !important;}}

.dtpOdf{display:grid;position:relative;grid-template-columns:1fr 1fr;gap:32px;background-color:#F2F2F3;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:28px;border-radius:24px;max-width:1216px;width:100%;} @media (max-width:768px){.dtpOdf{grid-template-columns:1fr;padding:0;padding-bottom:72px;background:none;}} @media (max-width:768px){.dtpOdf{padding:16px 0;}}

.hLHnQk{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;background-color:#000000;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:38px 64px;border:2px solid #00E88F;border-radius:24px;width:100%;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;} @media (min-width:1000px){.hLHnQk{min-height:478px;}} @media (max-width:768px){.hLHnQk{padding:44px 60px;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;min-height:473px;}} @media (max-width:680px){.hLHnQk{padding:30px 16px;min-height:394px;}}

.chDtZY{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;max-width:428px;width:100%;max-width:100%;} .chDtZY h3{margin-bottom:32px;} @media (max-width:680px){.chDtZY h3{margin-bottom:24px;}}

.cSaesX{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;max-width:554px;width:100%;max-width:100%;} @media (max-width:768px){.cSaesX{width:100%;}}

.gTkUPR{font-family:AprovaSans,sans-serif;font-size:22px;font-weight:400;color:#ffffff;margin-bottom:10px;} @media (max-width:680px){.gTkUPR{font-size:18px;}}

.iQORSg{font-family:VanguardCF,sans-serif;font-size:68px;line-height:1;text-transform:uppercase;color:#ffffff;} .iQORSg span.text-green{color:#00E88F;} @media (max-width:768px){.iQORSg{font-size:68px;}} @media (max-width:680px){.iQORSg{font-size:44px;}}

.eqLfpU{font-family:AprovaSans,sans-serif;font-size:20px;line-height:1.2;color:#ffffff;margin-bottom:32px;} .eqLfpU strong{font-family:AprovaSansBlack;} @media (max-width:768px){.eqLfpU{font-size:20px;margin-bottom:24px;}} @media (max-width:680px){.eqLfpU{font-size:18px;}}

.eCsOTs{width:360px;} @media (max-width:600px){.eCsOTs{width:100%;}}

.cPShKn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:#ffffff;padding:30px 22px;border-radius:24px;width:320px;margin:8px;} @media (max-width:680px){.cPShKn{padding:24px 15px;margin:8px 0px 20px;width:282px;overflow:visible;}}

.kySPWa{width:280px;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;font-family:AprovaSansBlack;font-size:28px;line-height:1;color:#111111;text-align:start;margin:10px 0;} @media(max-width:680px){.kySPWa{font-size:24px;margin:0;width:100%;}}.kXxoyS{width:280px;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;font-family:AprovaSansBlack;font-size:28px;line-height:1;color:#111111;text-align:center;margin:10px 0;} @media(max-width:680px){.kXxoyS{font-size:24px;margin:0;width:100%;}}

.dZXdsg{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}

.hfhAvM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;position:relative;}.dfWuiO{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;position:relative;}

.izmCKD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;}

.lbpFGB{font-family:AprovaSans;font-size:13px;line-height:18px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;color:#333333;margin-bottom:8px;} .lbpFGB span{font-weight:bold;} @media (max-width:680px){.lbpFGB{margin-bottom:0;font-size:12px;}}

.eEQfSU{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;font-family:AprovaSansBlack;font-size:38px;line-height:0.95;-webkit-letter-spacing:0.5px;-moz-letter-spacing:0.5px;-ms-letter-spacing:0.5px;letter-spacing:0.5px;color:#000000;} .eEQfSU span{top:0;font-size:20px;margin-right:5px;} @media (max-width:1000px){.eEQfSU{line-height:1.14;-webkit-letter-spacing:-1px;-moz-letter-spacing:-1px;-ms-letter-spacing:-1px;letter-spacing:-1px;}}

.iXxPeu{position:absolute;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;background-color:transparent;border:1px solid #000000;border-radius:6px;width:84px;height:28px;top:30px;left:200px;} .iXxPeu p{font-family:AprovaSansBold,sans-serif;font-size:16px;color:#000000;text-align:center;font-weight:bold;line-height:0.96;} @media (max-width:768px){.iXxPeu{left:190px;width:82px;height:28px;}} @media (max-width:680px){.iXxPeu{top:20px;left:180px;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;padding:6px;}.iXxPeu p{font-size:13px;width:-webkit-max-content;width:-moz-max-content;width:max-content;}}

.kXMeAy{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;}

.lfBujc{text-align:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;position:relative;padding:0 6px;border:1px solid #000000;border-radius:4px;margin-bottom:10px;} .lfBujc span{text-transform:uppercase;font-family:AprovaSans;color:#000000;font-size:12px;line-height:1.2;} @media(max-width:680px){.lfBujc span{font-size:10px;}}

.fvIDFO{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;margin:10px 0 10px;} .fvIDFO .buy-button{background-color:#FED500;text-align:center;border-radius:28px;width:100%;padding:17px 0;margin-bottom:10px;-webkit-transition:background-color 0.4s;transition:background-color 0.4s;} .fvIDFO .buy-button:hover{background-color:#FFE352;} .fvIDFO .buy-button-text{color:#111111;font-family:AprovaSansBold;font-size:18px;line-height:1;-webkit-letter-spacing:-0.5px;-moz-letter-spacing:-0.5px;-ms-letter-spacing:-0.5px;letter-spacing:-0.5px;} @media (max-width:680px){.fvIDFO .buy-button-text{font-size:16px;}}

.dVVaQD{font-size:13px;line-height:1;margin:8px 0;display:none;} .dVVaQD p:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/black-check.svg);} .dVVaQD span{color:#c4c4c4;} .dVVaQD span:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/grey-check.svg);} .dVVaQD strong{font-family:AprovaSansBold;background-color:#76C5FF;font-size:10px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;padding:2px 10px;border-radius:4px;margin-left:10px;text-transform:uppercase;} @media (max-width:680px){.dVVaQD p,.dVVaQD span{font-size:12px;}.dVVaQD p:before,.dVVaQD span:before{margin-right:2px;}}.bpgIBs{font-size:13px;line-height:1;margin:8px 0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;} .bpgIBs p:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/black-check.svg);} .bpgIBs span{color:#c4c4c4;} .bpgIBs span:before{margin-right:4px;content:url(https://d3awytnmmfk53d.cloudfront.net/landings/static/images/grey-check.svg);} .bpgIBs strong{font-family:AprovaSansBold;background-color:#76C5FF;font-size:10px;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;padding:2px 10px;border-radius:4px;margin-left:10px;text-transform:uppercase;} @media (max-width:680px){.bpgIBs p,.bpgIBs span{font-size:12px;}.bpgIBs p:before,.bpgIBs span:before{margin-right:2px;}}

.fyZdif{position:absolute;width:90px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;padding:8px;background-color:#fc9700;top:-14px;left:200px;border-radius:8px;text-align:start;font-size:12px;text-transform:uppercase;font-family:AprovaSansBold,sans-serif;font-weight:bold;color:#000000;} @media (max-width:768px){.fyZdif{width:-webkit-min-content;width:-moz-min-content;width:min-content;left:210px;}} @media (max-width:680px){.fyZdif{font-size:10px;left:68%;}}

.gMjyGT{border:2px solid #00E88F;padding:10px 14px;margin:5px auto 8px;border-radius:10px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;cursor:pointer;position:relative;} .gMjyGT span{padding:12px 10px;color:#ffffff;font-size:14px;font-family:AprovaSans;margin:0 auto;line-height:100%;text-align:center;position:absolute;background-image:url('https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/HeroDescontos/info.svg');background-repeat:no-repeat;background-size:contain;display:none;height:98px;width:118px;bottom:30px;right:34px;z-index:10;} .gMjyGT img:hover+span{display:block;} .gMjyGT img:onclick+span{display:block;} @media(max-width:680px){.gMjyGT{padding:8px 10px;}.gMjyGT span{right:18px;}}

.hhfMzR{margin:0 10px;font-family:AprovaSans;color:#000000;-webkit-transition:color ease-in .2s;transition:color ease-in .2s;font-size:13px;width:108px;} @media(max-width:680px){.hhfMzR{font-size:12px;width:104px;margin:0 4px;}}

.eRThlw{margin-left:8px;font-family:AprovaSans;color:#666666;-webkit-transition:color ease-in .2s;transition:color ease-in .2s;font-size:15px;width:60px;text-align:right;line-height:12px;} .eRThlw small{font-size:11px;} @media(max-width:680px){.eRThlw{font-size:13px;width:52px;margin-left:4px;}}

.fyekDO{position:relative;width:100%;background:#ffffff;} @media (max-width:768px){.fyekDO{padding:0 16px 16px;}} @media (max-width:680px){.fyekDO{padding:0 8px 8px;}}

.cUwAjA{background-color:#00E88F;width:100%;max-width:1216px;margin:0 auto;border-radius:0 0 28px 28px;padding:0 36px;} @media (max-width:768px){.cUwAjA{padding:0;}}

.iLtmyY{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0 auto;max-width:1184px;padding:70px 0;position:relative;width:100%;} @media (max-width:768px){.iLtmyY{padding:66px 0 60px;}}

.kjcvqA{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;margin-bottom:24px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;} @media (max-width:768px){.kjcvqA{width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}} @media (max-width:680px){.kjcvqA{margin-bottom:0;}}

.eHQqYw{position:relative;font-family:AprovaSansBlack,sans-serif;font-size:36px;line-height:1.2;-webkit-letter-spacing:-1px;-moz-letter-spacing:-1px;-ms-letter-spacing:-1px;letter-spacing:-1px;color:#000000;text-align:center;width:690px;margin:30px 0;} @media (max-width:768px){.eHQqYw{font-size:28px;width:640px;}} @media (max-width:680px){.eHQqYw{width:280px;font-size:24px;margin:0 0 25px;}}

.hSbTtJ{font-family:AprovaSansBold,sans-serif;font-weight:bold;font-family:AprovaSans;width:860px;font-size:20px;font-weight:normal;line-height:1.2;-webkit-letter-spacing:normal;-moz-letter-spacing:normal;-ms-letter-spacing:normal;letter-spacing:normal;color:#000000;text-align:center;margin-bottom:40px;} .hSbTtJ a{-webkit-text-decoration:underline;text-decoration:underline;cursor:pointer;} @media (max-width:768px){.hSbTtJ{text-align:center;font-size:18px;line-height:1.33;margin:0 auto 24px;width:700px;}} @media (max-width:680px){.hSbTtJ{width:290px;font-size:14px;}}

.hAhbrT{width:70%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:space-evenly;-webkit-justify-content:space-evenly;-ms-flex-pack:space-evenly;justify-content:space-evenly;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;} @media (max-width:768px){.hAhbrT{width:100%;-webkit-box-pack:space-around;-webkit-justify-content:space-around;-ms-flex-pack:space-around;justify-content:space-around;}} @media (max-width:680px){.hAhbrT{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;}}

.bhhBlK{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;background:#ffffff;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;max-height:1820px;width:100%;} @media (max-width:768px){.bhhBlK{padding:16px;}} @media (max-width:680px){.bhhBlK{padding:8px 8px 0px 8px;}}

.iFVpMn{position:relative;height:606px;width:100%;padding:50px 61px;max-width:1216px;background:#00e88f;border-radius:24px 24px 0 0;} .iFVpMn:after{content:'';position:absolute;background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2217a869-18b8-4139-b459-aae944650cf5-desktop-Imagem-Hero-UEE.png');background-repeat:no-repeat;background-size:contain;background-position:bottom center;width:300px;height:331px;bottom:164px;left:482px;z-index:1;} @media(max-width:768px){.iFVpMn{padding:28px 64px;height:800px;}.iFVpMn:after{width:300px;height:331px;left:63px;bottom:125px;}} @media(max-width:680px){.iFVpMn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;padding:32px 0;height:1040px;}.iFVpMn:after{background-image:url('https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6f768ade-3279-464c-b780-e08c9ff27f34-mobile-Imagem-Hero-UEE.png');width:280px;height:280px;right:auto;bottom:24px;}}

.lgPjea{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;position:relative;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;} @media(max-width:768px){.lgPjea{-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:flex-end;-webkit-box-align:flex-end;-ms-flex-align:flex-end;align-items:flex-end;}} @media(max-width:680px){.lgPjea{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;}}

.lmWBXb{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;color:#111111;margin-bottom:12px;z-index:3;position:relative;opacity:1;-webkit-transition:opacity ease-in .4s;transition:opacity ease-in .4s;} @media(max-width:768px){.lmWBXb{width:100%;margin-bottom:30px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}} @media(max-width:680px){.lmWBXb{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-bottom:8px;width:100%;padding:0 5px;}}

.jwfQqC{position:relative;background-color:#E1E1E1;font-family:AprovaSansBlack,sans-serif;font-size:22px;margin-bottom:10px;padding:10px;text-align:center;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;} @media (max-width:768px){.jwfQqC{font-size:20px;}} @media (max-width:680px){.jwfQqC{font-size:16px;padding:5px 15%;}}

.VDEkP{font-family:AprovaSansBlack,sans-serif;font-size:20px;width:304px;height:28px;color:#000000;margin:0 0 20px;} @media(max-width:768px){.VDEkP{font-size:18px;margin-top:0;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;text-align:center;width:100%;}} @media (max-width:680px){.VDEkP{text-align:center;width:100%;margin:0 0 5px;}}

.cnadUP{position:relative;font-family:VanguardCF,sans-serif;font-weight:black;line-height:1;color:#000000;font-size:58px;width:400px;text-transform:uppercase;} @media(max-width:768px){.cnadUP{font-size:48px;width:550px;text-align:center;}} @media(max-width:680px){.cnadUP{width:280px;text-align:center;font-size:26px;}}

.hvYUEW{font-family:AprovaSansBlack,sans-serif;font-size:32px;line-height:120%;width:510px;color:#000000;margin:8px 0;} @media(max-width:768px){.hvYUEW{font-size:24px;width:390px;margin:0;}} @media(max-width:680px){.hvYUEW{font-size:16px;text-align:center;width:272px;margin:0;}}

.iYZgdn{font-family:AprovaSans,sans-serif;font-size:20px;line-height:120%;width:380px;color:#000000;margin:24px 0 38px;} .iYZgdn strong{font-family:AprovaSansBlack,sans-serif;} @media(max-width:768px){.iYZgdn{font-size:18px;text-align:center;margin:10px 0;}} @media(max-width:680px){.iYZgdn{font-size:16px;text-align:center;width:290px;}.iYZgdn span{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;}}

.eEqIvX{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;position:relative;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;} @media (max-width:680px){.eEqIvX{padding:0;}}

.gFqaPs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;position:relative;max-width:319px;width:100%;} @media(max-width:768px){.gFqaPs{width:260px;}} @media(max-width:680px){.gFqaPs{width:280px;}}

.bDpHMd{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;position:relative;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#ffffff;padding:26px 26px 18px;border-radius:18px;width:340px;height:-webkit-fit-content;height:-moz-fit-content;height:fit-content;box-shadow:0 1px 6px 0 rgba(0,0,0,0.15);z-index:4;} .bDpHMd span{font-size:14px;line-height:1.3;font-family:AprovaSans,sans-serif;margin:14px 0;} @media(max-width:768px){.bDpHMd span{font-size:12px;margin:5px 0 19px;}} @media(max-width:768px){.bDpHMd{width:282px;padding:20px 18px;}}

.ViFAl{font-family:AprovaSansBlack,sans-serif;width:300px;font-size:28px;-webkit-align-self:start;-ms-flex-item-align:start;align-self:start;line-height:1;color:#000000;-webkit-letter-spacing:0.1px;-moz-letter-spacing:0.1px;-ms-letter-spacing:0.1px;letter-spacing:0.1px;text-align:start;margin-bottom:0;} @media (max-width:768px){.ViFAl{font-size:22px;}} @media (max-width:680px){.ViFAl{font-size:24px;width:236px;}}

.UeMC{padding-top:8px;width:100%;} .UeMC span{font-family:AprovaSansBlack;font-size:14px;margin:25px;}

.kugxUC{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;width:277px;} .kugxUC .buy-button{background-color:#FED500;text-align:center;-webkit-transition:background-color .4s;transition:background-color .4s;padding:5px 0 !important;} .kugxUC .buy-button span{font-family:AprovaSansBold;} .kugxUC .buy-button:hover{background-color:#FFE352;} @media (max-width:768px){.kugxUC .buy-button{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:0 !important;margin:0;height:44px;}.kugxUC .buy-button span{margin:0;}} .kugxUC .buy-button-text{color:#111111;font-family:AprovaSansBold;font-size:18px;line-height:1;-webkit-letter-spacing:-0.5px;-moz-letter-spacing:-0.5px;-ms-letter-spacing:-0.5px;letter-spacing:-0.5px;} @media (max-width:768px){.kugxUC .buy-button-text{font-size:14px;}} @media (max-width:768px){.kugxUC{width:225px;}} @media (max-width:680px){.kugxUC{width:100%;}}

.dzRxrC{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px 4px;height:27px;width:250px;border:1px solid #000000;border-radius:4px;} .dzRxrC span{text-transform:uppercase;color:#000000;font-size:12px;line-height:1.2;text-align:center;text-transform:uppercase;-webkit-letter-spacing:-0.05px;-moz-letter-spacing:-0.05px;-ms-letter-spacing:-0.05px;letter-spacing:-0.05px;} @media(max-width:768px){.dzRxrC span{font-size:10px;margin:0;}} @media(max-width:680px){.dzRxrC span{font-size:11px;}} @media(max-width:768px){.dzRxrC{width:208px;padding:4px;height:21px;}} @media(max-width:680px){.dzRxrC{width:224px;padding:4px;height:24px;}}

.dgMjQE{width:310px;height:36px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;border:2px solid #000000;border-radius:8px;background-color:transparent;z-index:2;margin-bottom:26px;} @media(max-width:768px){.dgMjQE{width:294px;margin-bottom:0px;}} @media(max-width:680px){.dgMjQE{width:290px;height:33px;margin-bottom:20px;}}

.krRjNg{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;gap:6px;color:#000000;font-size:16px;font-variant-numeric:tabular-nums;font-family:AprovaSansBold;} .krRjNg .info{font-size:18px;text-align:center;vertical-align:middle;line-height:1.5;} .krRjNg img{width:14px;height:16px;object-fit:contain;} @media(max-width:680px){.krRjNg{padding:0 20px;}.krRjNg .info{font-size:16px;}}

.hjobBI{font-size:16px;line-height:1.2;text-align:center;color:#000000;} @media(max-width:680px){.hjobBI{font-size:14px;}}

.gGUTZb{font-size:20px;line-height:120%;color:#000000;border-bottom:1px solid #000000;width:-webkit-fit-content;width:-moz-fit-content;width:fit-content;} @media(max-width:768px){.gGUTZb{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;font-size:18px;position:absolute;top:680px;right:20px;}} @media(max-width:680px){.gGUTZb{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;top:664px;right:auto;}}</style></head><body><div id="__next" data-reactroot=""><div class="sc-iwsKbI JEsFc"><header class="sc-DNdyV fiGRHA"><a tabindex="1" href="https://descomplica.com.br" aria-label="Página inicial Descomplica" class="sc-geAPOV jTlEHV"></a><ul class="sc-gMcBNU fjXCdW"><li tabindex="2" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-enem-e-vestibular" alt="Clique para descer a página para Enem e Vestibular" href="/vestibulares/enem/">Enem e Vestibular</a></li><li tabindex="3" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-header-tim" alt="Clique para descer a página para Parceria TIM" href="/cursinho-gratuito-tim/">Parceria TIM</a></li><li tabindex="4" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-header-graduacao" alt="Clique para descer a página para Graduação" href="/faculdade/">Graduação</a></li><li tabindex="5" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-header-pos" alt="Clique para descer a página para Pós" href="/pos-graduacao/">Pós</a></li><li tabindex="6" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-header-cursos-livres" alt="Clique para descer a página para Cursos livres" href="https://cursos-livres.descomplica.com.br/">Cursos livres</a></li><li tabindex="7" class="sc-dYzWWc iAHngH"><a class="cta-scroll" id="cta-header-para-empresas" alt="Clique para descer a página para Para empresas" href="/para-empresas/">Para empresas</a></li><li class="sc-dYzWWc iAHngH"><a class="cta-login" id="cta-login" tabindex="0">Já sou aluno</a></li></ul></header><div id="tracking-hero-estudante" class="sc-jbKcbu hlthYH"></div><h1 class="sc-jkPxnQ jwfQqC"><span>Do Cursinho Pré-Vestibular à Faculdade e Pós-Graduação</span></h1><div class="sc-dzQEYZ bhhBlK hero-container" id="hero-container"><div class="sc-eXsVQl iFVpMn"><div class="sc-bpubUI lgPjea"><div class="sc-sVRsr lmWBXb"><p class="sc-juQqkt VDEkP">Cursinho e Pré-vestibular Enem</p><h2 class="sc-bkCOcH cnadUP">Bora treinar? Preparação para o Enem 2023 e 2024</h2><p class="sc-ekQYnd hvYUEW"></p><p class="sc-kiXyGy iYZgdn">Comprando o <strong>Desco Top + Intensivo</strong> você leva mais 3 meses de acesso grátis</p><div class="sc-buGlAa dgMjQE"><div class="sc-fJwQoQ krRjNg"><p class="sc-flvzOl hjobBI">Aproveite a oferta!</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/multicategory/HeroDescontos/clock.webp"/><div class="info"><span class="info">00<!-- -->h</span></div><div class="info"><span class="info">00<!-- -->m</span></div><div class="info"><span class="info">00<!-- -->s</span></div></div></div><div class="sc-jtEaiv kugxUC"><a id="bf-hero-cta" href="https://descomplica.com.br/vestibulares/enem/?gti_source=Home-Integrada&amp;gti_medium=Banner&amp;gti_campaign=UEE-SaibaMais" class="sc-liPmeQ gGUTZb">Saiba mais sobre os planos</a></div></div><div class="sc-eZXMBi eEqIvX"><div class="sc-Ehqfj gFqaPs"><div class="sc-gggouf bDpHMd"><p class="sc-cyQzhP ViFAl"></p><div class="sc-jtEaiv kugxUC button-wrapper"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-hero-checkout" data-plan-id="12345"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-hero-checkout-text">Começar a estudar</span></button></div><span>7 dias para cancelar</span><div class="sc-dfRKBO dzRxrC"><span></span></div><div class="sc-cRULEh UeMC"><span>E muito mais!</span></div></div></div></div></div></div></div><div id="planos" class="sc-vBKru fyekDO"><div class="sc-kIXKos cUwAjA"><div class="sc-faQXZc iLtmyY"><div class="sc-imDdex kjcvqA"><h3 class="sc-lffWgi eHQqYw">Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares</h3><h3 class="sc-fGSyRc hSbTtJ">Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara</h3></div><div class="sc-dCVVYJ hAhbrT"><div class="sc-gVZiCL cPShKn"><h3 class="sc-fPCuyW kySPWa">Intensivo 3 meses para o Enem</h3><div class="sc-dAWfgX dZXdsg"><div class="sc-ljUfdc kXMeAy"><div class="sc-FAiZp hfhAvM"><div class="sc-dHaUqb izmCKD"><p class="sc-jptPkM lbpFGB">De <s>12x R$21,90</s> por até</p><p class="sc-ghUbLI eEQfSU"><span>12x</span>R$17,90</p></div><div class="sc-hrBRpH iXxPeu"><p>18% OFF</p></div></div><div class="sc-ertOQY fvIDFO"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-intensivo-3-meses-para-o-enem" data-plan-id="100032"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-intensivo-3-meses-para-o-enem-text">Assinar Intensivão</span></button></div><div class="sc-gkfylT lfBujc"><span>6 meses de acesso</span></div></div><div class="sc-iEPtyo dVVaQD"><p>.</p></div><div class="sc-iEPtyo bpgIBs"><p>Apostila digital Direto ao Ponto</p></div><div class="sc-iEPtyo bpgIBs"><p>2 correções de redação por mês</p></div><div class="sc-iEPtyo bpgIBs"><p>Plano de Estudos fixo personalizado</br>para a reta final</p></div><div class="sc-iEPtyo bpgIBs"><p>Exercícios online</p></div><div class="sc-iEPtyo bpgIBs"><p>Aulas ao vivo de Atualidades</p></div><div class="sc-iEPtyo bpgIBs"><p>Material de apoio</p></div><div class="sc-iEPtyo bpgIBs"><p>Testes de verificação</p></div><div class="sc-iEPtyo bpgIBs"><p>Simulados</p></div></div></div><div class="sc-gVZiCL cPShKn"><h3 class="sc-fPCuyW kXxoyS">Descomplica</br>Top</h3><div class="sc-dAWfgX dZXdsg"><div class="sc-ljUfdc kXMeAy"><div class="sc-kSpkgE gMjyGT"><div style="position:relative;display:inline-block;text-align:left;opacity:1;direction:ltr;border-radius:9px;-webkit-transition:opacity 0.25s;-moz-transition:opacity 0.25s;transition:opacity 0.25s;touch-action:none;-webkit-tap-highlight-color:rgba(0, 0, 0, 0);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none"><div class="react-switch-bg" style="height:18px;width:32px;margin:0;position:relative;background:#DDDDDD;border-radius:9px;cursor:pointer;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;transition:background 0.25s"></div><div class="react-switch-handle" style="height:14px;width:14px;background:#999999;display:inline-block;cursor:pointer;border-radius:50%;position:absolute;transform:translateX(2px);top:2px;outline:0;border:0;-webkit-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;-moz-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s"></div><input type="checkbox" role="switch" aria-checked="false" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px"/></div><p class="sc-bvODop hhfMzR semestral">+ Intensivo Enem</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/info-icon.svg"/><span>Plano intensivo Direto ao Ponto: 3 meses para o Enem</span><p class="sc-bQmweE eRThlw">+12x R$7</p></div><div class="sc-FAiZp dfWuiO"><div class="sc-dHaUqb izmCKD"><p class="sc-jptPkM lbpFGB">De <s>12x R$49,80</s> por até</p><p class="sc-ghUbLI eEQfSU"><span>12x</span>R$22,90</p></div></div><div class="sc-ertOQY fvIDFO"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-descomplica-br-top" data-plan-id="100032"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-text">Assinar Desco Top</span></button></div><div class="sc-gkfylT lfBujc"><span>12 meses de acesso</span></div></div><div class="sc-iEPtyo dVVaQD"><p><b>Plano Intensivo + 3 meses de acesso grátis</b></p></div><div class="sc-iEPtyo bpgIBs"><p>Acesso às turmas 2023 e 2024</p></div><div class="sc-iEPtyo bpgIBs"><p>6 correções de redação por mês</p></div><div class="sc-iEPtyo bpgIBs"><p>Guia do Estudo Perfeito (GEP)</p></div><div class="sc-iEPtyo bpgIBs"><p>Oficinas de aprendizagem no Telegram</p></div><div class="sc-iEPtyo bpgIBs"><p>Avaliações e teste</p></div><div class="sc-iEPtyo bpgIBs"><p>Resenha de obras literárias</p></div><div class="sc-iEPtyo bpgIBs"><p>Raio-X de provas da Fuvest, Unicamp e Uerj</p></div><div class="sc-iEPtyo bpgIBs"><span>Tira-dúvidas extra (Red, Bio, Quím e Fís)</span></div><div class="sc-iEPtyo bpgIBs"><span>Trilha de Especialidades Médicas</span></div></div></div><div class="sc-gVZiCL cPShKn"><div class="sc-kQZOhr fyZdif">o mais completo</div><h3 class="sc-fPCuyW kXxoyS">Descomplica</br>Top Medicina</h3><div class="sc-dAWfgX dZXdsg"><div class="sc-ljUfdc kXMeAy"><div class="sc-kSpkgE gMjyGT"><div style="position:relative;display:inline-block;text-align:left;opacity:1;direction:ltr;border-radius:9px;-webkit-transition:opacity 0.25s;-moz-transition:opacity 0.25s;transition:opacity 0.25s;touch-action:none;-webkit-tap-highlight-color:rgba(0, 0, 0, 0);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none"><div class="react-switch-bg" style="height:18px;width:32px;margin:0;position:relative;background:#DDDDDD;border-radius:9px;cursor:pointer;-webkit-transition:background 0.25s;-moz-transition:background 0.25s;transition:background 0.25s"></div><div class="react-switch-handle" style="height:14px;width:14px;background:#999999;display:inline-block;cursor:pointer;border-radius:50%;position:absolute;transform:translateX(2px);top:2px;outline:0;border:0;-webkit-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;-moz-transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s;transition:background-color 0.25s, transform 0.25s, box-shadow 0.15s"></div><input type="checkbox" role="switch" aria-checked="false" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px"/></div><p class="sc-bvODop hhfMzR semestral">+ Intensivo Enem</p><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/info-icon.svg"/><span>Plano intensivo Direto ao Ponto: 3 meses para o Enem</span><p class="sc-bQmweE eRThlw">+12x R$7</p></div><div class="sc-FAiZp dfWuiO"><div class="sc-dHaUqb izmCKD"><p class="sc-jptPkM lbpFGB">De <s>12x R$59,80</s> por até</p><p class="sc-ghUbLI eEQfSU"><span>12x</span>R$27,90</p></div></div><div class="sc-ertOQY fvIDFO"><button class="sc-iyvyFf cwkUdT buy-button" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-medicina" data-plan-id="100032"><span class="sc-hwwEjo dtJMnR buy-button-text" id="plans-link-vestibulares-button-plans-section-descomplica-br-top-medicina-text">Assinar Desco Top Medicina</span></button></div><div class="sc-gkfylT lfBujc"><span>12 meses de acesso</span></div></div><div class="sc-iEPtyo dVVaQD"><p><b>Plano Intensivo + 3 meses de acesso grátis</b></p></div><div class="sc-iEPtyo bpgIBs"><p>Acesso às turmas 2023 e 2024</p></div><div class="sc-iEPtyo bpgIBs"><p>10 correções de redação por mês</p></div><div class="sc-iEPtyo bpgIBs"><p>Guia do Estudo Perfeito (GEP)</p></div><div class="sc-iEPtyo bpgIBs"><p>Oficinas de aprendizagem no Telegram</p></div><div class="sc-iEPtyo bpgIBs"><p>Avaliações e teste</p></div><div class="sc-iEPtyo bpgIBs"><p>Resenha de obras literárias</p></div><div class="sc-iEPtyo bpgIBs"><p>Raio-X de provas da Fuvest, Unicamp e Uerj</p></div><div class="sc-iEPtyo bpgIBs"><p>Tira-dúvidas extra (Red, Bio, Quím e Fís)</p></div><div class="sc-iEPtyo bpgIBs"><p>Trilha de Especialidades Médicas</p></div></div></div></div></div></div></div><div id="banner-regulados" class="sc-bjPkoM dBLIQG"><div class="sc-kBzFSH bYbglm"><div class="sc-jEdsij cRwFbV"><h2>Vem pra faculdade da<br class=hide-mt /> <strike>nova</strike> <strong>nossa geração</strong></h2></div><p class="sc-eBipZS DxeGj">Há 6 anos, inovamos o conceito de graduação e pós-graduação, com cursos aprovados pelo Mec e microcertificados que vão te acelerar pro mercado de trabalho.</p><div id="faculdade" class="sc-hQfrgq ujLpf"><div class="sc-OnmeF gwwMOF"><div class="sc-fxMfqs zvPNV"><h2 class="sc-rzOft eOkbRN">Pós digital</h2><h3 class="sc-eIvgmF heGgdQ">MEGAOFERTA</br><span>VOLTA ÀS AULAS</span></h3><p class="sc-bkypNX gZQIWx">A partir de 18x R$ 85,27/mês + 2ª pós grátis</p><div class="sc-jklikK efxogg">E ainda garanta 5 cursos complementares para acelerar ainda mais sua carreira. Aproveite: oferta por tempo limitado!</div><div class="sc-izfUZz kTTSKd"><a id="cta-banner-pos" href="https://descomplica.com.br/pos-graduacao/?utm_source=homemulti&amp;utm_medium=banner-pos&amp;utm_campaign=dezembro" width="100%" class="sc-gFXMyG hQeVYd">Garantir promoção</a></div></div><div class="sc-eqGige kkTfMw"></div></div></div><div id="pos" class="sc-kUQWMX jxSWxj"><div class="sc-fepxGN kbaFjn"><span class="sc-cxZfpC cQBwIL"></span><div class="sc-bAtgIc bPrxcO"><h2 class="sc-csuNZv bxLegQ">Graduação digital</h2><h3 class="sc-eghKGU dfYtUc"><span>Matricule-se agora</span> e garanta sua certificação em I.A.</h3><p class="sc-fUKxqW cOMQgu">Cursos a partir de R$ 199,90/mês</p><div class="sc-kwclOP ejaqTa">Comece a sua graduação e participe da nossa Jornada de Aceleração para novos alunos, com aulas semanais sobre <strong>Inteligência Artificial</strong>.</div><div class="sc-bWkBrx ihtyHJ"><a id="cta-banner-faculdade" href="https://descomplica.com.br/faculdade/?gti_source=Home-Integrada&amp;gti_medium=Banner&amp;gti_campaign=Faculdade" width="100%" class="sc-gFXMyG hQeVYd">Conheça as graduações</a></div></div></div></div><div id="mandala" class="sc-jIyBzM kjLlBL"><div class="sc-fVHxE epKYZh"><div class="sc-jvjHmY kXUCIF"><h2 class="sc-dtmqqe jjAyaJ"></h2><h3 class="sc-jTqLGJ eNLjJi"></h3><p class="sc-wRHdD hlyPJh"></p><div class="sc-jwJjzT bBidyU"><a id="cta-banner-monte-sua-pos" width="100%" class="sc-gFXMyG hQeVYd"></a></div></div><div class="sc-jRnjsG flEWOM"></div></div></div></div></div><div id="multi-banner" class="sc-eMgOci cxfqrk"><div class="sc-cGDfzg dtpOdf"><div class="sc-jgwFWF hLHnQk"><div class="sc-kRCAcj chDtZY"><h2 class="sc-wENpt gTkUPR">Graduação digital</h2><h3 class="sc-fIIFii iQORSg"><span class="text-green">Teste a graduação<br/></span> por 15 dias grátis</h3></div><div class="sc-bUqnYt cSaesX"><p class="sc-zDqdV eqLfpU">Conheça nosso método, curta a plataforma de qualquer dispositivo e experimente uma carreira da nossa geração.</p><div class="sc-grYksN eCsOTs"><a id="multi-banner-faculdade-trial" href="https://descomplica.com.br/faculdade/teste-gratis/?gti_source=Home-Integrada&amp;gti_medium=Banner&amp;gti_campaign=Trial" width="100%" class="sc-gFXMyG hQeVYd">Experimente 100% grátis</a></div></div></div><div class="sc-jgwFWF hLHnQk"><div class="sc-kRCAcj chDtZY"><h2 class="sc-wENpt gTkUPR">Pós digital</h2><h3 class="sc-fIIFii iQORSg"><span class="text-green">Teste a pós<br/></span> POR 15 DIAS GRÁTIS</h3></div><div class="sc-bUqnYt cSaesX"><p class="sc-zDqdV eqLfpU">E fique por dentro do nosso método exclusivo.</p><div class="sc-grYksN eCsOTs"><a id="multi-banner-pos-trial" href="https://descomplica.com.br/pos-graduacao/teste-gratis/?gti_source=Home-Integrada&amp;gti_medium=Banner&amp;gti_campaign=Trial" width="100%" class="sc-gFXMyG hQeVYd">Experimente 100% grátis</a></div></div></div></div></div><div class="sc-csZoYU gIGBcT"><div class="sc-dpiBDp idWVXq"><h2 class="sc-hENMEE cJyBvx faq-title">Perguntas Frequentes</h2><div itemscope="" itemProp="mainEntity" itemType="https://schema.org/FAQPage" class="sc-dCaJBF hkOacS"><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">O que é a Descomplica?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">Você sabia que a Descomplica é a maior plataforma de ensino online do Brasil? Isso mesmo! E o melhor é que estamos ao lado dos alunos desde a época do vestibular até a pós-graduação.<br /><br />Contamos com uma equipe incrível de professores e colaboradores focados no sucesso dos alunos. Nossa história começou em 2011, com ensino para cursinho pré-vestibular online. Depois, fomos só conquistando cada vez mais alunos e ampliando nossa área de atuação.</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">O que a Descomplica oferece?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">A Descomplica é uma plataforma completa de ensino online. Por isso, oferecemos cursinhos pré-vestibular, preparatório para o encceja, faculdade, pós-graduação, cursos livres, preparação para concursos e cursos destinados a empresas.<br /><br />O melhor de tudo é que nossa faculdade e cursos de pós-graduação são destaques no Ministério da Educação (MEC). Com isso, você pode usar seu certificado ou diploma numa boa!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">Os cursos na Descomplica são 100% online?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">Sim! Todos os nossos cursos são oferecidos na modalidade online. Desde a nossa fundação, acreditamos que levar flexibilidade e praticidade à rotina dos alunos é o segredo para ter resultados melhores e acesso igualitário às oportunidades.<br /><br />Por isso, mesmo quem trabalha ou tem compromissos que o impedem de ir até a sala de aula podem fazer os cursos da Descomplica, acessíveis de qualquer lugar, a qualquer hora!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">A Descomplica é boa?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">É comum que um estudante tenha dúvidas sobre a Descomplica antes de se matricular em um cursinho pré-vestibular, graduação ou em outro tipo de curso.<br /><br />Pra te provar que a Descomplica é confiável e 100% segura, podemos começar dizendo que somos autorizados pelo MEC e que nossos cursos são destaques.<br /><br />Sabia que somos a maior plataforma de ensino online do Brasil? Pois é! Diversos estudantes já tiveram ótimas experiências com a gente.<br />Pra você ter noção, 613 é média da nota dos nossos alunos e alunas no Enem, 785 é média da nota dos nossos estudantes especificamente em Redação e 9,5 é a média da avaliação dos nossos professores.<br /><br />Hoje, recebemos milhares de visitantes mensais no nosso site.  Em 2016, realizamos a maior aula online ao vivo do mundo: foram mais de 1,2 milhão de estudantes nos assistindo às vésperas do Enem!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">A Descomplica é confiável?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">Uma das premissas da Descomplica é despertar a vontade de estudar em milhares de pessoas. Isso porque acreditamos que a educação tem um impacto capaz de reduzir a desigualdade e melhorar a vida dos brasileiros.<br /><br />Quando os estudantes se perguntam se a Descomplica é confiável, a gente pode trazer uma série de dados que confirmam nossa seriedade, incluindo a média dos nossos alunos no Enem e o fato de os nossos cursos serem autorizados pelo Ministério da Educação, o MEC.<br /><br />Outra coisa legal é que, em 2020, entramos na lista do Fórum Econômico Mundial, que elenca as empresas de tecnologia pioneiras no mundo! Muito maneiro, né?</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">Como funciona a Descomplica?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">A Descomplica é o lugar perfeito pra quem tem sede de conhecimento e quer investir na melhor formação para sua vida e carreira.<br /><br />A gente começa com os cursinhos para vestibular online, que são perfeitos pra quem vai prestar o Enem e precisa de uma super força. Depois, temos cursos de graduação e pós-graduação (autorizados pelo MEC), além de cursos livres e orientações para empresas.<br /><br />Qual é a sua necessidade? Se for sede de conhecimento e aprendizagem, a gente tem!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">Quais cursos online a Descomplica tem?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">A Descomplica tem planos de cursinho online para quem vai prestar o Enem, além dos cursos de graduação, pós e cursos livres.<br /><br />Quem vai prestar o Enem e quer cursinho online tem nossos planos Básico, TOP e voltado a Medicina, com conteúdo específico para quem deseja cursar uma das faculdades mais concorridas.<br /><br />Se a sua vontade for cursar uma graduação online, a gente tem vários cursos também! Eles estão inseridos nas áreas de Educação, Engenharia, Gestão e Tecnologia.<br /><br />Na pós-graduação, a Descomplica tem cursos voltados às áreas de Direito, Gestão, Tecnologia, Educação, Marketing e Comunicação, Engenharia e Saúde.<br /><br />Se a sua necessidade for dar aquele gás no currículo, venha fazer nossos cursos livres! Temos cursos de Habilidades Socioemocionais, Marketing e Empreendedorismo, além de Soft Skills, Gestão e Liderança.<br /><br />Educação Empresarial? A gente tem também! Temos mais de 300 diferentes programas de desenvolvimento para os seus colaboradores nas áreas de Gestão, Tecnologia, Marketing, Direito e Contabilidade com os melhores professores do mercado!<br /><br />Ah, também oferecemos um preparatório para o Encceja!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">A plataforma Descomplica é boa?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">Uma das principais dificuldades dos estudantes que estão buscando ensino online é se adaptar à plataforma, não é mesmo? Isso porque é fundamental que ela ofereça conteúdo completo, fácil de acessar e sem complicação.<br /><br />Pode perguntar pra qualquer aluno nosso: a plataforma Descomplica é super fácil de usar, pode ser acessada quando e de onde você estiver e, além disso, oferecemos suporte total para nossos estudantes. Pode vir que é sucesso!</p></div></div><div id="faq-item" data-testid="faq-item" itemscope="" itemProp="mainEntity" itemType="https://schema.org/Question" class="sc-ldcLGC eMOXek"><div class="sc-hXhGGG bJkMFq"><p itemProp="name" class="sc-dWcDbm jeaxQn">Por que escolher a Descomplica?</p><div class="sc-hTQSVH ldWAsK"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16"><path fill="#000000" d="M1346 1046.368L1342.549 1043 1333.56 1052.183 1324.371 1043.2 1321 1046.649 1333.64 1059z" transform="translate(-1321 -1043)"></path></svg></div></div><div data-testid="answer-container" itemscope="" itemProp="acceptedAnswer" itemType="https://schema.org/Answer" class="sc-esExBO dJHgre"><p itemProp="text" class="sc-ctwKVn ktHlvc">Em nossa história, mais de um milhão e meio de alunos já fizeram nosso cursinho online para o Enem. É um baita número, não acha? E ele comprova nossa seriedade em relação à qualidade do nosso ensino, seja ele para vestibular, graduação, pós ou cursos livres.<br /><br />Além de sermos autorizados pelo MEC, temos professores altamente qualificados, que ensinam de forma divertida e com cronogramas voltados à sua necessidade. Temos muitas técnicas de estudos e macetes pra você aprender da melhor forma.<br /><br />Outra vantagem é que você pode assistir à mesma aula quantas vezes quiser, até entender a disciplina. E tudo isso de onde estiver, a qualquer hora!</p></div></div></div></div></div><footer class="sc-gZMcBi bxhUVu footer-mobile-wrapper"><a href="/" class="sc-gqjmRU kWFLat"><svg version="1.1" id="Layer_1" x="0px" y="0px" width="100px" height="40px" viewBox="0 0 200 62"><g><g><path fill="#00E88F" class="st0" d="M48.9,0.9L6.6,8.8C3,9.5,0,13.1,0,17.3v26.8c0,4.4,3,7.8,6.6,8.5L49,61.1c5.3,1.1,9.8-3,9.8-8.7V10 C58.7,3.7,54.3-0.1,48.9,0.9z"></path></g><g><path d="M17,37.6C15.8,39,14,40,11.9,40c-4.7,0-8.1-3.8-8.1-9.1s3.5-9.1,8.1-9.1c1.8,0,3.4,0.7,4.6,1.8v-8.3h4.5v24.3h-3.7 L17,37.6z M8.3,30.9C8.3,34,10,36,12.4,36c2.7,0,4.1-2,4.1-5.1s-1.5-5.1-4.1-5.1C10,25.8,8.3,27.8,8.3,30.9z"></path><path d="M33,40c-5.1,0-9-3.8-9-9.1c0-5.5,3.5-9.1,8.6-9.1c5.3,0,8.3,3.6,8.3,8.4c0,0.7,0,1.5-0.2,2.2H28.6 c0.4,2.2,1.9,3.7,4.4,3.6c1.5,0,3.1-0.8,4.2-2.6l3.6,1.8C39,38.4,36.7,40,33,40z M28.8,28.9h7.6c-0.2-2.2-1.5-3.6-3.8-3.6 S29.1,26.6,28.8,28.9z"></path><path d="M42.7,27c0-3,2.4-5.4,6.6-5.4c2.8,0,4.9,1.4,6.1,3l-2.8,2.5c-0.6-0.9-1.8-1.7-3.6-1.7c-1.4,0-2.3,0.6-2.3,1.6 c0,0.9,0.4,1.5,3,2.1c3.6,0.9,5.8,2.1,5.8,5.4S52.6,40,48.8,40c-2.8,0-4.9-1.3-6.7-3.8l2.8-2.3c1.6,1.9,2.7,2.4,4.4,2.4 c1.2,0,2-0.6,2-1.5c0-1.2-1.2-1.7-4.2-2.4C44.4,31.7,42.7,30.2,42.7,27z"></path></g><g class="logo-content" fill="black"><path d="M70.2,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C76.7,38.6,73.9,40,70.2,40z"></path><path d="M97.5,30.9c0,5.3-3.7,9.1-9,9.1s-9-3.8-9-9.1s3.7-9.1,9-9.1S97.5,25.6,97.5,30.9z M92.8,30.9c0-3-1.6-5.1-4.5-5.1 c-2.7,0-4.5,2.1-4.5,5.1c0,3.1,1.6,5.1,4.5,5.1C91.2,35.9,92.8,33.9,92.8,30.9z"></path><path d="M104.9,27.4v12.2h-4.5V22.2h3.7l0.3,1.6c1.5-1.4,3.5-2.1,5.5-2.1c2.7,0,4.2,1,4.9,2.4c1.5-1.6,3.7-2.4,5.9-2.4 c5.1,0,5.8,3.6,5.8,7.2v10.6H122V28.8c0-2.4-0.7-3.1-2.4-3.1c-1.5,0-2.9,0.7-4,1.7c0,0.5,0,1,0,1.5v10.6H111V28.8 c0-2.4-0.7-3.1-2.4-3.1C107.5,25.7,106,26.4,104.9,27.4z"></path><path d="M135,38.2v7.5h-4.5V22.2h3.7l0.4,1.9c1.3-1.5,3-2.4,5.1-2.4c4.7,0,8.1,3.8,8.1,9.1s-3.5,9.1-8.1,9.1 C137.9,40,136.3,39.3,135,38.2z M143.3,30.9c0-3.1-1.6-5.1-4.1-5.1c-2.7,0-4.1,2-4.1,5.1c0,3.1,1.5,5.1,4.1,5.1 C141.6,35.9,143.3,34,143.3,30.9z"></path><path d="M156.3,39.6c-0.4,0-0.8,0.1-1.3,0.1c-3.1,0-4.9-1.6-4.9-5.3V15.2h4.5v18.2c0,1.5,0.5,1.9,1.7,1.9L156.3,39.6L156.3,39.6z"></path><path d="M161.4,14c1.6,0,2.8,1.3,2.8,2.9c0,1.5-1.3,2.8-2.8,2.8c-1.5,0-2.8-1.3-2.8-2.8C158.5,15.2,159.8,14,161.4,14z M159.1,39.5V22.1h4.5v17.4H159.1z"></path><path d="M175.5,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C181.9,38.6,179.1,40,175.5,40z"></path><path d="M196.3,38.1c-1.3,1.3-3.1,2-5,2c-3.5,0-6.6-2.5-6.6-5.9c0-3.7,3.1-5.9,6.8-5.9c1.8,0,3.1,0.7,4,1.5v-1.8 c0-1.5-1.4-2.4-3.3-2.4c-1.3,0-2.9,0.3-4.7,1.3l-1.3-3.3c2.2-1.2,4.2-1.7,6.8-1.7c4.6,0,7.1,2.6,7.1,7v10.8h-3.6L196.3,38.1z M192.4,36.4c1.6,0,2.7-0.9,2.8-2.3c0-1.4-1.1-2.3-2.8-2.3c-1.6,0-3,1-3,2.3C189.4,35.5,190.7,36.4,192.4,36.4z"></path></g></g></svg></a><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-enem-e-vestibulares">Enem e Vestibulares</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-enem-e-vestibulares-estude-para-encceja" target="_blank" href="https://descomplica.com.br/encceja/" class="sc-cSHVUG EWztw">Estude para Encceja</a><a id="footer-enem-e-vestibulares-cursinho-para-enem" target="_blank" href="https://descomplica.com.br/vestibulares/enem/" class="sc-cSHVUG EWztw">Cursinho para Enem</a><a id="footer-enem-e-vestibulares-cursinho-para-medicina" target="_blank" href="https://descomplica.com.br/vestibulares/medicina/" class="sc-cSHVUG EWztw">Cursinho para Medicina</a><a id="footer-enem-e-vestibulares-curso-enem-gratuito" target="_blank" href="https://descomplica.com.br/cursinho-gratuito/" class="sc-cSHVUG EWztw">Curso Enem Gratuito</a><a id="footer-enem-e-vestibulares-inscricoes-enem" target="_blank" href="https://cursinho.descomplica.com.br/vestibulares/enem/inscricao-enem" class="sc-cSHVUG EWztw">Inscrições Enem</a><a id="footer-enem-e-vestibulares-parceria-tim" target="_blank" href="https://descomplica.com.br/cursinho-gratuito-tim/" class="sc-cSHVUG EWztw">Parceria TIM</a><a id="footer-enem-e-vestibulares-questoes-do-enem" target="_blank" href="https://descomplica.com.br/gabarito-enem/questoes/" class="sc-cSHVUG EWztw">Questões do Enem</a><a id="footer-enem-e-vestibulares-simulador-sisu" target="_blank" href="https://descomplica.com.br/sisu/" class="sc-cSHVUG EWztw">Simulador SiSU</a><a id="footer-enem-e-vestibulares-simulado-enem" target="_blank" href="https://simulado.descomplica.com.br/" class="sc-cSHVUG EWztw">Simulado Enem</a><a id="footer-enem-e-vestibulares-aprovados-enem" target="_blank" href="https://descomplica.com.br/aprovados-enem/" class="sc-cSHVUG EWztw">Aprovados Enem</a><a id="footer-enem-e-vestibulares-livro-redacao-em-10-semanas" target="_blank" href="https://cursinho.descomplica.com.br/livro/redacao" class="sc-cSHVUG EWztw">Livro Redação em 10 semanas</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-graduacao">Graduação</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-graduacao-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/" class="sc-cSHVUG EWztw">Graduação</a><a id="footer-graduacao-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/diferenciais/" class="sc-cSHVUG EWztw">Graduação Descomplica</a><a id="footer-graduacao-faculdade-de-educacao" target="_blank" href="https://descomplica.com.br/faculdade/educacao/" class="sc-cSHVUG EWztw">Faculdade de Educação</a><a id="footer-graduacao-faculdade-de-engenharia" target="_blank" href="https://descomplica.com.br/faculdade/engenharia/" class="sc-cSHVUG EWztw">Faculdade de Engenharia</a><a id="footer-graduacao-faculdade-de-gestao" target="_blank" href="https://descomplica.com.br/faculdade/gestao/" class="sc-cSHVUG EWztw">Faculdade de Gestão</a><a id="footer-graduacao-faculdade-de-tecnologia" target="_blank" href="https://descomplica.com.br/faculdade/tecnologia/" class="sc-cSHVUG EWztw">Faculdade de Tecnologia</a><a id="footer-graduacao-vestibular-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/" class="sc-cSHVUG EWztw">Vestibular Descomplica</a><a id="footer-graduacao-segunda-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/segunda-graduacao/" class="sc-cSHVUG EWztw">Segunda Graduação</a><a id="footer-graduacao-transferencia-externa" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/transferencia/" class="sc-cSHVUG EWztw">Transferência Externa</a><a id="footer-graduacao-ingresso-via-enem" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/nota-enem/" class="sc-cSHVUG EWztw">Ingresso via Enem</a><a id="footer-graduacao-ingresso-via-prouni" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/prouni/" class="sc-cSHVUG EWztw">Ingresso via Prouni</a><a id="footer-graduacao-teste-vocacional-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/teste-vocacional/" class="sc-cSHVUG EWztw">Teste Vocacional Descomplica</a><a id="footer-graduacao-teste-faculdade-15-dias-gratis" target="_blank" href="https://descomplica.com.br/faculdade/teste-gratis/" class="sc-cSHVUG EWztw">Teste Faculdade 15 dias grátis</a><a id="footer-graduacao-guia-de-carreiras" target="_blank" href="https://descomplica.com.br/guia-de-carreiras/" class="sc-cSHVUG EWztw">Guia de Carreiras</a><a id="footer-graduacao-quanto-ganha-cada-profissao" target="_blank" href="https://descomplica.com.br/quanto-ganha/" class="sc-cSHVUG EWztw">Quanto Ganha cada Profissão</a><a id="footer-graduacao-comparador-de-faculdade" target="_blank" href="https://comparafacul.com.br/" class="sc-cSHVUG EWztw">Comparador de Faculdade</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-pos-graduacao">Pós-graduação</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-pos-graduacao-pos-graduacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/" class="sc-cSHVUG EWztw">Pós-graduação</a><a id="footer-pos-graduacao-pos-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/pos-graduacao/sobre-nos/" class="sc-cSHVUG EWztw">Pós-graduação Descomplica</a><a id="footer-pos-graduacao-pos-em-gestao" target="_blank" href="https://descomplica.com.br/pos-graduacao/gestao/" class="sc-cSHVUG EWztw">Pós em Gestão</a><a id="footer-pos-graduacao-pos-em-direito" target="_blank" href="https://descomplica.com.br/pos-graduacao/direito/" class="sc-cSHVUG EWztw">Pós em Direito</a><a id="footer-pos-graduacao-pos-em-educacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/educacao/" class="sc-cSHVUG EWztw">Pós em Educação</a><a id="footer-pos-graduacao-pos-em-tecnologia" target="_blank" href="https://descomplica.com.br/pos-graduacao/tecnologia/" class="sc-cSHVUG EWztw">Pós em Tecnologia</a><a id="footer-pos-graduacao-pos-em-marketing-e-comunicacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/marketing-e-comunicacao/" class="sc-cSHVUG EWztw">Pós em Marketing e Comunicação</a><a id="footer-pos-graduacao-pos-em-engenharia" target="_blank" href="https://descomplica.com.br/pos-graduacao/engenharia/" class="sc-cSHVUG EWztw">Pós em Engenharia</a><a id="footer-pos-graduacao-pos-em-saude" target="_blank" href="https://descomplica.com.br/pos-graduacao/saude/" class="sc-cSHVUG EWztw">Pós em Saúde</a><a id="footer-pos-graduacao-teste-pos-15-dias-gratis" target="_blank" href="https://descomplica.com.br/pos-graduacao/teste-gratis/" class="sc-cSHVUG EWztw">Teste Pós 15 dias grátis</a><a id="footer-pos-graduacao-monte-sua-pos" target="_blank" href="https://descomplica.com.br/pos-graduacao/monte-sua-pos/" class="sc-cSHVUG EWztw">Monte sua Pós</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-solucoes-corporativas">Soluções Corporativas</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-solucoes-corporativas-educacao-corporativa" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-cSHVUG EWztw">Educação corporativa</a><a id="footer-solucoes-corporativas-ifood-meu-diploma-e-m" target="_blank" href="https://parceiros.descomplica.com.br/ifood/meu-diploma" class="sc-cSHVUG EWztw">iFood: Meu Diploma E.M</a><a id="footer-solucoes-corporativas-loreal-formacao-em-cabelereiro-ead" target="_blank" href="https://ead.institutoloreal.com.br/" class="sc-cSHVUG EWztw">LOréal: Formação em Cabelereiro EAD</a><a id="footer-solucoes-corporativas-nubank-formacao-tech" target="_blank" href="https://parceiros.descomplica.com.br/nubank/nuvem" class="sc-cSHVUG EWztw">Nubank: Formação Tech</a><a id="footer-solucoes-corporativas-natura-desenvolvimento-educacional" target="_blank" href="https://parceiros.descomplica.com.br/natura-educacao/cursos-preparatorios" class="sc-cSHVUG EWztw">Natura: Desenvolvimento Educacional</a><a id="footer-solucoes-corporativas-serasa-trilha-financeira" target="_blank" href="https://parceiros.descomplica.com.br/curso-educacao-financeira-gratuito" class="sc-cSHVUG EWztw">Serasa: Trilha Financeira</a></div></div><div class="sc-VigVT jZTNXK"><div class="sc-jTzLTM fpxJPC"><span id="footer-mais-produtos">Mais Produtos</span><img alt="Ícone" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/open-arrow-icon.svg" class="arrow"/></div><div class="sc-jzJRlG duVNTl"><a id="footer-mais-produtos-blog-descomplica" target="_blank" href="https://descomplica.com.br/blog/" class="sc-cSHVUG EWztw">Blog Descomplica</a><a id="footer-mais-produtos-cursos-livres" target="_blank" href="https://cursos-livres.descomplica.com.br/" class="sc-cSHVUG EWztw">Cursos Livres</a></div></div><div class="sc-kgoBCf czYjpW"><div class="sc-chPdSV iDDyqz">Baixe o App Descomplica</div><div class="sc-kGXeez iLaiDY"><img alt="Apple Store" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/apple-store-icon2.svg"/><img alt="Google Play" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/google-play-icon.svg"/></div></div><div class="sc-kpOJdX bjFwnM"><div class="sc-ckVGcZ byovHs"><div> Central de Ajuda </div><div> Quem Somos </div><div> Política de Privacidade </div></div><div class="sc-jKJlTe iXOzQw"><div> Termos de Uso </div><div> Trabalhe conosco </div><div> Imprensa </div></div></div><div class="sc-dxgOiQ fQKnQb"><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/small-descomplica-icon.svg" class="sc-eNQAEJ cwwjnH"/><img alt="Facebook" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/fb-icon.svg"/><img alt="Twitter" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/twitter-icon.svg"/><img alt="YouTube" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/youtube-icon.svg"/><img alt="Instagram" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/instagram-icon.svg"/></div></footer><footer class="sc-kEYyzF jXYoyY footer-desktop-wrapper"><a href="https://descomplica.com.br" aria-label="Página inicial Descomplica" class="sc-iAyFgw bsSYmi"><svg version="1.1" id="Layer_1" x="0px" y="0px" width="100px" height="40px" viewBox="0 0 200 62"><g><g><path fill="#00E88F" class="st0" d="M48.9,0.9L6.6,8.8C3,9.5,0,13.1,0,17.3v26.8c0,4.4,3,7.8,6.6,8.5L49,61.1c5.3,1.1,9.8-3,9.8-8.7V10 C58.7,3.7,54.3-0.1,48.9,0.9z"></path></g><g><path d="M17,37.6C15.8,39,14,40,11.9,40c-4.7,0-8.1-3.8-8.1-9.1s3.5-9.1,8.1-9.1c1.8,0,3.4,0.7,4.6,1.8v-8.3h4.5v24.3h-3.7 L17,37.6z M8.3,30.9C8.3,34,10,36,12.4,36c2.7,0,4.1-2,4.1-5.1s-1.5-5.1-4.1-5.1C10,25.8,8.3,27.8,8.3,30.9z"></path><path d="M33,40c-5.1,0-9-3.8-9-9.1c0-5.5,3.5-9.1,8.6-9.1c5.3,0,8.3,3.6,8.3,8.4c0,0.7,0,1.5-0.2,2.2H28.6 c0.4,2.2,1.9,3.7,4.4,3.6c1.5,0,3.1-0.8,4.2-2.6l3.6,1.8C39,38.4,36.7,40,33,40z M28.8,28.9h7.6c-0.2-2.2-1.5-3.6-3.8-3.6 S29.1,26.6,28.8,28.9z"></path><path d="M42.7,27c0-3,2.4-5.4,6.6-5.4c2.8,0,4.9,1.4,6.1,3l-2.8,2.5c-0.6-0.9-1.8-1.7-3.6-1.7c-1.4,0-2.3,0.6-2.3,1.6 c0,0.9,0.4,1.5,3,2.1c3.6,0.9,5.8,2.1,5.8,5.4S52.6,40,48.8,40c-2.8,0-4.9-1.3-6.7-3.8l2.8-2.3c1.6,1.9,2.7,2.4,4.4,2.4 c1.2,0,2-0.6,2-1.5c0-1.2-1.2-1.7-4.2-2.4C44.4,31.7,42.7,30.2,42.7,27z"></path></g><g class="logo-content" fill="black"><path d="M70.2,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C76.7,38.6,73.9,40,70.2,40z"></path><path d="M97.5,30.9c0,5.3-3.7,9.1-9,9.1s-9-3.8-9-9.1s3.7-9.1,9-9.1S97.5,25.6,97.5,30.9z M92.8,30.9c0-3-1.6-5.1-4.5-5.1 c-2.7,0-4.5,2.1-4.5,5.1c0,3.1,1.6,5.1,4.5,5.1C91.2,35.9,92.8,33.9,92.8,30.9z"></path><path d="M104.9,27.4v12.2h-4.5V22.2h3.7l0.3,1.6c1.5-1.4,3.5-2.1,5.5-2.1c2.7,0,4.2,1,4.9,2.4c1.5-1.6,3.7-2.4,5.9-2.4 c5.1,0,5.8,3.6,5.8,7.2v10.6H122V28.8c0-2.4-0.7-3.1-2.4-3.1c-1.5,0-2.9,0.7-4,1.7c0,0.5,0,1,0,1.5v10.6H111V28.8 c0-2.4-0.7-3.1-2.4-3.1C107.5,25.7,106,26.4,104.9,27.4z"></path><path d="M135,38.2v7.5h-4.5V22.2h3.7l0.4,1.9c1.3-1.5,3-2.4,5.1-2.4c4.7,0,8.1,3.8,8.1,9.1s-3.5,9.1-8.1,9.1 C137.9,40,136.3,39.3,135,38.2z M143.3,30.9c0-3.1-1.6-5.1-4.1-5.1c-2.7,0-4.1,2-4.1,5.1c0,3.1,1.5,5.1,4.1,5.1 C141.6,35.9,143.3,34,143.3,30.9z"></path><path d="M156.3,39.6c-0.4,0-0.8,0.1-1.3,0.1c-3.1,0-4.9-1.6-4.9-5.3V15.2h4.5v18.2c0,1.5,0.5,1.9,1.7,1.9L156.3,39.6L156.3,39.6z"></path><path d="M161.4,14c1.6,0,2.8,1.3,2.8,2.9c0,1.5-1.3,2.8-2.8,2.8c-1.5,0-2.8-1.3-2.8-2.8C158.5,15.2,159.8,14,161.4,14z M159.1,39.5V22.1h4.5v17.4H159.1z"></path><path d="M175.5,40c-5.2,0-8.9-3.8-8.9-9.1s3.7-9.1,8.9-9.1c3.6,0,6.4,1.4,8.1,4.6l-3.8,1.9c-1.2-1.9-2.4-2.6-4.3-2.6 c-2.7,0-4.4,2-4.4,5.1s1.6,5.1,4.4,5.1c1.8,0,3.1-0.7,4.3-2.6l3.8,1.9C181.9,38.6,179.1,40,175.5,40z"></path><path d="M196.3,38.1c-1.3,1.3-3.1,2-5,2c-3.5,0-6.6-2.5-6.6-5.9c0-3.7,3.1-5.9,6.8-5.9c1.8,0,3.1,0.7,4,1.5v-1.8 c0-1.5-1.4-2.4-3.3-2.4c-1.3,0-2.9,0.3-4.7,1.3l-1.3-3.3c2.2-1.2,4.2-1.7,6.8-1.7c4.6,0,7.1,2.6,7.1,7v10.8h-3.6L196.3,38.1z M192.4,36.4c1.6,0,2.7-0.9,2.8-2.3c0-1.4-1.1-2.3-2.8-2.3c-1.6,0-3,1-3,2.3C189.4,35.5,190.7,36.4,192.4,36.4z"></path></g></g></svg></a><div class="sc-kkGfuU iieRqM footer-content"><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-enem-e-vestibulares" target="_blank" class="sc-cvbbAY ixpQzo">Enem e Vestibulares</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-enem-e-vestibulares-estude-para-encceja" target="_blank" href="https://descomplica.com.br/encceja/" class="sc-brqgnP dvKbdi">Estude para Encceja</a><a id="footer-enem-e-vestibulares-cursinho-para-enem" target="_blank" href="https://descomplica.com.br/vestibulares/enem/" class="sc-brqgnP dvKbdi">Cursinho para Enem</a><a id="footer-enem-e-vestibulares-cursinho-para-medicina" target="_blank" href="https://descomplica.com.br/vestibulares/medicina/" class="sc-brqgnP dvKbdi">Cursinho para Medicina</a><a id="footer-enem-e-vestibulares-curso-enem-gratuito" target="_blank" href="https://descomplica.com.br/cursinho-gratuito/" class="sc-brqgnP dvKbdi">Curso Enem Gratuito</a><a id="footer-enem-e-vestibulares-inscricoes-enem" target="_blank" href="https://cursinho.descomplica.com.br/vestibulares/enem/inscricao-enem" class="sc-brqgnP dvKbdi">Inscrições Enem</a><a id="footer-enem-e-vestibulares-parceria-tim" target="_blank" href="https://descomplica.com.br/cursinho-gratuito-tim/" class="sc-brqgnP dvKbdi">Parceria TIM</a><a id="footer-enem-e-vestibulares-questoes-do-enem" target="_blank" href="https://descomplica.com.br/gabarito-enem/questoes/" class="sc-brqgnP dvKbdi">Questões do Enem</a><a id="footer-enem-e-vestibulares-simulador-sisu" target="_blank" href="https://descomplica.com.br/sisu/" class="sc-brqgnP dvKbdi">Simulador SiSU</a><a id="footer-enem-e-vestibulares-simulado-enem" target="_blank" href="https://simulado.descomplica.com.br/" class="sc-brqgnP dvKbdi">Simulado Enem</a><a id="footer-enem-e-vestibulares-aprovados-enem" target="_blank" href="https://descomplica.com.br/aprovados-enem/" class="sc-brqgnP dvKbdi">Aprovados Enem</a><a id="footer-enem-e-vestibulares-livro-redacao-em-10-semanas" target="_blank" href="https://cursinho.descomplica.com.br/livro/redacao" class="sc-brqgnP dvKbdi">Livro Redação em 10 semanas</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/" class="sc-cvbbAY WFmwN">Graduação</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-graduacao-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/diferenciais/" class="sc-brqgnP dvKbdi">Graduação Descomplica</a><a id="footer-graduacao-faculdade-de-educacao" target="_blank" href="https://descomplica.com.br/faculdade/educacao/" class="sc-brqgnP dvKbdi">Faculdade de Educação</a><a id="footer-graduacao-faculdade-de-engenharia" target="_blank" href="https://descomplica.com.br/faculdade/engenharia/" class="sc-brqgnP dvKbdi">Faculdade de Engenharia</a><a id="footer-graduacao-faculdade-de-gestao" target="_blank" href="https://descomplica.com.br/faculdade/gestao/" class="sc-brqgnP dvKbdi">Faculdade de Gestão</a><a id="footer-graduacao-faculdade-de-tecnologia" target="_blank" href="https://descomplica.com.br/faculdade/tecnologia/" class="sc-brqgnP dvKbdi">Faculdade de Tecnologia</a><a id="footer-graduacao-vestibular-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/" class="sc-brqgnP dvKbdi">Vestibular Descomplica</a><a id="footer-graduacao-segunda-graduacao" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/segunda-graduacao/" class="sc-brqgnP dvKbdi">Segunda Graduação</a><a id="footer-graduacao-transferencia-externa" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/transferencia/" class="sc-brqgnP dvKbdi">Transferência Externa</a><a id="footer-graduacao-ingresso-via-enem" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/nota-enem/" class="sc-brqgnP dvKbdi">Ingresso via Enem</a><a id="footer-graduacao-ingresso-via-prouni" target="_blank" href="https://descomplica.com.br/faculdade/processo-seletivo/prouni/" class="sc-brqgnP dvKbdi">Ingresso via Prouni</a><a id="footer-graduacao-teste-vocacional-descomplica" target="_blank" href="https://descomplica.com.br/faculdade/teste-vocacional/" class="sc-brqgnP dvKbdi">Teste Vocacional Descomplica</a><a id="footer-graduacao-teste-faculdade-15-dias-gratis" target="_blank" href="https://descomplica.com.br/faculdade/teste-gratis/" class="sc-brqgnP dvKbdi">Teste Faculdade 15 dias grátis</a><a id="footer-graduacao-guia-de-carreiras" target="_blank" href="https://descomplica.com.br/guia-de-carreiras/" class="sc-brqgnP dvKbdi">Guia de Carreiras</a><a id="footer-graduacao-quanto-ganha-cada-profissao" target="_blank" href="https://descomplica.com.br/quanto-ganha/" class="sc-brqgnP dvKbdi">Quanto Ganha cada Profissão</a><a id="footer-graduacao-comparador-de-faculdade" target="_blank" href="https://comparafacul.com.br/" class="sc-brqgnP dvKbdi">Comparador de Faculdade</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-pos-graduacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/" class="sc-cvbbAY WFmwN">Pós-graduação</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-pos-graduacao-pos-graduacao-descomplica" target="_blank" href="https://descomplica.com.br/pos-graduacao/sobre-nos/" class="sc-brqgnP dvKbdi">Pós-graduação Descomplica</a><a id="footer-pos-graduacao-pos-em-gestao" target="_blank" href="https://descomplica.com.br/pos-graduacao/gestao/" class="sc-brqgnP dvKbdi">Pós em Gestão</a><a id="footer-pos-graduacao-pos-em-direito" target="_blank" href="https://descomplica.com.br/pos-graduacao/direito/" class="sc-brqgnP dvKbdi">Pós em Direito</a><a id="footer-pos-graduacao-pos-em-educacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/educacao/" class="sc-brqgnP dvKbdi">Pós em Educação</a><a id="footer-pos-graduacao-pos-em-tecnologia" target="_blank" href="https://descomplica.com.br/pos-graduacao/tecnologia/" class="sc-brqgnP dvKbdi">Pós em Tecnologia</a><a id="footer-pos-graduacao-pos-em-marketing-e-comunicacao" target="_blank" href="https://descomplica.com.br/pos-graduacao/marketing-e-comunicacao/" class="sc-brqgnP dvKbdi">Pós em Marketing e Comunicação</a><a id="footer-pos-graduacao-pos-em-engenharia" target="_blank" href="https://descomplica.com.br/pos-graduacao/engenharia/" class="sc-brqgnP dvKbdi">Pós em Engenharia</a><a id="footer-pos-graduacao-pos-em-saude" target="_blank" href="https://descomplica.com.br/pos-graduacao/saude/" class="sc-brqgnP dvKbdi">Pós em Saúde</a><a id="footer-pos-graduacao-teste-pos-15-dias-gratis" target="_blank" href="https://descomplica.com.br/pos-graduacao/teste-gratis/" class="sc-brqgnP dvKbdi">Teste Pós 15 dias grátis</a><a id="footer-pos-graduacao-monte-sua-pos" target="_blank" href="https://descomplica.com.br/pos-graduacao/monte-sua-pos/" class="sc-brqgnP dvKbdi">Monte sua Pós</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-solucoes-corporativas" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-cvbbAY WFmwN">Soluções Corporativas</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-solucoes-corporativas-educacao-corporativa" target="_blank" href="https://descomplica.com.br/para-empresas/" class="sc-brqgnP dvKbdi">Educação corporativa</a><a id="footer-solucoes-corporativas-ifood-meu-diploma-e-m" target="_blank" href="https://parceiros.descomplica.com.br/ifood/meu-diploma" class="sc-brqgnP dvKbdi">iFood: Meu Diploma E.M</a><a id="footer-solucoes-corporativas-loreal-formacao-em-cabelereiro-ead" target="_blank" href="https://ead.institutoloreal.com.br/" class="sc-brqgnP dvKbdi">LOréal: Formação em Cabelereiro EAD</a><a id="footer-solucoes-corporativas-nubank-formacao-tech" target="_blank" href="https://parceiros.descomplica.com.br/nubank/nuvem" class="sc-brqgnP dvKbdi">Nubank: Formação Tech</a><a id="footer-solucoes-corporativas-natura-desenvolvimento-educacional" target="_blank" href="https://parceiros.descomplica.com.br/natura-educacao/cursos-preparatorios" class="sc-brqgnP dvKbdi">Natura: Desenvolvimento Educacional</a><a id="footer-solucoes-corporativas-serasa-trilha-financeira" target="_blank" href="https://parceiros.descomplica.com.br/curso-educacao-financeira-gratuito" class="sc-brqgnP dvKbdi">Serasa: Trilha Financeira</a></div></div><div class="sc-hSdWYo gILVRA"><div class="sc-eHgmQL bkmIug"><a id="footer-mais-produtos" target="_blank" class="sc-cvbbAY ixpQzo">Mais Produtos</a></div><div class="sc-cMljjf kyKmzI"><a id="footer-mais-produtos-blog-descomplica" target="_blank" href="https://descomplica.com.br/blog/" class="sc-brqgnP dvKbdi">Blog Descomplica</a><a id="footer-mais-produtos-cursos-livres" target="_blank" href="https://cursos-livres.descomplica.com.br/" class="sc-brqgnP dvKbdi">Cursos Livres</a></div></div><div class="sc-gPEVay bdhLcP"><div class="sc-jDwBTQ gGzOhs">Baixe o<br/>App Descomplica</div><div class="sc-iRbamj bToZjp"><img tabindex="0" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/apple-store-icon2.svg" class="footer-app-ios" alt="Apple Store"/><img tabindex="0" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/google-play-icon.svg" class="footer-app-android" alt="Google Play"/></div></div></div><div class="sc-csuQGl cZYsgQ footer-last-section"><div class="sc-Rmtcm GaaNG"><img src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/small-descomplica-icon.svg" alt="Descomplica" class="sc-bRBYWo kslFZL"/><div class="sc-jlyJG drSMye"><a href="https://atendimento.descomplica.com.br/hc/pt-br" class="sc-brqgnP bEhNRI"><span>Central de Ajuda</span></a><a href="https://descomplica.com.br/sobre/quem-somos/" class="sc-brqgnP bEhNRI"><span>Quem Somos</span></a><a href="https://descomplica.com.br/sobre/politica-de-privacidade/" class="sc-brqgnP bEhNRI"><span>Política de Privacidade</span></a><a href="https://descomplica.com.br/sobre/termos-de-uso/" class="sc-brqgnP bEhNRI"><span>Termos de Uso</span></a><a href="https://boards.greenhouse.io/descomplica" class="sc-brqgnP bEhNRI"><span>Trabalhe conosco</span></a><a href="https://descomplica.com.br/imprensa/" class="sc-brqgnP bEhNRI"><span>Imprensa</span></a></div></div><div><div class="sc-gipzik dvUBWS"><img alt="Facebook" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/fb-icon.svg" tabindex="0"/><img alt="Twitter" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/twitter-icon.svg" tabindex="0"/><img alt="Youtube" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/youtube-icon.svg" tabindex="0"/><img alt="Instagram" src="https://d3awytnmmfk53d.cloudfront.net/landings/static/images/pos-grad/instagram-icon.svg" tabindex="0"/></div></div></div></footer><script>window.__landingsProject = true</script><script>window.POCKET_ENV = {"mixpanel":"760dfcc19d45ca96a003a0643baf7f3a","gtm":"GTM-P3F4C85","hubspot":"1653949","enableHubspot":true}</script><script src="https://dnnsjdj5swfc3.cloudfront.net/front-end/libs/pocket.latest.js"></script></div></div><style></style><script id="__NEXT_DATA__" type="application/json">{"props":{"pageProps":{"landing":{"id":"2077","name":"Home Multicategoria","url":"/","category":"Vestibulares","template":"Multicategory","isABTest":false,"published":true,"seo":{"canonical":"https://descomplica.com.br/","title":"Descomplica: Cursinho para Enem, Faculdade e Pós Digital","description":"Conheça a Descomplica: somos cursinho preparatório para o Enem, faculdade digital e pós-graduação digital. Visite o site Descomplica e fique por dentro!"},"components":[{"order":0,"props":{"reactName":"SideMenu"}},{"order":6,"props":{"reactName":"Footer","footerVariation":""}},{"order":5,"props":{"reactName":"Faq","isVariation":"","faqTitle":"","faqSubtitle":"","items":[{"order":0,"title":"O que é a Descomplica?","lines":["Você sabia que a Descomplica é a maior plataforma de ensino online do Brasil? Isso mesmo! E o melhor é que estamos ao lado dos alunos desde a época do vestibular até a pós-graduação.\u003cbr /\u003e\u003cbr /\u003eContamos com uma equipe incrível de professores e colaboradores focados no sucesso dos alunos. Nossa história começou em 2011, com ensino para cursinho pré-vestibular online. Depois, fomos só conquistando cada vez mais alunos e ampliando nossa área de atuação."]},{"order":1,"title":"O que a Descomplica oferece?","lines":["A Descomplica é uma plataforma completa de ensino online. Por isso, oferecemos cursinhos pré-vestibular, preparatório para o encceja, faculdade, pós-graduação, cursos livres, preparação para concursos e cursos destinados a empresas.\u003cbr /\u003e\u003cbr /\u003eO melhor de tudo é que nossa faculdade e cursos de pós-graduação são destaques no Ministério da Educação (MEC). Com isso, você pode usar seu certificado ou diploma numa boa!"]},{"order":2,"title":"Os cursos na Descomplica são 100% online?","lines":["Sim! Todos os nossos cursos são oferecidos na modalidade online. Desde a nossa fundação, acreditamos que levar flexibilidade e praticidade à rotina dos alunos é o segredo para ter resultados melhores e acesso igualitário às oportunidades.\u003cbr /\u003e\u003cbr /\u003ePor isso, mesmo quem trabalha ou tem compromissos que o impedem de ir até a sala de aula podem fazer os cursos da Descomplica, acessíveis de qualquer lugar, a qualquer hora!"]},{"order":3,"title":"A Descomplica é boa?","lines":["É comum que um estudante tenha dúvidas sobre a Descomplica antes de se matricular em um cursinho pré-vestibular, graduação ou em outro tipo de curso.\u003cbr /\u003e\u003cbr /\u003ePra te provar que a Descomplica é confiável e 100% segura, podemos começar dizendo que somos autorizados pelo MEC e que nossos cursos são destaques.\u003cbr /\u003e\u003cbr /\u003eSabia que somos a maior plataforma de ensino online do Brasil? Pois é! Diversos estudantes já tiveram ótimas experiências com a gente.\u003cbr /\u003ePra você ter noção, 613 é média da nota dos nossos alunos e alunas no Enem, 785 é média da nota dos nossos estudantes especificamente em Redação e 9,5 é a média da avaliação dos nossos professores.\u003cbr /\u003e\u003cbr /\u003eHoje, recebemos milhares de visitantes mensais no nosso site.  Em 2016, realizamos a maior aula online ao vivo do mundo: foram mais de 1,2 milhão de estudantes nos assistindo às vésperas do Enem!"]},{"order":4,"title":"A Descomplica é confiável?","lines":["Uma das premissas da Descomplica é despertar a vontade de estudar em milhares de pessoas. Isso porque acreditamos que a educação tem um impacto capaz de reduzir a desigualdade e melhorar a vida dos brasileiros.\u003cbr /\u003e\u003cbr /\u003eQuando os estudantes se perguntam se a Descomplica é confiável, a gente pode trazer uma série de dados que confirmam nossa seriedade, incluindo a média dos nossos alunos no Enem e o fato de os nossos cursos serem autorizados pelo Ministério da Educação, o MEC.\u003cbr /\u003e\u003cbr /\u003eOutra coisa legal é que, em 2020, entramos na lista do Fórum Econômico Mundial, que elenca as empresas de tecnologia pioneiras no mundo! Muito maneiro, né?"]},{"order":5,"title":"Como funciona a Descomplica?","lines":["A Descomplica é o lugar perfeito pra quem tem sede de conhecimento e quer investir na melhor formação para sua vida e carreira.\u003cbr /\u003e\u003cbr /\u003eA gente começa com os cursinhos para vestibular online, que são perfeitos pra quem vai prestar o Enem e precisa de uma super força. Depois, temos cursos de graduação e pós-graduação (autorizados pelo MEC), além de cursos livres e orientações para empresas.\u003cbr /\u003e\u003cbr /\u003eQual é a sua necessidade? Se for sede de conhecimento e aprendizagem, a gente tem!"]},{"order":6,"title":"Quais cursos online a Descomplica tem?","lines":["A Descomplica tem planos de cursinho online para quem vai prestar o Enem, além dos cursos de graduação, pós e cursos livres.\u003cbr /\u003e\u003cbr /\u003eQuem vai prestar o Enem e quer cursinho online tem nossos planos Básico, TOP e voltado a Medicina, com conteúdo específico para quem deseja cursar uma das faculdades mais concorridas.\u003cbr /\u003e\u003cbr /\u003eSe a sua vontade for cursar uma graduação online, a gente tem vários cursos também! Eles estão inseridos nas áreas de Educação, Engenharia, Gestão e Tecnologia.\u003cbr /\u003e\u003cbr /\u003eNa pós-graduação, a Descomplica tem cursos voltados às áreas de Direito, Gestão, Tecnologia, Educação, Marketing e Comunicação, Engenharia e Saúde.\u003cbr /\u003e\u003cbr /\u003eSe a sua necessidade for dar aquele gás no currículo, venha fazer nossos cursos livres! Temos cursos de Habilidades Socioemocionais, Marketing e Empreendedorismo, além de Soft Skills, Gestão e Liderança.\u003cbr /\u003e\u003cbr /\u003eEducação Empresarial? A gente tem também! Temos mais de 300 diferentes programas de desenvolvimento para os seus colaboradores nas áreas de Gestão, Tecnologia, Marketing, Direito e Contabilidade com os melhores professores do mercado!\u003cbr /\u003e\u003cbr /\u003eAh, também oferecemos um preparatório para o Encceja!"]},{"order":7,"title":"A plataforma Descomplica é boa?","lines":["Uma das principais dificuldades dos estudantes que estão buscando ensino online é se adaptar à plataforma, não é mesmo? Isso porque é fundamental que ela ofereça conteúdo completo, fácil de acessar e sem complicação.\u003cbr /\u003e\u003cbr /\u003ePode perguntar pra qualquer aluno nosso: a plataforma Descomplica é super fácil de usar, pode ser acessada quando e de onde você estiver e, além disso, oferecemos suporte total para nossos estudantes. Pode vir que é sucesso!"]},{"order":8,"title":"Por que escolher a Descomplica?","lines":["Em nossa história, mais de um milhão e meio de alunos já fizeram nosso cursinho online para o Enem. É um baita número, não acha? E ele comprova nossa seriedade em relação à qualidade do nosso ensino, seja ele para vestibular, graduação, pós ou cursos livres.\u003cbr /\u003e\u003cbr /\u003eAlém de sermos autorizados pelo MEC, temos professores altamente qualificados, que ensinam de forma divertida e com cronogramas voltados à sua necessidade. Temos muitas técnicas de estudos e macetes pra você aprender da melhor forma.\u003cbr /\u003e\u003cbr /\u003eOutra vantagem é que você pode assistir à mesma aula quantas vezes quiser, até entender a disciplina. E tudo isso de onde estiver, a qualquer hora!"]}]}},{"order":3,"props":{"reactName":"BannerRegulados","title":"\u003ch2\u003eVem pra faculdade da\u003cbr class=hide-mt /\u003e \u003cstrike\u003enova\u003c/strike\u003e \u003cstrong\u003enossa geração\u003c/strong\u003e\u003c/h2\u003e","subtitle":"Há 6 anos, inovamos o conceito de graduação e pós-graduação, com cursos aprovados pelo Mec e microcertificados que vão te acelerar pro mercado de trabalho.","items":[{"order":0,"header":"Pós digital","title":"MEGAOFERTA\u003c/br\u003e\u003cspan\u003eVOLTA ÀS AULAS\u003c/span\u003e","paragraph":"A partir de 18x R$ 85,27/mês + 2ª pós grátis","additional":"E ainda garanta 5 cursos complementares para acelerar ainda mais sua carreira. Aproveite: oferta por tempo limitado!","btnText":"Garantir promoção","btnLink":"https://descomplica.com.br/pos-graduacao/?utm_source=homemulti\u0026utm_medium=banner-pos\u0026utm_campaign=dezembro","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/27ddea47-2e8f-4d46-90e7-9a83ebef8496-PG-Megaoferta-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/aa6d0972-de22-40bf-893e-f038f0a3e0e0-PG-Megaoferta-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/3009f4bb-e6b0-4f10-b466-1fa79bc12886-selo.png","btnId":"cta-banner-pos"},{"order":1,"bgColor":"","header":"Graduação digital","title":"\u003cspan\u003eMatricule-se agora\u003c/span\u003e e garanta sua certificação em I.A.","paragraph":"Cursos a partir de R$ 199,90/mês","btnText":"Conheça as graduações","btnLink":"https://descomplica.com.br/faculdade/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Faculdade","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/76c00e63-5966-49c6-896a-ffca74a8a027-IMG-UG-JA-0409-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/cbc4befe-e272-42ba-8002-533ba0f861fe-IMG-UG-JA-0409-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/0d2e5949-00ff-47de-ae23-76de143d4c0a-2012-11-05-fundo-transparente.webp","borderColor":"","additional":"Comece a sua graduação e participe da nossa Jornada de Aceleração para novos alunos, com aulas semanais sobre \u003cstrong\u003eInteligência Artificial\u003c/strong\u003e.","btnId":"cta-banner-faculdade"}],"hasFullWidth":"","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/27ddea47-2e8f-4d46-90e7-9a83ebef8496-PG-Megaoferta-mobile.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/76c00e63-5966-49c6-896a-ffca74a8a027-IMG-UG-JA-0409-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/aa6d0972-de22-40bf-893e-f038f0a3e0e0-PG-Megaoferta-desktop.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/cbc4befe-e272-42ba-8002-533ba0f861fe-IMG-UG-JA-0409-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/3009f4bb-e6b0-4f10-b466-1fa79bc12886-selo.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/0d2e5949-00ff-47de-ae23-76de143d4c0a-2012-11-05-fundo-transparente.webp"}},{"order":4,"props":{"reactName":"MultiBanners","multiBannersTitle":"","items":[{"order":0,"cardTitle":"Graduação digital","title":"\u003cspan class=\"text-green\"\u003eTeste a graduação\u003cbr/\u003e\u003c/span\u003e por 15 dias grátis","paragraph":"Conheça nosso método, curta a plataforma de qualquer dispositivo e experimente uma carreira da nossa geração.","btnText":"Experimente 100% grátis","btnId":"multi-banner-faculdade-trial","btnLink":"https://descomplica.com.br/faculdade/teste-gratis/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Trial"},{"order":1,"cardTitle":"Pós digital","title":"\u003cspan class=\"text-green\"\u003eTeste a pós\u003cbr/\u003e\u003c/span\u003e POR 15 DIAS GRÁTIS","paragraph":"E fique por dentro do nosso método exclusivo.","btnText":"Experimente 100% grátis","btnId":"multi-banner-pos-trial","btnLink":"https://descomplica.com.br/pos-graduacao/teste-gratis/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Trial"}],"hasFullWidth":""}},{"order":2,"props":{"reactName":"OffersWithToggle","backgroundColor":"","title":"Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares","subtitle":"Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara","isHeroBigNumbers":"","hasCountdown":"","activeCountdownLabel":"","countdownLabel":"","hasBannerClaro":"","isVariation":"","isLPMedicine":"","isCroctEnabledOffers":"","offers":[{"order":0,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":[".","Apostila digital Direto ao Ponto","2 correções de redação por mês","Plano de Estudos fixo personalizado\u003c/br\u003epara a reta final","Exercícios online","Aulas ao vivo de Atualidades","Material de apoio","Testes de verificação","Simulados"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"6 meses de acesso","fullPrice":214.8,"discount":0.18,"title":"Intensivo 3 meses para o Enem","installmentPrice":"17.90","lastPrice":"21.90","btnLabel":"Assinar Intensivão","formerPriceWithoutPromo":"De \u003cs\u003e12x R$21,90\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzAzNTM5MzY%3D\u0026channel=wchome\u0026th=a"},{"order":1,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","\u003cspan\u003eTira-dúvidas extra (Red, Bio, Quím e Fís)\u003c/span\u003e","\u003cspan\u003eTrilha de Especialidades Médicas\u003c/span\u003e"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"12 meses de acesso","fullPrice":274.8,"discount":0.51,"title":"Descomplica\u003c/br\u003eTop","installmentPrice":"22.90","lastPrice":"47","btnLabel":"Assinar Desco Top","formerPriceWithoutPromo":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzE4MDU0NDQ%3D\u0026channel=wchome\u0026th=a","planContractWithPromo":"?planId=MTQ2MzI3NzMxNTY%3D\u0026channel=wchome\u0026th=a","checkoutFullPriceWithPromo":"29,90","timeOfAccessWithPromo":"+12x R$7"},{"order":2,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","10 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","Tira-dúvidas extra (Red, Bio, Quím e Fís)","Trilha de Especialidades Médicas"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"12 meses de acesso","fullPrice":334.8,"discount":0.52,"title":"Descomplica\u003c/br\u003eTop Medicina","installmentPrice":"27.90","lastPrice":"58","btnLabel":"Assinar Desco Top Medicina","formerPriceWithoutPromo":"De \u003cs\u003e12x R$59,80\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzIyODkyOTY%3D\u0026channel=wchome\u0026th=a","planContractWithPromo":"?planId=MTQ2MzMyNTcwMjQ%3D\u0026channel=wchome\u0026th=a","checkoutFullPriceWithPromo":"34,90","timeOfAccessWithPromo":"+12x R$7","isRecomended":"o mais completo"}],"logoCard":""}},{"order":1,"props":{"reactName":"HeroDescontos","backgroundColor":"#00e88f","firstBatch":"","scdBatch":"","thirdBatch":"","sectionTitle":"Do Cursinho Pré-Vestibular à Faculdade e Pós-Graduação","auxiliarText":"","title":"Bora treinar? Preparação para o Enem 2023 e 2024","subtitle":"Comprando o \u003cstrong\u003eDesco Top + Intensivo\u003c/strong\u003e você leva mais 3 meses de acesso grátis","promocodeText":"","couponsListTitle":"","textWhatsApp":"Aproveite a oferta!","textTwitter":"Nov 3, 2023 23:59:59","redirectText":"Saiba mais sobre os planos","redirectUrl":"https://descomplica.com.br/vestibulares/enem/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=UEE-SaibaMais","isMedicine":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2217a869-18b8-4139-b459-aae944650cf5-desktop-Imagem-Hero-UEE.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6f768ade-3279-464c-b780-e08c9ff27f34-mobile-Imagem-Hero-UEE.png","offers":[{"order":0,"_id":"5b898ecd6a68460dddd57466","name":"VESTIBULARES ENEM","slug":"vestibulares-enem-semanal","period":"1","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Raio-X de provas da Fuvest, Unicamp, Uerj e Uneb"],"pricingPlanId":"100033","__typename":"Plan","checkoutCupom":"MTQ2MzE4MDU0NDQ%3D\u0026channel=wchome\u0026th=a","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica Top","subtitle":"","checkouldOldPrice":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","installmentPrice":"22.90","lastPrice":"49.80","linkLabel":"Assinar Desco Top","checkoutDiscPlan":"MTQ2MzI3NzMxNTY%3D\u0026channel=wchome\u0026th=a","checkoutDiscPrice":"29,90","checkoutOldPrice":"+12x R$7","tooltips":[]}]}}]}}},"page":"/landings/templates/Multicategory","query":{"landing":{"id":"2077","name":"Home Multicategoria","url":"/","category":"Vestibulares","template":"Multicategory","isABTest":false,"published":true,"seo":{"canonical":"https://descomplica.com.br/","title":"Descomplica: Cursinho para Enem, Faculdade e Pós Digital","description":"Conheça a Descomplica: somos cursinho preparatório para o Enem, faculdade digital e pós-graduação digital. Visite o site Descomplica e fique por dentro!"},"components":[{"order":0,"props":{"reactName":"SideMenu"}},{"order":6,"props":{"reactName":"Footer","footerVariation":""}},{"order":5,"props":{"reactName":"Faq","isVariation":"","faqTitle":"","faqSubtitle":"","items":[{"order":0,"title":"O que é a Descomplica?","lines":["Você sabia que a Descomplica é a maior plataforma de ensino online do Brasil? Isso mesmo! E o melhor é que estamos ao lado dos alunos desde a época do vestibular até a pós-graduação.\u003cbr /\u003e\u003cbr /\u003eContamos com uma equipe incrível de professores e colaboradores focados no sucesso dos alunos. Nossa história começou em 2011, com ensino para cursinho pré-vestibular online. Depois, fomos só conquistando cada vez mais alunos e ampliando nossa área de atuação."]},{"order":1,"title":"O que a Descomplica oferece?","lines":["A Descomplica é uma plataforma completa de ensino online. Por isso, oferecemos cursinhos pré-vestibular, preparatório para o encceja, faculdade, pós-graduação, cursos livres, preparação para concursos e cursos destinados a empresas.\u003cbr /\u003e\u003cbr /\u003eO melhor de tudo é que nossa faculdade e cursos de pós-graduação são destaques no Ministério da Educação (MEC). Com isso, você pode usar seu certificado ou diploma numa boa!"]},{"order":2,"title":"Os cursos na Descomplica são 100% online?","lines":["Sim! Todos os nossos cursos são oferecidos na modalidade online. Desde a nossa fundação, acreditamos que levar flexibilidade e praticidade à rotina dos alunos é o segredo para ter resultados melhores e acesso igualitário às oportunidades.\u003cbr /\u003e\u003cbr /\u003ePor isso, mesmo quem trabalha ou tem compromissos que o impedem de ir até a sala de aula podem fazer os cursos da Descomplica, acessíveis de qualquer lugar, a qualquer hora!"]},{"order":3,"title":"A Descomplica é boa?","lines":["É comum que um estudante tenha dúvidas sobre a Descomplica antes de se matricular em um cursinho pré-vestibular, graduação ou em outro tipo de curso.\u003cbr /\u003e\u003cbr /\u003ePra te provar que a Descomplica é confiável e 100% segura, podemos começar dizendo que somos autorizados pelo MEC e que nossos cursos são destaques.\u003cbr /\u003e\u003cbr /\u003eSabia que somos a maior plataforma de ensino online do Brasil? Pois é! Diversos estudantes já tiveram ótimas experiências com a gente.\u003cbr /\u003ePra você ter noção, 613 é média da nota dos nossos alunos e alunas no Enem, 785 é média da nota dos nossos estudantes especificamente em Redação e 9,5 é a média da avaliação dos nossos professores.\u003cbr /\u003e\u003cbr /\u003eHoje, recebemos milhares de visitantes mensais no nosso site.  Em 2016, realizamos a maior aula online ao vivo do mundo: foram mais de 1,2 milhão de estudantes nos assistindo às vésperas do Enem!"]},{"order":4,"title":"A Descomplica é confiável?","lines":["Uma das premissas da Descomplica é despertar a vontade de estudar em milhares de pessoas. Isso porque acreditamos que a educação tem um impacto capaz de reduzir a desigualdade e melhorar a vida dos brasileiros.\u003cbr /\u003e\u003cbr /\u003eQuando os estudantes se perguntam se a Descomplica é confiável, a gente pode trazer uma série de dados que confirmam nossa seriedade, incluindo a média dos nossos alunos no Enem e o fato de os nossos cursos serem autorizados pelo Ministério da Educação, o MEC.\u003cbr /\u003e\u003cbr /\u003eOutra coisa legal é que, em 2020, entramos na lista do Fórum Econômico Mundial, que elenca as empresas de tecnologia pioneiras no mundo! Muito maneiro, né?"]},{"order":5,"title":"Como funciona a Descomplica?","lines":["A Descomplica é o lugar perfeito pra quem tem sede de conhecimento e quer investir na melhor formação para sua vida e carreira.\u003cbr /\u003e\u003cbr /\u003eA gente começa com os cursinhos para vestibular online, que são perfeitos pra quem vai prestar o Enem e precisa de uma super força. Depois, temos cursos de graduação e pós-graduação (autorizados pelo MEC), além de cursos livres e orientações para empresas.\u003cbr /\u003e\u003cbr /\u003eQual é a sua necessidade? Se for sede de conhecimento e aprendizagem, a gente tem!"]},{"order":6,"title":"Quais cursos online a Descomplica tem?","lines":["A Descomplica tem planos de cursinho online para quem vai prestar o Enem, além dos cursos de graduação, pós e cursos livres.\u003cbr /\u003e\u003cbr /\u003eQuem vai prestar o Enem e quer cursinho online tem nossos planos Básico, TOP e voltado a Medicina, com conteúdo específico para quem deseja cursar uma das faculdades mais concorridas.\u003cbr /\u003e\u003cbr /\u003eSe a sua vontade for cursar uma graduação online, a gente tem vários cursos também! Eles estão inseridos nas áreas de Educação, Engenharia, Gestão e Tecnologia.\u003cbr /\u003e\u003cbr /\u003eNa pós-graduação, a Descomplica tem cursos voltados às áreas de Direito, Gestão, Tecnologia, Educação, Marketing e Comunicação, Engenharia e Saúde.\u003cbr /\u003e\u003cbr /\u003eSe a sua necessidade for dar aquele gás no currículo, venha fazer nossos cursos livres! Temos cursos de Habilidades Socioemocionais, Marketing e Empreendedorismo, além de Soft Skills, Gestão e Liderança.\u003cbr /\u003e\u003cbr /\u003eEducação Empresarial? A gente tem também! Temos mais de 300 diferentes programas de desenvolvimento para os seus colaboradores nas áreas de Gestão, Tecnologia, Marketing, Direito e Contabilidade com os melhores professores do mercado!\u003cbr /\u003e\u003cbr /\u003eAh, também oferecemos um preparatório para o Encceja!"]},{"order":7,"title":"A plataforma Descomplica é boa?","lines":["Uma das principais dificuldades dos estudantes que estão buscando ensino online é se adaptar à plataforma, não é mesmo? Isso porque é fundamental que ela ofereça conteúdo completo, fácil de acessar e sem complicação.\u003cbr /\u003e\u003cbr /\u003ePode perguntar pra qualquer aluno nosso: a plataforma Descomplica é super fácil de usar, pode ser acessada quando e de onde você estiver e, além disso, oferecemos suporte total para nossos estudantes. Pode vir que é sucesso!"]},{"order":8,"title":"Por que escolher a Descomplica?","lines":["Em nossa história, mais de um milhão e meio de alunos já fizeram nosso cursinho online para o Enem. É um baita número, não acha? E ele comprova nossa seriedade em relação à qualidade do nosso ensino, seja ele para vestibular, graduação, pós ou cursos livres.\u003cbr /\u003e\u003cbr /\u003eAlém de sermos autorizados pelo MEC, temos professores altamente qualificados, que ensinam de forma divertida e com cronogramas voltados à sua necessidade. Temos muitas técnicas de estudos e macetes pra você aprender da melhor forma.\u003cbr /\u003e\u003cbr /\u003eOutra vantagem é que você pode assistir à mesma aula quantas vezes quiser, até entender a disciplina. E tudo isso de onde estiver, a qualquer hora!"]}]}},{"order":3,"props":{"reactName":"BannerRegulados","title":"\u003ch2\u003eVem pra faculdade da\u003cbr class=hide-mt /\u003e \u003cstrike\u003enova\u003c/strike\u003e \u003cstrong\u003enossa geração\u003c/strong\u003e\u003c/h2\u003e","subtitle":"Há 6 anos, inovamos o conceito de graduação e pós-graduação, com cursos aprovados pelo Mec e microcertificados que vão te acelerar pro mercado de trabalho.","items":[{"order":0,"header":"Pós digital","title":"MEGAOFERTA\u003c/br\u003e\u003cspan\u003eVOLTA ÀS AULAS\u003c/span\u003e","paragraph":"A partir de 18x R$ 85,27/mês + 2ª pós grátis","additional":"E ainda garanta 5 cursos complementares para acelerar ainda mais sua carreira. Aproveite: oferta por tempo limitado!","btnText":"Garantir promoção","btnLink":"https://descomplica.com.br/pos-graduacao/?utm_source=homemulti\u0026utm_medium=banner-pos\u0026utm_campaign=dezembro","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/27ddea47-2e8f-4d46-90e7-9a83ebef8496-PG-Megaoferta-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/aa6d0972-de22-40bf-893e-f038f0a3e0e0-PG-Megaoferta-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/3009f4bb-e6b0-4f10-b466-1fa79bc12886-selo.png","btnId":"cta-banner-pos"},{"order":1,"bgColor":"","header":"Graduação digital","title":"\u003cspan\u003eMatricule-se agora\u003c/span\u003e e garanta sua certificação em I.A.","paragraph":"Cursos a partir de R$ 199,90/mês","btnText":"Conheça as graduações","btnLink":"https://descomplica.com.br/faculdade/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Faculdade","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/76c00e63-5966-49c6-896a-ffca74a8a027-IMG-UG-JA-0409-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/cbc4befe-e272-42ba-8002-533ba0f861fe-IMG-UG-JA-0409-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/0d2e5949-00ff-47de-ae23-76de143d4c0a-2012-11-05-fundo-transparente.webp","borderColor":"","additional":"Comece a sua graduação e participe da nossa Jornada de Aceleração para novos alunos, com aulas semanais sobre \u003cstrong\u003eInteligência Artificial\u003c/strong\u003e.","btnId":"cta-banner-faculdade"}],"hasFullWidth":"","mobileImageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/27ddea47-2e8f-4d46-90e7-9a83ebef8496-PG-Megaoferta-mobile.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/76c00e63-5966-49c6-896a-ffca74a8a027-IMG-UG-JA-0409-mobile.png","imageUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/aa6d0972-de22-40bf-893e-f038f0a3e0e0-PG-Megaoferta-desktop.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/cbc4befe-e272-42ba-8002-533ba0f861fe-IMG-UG-JA-0409-desktop.png","sealUrl":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/3009f4bb-e6b0-4f10-b466-1fa79bc12886-selo.png,https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/0d2e5949-00ff-47de-ae23-76de143d4c0a-2012-11-05-fundo-transparente.webp"}},{"order":4,"props":{"reactName":"MultiBanners","multiBannersTitle":"","items":[{"order":0,"cardTitle":"Graduação digital","title":"\u003cspan class=\"text-green\"\u003eTeste a graduação\u003cbr/\u003e\u003c/span\u003e por 15 dias grátis","paragraph":"Conheça nosso método, curta a plataforma de qualquer dispositivo e experimente uma carreira da nossa geração.","btnText":"Experimente 100% grátis","btnId":"multi-banner-faculdade-trial","btnLink":"https://descomplica.com.br/faculdade/teste-gratis/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Trial"},{"order":1,"cardTitle":"Pós digital","title":"\u003cspan class=\"text-green\"\u003eTeste a pós\u003cbr/\u003e\u003c/span\u003e POR 15 DIAS GRÁTIS","paragraph":"E fique por dentro do nosso método exclusivo.","btnText":"Experimente 100% grátis","btnId":"multi-banner-pos-trial","btnLink":"https://descomplica.com.br/pos-graduacao/teste-gratis/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=Trial"}],"hasFullWidth":""}},{"order":2,"props":{"reactName":"OffersWithToggle","backgroundColor":"","title":"Vem pro cursinho que te deixa pronto pra passar no Enem e Vestibulares","subtitle":"Escolha um plano e comece hoje mesmo a montar uma rotina de estudos que seja a sua cara","isHeroBigNumbers":"","hasCountdown":"","activeCountdownLabel":"","countdownLabel":"","hasBannerClaro":"","isVariation":"","isLPMedicine":"","isCroctEnabledOffers":"","offers":[{"order":0,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":[".","Apostila digital Direto ao Ponto","2 correções de redação por mês","Plano de Estudos fixo personalizado\u003c/br\u003epara a reta final","Exercícios online","Aulas ao vivo de Atualidades","Material de apoio","Testes de verificação","Simulados"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"6 meses de acesso","fullPrice":214.8,"discount":0.18,"title":"Intensivo 3 meses para o Enem","installmentPrice":"17.90","lastPrice":"21.90","btnLabel":"Assinar Intensivão","formerPriceWithoutPromo":"De \u003cs\u003e12x R$21,90\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzAzNTM5MzY%3D\u0026channel=wchome\u0026th=a"},{"order":1,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","\u003cspan\u003eTira-dúvidas extra (Red, Bio, Quím e Fís)\u003c/span\u003e","\u003cspan\u003eTrilha de Especialidades Médicas\u003c/span\u003e"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"12 meses de acesso","fullPrice":274.8,"discount":0.51,"title":"Descomplica\u003c/br\u003eTop","installmentPrice":"22.90","lastPrice":"47","btnLabel":"Assinar Desco Top","formerPriceWithoutPromo":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzE4MDU0NDQ%3D\u0026channel=wchome\u0026th=a","planContractWithPromo":"?planId=MTQ2MzI3NzMxNTY%3D\u0026channel=wchome\u0026th=a","checkoutFullPriceWithPromo":"29,90","timeOfAccessWithPromo":"+12x R$7"},{"order":2,"_id":"5b898e806a684676b2d57464","name":"VESTIBULARES ENEM MENSAL","slug":"vestibulares-enem-mensal","period":"2","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","10 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Oficinas de aprendizagem no Telegram","Avaliações e teste","Resenha de obras literárias","Raio-X de provas da Fuvest, Unicamp e Uerj","Tira-dúvidas extra (Red, Bio, Quím e Fís)","Trilha de Especialidades Médicas"],"pricingPlanId":"100032","__typename":"Plan","timeOfAccessOffer":"12 meses de acesso","fullPrice":334.8,"discount":0.52,"title":"Descomplica\u003c/br\u003eTop Medicina","installmentPrice":"27.90","lastPrice":"58","btnLabel":"Assinar Desco Top Medicina","formerPriceWithoutPromo":"De \u003cs\u003e12x R$59,80\u003c/s\u003e por até","checkoutPromocodeWithPromo":"?planId=MTQ2MzIyODkyOTY%3D\u0026channel=wchome\u0026th=a","planContractWithPromo":"?planId=MTQ2MzMyNTcwMjQ%3D\u0026channel=wchome\u0026th=a","checkoutFullPriceWithPromo":"34,90","timeOfAccessWithPromo":"+12x R$7","isRecomended":"o mais completo"}],"logoCard":""}},{"order":1,"props":{"reactName":"HeroDescontos","backgroundColor":"#00e88f","firstBatch":"","scdBatch":"","thirdBatch":"","sectionTitle":"Do Cursinho Pré-Vestibular à Faculdade e Pós-Graduação","auxiliarText":"","title":"Bora treinar? Preparação para o Enem 2023 e 2024","subtitle":"Comprando o \u003cstrong\u003eDesco Top + Intensivo\u003c/strong\u003e você leva mais 3 meses de acesso grátis","promocodeText":"","couponsListTitle":"","textWhatsApp":"Aproveite a oferta!","textTwitter":"Nov 3, 2023 23:59:59","redirectText":"Saiba mais sobre os planos","redirectUrl":"https://descomplica.com.br/vestibulares/enem/?gti_source=Home-Integrada\u0026gti_medium=Banner\u0026gti_campaign=UEE-SaibaMais","isMedicine":"","heroImageDesktop":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/2217a869-18b8-4139-b459-aae944650cf5-desktop-Imagem-Hero-UEE.png","heroImageMobile":"https://d3uyk7qgi7fgpo.cloudfront.net/landings/images/6f768ade-3279-464c-b780-e08c9ff27f34-mobile-Imagem-Hero-UEE.png","offers":[{"order":0,"_id":"5b898ecd6a68460dddd57466","name":"VESTIBULARES ENEM","slug":"vestibulares-enem-semanal","period":"1","installments":12,"benefits":["\u003cb\u003ePlano Intensivo + 3 meses de acesso grátis\u003c/b\u003e","Acesso às turmas 2023 e 2024","6 correções de redação por mês","Guia do Estudo Perfeito (GEP)","Raio-X de provas da Fuvest, Unicamp, Uerj e Uneb"],"pricingPlanId":"100033","__typename":"Plan","checkoutCupom":"MTQ2MzE4MDU0NDQ%3D\u0026channel=wchome\u0026th=a","fullPrice":274.8,"discount":0.54,"timeOfAccessOffer":"12 meses de acesso","title":"Descomplica Top","subtitle":"","checkouldOldPrice":"De \u003cs\u003e12x R$49,80\u003c/s\u003e por até","installmentPrice":"22.90","lastPrice":"49.80","linkLabel":"Assinar Desco Top","checkoutDiscPlan":"MTQ2MzI3NzMxNTY%3D\u0026channel=wchome\u0026th=a","checkoutDiscPrice":"29,90","checkoutOldPrice":"+12x R$7","tooltips":[]}]}}]}},"buildId":"i4yoEcc3anQQ-CmKePrcr","assetPrefix":"https://d3awytnmmfk53d.cloudfront.net/landings","isFallback":false,"customServer":true,"gip":true,"scriptLoader":[]}</script><noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-P3F4C85' height='0' width='0' style='display:none;visibility:hidden' /></noscript><script>window.fbAsyncInit = function() {
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
$_SESSION['scriptcase']['pge_home']['contr_erro'] = 'off'; 
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
   $_SESSION['scriptcase']['pge_home']['contr_erro'] = 'off';
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
            nm_limpa_str_pge_home($nmgp_val);
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
            nm_limpa_str_pge_home($nmgp_val);
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
       elseif (is_file($root . $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp'] . "/sc_apl_default_nila.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['pge_home']['glo_nm_path_imag_temp'] . "/sc_apl_default_nila.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "pge_home") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['pge_home']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['pge_home']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['pge_home']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_nila'])) {
               $_SESSION['scriptcase']['pge_home']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_nila'];
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
   if (isset($_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "pge_home";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'pge_home' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['pge_home']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['pge_home']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_home']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_home']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['pge_home']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('pge_home' == $sReferer || 'pge_home_' == substr($sReferer, 0, 9))
       {
           $_SESSION['sc_session'][$script_case_init]['pge_home']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['pge_home']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'pge_home')
   {
       $_SESSION['sc_session'][$script_case_init]['pge_home']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['pge_home']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/pge_home_erro.php");
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
                nm_limpa_str_pge_home($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_pge_home = new pge_home_apl();
   $contr_pge_home->controle();
//
   function nm_limpa_str_pge_home(&$str)
   {
   }
?>
