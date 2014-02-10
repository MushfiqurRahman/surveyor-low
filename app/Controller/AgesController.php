<?php
App::uses('AppController', 'Controller');
/**
 * Ages Controller
 *
 * @property Age $Age
 */
class AgesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Age->recursive = 0;
		$this->set('ages', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Age->id = $id;
		if (!$this->Age->exists()) {
			throw new NotFoundException(__('Invalid age'));
		}
		$this->set('age', $this->Age->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Age->create();
			if ($this->Age->save($this->request->data)) {
				$this->Session->setFlash(__('The age has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age could not be saved. Please, try again.'));
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
		$this->Age->id = $id;
		if (!$this->Age->exists()) {
			throw new NotFoundException(__('Invalid age'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Age->save($this->request->data)) {
				$this->Session->setFlash(__('The age has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Age->read(null, $id);
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
		$this->Age->id = $id;
		if (!$this->Age->exists()) {
			throw new NotFoundException(__('Invalid age'));
		}
		if ($this->Age->delete()) {
			$this->Session->setFlash(__('Age deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Age was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
