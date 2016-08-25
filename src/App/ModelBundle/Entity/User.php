<?php

namespace App\ModelBundle\Entity;

/**
 * User
 */
class User
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var varchar
     */
    private $username;

    /**
     * @var varchar
     */
    private $pwd;

    /**
     * @var \DateTime
     */
    private $create_time;

    /**
     * @var \DateTime
     */
    private $update_time;

    /**
     * @var tinyint
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($Id){
        $this->id = $Id;
    }
    /**
     * Set username
     *
     * @param \varchar $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return \varchar
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pwd
     *
     * @param \varchar $pwd
     *
     * @return User
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * @return varchar
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return User
     */
    public function setCreateTime($createTime=NULL)
    {

       $date = new \datetime(date("Y-m-d H:i:s",time()));
        //$date = date("Y-m-d H:i:s",time());

        $this->create_time = $createTime != NULL  ? $createTime : $date;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     *
     * @return User
     */
    public function setUpdateTime($updateTime=NULL)
    {

        $date = new \datetime(date("Y-m-d H:i:s",time()));
        $this->update_time = $updateTime ? $updateTime :  $date;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set status
     *
     * @param \tinyint $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \tinyint
     */
    public function getStatus()
    {
        return $this->status;
    }
}

