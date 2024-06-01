<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Retorna informações do emitente
    public function getEmitenteInfo() {
        return $this->db->get('emitente')->row_array();
    }

    // Retorna uma lista de produtos aleatórios
    public function getProdutosAleatorios($quantidade) {
        $this->db->where('exibir', 1);
        $this->db->order_by('RAND()');
        $this->db->limit($quantidade);
        return $this->db->get('produtos')->result_array();
    }

    // Retorna uma lista de produtos com limite e offset, opcionalmente pesquisando por descrição
    public function getProdutos($quantidade, $offset, $pesquisa = '') {
        $this->db->limit($quantidade, $offset);
        if (!empty($pesquisa)) {
            $this->db->like('descricao', $pesquisa);
        }
        $this->db->where('exibir', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    // Retorna os detalhes de um produto com base no ID
    public function getProdutoPorId($idProduto) {
        $this->db->where('exibir', 1);
        return $this->db->get_where('produtos', ['idProdutos' => $idProduto])->row_array();
    }
    
    // Pesquisa produtos por termo de pesquisa, com limite e offset
    public function pesquisarProdutos($termo, $limit, $offset) {
        $this->db->like('descricao', $termo);
        $this->db->limit($limit, $offset);
        $this->db->where('exibir', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    // Conta o total de produtos
    public function contarProdutos($pesquisa = '') {
        if (!empty($pesquisa)) {
            $this->db->like('descricao', $pesquisa);
        }
        $this->db->where('exibir', 1);
        return $this->db->count_all_results('produtos');
    }
    
    // Busca ordens de serviço por número de série
    public function buscarOS($serial) {
        return $this->db->get_where('os', ['serial' => $serial])->result_array();
    }
    
    // Busca ordens de serviço por parte do número de série
    public function buscarOsPorSerial($serial) {
        $this->db->like('serial', $serial);
        return $this->db->get('os')->result_array();
    }
    
    // Insere um novo RMA no banco de dados
    public function inserir_rma($dados_rma, $equipamentos) {
        $this->db->insert('rma', $dados_rma);
        $id_rma = $this->db->insert_id();
    
        foreach ($equipamentos as $equipamento) {
            $equipamento['id_rma'] = $id_rma;
            $this->db->insert('equipamentos_rma', $equipamento);
        }
    }
    
    // Processa o envio de um novo RMA
    public function enviar_rma() {
        $dados_rma = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone')
        );
        $equipamentos = $this->input->post('equipamentos');
        $this->inserir_rma($dados_rma, $equipamentos);
        redirect('home');
    }
    
    // Retorna todas as RMAs
    public function get_all_rmas() {
        return $this->db->get('rma')->result_array();
    }

}
?>
