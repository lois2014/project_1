<?php

namespace App\ModelBundle\Entity;

/**
 * Attach
 */
class Attach
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * @var int
     */
    private $uid;

    /**
     * @var \DateTime
     */
    private $create_time;

    /**
     * @var int
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Attach
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Attach
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set uid
     *
     * @param \int $uid
     *
     * @return Attach
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return \int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Attach
     */
    public function setCreateTime($createTime=NULL)
    {
        $date = $createTime  ? new \DateTime($createTime) : new \DateTime(date('Y-m-d H:i:s',time()));
        $this->create_time = $date;

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
     * Set status
     *
     * @param \int $status
     *
     * @return Attach
     */
    public function setStatus( $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \int
     */
    public function getStatus()
    {
        return $this->status;
    }
}

