<?php	

namespace App\Transformers;

use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

trait TransformerBuatan{
	protected function boot(){
		$manager = new Manager();
		$manager->setSerializer(new ArraySerializer());
	}
	protected static function getTransformerName($subject, $class){
		$transformer_reflection = new \ReflectionClass($class);
		$subject_reflection = new \ReflectionClass($subject);

		$transformer_namespace = $transformer_reflection->getNamespaceName();
		$subject_name = $subject_reflection->getShortName();

		return $transformer_namespace."\\".$subject_name."Transformer";
	}
	// protected static function includesItem($this, $parameter){
	// 	$object = $this->$parameter;
	// 	return $this->item($object, new $object."Transformer");
	// }
}