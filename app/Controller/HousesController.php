<?php
App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * Houses Controller
 *
 * @property House $House
 */
class HousesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->House->recursive = 0;
		$this->set('houses', $this->paginate());
	}
        
        public function ajax_house_list(){
            $this->autoRender = $this->layout = false;            
            if( isset($_POST['area_id']) && !empty($_POST['area_id']) && $_POST['area_id'] != 'All' ){
                $conditions = array('area_id' => $_POST['area_id']);
                $houses = $this->House->find('list', array('conditions' => $conditions));
                echo json_encode($houses);
            }
            return;            
        }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->House->exists($id)) {
			throw new NotFoundException(__('Invalid house'));
		}
		$options = array('conditions' => array('House.' . $this->House->primaryKey => $id));
		$this->set('house', $this->House->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->House->create();
			if ($this->House->save($this->request->data)) {
				$this->Session->setFlash(__('The house has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The house could not be saved. Please, try again.'));
			}
		}
		$areas = $this->House->Area->find('list');
		$this->set(compact('areas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->House->exists($id)) {
			throw new NotFoundException(__('Invalid house'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->House->save($this->request->data)) {
				$this->Session->setFlash(__('The house has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The house could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('House.' . $this->House->primaryKey => $id));
			$this->request->data = $this->House->find('first', $options);
		}
		$areas = $this->House->Area->find('list');
		$this->set(compact('areas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->House->id = $id;
		if (!$this->House->exists()) {
			throw new NotFoundException(__('Invalid house'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->House->delete()) {
			$this->Session->setFlash(__('House deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('House was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
