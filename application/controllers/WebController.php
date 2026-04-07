<?php
final class WebController extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['form', 'cookie', 'url']);
        $this->load->model('WebModel');

        if (!$this->session->userdata('user_id') && $this->input->cookie('remember_token')) {
            $token = $this->input->cookie('remember_token');
            $user = $this->WebModel->get_user_by_token($token);
            
            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('email', $user->email);
            }
        }
    }

    private function check_login() {
        if (!$this->session->userdata('user_id')) {
            redirect(site_url('homeafter'));
        }
    }

    
    public function homeafter() {
        $data['user_name'] = $this->session->userdata('web_user_name');
        $this->load->view('web/homeafter', $data);
    }    
    

    public function aboutus() {
        $this->check_login();
        $data['content'] = 'web/aboutus';
        $this->load->view('web/aboutus', $data);
    }

    public function contact() {
        $this->check_login();
        $data['content'] = 'web/contact';
        $this->load->view('web/contact', $data);
    }

    public function web_login_page() {
        $this->load->view('web/login');
    }

    public function web_register_page() {
        $this->load->view('web/register');
    }

    public function web_register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm = $this->input->post('confirm_password');
    
            if ($password !== $confirm) {
                $this->session->set_flashdata('error', 'Passwords do not match.');
                redirect(site_url('register'));
            }
    
            if ($this->WebModel->is_email_taken($email)) {
                $this->session->set_flashdata('error', 'Email is already registered.');
                redirect(site_url('register'));
            }
    

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password
            ];
    
            if ($this->WebModel->insert_user($data)) {
                $this->session->set_flashdata('msg', 'Registration successful. Please log in.');
                redirect(site_url('login'));
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Try again.');
                redirect(site_url('register'));
            }
        } else {
            $this->load->view('web/register');
        }
    }
    

    public function web_login() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = $this->input->post('email', TRUE);  
            $password = $this->input->post('password');
    
            if (empty($email) || empty($password)) {
                $this->session->set_flashdata('error', 'Email and password are required.');
                redirect(site_url('login'));
                return;
            }
    
            $user = $this->WebModel->get_user_by_email($email);
    
            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata([
                    'user_id'        => $user->user_id, // add this for consistency
                    'web_user_id'    => $user->user_id,
                    'web_user_name'  => $user->username,
                    'web_user_email' => $user->email,
                    'web_login'      => true
                ]);                
            
                // ✅ Check if redirect was set (e.g., to place_order)
                $redirect = $this->session->flashdata('redirect_after_login');
                if ($redirect) {
                    redirect(site_url($redirect));
                } else {
                    redirect(site_url('place-order'));
                }
            }            
        } else {
            show_404();
        }
    }
    

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('homeafter'));
    }
    
    
    public function shop() {
        $this->load->model('WebModel');
        $data['categories'] = $this->WebModel->get_all_categories();
        $this->load->view('web/shop', $data);
    }       
    
    
    public function product_details($slug) {
        $this->load->model('WebModel');
        $product = $this->WebModel->get_product_by_slug($slug);
    
        if (!$product) {
            show_404(); 
        }
    
        $data['product'] = $product;
        $this->load->view('web/product_details', $data);
    }    
    
    
    public function add_to_cart() {
        $product_id = $this->input->post('product_id');
        $quantity = (int) $this->input->post('quantity');
    
        $product = $this->WebModel->get_product_by_id($product_id);
    
        if ($product) {
            $cart = $this->session->userdata('cart') ?? [];
    
            $found = false;
            foreach ($cart as &$item) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] += $quantity; 
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $cart[] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    'image_url' => $product['image_url'] ?? 'default.jpg', 
                ];
            }
    
            $this->session->set_userdata('cart', $cart);
        } else {
            redirect('shop'); 
            return;
        }
    
        redirect('view-cart');
    }
    
       
    
    public function view_cart() {
        $cart = $this->session->userdata('cart');
        
        if (!$cart) {
            $cart = [];
        }
    
        $total_amount = 0;
        foreach ($cart as $item) {
            $total_amount += $item['price'] * $item['quantity'];
        }
    
        $data['cart'] = $cart;
        $data['total_amount'] = $total_amount;
        
        $this->load->view('web/view_cart', $data);
    }

    public function update_cart() {
        $cart = $this->session->userdata('cart');
    
        if (!$cart) {
            redirect('view-cart'); 
        }
    
        $quantities = $this->input->post('quantity'); 
    
        foreach ($quantities as $key => $quantity) {
            if ($quantity > 0) {
                $cart[$key]['quantity'] = $quantity; 
            } else {
                unset($cart[$key]); 
            }
        }
    
        $this->session->set_userdata('cart', $cart);
    
        redirect('view-cart');
    }
       
    
    
    public function remove_cart_item($key) {
        $cart = $this->session->userdata('cart');
    
        if (isset($cart[$key])) {
            unset($cart[$key]);
        }
    
        $this->session->set_userdata('cart', $cart);
    
        redirect('view-cart');
    }
    
    
    
    public function checkout() {
        $data['cart'] = $this->session->userdata('cart') ?? [];
        $this->load->view('web/checkout', $data);
    }
    

    public function place_order() {
        // ✅ Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('redirect_after_login', 'WebController/place_order');
            redirect('login');
            return;
        }
    
        // ✅ Show form if it's a GET request
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->load->view('web/placeorder');
            return;
        }
    
        // ✅ Proceed with form submission (POST request)
        $cart = $this->session->userdata('cart');
        if (empty($cart)) {
            echo "Your cart is empty!";
            return;
        }
    
        $total_amount = $this->calculate_total_amount($cart);
    
        $customer_name = $this->input->post('customer_name');
        $email = $this->input->post('email', TRUE); // TRUE enables XSS filtering
        $phone = preg_replace('/[^0-9]/', '', $this->input->post('phone')); // digits only
        $address = $this->input->post('address');
    
        if (empty($customer_name) || empty($email) || empty($phone) || empty($address)) {
            echo "Please fill out all required fields.";
            return;
        }
    
        $order_data = [
            'customer_name' => $customer_name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'total_amount' => $total_amount,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        $order_id = $this->WebModel->insert_order($order_data);
    
        if ($order_id) {
            $this->add_order_items($order_id);
            $this->session->unset_userdata('cart'); // ✅ Clear cart after success
            redirect('order-success');
        } else {
            echo "There was an error placing your order.";
        }
    }
    
    
    
    
    public function order_success() {
        $order = $this->WebModel->get_last_order();  
    
        $this->load->view('web/order_success', ['order' => $order]);
    }
       
    
        
    public function order_history() {
        $this->load->model('WebModel');
        
        $user_id = $this->session->userdata('user_id');
        
        if ($user_id) {
            $data['orders'] = $this->WebModel->get_orders_by_user($user_id);
            $this->load->view('web/order_history', $data);
        } else {
            redirect('login'); 
        }
    }
    
    public function save_order($order_data) {
        $this->db->insert('orders', $order_data);
        
        return $this->db->insert_id();
    }
    

    public function calculate_total_amount($cart_items) {
        $total = 0;
        
        foreach ($cart_items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return $total;
    }
    
    public function add_order_items($order_id)
    {
        $cart = $this->session->userdata('cart');
        
        if ($cart) {
            foreach ($cart as $item) {
                if (isset($item['id'])) {
                    $order_item_data = [
                        'order_id' => $order_id,
                        'product_id' => $item['id'], 
                        'quantity' => $item['quantity'],
                        'price' => $item['price']
                    ];   
                    $this->WebModel->insert_order_item($order_item_data);
                } else {
                    log_message('error', 'Cart item missing "id": ' . print_r($item, true));
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Your cart is empty.');
            redirect('view-cart');

        }
    }
    
    public function category($slug) {
        $this->load->model('WebModel');
        $category = $this->WebModel->get_category_by_slug($slug);
    
        if (!$category) {
            show_404();
        }
    
        $data['current_category'] = $category['name'];
        $data['products'] = $this->WebModel->get_products_by_category($category['id']);
        $data['categories'] = $this->WebModel->get_all_categories();
    
        $this->load->view('web/category_products', $data);
    }
    
    public function add_plants() {
        $this->load->model('Product_model');
        $this->Product_model->add_indoor_plants();
        echo "Indoor plants added successfully!";
    }    

    
    public function details($slug) {
        $data['product'] = $this->WebModel->get_product_by_slug($slug);

        if (!$data['product']) {
            show_404(); 
        }

        $this->load->view('web/product_details', $data);
    }

}
