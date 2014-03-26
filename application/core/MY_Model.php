<?php

/**
 * CI_Model拡張クラス
 *
 * @author kawato
 *
 */
class MY_Model extends CI_Model {
    /**
     * コンストラクタ
     */
    function __construct(){
        parent::__construct();
        $this->load->database('xampp',TRUE);
    }
}
