<?php
/**
 * ISP (Interface segregation principle) - Принцип разделения интерфейса:
 * Следование этому принципу помогает системе оставаться гибкой при внесении изменений в логику работы и пригодной для рефакторинга.
 * Клиенты не должны зависеть от методов, которые они НЕ используют.
 * Принцип разделения интерфейсов говорит о том,
 * что слишком «толстые» интерфейсы необходимо разделять на более маленькие и специфические,
 * чтобы клиенты маленьких интерфейсов знали только о методах, которые необходимы им в работе.
 * В итоге, при изменении метода интерфейса не должны меняться клиенты, которые этот метод не используют.
 *
 * @see PasswordBroker in Laravel
 */

interface WorkerInterface {
    public function work();
    public function sleep();
}

interface ManageableInterface {
    public function beManaged();
}

interface WorkableInterface {
    public function work();
}

interface SleepableInterface {
    public function sleep();
}

class HumanWorker implements WorkableInterface, SleepableInterface, ManageableInterface {

    public function work()
    {
        return 'human work';
    }

    public function sleep()
    {
       return 'human sleep';
    }

    public function beManaged()
    {
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements WorkableInterface, ManageableInterface {

    public function work()
    {
        return 'android work';
    }

    public function beManaged()
    {
        $this->work();
    }
}

class Captain {
    public function manage(ManageableInterface $worker)
    {
        $worker->beManaged();
    }
}

