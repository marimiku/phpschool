<?php

class BinaryTree
{
    private $root = null;
    private $currentNode = null;

    public function append($value)
    {
        $newNode = new Node($value);
        if (empty($this->root)) {
            $this->root = $this->currentNode = $newNode;
            echo $this->currentNode;
        } else {
            while (1) {
                if ($this->currentNode === $value) {
                    echo $this->currentNode;
                    break;
                }
                if (!$this->isLess($value)) {
                    if ($this->currentNode->leftIsFull()) {
                        $this->currentNode = $this->currentNode->getLeft();
                    } else {
                        {
                            $this->currentNode->setLeft($newNode);
                            echo $this->currentNode;
                            $this->currentNode = $this->root;
                            break;
                        }
                    }
                } else {
                    if ($this->currentNode->rightIsFull()) {
                        $this->currentNode = $this->currentNode->getRight();
                    } else {
                        {
                            $this->currentNode->setRight($newNode);
                            echo $this->currentNode;
                            $this->currentNode = $this->root;
                            break;
                        }
                    }
                }
            }
        }
    }
    
    private function isLess($value)
    {
        return ($this->currentNode->getValue() < $value);
    }


}