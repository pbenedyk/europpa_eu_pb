<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:3.4.0|configurator
 * you can change this configuration by importing this file.
 */
$config = new PhpCsFixer\Config();

return $config
    ->setRules([
                   '@PSR12' => true,
                   'align_multiline_comment' => true,
                   'array_indentation' => true,
                   'array_syntax' => ['syntax' => 'short'],
                   'binary_operator_spaces' => true,
                   'cast_spaces' => true,
                   'class_attributes_separation' => ['elements' => ['method' => 'one', 'property' => 'one']],
                   'compact_nullable_typehint' => true,
                   'concat_space' => ['spacing' => 'one'],
                   'explicit_indirect_variable' => true,
                   'function_typehint_space' => true,
                   'heredoc_to_nowdoc' => true,
                   'include' => true,
                   'linebreak_after_opening_tag' => true,
                   'magic_constant_casing' => true,
                   'magic_method_casing' => true,
                   'method_chaining_indentation' => true,
                   'native_function_casing' => true,
                   'native_function_type_declaration_casing' => true,
                   'no_alternative_syntax' => true,
                   'no_empty_comment' => true,
                   'no_empty_phpdoc' => true,
                   'no_empty_statement' => true,
                   'no_extra_blank_lines' => true,
                   'no_leading_namespace_whitespace' => true,
                   'no_multiline_whitespace_around_double_arrow' => true,
                   'no_short_bool_cast' => true,
                   'no_singleline_whitespace_before_semicolons' => true,
                   'no_spaces_around_offset' => true,
                   'no_trailing_comma_in_list_call' => true,
                   'no_trailing_comma_in_singleline_array' => true,
                   'no_unneeded_curly_braces' => true,
                   'no_unused_imports' => true,
                   'no_useless_else' => true,
                   'no_useless_return' => true,
                   'no_whitespace_before_comma_in_array' => true,
                   'normalize_index_brace' => true,
                   'object_operator_without_whitespace' => true,
                   'php_unit_method_casing' => ['case' => 'snake_case'],
                   'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
                   'phpdoc_no_useless_inheritdoc' => true,
                   'phpdoc_order' => true,
                   'phpdoc_scalar' => true,
                   'phpdoc_separation' => true,
                   'phpdoc_single_line_var_spacing' => true,
                   'phpdoc_trim' => true,
                   'phpdoc_types' => true,
                   'semicolon_after_instruction' => true,
                   'single_quote' => true,
                   'single_space_after_construct' => true,
                   'space_after_semicolon' => true,
                   'ternary_operator_spaces' => true,
                   'trailing_comma_in_multiline' => true,
                   'trim_array_spaces' => true,
                   'unary_operator_spaces' => true,
                   'whitespace_after_comma_in_array' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->in(['app', 'config', 'database', 'routes', 'tests'])
    )
    ;
