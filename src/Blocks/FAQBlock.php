<?php

namespace Goldfinch\Component\FAQ\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\ORM\FieldType\DBHTMLText;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'FAQBlock';
    private static $singular_name = 'FAQ';
    private static $plural_name = 'FAQs';

    private static $db = [
        // 'BlockTitle' => 'Varchar',
        // 'BlockSubTitle' => 'Varchar',
        // 'BlockText' => 'HTMLText',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-help-circled';

    public function harvest(Harvest $harvest)
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

    public function updateSchemaData(&$schema)
    {
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [],
        ];

        if ($this->Items()->count())
        {
            foreach ($this->Items() as $item)
            {
                $dbtext = DBHTMLText::create();
                $dbtext->setValue($item->Answer);

                $faqSchema['mainEntity'][] = [
                    '@type' => 'Question',
                    'name' => $item->Question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $dbtext->Plain(),
                    ]
                ];
            }
        }

        $schema['@graph'][] = $faqSchema;
    }
}
