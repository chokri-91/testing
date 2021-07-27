<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers", indexes={@ORM\Index(name="salesRepEmployeeNumber", columns={"salesRepEmployeeNumber"})})
 * @ORM\Entity
 */
class Customers
{
    /**
     * @var int
     *
     * @ORM\Column(name="customerNumber", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customernumber;

    /**
     * @var string
     *
     * @ORM\Column(name="customerName", type="string", length=50, nullable=false)
     */
    private $customername;

    /**
     * @var string
     *
     * @ORM\Column(name="contactLastName", type="string", length=50, nullable=false)
     */
    private $contactlastname;

    /**
     * @var string
     *
     * @ORM\Column(name="contactFirstName", type="string", length=50, nullable=false)
     */
    private $contactfirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="addressLine1", type="string", length=50, nullable=false)
     */
    private $addressline1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="addressLine2", type="string", length=50, nullable=true)
     */
    private $addressline2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=true)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postalCode", type="string", length=15, nullable=true)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var float|null
     *
     * @ORM\Column(name="creditLimit", type="float", precision=10, scale=0, nullable=true)
     */
    private $creditlimit;

    /**
     * @var \Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salesRepEmployeeNumber", referencedColumnName="employeeNumber")
     * })
     */
    private $salesrepemployeenumber;

    public function getCustomernumber(): ?int
    {
        return $this->customernumber;
    }

    public function getCustomername(): ?string
    {
        return $this->customername;
    }

    public function setCustomername(string $customername): self
    {
        $this->customername = $customername;

        return $this;
    }

    public function getContactlastname(): ?string
    {
        return $this->contactlastname;
    }

    public function setContactlastname(string $contactlastname): self
    {
        $this->contactlastname = $contactlastname;

        return $this;
    }

    public function getContactfirstname(): ?string
    {
        return $this->contactfirstname;
    }

    public function setContactfirstname(string $contactfirstname): self
    {
        $this->contactfirstname = $contactfirstname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddressline1(): ?string
    {
        return $this->addressline1;
    }

    public function setAddressline1(string $addressline1): self
    {
        $this->addressline1 = $addressline1;

        return $this;
    }

    public function getAddressline2(): ?string
    {
        return $this->addressline2;
    }

    public function setAddressline2(?string $addressline2): self
    {
        $this->addressline2 = $addressline2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCreditlimit(): ?float
    {
        return $this->creditlimit;
    }

    public function setCreditlimit(?float $creditlimit): self
    {
        $this->creditlimit = $creditlimit;

        return $this;
    }

    public function getSalesrepemployeenumber(): ?Employees
    {
        return $this->salesrepemployeenumber;
    }

    public function setSalesrepemployeenumber(?Employees $salesrepemployeenumber): self
    {
        $this->salesrepemployeenumber = $salesrepemployeenumber;

        return $this;
    }


}
