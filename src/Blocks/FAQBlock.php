<?php

namespace Goldfinch\Component\FAQ\Blocks;

use SilverStripe\ORM\FieldType\DBHTMLText;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQBlock extends BaseElement
{
    private static $table_name = 'FAQBlock';
    private static $singular_name = 'FAQ';
    private static $plural_name = 'FAQs';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = 'FAQ block handler';
    private static $icon = 'font-icon-help-circled';

    public function Items()
    {
        return FAQItem::get();
    }

    public function Categories()
    {
        return FAQCategory::get();
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
