<?php

class PaginateDesign {
    
    public function bootstrapPagination(){
        $config = array(
            'full_tag_open' => '<div class="text-center"><ul class="pagination">',
            'full_tag_close' => '</ul></div>',
            'first_link' => false,
            'last_link' => false,
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'prev_link' => '&laquo',
            'prev_tag_open' => '<li class="prev">',
            'prev_tag_close' => '</li>',
            'next_link' => '&raquo',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>'
        );
        return $config;
    }
    
}