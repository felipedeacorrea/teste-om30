<?php

namespace App\Libraries;

/**
 * Classe utilizada para auxiliar na criação de botões
 * dentro da controller (Requer PHP ^7.2)
 *
 * @package		CodeIgniter 4
 * @subpackage	Libraries
 * @category	Other Tools
 * @author		Paulo - paulo@cliqueti.com.br
 * @version     V1.0 (08/2020)
 *
 */
class Cibuttons {

    /** @var string */
    private $layout;
    /** @var string */
    private $label;
    /** @var string */
    private $icon;
    /** @var string */
    private $link;
    /** @var string */
    private $type;
    /** @var string */
    private $class;
    /** @var string */
    private $others;

    /**
     * No momento desta versão, as opções de botões pré-determinados sao:
     *  -> btn-bootstrap
     *  -> link-bootstrap
     * Mas você criar seu proprio layout informando a tag button manualmente.
     * Contudo você deve criar ancoras no seu layout para que sejam substituidas posterioemnte.
     * As opções de ancoras (importante: devem estar entre #) são:
     *  -> #label#
     *  -> #icon#
     *  -> #link#
     *  -> #type#
     *  -> #class#
     *
     * Ex: <button type=\" #type# \" class=\" #class# \"> #icon# #label# </button>
     *
     * @param string|null $layout
     */
    public function __construct(string $layout = null) {
        if($layout){
            $this->layout($layout);
        }
    }

    public function __toString():string {
        return $this->html();
    }

    /**
     * @return string
     */
    public function getLayout(): string {
        return $this->layout;
    }

    /**
     * @param string $layout
     * @return $this
     */
    public function layout(string $layout):Cibuttons {
        switch ($layout){
            case 'btn-bootstrap':
                $this->layout = "<button type=\"#type#\" #others# class=\"#class#\"> #icon# #label# </button>";
                break;

            case 'link-bootstrap':
                $this->layout = "<a href=\"#link#\" #others# class=\"#class#\" style='display: inline-block'>#label#</a>";
                break;

            default:
                $this->layout = $layout;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function label(string $label): Cibuttons {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): Cibuttons {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string {
        return $this->link;
    }

    /**
     * @param string $link
     * @return $this
     */
    public function link(string $link): Cibuttons {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function type(string $type): Cibuttons {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(): string {
        return $this->class;
    }

    /**
     * @param string $class
     * @return Cibuttons
     */
    public function class(string $class): Cibuttons {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    public function getOthers(): string {
        return $this->others;
    }

    public function others(string $others): Cibuttons {
        $this->others = $others;
        return $this;
    }

    /**
     * @param array $opt
     * @return $this
     */
    public function options(array $opt): Cibuttons {
        if(!empty($opt['layout']))  { $this->layout = $opt['layout']; }
        if(!empty($opt['label']))   { $this->label  = $opt['label']; }
        if(!empty($opt['icon']))    { $this->icon   = $opt['icon']; }
        if(!empty($opt['link']))    { $this->label  = $opt['link']; }
        if(!empty($opt['type']))    { $this->type   = $opt['type']; }
        if(!empty($opt['class']))   { $this->class  = $opt['class']; }
        if(!empty($opt['others']))  { $this->others = $opt['others']; }
        return $this;
    }

    /**
     * @return string
     */
    public function html(): string {
        $html = $this->layout;
        $html = str_replace('#label#'   , $this->label  , $html);
        $html = str_replace('#icon#'    , $this->icon   , $html);
        $html = str_replace('#link#'    , $this->link   , $html);
        $html = str_replace('#type#'    , $this->type   , $html);
        $html = str_replace('#class#'   , $this->class  , $html);
        $html = str_replace('#others#'  , $this->others , $html);
        return $html;
    }








}