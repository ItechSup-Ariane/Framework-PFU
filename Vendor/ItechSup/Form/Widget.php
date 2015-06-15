<?php

namespace ItechSup\Form;

/**
 *  The element widget is basic class element for a form.
 */
abstract class Widget
{
    protected $name;
    protected $listAttribut = array();
    protected $listStrAttribut = '';
    protected $listErrorAttribut = array();
    protected $listStrErrorAttribut = '';
    protected $isGroupWidget;
    protected $isMappable;

    /**
     * get the name's widget.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set the name's widget.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * return list's attribut.
     *
     * @return array
     */
    public function getAttributs()
    {
        return $this->listAttribut;
    }

    /**
     * set a list attribut.
     *
     * @param array $listAttribut
     */
    public function setAttributs(array $listAttribut)
    {
        $this->listAttribut = array_merge($this->listAttribut, $listAttribut);
    }

    /**
     * clear the list attribut.
     */
    public function clearAttributs()
    {
        $this->listAttribut = array();
    }

    /**
     * get a attribut.
     *
     * @param string $nameAttr
     *
     * @return string
     */
    public function getAttribut($nameAttr)
    {
        return $this->listAttribut[$nameAttr];
    }

    /**
     * set a attribut.
     *
     * @param string $nameAttr  name's attribut
     * @param string $valueAttr value's attribut
     */
    public function setAttribut($nameAttr, $valueAttr)
    {
        $this->listAttribut[$nameAttr] = $valueAttr;
    }

    /**
     * check if attribut exist.
     *
     * @param string $nameAttr name's attribut
     *
     * @return string
     */
    public function hasAttribut($nameAttr)
    {
        return isset($this->listAttribut[$nameAttr]);
    }

    /**
     * Remove a attribut.
     *
     * @param string $nameAttr name's attribut
     *
     * @return string
     */
    public function removeAttribut($nameAttr)
    {
        return isset($this->listAttribut[$nameAttr]);
    }

    /**
     * get list error attribut.
     *
     * @return array
     */
    public function getErrorAttributs()
    {
        return $this->listErrorAttribut;
    }

    /**
     * set list error attribut.
     *
     * @param array $listAttribut
     */
    public function setErrorAttributs(array $listAttribut)
    {
        $this->listErrorAttribut = array_merge($this->listErrorAttribut, $listAttribut);
    }

    /**
     * clear list error attribut.
     */
    public function clearErrorAttributs()
    {
        $this->listErrorAttribut = array();
    }

    /**
     * get a error attribut.
     *
     * @param string $nameAttr name's attribut
     *
     * @return string
     */
    public function getErrorAttribut($nameAttr)
    {
        return $this->listErrorAttribut[$nameAttr];
    }

    /**
     * set a error attribut.
     *
     * @param string $nameAttr  name's attribut
     * @param string $valueAttr value's attribut
     *
     * @return string
     */
    public function setErrorAttribut($nameAttr, $valueAttr)
    {
        return $this->listErrorAttribut[$nameAttr] = $valueAttr;
    }

    /**
     * check if attribut exist.
     *
     * @param string $nameAttr name's attribut
     *
     * @return bool
     */
    public function hasErrorAttribut($nameAttr)
    {
        return isset($this->listErrorAttribut[$nameAttr]);
    }

    /**
     * Remove a attribut.
     *
     * @param string $nameAttr name's attribut
     *
     * @return string
     */
    public function removeErrorAttribut($nameAttr)
    {
        return isset($this->listErrorAttribut[$nameAttr]);
    }

    /**
     * prepare the lists attribut.
     */
    protected function prepareAttribut()
    {
        foreach ($this->listAttribut as $attr => $value) {
            $this->listStrAttribut .= ' '.$attr."='".$value."'";
        }
        foreach ($this->listErrorAttribut as $attr => $value) {
            $this->listStrErrorAttribut .= ' '.$attr."='".$value."'";
        }
    }

    /**
     * check if the widget is a groupWidget.
     *
     * @return bool
     */
    public function isGroupWidget()
    {
        return $this->isGroupWidget;
    }

    /**
     * check if the widget is mappable.
     *
     * @return true
     */
    public function isMappable()
    {
        return $this->isMappable;
    }

    /**
     * check if widget is valid.
     */
    abstract public function isValid();
}
