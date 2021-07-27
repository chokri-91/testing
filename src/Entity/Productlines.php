<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productlines
 *
 * @ORM\Table(name="productlines")
 * @ORM\Entity
 */
class Productlines
{
    /**
     * @var string
     *
     * @ORM\Column(name="productLine", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productline;

    /**
     * @var string|null
     *
     * @ORM\Column(name="textDescription", type="string", length=4000, nullable=true)
     */
    private $textdescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="htmlDescription", type="text", length=16777215, nullable=true)
     */
    private $htmldescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="blob", length=16777215, nullable=true)
     */
    private $image;

    public function getProductline(): ?string
    {
        return $this->productline;
    }

    public function getTextdescription(): ?string
    {
        return $this->textdescription;
    }

    public function setTextdescription(?string $textdescription): self
    {
        $this->textdescription = $textdescription;

        return $this;
    }

    public function getHtmldescription(): ?string
    {
        return $this->htmldescription;
    }

    public function setHtmldescription(?string $htmldescription): self
    {
        $this->htmldescription = $htmldescription;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }


}
