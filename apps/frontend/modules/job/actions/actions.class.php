<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */


class jobActions extends sfActions
{
	
  public function executeIndex(sfWebRequest $request)
  {
//     $this->jobeet_jobs = Doctrine_Core::getTable('JobeetJob')
//       ->createQuery('a')
//       ->execute(); 

//   	Above Code Selects Everything While the below uses a WHERE clause Page.. 71

//   	$q = Doctrine_Query::create()
// 	    ->from('JobeetJob j')
//   	->where('j.created_at > ?',	date('Y-m-d H:i:s', time() - 86400 * 30));
//  	$this->jobeet_jobs = $q->execute();
	
// Since The Above Query is somehow a buisness logic So we ll migrate it to JobeetJobTable.class.php in lib/models.. Page 75
  	
  		$this->jobeet_jobs = Doctrine_Core::getTable('JobeetJob')->getActiveJobs();
		
  	
  }

 
  
//  public function executeShow(sfWebRequest $request)
//  {
//	 	 $this->job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id')));
//		 $this->forward404Unless($this->job);
//	}
  
//   public function executeShow(sfWebRequest $request)
//   {
//   	$this->job = $this->getRoute()->getObject();
//   	$this->forward404Unless($this->job);
  	/*
  	 * This Comented function is a replacement for above comented one. after creating a route The route is able to generate a URL 
  	 * based on an object, but it is also able to find the object related to a given URL. The related object can be retrieved with
  	 * the getObject() method of the route object. When parsing an incoming request, the routing stores the matching route object
  	 * for you to use in the actions. 404 error has been thrown for you automatically by the getRoute() method. So, we can simplify.
    */
  	 
//   }
  
  public function executeShow(sfWebRequest $request)
  {
  	$this->job = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetJobForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetJobForm($jobeet_job);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetJobForm($jobeet_job);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_job = Doctrine_Core::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', $request->getParameter('id')));
    $jobeet_job->delete();

    $this->redirect('job/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $jobeet_job = $form->save();

      $this->redirect('job/edit?id='.$jobeet_job->getId());
    }
  }
  
  public function executeRegister(sfWebRequest $request)
  {
  	
  	
  }
  
  
  
}
