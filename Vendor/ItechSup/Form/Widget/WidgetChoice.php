<?php

namespace ItechSup\Form\Widget;

/**
 * This widget enable the build differente type list.
 * This type are :
 * <ul>
 * <li>simple list</li>
 * <li>list with multiple choice</li>
 * <li>list button radio (list expanded)</li>
 * <li>list button checkbox (list expanded with multiple choice)</li>
 * </ul>.
 */
class WidgetChoice extends BaseWidgetElement
{
    protected $type = 'choice';
    protected $typeList = '';
    protected $choiceValue = array();
    protected $isExpanded = false;
    protected $isMappable = true;
    protected $field = '';

    /**
     * if true the list is multiple else if false is not multiple.
     *
     * @return bool
     */
    public function isMultiple()
    {
        return isset($this->listAttribut['multiple']);
    }

    /**
     * if true the list is multiple else if false is not multiple.
     *
     * @param valeur boolean
     */
    public function setMultiple($isMultiple)
    {
        if ($isMultiple === false && isset($this->listAttribut['multiple'])) {
            unset($this->listAttribut['multiple']);
        } elseif ($isMultiple === true) {
            $this->listAttribut['multiple'] = '';
        }
    }

    /**
     * if true the list is expanded else if false is not expnded.
     *
     * @return bool
     */
    public function isExpanded()
    {
        return $this->isExpanded;
    }

    /**
     * 	if true the list is expanded else if false is not expnded.
     *
     * @param bool
     */
    public function setExpanded($isExpanded)
    {
        $this->isExpanded = $isExpanded;
    }

    /**
     * add fields in the list.
     *
     * @param field's list
     */
    public function setChoiceValue(array $choiceValue)
    {
        $this->choiceValue = array_merge($this->choiceValue, $choiceValue);
    }

    /**
     * add a field in the list.
     *
     * @param nom du champ
     * @param valeur du champs
     */
    public function addChoiceValue($nameValue, $value)
    {
        $this->choiceValue = array_merge($nameValue, $value);
    }

    /**
     * delete a field in the list.
     *
     * @param name's field
     */
    public function removeChoiceValue($nameValue)
    {
        unset($this->choiceValue[$nameValue]);
    }

    /**
     * clear the list.
     */
    public function clearChoiceValue()
    {
        $this->choiceValue = array();
    }

    /**
     * return the list renderer.
     *
     * @return ViewElementWidget
     */
    public function getRenderWidget()
    {
        if (empty($this->render)) {
            if ($this->isExpanded && $this->isMultiple()) {
                $this->typeList = 'checkbox';
                $this->getListCheck();
            } elseif ($this->isExpanded && !$this->isMultiple()) {
                $this->typeList = 'radio';
                $this->getListCheck();
            } elseif (!$this->isExpanded && $this->isMultiple()) {
                $this->getListSelect();
            } elseif (!$this->isExpanded && !$this->isMultiple()) {
                $this->getListSelect();
            }
        }
        $errors = [];
        if ($this->getValidator()) {
            $errors = $this->getValidator()->getListErrors();
        }
        $this->render = $this->getViewElement($this->field, $errors);

        return $this->render;
    }

    /**
     * build the simple list  or multiple choices.
     */
    public function getListSelect()
    {
        $nameList = $this->name;
        if ($this->isMultiple()) {
            $nameList .= '[]';
        }
        $this->field = '<select name='.$nameList.' '.$this->listStrAttribut.'>';
        foreach ($this->choiceValue as $name => $value) {
            $selected = '';
            if ($this->isSelected($value)) {
                $selected = 'selected';
            }
            $this->field .= "<option value='".$value."' ".$selected.'>'.$name.'</option>';
        }
        $this->field .= '</select>';
    }

    /**
     * build extended list or extended with multiple choices.
     */
    public function getListCheck()
    {
        $nameList = $this->name;
        if ($this->isMultiple()) {
            $nameList .= '[]';
        }
        foreach ($this->choiceValue as $name => $value) {
            $isChecked = '';
            if ($this->isSelected($value)) {
                $isChecked = 'checked';
            }
            $this->field .= '<label>'.$name."</label><input name='".$nameList
                    ."' value='".$value."'"
                    .' '.$isChecked
                    ." type='".$this->typeList."' "
                    .$this->listStrAttribut
                    .' />';
        }
    }

    /**
     * check if value is selected in the list.
     *
     * @return bool
     */
    private function isSelected($value)
    {
        $isSelected = false;
        if ($value == $this->value) {
            $isSelected = true;
        } elseif ($this->isMultiple() && is_array($this->value)) {
            if (array_search($value, $this->value) !== false) {
                $isSelected = true;
            }
        }

        return $isSelected;
    }
}
