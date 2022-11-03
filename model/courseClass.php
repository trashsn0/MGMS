<?php

class course
{

    private $id;
    private $teacherId;
    private $courseName;
    private $startDate;
    private $endDate;
    private $active;


    function __construct($array)
    {
        $this->id = $array['id'];
        $this->teacherId = $array['teacherId'];
        $this->courseName = $array['courseName'];
        $this->startDate = $array['startDate'];
        $this->endDate = $array['endDate'];
        $this->active = $array['active'];
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['teacherId'] = $this->teacherId;
        $array['courseName'] = $this->courseName;
        $array['startDate'] = $this->startDate;
        $array['endDate'] = $this->endDate;
        $array['active'] = $this->active;
        return $array;
    }

    public function __toString()
    {
        $desc = "id: " . $this->id . "<br>";
        $desc = "teacherId: " . $this->teacherId . "<br>";
        $desc .= "courseName: " . $this->courseName . "<br>";
        $desc .= "startDate: " . $this->startDate . "<br>";
        $desc .= "endDate: " . $this->endDate . "<br>";
        $desc .= "active: " . $this->active . "<br>";
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
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * @param mixed $teacherId
     *
     * @return self
     */
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @param mixed $courseName
     *
     * @return self
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     *
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
