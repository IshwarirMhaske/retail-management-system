<?php
class WebModel extends CI_Model {

    public function insert_user($data) {
        $this->db->insert('registrationlist', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            log_message('error', 'Registration insert failed: ' . $this->db->last_query());
            return false;
        }
    }

    public function checkWebLogin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password)); 
        $query = $this->db->get('registrationlist'); 
    
        if ($query->num_rows() == 1) {
            return $query->row(); 
        } else {
            return false;
        }
    }
    

    public function is_email_taken($email) {
        return $this->db->get_where('registrationlist', ['email' => $email])->num_rows() > 0;
    }

    public function get_user_by_email($email) {
        $query = $this->db->get_where('registrationlist', ['email' => $email]);
        return $query->row(); 
    }

    public function check_user_credentials($email, $password) {
        $user = $this->get_user_by_email($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function get_user_by_token($token) {
        $query = $this->db->get_where('registrationlist', ['remember_token' => $token]);
        return $query->row();
    }

    public function store_remember_token($user_id, $token) {
        $this->db->where('id', $user_id);
        $this->db->update('registrationlist', ['remember_token' => $token]);
    }

    public function get_product_by_id($id) {
        $query = $this->db->get_where('products', ['id' => $id]);
        return $query->row_array();
    }
    
    public function insert_order($order_data) {
        $this->db->insert('orders', $order_data);
        return $this->db->insert_id();
    }

    
    public function insert_order_item($data) {
        $this->db->insert('order_items', $data);
    }
    
    public function get_all_products() {
        $this->db->where('stock >', 0);
        return $this->db->get('products')->result_array();
    }

    public function save_order($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    public function save_order_item($data) {
        return $this->db->insert('order_items', $data);
    }
    
    public function get_last_order() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders', 1);
        return $query->row_array();
    }
    
    public function get_product_by_slug($slug) {
        return $this->db->get_where('products', ['slug' => $slug])->row_array();
    }

    public function get_category_by_slug($slug) {
        return $this->db->get_where('categories', ['slug' => $slug])->row_array();
    }        
    
    public function get_products_by_category($category_id) {
        return $this->db->get_where('products', ['category_id' => $category_id])->result_array();
    }
    
    public function get_all_categories() {
        return $this->db->get('categories')->result_array();
    }
    
    // public function add_indoor_plants() {
    //     $data = [
    //         ['name' => 'Ficus Elastica', 'slug' => 'ficus-elastica', 'price' => 12.99, 'image_url' => 'path_to_image/ficus_elastica.jpg', 'description' => 'A popular indoor plant with large, glossy leaves.', 'stock' => 50, 'category_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'is_featured' => 1],
    //         // Add the other plants here similarly
    //     ];
    
    //     return $this->db->insert_batch('products', $data);
    // }
    
}
?>
