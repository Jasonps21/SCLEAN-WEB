<?php


class MY_Loader extends CI_Loader
{

    public function __construct()
    {
        parent::__construct();
    }

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if ($return):
            $content = $this->view('admin/layout/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('admin/layout/footer', $vars, $return);

            return $content;
        else:
            $this->view('admin/layout/header', $vars);
            $this->view($template_name, $vars);
            $this->view('admin/layout/footer', $vars);
        endif;
    }

    public function templateUser($template_name, $vars = array(), $return = FALSE)
    {
        if ($return):
            $content = $this->view('user/layout/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('user/layout/footer', $vars, $return);

            return $content;
        else:
            $this->view('user/layout/header', $vars);
            $this->view($template_name, $vars);
            $this->view('user/layout/footer', $vars);
        endif;
    }
}

?>