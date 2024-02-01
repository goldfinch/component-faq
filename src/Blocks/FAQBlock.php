<?php

namespace Goldfinch\Component\FAQ\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\ORM\FieldType\DBHTMLText;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'FAQBlock';
    private static $singular_name = 'FAQ';
    private static $plural_name = 'FAQs';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-help-circled';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function Items()
    {
        return FAQItem::get();
    }

    public function Categories()
    {
        return FAQCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }

    // TODO
    public function updateSchemaData(&$schema)
    {
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [],
        ];

        if ($this->Items()->count()) {
            foreach ($this->Items() as $item) {
                $dbtext = DBHTMLText::create();
                $dbtext->setValue($item->Answer);

                $faqSchema['mainEntity'][] = [
                    '@type' => 'Question',
                    'name' => $item->Question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $dbtext->Plain(),
                    ],
                ];
            }
        }

        $schema['@graph'][] = $faqSchema;
    }
}
