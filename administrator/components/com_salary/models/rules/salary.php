<?php
defined('_JEXEC') or die;
jimport('joomla.form.formrule');

class JFormRuleSalary extends JFormRule
{
    protected $regex = '^\d*\.{0,1}\d*$';
}