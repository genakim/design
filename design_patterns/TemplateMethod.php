<?php
/**
 * This pattern allow to avoid duplicates of code
 */

abstract class Sub
{
    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryTopics()
            ->addSauces();
    }

    protected function layBread()
    {
        var_dump('laying down the bread');
        return $this;
    }

    protected function addLettuce()
    {
        var_dump('add some letuce');
        return $this;
    }

    protected function addSauces()
    {
        var_dump('add oil and vinegar');
        return $this;
    }

    protected abstract function addPrimaryTopics();
}

class TurkeySub extends Sub
{

    public function addPrimaryTopics()
    {
        var_dump('add some turkey ');
        return $this;
    }
}

class VeggieSub extends Sub
{
    public function addPrimaryTopics()
    {
        var_dump('add some veggies ');
        return $this;
    }
}

(new TurkeySub())->make();