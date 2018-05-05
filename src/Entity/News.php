<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=16777215, nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=16777215, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", length=16777215, nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="posted", type="text", length=16777215, nullable=false)
     */
    private $posted;

    /**
     * @var int
     *
     * @ORM\Column(name="approved", type="integer", nullable=false)
     */
    private $approved = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getPosted(): ?string
    {
        return $this->posted;
    }

    public function setPosted(string $posted): self
    {
        $this->posted = $posted;

        return $this;
    }

    public function getApproved(): ?int
    {
        return $this->approved;
    }

    public function setApproved(int $approved): self
    {
        $this->approved = $approved;

        return $this;
    }


}
