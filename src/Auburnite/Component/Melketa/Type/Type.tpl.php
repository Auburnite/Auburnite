<?= "<?php\n" ?>

namespace <?= $namespace ?>;

<?= $use_statemnts; ?>

class <?= $class_name ?> extends <?= $base_class_name."\n" ?>
{

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        // right here is where we need to dynamically setup the column data

        $column = <?= $column_settings ?>;

        return parent::getSQLDeclaration($column, $platform);
    }

    public function getName()
    {
        return '<?= $name ?>';
    }
}
