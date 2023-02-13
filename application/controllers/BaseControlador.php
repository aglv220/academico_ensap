<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseControlador extends ENSAP_Controller
{
    public $modsis = 5;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/lima');
        $this->load->library('session');
        // $this->load->model('UsuarioModelo', 'usuariom');
        // $this->load->model('AuditoriaModelo', 'audmod');
        // $this->load->model('CRUD_Modelo', 'crudm');
    }

    public function index()
    {
        //$this->is_loged_on();
        // $data_header['title_page'] = 'Inicio de sesión';
        //$this->load->view('base/head');
        $this->load->view('login');
        // $this->include_js();
    }

    

    public function iniciar_sesion()
    {
        // $return_msg = "";
        // $this->usuariom->correo = $this->input->post("usuario_correo");
        // $this->usuariom->password = $this->input->post("usuario_clave");
        // $lst_login = $this->usuariom->inicio_sesion($this->usuariom->correo);
        // if (count($lst_login) > 0) {
        //     foreach ($lst_login as $row) {
        //         $id_usuario = $row->ID;
        //         $registro_completo = $row->usuario_regcomp;
        //         if (password_verify($this->usuariom->password, $row->usuario_password)) {
        //             if ($registro_completo == 0) { //NO HA COMPLETADO EL REGISTRO
        //                 $correo_cod = base64_encode($this->usuariom->correo);
        //                 $return_msg = $correo_cod;
        //             } else { // SI EL USUARIO HA CAMPLETADO EL REGISTRO ANTERIORMENTE
        //                 $ROWDATA['SESSION_CORREO'] = $row->usuario_correo;
        //                 $ROWDATA['SESSION_NOMBRES'] = $row->alumno_nombre;
        //                 $ROWDATA['SESSION_APELLIDOS'] = $row->alumno_apellidos;
        //                 $ROWDATA['SESSION_ID'] = $id_usuario;
        //                 $this->session->set_userdata($ROWDATA);
        //                 $return_msg = true;
        //                 $this->audmod->registrar_evento_auditoria($this->modsis, $id_usuario, 4, "Inicio de sesión", "El usuario ha iniciado sesión en el sistema");
        //                 $this->usuariom->establecer_configuracion($id_usuario);
        //             }
        //         } else {
        //             $return_msg = false;
        //         }
        //     }
        // } else {
        //     $return_msg = false;
        // }
        // echo $return_msg;
    }

    public function cerrar_sesion()
    {
        // if ($this->session->userdata('SESSION_CORREO')) {
        //     $this->audmod->registrar_evento_auditoria($this->modsis, $this->session->userdata('SESSION_ID'), 5, "Cierre de sesión", "El usuario ha cerrado sesión en el sistema");
        //     $this->session->sess_destroy();
        //     redirect(base_url() . "inicio-sesion");
        // }
    }
}
