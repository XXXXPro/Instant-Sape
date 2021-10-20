<?php 

class widgetSape extends cmsWidget {
 
 // запрещаем кеширование виджета
 public $is_cacheable = false;

 public function run(){
    $limit = $this->getOption('count', false);
    $code = $this->getOption('code','');
    $force_show_code = $this->getOption('force_show_code',false);

    if (!preg_match('|^[a-f0-9]+$|',$code)) return false;  // проверка кода на безопасность, так как используем его в include
    $filepath = $_SERVER['DOCUMENT_ROOT'].'/'.$code.'/sape.php';

    // иначе подключаем SAPE
    $links = '';
    include($filepath);
    if (class_exists('SAPE_client')) {
      define('_SAPE_USER', 'a3dc97fe985d791b63c3bd2be7890542');       
      $sape = new SAPE_client(array('force_show_code'=>$force_show_code));
      $links=$sape->return_links($limit);
      if (empty($links)) return false;
    }
    else $links = "<!-- Ошибка: не удалось подключить файл $filepath -->";
    return array('links'=>$links);
 }

}