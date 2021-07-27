<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="productLine", columns={"productLine"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="productCode", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productcode;

    /**
     * @var string
     *
     * @ORM\Column(name="productName", type="string", length=70, nullable=false)
     */
    private $productname;

    /**
     * @var string
     *
     * @ORM\Column(name="productScale", type="string", length=10, nullable=false)
     */
    private $productscale;

    /**
     * @var string
     *
     * @ORM\Column(name="productVendor", type="string", length=50, nullable=false)
     */
    private $productvendor;

    /**
     * @var string
     *
     * @ORM\Column(name="productDescription", type="text", length=65535, nullable=false)
     */
    private $productdescription;

    /**
     * @var int
     *
     * @ORM\Column(name="quantityInStock", type="smallint", nullable=false)
     */
    private $quantityinstock;

    /**
     * @var float
     *
     * @ORM\Column(name="buyPrice", type="float", precision=10, scale=0, nullable=false)
     */
    private $buyprice;

    /**
     * @var float
     *
     * @ORM\Column(name="MSRP", type="float", precision=10, scale=0, nullable=false)
     */
    private $msrp;

    /**
     * @var \Productlines
     *
     * @ORM\ManyToOne(targetEntity="Productlines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productLine", referencedColumnName="productLine")
     * })
     */
    private $productline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", mappedBy="productcode")
     */
    private $ordernumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordernumber = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getProductcode(): ?string
    {
        return $this->productcode;
    }

    public function getProductname(): ?string
    {
        return $this->productname;
    }

    public function setProductname(string $productname): self
    {
        $this->productname = $productname;

        return $this;
    }

    public function getProductscale(): ?string
    {
        return $this->productscale;
    }

    public function setProductscale(string $productscale): self
    {
        $this->productscale = $productscale;

        return $this;
    }

    public function getProductvendor(): ?string
    {
        return $this->productvendor;
    }

    public function setProductvendor(string $productvendor): self
    {
        $this->productvendor = $productvendor;

        return $this;
    }

    public function getProductdescription(): ?string
    {
        return $this->productdescription;
    }

    public function setProductdescription(string $productdescription): self
    {
        $this->productdescription = $productdescription;

        return $this;
    }

    public function getQuantityinstock(): ?int
    {
        return $this->quantityinstock;
    }

    public function setQuantityinstock(int $quantityinstock): self
    {
        $this->quantityinstock = $quantityinstock;

        return $this;
    }

    public function getBuyprice(): ?float
    {
        return $this->buyprice;
    }

    public function setBuyprice(float $buyprice): self
    {
        $this->buyprice = $buyprice;

        return $this;
    }

    public function getMsrp(): ?float
    {
        return $this->msrp;
    }

    public function setMsrp(float $msrp): self
    {
        $this->msrp = $msrp;

        return $this;
    }

    public function getProductline(): ?Productlines
    {
        return $this->productline;
    }

    public function setProductline(?Productlines $productline): self
    {
        $this->productline = $productline;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrdernumber(): Collection
    {
        return $this->ordernumber;
    }

    public function addOrdernumber(Orders $ordernumber): self
    {
        if (!$this->ordernumber->contains($ordernumber)) {
            $this->ordernumber[] = $ordernumber;
            $ordernumber->addProductcode($this);
        }

        return $this;
    }

    public function removeOrdernumber(Orders $ordernumber): self
    {
        if ($this->ordernumber->removeElement($ordernumber)) {
            $ordernumber->removeProductcode($this);
        }

        return $this;
    }

}
