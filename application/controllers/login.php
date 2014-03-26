<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Loginコントローラ<br>
 * ログインの場合のみSessionチェックしない為、<br>
 * CI_Controllerを継承
 *
 * @author kawato
 *
 */
class Login extends CI_Controller {

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
        // development の場合 プロファイラを有効に
        if (ENVIRONMENT === 'development') {
            $this->output->enable_profiler();
        }
        //データベースへの接続
        $this->load->database('xampp');
        $this->load->library('form_validation');
    }

    /**
     * ログイン画面
     */
    public function index()
    {
        $data = array(
                'userid' => '',
                'password' => '',
        );
        if ($this->input->post()){
            // POST情報
            $userid = $this->input->post('userid');
            $password = $this->input->post('password');

            // Validationを設定
            $this->form_validation->set_rules('userid','ユーザーID','required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('password','パスワード','required|min_length[3]|max_length[20]');
            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                        'userid' => $userid,
                        'password' => $password,
                );
                $this->load->view('login_v',$data);
                return;
            }

            $this->form_validation->set_rules('userid','','callback_login_check');
            if ($this->form_validation->run() == TRUE)
            {
                redirect('search');
            }else{
                $data = array(
                        'userid' => $userid,
                        'password' => $password,
                );
                $this->load->view('login_v',$data);
            }

        }else{
            // POSTされてない場合は不正なので、ログイン画面へ移動
            $this->load->view('login_v',$data);
        }
    }
    /**
     * ログインチェック
     * 相関チェックだけど、コントロールを1つしか指定できない為、引数はuseridのみ<br/>
     * しかも、callbackメソッドにする為にpublicにする必要がある。
     * @param string $userid
     */
    public function login_check($userid)
    {
        $password = $this->input->post('password');

        // 接続先
        $login_users = $this->config->item('login_user');
        foreach ($login_users as $user){
            $u = explode(':', $user);
            if($u[0] == $userid && $u[1] == mb_strtoupper(sha1($password))){
                $userdata = array(
                        'is_logined' => true,
                        'login_id' => $userid,
                 );
                $this->session->set_userdata($userdata);
                return TRUE;
            }
        }
        // ログイン画面表示時にセッションを削除する。
        //sess_destroyは使った後には何もsessionにセットできない。
        $this->session->sess_destroy();
        $this->form_validation->set_message('login_check', 'ログインに失敗しました。<br/>IDとパスワードを確認してください');
        return FALSE;
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */