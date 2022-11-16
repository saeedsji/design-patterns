<?php

//interfaces
interface Strategy {
    public function doAlgorithm(array $data): array;
}

//classes
class ConcreteStrategyA implements Strategy {
    public function doAlgorithm(array $data): array {
        sort($data);

        return $data;
    }
}

class ConcreteStrategyB implements Strategy {
    public function doAlgorithm(array $data): array {
        rsort($data);

        return $data;
    }
}

class Context {

    private $strategy;


    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }


    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function doSomeBusinessLogic($array) {

        echo "Context: Sorting data using the strategy (not sure how it'll do it)\n";
        var_dump($this->strategy->doAlgorithm($array));

    }
}

//client
$context = new Context(new ConcreteStrategyB());
$context->doSomeBusinessLogic(["a", "b", "c", "d", "e"]);

$context->setStrategy(new ConcreteStrategyA());
$context->doSomeBusinessLogic(["a", "b", "c", "d", "e"]);
