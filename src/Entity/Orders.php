<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="customerNumber", columns={"customerNumber"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="orderNumber", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordernumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orderDate", type="date", nullable=false)
     */
    private $orderdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requiredDate", type="date", nullable=false)
     */
    private $requireddate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="shippedDate", type="date", nullable=true)
     */
    private $shippeddate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=15, nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customerNumber", referencedColumnName="customerNumber")
     * })
     */
    private $customernumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Products", inversedBy="ordernumber")
     * @ORM\JoinTable(name="orderdetails",
     *   joinColumns={
     *     @ORM\JoinColumn(name="orderNumber", referencedColumnName="orderNumber")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="productCode", referencedColumnName="productCode")
     *   }
     * )
     */
    private $productcode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productcode = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getOrdernumber(): ?int
    {
        return $this->ordernumber;
    }

    public function getOrderdate(): ?\DateTimeInterface
    {
        return $this->orderdate;
    }

    public function setOrderdate(\DateTimeInterface $orderdate): self
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    public function getRequireddate(): ?\DateTimeInterface
    {
        return $this->requireddate;
    }

    public function setRequireddate(\DateTimeInterface $requireddate): self
    {
        $this->requireddate = $requireddate;

        return $this;
    }

    public function getShippeddate(): ?\DateTimeInterface
    {
        return $this->shippeddate;
    }

    public function setShippeddate(?\DateTimeInterface $shippeddate): self
    {
        $this->shippeddate = $shippeddate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getCustomernumber(): ?Customers
    {
        return $this->customernumber;
    }

    public function setCustomernumber(?Customers $customernumber): self
    {
        $this->customernumber = $customernumber;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProductcode(): Collection
    {
        return $this->productcode;
    }

    public function addProductcode(Products $productcode): self
    {
        if (!$this->productcode->contains($productcode)) {
            $this->productcode[] = $productcode;
        }

        return $this;
    }

    public function removeProductcode(Products $productcode): self
    {
        $this->productcode->removeElement($productcode);

        return $this;
    }

}
