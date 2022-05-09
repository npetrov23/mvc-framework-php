<?
namespace component\form;

class Main extends \Component {
    public  static function get_fields_model() {
        $model = \Component::get_target();
        $field_form = $model->get_label();

        return $field_form;
    }
}