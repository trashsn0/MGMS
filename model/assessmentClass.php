<?php

class assessment
{

    private $id;
    private $name;
    private $weight;
    private $numberOfQuestions;
    private $dueDate;


    function __construct($array)
    {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->weight = $array['weight'];
        $this->numberOfQuestions = $array['numberOfQuestions'];
        $this->dueDate = $array['dueDate'];
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['weight'] = $this->weight;
        $array['numberOfQuestions'] = $this->numberOfQuestions;
        $array['dueDate'] = $this->dueDate;
        return $array;
    }

    public function __toString()
    {
        $desc = "id: " . $this->id . "<br>";
        $desc = "name: " . $this->name . "<br>";
        $desc .= "weight: " . $this->weight . "<br>";
        $desc .= "numberOfQuestions: " . $this->numberOfQuestions . "<br>";
        $desc .= "dueDate: " . $this->dueDate . "<br>";
        return $desc;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberOfQuestions()
    {
        return $this->numberOfQuestions;
    }

    /**
     * @param mixed $numberOfQuestions
     *
     * @return self
     */
    public function setNumberOfQuestions($numberOfQuestions)
    {
        $this->numberOfQuestions = $numberOfQuestions;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     *
     * @return self
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
