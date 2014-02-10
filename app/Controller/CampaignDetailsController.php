<?php
App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * CampaignDetails Controller
 *
 * @property CampaignDetail $CampaignDetail
 */
class CampaignDetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CampaignDetail->recursive = 0;
		$this->set('campaignDetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CampaignDetail->id = $id;
		if (!$this->CampaignDetail->exists()) {
			throw new NotFoundException(__('Invalid campaign detail'));
		}
		$this->set('campaignDetail', $this->CampaignDetail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignDetail->create();
			if ($this->CampaignDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The campaign detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign detail could not be saved. Please, try again.'));
			}
		}
		$campaigns = $this->CampaignDetail->Campaign->find('list');
		$houses = $this->CampaignDetail->House->find('list');
		$this->set(compact('campaigns', 'houses'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CampaignDetail->id = $id;
		if (!$this->CampaignDetail->exists()) {
			throw new NotFoundException(__('Invalid campaign detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CampaignDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The campaign detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign detail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CampaignDetail->read(null, $id);
		}
		$campaigns = $this->CampaignDetail->Campaign->find('list');
		$houses = $this->CampaignDetail->House->find('list');
		$this->set(compact('campaigns', 'houses'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CampaignDetail->id = $id;
		if (!$this->CampaignDetail->exists()) {
			throw new NotFoundException(__('Invalid campaign detail'));
		}
		if ($this->CampaignDetail->delete()) {
			$this->Session->setFlash(__('Campaign detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Campaign detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}       
        
}
