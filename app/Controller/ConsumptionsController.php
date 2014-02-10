<?php
App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * Consumptions Controller
 *
 * @property Consumption $Consumption
 */
class ConsumptionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Consumption->recursive = 0;
		$this->set('consumptions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Consumption->id = $id;
		if (!$this->Consumption->exists()) {
			throw new NotFoundException(__('Invalid consumption'));
		}
		$this->set('consumption', $this->Consumption->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Consumption->create();
			if ($this->Consumption->save($this->request->data)) {
				$this->Session->setFlash(__('The consumption has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consumption could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Consumption->id = $id;
		if (!$this->Consumption->exists()) {
			throw new NotFoundException(__('Invalid consumption'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Consumption->save($this->request->data)) {
				$this->Session->setFlash(__('The consumption has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consumption could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Consumption->read(null, $id);
		}
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
		$this->Consumption->id = $id;
		if (!$this->Consumption->exists()) {
			throw new NotFoundException(__('Invalid consumption'));
		}
		if ($this->Consumption->delete()) {
			$this->Session->setFlash(__('Consumption deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Consumption was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
