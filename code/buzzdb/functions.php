<?php
function publish_action($buzzcrud)
{
    if ($buzzcrud->get('primary'))
    {
        $db = buzzcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$buzzcrud->get('primary');
        $db->query($query);
    }
}
function unpublish_action($buzzcrud)
{
    if ($buzzcrud->get('primary'))
    {
        $db = buzzcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$buzzcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata,$primary,$buzzcrud){
    $buzzcrud->set_exception('ban_reason','Lol!','error');
    $postdata->set('ban_reason','lalala');
}

function test_column_callback($value, $fieldname, $primary, $row, $buzzcrud){
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $buzzcrud){
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if($ext != 'pdf' && $field == 'uploads.simple_upload'){
        unlink($file_path);
        $buzzcrud->set_exception('simple_upload','This is not PDF','error');
    }
}

function date_example($postdata,$primary,$buzzcrud){
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime',$created);
}

// function in functions.php
function mysql_date($postdata, $buzzcrud){
    $postdata->set('date', $postdata->get('date')->as_date());
}