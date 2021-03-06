<?php

namespace Controller\Core;

class Pager
{
    protected $totalRecords = null;
    protected $recordsPerPage = null;
    protected $noOfPages = null;
    protected $start = 1;
    protected $end = null;
    protected $previous = null;
    protected $next = null;
    protected $currentPage = 1;

    public function setTotalRecords($records)
    {
        $this->totalRecords = $records;
        return $this;
    }
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }
    public function setRecordsPerPage($records)
    {
        $this->recordsPerPage = $records;
        return $this;
    }
    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }
    protected function setNoOfPages($pages)
    {
        $this->noOfPages = $pages;
        return $this;
    }
    public function getNoOfPages()
    {
        return $this->noOfPages;
    }
    protected function setStart($startRecordNo)
    {
        $this->start = $startRecordNo;
        return $this;
    }
    public function getStart()
    {
        return $this->start;
    }
    protected function setEnd($endRecordNo)
    {
        $this->end = $endRecordNo;
        return $this;
    }
    public function getEnd()
    {
        return $this->end;
    }
    protected function setPrevious($previous)
    {
        $this->previous = $previous;
        return $this;
    }
    public function getPrevious()
    {
        return $this->previous;
    }
    protected function setNext($next)
    {
        $this->next = $next;
        return $this;
    }
    public function getNext()
    {
        return $this->next;
    }
    public function setCurrentPage($page)
    {
        $this->currentPage = $page;
        return $this;
    }
    public function getCurrentPage()
    {
        return $this->currentPage;
    }
    public function calculatePage()
    {
        if($this->getTotalRecords() <= $this->getRecordsPerPage())
        {
            $this->setNoOfPages(1);
            $this->setStart(1);
            $this->setEnd(null);
            $this->setPrevious(null);
            $this->setNext(null);
        }
        $page = ceil($this->getTotalRecords() / $this->getRecordsPerPage());
        $this->setNoOfPages($page);
        $this->setEnd($page);

        if ($this->getCurrentPage() > $this->getNoOfPages())
        {
            $this->setCurrentPage($this->getNoOfPages());
            return $this;
        }
        if ($this->getCurrentPage() < $this->getStart())
        {
            $this->setCurrentPage($this->getStart());
            return $this;
        }

        if($this->getCurrentPage() == $this->getStart())
        {
            $this->setPrevious(null);
            $this->setStart(null);

            if ($this->getCurrentPage() < $this->getNoOfPages()) 
            {
                $this->setNext($this->getCurrentPage() + 1);
            }
            return $this;
        }
        if($this->getCurrentPage() == $this->getEnd())
        {
            $this->setNext(null);
            $this->setEnd(null);
            if($this->getCurrentPage() >= $this->getNoOfPages())
            {
                $this->setPrevious($this->getCurrentPage() - 1);
            }
            return $this;
        }
        if ($this->getCurrentPage() > $this->getStart() && $this->getCurrentPage() < $this->getEnd()) 
        {
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
        return $this;
    }
}
?>