<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library(array('pagination', 'form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        $data['produtos'] = $this->Home_model->getProdutosAleatorios(8);
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();  
        
        if (!isset($data['row_emitente'])) {
            $data['row_emitente'] = [];
        }
    
        // Load views
        $this->load->view('home/tema/header', $data);
        $this->load->view('home/tema/banner', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/tema/footer', $data);
    }
    
    public function produtos() {
        $pagina = $this->input->get('pagina');
        $pesquisa = $this->input->get('pesquisa');
        $this->listarProdutos($pagina, $pesquisa);
    }

    public function pesquisa() {
        $termo_pesquisa = $this->input->get('pesquisa');
        $this->pesquisarProdutos($termo_pesquisa);
    }

    public function pesquisarProdutos($termo_pesquisa) {
        $limit = 12;
        $offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;

        $data['produtos'] = $this->Home_model->pesquisarProdutos($termo_pesquisa, $limit, $offset);
        $total_produtos = $this->Home_model->contarProdutos($termo_pesquisa);
        
        $config['base_url'] = base_url('home/pesquisa');
        $config['total_rows'] = $total_produtos;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['total_paginas'] = ceil($total_produtos / $limit);
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();

        $this->load->view('home/tema/header', $data);
        $this->load->view('home/pesquisa', $data);
        $this->load->view('home/tema/footer', $data);
    }
    
    public function listarProdutos($pagina = 1, $pesquisa = '') {
        // Verifica se o parâmetro ?pagina está presente na URL
        if ($this->input->get('pagina') === false) {
            redirect(base_url('home'));
        }
    
        $limit = 12;
        $offset = ($pagina - 1) * $limit;
    
        $data['produtos'] = $this->Home_model->getProdutos($limit, $offset, $pesquisa);
        $total_produtos = $this->Home_model->contarProdutos($pesquisa);
        
        $config['base_url'] = base_url('home/produtos');
        $config['total_rows'] = $total_produtos;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['total_paginas'] = ceil($total_produtos / $limit);
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
        
        $this->load->view('home/tema/header', $data);
        $this->load->view('home/produtos', $data);
        $this->load->view('home/tema/footer', $data);
    }
    
    public function detalhes($id_produto = null) {
        // Verifica se o $id_produto foi passado
        if ($id_produto !== null) {
            $data['produto'] = $this->Home_model->getProdutoPorId($id_produto);
            $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
    
            // Verifica se a função getConfiguracaoInfo() existe antes de chamá-la
            if (method_exists($this->Home_model, 'getConfiguracaoInfo')) {
                $data['row_configuracao'] = $this->Home_model->getConfiguracaoInfo();
            }
    
            $this->load->view('home/tema/header', $data);
            $this->load->view('home/detalhes', $data);
            $this->load->view('home/tema/footer', $data);
        } else {
            // Redireciona para a página inicial
            redirect(base_url('home'));
        }
    }
    
    public function consulta() {
        $data = array();
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
    
        $serial = $this->input->post('serial');
    
        if(!empty($serial)) {
            // Usa o modelo de consulta para buscar os dados no banco de dados
            $data['os'] = $this->Home_model->buscarOsPorSerial($serial);
    
            // Verifica se foram encontrados resultados
            if (!empty($data['os'])) {
                // Se houver resultados, carrega a view 'consulta/consulta' com os dados encontrados
                $this->load->view('home/tema/header',$data);
                $this->load->view('home/consulta', $data);
                $this->load->view('home/tema/footer', $data);
            } else {
                // Se não houver resultados, define uma mensagem de erro
                $data['mensagem'] = 'Nenhum resultado encontrado para o número de série fornecido.';
                // Carrega a view 'consulta/consulta' com a mensagem de erro
                $this->load->view('home/tema/header',$data);
                $this->load->view('home/consulta', $data);
                $this->load->view('home/tema/footer', $data);
            }
        } else {
            // Se nenhum número de série foi fornecido via POST, carrega a view 'consulta/consulta' sem dados
            $this->load->view('home/tema/header',$data);
            $this->load->view('home/consulta', $data);
            $this->load->view('home/tema/footer', $data);
        }
    }
    

    public function rma() {
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
        $this->load->view('home/tema/header', $data);
        $this->load->view('home/rma', $data);
        $this->load->view('home/tema/footer', $data);
    }
    
    public function enviar_rma() {
        $dados_rma = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone')
        );
    
        $equipamentos = $this->input->post('equipamentos');
    
        $this->Home_model->enviar_rma($dados_rma, $equipamentos);
        
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
        redirect('rma_enviado'); // Redireciona para a página de confirmação
    }

    public function rma_consulta() {
        $data['rmas'] = $this->Home_model->get_all_rmas();
        
        $data['row_emitente'] = $this->Home_model->getEmitenteInfo();
        $this->load->view('home/tema/header', $data);
        $this->load->view('rma/rma_consulta', $data);
        $this->load->view('home/tema/footer', $data);
    }
    
    public function adicionar_ao_carrinho() {
        // Lógica para adicionar ao carrinho aqui
        // Retorne a resposta JSON correta
        $response = array(
            'status' => 'success',
            'message' => 'Produto adicionado ao carrinho com sucesso!'
        );
        echo json_encode($response);
    }

    public function carrinho() {
        $data['produtos_no_carrinho'] = array();
        
        // Verifica se há produtos no carrinho na sessão
        if($this->session->has_userdata('carrinho')) {
            // Obtém os IDs dos produtos do carrinho da sessão
            $produtos_ids = $this->session->userdata('carrinho');
            
            // Obtém detalhes dos produtos com base nos IDs
            foreach($produtos_ids as $produto_id) {
                $produto = $this->Home_model->getProdutoPorId($produto_id);
                if($produto) {
                    $data['produtos_no_carrinho'][] = $produto;
                }
            }
        }
        
        // Carrega a visualização do carrinho
        $this->load->view('home/tema/header', $data);
        $this->load->view('home/carrinho', $data);
        $this->load->view('home/tema/footer', $data);
    }
}
