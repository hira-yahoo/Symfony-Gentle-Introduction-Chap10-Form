<?php

/**
 * foo actions.
 *
 * @package    propel_skeleton
 * @subpackage foo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fooActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeContact(sfWebRequest $request)
  {
    $years = range(1950, 1990);
    $form = new sfForm();
    $form->setWidget('dob', new sfWidgetFormDate(array(
        'label'   => 'Date of birth',
        'default' => '01/01/1950',  // タイムスタンプか、strtotime() で認識可能な文字列
        'years'   => array_combine($years, $years)
    )));

    $form->setWidget('start', new sfWidgetFormTime(array('default' => '12:00')));
    $form->setWidget('end', new sfWidgetFormDateTime(array('default' => '01/01/2008 12:00')));

    $this->form = $form;

/*
//     $this->forward('default', 'module');
    if ($request->isMethod('post'))
    {
      $this->section_id = $request->getParameter('section_id');
      return $this->setTemplate('result');
    }


$articleForm = new sfForm();
$articleForm->setWidgets(array(
  'id'        => new sfWidgetFormInputHidden(),
  'title'     => new sfWidgetFormInputText(),
  'section_id' => new sfWidgetFormPropelChoice(array(
    'model'  => 'Section',
//     'column' => 'name'
  )
)));

$this->form = $articleForm;
 */


/*
    $this->form->setWidgets(array(
      'name'    => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(array('default' => 'me@example.com')),
      'subject' => new sfWidgetFormChoice(array('choices' => array('Subject A', 'Subject B', 'Subject C'))),
      'message' => new sfWidgetFormTextarea(),
    ));
 */
  }


  public function executeUsingPropelChoice(sfWebRequest $request)
  {
    //     $this->forward('default', 'module');
    if ($request->isMethod('post'))
    {
      $this->section_id = $request->getParameter('section_id');
      return $this->setTemplate('usingPropelChoiceResult');
    }


    $articleForm = new sfForm();
    $articleForm->setWidgets(array(
        'id'        => new sfWidgetFormInputHidden(),
        'title'     => new sfWidgetFormInputText(),
        'section_id' => new sfWidgetFormPropelChoice(array(
            'model'  => 'Section',
            //     'column' => 'name'
        )
        )));

    $this->form = $articleForm;
    /*
     $this->form->setWidgets(array(
         'name'    => new sfWidgetFormInputText(),
         'email'   => new sfWidgetFormInputText(array('default' => 'me@example.com')),
         'subject' => new sfWidgetFormChoice(array('choices' => array('Subject A', 'Subject B', 'Subject C'))),
         'message' => new sfWidgetFormTextarea(),
     ));
    */
  }

}
