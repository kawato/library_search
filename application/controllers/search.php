<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends MY_Controller
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database('xampp', TRUE);
        $this->load->model('Book_model');
        $this->load->model('Category_model');
        $this->load->helper('download');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->_page_data['menu_active'] = 'search';
        $this->_page_data['menu'] = $this->load->view('menu_v', $this->_page_data, TRUE);

        $year = array();
        $now = new DateTime();
        for ($i = 1980; $i <= $now->format('Y'); $i ++) {
            $year[] = $i;
        }
        $this->_page_data['year'] = $year;

        $month = array();
        for ($i = 1; $i <= 12; $i ++) {
            $month[] = $i;
        }
        $this->_page_data['month'] = $month;

        $day = array();
        for ($i = 1; $i <= 31; $i ++) {
            $day[] = $i;
        }
        $this->_page_data['day'] = $day;

        $category = $this->Category_model->get_dropdownlist();
        $this->_page_data['category'] = $category;

        if ($this->input->post()) {
            // 入力値補完
            $this->_page_data['category_id'] = $this->input->post('category_id');
            $this->_page_data['publisher_name'] = $this->input->post('publisher_name');
            $this->_page_data['book_name'] = $this->input->post('book_name');
            $this->_page_data['book_id'] = $this->input->post('book_id');
            $this->_page_data['begin_publication_date_year'] = $this->input->post('begin_publication_date_year');
            $this->_page_data['begin_publication_date_month'] = $this->input->post('begin_publication_date_month');
            $this->_page_data['begin_publication_date_day'] = $this->input->post('begin_publication_date_day');
            $this->_page_data['end_publication_date_year'] = $this->input->post('end_publication_date_year');
            $this->_page_data['end_publication_date_month'] = $this->input->post('end_publication_date_month');
            $this->_page_data['end_publication_date_day'] = $this->input->post('end_publication_date_day');
        } else {
            // 入力値 の初期値
            $this->_page_data['category_id'] = '';
            $this->_page_data['publisher_name'] = '';
            $this->_page_data['book_name'] = '';
            $this->_page_data['book_id'] = '';
            $this->_page_data['begin_publication_date_year'] = '';
            $this->_page_data['begin_publication_date_month'] = '';
            $this->_page_data['begin_publication_date_day'] = '';
            $this->_page_data['end_publication_date_year'] = '';
            $this->_page_data['end_publication_date_month'] = '';
            $this->_page_data['end_publication_date_day'] = '';
        }
    }

    /**
     * index
     */
    public function index($page = 0)
    {
        $this->_page_data['result'] = array();
        $this->_page_data['is_searched'] = FALSE;

        if ($this->input->post()) {

            // Validationを設定
            // 必須入力の設定方法
            // $this->form_validation->set_rules('category_id','カテゴリー','required');

            $this->form_validation->set_rules('begin_publication_date_year', '', 'callback_begin_publication_date_check');
            $this->form_validation->set_rules('end_publication_date_year', '', 'callback_end_publication_date_check');

            // 簡易チェック
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('search_v', $this->_page_data);
                return;
            }

            // 抽出
            list ($where, $like) = $this->Book_model->create_search_condition($this->_page_data);
            $count = $this->Book_model->count_book_detail($where, $like);
            $result = $this->Book_model->query_book_detail($where, $like, $this->config->item('search.limit'), $page)
                ->result();

            $this->_page_data['result'] = $result;
            if ($count > 0) {
                $this->_page_data['is_searched'] = TRUE;
                // urlルーティングで本来なら/search/index/ページ番号で3にするところを、/search/ページ番号にしている
                $config['uri_segment'] = 2;
                $config['base_url'] = base_url() . '/search/';
                $config['total_rows'] = $count;
                $config['per_page'] = $this->config->item('search.limit');
                $config['full_tag_open'] = "<div id='pagination'>";
                $config['full_tag_close'] = "</div>";
                $this->pagination->initialize($config);
                $this->_page_data['page_link'] = $this->pagination->create_links();
            }
        }

        $this->load->view('search_v', $this->_page_data);
    }

    /**
     * csvダウンロード
     */
    public function csv()
    {
        $this->load->dbutil();

        $this->output->enable_profiler(FALSE);

        // 抽出条件を作成
        list ($where, $like) = $this->Book_model->create_search_condition($this->_page_data);
        $query = $this->Book_model->query_book_detail($where, $like);

        $csv = $this->dbutil->csv_from_result($query);

        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');

        // ファイル名
        $fname = 'library_search_' . date("ymdhi", time()) . '.csv';

        // ファイルをダウンロードさせる
        force_download($fname, $csv);
    }

    /**
     * 開始発行年月日の相関チェック
     * イケてないないのだが、callbakのvalidationは引数を1つしか持てないので、
     * function内でpostを取得している
     *
     * @param string $year
     */
    public function begin_publication_date_check($year)
    {
        $month = $this->input->post('begin_publication_date_month');
        $day = $this->input->post('begin_publication_date_day');

        if ($year && $month && $day) {
            return TRUE;
        } elseif ($year || $month || $day) {
            $this->form_validation->set_message('begin_publication_date_check', '発行年月日・開始を設定する場合は、年・月・日を設定してください。');
            return FALSE;
        }
        return TRUE;
    }

    /**
     * 終了発行年月日の相関チェック
     * イケてないないのだが、callbakのvalidationは引数を1つしか持てないので、
     * function内でpostを取得している
     *
     * @param string $year
     */
    public function end_publication_date_check($year)
    {
        $month = $this->input->post('end_publication_date_month');
        $day = $this->input->post('end_publication_date_day');

        if ($year && $month && $day) {
            return TRUE;
        } elseif ($year || $month || $day) {
            $this->form_validation->set_message('end_publication_date_check', '発行年月日・終了を設定する場合は、年・月・日を設定してください。');
            return FALSE;
        }
        return TRUE;
    }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */