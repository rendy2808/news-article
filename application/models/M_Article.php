<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Article extends CI_Model {
    public function getArticles()
    {
        $articles = $this->db->get('article');
        return $articles->result_array();
    }

    function getArticleId($id)
    {
        $this->db->where('id',$id); 
        $article = $this->db->get('article');
        return $article->row();
    }
    
    public function insert($data)
    {
        $this->db->insert('article',$data);
        return TRUE;
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('article');
        return TRUE;
    }
    public function update($data,$id)
    {
        print_r($data);
        $this->db->where('id',$id);
        $this->db->update('article',$data);
        return TRUE;
    }
	
}
