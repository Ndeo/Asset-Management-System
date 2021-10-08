<?php

/**
 * Created by PhpStorm.
 * User: Waffoh
 * Date: 3/9/2019
 * Time: 7:34 AM
 */
class Liability
{
    private $id;
    private $name ;
    private $from_to;
    private $description;
    private $value;
    private $remaining;
    private $entry_date;
    private $expected_on;
    private $updated_on;
    private $entered_by;
    private $is_periodic;
    private $frequency;
    private $exit_date;

    /**
     * Liability constructor.
     * @param $id
     * @param $name
     * @param $from_to
     * @param $description
     * @param $value
     * @param $remaining
     * @param $entry_date
     * @param $expected_on
     * @param $updated_on
     * @param $entered_by
     * @param $is_periodic
     * @param $frequency
     * @param $exit_date
     */
    public function __construct($id, $name, $from_to, $description, $value, $remaining, $entry_date, $expected_on, $updated_on, $entered_by, $is_periodic, $frequency, $exit_date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->from_to = $from_to;
        $this->description = $description;
        $this->value = $value;
        $this->remaining = $remaining;
        $this->entry_date = $entry_date;
        $this->expected_on = $expected_on;
        $this->updated_on = $updated_on;
        $this->entered_by = $entered_by;
        $this->is_periodic = $is_periodic;
        $this->frequency = $frequency;
        $this->exit_date = $exit_date;
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
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFromTo()
    {
        return $this->from_to;
    }

    /**
     * @param mixed $from_to
     */
    public function setFromTo($from_to)
    {
        $this->from_to = $from_to;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getRemaining()
    {
        return $this->remaining;
    }

    /**
     * @param mixed $remaining
     */
    public function setRemaining($remaining)
    {
        $this->remaining = $remaining;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entry_date;
    }

    /**
     * @param mixed $entry_date
     */
    public function setEntryDate($entry_date)
    {
        $this->entry_date = $entry_date;
    }

    /**
     * @return mixed
     */
    public function getExpectedOn()
    {
        return $this->expected_on;
    }

    /**
     * @param mixed $expected_on
     */
    public function setExpectedOn($expected_on)
    {
        $this->expected_on = $expected_on;
    }

    /**
     * @return mixed
     */
    public function getUpdatedOn()
    {
        return $this->updated_on;
    }

    /**
     * @param mixed $updated_on
     */
    public function setUpdatedOn($updated_on)
    {
        $this->updated_on = $updated_on;
    }

    /**
     * @return mixed
     */
    public function getEnteredBy()
    {
        return $this->entered_by;
    }

    /**
     * @param mixed $entered_by
     */
    public function setEnteredBy($entered_by)
    {
        $this->entered_by = $entered_by;
    }

    /**
     * @return mixed
     */
    public function getIsPeriodic()
    {
        return $this->is_periodic;
    }

    /**
     * @param mixed $is_periodic
     */
    public function setIsPeriodic($is_periodic)
    {
        $this->is_periodic = $is_periodic;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @return mixed
     */
    public function getExitDate()
    {
        return $this->exit_date;
    }

    /**
     * @param mixed $exit_date
     */
    public function setExitDate($exit_date)
    {
        $this->exit_date = $exit_date;
    }

}