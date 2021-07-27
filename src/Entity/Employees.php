<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 *
 * @ORM\Table(name="employees", indexes={@ORM\Index(name="reportsTo", columns={"reportsTo"}), @ORM\Index(name="officeCode", columns={"officeCode"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var int
     *
     * @ORM\Column(name="employeeNumber", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $employeenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=10, nullable=false)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="jobTitle", type="string", length=50, nullable=false)
     */
    private $jobtitle;

    /**
     * @var \Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reportsTo", referencedColumnName="employeeNumber")
     * })
     */
    private $reportsto;

    /**
     * @var \Offices
     *
     * @ORM\ManyToOne(targetEntity="Offices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="officeCode", referencedColumnName="officeCode")
     * })
     */
    private $officecode;

    public function getEmployeenumber(): ?int
    {
        return $this->employeenumber;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getJobtitle(): ?string
    {
        return $this->jobtitle;
    }

    public function setJobtitle(string $jobtitle): self
    {
        $this->jobtitle = $jobtitle;

        return $this;
    }

    public function getReportsto(): ?self
    {
        return $this->reportsto;
    }

    public function setReportsto(?self $reportsto): self
    {
        $this->reportsto = $reportsto;

        return $this;
    }

    public function getOfficecode(): ?Offices
    {
        return $this->officecode;
    }

    public function setOfficecode(?Offices $officecode): self
    {
        $this->officecode = $officecode;

        return $this;
    }


}
