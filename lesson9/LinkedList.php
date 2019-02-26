<?php

class LinkedList
{
    private $head = null;
    private $tail = null;

    public function append($value)
    {
        $newNode = new Node($value);
        if (!empty($this->head)) {
            $potentialLastNode = $this->head;
            while (!empty($potentialLastNode->getNext())) {
                $potentialLastNode = $potentialLastNode->getNext();
            }
            $newNode->setPrevious($potentialLastNode);
            $potentialLastNode->setNext($newNode);
        } else {
            $this->head = $newNode;
        }
        $this->tail = $newNode;
        echo "\nAppended:\n{$newNode}\n";
    }

    public function prepend($value)
    {
        $newNode = new Node($value);
        if (!empty($this->head)) {
            $this->head->setPrevious($newNode);
            $headObj = $this->head;
            $newNode->setNext($headObj);
        } else {
            $this->tail = $newNode;
        }
        $this->head = $newNode;
        echo "\nPrepended:\n{$newNode}\n";
    }

    public function deleteFirst()
    {
        if (empty($this->head)) {
            throw new Exception("List is empty. Nothing to delete");
        } else {
            echo "\nList before:\n" . $this;
            if (!empty($this->head->getNext())) {
                $this->head = $this->head->getNext();
                $this->head->setPrevious(null);
            } else {
                $this->head = null;
                $this->tail = null;
            }
            echo (empty($this->head)) ? "\nList is empty after deleting.\n" : "\nList after deleting first element:\n" . $this;
        }
    }

    public function deleteLast()
    {
        echo "\nList before:\n" . $this;
        if (empty($this->tail)) {
            throw new Exception('List is empty. Nothing to delete');
        } else {
            if (!empty($this->tail->getPrevious())) {
                $this->tail = $this->tail->getPrevious();
                $this->tail->setNext(null);
            } else {
                $this->head = null;
                $this->tail = null;
            }
        }
        echo (empty($this->tail)) ? "\nList is empty after deleting.\n" : "\nList after deleting last element:\n" . $this;
    }

    public function insertAfterNode($value, $node)
    {
        if (empty($this->head) || empty($this->head->getNext())) {
            $this->append($value);
        } else {
            $newNode = new Node($value);
            $newNode->setNext($node->getNext());
            $newNode->setPrevious($node);
            $node->setNext($newNode);
            $newNode->getNext()->setPrevious($newNode);
        }
    }

    public function insertBeforeNode($value, $node)
    {
        if (empty($this->head) || empty($this->head->getNext())) {
            $this->append($value);
        } else {
            $newNode = new Node($value);
            $newNode->setPrevious($node->getPrevious());
            $newNode->setNext($node);
            $node->getPrevious()->setNext($newNode);
            $node->setPrevious($newNode);
        }
    }

    public function deleteNode($node)
    {
        if (empty($this->head) || empty($this->head->getNext())) {
            $this->deleteFirst();
        } else {
            empty($node->getPrevious()) ? $this->deleteFirst() : $node->getPrevious()->setNext($node->getNext());
            empty($node->getNext()) ? $this->deleteLast() : $node->getNext()->setPrevious($node->getPrevious());
        }
    }

    public function searchByValue($value)
    {
        $result = '';
        if (empty($this->head)) {
            $result = $result . "\nList is empty, nothing to search.\n";
        } else {
            $potentialLastNode = $this->head;
            while (!empty($potentialLastNode->getNext())) {
                if ($potentialLastNode->getValue() == $value) {
                    $result = $result . $potentialLastNode;
                }
                $potentialLastNode = $potentialLastNode->getNext();
            }

            if ($potentialLastNode->getValue() == $value)
                $result = $result . $potentialLastNode;
        }
        echo empty($result) ? "\nNo matches found.\n" : "Searching result:\n" . $result;
    }

    public function __toString()
    {
        $result = '';
        $potentialLastNode = null;
        if (!empty($this->head)) {
            $potentialLastNode = $this->head;
            while (!empty($potentialLastNode->getNext())) {
                $result = $result . $potentialLastNode;
                $potentialLastNode = $potentialLastNode->getNext();
            }
        }
        return $result . $potentialLastNode;
    }

    public function getHead()
    {
        return $this->head;
    }

    public function setHead($head)
    {
        $this->head = $head;
    }

    public function getTail()
    {
        return $this->tail;
    }

    public function setTail($tail)
    {
        $this->tail = $tail;
    }


}