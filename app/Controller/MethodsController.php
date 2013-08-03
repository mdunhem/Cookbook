<?php
App::uses('AppController', 'Controller');
/**
 * Methods Controller
 *
 * @property Method $Method
 * @property PaginatorComponent $Paginator
 */
class MethodsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Method->recursive = 0;
		$this->set('methods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Method->exists($id)) {
			throw new NotFoundException(__('Invalid method'));
		}
		$options = array('conditions' => array('Method.' . $this->Method->primaryKey => $id));
		$this->set('method', $this->Method->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Method->create();
			if ($this->Method->save($this->request->data)) {
				$this->Session->setFlash(__('The method has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->Method->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Method->exists($id)) {
			throw new NotFoundException(__('Invalid method'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Method->save($this->request->data)) {
				$this->Session->setFlash(__('The method has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Method.' . $this->Method->primaryKey => $id));
			$this->request->data = $this->Method->find('first', $options);
		}
		$recipes = $this->Method->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Method->id = $id;
		if (!$this->Method->exists()) {
			throw new NotFoundException(__('Invalid method'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Method->delete()) {
			$this->Session->setFlash(__('Method deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Method was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
