/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Defined javascript base url
    var url = 2;
    var base_url = '';
    var base_segment = '/water/index.php/admin/';
    switch (url) {
        case 1:
            base_url = 'http://localhost' + base_segment;
            break;
        case 2 :
            base_url = 'http://practice.com' + base_segment;
            break;
        default:
            base_url = 'http://localhost' + base_segment;
            
    }
    