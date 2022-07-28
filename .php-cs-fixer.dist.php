<?php

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR12' => true,
        '@PhpCsFixer' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'increment_style' => [
            'style' => 'post',
        ],
        'list_syntax' => [
            'syntax' => 'short',
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'extra',
                'throw',
                'use',
                'use_trait',
            ],
        ],
        'ordered_imports' => [
            'sort_algorithm' => 'length',
        ],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
        ],
        'php_unit_method_casing' => [
            'case' => 'snake_case',
        ],
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
        ],
        'no_alias_functions' => true, // !!! risky
        'no_unreachable_default_argument_value' => true, // !!! risky
        'not_operator_with_successor_space' => true,
        'php_unit_test_class_requires_covers' => false,
        'psr_autoloading' => true, // !!! risky
        'self_accessor' => true, // !!! risky
        'simplified_null_return' => true,
    ])
    ->setRiskyAllowed(true)
;
