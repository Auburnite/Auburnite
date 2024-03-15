<?php echo "<?php\n"; ?>

namespace <?php echo $namespace; ?>;

<?php echo $use_statemnts; ?>

class <?php echo $class_name; ?> extends <?php echo $base_class_name."\n"; ?>
{

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        // right here is where we need to dynamically setup the column data

        $column = <?php echo $column_settings; ?>;

        return parent::getSQLDeclaration($column, $platform);
    }

    public function getName()
    {
        return '<?php echo $name; ?>';
    }
}
