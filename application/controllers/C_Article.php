<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Article extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_Article');
        $this->load->library('upload');
        $this->load->library('pagination');
    }

	public function index()
	{
        $data['record'] = $this->M_Article->getArticles();
		$this->load->view('layout/header');
		$this->load->view('index', $data);
		$this->load->view('layout/footer');
    }
    
    //View New Article
    public function form_new_article(){
        
        $this->load->view('layout/header');
        $this->load->view('form_article');
        $this->load->view('layout/footer');
    }

    //Acrion New
    public function new_article(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $date = date('dmy');
        $author = $this->input->post('author');

        //config photo
        $config['upload_path'] = './assets/post';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '10240';  
        $config['max_width'] = '4480'; 
        $config['max_height'] = '4480'; 
        $config['image_name'] = $_FILES['image']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['image']['name'])) {
	        if ( $this->upload->do_upload('image') ) {
	            $pic = $this->upload->data();
	            $data = array(
                            'title'       => $title,
                            'content'     => $content,
                            'date'        => $date,
                            'author'      => $author,
                            'image_name'       => $pic['file_name']
	                        );
							$this->M_Article->insert($data);
              redirect('');
	        }else {
              die("Upload Failed");
	        }
	    }else {
	      echo "Failed";
	    }

    }

    // View Edit
    public function edit($id){
        

        $data['data'] = $this->M_Article->getArticleId($id);
        $this->load->view('layout/header');
        $this->load->view('form_edit',$data);
        $this->load->view('layout/footer');
    }

    //Action Edit
    public function submit_edit(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $date = date('dmy');
        $author = $this->input->post('author');

        $path = './assets/post/';

        $id = $this->input->post('id');

        //config photo
        $config['upload_path'] = './assets/post';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '10240';  
        $config['max_width'] = '4480'; 
        $config['max_height'] = '4480'; 
        $config['image_name'] = $_FILES['image']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['image']['name'])) {
	        if ( $this->upload->do_upload('image') ) {
	            $pic = $this->upload->data();
	            $data = array(
                            'title'       => $title,
                            'content'     => $content,
                            'date'        => $date,
                            'author'      => $author,
                            'image_name'       => $pic['file_name']
                            );
                            // Delete Pic
                            @unlink($path.$this->input->post('old_file'));
							$this->M_Article->update($data,$id);
              redirect('');
	        }else {
              die("Upload Failed");
	        }
	    }else {
            $pic = $this->upload->data();
            $data = array(
                        'title'       => $title,
                        'content'     => $content,
                        'date'        => $date,
                        'author'      => $author
                        );
                        
                        $this->M_Article->update($data,$id);
          redirect('');
	    }
    }


    // delete
    public function delete_article($id,$pic)
    {
        $path = './assets/post/';
        @unlink($path.$pic);

        $this->M_Article->delete($id);
        return redirect('');
    }


}
