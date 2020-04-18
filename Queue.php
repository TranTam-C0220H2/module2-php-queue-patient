<?php


class Queue
{
    protected $front;
    protected $back;
    protected $countNode;

    public function __construct()
    {
        $this->front = null;
        $this->back = null;
        $this->countNode = 0;
    }

    public function getCountNode()
    {
        return $this->countNode;
    }

    public function isEmpty()
    {
        return $this->countNode == 0;
    }

    public function enqueue($data)
    {
        $newNode = new Node($data);
        $this->back->next = $newNode;
        $newNode->next = null;
        $this->back = $newNode;
        if ($this->front == null) {
            $this->front = $newNode;
        }
        $this->countNode++;
    }

    public function dequeue()
    {
        if ($this->front != null) {
            $currentNode = $this->front;
            $this->front = $currentNode->next;
            $this->countNode--;
            return $currentNode;
        } else {
            $this->back = null;
            throw new Exception('Queue is empty!');
        }
    }

    public function printByValue()
    {
        $arrayData = [];
        $currentNode = $this->front;
        while ($currentNode != null) {
            array_push($arrayData, $currentNode->getValue());
            $currentNode = $currentNode->next;
        }
        return $arrayData;
    }

    public function enqueueByIndex($index, $name, $data)
    {
        $queue = new Patient($name, $data);
        if (!$this->isEmpty() && $index != 0) {
            $queue->next = $this->getNodeByIndex($index - 1)->next;
            $this->getNodeByIndex($index - 1)->next = $queue;
        } else {
            $queue->next = $this->front;
            $this->front = $queue;
        }
        $this->countNode++;
    }

    public function getNodeByIndex($index)
    {
        $currentNode = $this->front;
        $countNode = 0;
        while ($countNode < $index) {
            $currentNode = $currentNode->next;
            $countNode++;
        }
        return $currentNode;
    }

    public function getLastIndexByNodeData($data)
    {
        $currentNode = $this->front;
        $lastIndexByNodeDaTa = 0;
        if (!$this->isEmpty()) {
            while ($data >= $currentNode->getValue()) {
                $currentNode = $currentNode->next;
                $lastIndexByNodeDaTa++;
                if ($currentNode == null) {
                    break;
                }
            }
        }
        return $lastIndexByNodeDaTa;
    }

    public function printByName()
    {
        $arrayName = [];
        $currentNode = $this->front;
        while ($currentNode != null) {
            array_push($arrayName, $currentNode->getName());
            $currentNode = $currentNode->next;
        }
        return $arrayName;
    }

    public function toString()
    {
        $arrayQueue = [];
        $currentNode = $this->front;
        while ($currentNode != null) {
            $elementQueue = [
                $currentNode->getName(),
                $currentNode->getValue()
            ];
            array_push($arrayQueue, $elementQueue);
            $currentNode = $currentNode->next;
        }
        foreach ($arrayQueue as $item) {
            echo '[' . implode('-', $item) . ']';
        }
    }
}