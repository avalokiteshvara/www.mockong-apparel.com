<?php

function paginate ($base_url, $total_rows, $per_page, $uri_segment)
{
        $config = array('base_url' => $base_url, 'total_rows' => $total_rows, 
                'per_page' => $per_page, 'uri_segment' => $uri_segment);
        
        
        $config['first_link'] = '| &lt;';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        
        $config['last_link'] = '&gt;|';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';
        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        
        $config['cur_tag_open'] = '<b>';
        $config['cur_tag_close'] = '</b>';
        
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        
        return $config;
}

function admin_pagination($base_url, $total_rows, $per_page, $uri_segment)
{
        $config = array('base_url' => $base_url, 'total_rows' => $total_rows, 
                'per_page' => $per_page, 'uri_segment' => $uri_segment);
        
        
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="first">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '<li>';
        
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        return $config;
}