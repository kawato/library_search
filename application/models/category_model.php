<?php
/**
 * カテゴリーモデル
 *
 * @author kawato
 *
 */
class Category_model extends My_Model {

    protected $_table = 'category';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 全件取得する
     * @return array
     */
    public function fetch_all(){
        $query = $this->db->order_by('parent_category_id')->order_by('sort')->get($this->_table);
        return $query->result();
    }

    /**
     * 親を取得する
     * @return array
     */
    public function fetch_parent(){
        //$query = $this->db->get_where($this->_table,array('parent_category_id' => '0','del_flg' => '0'))->order_by('sort');
        return $query->result();
    }

    /**
     * 子を取得する
     * @return array
     */
    public function fetch_child(){
        //$query = $this->db->get_where($this->_table,array('parent_category_id !=' => '0','del_flg' => '0'))->order_by('parent_category_id,sort');
        return $query->result();
    }

    /**
     * ドロップダウンリストを取得する
     *
     * @return multitype:string NULL
     */
    public function get_dropdownlist()
    {
        $dropdownlist = array();
        $category_map = array();

        $category = $this->fetch_all();
        foreach ($category as $v) {
            $category_map[$v->category_id] = $v;

        }

        // TODO categoryが2次元までしか対応してない。3,4次元に対応するには修正が必要
        $node = array();
        foreach ($category_map as $key => $v){
            if ($v->parent_category_id == 0){
                $node[$v->parent_category_id][$v->category_id][0] = $v;
            }else{
                $v2 = $category_map[$v->parent_category_id];
                if($v2->parent_category_id == 0){
                   $node[$v2->parent_category_id][$v2->category_id][$v->category_id] = $v;
                }
            }
        }
        // 1次元目はparent_category_idが0
        foreach ($node as $key => $node2){
            // 2次元目は親カテゴリ
            foreach ($node2 as $key2 => $node3){
                // 3次元目は0が親カテゴリのデータ、それ以外は子カテゴリのデータ
                foreach ($node3 as $key3 => $v3){
                    if($key3 == 0){
                        $dropdownlist[$key2] = $v3->name;
                    }else{
                        $dropdownlist[$key3] = $node3[0]->name . '&nbsp;>&nbsp;' . $v3->name;
                    }
                }
            }
        }

        return $dropdownlist;
    }
}