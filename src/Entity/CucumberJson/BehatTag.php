<?php
declare(strict_types=1);

namespace Agilicode\QAT\Entity\CucumberJson;

class BehatTag
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return BehatTag
     */
    public function setName(?string $name): BehatTag
    {
        $this->name = $name;
        return $this;
    }
}
