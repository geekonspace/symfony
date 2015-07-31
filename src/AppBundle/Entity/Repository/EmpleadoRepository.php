<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class EmpleadoRepository extends EntityRepository {
	
	public function findAll() {
		return $this->findBy ( array (), array (
				'nombre' => 'ASC' 
		) );
	}
	
	public function findAllOrderedByNombre() {
		return $this->getEntityManager ()->createQuery ( 'SELECT p FROM AppBundle:Empleado p ORDER BY p.nombre ASC' )->getResult ();
	}
	
	public function search($filter, $column, $order) {
		$query = 'SELECT p FROM AppBundle:Empleado p';
		
		if (! $this->IsNullOrEmptyString ( $filter ['fechaIncorporacion'] ) && ! $this->IsNullOrEmptyString ( $filter ['departamento'] )) {
			$query .= ' WHERE p.fechaIncorporacion = :fechaIncorporacion AND p.departamento = :departamento';
			$query .= $this->orderBy ($column, $order );
			return $this->getEntityManager ()->createQuery ( $query )->setParameter ( 'fechaIncorporacion', $filter ['fechaIncorporacion'] )->setParameter ( 'departamento', $filter ['departamento'] )->getResult ();
		} else if (! $this->IsNullOrEmptyString ( $filter ['fechaIncorporacion'] ) && $this->IsNullOrEmptyString ( $filter ['departamento'] )) {
			$query .= ' WHERE p.fechaIncorporacion = :fechaIncorporacion';
			$query .= $this->orderBy ($column, $order );
			return $this->getEntityManager ()->createQuery ( $query )->setParameter ( 'fechaIncorporacion', $filter ['fechaIncorporacion'] )->getResult ();
		} else if ($this->IsNullOrEmptyString ( $filter ['fechaIncorporacion'] ) && ! $this->IsNullOrEmptyString ( $filter ['departamento'] )) {
			$query .= ' WHERE p.departamento = :departamento';
			$query .= $this->orderBy ($column, $order );
			return $this->getEntityManager ()->createQuery ( $query )->setParameter ( 'departamento', $filter ['departamento'] )->getResult ();
		}
		$query .= $this->orderBy ($column, $order );		
		return $this->getEntityManager ()->createQuery ( $query )->getResult ();
	}
	
	private function orderBy($column, $order) {
		$query = ' ORDER BY p.';
		
		if ($this->IsNullOrEmptyString ( $column )) {
			$query .= 'id';
		} else {
			$query .= $column;
		}
		if (! $this->IsNullOrEmptyString ( $order )) {
			$query .= ' ' . $order;
		}
		return $query;
	}
	
	private function IsNullOrEmptyString($str) {
		return (! isset ( $str ) || trim ( $str ) === '');
	}
	
}