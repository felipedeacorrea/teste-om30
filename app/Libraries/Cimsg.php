<?php

namespace App\Libraries;

/**
 * Gerenciador de Mensagens para Codeigniter (Requer PHP ^7.2)
 *
 * @package		CodeIgniter 4
 * @subpackage	Libraries
 * @category	Message Tools
 * @author		Paulo - paulo@cliqueti.com.br
 * @version     V1.0 (08/2020)
 *
 */
class Cimsg {

    private $title;
    private $text;
    private $icon;
    private $duration;
    private $action;

    public function __construct(int $duration = 2) {
        $this->duration = (int) ($duration * 1000);
    }

    public function __toString():string {
        return $this->json();
    }

    public function duration(int $duration = 2): Cimsg {
        $this->duration = (int) ($duration * 1000);
        return $this;
    }

    public function success(string $text, string $title = null, bool $icon=true):Cimsg {
        $this->text     = $text;
        $this->title    = $title;
        $this->icon     = ($icon ? 'success' : null);
        return $this;
    }

    public function info(string $text, string $title = null, bool $icon=true):Cimsg {
        $this->text     = $text;
        $this->title    = $title;
        $this->icon     = ($icon ? 'info' : null);
        return $this;
    }

    public function warning(string $text, string $title = null, bool $icon=true):Cimsg {
        $this->text     = $text;
        $this->title    = $title;
        $this->icon     = ($icon ? 'warning' : null);
        return $this;
    }

    public function error(string $text, string $title = null, bool $icon=true):Cimsg {
        $this->text     = $text;
        $this->title    = $title;
        $this->icon     = ($icon ? 'error' : null);
        return $this;
    }

    public function action(string $rule, $data):Cimsg {
        $this->action[] = [
            'rule' => $rule,
            'data' => $data
        ];
        return $this;
    }

    public function flash() {
        /* Persiste Mensagem */
        $session = \Config\Services::session();
        $session->setFlashdata('cimsg',
            [
                'title'     => $this->title,
                'text'      => $this->text,
                'icon'      => $this->icon,
                'duration'  => $this->duration
            ]
        );
    }

    public function getFlash() {
        $session = \Config\Services::session();
        return json_encode(($session->getFlashdata('cimsg')??null));
    }

    public function json() {
        return json_encode([
            'message' => [
                'title'     => $this->title,
                'text'      => $this->text,
                'icon'      => $this->icon,
                'duration'  => $this->duration
            ],
            'action' => $this->action
        ]);
    }
}
