{php_open_tag}

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_table_<?= $table_name ?> extends CI_Migration
{

    /**
     * Name of the table to be used in this migration!
     *
     * @var string
     */
    protected $_table_name = "<?= $table_name ?>";

    public function up()
    {
        $this->dbforge->add_field(array(
            <?php foreach($fields as $field): 
            if ($field->primary_key) {
                $primary_key = $field->name;
            }?>'<?= $field->name ?>' => array(
                'type' => "<?= strtoupper($field->type) == 'ENUM' ? $field->detail->Type : strtoupper($field->type) ?>",
                <?php if ($field->max_length): 
                    ?>'constraint' => <?= $field->max_length ?>,
            <?php endif 
            ?><?php if ($field->primary_key): 
            ?>'unsigned' => TRUE,
                'auto_increment' => TRUE,
                <?php endif ?><?php 
                if ($field->default == null and $field->primary_key == false): 
                ?>'null' => TRUE,
            <?php endif ?>),
            <?php endforeach ?>));

        <?php if ($primary_key): 
    ?>$this->dbforge->add_key('<?= $primary_key ?>', TRUE);
        <?php endif 
    ?>$this->dbforge->create_table($this->_table_name);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->_table_name, TRUE);
    }
}
