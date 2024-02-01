<?php

namespace Goldfinch\Component\FAQ\Mills;

use Goldfinch\Mill\Mill;

class FAQCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
