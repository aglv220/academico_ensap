<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ENSAP_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/lima');
        $this->load->library('session');
        //$this->load->config('email');
        $this->load->helper('url');
        // $this->load->model('AuditoriaModelo', 'audmod');
        // $this->load->model('NotificacionModelo', 'notifim');
        // $this->load->model('UsuarioModelo', 'userm');
        // $this->load->model('CRUD_Modelo', 'crudm');
    }

    protected function get_SESSID()
    {
        // return $this->session->userdata('SESSION_ID');
    }

    protected function get_meses()
    {
        $array_meses = ["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        return $array_meses;
    }

    protected function generate_token(){
        $r1 = [rand(1389,2787),rand(3036,4668),rand(5187,6798)];
        $r2 = [rand(7641,8315),rand(9961,10544),rand(11319,12634)];
        $r3 = [rand(-8661,-6915),rand(-5761,-3644),rand(-2545,1345)];
        $r4 = [rand(2567,4287),rand(5129,7856),rand(8896,10649)];
        $vr1 = $r1[array_rand($r1)];
        $vr2 = $r2[array_rand($r2)];
        $vr3 = $r3[array_rand($r3)];
        $vr4 = $r4[array_rand($r4)];
        $time = date("ihs");
        $num_rand = rand($vr1,$vr2).$time.rand($vr3,$vr4).$time.rand($vr1,$vr3);
        $encode = $this->encript_data($num_rand);
    }

    protected function llenar_select($lista, $slv = "none")
    {
        // $options_html = "";
        // foreach ($lista as $v) {
        //     $nom_carr = $v->carrera_nombre;
        //     $selected = "";
        //     if ($slv == $nom_carr) {
        //         $selected = "selected";
        //     }
        //     $options_html .= "<option value='" . $nom_carr . "' " . $selected . ">" . $nom_carr . "</option>";
        // }
        // return $options_html;
    }

    protected function is_loged_off()
    {
        // if (!$this->session->userdata('SESSION_CORREO')) {
        //     redirect('inicio-sesion');
        // }
    }

    protected function is_loged_on()
    {
        // if ($this->session->userdata('SESSION_CORREO')) {
        //     $this->audmod->registrar_evento_auditoria(5, $this->session->userdata('SESSION_ID'), 4, "Inicio de sesión", "La sesión del usuario aún se encuentra activa");
        //     redirect('pagina_principal');
        // }
    }

    protected function fecha_y_hora()
    {
        return date('Y-m-d H:i:s');
    }

    protected function fecha()
    {
        return date('Y-m-d');
    }

    protected function cabecera_pagina($data_header = "")
    {
        
        $this->load->view('base/head', $data_header);
        $this->load->view('base/header');
    }

    

    protected function pie_pagina()
    {
        // $this->load->view('base/footer');
        // $this->include_js();
    }

    protected function encript_data($DATA)
    {
        $fase_1 = strrev($DATA);
        $fase_2 = convert_uuencode($fase_1);
        $fase_3 = base64_encode($fase_2);
        $fase_4 = strrev($fase_3);
        return $fase_4;
    }

    protected function decript_data($DATA)
    {
        $fase_1 = strrev($DATA);
        $fase_2 = base64_decode($fase_1);
        $fase_3 = convert_uudecode($fase_2);
        $fase_4 = strrev($fase_3);
        return $fase_4;
    }

    protected function encript_value($value)
    {
        $fase = base64_encode($value);
        return $fase;
    }
}
