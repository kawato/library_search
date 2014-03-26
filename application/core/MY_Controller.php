<?php

/**
 * CI_Controller拡張クラス
 *
 * @author kawato
 *
 */
class MY_Controller extends CI_Controller {
    /**
     * ページ表示用データ
     * @var array
     */
    protected $_page_data = array();
    /**
     * コンストラクタ
     */
    function __construct(){
        parent::__construct();
        // development の場合 プロファイラを有効に
        if (ENVIRONMENT === 'development') {
            $this->output->enable_profiler();
        }
        // セッションのチェック
        if(!$this->session->userdata('is_logined'))
        {
            redirect('login');
        }else{
            // 共通処理を記述する
            // メニュー画面表示用
            $this->_page_data['login_id'] = $this->session->userdata('login_id');
        }
    }
}
