<?php
/**
 * 書籍モデル
 *
 * @author kawato
 *
 */
class Book_model extends My_Model {

    protected $_table = 'book';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * フォーム入力条件から件数を取得する
     * @return number
     */
    public function count_book_detail($where = array(),$like = array()){
        $this->db->from($this->_table);
        $this->db->join('category', 'book.category_id = category.category_id', 'left');
        $this->db->join('publisher', 'book.publisher_id = publisher.publisher_id', 'left');
        $this->db->join('author', 'book.author_id = author.author_id', 'left');
        if($where){
            $this->db->where($where);
        }
        if($like){
            $this->db->like($like);
        }
        return $this->db->count_all_results();
    }
    /**
     * フォーム入力条件からレコードを取得する
     *
     * @return array
     */
    public function query_book_detail($where = array(),$like = array(),$limit = '',$offset = ''){
        $this->db->select('book.*,category.name AS category_name,publisher.name AS publisher_name,author.name AS author_name');
        $this->db->from($this->_table);
        $this->db->join('category', 'book.category_id = category.category_id', 'left');
        $this->db->join('publisher', 'book.publisher_id = publisher.publisher_id', 'left');
        $this->db->join('author', 'book.author_id = author.author_id', 'left');
        if($where){
            $this->db->where($where);
        }
        if($like){
            $this->db->like($like);
        }
        if($limit && $offset){
            $this->db->limit($limit,$offset);
        }else if($limit){
            $this->db->limit($limit);
        }
        $this->db->order_by("category.sort");
        $this->db->order_by("publisher.sort");
        $this->db->order_by("author.author_id");

        return $this->db->get();
    }
    /**
     * 検索条件を作成する
     * validation実行後が前提
     * @param array $form
     * @return array array whereとlike条件
     */
    public function create_search_condition($form)
    {
        // 抽出条件を作成
        $where = array();
        $like = array();
        if($form['category_id'])
        {
            $where['book.category_id'] = $form['category_id'];
        }

        if($form['publisher_name'])
        {
            $like['publisher.name'] = $form['publisher_name'];
        }

        if($form['book_name'])
        {
            $like['book.title'] = $form['book_name'];
        }

        if($form['book_id'])
        {
            $where['book.book_id'] = $form['book_id'];
        }

        if($form['begin_publication_date_year'])
        {
            $where['book.publication_date >='] = $form['begin_publication_date_year'].'-'.$form['begin_publication_date_month'].'-'.$form['begin_publication_date_day'];
        }

        if($form['end_publication_date_year'])
        {
            $where['book.publication_date <='] = $form['end_publication_date_year'].'-'.$form['end_publication_date_month'].'-'.$form['end_publication_date_day'];
        }

        $where['book.del_flg'] = '0';

        return array($where,$like);
    }

}