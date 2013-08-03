<?php
App::uses('AppController', 'Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 */
class RecipesController extends AppController {

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
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
		$this->set('recipe', $this->Recipe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__('Recipe deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recipe was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
