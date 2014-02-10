<?php
App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * OffDays Controller
 *
 * @property OffDay $OffDay
 */
class OffDaysController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OffDay->recursive = 0;
		$this->set('offDays', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OffDay->id = $id;
		if (!$this->OffDay->exists()) {
			throw new NotFoundException(__('Invalid off day'));
		}
		$this->set('offDay', $this->OffDay->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OffDay->create();
			if ($this->OffDay->save($this->request->data)) {
				$this->Session->setFlash(__('The off day has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The off day could not be saved. Please, try again.'));
			}
		}
		$campaigns = $this->OffDay->Campaign->find('list');
		$this->set(compact('campaigns'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->OffDay->id = $id;
		if (!$this->OffDay->exists()) {
			throw new NotFoundException(__('Invalid off day'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OffDay->save($this->request->data)) {
				$this->Session->setFlash(__('The off day has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The off day could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OffDay->read(null, $id);
		}
		$campaigns = $this->OffDay->Campaign->find('list');
		$this->set(compact('campaigns'));
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
		$this->OffDay->id = $id;
		if (!$this->OffDay->exists()) {
			throw new NotFoundException(__('Invalid off day'));
		}
		if ($this->OffDay->delete()) {
			$this->Session->setFlash(__('Off day deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Off day was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
