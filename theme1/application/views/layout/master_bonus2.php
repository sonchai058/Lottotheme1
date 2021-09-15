<?php isset($page_content) ? $this->load->view('pages/' . $page_content, $data) : '';?>
<?php isset($page_js) ? $this->load->view('pages/' . $page_js, $data) : '';?>

