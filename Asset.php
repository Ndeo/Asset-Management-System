<?php
/**
 * Created by PhpStorm.
 * User: nawaf
 * Date: 3/4/2019
 * Time: 7:15 PM
 */
class Asset
{

    public STATIC $count=0;
    private $id;
    private $name ;
    private $group;
    private $description;
    private $entered_value;
    private $deperciation_rate;
    private $entry_date;
    private $availability;
    private $entered_by;
    private $updated_on;
    private $is_periodic;
    private $asset_type;
    private $frequency;
    private $exit_date;
    
    public static $typeAssetList;
    public static $AssetList;
    public static $typeAssetStockList ;

    public static $typeInventoryList ;
    private static $initialized = false;

    function initialize()
    {
        
        if (self::$initialized)
            return;

        $this->typeAssetList = new SplDoublyLinkedList();
        $this->AssetList = new SplDoublyLinkedList();
        $this->typeAssetStockList = new SplDoublyLinkedList();
        $this->typeInventoryList = new SplDoublyLinkedList();
        $this->initialized = true;
    }
    

    /**
     * Asset constructor.
     * @param $id
     * @param $name
     * @param $group
     * @param $description
     * @param $entered_value
     * @param $deperciation_rate
     * @param $entry_date
     * @param $availability
     * @param $entered_by
     * @param $updated_on
     * @param $is_periodic
     * @param $asset_type
     * @param $frequency
     * @param $exit_date
     */
    public function __construct($id, $name, $group, $description, $entered_value, $deperciation_rate, $entry_date, $availability, $entered_by, $is_periodic, $asset_type, $exit_date, $frequency, $Exit_date)
    {
        $this->initialize();
        
        $this->id = $id;
        $this->name = $name;
        $this->group = $group;
        $this->description = $description;
        $this->entered_value = $entered_value;
        $this->deperciation_rate = $deperciation_rate;
        $this->entry_date = $entry_date;
        $this->availability = $availability;
        $this->entered_by = $entered_by;
        $this->updated_on = $updated_on;
        $this->is_periodic = $is_periodic;
        $this->asset_type = $asset_type;
        
        $this->frequency = $frequency;
        $this->exit_date = $exit_date;
        $this->count++;
        
        $this->AssetList ->push($this);
        
        switch($asset_type){
            case "Asset":
                $this-> typeAssetList ->push($this);
                break;
            case "Asset stock":
                $this-> typeAssetStockList->push($this);
                break;
            case "Inventory":
                $this->  typeInventoryList ->push($this);
                break;


        }
    }
    public function calculate_current_value(){
        $currentDate =date("Y-m-d");

        $nEntryDate=(intval(substr($this->entry_date,0,4)));

        $currentYear= intval(substr(strlen($currentDate),0,4));

        if($nEntryDate <$currentYear ){
            $ndeprate=(($this->deperciation_rate-100)*-1)/100;

            $nvalue=$this->entered_value*$ndeprate;

            calculate_current_valuee($nvalue,$nEntryDate,$currentDate);

        }else{


            return $this->entered_value;
        }
    }
    public function calculate_current_valuee($nvalue,$currentYear){
        $currentDate =date("Y-m-d");

        $nEntryDate=(intval(substr($this->entry_date,0,4)));

        if($nEntryDate <$currentYear ){
            $ndeprate=(($this->deperciation_rate-100)*-1)/100;

            $nvalue=$nvalue*$ndeprate;
            $currentYear--;
            calculate_current_valuee($nvalue,$currentYear);

        }else{


            return $this->entered_value;
        }
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
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
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
    public function getEnteredValue()
    {
        return $this->entered_value;
    }

    /**
     * @param mixed $entered_value
     */
    public function setEnteredValue($entered_value)
    {
        $this->entered_value = $entered_value;
    }

    /**
     * @return mixed
     */
    public function getDeperciationRate()
    {
        return $this->deperciation_rate;
    }

    /**
     * @param mixed $deperciation_rate
     */
    public function setDeperciationRate($deperciation_rate)
    {
        $this->deperciation_rate = $deperciation_rate;
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
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param mixed $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
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
    public function getAssetType()
    {
        return $this->asset_type;
    }

    /**
     * @param mixed $asset_type
     */
    public function setAssetType($asset_type)
    {
        $this->asset_type = $asset_type;
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

    /* function calculate_current_value($entryValue,$depRate,$entryDate,$currentDate){
         $nEntryDate=(intval(substr($entryDate,0,4)));
         if($nEntryDate<intval(subsub($currentDate,0,4))){
             $ndeprate=(($depRate-100)*-1)/100;
             $nvalue=$entryValue*$ndeprate;
             calculate_current_value($nvalue,$depRate,$nEntryDate,$currentDate);
         }else{
             return $entryDate;
         }
     }*/


    function calc_age($currentDate){
        $cyears=intval(substr($currentDate,0,4));
        $cmonths=intval(substr($currentDate,6,2));
        $cdays=intval(substr($currentDate,9,2));
        $eyears=intval(substr($this->entered_by,0,4));
        $emonths=intval(substr($this->entered_by,6,2));
        $edays=intval(substr($this->entered_by,9,2));

        $subday=$cdays-$edays;
        if($subday<0){
            $subday+=30;
            $cmonths--;
        }
        $submonth=$cmonths-$emonths;
        if($submonth<0){
            $submonth+=30;
            $cyears--;
        }
        $subyear=$cyears-$eyears;

        $age=$subyear.'-'.$submonth.'-'.$subday;
        return age;
    }
}


?>